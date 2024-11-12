@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')

@php
    $user = auth()->user()->id;
    $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
@endphp
<div class="flex">
   @include('includes.side-nav')


         <div class="content">

           <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->

            <div class="grid">

               <div class="intro-y flex items-center mt-12">

                  <h2 class="text-lg font-medium mr-auto">

                  View Daily Expense Report

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                        <div class="intro-y box">

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

    
                            <form method="Post" action="{{route('get-expense-data')}}">
                                   @csrf
                                   <h2 class="font-medium text-base mr-auto">
        
                                        View Expense Reports
        
                                   </h2>
                                
                                <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                                 
                            
                                    <div class="col-span-4 positon-relative">
                                     <label for="txtBox" class="form-label">From Date</label>
                                        <input id="regular-form-2"  type="date" name="fromdate" class="form-control" placeholder="Enter Amount" >
                                    </div>
                                    <div class="col-span-4 positon-relative">
                                        <label for="txtBox" class="form-label">To Date</label>
                                        <input id="regular-form-2"  type="date" name="todate" class="form-control" placeholder="Enter Amount" >
                                    </div>
                                
                                 
                            </div>
                                <!-- <button  class="btn btn-danger mt-5">Filter</button> -->
                                <button href="generate-daily-expense"  class="btn btn-danger mt-5">Generate</button>
    
                            </form>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2>View Expense</h2>
                            
                        </div>
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <div id="input" class="p-5">
                                   <table id="expenseTable" class="display nowrap" style="width:100%">
        
                                        <thead>
        
           <tr>
                <th>S.No</th>
                  <th>Expense Name</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Action</th>
             
        
           </tr>
        
        </thead>
        
                                        <tbody>
                                    
                                        
                                            <?php $serial = 0; ?>
                                            
                                            @foreach($column as $row)
                                            <?php $serial += 1; ?>
                                               <tr>
                                               <td>{{$serial}}</td>
                                                  <td>{{$row->Expense_Name}}</td>
                                                    <td>{{$row->expense_category_name}}</td>
                                                  <td>{{$row->Expense_Date}}</td>
                                                  <td>{{$row->Expense_Amount}}</td>
                                            
                                                  <td>
                                                      @if($user_meta->daily_expense == 1)
                                                        @if($user_meta->edition == 1)
                                                             <a href="edit-daily-expense/{{$row->id}}" >Edit </a> |
                                                             <a href="generate-daily-expense/{{$row->id}}" > Generate </a>
                                                        @endif
                                                        @if($user_meta->deletion == 1)
                                                             <a href="delete-daily-expense/{{$row->id}}" > Delete </a>|
                                                        @endif
                                                      @endif
                                                  </td>
                                                  
                                               </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                    </div> 
                    </div>

 
                </div>

            </div>
                     

                     <!-- END: Input -->

                     <!-- BEGIN: Input Sizing -->

              

         <!-- END: Content -->

      </div>
@endsection
      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: JS Assets-->

     