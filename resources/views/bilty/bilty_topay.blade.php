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
        <form method="post" action="<?php echo isset($form_action)?$form_action:'#'?>">
        @csrf
         <div class="grid">
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           Add To Pay
                        </h2>
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">

                          <input type="hidden" name="topaid_id" id="topaid_id"<?php echo isset($record[0]->PKBiltyID)?' value="'. $record[0]->PKBiltyID . '"':'' ?> >
                          <input type="hidden" name="bilty_number" id="bilty_number"<?php echo isset($record[0]->BiltyNumber)?' value="'. $record[0]->BiltyNumber . '"':'' ?> >
                            <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                               <div class="col-md-6 col-lg-6 col-xs-12">
                                 <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Sender</span>
                                 </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input type="text" name="sender" id="sender"<?php echo isset($record[0]->Sender)?' value="'. $record[0]->Sender . '"':'' ?> class="form-control" />
                                  </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Receiver</span>
                                </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input type="text" name="receiver" id="receiver"<?php echo isset($record[0]->Receiver)?' value="'. $record[0]->Receiver . '"':'' ?> class="form-control" />
                                  </div>
                              </div>
                              <br clear="all" />
                              <meta name="csrf-token" content="{{csrf_token()}}">
                              <br clear="all" />
                              <div class="col-md-6 col-lg-6 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Station Type</span>
                                </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="stations_type" id="station_type" required="required">
                                      <option value="0">Select Station Type</option>
                                      @foreach($station_type as $types)
                                      <option value="{{$types->station_type_id}}" <?php if(isset($record[0]->station_type_id)){ if($record[0]->station_type_id == $types->station_type_id){ echo 'selected'; } }?>>{{$types->station_type}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Karachi To</span>
                                </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                      <select id="station_name" name="station_name" class="form-control col-md-7 col-xs-12"></select>
                                  </div>
                              </div>
                              <br clear="all" />
                              <br clear="all" />
                              <div class="col-md-6 col-lg-6 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date</span>
                                </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input value={{date("d-m-Y")}}  type="text" name="datepicker" id="datepicker"<?php echo isset($record[0]->DatePaidBilty)?' value="'. date('d-m-Y', strtotime($record[0]->DatePaidBilty)) . '"':'' ?> class="form-control" required="required" placeholder="DD-MM-YYYY"/>
                                  </div>
                              </div>
                              <br clear="all" />
                              <br clear="all" />
                            <div id="main_copy_area">
                                <div class="copy copy_0">
                                <div class="col-md-2">
                                    <label class="form-label">Qty <span class="red-color">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="qty[]" id="qty" class="form-control"<?php echo isset($topaid_metas_records[0]->Quantity)?' value="' . $topaid_metas_records[0]->Quantity. '"' : '' ?> />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description <span class="red-color">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="description[]"  class="form-control"<?php echo isset($topaid_metas_records[0]->Description)?' value="' . $topaid_metas_records[0]->Description. '"' : '' ?>  />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">weight <span class="red-color">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="weight[]" id="weight" class="form-control"<?php echo isset($topaid_metas_records[0]->Weight)?' value="' . $topaid_metas_records[0]->Weight. '"' : '' ?> />
                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="controls">
                                            <button type="button" class="btn btn-primary" id="add_more">Add More</button>
                                        </div>
                                    </div>
                                </div> <!-- close copy copy_0 -->
                            </div>
                            <br clear="all" /><br />
                            <div id="copy_area">
                                <?php
                                if(isset($topaid_metas_records) && sizeof($topaid_metas_records) > 0){
                                $count = 0 ;
                                    foreach($topaid_metas_records as $topaid_metas){
                                        if($count > 0){
                                ?>
                                <div class="copy">
                                    <div class="col-md-2">
                                        <label class="form-label">Qty <span class="red-color">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="qty[]" id="qty" class="form-control"<?php echo isset($topaid_metas->Quantity)?' value="' . $topaid_metas->Quantity. '"' : '' ?> />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Description <span class="red-color">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="description[]"  class="form-control"<?php echo isset($topaid_metas->Description)?' value="' . $topaid_metas->Description. '"' : '' ?>  />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">weight <span class="red-color">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="weight[]" id="weight" class="form-control"<?php echo isset($topaid_metas->Weight)?' value="' . $topaid_metas->Weight. '"' : '' ?> />
                                        </div>
                                    </div>
                                        <div class="col-md-2">
                                            <label class="form-label">&nbsp;</label>
                                            <div class="controls">
                                                <button type="button" class="btn btn-danger remove-more-area">Remove</button>
                                            </div>
                                        </div>
                                    </div> <!-- close copy copy_0 -->

                                </div>
                                <?php
                                        }
                                    $count++;
                                    }
                                }
                                ?>

                              </div>
                              <br clear="all" />
                                    <!--<h1>Total /= <span id="sum" ></span></h1>-->
                            <hr>
                            <div class="col-md-3">
                                <label class="form-label">Freight <span class="red-color">*</span></label>
                                <div class="controls">
                                    <input type="text" name="rent" id="rent"<?php echo isset($record[0]->Rent)?' value="'. $record[0]->Rent . '"':'' ?> class="form-control" value="0"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Labour <span class="red-color">*</span></label>
                                <div class="controls">
                                    <input type="text" name="labour" id="labour"<?php echo isset($record[0]->Labour)?' value="'. $record[0]->Labour . '"':'' ?> class="form-control" value="0"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Local Freight <span class="red-color">*</span></label>
                                <div class="controls">
                                    <input type="text" name="other_rent" id="other_rent"<?php echo isset($record[0]->OtherRent)?' value="'. $record[0]->OtherRent . '"':'' ?> class="form-control" value="0"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Other <span class="red-color">*</span></label>
                                <div class="controls">
                                    <input type="text" name="other" id="other"<?php echo isset($record[0]->Other)?' value="'. $record[0]->Other . '"':'' ?> class="form-control" value="0"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Total <span class="red-color">*</span></label>
                                <div class="controls">
                                    <input type="text" name="total" id="total"<?php echo isset($record[0]->Total)?' value="'. $record[0]->Total . '"':'' ?> class="form-control" value="0"/>
                                </div>
                            </div>
                            <br clear="all" />
                            <br clear="all" />
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?php
                                if($type == "View"){
                                ?>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <input type="submit" name="insertdata" id="insertion" class="btn btn-success" value="Add Bilty" <?php if(!empty($insertion) && $insertion == 0){echo 'disabled'; }?>>
                                <?php
                                }else{
                                ?>
                                <input type="submit" name="insertdata" id="insertion" class="btn btn-success" value="Update Bilty" <?php if(!empty($insertion) && $insertion == 0){echo 'disabled'; }?>>
                                <a href="{{ url('/bilty_topay') }}" class="btn btn-primary">Back</a>
                                <?php
                                }
                                ?>

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
                        To Pay Records
                      </h2>
                    </div>

                    <div id="input" class="p-5">
                      <div class="preview">
                          <form method="POST" name="topaid_report" align="center" action="{{ url('topaid_report') }}"  class="demo-form2"  data-parsley-validate class="bilty_form_validate">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-5">
                                    <label class="form-label">FROM DATE </label>
                                    <div class="controls">
                                        <input type="date" name="from_date"  id="datepicker1" class="form-control single_cal2"  required="required"  placeholder="From Date" aria-describedby="inputSuccess2Status2"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">TO DATE </label>
                                    <div class="controls">
                                        <input type="date" name="to_date"  id="datepicker2" class="form-control single_cal2"  required="required" placeholder="To Date" aria-describedby="inputSuccess2Status2"/>
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
                        To Pay Records
                      </h2>
                    </div>

                    <div id="input" class="p-5">
                      <div class="preview">
                         
                          @include('bilty/topay');
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
      $(document).on('change','#station_type', function(){
        var current_context = $(this).val();
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $('#station_name').find('option').remove().end();
        $.ajax({
          url:"{{ url('get_station') }}",
          type:'POST',
          data:$("#station_type").serialize(),
          success:function(data){
            var option ='';
            for(var i=0;i<data.length;i++){
              option += '<option value="'+ data[i].id + '">' + data[i].name + '</option>';
            }
            $('#station_name').append(option);
            $('select').selectpicker('refresh');
          }
        });
      });

      var ROWS = 0;
      $(document).on("click","#add_more", function(){
        ROWS = ROWS+1;
        var copy_area = $("#copy_area");
        var main_area = $("#main_copy_area").clone();
        if(main_area.find("button").length > 0){
        main_area.find("button").removeAttr("id");
        main_area.find("button").removeClass().addClass("btn btn-danger remove-more-area");
        main_area.find("button").html("Remove");
        }
        $("<br>").attr("clear","all").appendTo(main_area);
        $("<br>").appendTo(main_area);
        var main_div_area = $('<div>').addClass("copy_"+ROWS);
        main_div_area.html(main_area.html());
        main_div_area.find("input").each(function(){
          $(this).val("");
        });
        main_div_area.appendTo(copy_area);
      });
      $(document).keyup(function(){
        for(var k=0; k<=ROWS; k++) {
          var weight = $(".copy_"+k+" #weight").val();
          var price = $(".copy_"+k+" #price").val();
          var amount = $(".copy_"+k+" #amount").val();
          total = amount;
          //$(".copy_"+k+" #total").val(total); // IF You Show total amout please remove commint //
        }
      });
      $(document).on("click",".remove-more-area", function(){ //user click on remove text
        ROWS = ROWS-1;
        $(this).parents('.copy').remove();
        return false;
      });
      $(document).on('change', 'input', function() {
        $(".total").each(function() {
          $(this).keyup(function(){
            calculateSum();
          });
        });
        function calculateSum() {
          var sum = 0;
          $(".total").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
              sum += parseFloat(this.value);
            }
          });
          //.toFixed() method will roundoff the final sum to 2 decimal places
          $("#sum").html(sum.toFixed(2));
        }
      });
      $(document).on('keyup','#other',function(){
        var rent = $('#rent').val();
        var labour = $('#labour').val();
        var other_rent = $('#other_rent').val();
        var other = $('#other').val();
        var total = parseFloat(rent) + parseFloat(labour) + parseFloat(other_rent) + parseFloat(other) ;
        $("#total").val(total);
        /*$(".copy_"+k+" #total").val(total); // IF You Show total amout please remove commint */
      });

      var stype = $('#station_type').val();
      if(stype != 0){
        var current_context = $(this).val();
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#station_name').find('option').remove().end();
        $.ajax({
          url:"{{ url('get_station') }}",
          type:'POST',
          data:$("#station_type").serialize(),
          success:function(data){
            var option ='';
            var chk = '<?php if(isset($record[0]->StationId)){ echo $record[0]->StationId; }?>';
            for(var i=0;i<data.length;i++){
              if(data[i].station_id == chk){
                option += '<option value="'+ data[i].station_id + '" selected>' + data[i].station_city_name + '</option>';
                $('#city_name').val(data[i].station_id);
              }else{
                option += '<option value="'+ data[i].station_id + '">' + data[i].station_city_name + '</option>';
              }
            }
            $('#station_name').append(option);
            $('select').selectpicker('refresh');
          }
        });
      }
    });

$(document).on('keyup','#search', function(){
  var current_context = $(this).val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type:'GET',
    url:"{{url('/searchTopay')}}",
    async: false,
    data: $('#search').serialize(),
    success: function(data){
      $('.articles').html(data);
    }
  });
});
</script>
@endsection
