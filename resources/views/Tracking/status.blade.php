@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   @include('includes.side-nav')

         <!-- BEGIN: Side Menu -->


         <!-- BEGIN: Content -->

         <div class="content">

            <!-- BEGIN: Top Bar -->

          @include('includes.top-bar')

            <!-- END: Top Bar -->

            <div class="grid">

               <div class="intro-y flex items-center mt-12">

                  <h2 class="text-lg font-medium mr-auto">

                     Status

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">
                         
                         
                         

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <h2 class="font-medium text-base mr-auto">

                              Add Status

                           </h2>

                        </div>
                        <form method="post"  @if(!empty($query)) action="{{Route('save.editstatus')}}"  @endif  @if(empty($query)) action="{{Route('save.status')}}"  @endif>
                           @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                              <div class="mt-2">





                                 <label for="regular-form-2"  class=" form-label">Status</label>
                                    <div class="error"></div>
                                  <input type="hidden"  value="@if(!empty($query)) {{$query->id}} @endif" name="id">
                                 <input id="regular-form-2"  @if(!empty($query)) value=" {{$query->status}}" @endif      name="status" type="text" class="txtOnly form-control" placeholder="Enter status" required>

                              </div>


                              <div class="mt-2">





                                <label for="regular-form-2"  class=" form-label">Description</label>
                                   <div class="error"></div>
                                 <input type="hidden"  value="@if(!empty($query)) {{$query->id}} @endif" name="id">
                                <input id="regular-form-2"  @if(!empty($query)) value=" {{$query->description}}" @endif      name="description" type="text" class="txtOnly form-control" placeholder="Enter Description" required>

                             </div>




                              <button class="btn btn-primary mt-5">Submit</button>


                           </form>
</div>
</div>

                       <div id="input" class="p-5">
                           <div class="preview" style="overflow:auto;">
                                <table id="example" class="display nowrap" style="width:100%">

                                 <thead>

                                    <tr>

                                       <th>Status</th>
                                       <th>Description</th>
                                       <th>Action</th>

                                    </tr>

                                 </thead>

                                 <tbody>

                                       <tr>
                                       @foreach($addstatus as $row)

                                       <td>{{$row->status}}</td>
                                       <td>{{$row->description}}</td>
                                       <td>
                                          <a href="{{route('edit.status',['id'=>$row->id])}}"> Edit | </a>
                                           <a href="{{route('delete.status',['id'=>$row->id])}}"> Delete </a>



                                       </td>

                                    </tr>
            @endforeach

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

         <!-- END: Content -->

      </div>

      <!-- BEGIN: Dark Mode Switcher-->

@endsection

