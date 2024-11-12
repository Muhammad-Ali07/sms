<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function adminMenuList(){
        $data = [];
        $smenu = 'sidebar-menu';
        $list = 'list';
        $create = 'create';
        $edit = 'edit';
        $view = 'view';
        $delete = 'delete';
        $print = 'print';
        $data['module_act'] = [$smenu,$list,$create,$edit,$view,$delete,$print];

        $data['admin_menu'] = [
            [
                'name' => 'Common',
                'icon' => '',
                'child' => [
                    ['dname'=>'Dashboard', 'name' => 'dashboard', 'action' => [ $smenu,$view ] ],
                    ['dname'=>'Company', 'name' => 'company', 'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ] ],
                ],
            ],
            //setup
            [
                'name' => 'Setup',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Pickup Point',
                        'name' => 'pickup-point',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Shipping Line',
                        'name' => 'shipping-line',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Customer',
                        'name' => 'customer',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Broker',
                        'name' => 'broker',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Vechicle Category',
                        'name' => 'vehicle-category',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Stations',
                        'name' => 'stations',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Packages',
                        'name' => 'packages',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Self Company',
                        'name' => 'self-company',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Category',
                        'name' => 'category',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],

                ]


            ],
            //Job Inquiry
            [
                'name' => 'Job Inquiry',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Form',
                        'name' => 'form',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Job Inquiry',
                        'name' => 'view-job-inquiry',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Builty
            [
                'name' => 'Builty',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Add Builty',
                        'name' => 'add-builty',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Builty',
                        'name' => 'view-builty',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Bill
            [
                'name' => 'Billing',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Add Bill',
                        'name' => 'add-bill',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Bill',
                        'name' => 'view-bill',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Container Deposit
            [
                'name' => 'Container Deposit',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Add Builty',
                        'name' => 'add-builty',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Builty',
                        'name' => 'view-builty',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],
            //Daily Expense
            [
                'name' => 'Daily Expense',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Add Daily Expense',
                        'name' => 'add-daily-expense',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Expense Report',
                        'name' => 'expense-report',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Add Expense Category',
                        'name' => 'add-expense-category',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],

                ]
            ],

            //Cash Statement Head office
            [
                'name' => 'Cash Statement Head Office',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Head Office Cash Statement',
                        'name' => 'head-office-cash-statemnt',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Head Office Report',
                        'name' => 'head-office-report',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Campus Report',
                        'name' => 'campus-report',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],

                ]
            ],

            //Tracking
            [
                'name' => 'Tracking',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Builty Tracking',
                        'name' => 'builty-tracking',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Status',
                        'name' => 'status',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Ledger
            [
                'name' => 'Ledger',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'General Ledger',
                        'name' => 'general-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Customer Ledger',
                        'name' => 'customer-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Broker Ledger',
                        'name' => 'broker-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Salary Ledger',
                        'name' => 'salary-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Employee Ledger',
                        'name' => 'employee-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Bank Ledger',
                        'name' => 'bank-ledger',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],

                ]
            ],

            //Salary
            [
                'name' => 'Salary',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Salary',
                        'name' => 'salary',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],

                ]
            ],

            //HR
            [
                'name' => 'HR',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Add Employee',
                        'name' => 'add-employee',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Employee',
                        'name' => 'view-employee',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Departments',
                        'name' => 'departments',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Mark Attendance',
                        'name' => 'mark-attendance',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Attendance',
                        'name' => 'view-attendance',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Leave Types',
                        'name' => 'leave-types',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Leave Applications',
                        'name' => 'leave-applications',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Add Award',
                        'name' => 'add-award',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'View Awards',
                        'name' => 'view-awards',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Received and Paid
            [
                'name' => 'Received & Paid',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Manage Received & Paid',
                        'name' => 'manage-received-paid',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],


            //User Rights
            [
                'name' => 'User Rights',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Roles',
                        'name' => 'rooles',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],

            //Reports
            [
                'name' => 'Reports',
                'icon' => 'icon-xl la la-cog',
                'child' => [
                    [
                        'dname' => 'Manager Wise Reports',
                        'name' => 'manager-wise-reports',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Customer Wise Reports',
                        'name' => 'customer-wise-reports',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Station Wise Reports',
                        'name' => 'station-wise-reports',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Broker Wise Reports',
                        'name' => 'broker-wise-reports',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'PNL Reports',
                        'name' => 'pnl-report',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'Customer Based PNL',
                        'name' => 'customer-base-pnl',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'All Customer Base PNL',
                        'name' => 'all-customer-base-pnl',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                    [
                        'dname' => 'CDO Report',
                        'name' => 'cdo-report',
                        'action' => [ $smenu,$list,$create,$edit,$view,$delete,$print ]
                    ],
                ]
            ],
        ];

        return $data;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
