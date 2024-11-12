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
    .stations_inner_div {
    padding-bottom: 20px;
    overflow: auto;
}

</style>
<div class="content">
   <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->

      <div class="grid">
         <div class="intro-y flex items-center mt-12">
            <h2 class="text-lg font-medium mr-auto">
             Add Normal Customer Rate List
            </h2>
         </div>
         <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
               <!-- BEGIN: Input -->
               <div class="intro-y box">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                     <h2 class="font-medium text-base mr-auto">
                       Add Rate List
                     </h2>
                  </div>
                  <div id="input" class="p-5">
                      <form action="{{route('add-simple-ratelist-process')}}" method="post">
                           @csrf
                     <div class="preview">
                        <div class="grid grid-cols-12 gap-2">

                        </div>
                        <div class="chart">
                           <div class="panel-body" style="padding:10px">


                              <div class="col-span-6">
                                 <label class="radio-switch-1">Customer </label> <br><br>
                                 <input id="radio-switch-41" class="form-check-input" type="checkbox" name="builty_type[0]" value="lcl">
                                 <label class="Advance" for="radio-switch-41">LCL</label>
                                 <input id="radio-switch-42" class="Normal form-check-input" type="checkbox" name="builty_type[1]" value="fcl">
                                 <label class="form-check-label" for="radio-switch-42">FCL</label>
                              </div>
                              <h3 class="lcl_div" style="font-size:22px;margin:15px auto">LCL</h3>
                             <div class="lcl_div" style="padding: 5px; border:1px solid #6c0606; border-radius: 5px">
                                 <div class="mt-2" style="margin-bottom:10px">
                                 <label for="regular-form-4" class="form-label">Stations</label>
                                 <div class="flex flex-col sm:flex-row mt-2 stations_inner_div">
                                    @foreach($stations as $key => $station)
                                     @php
                                      $stationName = preg_replace('/\s+/', '', $station->name);
                                    @endphp
                                    <div class="form-check mr-2">
                                       <input id="radio-switch-{{$key}}" class="lcl_stations form-check-input" type="CheckBox" name="lcl_stations[{{$station->name}}]" data-text="{{$stationName}}" value="{{$station->id}}">
                                       <label class="form-check-label" for="radio-switch-{{$key}}">{{$station->name}}</label>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                              <div class="grid grid-cols-12 gap-2 AddMorePackageslcl" id="customTable">
                           </div>
                           <div class="addmorepackagediv">  </div>
                           <div class="mt-2">
                              <div class="mt-2 positon-relative other">
                                 <div class="col-span-3">
                                    <label for="regular-form-1" class="form-label">Charges Details</label>
                                    <input type="text" name='lcl_other_charges[]' placeholder="Enter Charges Details" class="lcl_other_charges form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <label for="regular-form-1" class="form-label">Amount</label>
                                    <input type="text" name='lcl_amount[]' placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <input type="hidden" placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <button class="btn btn-primary mt-5 AddMoreother">Add More</button>
                                 </div>
                              </div>
                           </div>
                             </div>
                             <h3 class="fcl_div" style="font-size:22px;margin:15px auto">FCL</h3>
                             <div class="fcl_div" style="padding: 5px; border:1px solid #6c0606; border-radius: 5px">
                                 <div class="mt-2" style="margin-bottom:10px">
                                 <label for="regular-form-4" class="form-label">Stations</label>
                                 <div class="flex flex-col sm:flex-row mt-2 stations_inner_div">
                                    @foreach($stations as $key => $station)
                                     @php
                                      $stationName = preg_replace('/\s+/', '', $station->name);
                                    @endphp
                                    <div class="form-check mr-2">
                                       <input id="radio-switch-{{$key.$key}}" class="fcl_stations form-check-input" type="CheckBox" name="fcl_stations[{{$station->name}}]" data-text="{{$stationName}}" value="{{$station->id}}">
                                       <label class="form-check-label" for="radio-switch-{{$key.$key}}">{{$station->name}}</label>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>

                              <div class="grid grid-cols-12 gap-2 AddMorePackagesfcl" id="fclcustomTable">
                           </div>
                           <div class="mt-2">
                              <div class="grid grid-cols-12 gap-2 mt-2 positon-relative othercharges">
                                 <div class="col-span-3">
                                    <label for="regular-form-1" class="form-label">Charges Details</label>
                                    <input type="text" name='fcl_other_charges[]' placeholder="Enter Charges Details" class="other_charges form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <label for="regular-form-1" class="form-label">Amount</label>
                                    <input type="text" name='fcl_amount[]' placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <input type="hidden" placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="col-span-3">
                                    <button class="btn btn-primary mt-5 AddMoreother_charges">Add More</button>
                                 </div>
                              </div>
                           </div>
                             </div>
                           </div>

                           <button class="btn btn-primary mt-5" type='submit' >Submit</button>

                          <!-- <button class="btn btn-primary mt-5" type='button' id='btnGet'>Submit</button>-->
                        </div>
                     </div>
                     </form>
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
@section('script')
<script type="text/javascript">

    $('.lcl_stations').on('change', function(){
        var checked = $(this).is(':checked');
        var stations = [];
        $('.lcl_stations:checkbox:checked').each(function(index, val){
           stations.push($(this).attr('data-text'));
        });
        if(checked){
          $('#customTable').append('<div class="border_main_here '+$(this).attr('data-text')+'_new" data-text="'+$(this).attr('data-text')+'" id="butnew"><div class="lcl_'+$(this).attr('data-text')+'new_main_border_div"><div class="col-span-4"><label for="regular-form-1" class="form-label">Package</label><select id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package_'+$(this).val()+'[]"><option> Select Package </option> @foreach($packeges as $packege) <option value="{{$packege->id}}"> {{$packege->packagename}} </option> @endforeach </select></div><div class="col-span-2"><label for="regular-form-1" class="form-label">From</label><input type="text" placeholder="Enter Amount" class="form-control" value="Karachi" disabled><input type="hidden" name="from_'+$(this).val()+'[]" value="10"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">To</label> <input type="text" placeholder="Enter Amount" class="form-control" name="to_'+$(this).val()+'[]" value="'+$(this).attr('data-text')+'" disabled> <input type="hidden" name="to_'+$(this).val()+'[]" value="'+$(this).val()+'"> </div> <div class="col-span-2"><label for="regular-form-1" class="form-label">Rate</label><input type="text" name="rate_'+$(this).val()+'[]" placeholder="Enter Amount" class="form-control"></div></div><div class="lcl_'+$(this).attr('data-text')+' border_main_here_new"></div><div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here" data-text="lcl_'+$(this).attr('data-text')+'" id="butn" type="button">Add More</button></div></div>');
        }else{
         $('.'+$(this).attr('data-text')+'_new').remove();
        }
    });

      $(document).on('click', '.addmore_new_here', function(){
            var button = $('.'+$(this).attr('data-text')+'new_main_border_div').html();
            console.log(button);
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
              $('#fclcustomTable').append('<div class="fcl_border_main_here '+$(this).attr('data-text')+'_new_fcl" data-text="'+$(this).attr('data-text')+'" id="butnew"><div class="'+$(this).attr('data-text')+'new_main_border_div_fcl"><div class="col-span-4"><label for="regular-form-1" class="form-label">Package</label><select id="regular-form-1" class="fcl_packages form-select sm:mr-2" aria-label="Default select example" name="fcl_package'+$(this).val()+'[]"><option> Select Package </option> @foreach($fcl_packeges as $packege1) <option value="{{$packege1->id}}"> {{$packege1->packagename}} </option> @endforeach </select></div><div class="col-span-2"><label for="regular-form-1" class="form-label">From</label><input type="text" placeholder="Enter Amount" class="form-control" value="Karachi" disabled><input type="hidden" name="fcl_from_'+$(this).val()+'[]" value="10"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">To</label> <input type="text" placeholder="Enter Amount" class="form-control" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).attr('data-text')+'" disabled> <input type="hidden" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).val()+'"> </div> <div class="col-span-2"><label for="regular-form-1" class="form-label">Rate</label><input type="text" name="fcl_rate_'+$(this).val()+'[]" placeholder="Enter Amount" class="form-control"></div></div><div class="'+$(this).attr('data-text')+' border_main_here_new_fcl"></div><div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here_fcl" data-text="'+$(this).attr('data-text')+'" id="butn" type="button">Add More</button></div></div>');
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
