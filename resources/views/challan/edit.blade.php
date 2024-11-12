@extends('layouts.master')

@section('body')

Edit Challan

@endsection

@section('main-content')

@include('includes.mobile-nav')

<div class="flex">

   @include('includes.side-nav')

   <?php

date_default_timezone_set("Asia/Karachi");

   ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   <!-- BEGIN: Content -->

   <div class="content">

      <!-- BEGIN: Top Bar -->

      <div class="top-bar">

         <!-- BEGIN: Breadcrumb -->

         <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i
               data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
               class="breadcrumb--active">Dashboard</a> </div>

         <!-- END: Breadcrumb -->

         <!-- BEGIN: Search -->

         <div class="intro-x relative mr-3 sm:mr-6">

            <div class="search hidden sm:block">

               <input type="text" class="search__input form-control border-transparent placeholder-theme-13"
                  placeholder="Search...">

               <i data-feather="search" class="search__icon dark:text-gray-300"></i>

            </div>

            <a class="notification sm:hidden" href=""> <i data-feather="search"
                  class="notification__icon dark:text-gray-300"></i> </a>

            <div class="search-result">

               <div class="search-result__content">

                  <div class="search-result__content__title">Pages</div>

                  <div class="mb-5">

                     <a href="" class="flex items-center">

                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i
                              class="w-4 h-4" data-feather="inbox"></i> </div>

                        <div class="ml-3">Mail Settings</div>

                     </a>

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i
                              class="w-4 h-4" data-feather="users"></i> </div>

                        <div class="ml-3">Users & Permissions</div>

                     </a>

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i
                              class="w-4 h-4" data-feather="credit-card"></i> </div>

                        <div class="ml-3">Transactions Report</div>

                     </a>

                  </div>

                  <div class="search-result__content__title">Users</div>

                  <div class="mb-5">

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 image-fit">

                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                              src="dist/images/profile-10.jpg">

                        </div>

                        <div class="ml-3">Charlize Theron</div>

                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">charlizetheron@left4code.com
                        </div>

                     </a>

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 image-fit">

                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                              src="dist/images/profile-1.jpg">

                        </div>

                        <div class="ml-3">Russell Crowe</div>

                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com
                        </div>

                     </a>

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 image-fit">

                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                              src="dist/images/profile-15.jpg">

                        </div>

                        <div class="ml-3">Russell Crowe</div>

                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com
                        </div>

                     </a>

                     <a href="" class="flex items-center mt-2">

                        <div class="w-8 h-8 image-fit">

                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                              src="dist/images/profile-7.jpg">

                        </div>

                        <div class="ml-3">Al Pacino</div>

                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>

                     </a>

                  </div>

                  <div class="search-result__content__title">Products</div>

                  <a href="" class="flex items-center mt-2">

                     <div class="w-8 h-8 image-fit">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/preview-1.jpg">

                     </div>

                     <div class="ml-3">Samsung Galaxy S20 Ultra</div>

                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>

                  </a>

                  <a href="" class="flex items-center mt-2">

                     <div class="w-8 h-8 image-fit">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/preview-12.jpg">

                     </div>

                     <div class="ml-3">Samsung Q90 QLED TV</div>

                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>

                  </a>

                  <a href="" class="flex items-center mt-2">

                     <div class="w-8 h-8 image-fit">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/preview-11.jpg">

                     </div>

                     <div class="ml-3">Nike Air Max 270</div>

                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>

                  </a>

                  <a href="" class="flex items-center mt-2">

                     <div class="w-8 h-8 image-fit">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/preview-1.jpg">

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

            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
               aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>

            <div class="notification-content pt-2 dropdown-menu">

               <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">

                  <div class="notification-content__title">Notifications</div>

                  <div class="cursor-pointer relative flex items-center ">

                     <div class="w-12 h-12 flex-none image-fit mr-1">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/profile-10.jpg">

                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>

                     </div>

                     <div class="ml-2 overflow-hidden">

                        <div class="flex items-center">

                           <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a>

                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>

                        </div>

                        <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem
                           Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                           or randomi</div>

                     </div>

                  </div>

                  <div class="cursor-pointer relative flex items-center mt-5">

                     <div class="w-12 h-12 flex-none image-fit mr-1">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/profile-1.jpg">

                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>

                     </div>

                     <div class="ml-2 overflow-hidden">

                        <div class="flex items-center">

                           <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>

                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>

                        </div>

                        <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not
                           simply random text. It has roots in a piece of classical Latin literature from 45 BC, making
                           it over 20</div>

                     </div>

                  </div>

                  <div class="cursor-pointer relative flex items-center mt-5">

                     <div class="w-12 h-12 flex-none image-fit mr-1">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/profile-15.jpg">

                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>

                     </div>

                     <div class="ml-2 overflow-hidden">

                        <div class="flex items-center">

                           <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>

                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>

                        </div>

                        <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not
                           simply random text. It has roots in a piece of classical Latin literature from 45 BC, making
                           it over 20</div>

                     </div>

                  </div>

                  <div class="cursor-pointer relative flex items-center mt-5">

                     <div class="w-12 h-12 flex-none image-fit mr-1">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/profile-7.jpg">

                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>

                     </div>

                     <div class="ml-2 overflow-hidden">

                        <div class="flex items-center">

                           <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>

                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>

                        </div>

                        <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the
                           printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy
                           text ever since the 1500</div>

                     </div>

                  </div>

                  <div class="cursor-pointer relative flex items-center mt-5">

                     <div class="w-12 h-12 flex-none image-fit mr-1">

                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                           src="dist/images/profile-8.jpg">

                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>

                     </div>

                     <div class="ml-2 overflow-hidden">

                        <div class="flex items-center">

                           <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>

                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>

                        </div>

                        <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader
                           will be distracted by the readable content of a page when looking at its layout. The point of
                           using Lorem </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <!-- END: Notifications -->

         <!-- BEGIN: Account Menu -->

         <div class="intro-x dropdown w-8 h-8">

            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
               aria-expanded="false">

               <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">

            </div>

            <div class="dropdown-menu w-56">

               <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">

                  <div class="p-4 border-b border-theme-27 dark:border-dark-3">

                     <div class="font-medium">Charlize Theron</div>

                     <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>

                  </div>

                  <div class="p-2">

                     <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>

                     <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>

                     <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>

                     <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>

                  </div>

                  <div class="p-2 border-t border-theme-27 dark:border-dark-3">

                     <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>

                  </div>

               </div>

            </div>

         </div>

         <!-- END: Account Menu -->

      </div>

      <!-- END: Top Bar -->



      <form method="post" action="{{route('edit-challan-process', $chalan->id)}}">

         @csrf

         <div class="grid">

            <div class="intro-y flex items-center mt-12">

               <h2 class="text-lg font-medium mr-auto">

                  Challan Form

               </h2>

            </div>

            <div class="grid grid-cols-12 gap-6 mt-5">

               <div class="intro-y col-span-12 lg:col-span-12">

                  <!-- BEGIN: Input -->

                  <div class="intro-y box">

                     <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                        <h2 class="font-medium text-base mr-auto">

                           Challan

                        </h2>



                     </div>

                     <div id="input" class="p-5">

                        <div class="wizard open_wizard" style="text-align:left">

                           <div class="step">

                              <div class="preview">

                                 <h3 style="font-size:22px;margin:15px auto">Edit Challan</h3>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-4">

                                          <label for="regular-form-1" class="form-label">Challan No</label>

                                          <input type="text" placeholder="01" class="form-control" name="no"
                                             value="{{$chalan->id}}">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="regular-form-4" class="form-label">Date</label>

                                          <input id="regular-form-4" type="date" class="form-control" name="date"
                                             value="{{$chalan->date}}">

                                       </div>

                                       <div class="col-span-4">



                                          <label for="regular-form-4" class="form-label">Driver</label>

                                          <input value="{{$chalan->driver}}" id="regular-form-1" type="text"
                                             name="driver" class="form-control" />



                                       </div>

                                    </div>

                                 </div>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Loader Name</label>

                                          <input value="{{$chalan->loadername}}" type="text"
                                             placeholder="Enter Loader Name" class="form-control" name="loadername">

                                       </div>

                                       <div class="col-span-6">

                                          <label for="regular-form-4" class="form-label">Dispatch Time</label>

                                          <input id="regular-form-4" type="time" class="form-control"
                                             name="dispatchtime" value="{{$chalan->dispatchtime}}">

                                       </div>

                                    </div>

                                 </div>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-4">

                                          <label for="regular-form-1" class="form-label">Container No</label>

                                          <input value="{{$chalan->containerno}}" type="text"
                                             placeholder="Enter Container No" class="form-control" name="containerno">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="regular-form-4" class="form-label">Container Seal</label>

                                          <input value="{{$chalan->containerseal}}" id="regular-form-4" type="text"
                                             class="form-control" placeholder="Enter Container Seal"
                                             name="containerseal">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="regular-form-4" class="form-label">Truck No</label>

                                          <input value="{{$chalan->vehicle_id}}" id="regular-form-4" required
                                             type="text" class="form-control" placeholder="Truck NO" name="vehicle_id">

                                       </div>

                                    </div>

                                 </div>

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">From</label>

                                       <select id="regular-form-1" class="form-select sm:mr-2"
                                          aria-label="Default select example" name="from_station">

                                          {{-- <option value="">Select Station From </option> --}}

                                          <option value="10">{{'Karachi'}}</option>

                                          {{-- @foreach($stations as $station)



                              @endforeach --}}



                                       </select>

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">To</label>

                                       <select id="station" class="form-select sm:mr-2"
                                          aria-label="Default select example" name="to_station">

                                          {{-- <option value="">Select Station To </option> --}}

                                          @foreach($stations as $station)

                                 @if($chalan->to_station == $station->id)

                           <option selected value="{{ $station->id }}">{{ $station->name }}</option>

                        @else

                     <option value="{{ $station->id }}">{{ $station->name }}</option>

                  @endif

                              @endforeach

                                       </select>

                                    </div>

                                 </div>

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Station Type :</label>

                                       {{-- <div class="col-md-8 col-sm-8 col-xs-12"> --}}

                                          <select class="form-select sm:mr-2" id="stationType" name="station_type">

                                             @if($chalan->station_type == 'Domestic')

                                    <option selected="" value="Domestic">Domestic</option>

                                 @else

                           <option value="Export">Export</option>

                           <option value="Domestic">Domestic</option>

                        @endif

                                          </select>

                                       </div>

                                       <div class="col-span-6" id="stationType-per">

                                          <label for="regular-form-1" class="form-label">Station %</label>

                                          <input value="{{$chalan->station_per}}" type="text" name="station_per"
                                             class="form-control" />

                                       </div>

                                    </div>

                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Mobile No</label>

                                          <input value="{{$chalan->mobile_no}}" type="text" name="mobile_no"
                                             class="form-control" />

                                       </div>

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Malik/Broker</label>

                                          <input value="{{$chalan->broker}}" type="text" name="broker"
                                             class="form-control" />

                                       </div>

                                    </div>

                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Delivery Charges</label>

                                          <input value="{{$chalan->DeliveryCharges}}" type="text" name="DeliveryCharges"
                                             class="form-control" />



                                       </div>

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Vehicle Rent</label>

                                          <input value="{{$chalan->VehicleRent}}" type="number" name="VehicleRent"
                                             class="form-control" />

                                       </div>

                                    </div>

                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-12">

                                          <label class="form-label">Notes</label>

                                          <textarea name="notes" class="form-control"
                                             rows="4">{{ $chalan->notes }}</textarea>

                                          <!--<input value="{{$chalan->DeliveryCharges}}" type="text" name="DeliveryCharges" class="form-control" />-->



                                       </div>

                                    </div>









                                    <!--<button class="btn btn-primary mt-5">Submit</button>-->

                                 </div>

                              </div>

                              <div class="step">

                                 <div class="preview">

                                    <h3 style="font-size:22px;margin:15px auto">Selected Builties</h3>


                                    <table class="Saif_Table_Noshera">

                                       <tr>

                                          <th>TR No</th>

                                          <th>Status</th>

                                          <th>Date</th>

                                       </tr>

                                       <tbody>
                                          <?php 
                                             $y = 1;
                                          foreach ($challanlist as $spd) {
                                             $sb_id = $spd->trno;
                                             $selected_builty = DB::select("SELECT * FROM now_builty WHERE `id`='$sb_id'");
                                             foreach ($selected_builty as $select_builty) {
                                             
                                          ?>
                                          <tr>
                                             <td>
                                                <input type="checkbox" class="builties"
                                                   id="track_<?php      echo $select_builty->id; ?>" name="trno[]"
                                                   value="<?php      echo $select_builty->id; ?>" checked>
                                                <label for="track_<?php      echo $select_builty->id; ?>"
                                                   style="position: relative;">Bilty NO #
                                                   <?php      echo $select_builty->builty_id; ?></label>
                                             </td>
                                             <?php      if ($select_builty->builty_status == 'in warehouse') { ?>
                                             <td>In Warehouse</td>
                                             <?php      } else if ($select_builty->builty_status == 'dispatched') { ?>
                                             <td>Dispatched</td>
                                             <?php         } ?>
                                             <td><?php      echo $select_builty->date?></td>
                                          </tr>
                                          <?php 
                                             }
                                             $y++;
                                          } 
                                          ?>

                                       </tbody>

                                    </table>


                                 </div>

                                 <div class="preview">

                                    <h3 style="font-size:22px;margin:15px auto">Select Builty</h3>

                                    <div class="mt-2">

                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">From Date</label>

                                             <input value="{{$chalan->from_date}}" name="from_date" id="from_date"
                                                type="date" class="form-control">

                                             <input type="hidden" value="<?php //echo $id ?>" name="builtyid">

                                          </div>

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">To Date</label>

                                             <input value="{{$chalan->to_date}}" name="to_date" id="to_date" type="date"
                                                class="form-control">

                                          </div>

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">Station</label>

                                             <select id="to_station" class="station_filter form-select sm:mr-2"
                                                aria-label="Default select example" name="station_filter">

                                                <option value="">Select Station To </option>

                                                @foreach($stations as $station)

                                       <option value="{{ $station->id }}">{{ $station->name }}</option>


                                    @endforeach

                                             </select>

                                          </div>

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label"> Filter</label>

                                             <input id="regular-form-4" onclick="filterbuilty()" type="button"
                                                class="form-control" value="submit">

                                          </div>

                                       </div>

                                    </div>

                                    <br>



                                    <table class="Saif_Table_Noshera">

                                       <tr>

                                          <th>TR No</th>

                                          <th>Status</th>

                                          <th>Date</th>

                                       </tr>

                                       <tbody id="station_builty">

                                       </tbody>

                                    </table>

                                    <!--<button class="btn btn-primary mt-5">Back</button> -->

                                    <div class="btn btn-primary mt-5" id="prev">Back</div>

                                    <input type="submit" value="Dispatch" name="Dispatch" class="btn btn-primary mt-5">

                                    <!--<input type="submit" name="submit" value="submit" class="btn btn-primary mt-5">-->

                                 </div>

                              </div>

                              <div class="btn btn-primary mt-5" id="next">Next</div>

                              <div class="btn btn-primary mt-5" id="prev" style="visibility:hidden">Back</div>

                           </div>

                        </div>

                     </div>

                     <!-- END: Input -->

                     <!-- BEGIN: Input Sizing -->

                  </div>

               </div>

            </div>

      </form>

   </div>

   <!-- END: Content -->

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">

   $("#station").change(function () {

      var to = this.value;

      // alert(station);die;

      $.ajax({

         type: 'GET',

         url: '<?php echo url('/') ?>/station-builty',

         data: { to: to },

         success: function (res) {

            $('#station_builty').html(res);

         }

      });

   });





   <?php if ($chalan->station_type == 'Export') { ?>

   $('#stationType-per').show();

   <?php } else { ?>



   $('#stationType-per').hide();

   <?php } ?>



   $("#stationType").change(function () {

      var to = this.value;

      if (to == 'Export') {

         $('#stationType-per').show();

      }

      else {

         $('#stationType-per').hide();

      }

   });





   function filterbuilty() {

      var from = $('#from_date').val();

      var to = $('#to_date').val();

      var station = $('.station_filter').val();

      if (from == '') {
         toastr.warning('Please select starting date!');
         return false;
      }
      else if (to == '') {
         toastr.warning('Please select ending date!');
         return false;
      }
      else if (station == '') {
         toastr.warning('Please select station!');
         return false;
      }

      toastr.warning('Fetching Data!');

      $.ajax({

         type: 'GET',

         url: '<?php echo url('/') ?>/filter-builty',

         data: { from: from, to: to, station: station },

         success: function (res) {

            let html = ''

            if (res.total_rows > 0) {

               $('#station_builty').html('<tr><td colspan="3" style="text-align:center">Loading Data</td></tr>');

               // Initialize the HTML string

               // Loop through the data
               res.data.forEach((b, i) => {
                  // Determine the state based on builty_status
                  const state = b.builty_status == 'in warehouse' ? 'In Warehouse' : 'Dispatched';

                  // Append the HTML for each row
                  html += `
  <tr>
      <td>${i + 1}</td>
      <td>
          <input type="checkbox" class="builties" id="track_${b.id}" name="trno[]" value="${b.id}">
          <label for="track_${b.id}" style="position: relative;">Bilty NO # ${b.builty_id}</label>
      </td>
      <td>${state}</td>
  </tr>`;
               });

               // Remove unchecked rows
               $('input:not(:checked)').closest('tr').remove();


               // Update the HTML of #station_builty
               $('#station_builty').html(html);
               toastr.success('Data fetched successfully!');

            }
            else {
               toastr.warning('No Data Found!');
               return false;
            }

         }

      });

   }







   $(document).ready(function () {



      /* 
 
 $("#from_date").on("change", function () {
 
 if (this.value.length > 0) {   
 
   $("tr").hide().filter(function () {
 
     return $(this).text().toLowerCase().indexOf($("#from_date").val().toLowerCase()) != -1;
 
   }).show(); 
 
 }  
 
 else { 
 
   $("tr").show();
 
 }
 
 }); 
 
 
 
 $("#to_date").on("change", function () {
 
 if (this.value.length > 0) {   
 
   $("tr").hide().filter(function () {
 
     return $(this).text().toLowerCase().indexOf($("#to_date").val().toLowerCase()) != -1;
 
   }).show(); 
 
 }  
 
 else { 
 
   $("tr").show();
 
 }
 
 }); 
 
 
 
 */



   });

</script>

@endsection