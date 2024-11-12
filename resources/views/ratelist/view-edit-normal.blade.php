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
        @include('includes.top-bar')
      <!-- END: Top Bar -->
<div class="grid">
   <div class="intro-y flex items-center mt-12">
      <h2 class="text-lg font-medium mr-auto">
         Normal Customer Rate Form
      </h2>
   </div>
   <div class="grid grid-cols-12 gap-6 mt-5">
      <div class="intro-y col-span-12 lg:col-span-12">
         <!-- BEGIN: Input -->
         <div class="intro-y box">
             <form method="post" action="{{ route('normal_ratelist_edit') }}">
            @csrf
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
               <h2 class="font-medium text-base mr-auto">
                  Normal Rate List
               </h2>
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
                           <select id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package_{{$item['to_id']}}[]">
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
                     <div class="col-span-3">
                        <!--<button type="button" class="btn_remove btn-danger mt-5">Remove</button>-->
                     </div>
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
                           <select id="regular-form-1" class="fcl_packages form-select sm:mr-2" aria-label="Default select example" name="fcl_package{{$item['to_id']}}[]">
                              <option> Select Package </option>
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
                           <input type="hidden" name="fcl_to_{{$item['to_id']}}[]" value="1">
                        </div>
                        <div class="col-span-2">
                           <label for="regular-form-1" class="form-label">Rate</label>
                           <input type="text" name="fcl_rate_{{$item['to_id']}}[]" placeholder="Enter Amount" class="form-control" value="{{$item['rate']}}">
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
                        <div class="col-span-3">
                           <!--<button type="button" class="btn_remove btn-danger mt-5">Remove</button>-->
                        </div>
                        <div class="col-span-3"></div>
                     </div>
                     @endforeach
                  </div>
                  @endif
               </div>
               @endif
            </div>
          
                  
         </div>
           <input type="hidden" name="updated_ratelist_id" value="{{$id}}" />
                           <button class="btn btn-primary mt-5" type='submit' id='btnGet'>Submit</button>
                  </form>
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
            
             $('#fclcustomTable').append('<div class="fcl_border_main_here '+$(this).attr('data-text')+'_new_fcl" data-text="'+$(this).attr('data-text')+'" id="butnew"><div class="'+$(this).attr('data-text')+'new_main_border_div_fcl"><div class="col-span-4"><label for="regular-form-1" class="form-label">Package</label><select id="regular-form-1" class="fcl_packages form-select sm:mr-2" aria-label="Default select example" name="fcl_package'+$(this).val()+'[]"><option> Select Package </option> @foreach($package1 as $pkg1) <option value="{{$pkg1->id}}"> {{$pkg1->packagename}} </option> @endforeach </select></div><div class="col-span-2"><label for="regular-form-1" class="form-label">From</label><input type="text" placeholder="Enter Amount" class="form-control" value="Karachi" disabled><input type="hidden" name="fcl_from_'+$(this).val()+'[]" value="10"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">To</label> <input type="text" placeholder="Enter Amount" class="form-control" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).attr('data-text')+'" disabled> <input type="hidden" name="fcl_to_'+$(this).val()+'[]" value="'+$(this).val()+'"> </div> <div class="col-span-2"><label for="regular-form-1" class="form-label">Rate</label><input type="text" name="fcl_rate_'+$(this).val()+'[]" placeholder="Enter Amount" class="form-control"></div></div><div class="'+$(this).attr('data-text')+' border_main_here_new_fcl"></div><div class="col-span-2"><button class="btn btn-primary mt-5 addmore_new_here_fcl" data-text="'+$(this).attr('data-text')+'" id="butn" type="button">Add More</button></div></div>');
         }else{
            $('.'+$(this).attr('data-text')+'_new_fcl').remove();
         } 
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