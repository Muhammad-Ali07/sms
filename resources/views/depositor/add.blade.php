@extends('layouts.master')

@section('body')

main

@endsection

@section('main-content')

@include('includes.mobile-nav')

@if(session()->has('success'))

<?php

   $subbmitted = "logo.png"; 
     ?>

@else

<?php

   $subbmitted = 0; 

   ?>

@endif
@php
    $user = auth()->user()->id;
    $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
@endphp

<style>

   /**/

   /*.lcl_amount,.lcl_div,.fcl_div,.div_paid,.customer_type{*/

   /*display:none;*/

   /*}*/


   li.page-item {

   padding: 17px;

   font-size: 21px;

   }
.nav-item {
  margin-right: 10px; /* Adds gap between tabs */
}

.nav-link {
  transition: background-color 0.3s ease; /* Smooth transition effect */
}
.nav.nav-tabs .active{
    border-color:white !important;
}

#dynamic-inputs {
    display: flex;                /* Use flexbox for horizontal layout */
    flex-wrap: nowrap;           /* Prevent wrapping to the next line */
    overflow-x: auto;            /* Enable horizontal scrolling if necessary */
}

.input-container {
    margin-right: 16px;          /* Add some space between the input fields */
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

         <div class="grid grid-cols-12 gap-6 mt-5">


            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                    <div class="flex flex-col sm:flex-row items-center justify-between p-5 border-b border-gray-200 dark:border-dark-5">
                        <div class="row w-full">
                            <div class="col-lg-6">
                                <h2 class="font-medium text-base mr-auto">
                                    Depositor
                                    <div class="intro-ul"></div>
                                </h2>
                            </div>
                        </div>
                    </div>


                  <div id="input" class="p-5">

                     <div class="preview">

                        @if (count($errors) > 0)

                        <div>

                           <ul>

                              @foreach ($errors->all() as $error)

                              <li style='color:red'>{{ $error }}</li>

                              @endforeach

                           </ul>

                        </div>

                        @endif

                        <form id="myForm" method="post" action="{{route('save-depositor')}}" onkeydown="return event.key != 'Enter';">

                           @csrf
                            <div class="tab-content" id="myTabContent">
                                <!--main div tab starts here-->
                                <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                   <div class="classic open_classic">
        
        
                                      <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
        
                                         <div class="col-span-4">
        
                                            <label for="regular-form-22" class="form-label">Name</label>
        
                                            <input id="regular-form-22" type="text" class="form-control" name="name">
        
                                         </div>
                                         <div class="col-span-4">
        
                                            <label for="regular-form-22" class="form-label">City</label>
        
                                            <input id="regular-form-22" type="text" class="form-control" name="city">
        
                                         </div>
                                         <div class="col-span-4">
        
                                            <label for="regular-form-22" class="form-label">Phone</label>
        
                                            <input id="regular-form-22" type="text" class="form-control" name="phone">
        
                                         </div>
        
                                      </div>


                                   </div>
                                </div>
                            </div>

                        @if($user_meta->container_deposit == 1)
                            @if($user_meta->insertion == 1)
                                <input type="submit" value="Save" class="show_fields btn btn-primary mt-5">
                            @endif
                        @endif
        
                          <button class="show_fields btn btn-primary mt-5" id="Reset">Reset</button>
                     </div>

                  </div>





               </div>

               </form>

            </div>

         </div>
         
                <div class="intro-y box mt-5">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Depositors

                     </h2>

                  </div>

                    <div id="input" class="p-5">

                       <div class="preview articles">

                           <div id="load" style="overflow: scroll;">

                                <table id="depositorTable" class="table table-hover display nowrap dataTable" style="width:100%">
                            
                                      <thead>
                                    
                                         <tr>
                                    
                                            <th>SR#</th>
                                    
                                            <th>name</th>
                                    
                                            <th>City</th>
                                    
                                            <th>Phone</th>
                                    
                                            <th>Action</th>
                                    
                                         </tr>
                                    
                                      </thead>
                                    
                                      <tbody>
                                            @php
                                                $sr = 1;
                                                $depositors = DB::table('depositor')->get();
                                            @endphp
                                            @foreach($depositors as $d)
                                                <tr>
                                                    <td>{{$sr}}</td>
                                                    <td>{{isset($d->name) ? $d->name : ''}}</td>
                                                    <td>{{isset($d->city) ? $d->city : ''}}</td>
                                                    <td>{{isset($d->phone_no) ? $d->phone_no : ''}}</td>
                                                    <td>
                                                        <a title="edit" class="btn btn-secondary" href="{{route('edit-depositor',['id'=>$d->id])}}"><i class="fa fa-edit"></i> </a>
                                                        <a class="btn btn-secondary deleteDepositor href="javascript:void(0)" data-url="delete-depositor/{{$d->id}}" data-name="{{$d->name}}">Delete</a>

                                                    </td>
                                                </tr>
                                                @php $sr = $sr++; @endphp
                                            @endforeach
                                    
                                      </tbody>
                                
                                
                                </table>
                            
                            </div>


                       </div>

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


@endsection