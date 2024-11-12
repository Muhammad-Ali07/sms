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

                              Assign Roles

                           </h2>

                        </div>
                        <form method="post"  @if(!empty($query)) action="{{Route('save.editRole')}}"  @else  action="{{Route('assign-role-process')}}"  @endif>
                           @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                            <div class="grid grid-cols-12 gap-2 mt-2">
                                <div class="col-span-6">
                                 <label for="regular-form-2"  class="form-label">Role</label>
                                
                                <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="role_id">
                                    <option value=''>Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}"> {{$role->roles}} </option>
                                    @endforeach
                                </select>

                              </div>
                              
                              
                              <div class="col-span-6">
                                 <label for="regular-form-2"  class="form-label">Customer</label>
                                
                                <select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example" name="customer_id">
                                    <option value=''>Select Role</option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}"> {{$customer->name}} </option>
                                    @endforeach
                                </select>

                              </div>
                              
                              
                              <div class="col-span-6">
                                 <label for="regular-form-2"  class="form-label">Email</label>
                                    <input type='email' class="form-control"  name="email">
                               
                              </div>
                              
                              
                              <div class="col-span-6">
                                 <label for="regular-form-2"  class="form-label">Password</label>
                                <input type='password' class="form-control"  name="password">
                              </div>
                              
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

