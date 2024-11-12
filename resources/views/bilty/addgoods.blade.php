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
         <form method="post" action="save-goods-process">
         @CSRF
         <div class="grid">
            <div class="intro-y flex items-center mt-12">
               <h2 class="text-lg font-medium mr-auto">
                  Bilty Form
               </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           Goods Calcualtion
                        </h2>
                        <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                           <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                           <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                           </div> -->
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">
                           <div class="grid grid-cols-12 gap-2 mt-2">
                              <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Rate</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="unit">
                                    <option>Select</option>
                                    <option>By Quantity</option>
                                    <option>By Weight</option>
                                    <option>By Lumpsum</option>
                                 </select>
                                 <input type="hidden" value="{{$get_id}}" name="builtyid">
                              </div>
                              <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Packing</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="pack">
                                   <?php
                                    $packing = DB::table('now_packages')->get();
                                   
                                   foreach($packing as $packrow){
                                       ?>
                                       <option value="{{$packrow->packagename}}"> {{$packrow->packagename}}</option>
                                       <?php
                                   } 
                                   ?>
                                 </select>
                              </div>
                              <div class="col-span-4">
                                 <label for="regular-form-1" class="form-label">Good Description</label>
                                 <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example"  name="description">
                                  <?php
                                    $packing = DB::table('now_packages')->get();
                                   
                                   foreach($packing as $packrow){
                                       ?>
                                       <option value="{{$packrow->description}}"> {{$packrow->description}}</option>
                                       <?php
                                   } 
                                   ?>
                                 </select>
                              </div>
                           </div>
                           <div class="grid grid-cols-12 gap-2 mt-2 positon-relative GoodCalculation">
                              <div class="col-span-3">
                                 <label for="regular-form-1" class="form-label">Quantity</label>
                                 <input type="text" placeholder="Enter Quantity" class="form-control"  name="quantity[]">
                              </div>
                              <div class="col-span-3">
                                 <label for="regular-form-1" class="form-label">Brand</label>
                                 <input type="text" placeholder="Enter Brand" class="form-control"  name="brand[]">
                              </div>
                              <div class="col-span-3">
                                 <label for="regular-form-1" class="form-label">Rate</label>
                                 <input type="text" placeholder="Enter Rate" class="form-control" name="rate[]">
                              </div>
                              <div class="col-span-3">
                                 <label for="regular-form-1" class="form-label">Weight</label>
                                 <input type="text" placeholder="Enter Weight" class="form-control" name="weight[]">
                                 <button class="btn btn-primary mt-5 AddMoreGoodCalculation">Add More</button>
                              </div>
                           </div>
                           <button class="btn btn-primary mt-5">Submit</button>
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

        </div>
@endsection