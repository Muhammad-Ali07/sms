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

                              Add Daily Expense Category

                           </h2>

                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">

                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>

                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">

                              </div> -->

                        </div>

                        <form method="post" autocomplete="off" @if(!empty($query)) action="{{route('save-edit-expense-category')}}" @endif @if(empty($query)) action="{{route('save-expense-category')}}" @endif>
                         @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                              <div class="mt-2">

                              @if(!empty($query)) 
                              <input type="hidden" name="id" value="{{$query->id}}">
                                @endif 

                              </div>

<!-- 
                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                                  <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Date</label>
                     <input id="regular-form-2"  type="date"  @if(!empty($query))  value="{{$query->category_date}}"  @endif   name="categorydate" class="form-control" placeholder="Enter Amount" >
                                 </div> -->

                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Category</label>
                     <input id="regular-form-2"  type="text"  @if(!empty($query))  value="{{$query->expense_category}}"  @endif   name="expensecategory" class="form-control" placeholder="Enter category" >
                                 </div>

                        
                            
                        
                           

                              </div>  
                              </div>

                                @if($user_meta->daily_expenses == 1)
                                    @if(!empty($query))
                                        @if($user_meta->edition == 1)
                                          <button  class="btn btn-primary mt-5">Submit</button>
                                        @endif
                                    @else
                                        @if($user_meta->insertion == 1)
                                          <button  class="btn btn-primary mt-5">Submit</button>
                                        @endif
                                    @endif
                                @endif

                           </form>
                             <div id="input" class="p-5">

                           <div class="preview">
                         
                           <table id="example" class="display nowrap" style="width:100%">

<thead>

   <tr>
   <th>S.No</th>

      <th>Expense Category</th>
      
      <th>Action</th>
     

   </tr>

</thead>

<tbody>
<?php $serial = 0; ?>
@foreach($expcategory as $value)
<?php $serial += 1; ?>
   <tr>
   <td>{{$serial}}</td>
     
      <td>{{$value->expense_category}}</td>

      <td>
        @if($user_meta->daily_expenses == 1)
            @if($user_meta->edition == 1)
                <a href="edit-expense-category/{{$value->id}}">Edit</a> |
            @endif
            @if($user_meta->deletion == 1)
                <a href="delete-expense-category/{{$value->id}}">Delete</a>
            @endif
        @endif
      </td>
   </tr>
@endforeach
</table>

 </div>
 </div>

                           </div>

                        </div>

                     </div>
                          


      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: JS Assets-->
