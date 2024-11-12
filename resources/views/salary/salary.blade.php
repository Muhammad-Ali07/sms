@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">

   @include('includes.side-nav')
   <!-- BEGIN: Content -->
    <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
               <!-- BEGIN: Breadcrumb -->
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Salary</a> </div>
               <!-- END: Breadcrumb -->
               <!-- BEGIN: Search -->
               <div class="intro-x relative mr-3 sm:mr-6">
                  <div class="search hidden sm:block">
                     <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
                     <i data-feather="search" class="search__icon dark:text-gray-300"></i> 
                  </div>
                  <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                  <div class="search-result">
                     <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center">
                              <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                              <div class="ml-3">Mail Settings</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                              <div class="ml-3">Users & Permissions</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                              <div class="ml-3">Transactions Report</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              </div>
                              <div class="ml-3">Charlize Theron</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">charlizetheron@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              </div>
                              <div class="ml-3">Al Pacino</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                           </div>
                           <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-12.jpg">
                           </div>
                           <div class="ml-3">Samsung Q90 QLED TV</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                           </div>
                           <div class="ml-3">Nike Air Max 270</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                           </div>
                           <div class="ml-3">Sony Master Series A9G</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                     </div>
                  </div>
               </div>
               <!-- END: Search -->
               <!-- BEGIN: Notifications -->
               <div class="intro-x dropdown mr-auto sm:mr-6">
                  <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                  <div class="notification-content pt-2 dropdown-menu">
                     <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Notifications -->
               <!-- BEGIN: Account Menu -->
               <div class="intro-x dropdown w-8 h-8">
                  <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                     <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
                  </div>
                  <div class="dropdown-menu w-56">
                     <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                           <div class="font-medium">Charlize Theron</div>
                           <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                        </div>
                        <div class="p-2">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Account Menu -->
            </div>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Employee Salary</h2>
                <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <meta name="csrf-token" content="{{csrf_token()}}">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <meta name="csrf-token" content="{{csrf_token()}}">
                      <input value={{date("d-m-Y")}} type="date" name="date" id="salaryDate" value="<?php if(isset($emp[0]->emp_id)){echo date('d-m-Y',strtotime($emp[0]->emp_date_join));} ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <button id="getEmp" class="btn btn-default">Get Employee</button>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="showEmp">
                  <div class="ln_solid"></div>
                  <div class="empData"></div>
                </div>
              </span>
            </div>
          </div>
        </div>
        <script>
        $(document).ready(function(){

            $(document).on('click','#getEmp', function(){
              var current_context = $(this).val();
              $.ajaxSetup({
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{ url('getEmployeeData') }}",
                type:'POST',
                data:$("#salaryDate").serialize(),
                success:function(data){
                  $('.empData').html(data);
                }
              });
            });
          });
        </script>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Employee Advance \ Return</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <?php
              if(isset($emp[0]->emp_id)){
                $form = url('updateEmp');
              }else{
                $form = url('addSalary');
              }
            ?>
            <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
              @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif

              <form method="post" action='{{$form}}'>
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="hidden" name="id" id="id" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_id;} ?>" class="form-control col-md-7 col-xs-12">
                <meta name="csrf-token" content="{{csrf_token()}}">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Type</span>
                  </label>
									<meta name="csrf-token" content="{{csrf_token()}}">
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="type" id="type">
											<option value="">Please select an option</option>
											<option value="Advance">Advance</option>
											<option value="Return">Return</option>
										</select>
                  </div>
                </div>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input value={{date("d-m-Y")}} type="date" name="date" id="datepicker" value="<?php if(isset($emp[0]->emp_id)){echo date('d-m-Y',strtotime($emp[0]->emp_date_join));} ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select a employee</span>
                  </label>

                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="employee" id="employee">
											<option value="">Please select an option</option>
											@foreach($employee as $wrkr)
											<option value="{{$wrkr->employeeID}}">{{$wrkr->fullName}}</option>
											@endforeach
										</select>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Description</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="desc" id="desc" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_phone;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="hide1">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Salary Amount</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="salary" readonly id="salary" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_mobile;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="hide2">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Salary Deduction</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="deduct"  value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_mobile;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="hide3">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Amount</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="advance"  value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_mobile;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="clearfix"></div>
                <hr/>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h2>Current Balance : <span id="balance"></span></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-default" type="reset">Reset</button>
                    <input type="submit" name="insertdata" class="btn btn-success" value="Save" <?php if($insertion == 0){echo 'disabled'; }?>>
                  </div>
                </div>
              </form>
            </span>
            <!-- FORM ENDS HERE -->
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>View Employee Salaries</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Date</th>
                  <th>Employee</th>
                  <th>Description</th>
									<th>Reference</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
				@foreach($salary1 as $sal)
                <tr>
                    <td>{{-- $sal->sal_id --}}</td>
                    <td>{{date('d-m-Y',strtotime($sal->sal_date))}}</td>
                    <td>{{$sal->sal_emp_name}}</td>
                    <td>{{$sal->sal_desc}}</td>
                    <td>{{$sal->sal_reference}}</td>
				    <td>{{$sal->sal_amount}}</td>
                </tr>
								@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Salary Reporting</h2>
            <div class="clearfix"></div>
          </div>
          <form name="form2" id="form2" method="post" action="{{url('salary_report')}}">
          <input type="hidden" value="{{ csrf_token() }}" name="_token" />
          <div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">From Date :</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="date" id="datepicker2" name="from" class="form-control col-md-7 col-xs-12" />
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">To Date :</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="date" id="datepicker3" name="to" class="form-control col-md-7 col-xs-12" />
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-default" type="reset">Reset</button>
                <input type="submit" name="insertdata" class="btn btn-success" value="Generate Report">
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
		$(document).on('change','#employee', function(){
      var current_context = $(this).val();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:"{{ url('getEmployeeSalary') }}",
        type:'POST',
        data:$("#employee").serialize(),
        success:function(data){
          $('#salary').val(data);
        }
      });
    });
    $(document).on('change','#employee', function(){
      var current_context = $(this).val();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:"{{ url('getEmployeeBalance') }}",
        type:'POST',
        data:$("#employee").serialize(),
        success:function(data){
          $('#balance').text(data);
        }
      });
    });
    $('#hide1').hide();
    $('#hide2').hide();
    $('#hide3').show();
    $('#type').change(function(){
      if($('#type').val() == "Advance"){
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').show();
      }
      if($('#type').val() == "Return"){
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').show();
      }
    });
	});
</script>
@endsection