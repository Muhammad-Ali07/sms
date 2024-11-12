@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 @php
   $edition = 1;
   $deletion =1 ;
 @endphp
 <div class="flex">
       @include('includes.side-nav')
         <!-- BEGIN: Content -->
               <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
               <!-- BEGIN: Breadcrumb -->
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
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


<div class="right_col" role="main" style="min-height: 1704px;">
          <!-- top tiles -->

          <!-- /top tiles -->
          <!-- / Start Date to Date Report -->
          <div class="clearfix"></div>
                <form method="POST" name="servicecharges_report" align="center" action="{{url('servicecharges_report')}}"  >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="col-md-4 col-xs-12 col-lg-4">
                    <label class="form-label">FROM DATE </label>
                        <div class="controls">
                        <input type="text" name="from_date"  id="datepicker1" class="form-control single_cal2"  required="required"  placeholder="From Date" >
                        </div>
                </div>
                <div class="col-md-4 col-xs-12 col-lg-4">
                    <label class="form-label">TO DATE </label>
                        <div class="controls">
                        <input type="text" name="to_date"  id="datepicker2" class="form-control single_cal2"  required="required" placeholder="To Date" >
                        </div>
                </div>
                    <div class="col-md-2 col-xs-12 col-lg-2">
                    <button type="submit" class="signbuttons btn btn-primary button_call" name="servicecharges_report" class="servicecharges_report" id="btn_submit" style="margin-top:23px;">Generate Report </button>
                    </div>
                </form>
                <hr />
                <!-- /Date to Date Report -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Bank Service Charges </h3>
                  </div>
                </div>
            @if(Session::has('error_message')) <div class="alert alert-danger"> {{Session::get('error_message')}} </div> @endif
            @if(Session::has('success_message')) <div class="alert alert-success"> {{Session::get('success_message')}} </div> @endif
            <?php
              if(isset($service_records[0]->PKServiceChargesID)){
                $formUrl = url('editServiceCharges');
              }else{
                $formUrl = url('bankservicecharges_insert');
              }
            ?>
            <form action="{{ $formUrl }}" class="demo-form2" name="bankservicecharges_form_validate" method="post" class="bankservicecharges_form_validate">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="<?php if(isset($service_records[0]->PKServiceChargesID)){echo $service_records[0]->PKServiceChargesID;} ?>">
            <input type="hidden" name="bnkid" value="<?php if(isset($service_records[0]->FKBankID)){echo $service_records[0]->FKBankID; }?>">
            <input type="hidden" name="preamount" value="<?php if(isset($service_records[0]->Amount)){echo $service_records[0]->Amount; }?>">
            <div class="col-md-6 col-xs-12 col-lg-6">
            <meta name="csrf-token" content="{{csrf_token()}}">
                <div class="form-group">
                    <label class="form-label" id="deposit_bank_name">Deposit Bank Name<span class="red-color">*</span></label>
                    <div class="controls">
                        <select id="bank_id" name="bank_id" class="form-control">
                        <option value="">Select Deposit Bank</option>
                        <?php
                        if(isset($bank_records) && sizeof($bank_records) > 0){
                            foreach($bank_records as $rec){
                                if(isset($service_records[0]->FKBankID)){
                                  if($service_records[0]->FKBankID == $rec->PKBankID){
                                    echo '<option value="' . $rec->PKBankID . '" selected>' . $rec->BankName . '</option>';
                                  }else{
                                    echo '<option value="' . $rec->PKBankID . '">' . $rec->BankName . '</option>';
                                  }
                                }else{
                                  echo '<option value="' . $rec->PKBankID . '">' . $rec->BankName . '</option>';
                                }
                            }
                        }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="form-group">
                <label class="form-label"> Date <span class="red-color">*</span></label>
                    <div class="controls">

                        <input value={{date("d-m-Y")}} class="form-control " type="text" name="bankservicecharges_date" id="datepicker" placeholder="DD-MM-YYYY" required="required" value="<?php if(isset($service_records[0]->Date)){echo date('m-d-Y',strtotime($service_records[0]->Date));}?>">

                    </div>
                </div>
            </div>
            <br clear="all" />
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="form-group">
                <label class="form-label">Amount <span class="red-color">*</span></label>
                    <div class="controls">
                        <input class="form-control only-number" type="text" name="bankservicecharges_amount" id="bankservicecharges_amount" required="required" value="<?php if(isset($service_records[0]->Amount)){echo $service_records[0]->Amount;}?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="form-group">
                <label class="form-label">Description <span class="red-color">*</span></label>
                    <div class="controls">
                        <input class="form-control " type="text" name="description" id="description" value="<?php if(isset($service_records[0]->Description)){echo $service_records[0]->Description;}?>">
                    </div>
                </div>
            </div>
            <br clear="all" />
            <div id="previous-div">
                <h3>Bank Balance : <span id="previous" ></span></h3>
            </div>
            <button type="submit" class="signbuttons btn btn-primary button_call" id="btn_submit">Save</button>
            </form>
            <div class="clearfix"></div>
</div>
<hr>
<br clear="all" />


<script type="text/javascript">
$(document).on('change','#bank_id',function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $url='GetPreviousBalanceBank';
    $.ajax({
        url:$url,
        type:'POST',
        async: false,
        data:$("#bank_id").serialize(),
        success:function(data){
            //console.log(data);
            $('#previous').html(data);
        }
    });

});
if ($('.only-number').length > 0) {
    $('.only-number').keypress(function (event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            var enter = (!event.charCode ? event.which : event.charCode);
            if ((!regex.test(key)) && (enter != 13)) {
                event.preventDefault();
                return false;
            }
        }
    });
}
</script>
                    <div class="x_title">
                    <h2>Bank Service Charges Records </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>SN#</th>
		                        <th>Bank Name</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial_number = 0 ;
                        $res = 0 ;
                        if(isset($bank_service_charges_records) && sizeof($bank_service_charges_records) > 0){
                        ?>
                        <?php $serial = 0; ?>
                        @foreach($bank_service_charges_records as $rec)
                        <?php $serial += 1; ?>
                        <tr>
                          <td><?php echo $serial_number+=1 ;?></td>
                          <td>{{ $rec->BankName }} </td>
                          <?php
                          $Date = date('d-m-Y', strtotime($rec->Date));
                          ?>
                          <td>{{ $Date }} </td>
                          <td>{{ $rec->Description }} </td>
                          <td>{{ $rec->Amount }} </td>
                          <td>
                            <a href="<?php echo url('editBankServiceCharges/'.$rec->PKServiceChargesID.'/'.$rec->Amount); ?>" id="showBox<?php echo $serial; ?>">
                              <i class="fa fa-eye"></i>
                            </a>
                            &nbsp;|||&nbsp;
                            <a href="<?php echo url('deleteBankServiceCharges/'.$rec->PKServiceChargesID.'/'.$rec->Amount); ?>" id="showBox2<?php echo $serial; ?>">
                              <i class="fa fa-times"></i>
                            </a>
                          </td>
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
                        <script>
                        $(document).ready(function(){
                          $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                              e.preventDefault();
                              $("#dialog-confirm").dialog("close");
                          });
                          $("#datatable").on("click","#showBox2<?php echo $serial; ?>",function(e){
                              e.preventDefault();
                              $("#dialog-confirm")
                              .dialog("option", "title", "Please Confirm")
                              .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                          });
                        });
                        </script>
                        @endforeach
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection
