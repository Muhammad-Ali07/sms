@extends('layouts.master')

@section('body')

main

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

      <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href=""> Home </a> <i data-feather="chevron-right"
            class="breadcrumb__icon"></i> <a href="{{url('/home')}}" class="breadcrumb--active">Challan</a> </div>



      @include('includes.top-bar')

      </br>

      <!-- END: Top Bar -->



      <form method="post" action="{{route('add-challan-process')}}">

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

                                 <h3 style="font-size:22px;margin:15px auto">Add Challan</h3>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-4">

                                          <label for="regular-form-1" class="form-label">Challan No</label>

                                          <input id="regular-form-1" type="text" placeholder="01" class="form-control"
                                             name="no" value="@if(!empty($chalanNo)){{$chalanNo->id}}@else 1 @endif">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="date" class="form-label">Date</label>

                                          <input type="date" class="form-control" id='date' name="date"
                                             value="{{date('Y-m-d')}}">

                                       </div>

                                       <div class="col-span-4">



                                          <label for="regular-form-4" class="form-label">Driver</label>

                                          <input id="regular-form-4" type="text" name="driver" class="form-control"
                                             placeholder="Enter Driver Name" />



                                       </div>

                                    </div>

                                 </div>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Loader Name</label>

                                          <input type="text" placeholder="Enter Loader Name" class="form-control"
                                             name="loadername">

                                       </div>

                                       <div class="col-span-6">

                                          <label for="regular-form-4" class="form-label">Dispatch Time</label>

                                          <input id="regular-form-4" type="time" class="form-control"
                                             name="dispatchtime" value="{{date('H:m')}}">

                                       </div>

                                    </div>

                                 </div>

                                 <div class="mt-2">

                                    <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                       <div class="col-span-4">

                                          <label for="regular-form-1" class="form-label">Container No</label>

                                          <input type="text" placeholder="Enter Container No" class="form-control"
                                             name="containerno">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="regular-form-4" class="form-label">Container Seal</label>

                                          <input id="regular-form-4" type="text" class="form-control"
                                             placeholder="Enter Container Seal" name="containerseal">

                                       </div>

                                       <div class="col-span-4">

                                          <label for="regular-form-4" class="form-label">Truck No</label>

                                          <input id="regular-form-4" required type="text" class="form-control"
                                             placeholder="Truck NO" name="vehicle_id">

                                       </div>

                                    </div>

                                 </div>

                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">From</label>

                                       <select id="regular-form-1" class="form-select sm:mr-2"
                                          aria-label="Default select example" name="from_station">

                                          <!--<option value="">Select Station From </option>-->

                                          <option value="10">{{'Karachi'}}</option>

                                          {{-- @foreach($stations as $station)



                              @endforeach --}}



                                       </select>

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">To</label>

                                       <select id="station" class="form-select sm:mr-2"
                                          aria-label="Default select example" name="to_station">

                                          <option value="">Select Station To </option>

                                          @foreach($stations as $station)

                                 <option value="{{ $station->id }}">{{ $station->name }}</option>

                              @endforeach

                                       </select>

                                    </div>

                                 </div>





                                 <div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Station Type :</label>

                                       {{-- <div class="col-md-8 col-sm-8 col-xs-12"> --}}

                                          <select class="form-select sm:mr-2" id="stationType" name="station_type">

                                             <option value="Domestic">Domestic</option>

                                             <option value="Export">Export</option>

                                          </select>

                                       </div>

                                       <div class="col-span-6" id="stationType-per">

                                          <label for="regular-form-1" class="form-label">Station %</label>

                                          <input type="text" name="station_per" class="form-control" />

                                       </div>

                                    </div>



                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Mobile No</label>

                                          <input type="text" name="mobile_no" class="form-control"
                                             placeholder="Enter Mobile No" />

                                       </div>

                                       <div class="col-span-6">

                                          <label for="regular-form-1" class="form-label">Malik/Broker</label>

                                          <input type="text" name="broker" class="form-control"
                                             placeholder="Enter Full Name" />

                                       </div>

                                    </div>

                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-12">

                                          <label class="form-label">Notes</label>

                                          <textarea name="notes" class="form-control" rows="4"
                                             placeholder="Enter special instructions if required*"></textarea>

                                       </div>

                                    </div>

                                    <!--<div class="grid grid-cols-12 gap-2 mt-2">

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Delivery Charges</label>

                                      <input  type="text" name="DeliveryCharges" class="form-control" />

                                    

                                    </div>

                                    <div class="col-span-6">

                                       <label for="regular-form-1" class="form-label">Vehicle Rent</label>

                                       <input  type="text" name="VehicleRent" class="form-control" />

                                    </div>

                                 </div>-->









                                    <!--<button class="btn btn-primary mt-5">Submit</button>-->

                                 </div>

                              </div>



                              <div class="step">

                                 <div class="preview">

                                    <h3 style="font-size:22px;margin:15px auto">Select Builty</h3>

                                    <div class="mt-2">

                                       <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">From Date</label>

                                             <input id="from_date" type="date" class="form-control">

                                             <input type="hidden" value="<?php //echo $id ?>" name="builtyid">

                                          </div>

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">To Date</label>

                                             <input id="to_date" type="date" class="form-control">

                                          </div>

                                          <div class="col-span-3">

                                             <label for="regular-form-4" class="form-label">Station</label>

                                             <select id="station" class="station_filter form-select sm:mr-2"
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

                                          <th>Sno</th>

                                          <th>TR No</th>

                                          <th>Status</th>

                                          <!--<th>Action</th>-->

                                       </tr>

                                       <tbody id="station_builty">



                                       </tbody>

                                    </table>

                                    <div class="btn btn-primary mt-5" id="prev1">Back</div>

                                 </div>

                              </div>

                              <div class="step">

                                 <div class="preview">

                                    <div class="grid grid-cols-12 gap-2 mt-2">

                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Total Frieght</label>

                                          <input type="text" name="Total Frieght" class="Total_Frieght form-control"
                                             readonly>



                                       </div>



                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Delivery Charges</label>

                                          <input type="text" name="DeliveryCharges" class="form-control">



                                       </div>



                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Vehicle Rent</label>

                                          <input type="text" name="VehicleRent" class="form-control">

                                       </div>



                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Other Detail</label>

                                          <input type="text" name="other_detail" class="form-control">

                                       </div>





                                       <div class="col-span-2">

                                          <label for="regular-form-1" class="form-label">Other Amount</label>

                                          <input type="text" name="other_amount" class="form-control">

                                       </div>



                                    </div>



                                    <!--<button class="btn btn-primary mt-5">Back</button> -->

                                    <div class="btn btn-primary mt-5" id="prev">Back</div>

                                    <input type="submit" value="Dispatch" name="Dispatch" class="btn btn-primary mt-5">

                                    <!--<input type="submit" name="submit" value="submit" class="btn btn-primary mt-5">-->

                                 </div>

                              </div>

                              <div class="next_total_challan btn btn-primary mt-5" id="next">Next</div>

                              <div class="btn btn-primary mt-5" id="prev1" style="visibility:hidden">Back</div>

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

      var date = $('#date').val();

      // alert(station);die;

      $.ajax({

         type: 'GET',

         url: '<?php echo url('/') ?>/station-builty',

         data: { to: to, date: date },

         success: function (res) {

            console.log('station on change', res)

            $('#station_builty').html(res);

         }

      });

   });



   $('#stationType-per').hide();

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



   /*   $('.next_total_challan').click(function(){
  
        
  
      });*/



</script>

@endsection