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

                     Roles

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">
                         
                         
                         

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <h2 class="font-medium text-base mr-auto">

                              View Roles

                           </h2>

                        </div>
                        
                         <div id="input" class="p-5">
                           <div class="preview" style="overflow:auto;">
                                <table id="example" class="display nowrap" style="width:100%">

                                 <thead>

                                    <tr>

                                       <th>Role</th>
                                       
                                       <th>Action</th>

                                    </tr>

                                 </thead>

                                <tbody>

                                    <tr>
                                        @if(!empty($roles))
                                            @foreach($roles as $row)

                                                <td>{{$row->roles}}</td>
                                              
                                                <td>
                                                    <a href="{{route('edit.status',['id'=>$row->id])}}"> Edit | </a>
                                                    <a href="{{route('delete.status',['id'=>$row->id])}}"> Delete </a>
                                                </td>
                                    </tr>
                                            @endforeach
                                        @endif
                                </tbody>
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

         <!-- END: Content -->

      </div>

      <!-- BEGIN: Dark Mode Switcher-->

@endsection

