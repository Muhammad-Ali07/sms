<?php

namespace App\Http\Controllers\Admin;

/*
 * Attendance Controller of Admin Panel
 */

use App\Events\AttendanceEvent;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\Admin\Attendance\UpdateRequest;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Holiday;
use App\Exports\AttendanceExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

/**
 * Class AttendancesController
 * @package App\Http\Controllers\Admin
 */
class AttendancesController extends AdminBaseController
{


    public function __construct()
    {
        parent::__construct();
        $this->attendanceOpen = 'active open';
        $this->pageTitle = 'Attendance';
    }

    /*
     * This is the view page of attendance.
     */

    public function index()
    {
        $this->attendances = Attendance::all();
        $this->viewAttendanceActive = 'active';

        $this->date = date('Y-m-d');
        // dd('done');
        return View::make('admin.attendances.index', $this->data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxAttendanceList()
    {

        $leaves = Attendance::absentEveryEmployee();
        $result = Employee::select('employeeID', 'profileImage', 'fullName', 'status')
        ->active();
        // dd($leaves);

        return datatables()->eloquent($result)
            ->filter(function($query) {
                if(request()->search['value']) {
                    $query->where('employeeID', 'LIKE', '%'.request()->search['value'].'%')
                            ->orWhere('email', 'LIKE', '%'.request()->search['value'].'%')
                            ->orWhere('fullName', 'LIKE', '%'.request()->search['value'].'%');
                }
            })
            ->addColumn('id', function ($row) {
                return $row->employeeID;
            })
            ->addColumn('profileImage', function ($row) {
                return '<img src="' . $row->profile_image_url . '" height="50px" />';
            })
            ->addColumn('name', function ($row) {
                return $row->fullName;
            })

            ->addColumn('last_absent', function ($row) {
                return $row->lastAbsent($row->employeeID);
            })
            ->addColumn('leaves', function ($row) use ($leaves) {
                $leaveData = '<table>';
                // dd($row);

                foreach ($leaves[$row->employeeID] as $index => $leave) {
                    $leaveData .= '<tr>
                                        <td>
                                            <strong> ' . ucfirst($index) . ' &nbsp;&nbsp;</strong>
                                        </td>
                                        <td>
                                            <strong> ' . $leave . ' </strong>
                                        </td>
                                    </tr>';
                }

                $leaveData .= '</table>';
                return $leaveData;
            })
            ->addColumn('status', function ($row) {
                // dd($row->status);
                if ($row->status == 'active') {
                    return '<span class="label label-sm label-success">' . $row->status . '</span>';
                } else {
                    return '<span class="label label-sm label-danger">' . $row->status . '</span>';
                }

            })
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-sm purple" href="' . route('admin.attendances.show', $row->employeeID) . '">
                                        <i class="fa fa-eye"></i> View
                                    </a>';

            })
            ->escapeColumns(['action', 'status', 'leaves', 'profileImage'])
            ->removeColumn('profile_image_url')
            ->make(false);
    }

    /*
     * This method is called when we mark the attendance and redirects to edit page.
     */

    public function create()
    {

        $date = (Input::get('date') != '') ? Input::get('date') : date('Y-m-d');
        $date = date('Y-m-d', strtotime($date));

        $attendance_count = Attendance::where('date', '=', $date)->count();
        $employee_count = Employee::active()->count();

        if ($employee_count == $attendance_count) {
            if (!Session::get('success')) {
                Session::flash('success', '<strong>Attendance already marked</strong>');
            }

        } else {
            Session::forget('success');
        }

        return Redirect::route('admin.attendances.edit', $date);
    }

    /**
     * Display the specified attendance
     */
    public function show($id)
    {
        // dd($id);
        $this->viewAttendanceActive = 'active';

        $this->employee = Employee::where('employeeID', '=', $id)->get()->first();
        $this->attendance = Attendance::where('employeeID', '=', $id)
            ->where(function ($query) {
                $query->where('application_status', '=', 'approved')
                    ->orwhere('application_status', '=', null)
                    ->orwhere('status', '=', 'present');
            })->get();
        $this->holidays = Holiday::all();
        $this->employeeslist = Employee::pluck('fullName', 'employeeID');


        return View::make('admin.attendances.show', $this->data);
    }

    /**
     * Show the form for editing the specified attendance.
     */
    public function edit($date)
    {
        // dd($date);
        $attendanceArray = [];
        $this->attendance = Attendance::where('date', '=', $date)->get()->toArray();
        $this->todays_holidays = Holiday::where('date', '=', $date)->get()->first();

        foreach ($this->attendance as $attend) {
            $attendanceArray[$attend['employeeID']] = $attend;
        }

        $this->date = $date;
        $this->attendanceArray = $attendanceArray;


        $this->leaveTypes = Attendance::leaveTypesEmployees();
        $this->leaveTypeWithoutHalfDay = Attendance::leaveTypesEmployees('half day');
        $this->employees = Employee::active()->get();

        return View::make('admin.attendances.edit', $this->data);
    }

    /**
     * Update the specified attendance in storage.
     */
    public function update(UpdateRequest $request, $date)
    {
        // dd($request->all());
        $input = Input::all();

        foreach ($input['employees'] as $employeeID) {
            $user = Attendance::firstOrCreate([
                'employeeID' => $employeeID,
                'date' => $date,
            ]);
            if ($user->application_status != 'approved' || ($user->application_status == 'approved' && isset($input['checkbox'][$employeeID]) == 'on')) {
                $update = Attendance::find($user->id);
                $update->status = (isset($input['checkbox'][$employeeID]) == 'on') ? 'present' : 'absent';
                $update->leaveType = (isset($input['checkbox'][$employeeID]) == 'on') ? null : $input['leaveType'][$employeeID];
                $update->halfDayType = ((!isset($input['checkbox'][$employeeID]) == 'on') && ($input['leaveType'][$employeeID] == 'half day')) ? $input['leaveTypeWithoutHalfDay'][$employeeID] : null;
                $update->reason = (isset($input['checkbox'][$employeeID]) == 'on') ? '' : $input['reason'][$employeeID];
                $update->application_status = null;
                // Only set checkin if it exists in the input
                if (isset($input['checkin'][$employeeID])) {
                    $update->checkin = $input['checkin'][$employeeID];
                } else {
                    $update->checkin = ''; // or null, depending on your requirement
                }

                if (isset($input['checkout'][$employeeID])) {
                    $update->checkout = $input['checkout'][$employeeID];
                } else {
                    $update->checkout = ''; // or null, depending on your requirement
                }

                //$update->updated_by = Auth::guard('admin')->user()->email;
                $update->save();
            }

        }

        $this->date = date('d M Y', strtotime($date));

        /*if ($this->setting->attendance_notification == 1) {

            $employees = Employee::select('id', 'email', 'fullName')->active()->get();

            foreach ($employees as $employee) {
                $this->employee_name = $employee->fullName;
                event(new AttendanceEvent($employee, $this->date));
            }
        }*/

        Session::flash('success', date('d M Y', strtotime($date)) . 'successfully Updated');
        return Redirect::route('admin.attendances.edit', $date);
    }

    public function export()
    {
        $fileName = 'Attendance-' . time() . '.xlsx';
        if (request()->filled('s')) {
            return (new AttendanceExport(request()->input('s')))->download($fileName);
        }
        return (new AttendanceExport)->download($fileName);
    }

    public function report()
    {

        $month = Input::get('month');
        $year = Input::get('year');
        $employeeID = Input::get('employeeID');

        $firstDay = $year . '-' . $month . '-01';


        $presentCount = Attendance::countPresentDays($month, $year, $employeeID);

        $totalDays = date('t', strtotime($firstDay));

        $holidaycount = count(DB::select(DB::raw('select * from holidays where MONTH(date)=' . $month)));
        $workingDays = $totalDays - $holidaycount;


        $percentage = ($presentCount / $workingDays) * 100;
        $output['success'] = 'success';
        $output['presentByWorking'] = $presentCount.'/'.$workingDays;

        $output['attendancePerReport'] = number_format((float)$percentage, 2, '.', '');
        return Response::json($output, 200);

    }

    /**
     * Remove the specified attendance from storage.
     */
    public function destroy($id)
    {
        Attendance::destroy($id);
        return Redirect::route('admin.attendances.index');
    }

}
