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

      @include('includes.top-bar')

      <!-- END: Top Bar -->

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

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        Challan Form

                     </h2>



                     <form method="post" action="{{route('filter-challan')}}">

                        @csrf

                        <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                           <div class="col-span-4">

                              <label for="regular-form-1" class="form-label">From Date </label>

                              <input type="date" placeholder="01" class="form-control" name="Fdate">

                           </div>

                           <div class="col-span-4">

                              <label for="regular-form-4" class="form-label">To Date</label>

                              <input id="regular-form-4" type="date" class="form-control" name="Todate">

                           </div>

                           <button class="btn btn-primary mt-5 ">Filter</button>



                     </form>

                  </div>



               </div>

               <div id="input" class="p-5">

                  <div class="preview table-responsive" style="width: 100%;overflow-y: scroll;">



                     <table id="example" class="table table-hover display nowrap dataTable" style="width:100%">

                        <thead>

                           <tr>

                              <th>Challan ID</th>

                              <th>Challan Date</th>

                              <th>Challan Driver</th>

                              <th>Loader Name</th>

                              <th>Dispatch Time</th>

                              <th>Container NO</th>

                              <th>Contener Seal</th>

                              <th>Truck No</th>

                              <th>Challan From</th>

                              <th>Challan To</th>

                              <th>Mobile No.</th>

                              <th>Broker</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tbody>

                           @if(empty($dater))

                                    @foreach($view_all as $rows)   

                                          <tr>

                                          <td>{{$rows->id}}</td>

                                          <td>{{$rows->date}}</td>

                                          <td>{{$rows->driver}}</td>

                                          <td>{{$rows->loadername}}</td>

                                          <td>{{$rows->dispatchtime}}</td>

                                          <td>{{$rows->containerno}}</td>

                                          <td>{{$rows->containerseal}}</td>

                                          <td>{{$rows->vehicle_id}}</td>

                                          <?php

                              $form_station = DB::table('now_station')

                                 ->where('id', $rows->from_station)

                                 ->first();



                              $to_station = DB::table('now_station')

                                 ->where('id', $rows->to_station)

                                 ->first();

                                             ?>

                                          <td>{{ $form_station ? $form_station->name : '' }}</td>

                                          <td>{{ $to_station ? $to_station->name : '' }}</td>

                                          <td>{{$rows->mobile_no}}</td>

                                          <td>{{$rows->broker}}</td>

                                          <td> <a class="btn btn-primary  btn-sm"
                                                href="{{route('edit-challan', ['id' => $rows->id])}}"> <i data-feather="edit"></i></a>
                                             | <a class="btn btn-primary  btn-sm"
                                                href="{{route('challan-report', ['id' => $rows->id])}}"> <i class='fa fa-eye'></i> </a>
                                             | <a class="btn btn-primary btn-sm"
                                                href="{{route('delete-challan-process', ['id' => $rows->id])}}"> <i
                                                data-feather="trash"></i> </a> </td>



                                          </tr>

                           @endforeach



                                    </tbody>

                  @endif







                        @if(!empty($dater))

                                    @foreach($dater as $rows)   

                                          <tr>

                                          <td>{{$rows->id}}</td>

                                          <td>{{$rows->date}}</td>

                                          <td>{{$rows->driver}}</td>

                                          <td>{{$rows->loadername}}</td>

                                          <td>{{$rows->dispatchtime}}</td>

                                          <td>{{$rows->containerno}}</td>

                                          <td>{{$rows->containerseal}}</td>

                                          <td>{{$rows->vehicle_id}}</td>

                                          <?php

                              $form_station = DB::table('now_station')

                                 ->where('id', $rows->from_station)

                                 ->first();



                              $to_station = DB::table('now_station')

                                 ->where('id', $rows->to_station)

                                 ->first();



                                             ?>

                                          <td>{{$form_station->name}}</td>

                                          <td>{{$to_station->name}}</td>

                                          <td>{{$rows->mobile_no}}</td>

                                          <td>{{$rows->broker}}</td>

                                          <td>

                                          <a href="challan-report/{{$rows->id}}"> <i class='fa fa-eye'></i> </a> | <a
                                             href="{{$rows->id}}"> <i data-feather="trash"></i></a>



                                          </td>









                                          </tr>

                           @endforeach



                                    </tbody>

                  @endif

                        <tfoot>

                           <tr>

                              <th>Challan ID</th>

                              <th>Challan Date</th>

                              <th>Challan Driver</th>

                              <th>Laoder Name</th>

                              <th>Dispatch Time</th>

                              <th>Container NO</th>

                              <th>Contener Seal</th>

                              <th>Truck No</th>

                              <th>Challan From</th>

                              <th>Challan To</th>

                              <th>Mobile No.</th>

                              <th>Broker</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                     </table>

                     <span style="float:right"> {{ $view_all->appends(request()->except('page'))->links() }} </span>

                  </div>

               </div>

            </div>

            <!-- END: Input -->

            <!-- BEGIN: Input Sizing -->

         </div>

      </div>

   </div>

</div>



</div>

@endsection