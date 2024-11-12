@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   @include('includes.side-nav')

         <!-- BEGIN: Content -->

         <div class="content">

           <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->

            <div class="grid">

               <div class="intro-y flex items-center mt-12">

                  <h2 class="text-lg font-medium mr-auto">

                    Daily Expense
                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <h2 class="font-medium text-base mr-auto">

                              Add Daily Expense

                           </h2>

                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">

                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>

                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">

                              </div> -->

                        </div>

                        <form method="post" autocomplete="off" @if(!empty($query)) action="{{route('edit-daily-expense-process')}}" @endif @if(empty($query)) action="{{route('add-daily-expense-process')}}" @endif>
                         @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                              <div class="mt-2">

                              @if(!empty($query)) 
                              <input type="hidden" name="id" value="{{$query->id}}">
                                @endif 

                              </div>


                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">

                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">from Date</label>
    <input id="regular-form-2"  type="date" @if(!empty($query))  value="{{$query->Expense_Date}}"  @endif name="expensedate" class="form-control" placeholder="Enter Amount" >
                                 </div>



                                    <div class="col-span-4 positon-relative">
                                 
                              <label for="txtBox" class="form-label">Expense Category</label>
                                 <select id="regular-form-2" type="text" name="expcategory" class="form-control" placeholder="Enter Name">
                                    <option>select category</option>
                                    @foreach ($data as $value)
               <option @if(!empty($query)) @if($query->exp_category== $value->id) {{'selected'}} @endif @endif value="{{$value->id}}">{{$value->expense_category}}</option>
                                    @endforeach
                                   </select>
                              
                              </div>

                              <div class="col-span-4 positon-relative">
                                 
                              <label for="txtBox" class="form-label">Expense Name</label>
                                 <input id="regular-form-2" type="text" @if(!empty($query))  value="{{$query->Expense_Name}}"  @endif   name="expensename" class="form-control" placeholder="Enter Name" >
                              
                              
                              </div>
                        
                            
                        
                              <div class="col-span-4 positon-relative">
                              <label for="regular-form-2" class="form-label">Amount</label>
                              <input id="regular-form-2"  type="text" @if(!empty($query))  value="{{$query->Expense_Amount}}"  @endif name="expenseamount" class="form-control" placeholder="Enter Amount" >

                              </div>
                           

                              </div>  
                              </div>


                              <button  class="btn btn-primary mt-5">Submit</button>

                           </form>
                           </div>

                        </div>

                     </div>
                          


      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: JS Assets-->
