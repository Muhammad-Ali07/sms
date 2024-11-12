@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">

      <!-- BEGIN: Side Menu -->
      @include('includes.side-nav') 
              <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
               <!-- BEGIN: Breadcrumb -->
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Customer</a> </div>
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
            <!-- END: Top Bar -->

<div class="grid">

<div class="grid grid-cols-12 gap-6 mt-5">
   <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Input -->
      <div class="intro-y box">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Daily Cash Reporting
            </h2>
         </div>
         
         <div id="dialog-confirm">
  <div class="message">Are you sure?</div>
  <div class="buttons">
    <a class="cancel" href="#">Cancel</a>
    <a class="ok" href="#">Ok</a>
  </div>
</div>

         <form method="post" autocomplete="off" action="{{ url('generate_petty_report') }}">
            @csrf
            <div id="input" class="p-5">
               <div class="preview">
                    <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                        <div class="col-span-12 positon-relative">
                            <label for="txtBox" class="form-label">Date</label>
                            <select name="office" class="form-control">
                                <option>All</option>
                                 @foreach($office as $rows)
                                  <option value="{{$rows->office_id}}">{{$rows->office_name}}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 positon-relative">
                            <label for="txtBox" class="form-label">Form Date</label>
                           <input type="date" id="datepicker2" name="from" class="form-control" />
                        </div>
                        <div class="col-span-6 positon-relative">
                            <label for="txtBox" class="form-label">To Date</label>
                            <input type="date" id="datepicker1" name="to" class="form-control" />
                        </div>
                    </div>
                    <button  class="btn btn-danger mt-5">Reset</button>
                    <button  class="btn btn-danger mt-5">Generate Reports</button>
               </div>
            </div>
         </form>
      </div>


      <div class="intro-y box mt-5">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Daily Cash Statement/Management
            </h2>
            <h2 style="float: right;">Current Balance:
            <span id="balance"></span></h2>
            
            
         </div>
          <?php
        if(isset($editpettycash[0]->id) && $editpettycash[0]->type != "Daily Cash Return"){
          $form = url('updatePettyCash');
        }else{
         $form = url('addPettyCash');
        }
        ?>
         
       
         <form method="post" autocomplete="off" action="<?php echo $form; ?>">
            @csrf
            <?php  if(isset($editpetty_meta[0]->ref)){ ?> <input type="hidden" name="id" value="<?php if(isset($editpettycash[0]->id)){echo $editpettycash[0]->id; } ?>" />
        <input type="hidden" name="preofficeid" value="<?php if(isset($editpettycash[0]->fk_office_id)){echo $editpettycash[0]->fk_office_id; } ?>" /> <?php }?>
            
            <div id="input" class="p-5">
               <div class="preview">
                    <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                            <div class="col-span-12 positon-relative">
                                <label for="txtBox" class="form-label">Date</label>
                                <input required type="date" name="date" value="<?php if(isset($editpettycash[0]->type) && $editpettycash[0]->type != "Daily Cash Return"){ echo date('Y-m-d',strtotime($editpettycash[0]->date)); } ?>" class="form-control">
                            </div>
                            <div class="col-span-4 positon-relative">
                                <label for="txtBox" class="form-label">Select Office</label>
                                 <select required="required" name="office" id="office" class="form-control">
    	                            <option value="0">Select an Office</option>
    							    @foreach($office as $offNames)
    	                                <option value="{{$offNames->office_id}}" <?php if(isset($editpettycash[0]->fk_office_id) && $editpettycash[0]->type != "Daily Cash Return"){if($editpettycash[0]->fk_office_id == $offNames->office_id){echo 'selected'; }}?>>{{$offNames->office_name}}</option>
    								@endforeach
    	                        </select>
                            </div>
                            <div class="col-span-4 positon-relative">
                                <label for="txtBox" class="form-label">Payment Reciept</label>
                                	<select type="text" name="payType"  class="form-control" >
    									<option <?php if(isset($editpettycash[0]->type) && $editpettycash[0]->type != "Daily Cash Return"){if($editpettycash[0]->type == 'Payment'){echo 'selected';}}?>>Payment</option>
    									<option <?php if(isset($editpettycash[0]->type) && $editpettycash[0]->type != "Daily Cash Return"){if($editpettycash[0]->type == 'Reciept'){echo 'selected';}}?>>Reciept</option>
    								</select>
                            </div>
                   
                            <div class="col-span-4 positon-relative">
                                <label for="txtBox" class="form-label">Payment Type</label>
                                <select id="receiving_type" name="receiving_type" class="form-control" required="required">
                                     <option value=""> Select Type </option>
                                     <option value="Cash" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Cash'){echo 'selected'; }}?>>Cash</option>
                                     <option value="Cheque" <?php if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Cheque'){echo 'selected'; }}?>>Cheque</option>
                                     <!--<option value="Challan" <?php // if(isset($record[0]->ReceivingType)){if($record[0]->ReceivingType == 'Challan'){echo 'selected'; }}?>>Challan</option>-->
                                </select>
                            </div>
                        </div>
                    
                        <div class="mt-2 grid grid-cols-12 gap-2 positon-relative bank_div" style='display:none'>
                            <div class="col-span-4 positon-relative">
                             
                                    <label for="txtBox" class="form-label">Select Bank</label>
                                    <select name="bank" id="bank" class="form-control">
            	                            <option value="0">Select a Bank</option>
        									@foreach($bank_record as $bank)
                                            <option value="{{$bank->PKBankID}}" <?php if(isset($editpettycash[0]->fk_bank_id) && $editpettycash[0]->type == "Daily Cash Return"){if($editpettycash[0]->fk_bank_id == $bank->PKBankID){echo 'selected';}}?>>{{$bank->BankName}}</option>
        									@endforeach
        	                        </select>
                                </div>
                          
                            
                            <div class="col-span-4 positon-relative">
                              
                                     <label class="form-label">Cheque Number <span class="red-color">*</span></label>
                                     <input class="form-control " type="text" name="cheque_number" id="cheque_number" value="<?php if(isset($record[0]->ChequeNumber)){echo $record[0]->ChequeNumber;}?>">
                              
                            </div>
                            
                            <div class="col-span-4 positon-relative">
                              
                                <label class="form-label">Deposit Slip Number <span class="red-color">*</span></label>
                                 <input class="form-control " type="text" name="deposit_slip_number" id="deposit_slip_number" value="<?php if(isset($record[0]->Deposit_slip_number)){echo $record[0]->Deposit_slip_number;}?>">
                            
                            </div>                               
                        </div>
                        
                    <div class="mt-2 grid grid-cols-12 gap-2 divAreaSection">
                            <div class="col-span-3 positon-relative">
                                <label for="txtBox" class="form-label">Description</label>
                              	<input type="text" name="desc[]" value="<?php if(isset($editpetty_meta[0]->desc)){echo $editpetty_meta[0]->desc; }?>" class="form-control" />
                            </div>
                            <div class="col-span-3 positon-relative">
                                <label for="txtBox" class="form-label">Reference</label>
                                <input type="text" name="ref[]" value="<?php if(isset($editpetty_meta[0]->ref)){echo $editpetty_meta[0]->ref; }?>" class="form-control" />
                            </div>
                            <div class="col-span-4 positon-relative">
                                <label for="txtBox" class="form-label">Amount</label>
                                <input type="text" name="amount[]" value="<?php if(isset($editpetty_meta[0]->amount)){echo $editpetty_meta[0]->amount; }?>" class="form-control txt2" />
                            </div>
                            <div class="col-span-2 positon-relative">
                                <!--<button class="btn btn-danger">Add More</button>-->
                                <a href="#AddBOXCLASS" class="btn btn-danger AddMorebtn____btn_____CLICK" style="line-height: 30px;">Add More</a>
                            </div>
                    </div>
                    
                    
                      <?php  if(isset($editpetty_meta) && sizeof($editpetty_meta) > 0){
                  $count = 0 ;
                  foreach($editpetty_meta as $meta){
                    if($count > 0){
                    ?>
                    <div class="mt-2 grid grid-cols-12 gap-2 divAreaSection">
                            <div class="col-span-3 positon-relative">
                                <label for="txtBox" class="form-label">Description</label>
                              	<input type="text" name="desc[]" value="<?php if(isset($meta->desc)){echo $meta->desc; }?>" class="form-control" />
                            </div>
                            <div class="col-span-3 positon-relative">
                                <label for="txtBox" class="form-label">Reference</label>
                                <input type="text" name="ref[]" value="<?php if(isset($meta->ref)){echo $meta->ref; }?>" class="form-control" />
                            </div>
                            <div class="col-span-4 positon-relative">
                                <label for="txtBox" class="form-label">Amount</label>
                                <input type="text" name="amount[]" value="<?php if(isset($meta->amount)){echo $meta->amount; }?>" class="form-control txt2" />
                            </div>
                             
                             
                             <div class="col-span-2 positon-relative">
                               <button type="button" class="btn btn-danger remove-more-area">Remove</button>
                            </div>
                            
                         
                    </div>
                     <?php
                    }
                    $count += 1;
                  }
                }
              ?>
                    
                            <div class="col-span-12 mt-5">
                                <button  class="btn btn-danger">Reset</button>
                                <button  class="btn btn-danger">Save</button>
                            </div>
               </div>
            </div>
         </form>
      </div>
      
      
      
      <?php
          if(isset($editpettycash[0]->id) && $editpettycash[0]->type == "Daily Cash Return"){
            $form2 = url('updateReturnCash');
          }else{
            $form2 = url('returnCash');
          }
        ?>
        
      
      <div class="intro-y box mt-5">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Daily Return
            </h2>
            <h2 style="float: right;">Remaining Balance:</h2>
         </div>
         <form method="post" autocomplete="off" action="<?php echo $form2; ?>">
            @csrf
            <div id="input" class="p-5">
               <div class="preview">
                    <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                        <div class="col-span-6 positon-relative">
                            <label for="txtBox" class="form-label">Office Name</label>
                            <select required="required" name="roffice" id="roffice" class="form-control col-md-7 col-xs-12">
	                            <option value="0">Select an Office</option>
										@foreach($office as $offNames)
	                            <option value="{{$offNames->office_id}}" <?php if(isset($editpettycash[0]->fk_office_id) && $editpettycash[0]->type == "Daily Cash Return"){if($editpettycash[0]->fk_office_id == $offNames->office_id){echo 'selected';}}?>>{{$offNames->office_name}}</option>
										@endforeach
	                </select>
                        </div>
                        <div class="col-span-6 positon-relative">
                            <label for="txtBox" class="form-label">Select Bank</label>
                            <select required="required" name="bank" id="bank" class="form-control col-md-7 col-xs-12">
    	                        <option value="0">Select a Bank</option>
    										@foreach($bank_record as $bank)
    	                        <option value="{{$bank->PKBankID}}" <?php if(isset($editpettycash[0]->fk_bank_id) && $editpettycash[0]->type == "Daily Cash Return"){if($editpettycash[0]->fk_bank_id == $bank->PKBankID){echo 'selected';}}?>>{{$bank->BankName}}</option>
    										@endforeach
	                        </select>
                        </div>
                    </div>
                    <div class="mt-2 grid grid-cols-12 gap-2">
                        <div class="col-span-4 positon-relative">
                            <label for="txtBox" class="form-label">Returning Amount</label>
                            <input type="text" name="ramount" value="<?php if(isset($editpettycash[0]->return_amount) && $editpettycash[0]->type == "Daily Cash Return"){echo $editpettycash[0]->return_amount; } ?>" class="form-control">
                        </div>
                    </div>
                        <div class="col-span-12 mt-2">
                            <button class="btn btn-danger">Reset</button>
                            <button class="btn btn-danger">Save</button>
                        </div>
               </div>
            </div>
         </form>
      </div>
      
         <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                
              <div class="intro-y box">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                     <h2 class="font-medium text-base mr-auto">
                       Records
                     </h2>
                    
                     <form action="{{ url('nill-labour-payment')}}" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview articles">
                            
								<table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>id</th>
										<th>Date</th>
										<th>Office</th>
										<th>Payment&nbsp;Type</th>
										<th>Amount</th>
                    <th>Action</th>
									</tr>
								</thead>
								<tbody>
                  <?php $serial = 0; ?>
									@foreach($pettycash as $row)
                  <?php $serial += 1; ?>
									<tr>
										<td>{{$row->id}}</td>
										<td>{{date('d-m-Y',strtotime($row->date))}}</td>
										<td>
										<?php
											foreach($office as $off){
												if($row->fk_office_id == $off->office_id){
													echo $off->office_name;
												}
											}
										?>
									  </td>
										<td>{{$row->type}}</td>
										<td>
										<?php
                      if($row->type == "Daily Cash Return"){
                        echo $row->return_amount;
                      }else{
  											$ttl = 0;
  											foreach($petty_meta as $pm){
  												if($row->id == $pm->fk_pettycash_id){
  													$ttl += (int)$pm->amount;
  												}
  											}
  											echo $ttl;
                      }
										?>
									  </td>
                    <td>
                      <?php if($edition == 1){?>
                        <a href="{{url('edit-account',['id'=> $row->id])}}"><i class="fa fa-pencil"></i></a>
                      <?php }else{ ?>
                        <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                          <i class="fa fa-pencil"></i>
                        </a>
                      <?php } ?>
                      |||
                      <?php if($deletion == 1){?>
                        <a href="<?php echo url('removePettyCash/'.$row->id); ?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
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
								</tbody>
							</table>
							
							 <span style="float:right"> {{ $pettycash->appends(request()->except('page'))->links() }} </span>
						</div>
						  </div>
                     </div>
                  </div>
                  <!-- END: Input -->
                  <!-- BEGIN: Input Sizing -->
               </div>
            </div>

   </div>
</div>
@endsection
@section('script')
    <script>
        $('#receiving_type').change(function(){
            var type = $(this).val();
            if(type == 'Cheque'){
                $('.bank_div').show();
            }else{
                $('.bank_div').hide();
            }
        });
        
        $(document).on('change','#office', function(){
    	var current_context = $(this).val();
    	$.ajaxSetup({
    		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
    	});
    
    	$.ajax({
    		url:"{{ url('getOfficeBalance') }}",
    		type:'POST',
    		async: false,
    		data: {  id:current_context ,
    		},
    		success:function(data){
    			//alert(data);
    
    			$('#balance').text(data);
    		}
    	});
});
    </script>
@endsection