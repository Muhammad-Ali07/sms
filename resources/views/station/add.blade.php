@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">
    @php
        $viewsub = $data['viewsub'];
        $stations = $data['stations'];
    @endphp
      <!-- BEGIN: Side Menu -->
      @include('includes.side-nav') 
              <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
               <!-- BEGIN: Breadcrumb -->
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Station</a> </div>
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
            @php
                $user = auth()->user()->id;
                $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
            @endphp

             <form method="post" id="station_form" action="{{route('add-station-process')}}"> 
               @csrf
                <div class="grid">
                   <div class="intro-y flex items-center mt-12">
                      <h2 class="text-lg font-medium mr-auto">
                         Station Form
                      </h2>
                   </div>
                   <div class="grid grid-cols-12 gap-6 mt-5">
                      <div class="intro-y col-span-12 lg:col-span-12">
                         <!-- BEGIN: Input -->
                         <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                       <h2 class="font-medium text-base mr-auto">
                                          Add a Station
                                       </h2>
                            </div>
                            <div id="input" class="p-5">
                               <div class="preview">
                                   <div class="grid grid-cols-12 gap-2">
                                      <div class="col-span-6">
                                        <label for="regular-form-2" class="form-label">Station Name</label>
                                        <input id="regular-form-2" type="text" value="@if(!empty($edit)) {{''}}    @endif"  class="form-control txtOnly" placeholder="Enter Name in English" name="name">
                                     </div>
                                     
                                    <div class="col-span-6">
                                        <label for="regular-form-1" class="form-label">Station Type</label>
                                        <select id="regular-form-2" class="form-control" name="StationTypes">
                                            <option>Please Select</option>
                                            <option value="Domestic"> Domestic</option>
                                            <option value="Export"> Export</option>
                                        </select>
                                    </div>
    <!--<div class="col-span-4">
                                        <label for="regular-form-1" class="form-label">Station Id</label>
                                        <input id="regular-form-2" @if(!empty($edit)) value="{{$editstation->id}}" @endif  @if(empty($edit))  value="{{rand()}}"   @endif  readonly type="text" class="form-control" placeholder="ID" name="station_id">
                                     </div>-->
                                    
                                  </div>
                           
                                  <div class="mt-2 grid grid-cols-4 gap-2 positon-relative phoneDivbar concern_person_div" id="dynamic-rows">
                                      <div class="row" id="row_1">
                                        <div class="col-md-6 mt-2 p-1">
                                            <label for="regular-form-5" class="form-label">Phone</label>
                                            <input id="validd" type="number" class="form-control number_validation" placeholder="Enter Phone" name="phones[]">
                                        </div>
                                        
                                        <div class="col-md-6 mt-2 p-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="regular-form-5" class="form-label">Concern Person</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="add_more_persons" class="btn btn-primary btn-sm mt-5 add_more_persons float-right" style="position:relative !important; height:25px;">Add More</button>
                                                </div>
                                            </div>
                                            <input id="validd" type="text" class="form-control" placeholder="Name of Concern Person" name="concern_person[]">
                                        </div>
                                    </div>
                                    
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-6 mt-2 p-1">-->
                                    <!--        <label for="regular-form-5" class="form-label">Phone</label>-->
                                    <!--        <input id="validd" type="number" class="form-control number_validation"   placeholder="Enter Phone" name="phones[]">-->
                                            <!--<button class="btn btn-primary mt-5 AddMorePhone">Add More</button>-->
                                    <!--    </div>-->
                                        
                                    <!--    <div class="col-md-6 mt-2 p-1">-->
                                    <!--        <div class="row">-->
                                    <!--            <div class="col-md-6">-->
                                    <!--                <label for="regular-form-5" class="form-label">Concern Person</label>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-md-6">-->
                                    <!--               <button id="add_more_persons" class="btn btn-primary btn-sm mt-5 add_more_persons float-right" style="position:relative !important; height:25px;">Add More</button>-->
                                    <!--            </div>-->

                                    <!--        </div>-->
                                    <!--        <input id="validd" type="text" class="form-control"   placeholder="Name of Concern Person" name="concern_person[]">-->
                                    <!--    </div>-->
                                    <!-- </div>-->

                                  </div>
                                  <div class="mt-2 grid grid-cols-4 gap-2 positon-relative">
                                      <div class="row">
                                        <div class="col-md-12 mt-2 p-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                   <label for="regular-form-6" class="form-label">Address</label>
                                                </div>
                                            </div>
                                           <textarea id="regular-form-6" class="form-control" placeholder="Enter Address"  name="address[]"></textarea>
                                        </div>
                                    </div> 
                                  </div>
                                  <!--<div class="mt-2 grid grid-cols-4 gap-2 positon-relative phoneDivbar">-->
                                  <!--   <div class="col-span-12">-->
                                  <!--      <div class="mt-2">-->
                                  <!--         <label for="regular-form-5" class="form-label">Concern Person</label>-->
                                  <!--         <input id="validd" type="text" class="form-control"   placeholder="Name of Concern Person" name="concern_person[]">-->
                                  <!--      </div>-->
                                  <!--      <button class="btn btn-primary mt-5 AddMorePhone">Add More</button>-->
                                  <!--   </div>-->
                                  <!--</div>-->
                                  
                                  
                                  <!--<div class="mt-2 grid grid-cols-4 gap-2 positon-relative-textarea phoneDivAddress_stat">-->
                                  <!--   <div class="col-span-12">-->
                                  <!--      <div class="mt-2">-->
                                  <!--         <label for="regular-form-6" class="form-label">Address</label>-->
                                  <!--         <textarea id="regular-form-6" class="form-control" placeholder="Enter Address"  name="address[]"></textarea>-->
                                  <!--      </div>-->
                                  <!--      <button class="btn btn-primary mt-5 AddMoreAddress_stat">Add More</button>-->
                                  <!--   </div>-->
                                  <!--</div>-->
                       
                                  
                               </div>
                            </div>
                         </div>
                         <!-- END: Input -->
                         <!-- BEGIN: Input Sizing -->
                      </div>
                   </div>
                </div>
                <div class="btn btn-primary mt-5"> 
                    @if($user_meta->setup == 1)
                        @if($user_meta->insertion == 1)
                            <button type="submit"> Submit </button> 
                        @endif
                    @endif
                
                </div>
                <div class="btn btn-primary mt-5" id="Reset">
                    Reset
                </div>
            </form>
            <form method="post" id="subStationForm" action="{{route('add-sub-station-process')}}"> 
               @csrf
                <div class="grid">
                   <div class="grid grid-cols-12 gap-6 mt-5">
                      <div class="intro-y col-span-12 lg:col-span-12">
                         <!-- BEGIN: Input -->
                         <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                               <h2 class="font-medium text-base mr-auto">
                                  Add a Sub Station
                               </h2>
                              
                            </div>
                            <div id="input" class="p-5">
<div class="preview">
    <div class="col-md-6 c_name">
        <label for="regular-form-2">Station Name</label>
        <select required class="form-control txtOnly" name="station">
            <option value="select">Select Station</option>
            @foreach($stations as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-6 gap-2 position-relative phoneDivbar1" id="subStationContainerDiv">
        <div class="col-span-12 sub-station-container" id="subStationContainer">
            <!-- Existing sub-station rows go here -->
            <div class="col-span-12 sub-station-row" id="subStationRow_1">
                <div>
                    <label for="regular-form-5" class="form-label">Sub Station Name</label>
                    <input id="valid_1" type="text" class="form-control" placeholder="Enter Sub Station Name" name="sub_stations[]">
                </div>
                <button class="btn btn-danger mt-5 remove-btn" id="remove_sub_station_1">Remove</button>
            </div>
        </div>
        <!-- Add More button -->
        <button type="button" class="btn btn-primary mt-5" id="add_more_sub_station">Add More</button>
    </div>
</div>




    
    
    
                               <!--<div class="preview">-->
                               <!--    <div class="col-md-6 c_name">-->
                               <!--      <label for="regular-form-2" class="">Station Name</label>-->
                               <!--      <select  required  class="form-control txtOnly" name="station">-->
                               <!--          <option>Select Station</option>-->
                               <!--             @foreach($stations as $row)-->
                               <!--             <option value="{{$row->id}}">{{$row->name}}</option>-->
                               <!--             @endforeach-->
                               <!--          </select>-->
                               <!--   </div>-->
                                  
                               <!--   <div class="grid grid-cols-6 gap-2 positon-relative phoneDivbar1">-->
                               <!--      <div class="col-span-12">-->
                               <!--         <div class="">-->
                               <!--            <label for="regular-form-5" class="form-label">Sub Station Name</label>-->
                               <!--            <input id="valid" type="text" class="form-control"   placeholder="Enter Phone" name="phones[]">-->
                               <!--         </div>-->
                               <!--         <button class="btn btn-primary mt-5 AddMorePhone1">Add More</button>-->
                               <!--      </div>-->
                               <!--   </div>-->
                               <!-- </div>-->
                            </div>
                         </div>
                         <!-- END: Input -->
                         <!-- BEGIN: Input Sizing -->
                      </div>
                   </div>
                </div>
                <div class="btn btn-primary mt-5"> 
                    @if($user_meta->setup == 1)
                        @if($user_meta->insertion == 1)
                            <button type="submit"> Submit </button> 
                        @endif
                    @endif
                </div>
                <div class="btn btn-primary mt-5" id="Reset">
                    Reset
                </div>
            </form>
            <br>
             <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                             View Sub Station
                           </h2>
                          
                        </div>
                       
                        <div id="input" class="p-5">
                           <div class="preview">
                                 <table id="view_sub_stations" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Station Name</th>
                                       <th>Sub Station</th>
                                      <!--<th>Actions</th>-->
                                    </tr>
                                 </thead>
                                 <tbody>
                         
                                @foreach($viewsub as $rowsub)
                                    <tr>
                                    <td>{{$rowsub->name}}</td>
                                    <td>{{$rowsub->stationName}}</td>
                                    <!--<td><a href="edit-station-view/{{$rowsub->id}}"> Edit </a> |-->
                                    <!--        <a onclick="return confirm('Are you sure you want to delete {{$rowsub->id}} ?')" href="delete-edit-process/{{$rowsub->id}}"> Delete </a> |-->
                                    <!--            <a href="view-station-details/{{$rowsub->id}}"> View </a>-->
                                    <!--        </td>-->
                             </tr>
                                    
                                @endforeach
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <th>Station Name</th>
                                       <th>Sub Station</th>
                                      
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                        
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
             
             <div  class="intro-y p-5">
               <div class="intro-y box preview">  
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                       <h2 class="font-medium text-base mr-auto">
                          All Station
                       </h2>
                    </div>
                    <table id="example1111" class="display nowrap mt-5" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Name</th>

                                       <th>Phone</th>
                                       <th>Concern Person</th>
                                       <th>Address</th>
                                       <th>Station Type</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                        @foreach($stations as $key => $station )
                                        <tr>
                                            <td>{{$station->name}}</td>
                                            <td>{{$station->phones}}</td>
                                            <td>{{$station->concern_person}}</td>
                                            <td> {{$station->address}} </td>
                                            <td> {{$station->station_type_name}} </td>
                                            <td>
                                                @if($user_meta->setup == 1)
                                                    @if($user_meta->edition == 1 )
                                                        <a href="edit-station-view/{{$station->id}}"> Edit </a> |
                                                    @endif
                                                    @if($user_meta->deletion == 1)
                                                        <a onclick="return confirm('Are you sure you want to delete {{$station->id}} ?')" href="delete-edit-process/{{$station->id}}"> Delete </a> |
                                                    @endif
                                                @endif
                                                <a href="view-station-details/{{$station->id}}"> View </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                 </tbody>
                                 <tfoot>
                                   <tr>
                                       <th>Name</th>


                                       <th>Phone</th>
                                                                              <th>concern_person</th>
                                       <th>Address</th>
                                        <th>Station Type</th>
                                       <th>Action</th>
                                    </tr>
                                 </tfoot>
                            </table>

               </div>
             </div>
             
         </div>
        </div>
        
        


@endsection


@section('script')


<script>
$("input[name=commission]").on("keypress", function(e){
     var myval = $(this).val();
      
     if(myval.length > 1) {
          alert("Value must contain 2 characters.");
          $(this).focus();
          e.preventDefault();
     }   
});
   </script>
   
<script>
$('#valid').on("keypress", function(e){
     var myval = $(this).val();
      
     if(myval.length > 10) {
          alert("Value must contain 11 characters.");
          $(this).focus();
          e.preventDefault();
     }   
});

$('#view_sub_stations').DataTable({

            "pageLength":25,

               dom: 'Bfrtip',

                buttons: [

            { extend: 'print', exportOptions:

                { columns: ':visible' }

            },

            // { extend: 'copy', exportOptions:

            //      { columns: [ 0, ':visible' ] }

            // },

            // { extend: 'excel', exportOptions:

            //      { columns: ':visible' }

            // },

            { extend: 'pdf'//, exportOptions:

                //   { columns: [ 0, 1, 2, 3, 4 ,5,6,7,8] }

            }

           ],

             });
</script>

<script>
    $(document).ready(function () {
        let rowCount = 1; // Counter to keep track of unique row IDs
    
        // Function to handle adding more rows
        $(document).on('click', '.add_more_persons', function (e) {
            e.preventDefault();
            rowCount++; // Increment row count to generate a unique ID for the new row
            
            // Clone the row and replace the button with "Remove"
            let newRow = `
                <div class="row" id="row_${rowCount}">
                    <div class="col-md-6 mt-2 p-1">
                        <label for="regular-form-5" class="form-label">Phone</label>
                        <input id="validd" type="number" class="form-control number_validation" placeholder="Enter Phone" name="phones[]">
                    </div>
                    <div class="col-md-6 mt-2 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="regular-form-5" class="form-label">Concern Person</label>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-sm mt-5 remove_persons float-right" style="position:relative !important; height:25px;" data-row-id="row_${rowCount}">Remove</button>
                            </div>
                        </div>
                        <input id="validd" type="text" class="form-control" placeholder="Name of Concern Person" name="concern_person[]">
                    </div>
                </div>
            `;
            
            // Append the new row to the div
            $('#dynamic-rows').append(newRow);
        });
    
        // Function to remove a specific row
        $(document).on('click', '.remove_persons', function (e) {
            e.preventDefault();
            let rowId = $(this).data('row-id'); // Get the row ID from the button
            $('#' + rowId).remove(); // Remove the specific row by ID
        });
    });
    // add sub station by ajax
    $(document).ready(function() {
    $('#subStationForm').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var stationValue = $('select[name="station"]').val();

        if (stationValue === "select" || stationValue === "") {
            alert("Please select a valid station.");
            e.preventDefault(); // Prevent form submission
        }else{
            $.ajax({
            url: $(this).attr('action'), // Form action URL
            type: 'POST', // Method type
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Optionally reset the form or update the UI
                $('#subStationForm')[0].reset();
                toastr.success('Sub station added successfully.', 'Success');
                
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle errors
                toastr.error('Something went wrong.', 'error');
                console.log(response);            }
        });
        }
    });

    $('#Reset').click(function() {
        // Reset the form when the Reset button is clicked
        $('#subStationForm')[0].reset();
    });
});




$(document).ready(function() {
    let counter = 1; // Initialize a counter to keep track of the number of sub-station rows

    $('#add_more_sub_station').click(function(event) {
        event.preventDefault(); // Prevent the default action of the button
        counter++; // Increment the counter for each new row
        // Append a new sub-station row with a unique ID for the remove button
        $('#subStationContainer').append(`
            <div class="col-span-12 sub-station-row" id="subStationRow_${counter}">
                <div>
                    <label for="regular-form-5" class="form-label">Sub Station Name</label>
                    <input id="valid_${counter}" type="text" class="form-control" placeholder="Enter Sub Station Name" name="sub_stations[]">
                </div>
                <button class="btn btn-danger mt-5 remove-btn" id="remove_sub_station_${counter}">Remove</button>
            </div>
        `);
    });

    // Delegate event handling for dynamically added remove buttons
    $('#subStationContainer').on('click', '.remove-btn', function() {
        $(this).closest('.sub-station-row').remove();
    });
});


// $(document).ready(function() {
//     let counter = 1; // Initialize a counter to keep track of the number of sub-station rows

//     $('#add_more_sub_station').click(function() {
//         counter++; // Increment the counter for each new row
//         // Append a new sub-station row with a unique ID for the remove button
//         $('#subStationContainer').append(`
//             <div class="col-span-12 sub-station-row" id="subStationRow_${counter}">
//                 <div>
//                     <label for="regular-form-5" class="form-label">Sub Station Name</label>
//                     <input id="valid_${counter}" type="text" class="form-control" placeholder="Enter Sub Station Name" name="sub_stations[]">
//                 </div>
//                 <button class="btn btn-danger mt-5 remove-btn" id="remove_sub_station_${counter}">Remove</button>
//             </div>
//         `);
//     });

//     // Delegate event handling for dynamically added remove buttons
//     $('#subStationContainer').on('click', '.remove-btn', function() {
//         $(this).closest('.sub-station-row').remove();
//     });
// });

</script>
   
   
   @endsection

@section('jquery_validation')
<script>
    $("#station_form").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Station name is required!",
            },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });
// Custom method to check that the value is not "select"
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Please select a valid option."); // Default message

    // Initialize form validation
    $("#subStationForm").validate({
        rules: {
            station: {
                valueNotEquals: "select" // Custom rule for the dropdown
            }
        },
        messages: {
            station: {
                valueNotEquals: "Please select an option other than 'Select'"
            }
        },
        errorElement: 'span', // Error element
        errorPlacement: function (error, element) {
            error.addClass('text-danger'); // Add Bootstrap class for styling
            error.insertAfter(element); // Display the error after the dropdown
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid'); // Add error class
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid'); // Remove error class
        }
    });

</script>
@endsection