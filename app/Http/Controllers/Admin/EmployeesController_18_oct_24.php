<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Reply;
use App\Events\CreateEmployeeEvent;
use App\Exports\EmployeeExport;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\Admin\Employee\CreateRequest;
use App\Http\Requests\Admin\Employee\UpdateRequest;
use App\Models\Bank_detail;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Employee_document;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

/**
 * Class EmployeesController
 * This Controller is for the all the related function applied on employees
 */
class EmployeesController extends AdminBaseController
{

    /**
     * Constructor for the Employees
     */

    public function __construct()
    {
        parent::__construct();
        $this->employeesOpen = 'active open';
        $this->pageTitle = 'Employees';
        $this->employeesActive = 'active';
    }

    public function index()
    {
        return View::make('admin.employees.index', $this->data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajaxEmployees()
    {
        $result = Employee::select('id', 'employeeID', 'profileImage', 'email', 'fullName', 'designation', 'date_of_birth', 'status');
                    // ->with('getDesignation:id,deptID,designation');
        
        
        return datatables()->eloquent($result)
            ->filter(function($query) {
                if(request()->search['value']) {
                    $query->where('employeeID', 'LIKE', '%'.request()->search['value'].'%')
                            ->orWhere('email', 'LIKE', '%'.request()->search['value'].'%')
                            ->orWhere('fullName', 'LIKE', '%'.request()->search['value'].'%')
                            ->orWhereHas('getDesignation', function($q) {
                                $q->where('designation', 'LIKE', '%'.strtolower(request()->search['value']).'%');
                                // ->orWhereHas('department', function($q1) {
                                //     $q1->where('deptName', 'LIKE', '%'.strtolower(request()->search['value']).'%');
                                // });
                            });
                }
            })
            ->editColumn('profileImage', function ($row) {
                return '<img src="' . $row->profile_image_url . '" height="80px" />';
            })
            /*->editColumn('designation', function ($row) {
                return '<p>Department: <strong>' . $row->getDesignation->department->deptName . '</strong></p>
                <p>Designation: <strong>' . $row->getDesignation->designation . '</strong></p>';
            })*/
            ->editColumn('date_of_birth', function ($row) {
                return $row->workDuration($row->employeeID);

            })
            // ->editColumn('status', function ($row) {
            //     $color = [
            //         'active' => 'success',
            //         'inactive' => 'danger'
            //     ];

            //     return '<span class="label label-' . $color[$row->status] . '">' . $row->status . '</span>';

            // })
            ->addColumn('action', function ($row) {
                return '<p> <a class="btn btn-sm purple" href="' . route('admin.employees.edit', $row->employeeID) . '"><i class="fa fa-edit"></i> View/Edit</a></p>
                                    <p>    <a class="btn btn-sm red" style="width: 90px;" href="javascript:;" onclick="del(\'' . $row->id . '\')"><i class="fa fa-trash"></i> Delete</a></p>';
            })
            ->escapeColumns(['designation', 'action', 'status', 'profileImage'])
            ->removeColumn('halfDayType', 'profile_image_url')
            ->removeColumn('email', 'id')
            ->make(false);
    }

    /**
     * Show the form for creating a new employee
     */
    public function create()
{
    // Fetch employees data
    $this->employees = Employee::all();  // Retrieve all employees
    
    $this->department = Department::pluck('deptName', 'id');
    return View::make('admin.employees.create', $this->data);
}


    /**
     * @param CreateRequest $request
     * @return array
     * @throws \Exception
     */
   
     public function store(CreateRequest $request)
     {
         DB::beginTransaction();
         try {
             // Create Employee
             $employee = Employee::create($request->toArray());
     
             // Profile Image Upload
             if ($request->profileImage) {
                 $file = new Files();
                 $employee->profileImage = $file->upload($request->profileImage, 'employee');
                 $employee->save();
             }
     
             // Insert into salary table
             if ($request->currentSalary != '') {
                 Salary::create([
                     'employeeID' => $request->employeeID,
                     'type' => 'current',
                     'remarks' => 'Joining Salary Of Employee',
                     'salary' => $request->currentSalary
                 ]);
             }
     
             // Insert Into Bank Details
             if ($request->accountName != '' && $request->accountNumber != '') {
                 Bank_detail::create($request->toArray());
             }
     
             // Upload the documents
             $documents = ['resume', 'offerLetter', 'joiningLetter', 'contract', 'IDProof'];
             foreach ($documents as $document) {
                 if ($request->hasFile($document)) {
                     $file = new Files();
                     $filename = $file->upload(Input::file($document), 'employee_documents/' . $document, null, null, false);
                     Employee_document::create([
                         'employeeID' => $request->employeeID,
                         'fileName' => $filename,
                         'type' => $document
                     ]);
                 }
             }
     
             // Insert Advance Salary and Loan into employee_financials table
            //  EmployeeFinancial::create([
            //      'employeeID' => $request->employeeID,  // Foreign key linking to Employee
            //      'advance_amount' => $request->advance_amount,
            //      'advance_description' => $request->advance_description,
            //      'advance_paid_via' => $request->advance_paid_via,
            //      'loan_amount' => $request->loan_amount,
            //      'loan_verified_by' => $request->loan_verified_by,
            //      'loan_paid_by' => $request->loan_paid_by,
            //      'loan_conditions' => $request->loan_conditions
            //  ]);
     
             // Commit the transaction
             DB::commit();
     
             // Redirect to the employee index page
             return Reply::redirect(route('admin.employees.index'), 'Employee <strong>' . $employee->fullName . '</strong> successfully added to the Database');
         
         } catch (\Exception $e) {
             DB::rollback();
             throw $e;
         }
     }
      

    /**
     * Show the form for editing the specified employee
     */
    public function edit($id)
    {
        $this->employeesActive = 'active';
        $this->department = Department::pluck('deptName', 'id');
        $this->employee = Employee::where('employeeID', '=', $id)->first();
        $this->designation = Designation::find($this->employee->designation);
    
        $doc = [];
    
        foreach ($this->employee->getDocuments as $documents) {
            $doc[$documents->type] = $documents->document_url;
        }
    
        $this->documents = $doc;
    
        $this->bank_details = Bank_detail::where('employeeID', '=', $id)->first();
    
        // Fetch all employees to populate the dropdown
        $this->employees = Employee::all();  // Fetch all employees and assign them to the view
    
        return View::make('admin.employees.edit', [
            'employee' => $this->employee,
            'employees' => $this->employees,   // Pass the list of employees to the view
            'department' => $this->department,
            'designation' => $this->designation,
            'documents' => $this->documents,
            'bank_details' => $this->bank_details,
        ]);
    }
    

    /**
     * Update the specified employee in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
    
        // Bank Details Update-------
        if ($request->updateType == 'bank') {
            $bankDetails = Bank_detail::firstOrNew(['employeeID' => $id]);
//            $bankDetails->update($request->toArray());
            $bankDetails->accountName = $request->accountName;
            $bankDetails->accountNumber = $request->accountNumber;
            $bankDetails->bank = $request->bank;
            $bankDetails->pan = $request->pan;
            $bankDetails->ifsc = $request->ifsc;
            $bankDetails->branch = $request->branch;
            $bankDetails->save();

            return Reply::success('Bank details updated successfully');

        }

        // Bank Details Update End--------
        // Company Details Update Start--------

        else if ($request->updateType == 'company') {
            $companyDetails = Employee::where('employeeID', '=', $id)->first();

            $companyDetails->employeeID = $request->employeeID;
            $companyDetails->designation = $request->designation;
            $companyDetails->joiningDate = date('Y-m-d', strtotime($request->joiningDate));
            $companyDetails->exit_date = (trim($request->exit_date) != '') ? date('Y-m-d', strtotime($request->exit_date)) : null;

            $companyDetails->status = ($request->status != 'active') ? 'inactive' : 'active';
            $companyDetails->save();

            if (isset($request->salarysalary)) {
                foreach ($request->salary as $index => $value) {
                    $salaryDetails = Salary::find($index);
                    $salaryDetails->type = $request->type[$index];
                    $salaryDetails->salary = $value;
                    $salaryDetails->save();
                }
            }

            return Reply::success('Company Details updated successfully');

        }

        // Company Details Update End--------------


        // Personal info Details Update Start----------

        else if ($request->updateType == 'personalInfo') {
            $employee = Employee::where('employeeID', '=', $id)->get()->first();

            // Profile Image Upload
            if ($request->profileImage) {
                $file = new Files();
                $filename = $file->upload($request->profileImage, 'employee');
            } else {
                $filename = $request->hiddenImage;
            }

            $employee->update($request->toArray());

            $employee->profileImage = $filename;

            if($request->new_password != ''){
                $employee->password = $request->new_password;
            }

            $employee->save();


            return Reply::success('Updated Successfully');
        }

        // Personal Details Update End-------------

        // Employee Finance info Update Start
        else if ($request->updateType == 'finance') {
            // Update or create financial records in the employee_financial table
            $employeeFinancial = EmployeeFinancial::firstOrNew(['employeeID' => $id]);
            $employeeFinancial->advance_amount = $request->advance_amount;
            $employeeFinancial->advance_description = $request->advance_description;
            $employeeFinancial->advance_paid_via = $request->advance_paid_via;
            $employeeFinancial->loan_amount = $request->loan_amount;
            $employeeFinancial->loan_verified_by = $request->loan_verified_by;
            $employeeFinancial->loan_paid_by = $request->loan_paid_by;
            $employeeFinancial->loan_conditions = $request->loan_conditions;
            $employeeFinancial->save();
    
            return Reply::success('Financial details updated successfully');
        }
    
        // Employee Finance info Update Ends here

        // Documents info Details Update Start--------
        else if ($request->updateType == 'documents') {
            // UPLOAD THE DOCUMENTS  -----------------
            $documents = ['resume', 'offerLetter', 'joiningLetter', 'contract', 'IDProof'];

            foreach ($documents as $document) {

                if (Input::hasFile($document)) {
                    $file = new Files();
                    $filename = $file->upload(Input::file($document), 'employee_documents/' . $document, null, null, false);
                    $employeeDocument = Employee_document::firstOrNew(['employeeID' => $id, 'type' => $document]);
                    $employeeDocument->fileName = $filename;
                    $employeeDocument->type = $document;
                    $employeeDocument->save();
                }
            }

            return Reply::success('<strong>Success</strong> Updated Successfully');
            // END UPLOAD THE DOCUMENTS**********

        }

        // Documents info Details Update END--------

    }

    // Export Employee Data

    public function export()
    {
        $fileName = 'Employees-' . time() . '.xlsx';
        if (request()->filled('s')) {
            return (new EmployeeExport(request()->input('s')))->download($fileName);
        }
        return (new EmployeeExport)->download($fileName);
    }

    /**
     * @param $id
     * @return array
     * Delete Employee Completely
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return Reply::success('messages.successDelete');
    }

}