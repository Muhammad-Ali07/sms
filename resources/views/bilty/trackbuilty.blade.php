@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<style>
   .lcl_amount,.lcl_div,.fcl_div,.show_fields,.div_paid,.customer_type{
   display:none;
   }
</style>
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
               Track Builty
            </h2>
         </div>
         <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
               <!-- BEGIN: Input -->
               <div class="intro-y box">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                     <h2 class="font-medium text-base mr-auto">
                        Builty Tracking Form
                        <div class="intro-ul">
                           <!--<ul>-->
                           <!--   <li>Walkin Customer</li>-->
                           <!--</ul>-->
                        </div>
                        <!-- intro-ul close -->
                     </h2>
                  </div>
                  <div id="input" class="p-5">
                     <form method="get" action="tracking-builty-search">
                        <div class="grid">
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                           <div class="intro-y col-span-12 lg:col-span-12">
                              <!-- BEGIN: Input -->
                              <div class="intro-y box">
                                 <div id="input" class="p-5">
                                    <div class="grid grid-cols-12 gap-2 mt-2">
                                       <div class="col-span-6">
                                          <label for="regular-form-1" class="form-label">Select Company</label>
                                          <select id="regular-form-2"class="form-control" name="companyName">
                                             @foreach($company as $comrow)
                                             <option value="{{$comrow->id}}">{{$comrow->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <BR>
                                    </div>
                                    <div class="grid grid-cols-12 gap-2 addbuiltyNumber">
                                       <div class="col-span-4 hello">
                                          <label for="regular-form-1" class="form-label">Builty No.</label>
                                          <select  id="regular-form-2"  class="form-control" name="builtyid[]">
                                             <option></option>
                                             @foreach($builty as $brow)
                                             <option value="{{$brow->id}}">{{$brow->id}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-span-4">
                                          <div class="btn btn-primary mt-5 AddMoreBnumber">Add more</div>
                                       </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-2 mt-2">
                                       <div class="col-span-6">
                                          <label for="regular-form-1" class="form-label">Current Station</label>
                                          <select id="regular-form-2" name="stations" class="form-control">
                                             <option></option>
                                             @foreach($station as $rowsta ) 
                                             <option value="{{$rowsta->id}}" >{{$rowsta->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-2 mt-2">
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-5" value="Submit"></div>
                                   
                                       </form>

                                       

                                    <div id="example_wrapper" class="dataTables_wrapper">
                                    <table id="example" class="display nowrap dataTable" style="width: 100%; text-align: center;" role="grid" aria-describedby="example_info">
                                          <thead>
                                             <tr role="row">
                                              
                                                <th >Builty No.</th>
                                                <th >Company Name</th>
                                                <th >Current Station</th>
                                                <th>Date</th>
                                                <th >Time</th>
                                                <th >Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                     
                                             @foreach($array as $rowtracking)
                                             <tr>
                                                <td>{{$rowtracking->builtyNO}}</td>

                                                <?php
                                                $stationame = DB::table('now_station')
                                                ->where('id',$rowtracking->Station)->first();
                                               
                                            $selfcompany = DB::table('selfcompany')
                                                ->where('id',$rowtracking->companyName)->first();
                                 
                                               ?>
                                              <td>{{$selfcompany->name}}</td>
                                                <td>{{$stationame->name}}</td>
                                                <td>{{date('d-M-Y', strtotime($rowtracking->Adate))}}</td> 
                                                <td>{{$rowtracking->Timing}}</td>
                                                <td>
                                                   <a href="{{route('tracking-builty-panel',['id'=>$rowtracking->builtyNO])}}">Track</a> | 
                                                   <a href="{{route('edit-bilty-tracking',['id'=>$rowtracking->builtyNO])}}">Edit</a>
                                             </td>
                                              
                                             </tr>
                                             @endforeach
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                
                                                <th rowspan="1" colspan="1">Builty No.</th>
                                                <th rowspan="1" colspan="1">Builty Type</th>
                                                <th rowspan="1" colspan="1">Current Station</th>
                                                <th rowspan="1" colspan="1">Date</th>
                                                <th rowspan="1" colspan="1">Time</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                             </tr>
                                          </tfoot>
                                       </table>




                                       
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
         </div>
         </form>            
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script>
   $('.AddMoreBnumber').click(function(){
         $('.hello').append('<div class="grid grid-cols-12 gap-2 addbuiltyNumber"><div class="col-span-4"><label for="regular-form-1" class="form-label">Builty No.</label><select  id="regular-form-2"  class="form-control" name="builtyid[]"><option></option>@foreach($builty as $brow)<option value="{{$brow->id}}">{{$brow->id}}</option>@endforeach</select></div></div>')
      });
</script>
@endsection