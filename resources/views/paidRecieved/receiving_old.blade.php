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
      <?php
         $insertion = 1;
         $edition = 1;
         $deletion = 1;
         ?>
      <div class="right_col" role="main" style="min-height: 1704px;">
         <!-- /top tiles -->
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="dashboard_graph">
                  <div class="row x_title">
                     <div class="col-md-6">
                        <h3>Received & Paid </h3>
                     </div>
                  </div>
                  @if(Session::has('error_message')) 
                  <div class="alert alert-danger"> {{Session::get('error_message')}} </div>
                  @endif
                  @if(Session::has('success_message')) 
                  <div class="alert alert-success"> {{Session::get('success_message')}} </div>
                  @endif
                  <?php
                     if(isset($record[0]->PKReceivingID)){
                       $form_action = url('receiving_update');
                     }else{
                       $form_action = url('receiving_insert');
                     }
                     ?>
                  <form action="<?php echo $form_action; ?>" class="demo-form2" name="receiving_form_validate" method="post" class="receiving_form_validate">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input type="hidden" name="id" value="<?php if(isset($record[0]->PKReceivingID)){echo $record[0]->PKReceivingID; }?>" />
                     <input type="hidden" name="preamount" value="<?php if(isset($record[0]->Amount)){echo $record[0]->Amount; }?>" />
                     <input type="hidden" name="bnkid" value="<?php if(isset($record[0]->FKBankID)){echo $record[0]->FKBankID; }?>" />
                     <input type="hidden" name="preofficeid" value="<?php if(isset($record[0]->FKOfficeID)){echo $record[0]->FKOfficeID; }?>" />
                     <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Entry Type <span class="red-color">*</span></label>
                           <div class="controls">
                              <select  name="entry_type" class="form-control" required="required" id="entry_type">
                                 <option value=""> Select Type </option>
                                 <option value="Payable" <?php if(isset($record[0]->entry_type)){if($record[0]->entry_type == 'Payable'){echo 'selected';}}?>>Paid</option>
                                 <option value="Receivable" <?php if(isset($record[0]->entry_type)){if($record[0]->entry_type == 'Receivable'){echo 'selected';}}?>>Received</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                           <label class="form-label"> Date <span class="red-color">*</span></label>
                           <div class="controls">
                              <input value={{date("d-m-Y")}} class="form-control " type="text" name="receiving_date" id="datepicker" placeholder="DD-MM-YYYY" required="required" value="<?php if(isset($record[0]->ReceivingDate)){if($record[0]->ReceivingDate){echo date('d-m-Y',strtotime($record[0]->ReceivingDate));}}?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-12 col-lg-6">
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        <div class="form-group" id="hidethis">
                           <label class="form-label">Customer Name<span class="red-color">*</span></label>
                           <div class="controls">
                              <select id="customer_id"  name="customer_id" class="form-control cus_id" >
                                 <option value="">Select Customer</option>
                                 <?php
                                    if(isset($customer_records) && sizeof($customer_records) > 0){
                                        foreach($customer_records as $rec){
                                            if(isset($record[0]->FKCustomerID)){
                                              if($record[0]->FKCustomerID == $rec->id){
                                                echo '<option value="' . $rec->id . '" selected>' . $rec->name . '</option>';
                                              }else{
                                                echo '<option value="' . $rec->id . '" >' . $rec->name . '</option>';
                                              }
                                            }else{
                                              echo '<option value="' . $rec->id . '">' . $rec->name . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-12 col-lg-6">
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        <div class="form-group" id="showthis">
                           <label class="form-label">Office Name<span class="red-color">*</span></label>
                           <div class="controls">
                              <select id="office" name="office" class="form-control">
                                 <option value="">Select Office</option>
                                 <?php
                                    if(isset($officeRecord) && sizeof($officeRecord) > 0){
                                      foreach($officeRecord as $rec){
                                        if(isset($record[0]->FKOfficeID)){
                                          if($record[0]->FKOfficeID == $rec->office_id){
                                            echo '<option value="' . $rec->office_id . '" selected>' . $rec->office_name . '</option>';
                                          }
                                        }
                                        echo '<option value="' . $rec->office_id . '">' . $rec->office_name . '</option>';
                                      }
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <br clear="all" />
                     <div class="col-md-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Amount <span class="red-color">*</span></label>
                           <div class="controls">
                              <input class="form-control only-number" type="text" name="receiving_amount" id="receiving_amount" required="required" value="<?php if(isset($record[0]->Amount)){echo $record[0]->Amount;}?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Payment Type <span class="red-color">*</span></label>
                           <div class="controls">
                              <select id="receiving_type" name="receiving_type" class="form-control" required="required">
                                 <option value=""> Select Type </option>
                                 <option value="Cash" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Cash'){echo 'selected'; }}?>>Cash</option>
                                 <option value="Cheque" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Cheque'){echo 'selected'; }}?>>Cheque</option>
                                 <option value="Challan" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Challan'){echo 'selected'; }}?>>Challan</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <br clear="all" />
                     <div class="bank-area hide-area">
                        <div class="col-md-4 col-xs-12 col-lg-4" id="bank_id">
                           <div class="form-group">
                              <label class="form-label">Payment Bank <span class="red-color">*</span></label>
                              <div class="controls">
                                 <input class="form-control" type="text" name="bank_id" value="<?php if(isset($record[0]->Payment_bank_description)){echo $record[0]->Payment_bank_description;}?>">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-lg-4">
                           <div class="form-group">
                              <label class="form-label">Cheque Number <span class="red-color">*</span></label>
                              <div class="controls">
                                 <input class="form-control " type="text" name="cheque_number" id="cheque_number" value="<?php if(isset($record[0]->ChequeNumber)){echo $record[0]->ChequeNumber;}?>">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-lg-4">
                           <div class="form-group">
                              <label class="form-label" id="deposit_bank_name">Deposit Bank Name<span class="red-color">*</span></label>
                              <div class="controls">
                                 <select id="deposit_bank_id" name="deposit_bank_id" class="form-control">
                                    <option value="">Select Bank</option>
                                    <?php
                                       if(isset($bank_records) && sizeof($bank_records) > 0){
                                         foreach($bank_records as $rec){
                                           if(isset($record[0]->FKBankID)){
                                             if($record[0]->FKBankID == $rec->PKBankID){
                                               echo '<option value="' . $rec->PKBankID . '" selected>' . $rec->BankName . '</option>';
                                             }else{
                                               echo '<option value="' . $rec->PKBankID . '" >' . $rec->BankName . '</option>';
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
                        <div class="col-md-4 col-xs-12 col-lg-4">
                           <div class="form-group">
                              <label class="form-label">Deposit Slip Number <span class="red-color">*</span></label>
                              <div class="controls">
                                 <input class="form-control " type="text" name="deposit_slip_number" id="deposit_slip_number" value="<?php if(isset($record[0]->Deposit_slip_number)){echo $record[0]->Deposit_slip_number;}?>">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- close bank-area -->
                     <div class="challan-area hide-area">
                        <div class="col-md-6 col-xs-12 col-lg-6">
                           <div class="form-group">
                              <label class="form-label">Bill Number <span class="red-color">*</span></label>
                              <div class="controls">
                                 <input class="form-control " type="text" name="bill_number" id="bill_number" >
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6">
                           <div class="form-group">
                              <label class="form-label">Challan Number <span class="red-color">*</span></label>
                              <div class="controls">
                                 <input class="form-control " type="text" name="challan_number" id="challan_number" >
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- close Challan area  -->
                     <div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                           <label class="form-label">Description <span class="red-color">*</span></label>
                           <div class="controls">
                              <input class="form-control" type="text" name="description" id="description" value="<?php if(isset($record[0]->description)){echo $record[0]->description;}?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                           <label class="form-label">Percent <span class="red-color">*</span></label>
                           <div class="controls">
                              <input class="form-control only-number" type="text" name="percent" id="percent" value="<?php if(isset($record[0]->Percentage)){echo $record[0]->Percentage;}else{ echo 0; }?>" >
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                           <label class="form-label">After Percent <span class="red-color">*</span></label>
                           <div class="controls">
                              <input class="form-control" readonly type="text" name="after_percent" id="after_percent" value="<?php if(isset($record[0]->AfterPercentage)){echo $record[0]->AfterPercentage;}?>" >
                           </div>
                        </div>
                     </div>
                     <br clear="all" />
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="overflow-x:auto;">
                           <h2>All Bills</h2>
                           <table class="table table-bordered" id="bils_ids">
                           </table>
                        </div>
                     </div>
                     <!--<div id="previous-div">
                        <h3>Previous Balance : <span id="previous" ></span></h3>
                        </div>-->
                     <?php
                        if(isset($type) && $type == "Edit"){
                        ?>
                     <button type="submit" class="signbuttons btn btn-default button_call" id="btn_submit" <?php if($insertion == 0){echo 'disabled';}?>>Update</button>
                     <?php }else{ ?>
                     <button type="submit" class="signbuttons btn btn-primary button_call" id="btn_submit" <?php if($insertion == 0){echo 'disabled';}?>>Save</button>
                     <?php } ?>
                  </form>
                  <div class="clearfix"></div>
               </div>
               <hr>
               <br clear="all" />
               @section('script')
               <script type="text/javascript">
                  var recamount = null;
                  var remamount = null;
                     <?php
                     if(isset($type) && $type == "Edit"){
                     ?>
                     $(document).on('keyup','#receiving_amount',function(){
                     var receiving_amount = $("#receiving_amount").val();
                     var percent = $("#percent").val();
                     var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                     var total = receiving_amount - multiply;
                     $("#after_percent").val(total);
                     });
                     $(document).on('keyup','#percent',function(){
                     var receiving_amount = $("#receiving_amount").val();
                     var percent = $("#percent").val();
                     var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                     var total = receiving_amount - multiply;
                     $("#after_percent").val(total);
                     });
                     <?php }else{ ?>
                     $(document).on('keyup','#receiving_amount',function(){
                     var receiving_amount = $("#receiving_amount").val();
                     var percent = $("#percent").val();
                     var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                     var total = receiving_amount - multiply;
                     $("#after_percent").val(total);
                     });
                     $(document).on('keyup','#percent',function(){
                     var receiving_amount = $("#receiving_amount").val();
                     var percent = $("#percent").val();
                     var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                     var total = receiving_amount - multiply;
                     $("#after_percent").val(total);
                     });
                     <?php } ?>
                     $(document).ready(function(){
                     $(".bank-area").hide();
                       $(".challan-area").hide();
                     });
                     $(document).on("change","#receiving_type",function(){
                     var current_context = $(this);
                     if(current_context.val() == "Cheque"){
                       $(".bank-area").show();
                       $(".challan-area").hide();
                     }else if(current_context.val() == "Challan"){
                       $(".bank-area").hide();
                       $(".challan-area").show();
                     }else{
                       $(".bank-area").hide();
                       $(".challan-area").hide();
                     }
                     });
                  
                  
                     $(document).ready(function(){
                     if($('#receiving_type').val() != ""){
                     var content_recived = $('#receiving_type').val();
                     console.log(content_recived);
                     if(content_recived == "Cheque"){
                     $(".bank-area").show();
                     $(".challan-area").hide();
                     }else if(content_recived == "Challan"){
                     $(".bank-area").hide();
                     $(".challan-area").show();
                     }else{
                     $(".bank-area").hide();
                     $(".challan-area").hide();
                     }
                     }
                     });
                     $(document).on("change","#entry_type",function(){
                     var current_context = $(this);
                     if(current_context.val() == "Payable"){
                       $("#bank_id").hide();
                       $("#previous-div").hide();
                       $("#deposit_bank_name").html('Withdraw Bank Name');
                     }else if(current_context.val() == "Receivable"){
                       $("#bank_id").show();
                       $("#deposit_bank_name").html('Deposit Bank Name');
                     }
                     });
                     $(document).ready(function(){
                     var current_context = $('#entry_type').val();
                     if(current_context == "Payable"){
                     $("#bank_id").hide();
                     $("#previous-div").hide();
                     $("#deposit_bank_name").html('Withdraw Bank Name');
                     }else if(current_context == "Receivable"){
                     $("#bank_id").show();
                     $("#deposit_bank_name").html('Deposit Bank Name');
                     }
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
                  
                     $(document).ready(function(){
                       $('#showthis').hide();
                       $('#hidethis').show();
                  
                       $('#entry_type').change(function(){
                         if($('#entry_type').val() == "Payable"){
                           option = '<option value="Petty Cash">Petty Cash</option>';
                           $('#receiving_type').append(option);
                         //  $('select').selectpicker('refresh');
                         }else{
                           $("#receiving_type option[value='Petty Cash']").remove()
                          // $('select').selectpicker('refresh');
                         }
                         if($('#entry_type').val() != "Payable"){
                           $("#receiving_type option[value='Petty Cash']").remove()
                           $('#hidethis').show();
                           $('#showthis').hide();
                         }
                       });
                       $('#receiving_type').change(function(){
                         if($('#receiving_type').val() == 'Petty Cash'){
                           $('#hidethis').hide();
                           $('#showthis').show();
                         }else{
                           $('#hidethis').show();
                           $('#showthis').hide();
                         }
                       });
                  
                  
                         if($('#entry_type').val() != ""){
                           if($('#entry_type').val() == "Payable"){
                             $('#receiving_type').append('<option value="Petty Cash" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == "Petty Cash"){echo "selected"; }}?>>Petty Cash</option>');
                          //   $('select').selectpicker('refresh');
                           }else{
                             $("#receiving_type option[value='Petty Cash']").remove()
                            // $('select').selectpicker('refresh');
                           }
                           if($('#entry_type').val() != "Payable"){
                             $("#receiving_type option[value='Petty Cash']").remove()
                             $('#hidethis').show();
                             $('#showthis').hide();
                           }
                         }
                       if($('#receiving_type').val() != ""){
                         if($('#receiving_type').val() == 'Petty Cash'){
                           $('#hidethis').hide();
                           $('#showthis').show();
                         }else{
                           $('#hidethis').show();
                           $('#showthis').hide();
                         }
                       }
                      // $('select').selectpicker('refresh');
                        var op2 = "";
                     var checkid = "";
                  
                     var baseurl = 'nsk/public';
                  
                      // $("#customer_id").change(function(){
                       $("#customer_id").change(function() {
                  
                        //   if($('#entry_type').val() != "Payable"){
                       // $(document).on("change","#customer_id",function(){
                       var id =   $('#customer_id').val();
                  
                  
                  
                     $.ajaxSetup({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                     });
                  
                     $.ajax({
                       url: 'GetBillDataByCus',
                       type:'get',
                  
                       async: false,
                       data: {
                       id:id
                       },
                  
                       success:function(data)
                       {
                          
                          console.log(data);
                          op2+='<table class="table table-striped">';
                          op2+=' <tr><th>Sr. No</th><th>Bill No </th> <th>Bill Amount</th> <th>Remains</th>  <th> Recieved </th>  <th>Remaining amount</th>   </tr>';
                  
                         for(var i=0;i<data.data.length;i++){
                             
                            if (data.data[i].r_total != '0') {
                                if(data.bill_metas[i]){
                                    var recamount = data.bill_metas[i].received;
                                    var remamount = data.bill_metas[i].r_amount;
                                }else{
                                    var recamount = '';
                                    var remamount = '';
                                }
                      
                      
                              op2+='<tr>';
                              op2+='<td style="width:10% !important;">'+' '+ i +'  <input type="checkbox" class="form-check-input" id="exampleCheck" name="bill_id[]" value="'+data.data[i].bill_id+'">  <td>'+data.data[i].bill_Number+'</td> <td>'+data.data[i].total+'</td> <td> <input type="text" class="form-check-input" id="bill_amount'+data.data[i].bill_id+'" name="bill_amount[]" value=" '+data.data[i].r_total+' " > </td> <td> <input type="text" class="exampleCheck form-check-input" name="received[]" value="" data-id='+data.data[i].bill_id+'> </td> <td><input type="text" class=" r_amount_'+data.data[i].bill_id+' form-check-input" id="r_amount'+data.data[i].bill_id+'" name="r_amount[]" value="'+remamount+'"></td></tr>';
                            }
                  
                         }
                         op2+='</table>';
                  
                         $('#bils_ids').html(op2);
                         //console.log("Data Correctly Processed");
                  
                         for(var i=0;i<data.data.length;i++){
                         /*$("#exampleCheck").change(function() {
                  
                               var amount = $('#receiving_amount').val();
                               var bill_amount = $('#bill_amount').val();
                               var variations = bill_amount-amount;
                               $("#r_amount").val(variations);
                             });*/
                  
                          };
                          var xyz = 0;
                           $(".exampleCheck").change(function() {
                  
                              var id = $(this).attr('data-id');
                              var amount = $(this).val();
                              var bill_amount = $('#bill_amount'+id).val();
                              var variations = bill_amount-amount;
                               $("#r_amount"+id).val(variations);
                               xyz = parseFloat(amount);
                               $("#receiving_amount").val(xyz);
                  
                  
                  
                  
                  
                             });
                  
                  
                  
                  
                  
                       }
                  
                  
                  
                  
                     });
                  
                    //  }
                  
                     });
                  
                  
                  
                  
                     });
                  
                  
                     
               </script>
               </script>
               @endsection
               <script type="text/javascript">
               
                  
                  <?php
                     if(isset($type) && $type == "Edit"){
                     ?>
                  
                  $(document).on('keyup','#receiving_amount',function(){
                  	var receiving_amount = $("#receiving_amount").val();
                  	var percent = $("#percent").val();
                  	var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                  	var total = receiving_amount - multiply;
                  	$("#after_percent").val(total);
                  });
                  $(document).on('keyup','#percent',function(){
                  	var receiving_amount = $("#receiving_amount").val();
                  	var percent = $("#percent").val();
                  	var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                  	var total = receiving_amount - multiply;
                  	$("#after_percent").val(total);
                  });
                  <?php }else{ ?>
                    $(document).on('keyup','#receiving_amount',function(){
                    	var receiving_amount = $("#receiving_amount").val();
                    	var percent = $("#percent").val();
                    	var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                    	var total = receiving_amount - multiply;
                    	$("#after_percent").val(total);
                    });
                  $(document).on('keyup','#percent',function(){
                  	var receiving_amount = $("#receiving_amount").val();
                  	var percent = $("#percent").val();
                  	var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
                  	var total = receiving_amount - multiply;
                  	$("#after_percent").val(total);
                  });
                  <?php } ?>
                  $(document).ready(function(){
                      $(".bank-area").hide();
                          $(".challan-area").hide();
                  });
                  $(document).on("change","#receiving_type",function(){
                      var current_context = $(this);
                      if(current_context.val() == "Cheque"){
                          $(".bank-area").show();
                          $(".challan-area").hide();
                      }else if(current_context.val() == "Challan"){
                          $(".bank-area").hide();
                          $(".challan-area").show();
                      }else{
                          $(".bank-area").hide();
                          $(".challan-area").hide();
                      }
                  });
                  
                  
                  $(document).ready(function(){
                    if($('#receiving_type').val() != ""){
                      var content_recived = $('#receiving_type').val();
                      console.log(content_recived);
                      if(content_recived == "Cheque"){
                        $(".bank-area").show();
                        $(".challan-area").hide();
                      }else if(content_recived == "Challan"){
                        $(".bank-area").hide();
                        $(".challan-area").show();
                      }else{
                        $(".bank-area").hide();
                        $(".challan-area").hide();
                      }
                    }
                  });
                  $(document).on("change","#entry_type",function(){
                      var current_context = $(this);
                      if(current_context.val() == "Payable"){
                          $("#bank_id").hide();
                          $("#previous-div").hide();
                          $("#deposit_bank_name").html('Withdraw Bank Name');
                      }else if(current_context.val() == "Receivable"){
                          $("#bank_id").show();
                          $("#deposit_bank_name").html('Deposit Bank Name');
                      }
                  });
                  $(document).ready(function(){
                    var current_context = $('#entry_type').val();
                    if(current_context == "Payable"){
                        $("#bank_id").hide();
                        $("#previous-div").hide();
                        $("#deposit_bank_name").html('Withdraw Bank Name');
                    }else if(current_context == "Receivable"){
                        $("#bank_id").show();
                        $("#deposit_bank_name").html('Deposit Bank Name');
                    }
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
                  <h2>Received & Paid Records </h2>
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
                           <th>Date</th>
                           <th>Customer Name</th>
                           <th>ReceivingType</th>
                           <th>Cheque / Challan Number</th>
                           <th>Payment Bank Desc</th>
                           <th>Deposit Bank</th>
                           <th>Deposit Slip</th>
                           <th>Amount</th>
                           <th>Type</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $serial_number = 0 ;
                           $res = 0 ;
                           if(isset($receiving_records) && sizeof($receiving_records) > 0){
                           ?>
                        <?php $serial = 0; ?>
                        @foreach($receiving_records as $rec)
                        <?php $serial += 1; ?>
                        <tr>
                           <td><?php echo $serial_number+=1 ;?></td>
                           <?php echo "<td>".$date = date('d/m/Y', strtotime($rec->ReceivingDate))."</td>"; ?>
                           <td>
                              <?php
                                 if($rec->FKCustomerID != ''){
                                   foreach($customer_records as $customer){
                                     if($rec->FKCustomerID == $customer->id){
                                       echo  $customer->name;
                                     }
                                   }
                                 }else{
                                   foreach($officeRecord as $office){
                                     if($rec->FKOfficeID == $office->office_id){
                                       echo $office->office_name;
                                     }
                                   }
                                 }
                                 ?>
                           </td>
                           <td>{{ $rec->ReceivingType }} </td>
                           <td>{{ $rec->ChequeNumber }} </td>
                           <td>{{ $rec->Payment_bank_description }} </td>
                           <td>{{ $rec->FKBankID_Desposit }} </td>
                           <td>{{ $rec->Deposit_slip_number }} </td>
                           <td>{{ $rec->Amount }} </td>
                           <td><?php if($rec->entry_type == 'Payable'){echo 'Paid';}else if($rec->entry_type == 'Receivable'){echo 'Recieved';}else{echo $rec->entry_type; } ?></td>
                           <td>
                              <?php if($edition == 1){?>
                              <a href="<?php echo url('editRecievable/'.$rec->PKReceivingID); ?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil"></i></a>
                              <?php }else{ ?>
                              <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                              <i class="fa fa-pencil"></i>
                              </a>
                              <?php } ?>
                              &nbsp;|||&nbsp;
                              <?php if($deletion == 1){?>
                              <a href="<?php echo url('deleteRecievable/'.$rec->PKReceivingID.'/'.$rec->entry_type); ?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
                              <?php }else{ ?>
                              <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                              <i class="fa fa-times"></i>
                              </a>
                              <?php } ?>
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
   </div>
</div>
<!-- Close row -->
@endsection
@section('script')
<script type="text/javascript">
    var recamount = null;
    var remamount = null;
    <?php
      if(isset($type) && $type == "Edit"){
      ?>
      $(document).on('keyup','#receiving_amount',function(){
      var receiving_amount = $("#receiving_amount").val();
      var percent = $("#percent").val();
      var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
      var total = receiving_amount - multiply;
      $("#after_percent").val(total);
      });
      $(document).on('keyup','#percent',function(){
      var receiving_amount = $("#receiving_amount").val();
      var percent = $("#percent").val();
      var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
      var total = receiving_amount - multiply;
      $("#after_percent").val(total);
      });
      <?php }else{ ?>
      $(document).on('keyup','#receiving_amount',function(){
      var receiving_amount = $("#receiving_amount").val();
      var percent = $("#percent").val();
      var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
      var total = receiving_amount - multiply;
      $("#after_percent").val(total);
      });
      $(document).on('keyup','#percent',function(){
      var receiving_amount = $("#receiving_amount").val();
      var percent = $("#percent").val();
      var multiply = (parseInt(receiving_amount)*parseInt(percent))/parseInt(100);
      var total = receiving_amount - multiply;
      $("#after_percent").val(total);
      });
      <?php } ?>
      $(document).ready(function(){
      $(".bank-area").hide();
        $(".challan-area").hide();
      });
      $(document).on("change","#receiving_type",function(){
      var current_context = $(this);
      if(current_context.val() == "Cheque"){
        $(".bank-area").show();
        $(".challan-area").hide();
      }else if(current_context.val() == "Challan"){
        $(".bank-area").hide();
        $(".challan-area").show();
      }else{
        $(".bank-area").hide();
        $(".challan-area").hide();
      }
      });
   
   
      $(document).ready(function(){
      if($('#receiving_type').val() != ""){
      var content_recived = $('#receiving_type').val();
      console.log(content_recived);
      if(content_recived == "Cheque"){
      $(".bank-area").show();
      $(".challan-area").hide();
      }else if(content_recived == "Challan"){
      $(".bank-area").hide();
      $(".challan-area").show();
      }else{
      $(".bank-area").hide();
      $(".challan-area").hide();
      }
      }
      });
      $(document).on("change","#entry_type",function(){
      var current_context = $(this);
      if(current_context.val() == "Payable"){
        $("#bank_id").hide();
        $("#previous-div").hide();
        $("#deposit_bank_name").html('Withdraw Bank Name');
      }else if(current_context.val() == "Receivable"){
        $("#bank_id").show();
        $("#deposit_bank_name").html('Deposit Bank Name');
      }
      });
      $(document).ready(function(){
      var current_context = $('#entry_type').val();
      if(current_context == "Payable"){
      $("#bank_id").hide();
      $("#previous-div").hide();
      $("#deposit_bank_name").html('Withdraw Bank Name');
      }else if(current_context == "Receivable"){
      $("#bank_id").show();
      $("#deposit_bank_name").html('Deposit Bank Name');
      }
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
   
      $(document).ready(function(){
        $('#showthis').hide();
        $('#hidethis').show();
   
        $('#entry_type').change(function(){
          if($('#entry_type').val() == "Payable"){
            option = '<option value="Petty Cash">Petty Cash</option>';
            $('#receiving_type').append(option);
          //  $('select').selectpicker('refresh');
          }else{
            $("#receiving_type option[value='Petty Cash']").remove()
           // $('select').selectpicker('refresh');
          }
          if($('#entry_type').val() != "Payable"){
            $("#receiving_type option[value='Petty Cash']").remove()
            $('#hidethis').show();
            $('#showthis').hide();
          }
        });
        $('#receiving_type').change(function(){
          if($('#receiving_type').val() == 'Petty Cash'){
            $('#hidethis').hide();
            $('#showthis').show();
          }else{
            $('#hidethis').show();
            $('#showthis').hide();
          }
        });
   
   
          if($('#entry_type').val() != ""){
            if($('#entry_type').val() == "Payable"){
              $('#receiving_type').append('<option value="Petty Cash" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == "Petty Cash"){echo "selected"; }}?>>Petty Cash</option>');
           //   $('select').selectpicker('refresh');
            }else{
              $("#receiving_type option[value='Petty Cash']").remove()
             // $('select').selectpicker('refresh');
            }
            if($('#entry_type').val() != "Payable"){
              $("#receiving_type option[value='Petty Cash']").remove()
              $('#hidethis').show();
              $('#showthis').hide();
            }
          }
        if($('#receiving_type').val() != ""){
          if($('#receiving_type').val() == 'Petty Cash'){
            $('#hidethis').hide();
            $('#showthis').show();
          }else{
            $('#hidethis').show();
            $('#showthis').hide();
          }
        }
       // $('select').selectpicker('refresh');
         var op2 = "";
      var checkid = "";
   
      var baseurl = 'nsk/public';
   
       // $("#customer_id").change(function(){
    //     $("#customer_id").change(function() {
   
    //         if($('#entry_type').val() != "Payable"){
    //     // $(document).on("change","#customer_id",function(){
    //     var id =   $('#customer_id').val();
   
   
   
    //   $.ajaxSetup({
    //   headers: {
    //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   }
    //   });
   
    //   $.ajax({
    //     url: 'GetBillDataByCus',
    //     type:'get',
   
    //     async: false,
    //     data: {
    //     id:id
    //     },
   
    //     success:function(data)
    //     {
    //       console.log(data);
    //       op2+='<table class="table table-striped">';
    //       op2+=' <tr><th>Sr. No</th><th>Bill No </th>  <th>Bill Amount</th> <th>Remains</th>  <th> Recieved </th>  <th>Remaining amount</th>   </tr>';
   
    //       for(var i=0;i<data.data.length;i++){
    //      if (data.data[i].r_total != '0') {
    //          if(data.bill_metas[i]){
    //              var recamount = data.bill_metas[i].received;
    //              var remamount = data.bill_metas[i].r_amount;
   
   
    //          }else{
    //              var recamount = '';
    //               var remamount = '';
    //          }
   
   
    //       op2+='<tr>';
    //       op2+='<td style="width:10% !important;">'+' '+ i +'  <input type="checkbox" class="form-check-input" id="exampleCheck" name="bill_id[]" value="'+data.data[i].bill_id+'">  <td>'+data.data[i].bill_Number+'</td><td>'+data.data[i].total+'</td> <td> <input type="text" class="form-check-input" id="bill_amount'+data.data[i].bill_id+'" name="bill_amount[]" value=" '+data.data[i].r_total+' " > </td> <td> <input type="text" class="exampleCheck form-check-input" name="received[]" value="'+recamount+'" data-id='+data.data[i].bill_id+'> </td> <td><input type="text" class=" r_amount_'+data.data[i].bill_id+' form-check-input" id="r_amount'+data.data[i].bill_id+'" name="r_amount[]" value="'+remamount+'"></td></tr>';
    //       }
   
   
   
    //       }
    //       op2+='</table>';
   
    //       $('#bils_ids').html(op2);
    //       //console.log("Data Correctly Processed");
   
    //       for(var i=0;i<data.data.length;i++){
    //       /*$("#exampleCheck").change(function() {
   
    //             var amount = $('#receiving_amount').val();
    //             var bill_amount = $('#bill_amount').val();
    //             var variations = bill_amount-amount;
    //             $("#r_amount").val(variations);
    //           });*/
   
    //       };
    //       var xyz = 0;
    //         $(".exampleCheck").change(function() {
   
    //           var id = $(this).attr('data-id');
    //           var amount = $(this).val();
    //           var bill_amount = $('#bill_amount'+id).val();
    //           var variations = bill_amount-amount;
    //             $("#r_amount"+id).val(variations);
    //             xyz += parseFloat(amount);
    //             $("#receiving_amount").val(xyz);
   
   
   
   
   
    //           });
   
   
   
   
   
    //     }
   
   
   
   
    //   });
   
    //   }
   
    //   });
   
   
   
   
      });
   
   
      
</script>
</script>
@endsection
@section('script')
<script>
   $(document).ready(function(){
     $('#showthis').hide();
     $('#hidethis').show();
   
     $('#entry_type').change(function(){
       if($('#entry_type').val() == "Payable"){
         option = '<option value="Petty Cash">Petty Cash</option>';
         $('#receiving_type').append(option);
         $('select').selectpicker('refresh');
       }else{
         $("#receiving_type option[value='Petty Cash']").remove()
         $('select').selectpicker('refresh');
       }
       if($('#entry_type').val() != "Payable"){
         $("#receiving_type option[value='Petty Cash']").remove()
         $('#hidethis').show();
         $('#showthis').hide();
       }
     });
     $('#receiving_type').change(function(){
       if($('#receiving_type').val() == 'Petty Cash'){
         $('#hidethis').hide();
         $('#showthis').show();
       }else{
         $('#hidethis').show();
         $('#showthis').hide();
       }
     });
   
   
       if($('#entry_type').val() != ""){
         if($('#entry_type').val() == "Payable"){
           $('#receiving_type').append('<option value="Petty Cash" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == "Petty Cash"){echo "selected"; }}?>>Petty Cash</option>');
           $('select').selectpicker('refresh');
         }else{
           $("#receiving_type option[value='Petty Cash']").remove()
           $('select').selectpicker('refresh');
         }
         if($('#entry_type').val() != "Payable"){
           $("#receiving_type option[value='Petty Cash']").remove()
           $('#hidethis').show();
           $('#showthis').hide();
         }
       }
     if($('#receiving_type').val() != ""){
       if($('#receiving_type').val() == 'Petty Cash'){
         $('#hidethis').hide();
         $('#showthis').show();
       }else{
         $('#hidethis').show();
         $('#showthis').hide();
       }
     }
     $('select').selectpicker('refresh');
      var op2 = "";
   var checkid = "";
   
   var baseurl = 'nsk/public';
   
    // $("#customer_id").change(function(){
     $("#customer_id").change(function() {
         if($('#entry_type').val() != "Payable"){
     // $(document).on("change","#customer_id",function(){
     var id =   $('#customer_id').val();
   
   
   
   $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   
   $.ajax({
     url: 'GetBillDataByCus',
     type:'get',
   
     async: false,
     data: {
     id:id
     },
     success:function(data)
     {
   
   
       op2+='<table class="table table-striped">';
       op2+=' <tr>  <th>Sr. No</th><th>Bill No </th>  <th>Bill Amount</th> <th>Remaining amount</th>   </tr>';
   
       for(var i=0;i<data.length;i++){
   
      if (data[i].r_total != '0') {
           op2+='<tr>';
           op2+='<td style="width:10% !important;">'+' '+ i +'  <input type="checkbox" class="form-check-input exampleCheck" id="exampleCheck" name="bill_id[]" value="'+data[i].bill_id+'">  <td>'+data[i].bill_Number+'</td><td> <input type="text" class="form-check-input" id="bill_amount" name="bill_amount[]" value=" '+data[i].r_total+' " >  </td><td><input type="text" class="form-check-input" id="r_amount" name="r_amount[]" ></td></tr>';
              
          }
       }
       op2+='</table>';
       $('#bils_ids').html(op2);
       //console.log("Data Correctly Processed");
       console.log(data);
       for(var i=0;i<data.length;i++){
       $("#exampleCheck").change(function() {
        var amount = $('#receiving_amount').val();
        var bill_amount = $('#bill_amount').val();
        var variations = bill_amount-amount;
            $("#receiving_amount").val(variations);
       });
   
     }
   
   ;
   
   
   
     }
   
   
   });
   
   }
   
   });
   
   
   
   
   });
</script>
@endsection