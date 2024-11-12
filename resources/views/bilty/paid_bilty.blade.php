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
        <form method="post" action=" {{ route('generate-bilty') }} {{-- route('add-bilty-process') --}}">
        @csrf
         <div class="grid">
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           Paid Bilty
                        </h2>
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">
                          
                            <input type="hidden" name="bilty_id" id="bilty_id" <?php if(isset($record[0]->bilty_id)){ echo isset($record[0]->bilty_id)?' value="'.$record[0]->bilty_id.'" ':' '; }?>  class="form-control col-md-7 col-xs-12">
                            <input type="hidden" name="city_name" id="city_name" />
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Bilty's Date #</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">

                                  <!--<input type="text" placeholder="DD-MM-YYYY" <?php // echo isset($record[0]->bilty_date)?' value="'.$record[0]->bilty_date.'" ':' '?>name="date" id="datepicker" required="required" class="form-control col-md-7 col-xs-12">-->

                                  <input type="text" placeholder="DD-MM-YYYY" <?php echo isset($record[0]->bilty_date)?' value="'.$record[0]->bilty_date.'" ':'value="'.date("Y-m-d").'"'?>name="date" id="datepicker" required="required" class="form-control col-md-7 col-xs-12">

                              </div>
                            </div>
                            <input type="hidden" id="biltynotype" name="biltynotype">
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Bilty #</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                 <?php if(isset($bilty_number) && sizeof($bilty_number)){ ?>
                                   <input type="text" name="bilty_number" id="bilty_number" required="required" class="form-control col-md-7 col-xs-12" value={{$getBiltyNumber->bilty_number+1}} >
                                 <?php }else{  ?>
                                   <input type="text" name="bilty_number" oncchange="checkBiltyNo()"id="bilty_number"  required="required" class="form-control col-md-7 col-xs-12" <?php echo isset($record[0]->bilty_number)?' value="'.$record[0]->bilty_number.'" ':' '?>>
                                 <?php } ?>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Bilty Sender</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="sender" id="sender" required="required">
                                  <option value="0">Select a Sender</option>
                                  @foreach($sender_data as $sender_names)
                                  <option value="{{$sender_names->id}}" <?php if(isset($record[0]->fk_customer_id)){ if($record[0]->fk_customer_id == $sender_names->id){ echo 'selected'; } }?>>{{$sender_names->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Station Type :</span></label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="stations_type" id="station_type" required="required">
                                  <option>Select Station Type</option>
                                  @foreach($station_type as $types)
                                  <option value="{{$types->station_type_id}}" <?php if(isset($record[0]->station_type_id)){ if($record[0]->station_type_id == $types->station_type_id){ echo 'selected'; } }?>>{{$types->station_type}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Karachi To :</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="stations_name" id="station_name" required="required">
                                  <option>Select Station</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Bilty Reciever</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="reciever" <?php if(isset($record[0]->bilty_reciever)){ echo isset($record[0]->bilty_reciever)?' value="'.$record[0]->bilty_reciever.'" ':' ';}?>id="reciever" required="required" class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">PH</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="phone" id="phone" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_phone)){ echo isset($record[0]->bilty_phone)?' value="'.$record[0]->bilty_phone.'" ':' ';}?>>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Category</span>
                              </label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="type">
                                  <option value="">Please Select a type</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Medicine'){ echo 'selected'; } }?>>Medicine</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Literature'){ echo 'selected'; } }?>>Literature</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Sample'){ echo 'selected'; } }?>>Sample</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Carton'){ echo 'selected'; } }?>>Carton</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Weight'){ echo 'selected'; } }?>>Weight</option>
                                  <option <?php if(isset($record[0]->bilty_category)){ if($record[0]->bilty_category == 'Other'){ echo 'selected'; } }?>>Other</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="grno">
                              <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Gr #</span></label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="grNum" id="grNum" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_station_grno)){ echo isset($record[0]->bilty_station_grno)?' value="'.$record[0]->bilty_station_grno.'" ':' '; }?> readonly>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="grOnly">
                              <label class="form-label col-md-12 col-sm-12 col-xs-12" for="first-name" style="text-align:left !important;">Show Gr Only. </span>
                                <input type="checkbox" name="grOn" id="grOn" class="flat pull-left" <?php if(isset($record[0]->gronly)){if($record[0]->gronly == 1){echo "checked";}}?> />
                              </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Category</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="category" id="category" class="form-control col-md-7 col-xs-12" value="">
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Large Rate</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="largeRate" id="largeRate" class="form-control col-md-7 col-xs-12" value="" readonly>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Small Rate</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="smallRate" id="smallRate" class="form-control col-md-7 col-xs-12" value="" readonly>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Invoice</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="invoice" id="invoice" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_total)){ echo isset($record[0]->bilty_invoice)?' value="'.$record[0]->bilty_invoice.'" ':' ';}?> >
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total Amount</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="amount" id="amount" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_total)){ echo isset($record[0]->bilty_total)?' value="'.$record[0]->bilty_total.'" ':' ';}?> readonly>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback  ">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" id="details" for="first-name">Description</label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="desc" id="desc" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_description)){ echo isset($record[0]->bilty_description)?' value="'.$record[0]->bilty_description.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback ctnQty">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" id="details" for="first-name">Ctn. Qty</label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="ctnQty" id="ctnQty" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->ctn_qty)){ echo isset($record[0]->ctn_qty)?' value="'.$record[0]->ctn_qty.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback ctnQty">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" id="details" for="first-name">Rate per Ctn.</label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="ratectnQty" id="ratectnQty" readonly class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->rate)){ echo isset($record[0]->rate)?' value="'.$record[0]->rate.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback toshow" >
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Rate</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="rate" id="rate" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->rate)){ echo isset($record[0]->rate)?' value="'.$record[0]->rate.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Large Qty</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="large" id="large" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_large)){ echo isset($record[0]->bilty_large)?' value="'.$record[0]->bilty_large.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Small Qty</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="small" id="small" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_small)){ echo isset($record[0]->bilty_small)?' value="'.$record[0]->bilty_small.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback tohide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total Qty</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="qty" id="qty" class="form-control col-md-7 col-xs-12" value="" readonly>
                                  </div>
                                </div>

                                 <!--WEIGHT CALCULATION-->
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback whide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total Weight Kg</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="weightkg" id="weightkg" step="any" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->weight)){ echo isset($record[0]->weight)?' value="'.$record[0]->weight.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback whide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Rate Per Kg</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="ratekg" id="ratekg" step="any" readonly class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->rate)){ echo isset($record[0]->rate)?' value="'.$record[0]->rate.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback whide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total Pack Carton</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="ctnkg" id="ctnkg" step="any" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->ctn_qty)){ echo isset($record[0]->ctn_qty)?' value="'.$record[0]->ctn_qty.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="cweight">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name" id="checkOther">Weight</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input type="text" name="weight" id="weight" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->weight)){ echo isset($record[0]->weight)?' value="'.$record[0]->weight.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback otherTotal" >
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="number" name="otherTotal" readonly id="otherTotal" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_total)){ echo isset($record[0]->bilty_total)?' value="'.$record[0]->bilty_total.'" ':' ';}?>>
                                  </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback whide">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total</span></label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="wtotal" id="wtotal" class="form-control col-md-7 col-xs-12" <?php if(isset($record[0]->bilty_total)){ echo isset($record[0]->bilty_total)?' value="'.$record[0]->bilty_total.'" ':' ';}?> readonly>
                                  </div>
                                </div>
                              </div>
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <?php if(isset($record[0]->bilty_id)){ ?>
                                  <input type="submit" id="update" name="updatedata" class="btn btn-primary" value="Update">
                                <?php }else{ ?>
                                  <input type="submit" name="insertdata" id="insertion" class="btn btn-success" value="Add Bilty" <?php if(!empty($insertion) && $insertion == 0){}?>>
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
         </form>
      </div>

     
       
         

           <div class="grid">
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                          Report
                        </h2>
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">
                            <form method="POST" name="paid_report" align="center" action="{{ url('paid_report') }}"  class="demo-form2"  data-parsley-validate class="bilty_form_validate">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <div class="col-md-5">
                                 <label class="form-label">SELECT CUSTOMER </label>
                                 <div class="controls">
                                   <select class="form-control single_cal2" required="required" name="customer">
                                     <option value="All">All Customers are Selected</option>
                                     @foreach($sender_data as $customer)
                                     <option value="{{$customer->id}}">{{$customer->name}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                               </div>
                               <div class="clearfix"></div>
                               <div class="col-md-5">
                                 <label class="form-label">FROM DATE </label>
                                 <div class="controls">
                                   <input type="date" name="from_date" id="datepicker1" class="form-control single_cal2"  required="required"  placeholder="From Date" aria-describedby="inputSuccess2Status2"/>
                                 </div>
                               </div>
                               <div class="col-md-5">
                                 <label class="form-label">TO DATE </label>
                                 <div class="controls">
                                   <input type="date" name="to_date" id="datepicker2" class="form-control single_cal2"  required="required" placeholder="To Date" aria-describedby="inputSuccess2Status2"/>
                                 </div>
                               </div>
                                 <div class="col-md-2">
                                   <button type="submit" class="signbuttons btn btn-primary button_call" name="topaid_report" class="topaid_report" id="btn_submit" style="margin-top:23px;">Generate Report </button>
                                 </div>
                               </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


         <div class="grid">
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           View Bilty
                        </h2>
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">
                            @include('bilty/paid');
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
@endsection
@section('script')
<script>
$(document).on('keyup','#search', function(){
  var current_context = $(this).val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type:'GET',
    url:"{{url('/search')}}",
    async: false,
    data: $('#search').serialize(),
    success: function(data){
      $('.articles').html(data);
    }
  });
});

<?php if(isset($record[0]->bilty_number)){ }else{ ?>
  $(document).ready(function(){
        $.ajax({
        type:'GET',
        url:'{{url("/getbiltyno")}}',
        success:function(data){
          $('#bilty_number').val(data);
        }
      });    
  });

  $("#bilty_number").on('change', function checkBiltyNo(){

    var formMessages = $('#form-messages');
    var bilty_number = $(this).val(); // this.value
    $.ajax({ 
      url: 'checkbiltyno',
      type: 'GET',
      async: false,
      data: { id: bilty_number },
      success:function(data){
        $('#bilty_number').val(data[0]);
        $('#biltynotype').val(data[1]);
        $(formMessages).text("Your ID is updated");
        formMessages.show();
        setTimeout(function(){
          $(formMessages).text("");
          formMessages.show();
        }, 3000);
      }
    });
  });

<?php  } ?>
</script>
@include('bilty/bilty_paid')
@endsection
