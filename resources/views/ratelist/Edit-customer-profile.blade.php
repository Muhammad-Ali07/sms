@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
<!-- BEGIN: Side Menu -->
@include('includes.side-nav')
<style type="text/css">
   .fcl_div,.lcl_div{
      display: none;
   }
   .flex.flex-col.sm\:flex-row.mt-2.stations_inner_div {
    overflow: auto;
}

</style>    
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
  
      <div class="grid">
         <div class="intro-y flex items-center mt-12">
            <h2 class="text-lg font-medium mr-auto">
               Customer Profile Form
            </h2>
         </div>
         <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
               <!-- BEGIN: Input -->
               <div class="intro-y box">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                     <h2 class="font-medium text-base mr-auto">
                        Customer Profile
                     </h2>
                  </div>
                  <form method="post" action="{{route('add-ratelist-process')}}">
                        @csrf
                   
                  <div id="input" class="p-5">
                     <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                           <div class="col-span-6">
                              <label for="regular-form-1" class="form-label">Select Customer</label>
                              <input type="text" value="{{$rowratelist->name}}" readonly id="regular-form-1" class="customer_id form-select sm:mr-2" aria-label="Default select example">
                              <input type="hidden" value="{{$rowratelist->customerid}}" id="regular-form-1" class="customer_id form-select sm:mr-2" aria-label="Default select example" name="customer_id">
                                
                             
                            
                           </div>
                        </div>
                         
                        <div class="chart">
                           <div class="panel-body" style="padding:10px">
                              <!--<div class="mt-2" style="margin-bottom:10px">
                                 <label for="regular-form-2" class="form-label">Pay Days</label>
                                 <select id="regular-form-1" class="payment form-select sm:mr-2" aria-label="Default select example" name="payment">
                                    <option value=""> Select Days </option>

                                    <option value="15" @if($rowratelist->payment == '15' ) {{'selected'}} @endif > 15</option>
                                    <option value="30" @if($rowratelist->payment == '30' ) {{'selected'}} @endif > 30</option>
                                    <option value="45" @if($rowratelist->payment == '45' ) {{'selected'}} @endif> 45</option>
                                    <option value="60" @if($rowratelist->payment == '60' ) {{'selected'}} @endif> 60</option>
                                    <option value="90" @if($rowratelist->payment == '90' ) {{'selected'}} @endif> 90</option>
                                    <option value="10" @if($rowratelist->payment == '10' ) {{'selected'}} @endif> 120</option>
                                 </select>
                              </div>-->
                              <div class="mt-2" style="margin-bottom:10px">
                                 <label for="regular-form-2" class="form-label">Detentional Amount</label>
                                 <input id="regular-form-2" value="{{$rowratelist->detentional_amount}}" type="text" class="detentional_amount form-control" placeholder="Amount" name="detentional_amount">
                              </div>
                             
                              <div class="col-span-6">
                                 <label class="radio-switch-1">Customer Type</label> <br><br>
                                 <input id="radio-switch-41" class="form-check-input" type="checkbox" name="builty_type[0]" value="lcl" @foreach($lcl_items as $key => $items) @foreach($items as $item) @if($item['type'] == 'lcl') {{'checked'}} @endif @endforeach @endforeach>
                                 <label class="Advance" for="radio-switch-41">LCL</label>
                                 <input id="radio-switch-42" class="Normal form-check-input" type="checkbox" name="builty_type[1]" value="fcl" @foreach($fcl_items as $key => $items) @foreach($items as $item) @if($item['type'] == 'fcl') {{'checked'}} @endif @endforeach @endforeach>
                                 <label class="form-check-label" for="radio-switch-42">FCL</label>
                              </div>
                              


                              <h3 class="lcl_div" style="font-size: 22px; margin: 15px auto; display: block;">LCL</h3>
                              
                                <div class="lcl_div" style="padding: 5px; border: 1px solid rgb(28, 63, 170); border-radius: 5px; display: block;">
                                    <div class="mt-2" style="margin-bottom:10px">
                                    <label for="regular-form-4" class="form-label">Stations</label>
                                    <div class="flex flex-col sm:flex-row mt-2 stations_inner_div">
                                        
                                        @foreach($stations as $key => $station)
                                        @php
                                            $stationName = preg_replace('/\s+/', '', $station->name);
                                        @endphp
                                        <div class="form-check mr-2">
                                           <input id="radio-switch-{{$key}}-lcl" class="lcl_stations form-check-input" type="CheckBox" name="lcl_stations[{{$station->name}}]" data-text="{{$stationName}}" value="{{$station->id}}" @foreach($lcl_items as $key => $items) @foreach($items as $item) @if($station->id == $item['to_id']) {{'checked'}} @endif @endforeach @endforeach>
                                           <label for="radio-switch-{{$key}}-lcl" class="form-check-label">{{$station->name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                    <div class="grid grid-cols-12 gap-2 AddMorePackageslcl" id="customTable">
                                  @if(!empty($lcl_items))
                                      @foreach($lcl_items as $key => $items)
                                        <div class="border_main_here {{$key}}_new" data-text="{{$key}}" id="butnew">
                                            @foreach($items as $item)
                                                @if($item['type'] == 'lcl')
                                               
                                                    <div class="lcl_{{$item['to']}}new_main_border_div">
                                                        <div class="col-span-4">
                                                            <label for="regular-form-1" class="form-label">Package</label>
                                                            <select required id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package_{{$item['to_id']}}[]">
                                                                <option value=''> Select Package </option>
                                                                @foreach($package as $pkg)
                                                                <option value="{{$pkg->id}}" @if($pkg->packagename == $item['package']) {{'Selected'}} @endif> {{$pkg->packagename}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                      
                                                        <div class="col-span-2">
                                                            <label for="regular-form-1" class="form-label">From</label>
                                                            <input type="text" placeholder="Enter Amount" class="form-control" value="{{$item['from']}}" disabled=""><input type="hidden" name="from_{{$item['to_id']}}[]" value="10">
                                                        </div>
                                                        
                                                        <div class="col-span-2">
                                                            <label for="regular-form-1" class="form-label">To</label>
                                                            <input type="text" placeholder="Enter Amount" class="form-control" name="to_{{$item['to_id']}}[]" value="{{$item['to']}}" disabled="">
                                                            <input type="hidden" name="to_{{$item['to_id']}}[]" value="{{$item['to_id']}}">
                                                        </div>
                                                        
                                                        <div class="col-span-2">
                                                            <label for="regular-form-1" class="form-label">Rate</label>
                                                            <input type="text" name="rate_{{$item['to_id']}}[]" placeholder="Enter Amount" class="form-control" value="{{$item['rate']}}" required>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="lcl_{{$key}} border_main_here_new"></div>
                                            <div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here" data-text="lcl_{{$key}}" id="butn" type="button">Add More</button></div>
                                        </div>
                                        @endforeach 
                                    @endif
                                </div>
                                    <div class="addmorepackagediv">  </div>
                                    @if(!empty($lcl_amount) && !empty($lcl_amounthead))
                                        <div class="mt-2 positon-relative other">
                                           @foreach($lcl_amount as $key => $amount)
                                            <div class="rem" id="rem-{{$key}}">
                                               <div class="col-span-3"><label for="regular-form-1" class="form-label">Charges Details</label><input type="text" name="lcl_other_charges[]" placeholder="Enter Charges Details" class="form-control" value="{{$lcl_amounthead[$key]}}"></div>
                                               <div class="col-span-3"><label for="regular-form-1" class="form-label">Amount</label><input type="text" placeholder="Enter Amount" class="form-control" name="lcl_amount[]" value="{{$amount}}"></div>
                                               <div class="col-span-3"><!--<button type="button" class="btn_remove btn-danger mt-5">Remove</button>--></div>
                                               <div class="col-span-3"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                             
                              <h3 class="lcl_div" style="font-size: 22px; margin: 15px auto; display: block;">FCL</h3>
                                 
                                    <div class="fcl_div" style="@if(!empty(!$fcl_items)){{'padding: 5px; border: 1px solid rgb(28, 63, 170); border-radius: 5px; display:none'}} @else {{'padding: 5px; border: 1px solid rgb(28, 63, 170); border-radius: 5px; display:block'}} @endif">
                                        <div class="mt-2" style="margin-bottom:10px">
                                            <label for="regular-form-4" class="form-label">Stations</label>
                                            <div class="flex flex-col sm:flex-row mt-2 stations_inner_div">
                                                 @foreach($stations as $key => $station)
                                                    @php
                                                      $stationName = preg_replace('/\s+/', '', $station->name);
                                                    @endphp
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-{{$key}}-fcl" class="fcl_stations form-check-input" type="CheckBox" name="fcl_stations[{{$station->name}}]" data-text="{{$stationName}}" value="{{$station->id}}"  @foreach($fcl_items as $key => $items) @foreach($items as $item) @if($station->id == $item['to_id']) {{'checked'}} @endif @endforeach @endforeach>
                                                    <label class="form-check-label" for="radio-switch-{{$key}}-fcl">{{$station->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                       <div class="grid grid-cols-12 gap-2 AddMorePackagesfcl" id="fclcustomTable">
                                         @if(!empty($fcl_items))
                                         
                                            @foreach($fcl_items as $key => $items)
                                          
                                            <div class="fcl_border_main_here {{$key}}_new_fcl" data-text="{{$key}}" id="butnew">
                                               @foreach($items as $item)
                                               
                                                    @if($item['type'] == 'fcl')
                                                        <div class="{{$item['to']}}new_main_border_div_fcl">
                                                            
                                                            <div class="col-span-4">
                                                               <label for="regular-form-1" class="form-label">Package</label>
                                                                <select required id="regular-form-1" class="fcl_packages form-select sm:mr-2" aria-label="Default select example" name="fcl_package{{$item['to_id']}}[]">
                                                                    <option value=''> Select Package </option>
                                                                    @foreach($package1 as $pkg1)
                                                                    <option value="{{$pkg1->id}}" @if($pkg1->packagename == $item['package']) {{'Selected'}} @endif> {{$pkg1->packagename}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-span-2">
                                                                <label for="regular-form-1" class="form-label">From</label>
                                                                <input type="text" placeholder="Enter Amount" class="form-control" value="{{$item['from']}}" disabled="">
                                                                <input type="hidden" name="fcl_from_{{$item['to_id']}}[]" value="10">
                                                            </div>
                                                            
                                                            <div class="col-span-2">
                                                                <label for="regular-form-1" class="form-label">To</label>
                                                                <input type="text" placeholder="Enter Amount" class="form-control" name="fcl_to_1[]" value="{{$item['to']}}" disabled="">
                                                                <input type="hidden" name="fcl_to_{{$item['to_id']}}[]" value="{{$item['to_id']}}">
                                                            </div>
                                                            
                                                            <div class="col-span-2">
                                                                <label for="regular-form-1" class="form-label">Rate</label>
                                                                <input type="text" name="fcl_rate_{{$item['to_id']}}[]" placeholder="Enter Amount" class="form-control" value="{{$item['rate']}}" required>
                                                            </div>
                                                            
                                                        </div>
                                                    @endif
                                                @endforeach
                                             <div class="{{$key}} border_main_here_new_fcl"></div>
                                             <div class="test col-span-2"><button class="btn btn-primary mt-5 addmore_new_here_fcl" data-text="{{$key}}" id="butn" type="button">Add More</button></div>
                                        </div>
                                          @endforeach
                                       </div>
                                        <div class="mt-2">
                                            @if(!empty($fcl_amount) && !empty($fcl_amounthead))
                                                <div class="grid grid-cols-12 gap-2 mt-2 positon-relative othercharges">
                                                    @foreach($fcl_amount as $key => $fcl)
                                                        <div class="rem" id="rem-2">
                                                           <div class="col-span-3"><label for="regular-form-1" class="form-label">Charges Details</label><input type="text" name="fcl_other_charges[]" placeholder="Enter Charges Details" class="form-control" value="{{$fcl_amounthead[$key]}}"></div>
                                                           <div class="col-span-3"><label for="regular-form-1" class="form-label">Amount</label><input type="text" placeholder="Enter Amount" class="form-control" name="fcl_amount[]" value="{{$fcl}}"></div>
                                                           <div class="col-span-3"><!--<button type="button" class="btn_remove btn-danger mt-5">Remove</button>--></div>
                                                           <div class="col-span-3"></div>
                                                        </div>
                                                     @endforeach
                                                </div>
                                               
                                            @endif
                                        </div>
                                       @endif
                                    </div>
                           
                        </div>
                     </div>
                  
                  </div>
                  <!-- END: Input -->
                  <!-- BEGIN: Input Sizing -->
               </div>
                <input type="hidden" name="updated_ratelist_id" value="{{$id}}" />
                           <button class="btn btn-primary mt-5" type='submit' id='btnGet'>Submit</button>
                  </form>
            </div>
         </div>
   </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
     
    $('.lcl_stations').on('change', function(){
        var checked = $(this).is(':checked');
        var stations = [];
        $('.lcl_stations:checkbox:checked').each(function(index, val){
           stations.push($(this).attr('data-text'));
        });
        if(checked){
          $('#customTable').append('<div class="border_main_here '+$(this).attr('data-text')+'_new" data-text="'+$(this).attr('data-text')+'" id="butnew"><div class="lcl_'+$(this).attr('data-text')+'new_main_border_div"><div class="col-span-4"><label for="regular-form-1" class="form-label">Package</label><select required id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package_'+$(this).val()+'[]"><option value=""> Select Package </option> @foreach($package as $pkg) <option value="{{$pkg->id}}"> {{$pkg->packagename}} </option> @endforeach </select></div><div class="col-span-2"><label for="regular-form-1" class="form-label">From</label><input type="text" placeholder="Enter Amount" class="form-control" value="Karachi" disabled><input type="hidden" name="from_'+$(this).val()+'[]" value="10"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">To</label> <input type="text" placeholder="Enter Amount" class="form-control" name="to_'+$(this).val()+'[]" value="'+$(this).attr('data-text')+'" disabled> <input type="hidden" name="to_'+$(this).val()+'[]" value="'+$(this).val()+'"> </div> <div class="col-span-2"><label for="regular-form-1" class="form-label">Rate</label><input type="text" name="rate_'+$(this).val()+'[]" placeholder="Enter Amount" class="form-control" required></div></div><div class="lcl_'+$(this).attr('data-text')+' border_main_here_new"></div><div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here" data-text="lcl_'+$(this).attr('data-text')+'" id="butn" type="button">Add More</button></div></div>');
        }else{
         $('.'+$(this).attr('data-text')+'_new').remove();
        }     
    });
       
      $(document).on('click', '.addmore_new_here', function(){
            var button = $('.'+$(this).attr('data-text')+'new_main_border_div').html();
            $('.'+$(this).attr('data-text')).append(button);
      });
      
      $(document).on('click', '.addmore_new_here_fcl', function(){
            var button = $('.'+$(this).attr('data-text')+'new_main_border_div_fcl').html();
            $('.'+$(this).attr('data-text')).append(button);
      });
      
      
       $('.fcl_stations').on('change', function(){ 
          var stations_1 = [];
          $('.fcl_stations:checkbox:checked').each(function(index, val){
               stations_1.push($(this).attr('data-text'));
          });
          var checked = $(this).is(':checked');
          if(checked){
              $('#fclcustomTable').append('<div class="fcl_border_main_here '+$(this).attr('data-text')+'_new_fcl" data-text="'+$(this).attr('data-text')+'" id="butnew"><div class="'+$(this).attr('data-text')+'new_main_border_div_fcl"><div class="col-span-4"><label for="regular-form-1" class="form-label">Package</label><select required id="regular-form-1" class="fcl_packages form-select sm:mr-2" aria-label="Default select example" name="fcl_package'+$(this).val()+'[]"><option value=""> Select Package </option> @foreach($package1 as $pkg1) <option value="{{$pkg1->id}}"> {{$pkg1->packagename}} </option> @endforeach </select></div><div class="col-span-2"><label for="regular-form-1" class="form-label">From</label><input type="text" placeholder="Enter Amount" class="form-control" value="Karachi" disabled><input type="hidden" name="fcl_from_'+$(this).val()+'[]" value="10"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">To</label> <input type="text" placeholder="Enter Amount" class="form-control" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).attr('data-text')+'" disabled> <input type="hidden" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).val()+'"> </div> <div class="col-span-2"><label for="regular-form-1" class="form-label">Rate</label><input type="text" name="fcl_rate_'+$(this).val()+'[]" placeholder="Enter Amount" class="form-control" required></div></div><div class="'+$(this).attr('data-text')+' border_main_here_new_fcl"></div><div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here_fcl" data-text="'+$(this).attr('data-text')+'" id="butn" type="button">Add More</button></div></div>');
          }else{
             $('.'+$(this).attr('data-text')+'_new_fcl').remove();
          } 
       });
     
      var stations = [];
        $("#btnGet").click(function(){
            $('.lcl_stations:checkbox:checked').each(function(index, val){
                stations.push($(this).val());
            });
        });


    $('input[name="builty_type[0]"],input[name="builty_type[1]"]').change(function(){
        var checked = $(this).is(':checked');
        if(checked) {
            if(this.value == 'lcl'){
                $('.lcl_div').show();
            }else if(this.value == 'fcl'){
                $('.fcl_div').show();
            }
        }else {
            if(this.value == 'lcl'){
                $('.lcl_div').hide();
            }else if(this.value == 'fcl'){
                $('.fcl_div').hide();
            }
        }
    }); 
</script>

@endsection