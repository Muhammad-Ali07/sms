<?php $__env->startSection('body'); ?>
main
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('includes.mobile-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="flex">
   <?php
      /*if($select != ''){

      $totalbuiltiesamount = [];

      foreach($select as $row){

      $newselect =DB::table('now_builtyitems')->where('builtyid',$row->id)->first();

      if($newselect != ''){

      $totalbuiltiesamount[] =  $newselect->total;

      }

      }



      $totalbillingamount = array_sum($totalbuiltiesamount);





      }*/



      ?>
   <!-- BEGIN: Side Menu -->
   <?php echo $__env->make('includes.side-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php   $deletion=1;  ?>
   <?php $serial = 0; ?>
   <!-- BEGIN: Content -->
   <div class="content">
      <!-- BEGIN: Top Bar -->
      <?php echo $__env->make('includes.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- END: Top Bar -->
      <div class="grid grid-cols-12 gap-6">
         <div class="col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
               <!-- BEGIN: General Report -->
               <div class="col-span-12 mt-8">
                    <?php if(auth()->user()->role_id == '1'): ?>
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Super Admin Dashboard
                            </h2>
                            

                            <a href="" class="ml-auto flex items-center " style="color:#000"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        
                            <div class="grid grid-cols-12 gap-6 mt-5 grid_col_dashboard">

                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                                <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                    33%
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                        <polyline points="18 15 12 9 6 15"></polyline>
                                                    </svg>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6" id="customer_count"><?php echo e($customer); ?></div>
                                            <div class="text-base text-gray-600 mt-1">Total Customer</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="broker_count"></div>
                                        <div class="text-base text-gray-600 mt-1">Total Brokers</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="shipping_line_count"></div>
                                        <div class="text-base text-gray-600 mt-1">Shipping Line</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="all_bill_count"></div>
                                        <div class="text-base text-gray-600 mt-1">All Bills Made</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="all_rfq_count"></div>
                                        <div class="text-base text-gray-600 mt-1">Rfq Made</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="all_employees_count"></div>
                                        <div class="text-base text-gray-600 mt-1">All Employees</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="all_users_count"></div>
                                        <div class="text-base text-gray-600 mt-1">All Users</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="all_stations_count"></div>
                                        <div class="text-base text-gray-600 mt-1">All Stations</div>
                                    </div>
                                    </div>
                                </div>


                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                            <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                                2%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="total_builties"><?php echo e($no_of_builties); ?></div>
                                        <div class="text-base text-gray-600 mt-1">No of Bilties</div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                                <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                                    12%
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6" id="builties_total_amount"></div>
                                            <div class="text-base text-gray-600 mt-1">Total Builties Amount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                            <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                                22%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="total_expenses_payable_to_broker"><?php echo e(number_format($total_expenses, 0, '.', ',')); ?>

                                        </div>
                                        <div class="text-base text-gray-600 mt-1">Payables to Brokers</div>
                                    </div>
                                </div>
                                </div>
                            </div>


                        <div class="grid grid-cols-12 gap-6 mt-5 grid_col_dashboard">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6" id="receiveables"></div>
                                    <div class="text-base text-gray-600 mt-1">Receivables</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="payables"></div>
                                        <div class="text-base text-gray-600 mt-1">Payables</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success cursor-pointer">
                                                33%
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" id="sum_of_salaries"></div>
                                        <div class="text-base text-gray-600 mt-1">Total Employees Salary</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                            Lists
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Latest Bilties
                                    </h2>
                                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                    </div>
                                </div>
                                <!-- Date Range Filters -->
                                <div class="intro-y box p-5 mb-4">
                                    <div class="flex space-x-4">
                                        <div>
                                            <label for="from_date">From Date:</label>
                                            <input type="date" id="bilties_from_date" class="form-control">
                                        </div>
                                        <div>
                                            <label for="to_date">To Date:</label>
                                            <input type="date" id="bilties_to_date" class="form-control">
                                        </div>
                                        <div>
                                            <button id="bilties_filter_btn" class="btn btn-primary mt-4">Filter</button>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#bilties_filter_btn').click(function() {
                                                    var fromDate = $('#bilties_from_date').val();
                                                    var toDate = $('#bilties_to_date').val();

                                                    if (fromDate && toDate) {
                                                        $.ajax({
                                                            url: "<?php echo e(route('filter-bilties')); ?>", // Update this to the actual route that handles filtering
                                                            method: "GET",
                                                            data: {
                                                                bilties_from_date: fromDate,
                                                                bilties_to_date: toDate
                                                            },
                                                            success: function(response) {
                                                                console.log(response.data);
                                                                if (response.data.length === 0) {
                                                                    toastr.error('No builty found');
                                                                } else {
                                                                    toastr.success('Builty found successfully');
                                                                    // Update the table body with the filtered data
                                                                    $('#bilties_super_admin_table tbody').empty();
                                                                    $.each(response.data, function(index, customer) {
                                                                        var row = `<tr>
                                                                                <td>${customer.customer_name}</td>
                                                                                <td>${customer.total_selling_expense ?? 0}</td>
                                                                                <td>${customer.total_purchase_expense ?? 0}</td>
                                                                            </tr>`;
                                                                        $('#bilties_super_admin_table tbody').append(row);
                                                                    });
                                                                }

                                                            }
                                                        });
                                                    } else {
                                                        alert('Please select both From Date and To Date.');
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>
                                <!-- Table -->
                                <div class="intro-y box p-5">
                                    <table class="table table-striped table-bordered" id="bilties_super_admin_table">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Buying Amount</th>
                                                <th>Selling Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($builties)): ?>
                                                <?php $__currentLoopData = $builties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($b->customer_name); ?></td>
                                                        <td><?php echo e($b->total_purchase_expense); ?></td>
                                                        <td><?php echo e($b->total_selling_expense); ?></td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Latest Bills
                                    </h2>
                                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                    </div>
                                </div>
                                <!-- Date Range Filters -->
                                <div class="intro-y box p-5 mb-4">
                                    <div class="flex space-x-4">
                                        <div>
                                            <label for="from_date">From Date:</label>
                                            <input type="date" id="bill_from_date" class="form-control">
                                        </div>
                                        <div>
                                            <label for="to_date">To Date:</label>
                                            <input type="date" id="bill_to_date" class="form-control">
                                        </div>
                                        <div>
                                            <button id="bill_filter_btn" class="btn btn-primary mt-4">Filter</button>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#bill_filter_btn').click(function() {
                                                    var fromDate = $('#bill_from_date').val();
                                                    var toDate = $('#bill_to_date').val();

                                                    if (fromDate && toDate) {
                                                        $.ajax({
                                                            url: "<?php echo e(route('filter-bill')); ?>", // Update this to the actual route that handles filtering
                                                            method: "GET",
                                                            data: {
                                                                bill_from_date: fromDate,
                                                                bill_to_date: toDate
                                                            },
                                                            success: function(response) {
                                                                console.log(response.data);
                                                                if (response.data.length === 0) {
                                                                    toastr.error('No bill found');
                                                                } else {
                                                                    toastr.success('Bill found successfully');
                                                                    // Update the table body with the filtered data
                                                                    $('#bill_super_admin_table tbody').empty();
                                                                    $.each(response.data, function(index, bill) {
                                                                        var row = `<tr>
                                                                                <td>${bill.customer_name}</td>
                                                                                <td>${bill.bill_date ?? 0}</td>
                                                                                <td>${bill.total ?? 0}</td>
                                                                            </tr>`;
                                                                        $('#bill_super_admin_table tbody').append(row);
                                                                    });
                                                                }

                                                            }
                                                        });
                                                    } else {
                                                        alert('Please select both From Date and To Date.');
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>
                                <!-- Table -->
                                <div class="intro-y box p-5">
                                    <table class="table table-striped table-bordered" id="bill_super_admin_table">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Bill date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($bill)): ?>
                                                <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($b->customer_name); ?></td>
                                                        <td><?php echo e($b->bill_date); ?></td>
                                                        <td><?php echo e($b->total); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Latest RFQ's
                                    </h2>
                                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                    </div>
                                </div>
                                <!-- Date Range Filters -->
                                <div class="intro-y box p-5 mb-4">
                                    <div class="flex space-x-4">
                                        <div>
                                            <label for="from_date">From Date:</label>
                                            <input type="date" id="rfq_from_date" class="form-control">
                                        </div>
                                        <div>
                                            <label for="to_date">To Date:</label>
                                            <input type="date" id="rfq_to_date" class="form-control">
                                        </div>
                                        <div>
                                            <button id="rfq_filter_btn" class="btn btn-primary mt-4">Filter</button>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#rfq_filter_btn').click(function() {
                                                    var fromDate = $('#rfq_from_date').val();
                                                    var toDate = $('#rfq_to_date').val();

                                                    if (fromDate && toDate) {
                                                        $.ajax({
                                                            url: "<?php echo e(route('filter-rfq')); ?>", // Update this to the actual route that handles filtering
                                                            method: "GET",
                                                            data: {
                                                                rfq_from_date: fromDate,
                                                                rfq_to_date: toDate
                                                            },
                                                            success: function(response) {
                                                                console.log(response.data);
                                                                if (response.data.length === 0) {
                                                                    toastr.error('No RFQ found');
                                                                } else {
                                                                    toastr.success('RFQ found successfully');
                                                                    // Update the table body with the filtered data
                                                                    $('#rfq_super_admin_table tbody').empty();
                                                                    $.each(response.data, function(index, rfq) {
                                                                        var row = `<tr>
                                                                                <td>${rfq.customer_name}</td>
                                                                                <td>${rfq.manager_name}</td>
                                                                                <td>${rfq.selling_rate ?? 0}</td>
                                                                                <td>${rfq.status ?? 0}</td>
                                                                            </tr>`;
                                                                        $('#rfq_super_admin_table tbody').append(row);
                                                                    });
                                                                }

                                                            }
                                                        });
                                                    } else {
                                                        alert('Please select both From Date and To Date.');
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>
                                <!-- Table -->
                                <div class="intro-y box p-5">
                                    <table class="table table-striped table-bordered" id="rfq_super_admin_table">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Manager</th>
                                                <th>Selling Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($job_inquiries)): ?>
                                                <?php $__currentLoopData = $job_inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($ji->customer_name); ?></td>
                                                        <td><?php echo e($ji->manager_name); ?></td>
                                                        <td><?php echo e($ji->selling_rate); ?></td>
                                                        <td><?php echo e($ji->status); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Latest Customer
                                </h2>
                                <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                    <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                </div>
                                </div>
                                <!--mt-12 sm:mt-5-->
                                <div class="intro-y box p-5">
                                <table class="table table-striped table-bordered" id="customer_table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Prefix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($customers)): ?>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($cst->name); ?></td>
                                                    <td><?php echo e(isset($cst->prefix) ? $cst->prefix : ''); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                                    <div class="dropdown-menu w-40">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                        <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Latest RFQ's
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                            <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        </div>
                        </div>
                        <!--mt-12 sm:mt-5-->
                        <div class="intro-y box p-5">
                        <table class="table table-striped table-bordered" id="ji_table">
                            <thead>
                                <tr>
                                    <th>RFQ#</th>
                                    <th>Date</th>
                                    <th>Manager</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($job_inquiries)): ?>
                                    
                                    <?php $__currentLoopData = $job_inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ji->code); ?></td>
                                            <td><?php echo e($ji->date); ?></td>
                                            <td><?php echo e($ji->manager_name); ?></td>
                                            <td><?php echo e($ji->status); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                            <div class="dropdown-menu w-40">
                            </div>
                        </div>
                        </div>
                    </div>

                        <div class="col-lg-6">
                            <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Bills</h2>
                            </div>
                            <div class="intro-y box p-5">
                            <!--<div class="mt-8">-->
                            <!--</div>-->
                            <table class="table table-striped table-bordered" id="bill_table">
                                <thead>
                                    <tr>
                                        <th>Bill No.</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($bill)): ?>
                                    <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php
                                            foreach($sender as $customer){

                                            if($customer->id == $billData->bill_customer){

                                                $cust = explode(' ',$customer->name);

                                                $result ='';

                                                echo date('ym',strtotime($billData->bill_date));

                                                echo '/';

                                                foreach($cust as $name){

                                                $result .= substr($name,0,1);

                                                }

                                                $wrd = substr($result,0,2);

                                                $wrd = str_replace('(',"",$wrd);

                                                $wrd = str_replace('&',"",$wrd);

                                                echo $wrd;

                                            }

                                            }

                                            ?><?php echo e($billData->bill_Number); ?>

                                        </td>
                                        <!-- 1 -->
                                        <td>
                                            <?php
                                            foreach($sender as $customer){

                                            if($customer->id == $billData->bill_customer){

                                                echo $customer->name;

                                            }

                                            }

                                            ?>
                                        </td>
                                        <!-- 2 -->
                                        <td><?php echo e($billData->bill_date); ?></td>
                                        <!-- 3 -->
                                        <td class="saif_td_______________">
                                            <a href="javascript:void(0)" onclick="view_update(<?php echo e($billData->bill_id); ?>)">
                                            <i data-feather="eye" style="width: 15px;"></i> View</a>
                                            <!-- ||| -->
                                            <?php if($deletion == 1){?>
                                            <a href="<?php echo url('removeBillRecord/'.$billData->bill_id); ?>" id="showBox<?php echo $serial; ?>">
                                            <!--<i class="fa fa-times"></i></a>-->
                                            <?php }else{ ?>
                                            <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                                            <!--<i class="fa fa-times"></i>-->
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <!-- 5 -->
                                    </tr>
                                    <script>
                                        $(document).ready(function(){

                                            $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){

                                                e.preventDefault();

                                                $("#dialog-confirm").dialog("close");

                                            });

                                            $("#datatable").on("click","#showBox<?php echo $serial; ?>",function(e){

                                                e.preventDefault();

                                                $("#dialog-confirm")

                                                .dialog("option", "title", "Please Confirm")

                                                .dialog("open").find("a.ok").attr({href: this.href, target: this.target});

                                            });

                                        });

                                    </script>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">Best Manager</h2>
                            </div>
                            <div class="intro-y box p-5">
                                <!--<div class="mt-8">-->
                                <!--</div>-->
                                <table class="table table-striped table-bordered" id="rfq_table">
                                    <thead>
                                    <tr>
                                        <th>Manager</th>
                                        <th>Mature Count</th>
                                        <th>Immature Count</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($manager_wise_rfq)): ?>
                                        <?php $__currentLoopData = $manager_wise_rfq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rfq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($rfq->manager_name); ?></td>
                                            <td><?php echo e($rfq->mature_count); ?></td>
                                            <td><?php echo e($rfq->immature_count); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">CDO</h2>
                            </div>
                            <div class="intro-y box p-5">
                                <!--<div class="mt-8">-->
                                <!--</div>-->
                                <table class="table table-striped table-bordered" id="cdo_table">
                                    <thead>
                                    <tr>
                                        <th>Cdo No</th>
                                        <th>Do Date</th>
                                        <th>BL#</th>
                                        <th>Deposit Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($cdos)): ?>
                                            <?php $__currentLoopData = $cdos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($cdo->csm_no); ?></td>
                                                    <td><?php echo e($cdo->do_date); ?></td>
                                                    <td><?php echo e($cdo->bl_no); ?></td>
                                                    <td><?php echo e($cdo->deposit_amount); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>









                            
                        </div>







                    <?php else: ?>
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Dashboard
                            </h2>
                            

                            <a href="" class="ml-auto flex items-center " style="color:#000"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>

                        
                    <div class="grid grid-cols-12 gap-6 mt-5 grid_col_dashboard">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                    <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                    </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="customer_count"><?php echo e($customer); ?></div>
                                <div class="text-base text-gray-600 mt-1">Total Customer</div>
                            </div>
                        </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="broker_count"></div>
                                <div class="text-base text-gray-600 mt-1">Total Brokers</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="shipping_line_count"></div>
                                <div class="text-base text-gray-600 mt-1">Shipping Line</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="all_bill_count"></div>
                                <div class="text-base text-gray-600 mt-1">All Bills Made</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="all_rfq_count"></div>
                                <div class="text-base text-gray-600 mt-1">Rfq Made</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="all_employees_count"></div>
                                <div class="text-base text-gray-600 mt-1">All Employees</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="all_users_count"></div>
                                <div class="text-base text-gray-600 mt-1">All Users</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success cursor-pointer">
                                        33%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="all_stations_count"></div>
                                <div class="text-base text-gray-600 mt-1">All Stations</div>
                            </div>
                            </div>
                        </div>


                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                        2%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="total_builties"><?php echo e($no_of_builties); ?></div>
                                <div class="text-base text-gray-600 mt-1">No of Bilties</div>
                            </div>
                        </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                        12%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="builties_total_amount"></div>
                                <div class="text-base text-gray-600 mt-1">Total Builties Amount</div>
                            </div>
                        </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                        22%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="total_expenses_payable_to_broker"><?php echo e(number_format($total_expenses, 0, '.', ',')); ?>

                                </div>
                                <div class="text-base text-gray-600 mt-1">Payables to Brokers</div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Lists
                    </h2>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Latest Customer
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                            <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        </div>
                        </div>
                        <!--mt-12 sm:mt-5-->
                        <div class="intro-y box p-5">
                        <table class="table table-striped table-bordered" id="customer_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Prefix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($customers)): ?>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($cst->name); ?></td>
                                            <td><?php echo e(isset($cst->prefix) ? $cst->prefix : ''); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                            <div class="dropdown-menu w-40">
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Latest RFQ's
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                            <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        </div>
                        </div>
                        <!--mt-12 sm:mt-5-->
                        <div class="intro-y box p-5">
                        <table class="table table-striped table-bordered" id="ji_table">
                            <thead>
                                <tr>
                                    <th>RFQ#</th>
                                    <th>Date</th>
                                    <th>Manager</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($job_inquiries)): ?>
                                    
                                    <?php $__currentLoopData = $job_inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ji->code); ?></td>
                                            <td><?php echo e($ji->date); ?></td>
                                            <td><?php echo e($ji->manager_name); ?></td>
                                            <td><?php echo e($ji->status); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                            <div class="dropdown-menu w-40">
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Latest Bilties
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                            <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        </div>
                        </div>
                        <!--mt-12 sm:mt-5-->
                        <div class="intro-y box p-5">
                        <table class="table table-striped table-bordered" id="builty_table">
                            <thead>
                                <tr>
                                    <th>Job#</th>
                                    <th>Date</th>
                                    <th>From</th>

                                    <th>To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($builties)): ?>
                                    
                                    <?php $__currentLoopData = $builties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $builty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $tostation = DB::table('now_station')->where('now_station.id',$builty->to)->first();
                                        $customer = DB::table('customer')->where('id',$builty->customer_id)->first();
                                        ?>

                                        <tr>
                                            <td><?php echo e($customer->name); ?></td>
                                            <td><?php echo e($builty->date); ?></td>
                                            <td><?php echo e((!empty($tostation) ? $tostation->name : '' )); ?></td>
                                            <td>
                                            <a href="<?php echo e(route('generate-bilty',['id'=>$builty->bid])); ?>"> GENERATE BUILTY</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                            <div class="dropdown-menu w-40">
                            </div>
                        </div>
                        </div>
                    </div>

                        <div class="col-lg-6">
                            <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Bills</h2>
                            </div>
                            <div class="intro-y box p-5">
                            <!--<div class="mt-8">-->
                            <!--</div>-->
                            <table class="table table-striped table-bordered" id="bill_table">
                                <thead>
                                    <tr>
                                        <th>Bill No.</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($bill)): ?>
                                    <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php
                                            foreach($sender as $customer){

                                            if($customer->id == $billData->bill_customer){

                                                $cust = explode(' ',$customer->name);

                                                $result ='';

                                                echo date('ym',strtotime($billData->bill_date));

                                                echo '/';

                                                foreach($cust as $name){

                                                $result .= substr($name,0,1);

                                                }

                                                $wrd = substr($result,0,2);

                                                $wrd = str_replace('(',"",$wrd);

                                                $wrd = str_replace('&',"",$wrd);

                                                echo $wrd;

                                            }

                                            }

                                            ?><?php echo e($billData->bill_Number); ?>

                                        </td>
                                        <!-- 1 -->
                                        <td>
                                            <?php
                                            foreach($sender as $customer){

                                            if($customer->id == $billData->bill_customer){

                                                echo $customer->name;

                                            }

                                            }

                                            ?>
                                        </td>
                                        <!-- 2 -->
                                        <td><?php echo e($billData->bill_date); ?></td>
                                        <!-- 3 -->
                                        <td class="saif_td_______________">
                                            <a href="javascript:void(0)" onclick="view_update(<?php echo e($billData->bill_id); ?>)">
                                            <i data-feather="eye" style="width: 15px;"></i> View</a>
                                            <!-- ||| -->
                                            <?php if($deletion == 1){?>
                                            <a href="<?php echo url('removeBillRecord/'.$billData->bill_id); ?>" id="showBox<?php echo $serial; ?>">
                                            <!--<i class="fa fa-times"></i></a>-->
                                            <?php }else{ ?>
                                            <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                                            <!--<i class="fa fa-times"></i>-->
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <!-- 5 -->
                                    </tr>
                                    <script>
                                        $(document).ready(function(){

                                            $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){

                                                e.preventDefault();

                                                $("#dialog-confirm").dialog("close");

                                            });

                                            $("#datatable").on("click","#showBox<?php echo $serial; ?>",function(e){

                                                e.preventDefault();

                                                $("#dialog-confirm")

                                                .dialog("option", "title", "Please Confirm")

                                                .dialog("open").find("a.ok").attr({href: this.href, target: this.target});

                                            });

                                        });

                                    </script>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Best Manager</h2>
                        </div>
                        <div class="intro-y box p-5">
                            <!--<div class="mt-8">-->
                            <!--</div>-->
                            <table class="table table-striped table-bordered" id="rfq_table">
                                <thead>
                                <tr>
                                    <th>Manager</th>
                                    <th>Mature Count</th>
                                    <th>Immature Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($manager_wise_rfq)): ?>
                                    <?php $__currentLoopData = $manager_wise_rfq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rfq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($rfq->manager_name); ?></td>
                                        <td><?php echo e($rfq->mature_count); ?></td>
                                        <td><?php echo e($rfq->immature_count); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    </div>

                <?php endif; ?>






               </div>
               <!-- END: General Report -->
               <!-- BEGIN: Sales Report -->
            </div>
         </div>
      </div>
      <!-- END: Content -->
   </div>
   </table>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.js"></script>
<script>
   // chart new 1 start

   const ctx = document.getElementById('myChart');

   const myChart = new Chart(ctx, {

       type: 'bar',

       data: {

           labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],

           datasets: [{

               label: '# of Votes',

               data: [12, 19, 3, 5, 2, 3],

               backgroundColor: [

                   'rgba(255, 99, 132, 0.2)',

                   'rgba(54, 162, 235, 0.2)',

                   'rgba(255, 206, 86, 0.2)',

                   'rgba(75, 192, 192, 0.2)',

                   'rgba(153, 102, 255, 0.2)',

                   'rgba(255, 159, 64, 0.2)'

               ],

               borderColor: [

                   'rgba(255, 99, 132, 1)',

                   'rgba(54, 162, 235, 1)',

                   'rgba(255, 206, 86, 1)',

                   'rgba(75, 192, 192, 1)',

                   'rgba(153, 102, 255, 1)',

                   'rgba(255, 159, 64, 1)'

               ],

               borderWidth: 1

           }]

       },

       options: {

           scales: {

               y: {

                   beginAtZero: true

               }

           }

       }

   });

   // chart new 1 close

   // chart new 1 start

   var ctx_ = document.getElementById('myChart_').getContext('2d');

   var chart_ = new Chart(ctx_, {

   	// The type of chart we want to create

   	type: 'line', // also try bar or other graph types



   	// The data for our dataset

   	data: {

   		labels: ["Jun 2016", "Jul 2016", "Aug 2016", "Sep 2016", "Oct 2016", "Nov 2016", "Dec 2016", "Jan 2017", "Feb 2017", "Mar 2017", "Apr 2017", "May 2017"],

   		// Information about the dataset

       datasets: [{

   			label: "Rainfall",

   			backgroundColor: 'lightblue',

   			borderColor: 'royalblue',

   			data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],

   		}]

   	},



   	// Configuration options

   	options: {

       layout: {

         padding: 10,

       },

   		legend: {

   			position: 'bottom',

   		},

   		title: {

   			display: true,

   			text: 'Precipitation in Toronto'

   		},

   		scales: {

   			yAxes: [{

   				scaleLabel: {

   					display: true,

   					labelString: 'Precipitation in mm'

   				}

   			}],

   			xAxes: [{

   				scaleLabel: {

   					display: true,

   					labelString: 'Month of the Year'

   				}

   			}]

   		}

   	}

   });





</script>
<script>
   var botmanWidget = {

       aboutText: 'Start the conversation with Hi',

       introMessage: "WELCOME TO ALL ABOUT LARAVEL"

   };

</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script>
   var countries= document.getElementById("myChart__").getContext("2d");

   // draw pie chart

   new Chart(countries).Pie(pieData, pieOptions);

   // bar chart data

   var barData = {

       labels : ["January","February","March","April","May","June"],

       datasets : [

           {

               fillColor : "#48A497",

               strokeColor : "#48A4D1",

               data : [456,479,324,569,702,600]

           },

           {

               fillColor : "rgba(73,188,170,0.4)",

               strokeColor : "rgba(72,174,209,0.4)",

               data : [364,504,605,400,345,320]

           }

       ]

   }

   // get bar chart canvas

   var income = document.getElementById("income").getContext("2d");

   // draw bar chart

   new Chart(income).Bar(barData);

















   /*=========================================

   User Acquisition

   ===========================================*/

   var acquisition = document.getElementById('acquisition');



   var acChart = new Chart(acquisition, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],

   datasets: [

   {

   label: "Referral",

   backgroundColor: 'rgb(76, 132, 255)',

   borderColor: 'rgba(76, 132, 255,0)',

   data: [78, 88, 68, 74, 50, 55, 25],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(76, 132, 255,0)',

   pointHoverBackgroundColor: 'rgba(76, 132, 255,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "Direct",

   backgroundColor: 'rgb(254, 196, 0)',

   borderColor: 'rgba(254, 196, 0,0)',

   data: [88, 108, 78, 95, 65, 73, 42],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(254, 196, 0,0)',

   pointHoverBackgroundColor: 'rgba(254, 196, 0,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "Social",

   backgroundColor: 'rgb(41, 204, 151)',

   borderColor: 'rgba(41, 204, 151,0)',

   data: [103, 125, 95, 110, 79, 92, 58],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(41, 204, 151,0)',

   pointHoverBackgroundColor: 'rgba(41, 204, 151,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },



   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {

    beginAtZero: true,

   },

   }]

   },

   tooltips: {

   }

   }

   });

   document.getElementById('customLegend').innerHTML = acChart.generateLegend();

   /*=========================================

   Analytic activity Chart

   ===========================================*/

   var activity = document.getElementById('activity');



   var chart = new Chart(activity, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],

   datasets: [

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(82, 136, 255)',

   data: [0, 65, 52, 115, 98, 165, 125],

   lineTension: 0,

   pointRadius: 4,

   pointBackgroundColor: 'rgba(255,255,255,1)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 8,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(255, 199, 15)',

   data: [45, 38, 100, 87, 152, 187, 85],

   lineTension: 0,

   borderDash: [10,5],

   pointRadius: 4,

   pointBackgroundColor: 'rgba(255,255,255,0)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 8,

   pointHitRadius: 30,

   pointBorderWidth: .3,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {



   },

   }]

   },

   tooltips: {

   }

   }

   });

   /*=========================================

   Line Chart

   ===========================================*/

   var ctx = document.getElementById('linechart');



   var chart = new Chart(ctx, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],

   datasets: [

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(82, 136, 255)',

   data: [2000, 11000, 10000, 14000, 11000, 17000, 14500,18000,12000,23000,17000,23000],

   lineTension: 0.3,

   pointRadius: 5,

   pointBackgroundColor: 'rgba(255,255,255,1)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 10,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {

   callback: function(value) {

     var ranges = [

       { divider: 1e6, suffix: 'M' },

       { divider: 1e3, suffix: 'k' }

     ];

     function formatNumber(n) {

       for (var i = 0; i < ranges.length; i++) {

         if (n >= ranges[i].divider) {

           return (n / ranges[i].divider).toString() + ranges[i].suffix;

         }

       }

       return n;

     }

     return '$' + formatNumber(value);

   }

   },

   }]

   },

   tooltips: {

   callbacks: {

   title: function(tooltipItem, data) {

   console.log(data);

   console.log(tooltipItem);

   return data['labels'][tooltipItem[0]['index']];

   },

   label: function(tooltipItem, data) {

   return  '$' + data['datasets'][0]['data'][tooltipItem['index']];

   },

   },

   backgroundColor: '#606060',

   titleFontSize: 14,

   titleFontColor: '#ffffff',

   bodyFontColor: '#ffffff',

   bodyFontSize: 18,

   displayColors: false

   }

   }

   });



   /*=========================================

   Bar Chart

   ===========================================*/

   var barX = document.getElementById("barChart").getContext('2d');



   var myChart = new Chart(barX, {

   type: 'bar',

   data: {

   labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],

   datasets: [{

   label: '',

   data: [5, 6, 4.5, 5.5, 3, 6,4.5,6,8,3,5.5,4],

   backgroundColor: '#4c84ff',

   }]

   },

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   drawBorder: false,

   display:false

   },

   ticks: {

   display:false, // hide main x-axis line

   beginAtZero:true

   },

   barPercentage: 1.8,

   categoryPercentage: 0.2

   }],

   yAxes: [{

   gridLines: {

   drawBorder: false, // hide main y-axis line

   display:false

   },

   ticks: {

   display:false,

   beginAtZero:true

   },

   }]

   },

   tooltips: {

   enabled: false

   }

   }

   });



   /*=========================================

   Doughnut Chart

   ===========================================*/

   var doughnut = document.getElementById("doChart");

   var myDoughnutChart = new Chart(doughnut, {

   type: 'doughnut',

   data: {

   labels:["completed","unpaid", "pending", "canceled"],

   datasets: [{

   label: ["completed","unpaid", "pending", "canceled"],

   data: [4100,2500, 1800, 2300],

   backgroundColor: ['#4c84ff','#29cc97','#8061ef','#fec402'],

   // borderColor: ['#4c84ff','#29cc97','#8061ef','#fec402']

   hoverBorderColor: [ "#4c84ff","#29cc97","#8061ef","#fec402"]

   }]

   },

   options: {

   legend: {

   display: false

   },

   cutoutPercentage: 80,

   tooltips: {

   callbacks: {

   title: function(tooltipItem, data) {

   console.log(data);

   console.log(tooltipItem);

   return 'Order '+ data['labels'][tooltipItem[0]['index']];

   },

   label: function(tooltipItem, data) {

   return  data['datasets'][0]['data'][tooltipItem['index']];

   },



   afterLabel: function(tooltipItem, data) {

   // var dataset = data['datasets'][0];

   // var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)

   // return '(' + percent + '%)';

   }

   },

   backgroundColor: '#ffffff',

   titleFontSize: 14,

   titleFontColor: '#8a909d',

   bodyFontColor: '#1b223c',

   bodyFontSize: 18,

   displayColors: false

   }

   }

   });

</script>



<script>
    // Function to fetch and update widget data
    var dashboardId = 1;
    function fetchWidgetData(dashboardId) {
        $.ajax({
            url: "<?php echo e(url('/dashboard')); ?>/" + dashboardId + "/widget-data",
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // Update the widgets with the data received
                // console.log('ajax called');
                data = data.data;
                var customer_count = data.customers;
                var broker_count = data.brokers;
                var shipping_line_count = data.shipping_line;
                var all_bill_count = data.bills_made;
                var all_rfq_count = data.all_rfq;
                var all_employees_count = data.all_employees;
                var all_users_count = data.all_users;
                var all_stations_count = data.all_stations;
                var receiveables = data.selling_expenses;
                var payables = data.purchasing_expenses;
                var sum_of_salaries = data.sum_of_salaries;

                var no_of_builties = data.no_of_builties;
                var builties_total = data.BuiltiesTotal;
                var total_expenses_payable_to_broker = data.total_expenses_payable_to_broker;

                // console.log(builties_total);

                $('#customer_count').text(customer_count);
                $('#broker_count').text(broker_count);
                $('#shipping_line_count').text(shipping_line_count);
                $('#all_bill_count').text(all_bill_count);
                $('#all_rfq_count').text(all_rfq_count);
                $('#all_employees_count').text(all_employees_count);
                $('#all_users_count').text(all_users_count);
                $('#receiveables').text(receiveables);
                $('#payables').text(payables);
                $('#sum_of_salaries').text(sum_of_salaries);

                $('#total_builties').text(no_of_builties);
                let formattedValue = formatNumber(builties_total);
                $('#builties_total_amount').text(formattedValue);
                $('#total_expenses_payable_to_broker').text(total_expenses_payable_to_broker);


                $('#ji_table tbody').empty();
                $.each(data.job_inquiries, function(index, ji) {
                    var row = `<tr>
                        <td>${ji.code}</td>
                        <td>${ji.date}</td>
                        <td>${ji.manager_name}</td>
                        <td>${ji.status}</td>
                    </tr>`;
                    $('#ji_table tbody').append(row);
                });

                // $('#customer_table tbody').empty();
                $.each(data.all_customers, function(index, cst) {
                    var row = `<tr>
                        <td>${cst.name}</td>
                        <td>${cst.prefix}</td>
                    </tr>`;
                    $('#customer_table tbody').append(row);
                });

                $('#rfq_table tbody').empty();
                $.each(data.manager_wise_rfq, function(index, rfq) {
                    var row = `<tr>
                        <td>${rfq.manager_name}</td>
                        <td>${rfq.mature_count}</td>
                        <td>${rfq.immature_count}</td>
                    </tr>`;
                    $('#rfq_table tbody').append(row);
                });


                $('#builty_table tbody').empty();
                $.each(data.bilties, function(index, builty) {
                    var row = `<tr>
                        <td>${builty.job_inquiry_code}</td>
                        <td>${builty.date}</td>
                        <td>${builty.from_station_name}</td>
                        <td>${builty.to_station_name}</td>
                        <td><a href="<?php echo e(route('generate-bilty', ['id' => ''])); ?>${builty.bid}">GENERATE BUILTY</a></td>
                    </tr>`;
                    $('#builty_table tbody').append(row);
                });

                // $('#bill_table tbody').empty();
                $.each(data.bills, function(index, bill) { // Assuming 'data.bills' contains the bill data
                    var customer_name = bill.customer_name || ''; // Use appropriate property to get customer name
                    var row = `<tr>
                        <td>${bill.bill_Number}</td>
                        <td>${customer_name}</td>
                        <td>${bill.bill_date}</td>
                        <td class="saif_td_______________">
                            <a href="javascript:void(0)" onclick="view_update(${bill.bill_id})">
                                <i data-feather="eye" style="width: 15px;"></i> View
                            </a>
                            <!-- Handle deletion permissions here -->
                            <?php if($deletion == 1): ?>
                                <a href="<?php echo e(url('removeBillRecord/' . '${bill.bill_id}')); ?>">
                                    <!-- Optional delete icon here -->
                                </a>
                            <?php else: ?>
                                <a href="#" data-toggle="tooltip" title="You don't have enough permission for this action.">
                                    <!-- Optional disabled delete icon here -->
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>`;
                    $('#bill_table tbody').append(row)
                });


            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch widget data:', error);
            }
        });
    }
    var dashboardId = 1; // Replace with the actual dashboard ID
    setInterval(function() {
        fetchWidgetData(dashboardId);
    }, 30000);
    // Initial call to populate the dashboard widgets
    fetchWidgetData(1);
    function formatNumber(value) {
        if (value >= 1e9) {
            // Billions
            return (value / 1e9).toFixed(2) + ' Billion';
        } else if (value >= 1e7) {
            // Crores (10 million)
            return (value / 1e7).toFixed(2) + ' Crore';
        } else if (value >= 1e5) {
            // Lacs (100 thousand)
            return (value / 1e5).toFixed(2) + ' Lac';
        } else if (value >= 1e3) {
            // Thousands
            return (value / 1e3).toFixed(2) + ' Thousand';
        } else {
            // Less than thousand
            return value.toString();
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xamp_7.2.5\htdocs\projects\software2\sms\resources\views/home.blade.php ENDPATH**/ ?>