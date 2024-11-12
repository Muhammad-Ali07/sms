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
           
            <!-- END: Top Bar -->

            <form method="post" action="{{route('add-description-process')}}"> 
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Description
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Add a Description
                           </h2>
                          
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-2">
                                  <div class="col-span-12">
                                    <label for="regular-form-2" class="form-label"> Name</label>
                                    <input  required type="text" class="form-control" placeholder="Enter Description" name="name">
                                 </div>
                                </div>
                              
                           </div>
                        </div>
                         <div class="btn btn-primary mt-5"> <button type="submit"> Submit </button> </div>
            <div class="btn btn-primary mt-5" id="Reset">
                Reset
            </div>
             </form>
                        
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                     
                     
                     <div id="input" class="p-5">
                           <div class="preview">
                                                            <table id="examples" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                         <th>Name</th>
                                       <!--<th>Action</th>-->
                                    </tr>
                                 </thead>
                                 <tbody>

                                    @foreach($descriptions as $description)
                                    <tr>
                                        <td> {{$description->name}} </td>
                                    </tr>
                                    @endforeach
                                           
                                 </tbody>
                                 <tfoot>
                                   <tr>
                                       <th>Name</th>
                                       <!--<th>Action</th>-->
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                        
                  </div>
               </div>
            </div>
           
           
         </div>
        </div>
@endsection
