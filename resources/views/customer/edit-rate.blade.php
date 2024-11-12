@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 @php
   $edition = 1;
   $deletion =1 ;
 @endphp
 <div class="flex">
       @include('includes.side-nav')
         <!-- BEGIN: Content -->
               <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('includes.top-bar')
           <!-- END : Top Bar -->

            <form method="post" action="{{route('save-edit-rate')}}"> 
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Rate Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                           Rate List History
                           </h2>
                          
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-2">
                                  <div class="col-span-4">
                                    <label for="regular-form-2" class="form-label">Customer Name</label>
                                    <select id="regular-form-2" required type="text" class="customerbilled form-control txtOnly" placeholder="Enter Name in English" name="customer">
                                                 <option>please select customer</option>
                                                 @foreach($customers as $customer)
                                                 <option value="{{$customer->id}}">{{$customer->name}}</option>   
                                                @endforeach
                                                </select> 
                                </div>
                                
                                
                                
                                 <div class="col-span-4">
                                    <label for="regular-form-2" class="form-label">From Date</label>
                                    <input id="regular-form-2"  type="date" value="@if(!empty($edit)) {{''}}    @endif"  class="form-control txtOnly" placeholder="Enter Name in English" name="datefrom">
                                 
                                </div>
                                 <div class="col-span-4">
                                    <label for="regular-form-2" class="form-label">To Date</label>
                                    <input id="regular-form-2"  type="date" value="@if(!empty($edit)) {{''}}    @endif"  class="form-control txtOnly" placeholder="Enter Name in English" name="dateto">
                                 </div>
                                 
                                 
                                 <div class="col-span-6">
                                    <label for="regular-form-2" class="form-label">Package</label>
                                    <select id="regular-form-2" required type="text" class="package_id form-control txtOnly" name="package">
                                                 <option>please package</option>
                                                 @foreach($packages as $package)
                                                 <option value="{{$package->id}}">{{$package->packagename}}</option>   
                                                @endforeach
                                                </select> 
                                </div>
                                
                                 <div class="col-span-6">
                                    <label for="regular-form-2" class="form-label">From Station</label>
                                    <select readonly id="regular-form-2"  type="text"   class="form-control txtOnly" placeholder="Enter Name in English" name="fromstation">
                                  <option>Karachi</option>
                                  </select>
                                
                                </div>
                                 
                                 <!-- <div class="grid grid-cols-12 gap-2"> -->
                                  <div class="col-span-6">
                                    <label for="regular-form-2" class="form-label">To Station</label>
                                    <select id="regular-form-2"  type="text" value="@if(!empty($edit)) {{''}}    @endif"  class="to form-control txtOnly" placeholder="Enter Name in English" name="tostation">
                                    <option>please select station</option>
                                @foreach($stations as $station)
                                    <option value="{{$station->id}}">{{$station->name}}</option>                
                                @endforeach
                                </select> 
                                </div>
                                 <div class="col-span-6">
                                    <label for="regular-form-2" class="form-label">Rate</label>
                                    <input id="regular-form-2"  type="text" value="@if(!empty($edit)) {{''}}    @endif"  class="form-control " placeholder="Enter Rate" name="rate">
                                 </div>
                            
                              </div> 
                   
                              
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
            <div class="btn btn-primary mt-5"> <button type="submit"> Submit </button> </div>
            <!--<div class="btn btn-primary mt-5" id="Reset">-->
            <!--    Reset-->
            <!--</div>-->
            </form>

   
        <div id="input" class="p-5">

                           <div class="preview">

                              <table id="example1111" class="display nowrap" style="width:100%">

                                 <thead>
                                    <tr>
                                        <th>S.No#</th>
                                       <th>Customer</th>
                                       <th>From Date</th>
                                       <th>To Date</th>
                                       <th>From Station</th>
                                       <th>To Station</th>
                                       <th>New Rate</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                  </thead>
                                  <tbody>
                                
                                @php $count =1; @endphp
                                @foreach($rates as $rate)
                                
                                @if($rate->selfcompany == session('company')[0]->id)
                                <?php
                                
                               
                                $tostation=DB::table('now_station')->where('id',$rate->to_station)->first();

                                ?>
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$rate->name}}</td>
                                    <td>{{$rate->from_date}}</td>
                                    <td>{{$rate->to_date}}</td>
                                    <td>{{$rate->from_station}}</td>
                                    <td>{{$tostation->name}}</td>
                                    <td>{{$rate->rate_id}}</td>
                                    <!--<td> <a href="{{route('delete-rete-history',['id' => 1])}}">Delete</a> </td>-->
                                </tr>
                                    @endif
                                @endforeach
                                 </tfoot>

                              </table>

                           </div>

                        </div>

@endsection
@section('script')
<script>
    $(".customerbilled").on("change", function(e){
            
             var customer_id = $(this).val();
             
              $.ajax({
                 url:"{{ url('get-customer-station') }}",
                 type:'GET',
                 data:{customer_id:customer_id},
                 success:function(data){
                
                    $('.to').html('');
                       $.each(data.station_to, function (i, item) {
                        $('.to').append($('<option>', { 
                            value: item.id,
                            text : item.name 
                           }));
                       });
                       
                        $('.package_id').html('');
                        
                        $('.package_id').append($('<option>', { 
                            value: '',
                            text : 'Select Package' 
                           }));
                           
                       $.each(data.packages, function (i, item) {
                        $('.package_id').append($('<option>', { 
                            value: item.package_id,
                            text : item.packagename 
                           }));
                       });
                       
                    }
        
                }); 
        });
</script>
@endsection

