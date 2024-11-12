@extends('layouts.master')
@section('body')
main
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@endsection
@section('css')
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   <?php
      /*if($select != ''){

      $totalbuiltiesamount = [];

      foreach($select as $row){

      $newselect =DB::table('now_builtyitems')->where('builtyid',$row->id)->first();

      if($newselect != ''){

      $totalbuiltiesamount[] =  $newselect->total;

      }

      }



      $totalbillingamount = array_sum($totalbuiltiesamount);





      }*/



      ?>
   <!-- BEGIN: Side Menu -->
   @include('includes.side-nav')
   @php   $deletion=1;  @endphp
   <?php $serial = 0; ?>
   <!-- BEGIN: Content -->
   <div class="content">
      <!-- BEGIN: Top Bar -->
      @include('includes.top-bar')
      <!-- END: Top Bar -->
      <div class="grid grid-cols-12 gap-6">
         <div class="col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
               <!-- BEGIN: General Report -->
               <div class="col-span-12 mt-8">
                  <div class="intro-y flex items-center h-10">
                     <h2 class="text-lg font-medium truncate mr-5">
                        Dashboard
                     </h2>
                     <a href="" class="ml-auto flex items-center " style="color:#000"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                  </div>
                  <div class="grid grid-cols-12 gap-6 mt-5 grid_col_dashboard">
                     <?php  if(auth()->user()->role_id!='2'){?>
                     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                           <div class="box p-5">
                              <div class="flex">
                                 <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                 <div class="ml-auto">
                                    <div class="report-box__indicator bg-success cursor-pointer">
                                       33%
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="">
                                          <polyline points="18 15 12 9 6 15"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-3xl font-bold leading-8 mt-6">{{$customer}}</div>
                              <div class="text-base text-gray-600 mt-1">Total Customer</div>
                           </div>
                        </div>
                     </div>
                     <?php }?>
                     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                           <div class="box p-5">
                              <div class="flex">
                                 <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                 <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                       2%
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                          <polyline points="6 9 12 15 18 9"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-3xl font-bold leading-8 mt-6">{{$no_of_builties}}</div>
                              <div class="text-base text-gray-600 mt-1">No of Bilties</div>
                           </div>
                        </div>
                     </div>
                     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                           <div class="box p-5">
                              <div class="flex">
                                 <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                 <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                       12%
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                          <polyline points="6 9 12 15 18 9"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-3xl font-bold leading-8 mt-6">{{$BuiltiesTotal}}</div>
                              <div class="text-base text-gray-600 mt-1">Total Builties Amount</div>
                           </div>
                        </div>
                     </div>
                     <?php  if(auth()->user()->role_id!='2'){?>
                     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                           <div class="box p-5">
                              <div class="flex">
                                 <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                 <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                       22%
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                          <polyline points="6 9 12 15 18 9"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-3xl font-bold leading-8 mt-6">{{ number_format($billTotal, 0, '.', ',') }}
                              </div>
                              <div class="text-base text-gray-600 mt-1">Amount Of Sales</div>
                           </div>
                        </div>
                     </div>
                     <?php }?>
                  </div>
               </div>
               <!-- END: General Report -->
               <!-- BEGIN: Sales Report -->
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5 newstyle___">
               <div class="col-span-12 2xl:col-span-9">
                  <div class="grid grid-cols-12 gap-6">
                     <!-- BEGIN: Notification -->
                     <!-- BEGIN: Notification -->
                     <!-- BEGIN: General Report -->
                     <?php  if(auth()->user()->role_id!='2'){?>
                     <div class="col-span-12 lg:col-span-8 xl:col-span-6 mt-2">
                        <div class="intro-y block sm:flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                           <select class="sm:ml-auto mt-3 sm:mt-0 sm:w-auto form-select box">
                              <option value="daily">Daily</option>
                              <option value="weekly">Weekly</option>
                              <option value="monthly">Monthly</option>
                              <option value="yearly">Yearly</option>
                              <option value="custom-date">Custom Date</option>
                           </select>
                        </div>
                        <div class="report-box-2 intro-y mt-12 sm:mt-5">
                           <div class="box sm:flex">
                              <div class="px-8 py-12 flex flex-col justify-center flex-1">
                                 <svg style="color: #f78b01" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-bag" data-lucide="shopping-bag" class="lucide lucide-shopping-bag w-10 h-10 text-warning">
                                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 01-8 0"></path>
                                 </svg>
                                 <div class="relative text-3xl font-medium mt-12 pl-4 ml-0.5">
                                    <span class="absolute text-2xl font-medium top-0 left-0 -ml-0.5">$</span> 54.143
                                 </div>
                                 <div class="mt-4 text-slate-500">Sales earnings this month after associated author fees, & before taxes.</div>
                                 <button class="btn btn-outline-secondary relative justify-start rounded-full mt-12" style="background: #6c0606;color: #fff;">
                                 Download Reports
                                 <span class="w-8 h-8 absolute flex justify-center items-center bg-primary text-white rounded-full right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                                 <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                 </span>
                                 </button>
                              </div>
                              <div class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                 <div class="text-slate-500 text-xs">TOTAL TRANSACTION</div>
                                 <div class="mt-1.5 flex items-center">
                                    <div class="text-base">4.501</div>
                                    <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2" title="2% Lower than last month">
                                       2%
                                       <svg style="color: #c90000;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                          <polyline points="6 9 12 15 18 9"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="text-slate-500 text-xs mt-5">CANCELATION CASE</div>
                                 <div class="mt-1.5 flex items-center">
                                    <div class="text-base">2</div>
                                    <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2" title="0.1% Lower than last month">
                                       0.1%
                                       <svg style="color: #c90000;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                          <polyline points="6 9 12 15 18 9"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="text-slate-500 text-xs mt-5">GROSS RENTAL VALUE</div>
                                 <div class="mt-1.5 flex items-center">
                                    <div class="text-base">$72.000</div>
                                    <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="49% Higher than last month">
                                       49%
                                       <svg style="color: #f78b01;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                          <polyline points="18 15 12 9 6 15"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="text-slate-500 text-xs mt-5">GROSS RENTAL PROFIT</div>
                                 <div class="mt-1.5 flex items-center">
                                    <div class="text-base">$54.000</div>
                                    <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="52% Higher than last month">
                                       52%
                                       <svg style="color: #f78b01;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                          <polyline points="18 15 12 9 6 15"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="text-slate-500 text-xs mt-5">NEW USERS</div>
                                 <div class="mt-1.5 flex items-center">
                                    <div class="text-base">2.500</div>
                                    <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="52% Higher than last month">
                                       52%
                                       <svg style="color: #f78b01;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                          <polyline points="18 15 12 9 6 15"></polyline>
                                       </svg>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- END: General Report -->
                     <!-- BEGIN: Visitors -->
                     <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2">
                        <div class="intro-y flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">Visitors</h2>
                           <a href="" class="ml-auto text-primary truncate">View on Map</a>
                        </div>
                        <div class="report-box-2 intro-y mt-5">
                           <div class="box p-5">
                              <div class="flex items-center">
                                 Realtime active users
                                 <div class="dropdown ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i>
                                    </a>
                                    <div class="dropdown-menu w-40">
                                       <ul class="dropdown-content">
                                          <li>
                                             <a href="" class="dropdown-item">
                                             <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export
                                             </a>
                                          </li>
                                          <li>
                                             <a href="" class="dropdown-item">
                                             <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-2xl font-medium mt-2">214</div>
                              <div class="border-b border-slate-200 flex pb-2 mt-4">
                                 <div class="text-slate-500 text-xs">Page views per second</div>
                                 <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-auto" title="49% Lower than last month">
                                    49% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                 </div>
                              </div>
                              <div class="mt-2 border-b broder-slate-200">
                                 <div class="-mb-1.5 -ml-2.5">
                                    <canvas id="report-bar-chart" height="79"></canvas>
                                 </div>
                              </div>
                              <div class="text-slate-500 text-xs border-b border-slate-200 flex mb-2 pb-2 mt-4">
                                 <div>Top Active Pages</div>
                                 <div class="ml-auto">Active Users</div>
                              </div>
                              <div class="flex">
                                 <div>/letz-lara…review/2653</div>
                                 <div class="ml-auto">472</div>
                              </div>
                              <div class="flex mt-1.5">
                                 <div>/rubick…review/1674</div>
                                 <div class="ml-auto">294</div>
                              </div>
                              <div class="flex mt-1.5">
                                 <div>/profile…review/46789</div>
                                 <div class="ml-auto">83</div>
                              </div>
                              <div class="flex mt-1.5">
                                 <div>/profile…review/24357</div>
                                 <div class="ml-auto">21</div>
                              </div>
                              <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4" style="background: #6c0606;color: #fff;">Real-Time Report</button>
                           </div>
                        </div>
                     </div>
                     <!-- END: Visitors -->
                     <!-- BEGIN: Users By Age -->
                     <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2 lg:mt-6 xl:mt-2">
                        <div class="intro-y flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">Users By Age</h2>
                           <a href="" class="ml-auto text-primary truncate">Show More</a>
                        </div>
                        <div class="report-box-2 intro-y mt-5">
                           <div class="box p-5">
                              <ul
                                 class="
                                 nav
                                 nav-pills
                                 w-4/5
                                 bg-slate-100
                                 dark:bg-black/20
                                 rounded-md
                                 mx-auto
                                 "
                                 role="tablist"
                                 >
                                 <li id="active-users-tab" class="nav-item flex-1" role="presentation">
                                    <button
                                       class="nav-link w-full py-1.5 px-2 active"
                                       data-tw-toggle="pill"
                                       data-tw-target="#active-users"
                                       type="button"
                                       role="tab"
                                       aria-controls="active-users"
                                       aria-selected="true"
                                       >
                                    Active
                                    </button>
                                 </li>
                                 <li id="inactive-users-tab" class="nav-item flex-1" role="presentation">
                                    <button
                                       class="nav-link w-full py-1.5 px-2"
                                       data-tw-toggle="pill"
                                       data-tw-target="#inactive-users"
                                       type="button"
                                       role="tab"
                                       aria-selected="false"
                                       >
                                    Inactive
                                    </button>
                                 </li>
                              </ul>
                              <div class="tab-content mt-3">
                                 <div class="tab-pane active" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
                                    <div class="relative">
                                       <canvas class="mt-3" id="report-donut-chart" height="208"></canvas>
                                       <div class="flex flex-col justify-center items-center absolute w-full h-full top-0 left-0">
                                          <div class="text-2xl font-medium">2.501</div>
                                          <div class="text-slate-500 mt-0.5">Active Users</div>
                                       </div>
                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-3">
                                       <div class="flex items-center">
                                          <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                          <span class="truncate">17 - 30 Years old</span>
                                          <span class="font-medium ml-auto">62%</span>
                                       </div>
                                       <div class="flex items-center mt-4">
                                          <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                          <span class="truncate">31 - 50 Years old</span>
                                          <span class="font-medium ml-auto">33%</span>
                                       </div>
                                       <div class="flex items-center mt-4">
                                          <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                          <span class="truncate">>= 50 Years old</span>
                                          <span class="font-medium ml-auto">10%</span>
                                       </div>
                                       <div class="flex items-center mt-4">
                                          <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                          <span class="truncate">>= 50 Years old</span>
                                          <span class="font-medium ml-auto">10%</span>
                                       </div>
                                       <div class="flex items-center mt-4">
                                          <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                          <span class="truncate">>= 50 Years old</span>
                                          <span class="font-medium ml-auto">10%</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- END: Users By Age -->
                    <?php }?>
                     <!-- BEGIN: Official Store -->
                     <div class="col-span-12 lg:col-span-6">
                        <div class="intro-y block sm:flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">
                              Bilty
                           </h2>
                           <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                              <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                           </div>
                        </div>
                        <!--mt-12 sm:mt-5-->
                        <div class="intro-y box p-5">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>To</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(!empty($builties))
                                 @foreach($builties as $builty)
                                 @php
                                 $tostation = DB::table('now_station')->where('now_station.id',$builty->to)->first();
                                 @endphp
                                 @if($builty->cutomer_type == 'Walkin')
                                 <tr>
                                    <td>{{$builty->sendername}}</td>
                                    <td>{{$builty->date}}</td>
                                    <td>{{ (!empty($tostation) ? $tostation->name : '' )}}</td>
                                    <td>
                                       <a href="{{route('generate-bilty',['id'=>$builty->id])}}"> GENERATE BUILTY</a>
                                    </td>
                                 </tr>
                                 @else
                                 <tr>
                                    <td>{{$builty->name}}</td>
                                    <td>{{$builty->date}}</td>
                                    <td>{{(!empty($tostation) ? $tostation->name : '' )}}</td>
                                    <td>
                                       <a href="{{route('generate-bilty',['id'=>$builty->bid])}}"> GENERATE BUILTY</a>
                                    </td>
                                 </tr>
                                 @endif
                                 @endforeach
                                 @endif
                              </tbody>
                           </table>
                           <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                              <div class="dropdown-menu w-40">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--mt-8-->
                     <div class="col-span-12 sm:col-span-6 lg:col-span-6">
                        <div class="intro-y flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">Bills</h2>
                        </div>
                        <div class="intro-y box p-5">
                           <!--<div class="mt-8">-->
                           <!--</div>-->
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th>Bill No.</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(!empty($bill))
                                 @foreach($bill as $billData)
                                 <tr>
                                    <td>
                                       <?php
                                          foreach($sender as $customer){

                                          if($customer->id == $billData->bill_customer){

                                              $cust = explode(' ',$customer->name);

                                              $result ='';

                                              echo date('ym',strtotime($billData->bill_date));

                                              echo '/';

                                              foreach($cust as $name){

                                              $result .= substr($name,0,1);

                                              }

                                              $wrd = substr($result,0,2);

                                              $wrd = str_replace('(',"",$wrd);

                                              $wrd = str_replace('&',"",$wrd);

                                              echo $wrd;

                                          }

                                          }

                                          ?>{{$billData->bill_Number}}
                                    </td>
                                    <!-- 1 -->
                                    <td>
                                       <?php
                                          foreach($sender as $customer){

                                          if($customer->id == $billData->bill_customer){

                                              echo $customer->name;

                                          }

                                          }

                                          ?>
                                    </td>
                                    <!-- 2 -->
                                    <td>{{$billData->bill_date}}</td>
                                    <!-- 3 -->
                                    <td class="saif_td_______________">
                                       <a href="javascript:void(0)" onclick="view_update({{$billData->bill_id}})">
                                       <i data-feather="eye" style="width: 15px;"></i> View</a>
                                       <!-- ||| -->
                                       <?php if($deletion == 1){?>
                                       <a href="<?php echo url('removeBillRecord/'.$billData->bill_id); ?>" id="showBox<?php echo $serial; ?>">
                                          <!--<i class="fa fa-times"></i></a>-->
                                          <?php }else{ ?>
                                       <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                                          <!--<i class="fa fa-times"></i>-->
                                       </a>
                                       <?php } ?>
                                    </td>
                                    <!-- 5 -->
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
                                 @endforeach
                                 @endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <?php  if(auth()->user()->role_id!='2'){?>
                  <div class="intro-y grid grid-cols-12 gap-6 mt-5 tableForm_Page">
                     <!-- END: Sales Report -->
                     <!-- BEGIN: Weekly Top Seller -->
                     <div class="col-span-12 sm:col-span-8  lg:col-span-6">
                        <div class="intro-y flex items-center h-10">
                           <h2 class="text-lg font-medium truncate mr-5">Challan</h2>
                        </div>
                        <div class="intro-y box p-5">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th>Challan Date</th>
                                    <th>Challan From</th>
                                    <th>Challan To</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(empty($view_all))
                                 @foreach($view_all as $rows)
                                 <tr>
                                    <td>{{$rows->date}}</td>
                                    <?php
                                       $form_station = DB::table('now_station')

                                       ->where('id',$rows->from_station)

                                       ->first();



                                       $to_station = DB::table('now_station')

                                       ->where('id',$rows->to_station)

                                       ->first();



                                       ?>
                                    <td>{{$form_station->name}}</td>
                                    <td>{{$to_station->name}}</td>
                                    <td>
                                       <B><a href="{{route('challan-report',['id'=>$rows->id])}}" > Generate Challan</a> |  <a href="{{$rows->id}}" class="SaifBtn_______"> <i data-feather="trash"></i></a></B>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              @endif
                              @if(!empty($dater))
                              @foreach($dater as $rows)
                              <tr>
                                 <td>{{$rows->date}}</td>
                                 <?php
                                    $form_station = DB::table('now_station')

                                    ->where('id',$rows->from_station)

                                    ->first();



                                    $to_station = DB::table('now_station')

                                    ->where('id',$rows->to_station)

                                    ->first();



                                    ?>
                                 <td>{{$form_station->name}}</td>
                                 <td>{{$to_station->name}}</td>
                                 <td>
                                    <B><a href="challan-report/{{$rows->id}}" > Generate Challan</a> |  <a href="{{$rows->id}}" > <i data-feather="trash"></i></a></B>
                                 </td>
                              </tr>
                              @endforeach
                              </tbody>
                              @endif
                           </table>
                        </div>
                     </div>
                     <!-- END: Weekly Top Seller -->
                     <!-- BEGIN: Sales Report -->
                  </div>
                <?php }?>
                  <!-- END: Weekly Top Products -->
                  <?php  if(auth()->user()->role_id!='2'){?>
                  <!-- BEGIN: Weekly Top Products -->
                  <div class="col-span-12 mt-6">
                     <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Weekly Top Products</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                           <button class="btn box flex items-center text-slate-600 dark:text-slate-300">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text hidden sm:block w-4 h-4 mr-2">
                                 <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <line x1="10" y1="9" x2="8" y2="9"></line>
                              </svg>
                              Export to Excel
                           </button>
                           <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text hidden sm:block w-4 h-4 mr-2">
                                 <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <line x1="10" y1="9" x2="8" y2="9"></line>
                              </svg>
                              Export to PDF
                           </button>
                        </div>
                     </div>
                     <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                           <thead>
                              <tr>
                                 <th class="whitespace-nowrap">IMAGES</th>
                                 <th class="whitespace-nowrap">PRODUCT NAME</th>
                                 <th class="text-center whitespace-nowrap">STOCK</th>
                                 <th class="text-center whitespace-nowrap">STATUS</th>
                                 <th class="text-center whitespace-nowrap">ACTIONS</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="intro-x">
                                 <td class="w-40">
                                    <div class="flex">
                                       <div class="w-10 h-10 image-fit zoom-in">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-12.jpg" title="Uploaded at 2 March 2022">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-13.jpg" title="Uploaded at 16 July 2022">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-1.jpg" title="Uploaded at 9 July 2021">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <a href="" class="font-medium whitespace-nowrap">Nike Tanjun</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Sport &amp; Outdoor</div>
                                 </td>
                                 <td class="text-center">180</td>
                                 <td class="w-40">
                                    <div class="flex items-center justify-center text-success">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                          <polyline points="9 11 12 14 22 4"></polyline>
                                          <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                       </svg>
                                       Active
                                    </div>
                                 </td>
                                 <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                       <a class="flex items-center mr-3" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                             <polyline points="9 11 12 14 22 4"></polyline>
                                             <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                          </svg>
                                          Edit
                                       </a>
                                       <a class="flex items-center text-danger" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                          Delete
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="intro-x">
                                 <td class="w-40">
                                    <div class="flex">
                                       <div class="w-10 h-10 image-fit zoom-in">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-8.jpg" title="Uploaded at 22 July 2021">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-4.jpg" title="Uploaded at 16 January 2022">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-10.jpg" title="Uploaded at 26 September 2021">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                 </td>
                                 <td class="text-center">83</td>
                                 <td class="w-40">
                                    <div class="flex items-center justify-center text-success">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                          <polyline points="9 11 12 14 22 4"></polyline>
                                          <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                       </svg>
                                       Active
                                    </div>
                                 </td>
                                 <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                       <a class="flex items-center mr-3" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                             <polyline points="9 11 12 14 22 4"></polyline>
                                             <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                          </svg>
                                          Edit
                                       </a>
                                       <a class="flex items-center text-danger" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                          Delete
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="intro-x">
                                 <td class="w-40">
                                    <div class="flex">
                                       <div class="w-10 h-10 image-fit zoom-in">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-7.jpg" title="Uploaded at 22 October 2020">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-12.jpg" title="Uploaded at 4 May 2022">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-15.jpg" title="Uploaded at 12 May 2021">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <a href="" class="font-medium whitespace-nowrap">Dell XPS 13</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                 </td>
                                 <td class="text-center">50</td>
                                 <td class="w-40">
                                    <div class="flex items-center justify-center text-success">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                          <line x1="10" y1="11" x2="10" y2="17"></line>
                                          <line x1="14" y1="11" x2="14" y2="17"></line>
                                       </svg>
                                       Active
                                    </div>
                                 </td>
                                 <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                       <a class="flex items-center mr-3" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                             <polyline points="9 11 12 14 22 4"></polyline>
                                             <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                          </svg>
                                          Edit
                                       </a>
                                       <a class="flex items-center text-danger" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                          Delete
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="intro-x">
                                 <td class="w-40">
                                    <div class="flex">
                                       <div class="w-10 h-10 image-fit zoom-in">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-5.jpg" title="Uploaded at 28 April 2021">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-10.jpg" title="Uploaded at 24 October 2020">
                                       </div>
                                       <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                          <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="http://rubick.left4code.com/dist/images/preview-8.jpg" title="Uploaded at 11 August 2022">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                 </td>
                                 <td class="text-center">50</td>
                                 <td class="w-40">
                                    <div class="flex items-center justify-center text-success">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                          <polyline points="9 11 12 14 22 4"></polyline>
                                          <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                       </svg>
                                       Active
                                    </div>
                                 </td>
                                 <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                       <a class="flex items-center mr-3" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                             <polyline points="9 11 12 14 22 4"></polyline>
                                             <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                          </svg>
                                          Edit
                                       </a>
                                       <a class="flex items-center text-danger" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                          Delete
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                <?php }?>
                  <!-- END: Weekly Top Products -->
               </div>
            </div>
        <?php  if(auth()->user()->role_id!='2'){?>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
               <div class="col-span-12 lg:col-span-6">
                  <!-- BEGIN: Vertical Bar Chart -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Vertical Bar Chart</h2>
                     </div>
                     <div id="vertical-bar-chart" class="p-5">
                        <div class="preview">
                           <canvas id="vertical-bar-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-vertical-bar-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-vertical-bar-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;vertical-bar-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Vertical Bar Chart -->
                  <!-- BEGIN: Horizontal Bar Chart -->
                  <div class="intro-y box mt-5">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Horizontal Bar Chart</h2>
                        <!--<div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">-->
                        <!--    <label class="form-check-label ml-0" for="show-example-2">Show example code</label>-->
                        <!--    <input id="show-example-2" data-target="#horizontal-bar-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">-->
                        <!--</div>-->
                     </div>
                     <div id="horizontal-bar-chart" class="p-5">
                        <div class="preview">
                           <canvas id="horizontal-bar-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-horizontal-bar-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-horizontal-bar-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;horizontal-bar-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Horizontal Bar Chart -->
                  <!-- BEGIN: Donut Chart -->
                  <div class="intro-y box mt-5">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Donut Chart</h2>
                        <!--<div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">-->
                        <!--    <label class="form-check-label ml-0" for="show-example-3">Show example code</label>-->
                        <!--    <input id="show-example-3" data-target="#donut-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">-->
                        <!--</div>-->
                     </div>
                     <div id="donut-chart" class="p-5">
                        <div class="preview">
                           <canvas id="donut-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-donut-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-donut-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;donut-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Donut Chart -->
               </div>
               <div class="col-span-12 lg:col-span-6">
                  <!-- BEGIN: Stacked Bar Chart -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Stacked Bar Chart</h2>
                        <!--<div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">-->
                        <!--    <label class="form-check-label ml-0" for="show-example-4">Show example code</label>-->
                        <!--    <input id="show-example-4" data-target="#stacked-bar-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">-->
                        <!--</div>-->
                     </div>
                     <div id="stacked-bar-chart" class="p-5">
                        <div class="preview">
                           <canvas id="stacked-bar-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-stacked-bar-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-stacked-bar-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;stacked-bar-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Stacked Bar Chart -->
                  <!-- BEGIN: Line Chart -->
                  <div class="intro-y box mt-5">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Line Chart</h2>
                        <!--<div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">-->
                        <!--    <label class="form-check-label ml-0" for="show-example-5">Show example code</label>-->
                        <!--    <input id="show-example-5" data-target="#line-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">-->
                        <!--</div>-->
                     </div>
                     <div id="line-chart" class="p-5">
                        <div class="preview">
                           <canvas id="line-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-line-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-line-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;line-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Line Chart -->
                  <!-- BEGIN: Pie Chart -->
                  <div class="intro-y box mt-5">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Pie Chart</h2>
                        <!--<div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">-->
                        <!--    <label class="form-check-label ml-0" for="show-example-6">Show example code</label>-->
                        <!--    <input id="show-example-6" data-target="#pie-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">-->
                        <!--</div>-->
                     </div>
                     <div id="pie-chart" class="p-5">
                        <div class="preview">
                           <canvas id="pie-chart-widget" height="200"></canvas>
                        </div>
                        <div class="source-code hidden">
                           <button data-target="#copy-pie-chart" class="copy-code btn py-1 px-2 btn-outline-secondary">
                           <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                           </button>
                           <div class="overflow-y-auto mt-3 rounded-md">
                              <pre id="copy-pie-chart" class="source-preview">

                                <code class="html">



                                        HTMLOpenTagcanvas id=&quot;pie-chart-widget&quot; height=&quot;200&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag



                                </code>

                            </pre>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END: Pie Chart -->
               </div>
            </div>

            <?php } ?>
         </div>
      </div>
      <!-- END: Content -->
   </div>
   </table>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.js"></script>
<script>
   // chart new 1 start

   const ctx = document.getElementById('myChart');

   const myChart = new Chart(ctx, {

       type: 'bar',

       data: {

           labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],

           datasets: [{

               label: '# of Votes',

               data: [12, 19, 3, 5, 2, 3],

               backgroundColor: [

                   'rgba(255, 99, 132, 0.2)',

                   'rgba(54, 162, 235, 0.2)',

                   'rgba(255, 206, 86, 0.2)',

                   'rgba(75, 192, 192, 0.2)',

                   'rgba(153, 102, 255, 0.2)',

                   'rgba(255, 159, 64, 0.2)'

               ],

               borderColor: [

                   'rgba(255, 99, 132, 1)',

                   'rgba(54, 162, 235, 1)',

                   'rgba(255, 206, 86, 1)',

                   'rgba(75, 192, 192, 1)',

                   'rgba(153, 102, 255, 1)',

                   'rgba(255, 159, 64, 1)'

               ],

               borderWidth: 1

           }]

       },

       options: {

           scales: {

               y: {

                   beginAtZero: true

               }

           }

       }

   });

   // chart new 1 close

   // chart new 1 start

   var ctx_ = document.getElementById('myChart_').getContext('2d');

   var chart_ = new Chart(ctx_, {

   	// The type of chart we want to create

   	type: 'line', // also try bar or other graph types



   	// The data for our dataset

   	data: {

   		labels: ["Jun 2016", "Jul 2016", "Aug 2016", "Sep 2016", "Oct 2016", "Nov 2016", "Dec 2016", "Jan 2017", "Feb 2017", "Mar 2017", "Apr 2017", "May 2017"],

   		// Information about the dataset

       datasets: [{

   			label: "Rainfall",

   			backgroundColor: 'lightblue',

   			borderColor: 'royalblue',

   			data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],

   		}]

   	},



   	// Configuration options

   	options: {

       layout: {

         padding: 10,

       },

   		legend: {

   			position: 'bottom',

   		},

   		title: {

   			display: true,

   			text: 'Precipitation in Toronto'

   		},

   		scales: {

   			yAxes: [{

   				scaleLabel: {

   					display: true,

   					labelString: 'Precipitation in mm'

   				}

   			}],

   			xAxes: [{

   				scaleLabel: {

   					display: true,

   					labelString: 'Month of the Year'

   				}

   			}]

   		}

   	}

   });





</script>
<script>
   var botmanWidget = {

       aboutText: 'Start the conversation with Hi',

       introMessage: "WELCOME TO ALL ABOUT LARAVEL"

   };

</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script>
   var countries= document.getElementById("myChart__").getContext("2d");

   // draw pie chart

   new Chart(countries).Pie(pieData, pieOptions);

   // bar chart data

   var barData = {

       labels : ["January","February","March","April","May","June"],

       datasets : [

           {

               fillColor : "#48A497",

               strokeColor : "#48A4D1",

               data : [456,479,324,569,702,600]

           },

           {

               fillColor : "rgba(73,188,170,0.4)",

               strokeColor : "rgba(72,174,209,0.4)",

               data : [364,504,605,400,345,320]

           }

       ]

   }

   // get bar chart canvas

   var income = document.getElementById("income").getContext("2d");

   // draw bar chart

   new Chart(income).Bar(barData);

















   /*=========================================

   User Acquisition

   ===========================================*/

   var acquisition = document.getElementById('acquisition');



   var acChart = new Chart(acquisition, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],

   datasets: [

   {

   label: "Referral",

   backgroundColor: 'rgb(76, 132, 255)',

   borderColor: 'rgba(76, 132, 255,0)',

   data: [78, 88, 68, 74, 50, 55, 25],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(76, 132, 255,0)',

   pointHoverBackgroundColor: 'rgba(76, 132, 255,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "Direct",

   backgroundColor: 'rgb(254, 196, 0)',

   borderColor: 'rgba(254, 196, 0,0)',

   data: [88, 108, 78, 95, 65, 73, 42],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(254, 196, 0,0)',

   pointHoverBackgroundColor: 'rgba(254, 196, 0,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "Social",

   backgroundColor: 'rgb(41, 204, 151)',

   borderColor: 'rgba(41, 204, 151,0)',

   data: [103, 125, 95, 110, 79, 92, 58],

   lineTension: 0.3,

   pointBackgroundColor: 'rgba(41, 204, 151,0)',

   pointHoverBackgroundColor: 'rgba(41, 204, 151,1)',

   pointHoverRadius: 3,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },



   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {

    beginAtZero: true,

   },

   }]

   },

   tooltips: {

   }

   }

   });

   document.getElementById('customLegend').innerHTML = acChart.generateLegend();

   /*=========================================

   Analytic activity Chart

   ===========================================*/

   var activity = document.getElementById('activity');



   var chart = new Chart(activity, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],

   datasets: [

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(82, 136, 255)',

   data: [0, 65, 52, 115, 98, 165, 125],

   lineTension: 0,

   pointRadius: 4,

   pointBackgroundColor: 'rgba(255,255,255,1)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 8,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   },

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(255, 199, 15)',

   data: [45, 38, 100, 87, 152, 187, 85],

   lineTension: 0,

   borderDash: [10,5],

   pointRadius: 4,

   pointBackgroundColor: 'rgba(255,255,255,0)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 8,

   pointHitRadius: 30,

   pointBorderWidth: .3,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {



   },

   }]

   },

   tooltips: {

   }

   }

   });

   /*=========================================

   Line Chart

   ===========================================*/

   var ctx = document.getElementById('linechart');



   var chart = new Chart(ctx, {

   // The type of chart we want to create

   type: 'line',



   // The data for our dataset

   data: {

   labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],

   datasets: [

   {

   label: "",

   backgroundColor: 'transparent',

   borderColor: 'rgb(82, 136, 255)',

   data: [2000, 11000, 10000, 14000, 11000, 17000, 14500,18000,12000,23000,17000,23000],

   lineTension: 0.3,

   pointRadius: 5,

   pointBackgroundColor: 'rgba(255,255,255,1)',

   pointHoverBackgroundColor: 'rgba(255,255,255,0.6)',

   pointHoverRadius: 10,

   pointHitRadius: 30,

   pointBorderWidth: 2,

   pointStyle: 'rectRounded'

   }

   ]

   },



   // Configuration options go here

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   display:false

   }

   }],

   yAxes: [{

   gridLines: {

    display:true

   },

   ticks: {

   callback: function(value) {

     var ranges = [

       { divider: 1e6, suffix: 'M' },

       { divider: 1e3, suffix: 'k' }

     ];

     function formatNumber(n) {

       for (var i = 0; i < ranges.length; i++) {

         if (n >= ranges[i].divider) {

           return (n / ranges[i].divider).toString() + ranges[i].suffix;

         }

       }

       return n;

     }

     return '$' + formatNumber(value);

   }

   },

   }]

   },

   tooltips: {

   callbacks: {

   title: function(tooltipItem, data) {

   console.log(data);

   console.log(tooltipItem);

   return data['labels'][tooltipItem[0]['index']];

   },

   label: function(tooltipItem, data) {

   return  '$' + data['datasets'][0]['data'][tooltipItem['index']];

   },

   },

   backgroundColor: '#606060',

   titleFontSize: 14,

   titleFontColor: '#ffffff',

   bodyFontColor: '#ffffff',

   bodyFontSize: 18,

   displayColors: false

   }

   }

   });



   /*=========================================

   Bar Chart

   ===========================================*/

   var barX = document.getElementById("barChart").getContext('2d');



   var myChart = new Chart(barX, {

   type: 'bar',

   data: {

   labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],

   datasets: [{

   label: '',

   data: [5, 6, 4.5, 5.5, 3, 6,4.5,6,8,3,5.5,4],

   backgroundColor: '#4c84ff',

   }]

   },

   options: {

   legend: {

   display: false

   },

   scales: {

   xAxes: [{

   gridLines: {

   drawBorder: false,

   display:false

   },

   ticks: {

   display:false, // hide main x-axis line

   beginAtZero:true

   },

   barPercentage: 1.8,

   categoryPercentage: 0.2

   }],

   yAxes: [{

   gridLines: {

   drawBorder: false, // hide main y-axis line

   display:false

   },

   ticks: {

   display:false,

   beginAtZero:true

   },

   }]

   },

   tooltips: {

   enabled: false

   }

   }

   });



   /*=========================================

   Doughnut Chart

   ===========================================*/

   var doughnut = document.getElementById("doChart");

   var myDoughnutChart = new Chart(doughnut, {

   type: 'doughnut',

   data: {

   labels:["completed","unpaid", "pending", "canceled"],

   datasets: [{

   label: ["completed","unpaid", "pending", "canceled"],

   data: [4100,2500, 1800, 2300],

   backgroundColor: ['#4c84ff','#29cc97','#8061ef','#fec402'],

   // borderColor: ['#4c84ff','#29cc97','#8061ef','#fec402']

   hoverBorderColor: [ "#4c84ff","#29cc97","#8061ef","#fec402"]

   }]

   },

   options: {

   legend: {

   display: false

   },

   cutoutPercentage: 80,

   tooltips: {

   callbacks: {

   title: function(tooltipItem, data) {

   console.log(data);

   console.log(tooltipItem);

   return 'Order '+ data['labels'][tooltipItem[0]['index']];

   },

   label: function(tooltipItem, data) {

   return  data['datasets'][0]['data'][tooltipItem['index']];

   },



   afterLabel: function(tooltipItem, data) {

   // var dataset = data['datasets'][0];

   // var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)

   // return '(' + percent + '%)';

   }

   },

   backgroundColor: '#ffffff',

   titleFontSize: 14,

   titleFontColor: '#8a909d',

   bodyFontColor: '#1b223c',

   bodyFontSize: 18,

   displayColors: false

   }

   }

   });

</script>
@endsection
