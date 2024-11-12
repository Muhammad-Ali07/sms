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
      <!-- END: Top Bar -->
      <form method="post" action="{{route('add-trs-builty)}}">
         @csrf
         <div class="grid">
            <div class="intro-y flex items-center mt-2">
               <h2 class="text-lg font-medium mr-auto">
                  Challan Form
               </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div id="input">
                        <div class="preview">
                           <!-- BEGIN: Modal Header -->
                           <div class="modal-header">
                              <h2 class="font-medium text-base mr-auto">
                                 Select TRs(Bilty No) to Dispatch
                              </h2>
                           </div>
                           <!-- END: Modal Header -->
                           <!-- BEGIN: Modal Body -->
                           <div class="modal-body">
                              <div class="preview">
                                 <div class="mt-2">
                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                       <div class="col-span-6">
                                          <label for="regular-form-4" class="form-label">From Date</label>
                                          <input id="regular-form-4" type="date" class="form-control">
                                          <input type="hidden" value="<?php echo $id ?>" name="builtyid">
                                       </div>
                                       <div class="col-span-6">
                                          <label for="regular-form-4" class="form-label">To Date</label>
                                          <input id="regular-form-4" type="date" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                                 <br>
                                 <table class="Saif_Table_Noshera">
                                    <tr>
                                       <th>TR No</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                    <?php
                                   $builties =  DB::table('now_builty')->get();
                                      foreach($builties as $builty){
                                          
                                             if($builty->note == 0){
                                                 $stast = "In WareHouse";
                                             }
                                             else{
                                                 $stast = "Dispatched"; 
                                             }
                                           echo '
                                            <tr>
                                               <td><input type="checkbox"  id="track"  name="trno[]"  value="'.$builty->id.'"> <label for="track">TR NO # '.$builty->id.'</label></td>
                                               <td >'.$stast.'</td>
                                               <td><a href="#"><a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-previews" class="btn btn-primary mt-5" style="margin-top: 0;">
                                         Child Bilty
                                         </a></a></td>
                                           </tr>';
                                         }

                                         ?>
                                 </table>
                                 <button class="btn btn-primary mt-5">Back</button>
                                 <input type="submit" value="Dispatch" name="Dispatch" class="btn btn-primary mt-5">
                                 <button class="btn btn-primary mt-5">Cancel</button>
                              </div>
                           </div>
                           <!-- END: Modal Body -->
                        </div>
                        <!-- END: Content -->
                        <div id="header-footer-modal-previews" class="modal modalAddChallan" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <!-- BEGIN: Modal Header -->
                                 <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">
                                       Child Bilty
                                    </h2>
                                 </div>
                                 <!-- END: Modal Header -->
                                 <!-- BEGIN: Modal Body -->
                                 <div class="modal-body">
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">TR No (Bilty No)</label>
                                             <input type="text" placeholder="Enter TR No (Bilty No)" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Packing</label>
                                             <input id="regular-form-4" placeholder="Enter Packing" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">Bilty Type</label>
                                             <!-- <input type="text" placeholder="Enter Bilty Type" class="form-control"> -->
                                             <select id="regular-form-1" class="form-control" aria-label="Default select example">
                                                <option>Walk-in Customer</option>
                                                <option>Regular Customer</option>
                                             </select>
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Total Quantity</label>
                                             <input id="regular-form-4" placeholder="Enter Total Quantity" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">Sender</label>
                                             <input type="text" placeholder="Enter Sender" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Quantity Loaded</label>
                                             <input id="regular-form-4" type="number" class="form-control" placeholder="Enter Quantity Loaded">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">Receiver</label>
                                             <input type="text" placeholder="Enter Receiver" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Quantity Left</label>
                                             <input id="regular-form-4" placeholder="Enter Quantity Left" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">From</label>
                                             <input type="text" placeholder="Enter From" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Date of Bilty</label>
                                             <input id="regular-form-4" placeholder="Enter Quantity Left" type="date" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">To</label>
                                             <input type="text" placeholder="Enter To" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Date of Child Bilty</label>
                                             <input id="regular-form-4" placeholder="Enter Date of Child Bilty" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-6">
                                             <label for="regular-form-1" class="form-label">Receiver</label>
                                             <input type="text" placeholder="Enter Receiver" class="form-control">
                                          </div>
                                          <div class="col-span-6">
                                             <label for="regular-form-4" class="form-label">Quantity Left</label>
                                             <input id="regular-form-4" placeholder="Enter Quantity Left" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                          <div class="col-span-12">
                                             <label for="regular-form-1" class="form-label">Delivery Mode</label>
                                             <input type="text" placeholder="Enter Delivery Mode" class="form-control">
                                          </div>
                                          <div class="col-span-12">
                                             <label for="regular-form-4" class="form-label">Vehicle No (For Quantity Loader)</label>
                                             <input id="regular-form-4" placeholder="Enter Vehicle No (For Quantity Loader)" type="text" class="form-control">
                                          </div>
                                          <div class="col-span-12">
                                             <label for="regular-form-4" class="form-label">Vehicle No (For Quantity Left)</label>
                                             <input id="regular-form-4" placeholder="Enter Vehicle No (For Quantity Left)" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <button class="btn btn-primary mt-5">Create Child Bilty</button>
                                    <button class="btn btn-primary mt-5">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
   <!-- END: Content -->
</div>
@endsection