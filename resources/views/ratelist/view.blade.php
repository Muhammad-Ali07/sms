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
                     Customer Rate List Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Customer Rate List
                           </h2>
                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                              </div> -->
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              <table id="exampless" class="table display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Customer Name</th>
                                     
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                @if(!empty($ratelists))
                                
                                 @foreach($ratelists as $ratelist)
					
								 <?php
									$other_charges = 0;
									$amount = 0;
									$other_charges = explode(',',$ratelist->other_amount);
								
									foreach($other_charges as $other_charge){
									    if(!empty($other_charge)){
									        $amount += $other_charge;    
									    }
										
									} 
								 ?>
									<tr>
										<td> @if(!empty($ratelist->name)){{ $ratelist->name }}@else{{'Normal Customer'}}@endif </td>
									
										<!--<td> {{ $ratelist->detentional_amount --}} </td>-->
										<td>  <a href="{{route('view-ratelist-detail',['id' => $ratelist->ratelist_id])}}"> Detail </a> |
										@if(!empty($ratelist->name))
                                        <a href="{{route('Edit-customer-profile-process',['id' => $ratelist->ratelist_id])}}"> Edit </a></td>
                                            @else
                                            <a href="{{route('view-edit-ratelist',['id' => $ratelist->ratelist_id])}}"> Edit </a></td>
                                            @endif
									</tr>
								 @endforeach
								 @endif
                                 
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <th>Customer Name</th>
                                       <th>Action</th>
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
            </div>
         </div>
           
        </div>
@endsection