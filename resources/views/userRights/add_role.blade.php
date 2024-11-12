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

                     Role

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">
                         
                         
                         

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <h2 class="font-medium text-base mr-auto">

                              Add Roles

                           </h2>

                        </div>
                        <form method="post"  @if(!empty($query)) action="{{Route('save.editRole')}}"  @endif  @if(empty($query)) action="{{Route('save.roles')}}"  @endif>
                           @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                              <div class="mt-2">





                                 <label for="regular-form-2"  class=" form-label">Role</label>
                           
                                 <input id="regular-form-2"  name="roles" type="text" class="form-control" placeholder="Enter status" required>

                              </div>


                              <div class="mt-2">

                             </div>


                              <button class="btn btn-primary mt-5">Submit</button>


                           </form>
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

