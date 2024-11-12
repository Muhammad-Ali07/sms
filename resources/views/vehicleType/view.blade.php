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
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Vehicle Type
                           </h2>

                        </div>
                            @php
                                $user = auth()->user()->id;
                                $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
                            @endphp

                        <div id="input" class="p-5">
                           <div class="preview">
                                  <table id="vehicleTypeTable" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Id</th>
                                       <th>Name</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                        @foreach($vehicleTypes as $item)

                                        <tr>
                                              <td>{{$item->id}}</td>
                                              <td>{{$item->name}}</td>
                                              <td>
                                                  @if($user_meta->setup == 1)
                                                        @if($user_meta->edition == 1)
                                                            <a href="{{route('vehicleType.edit',[$item->id])}}">Edit</a>
                                                        @endif
                                                        @if($user_meta->deletion == 1)
                                                            <a class="deleteVehicleType" href="javascript:void(0)" data-url="{{route('vehicleType.delete',[$item->id])}}" data-name="{{$item->name}}">Delete</a>
                                                            <!--<a href="{{route('vehicleType.delete',[$item->id])}}">Delete</a>-->
                                                        @endif
                                                  @endif
                                                </td>
                                           </td>
                                        </tr>
                                        @endforeach

                                 </tbody>
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

@section('scripts')

<script>
         // Attach event listener to all delete links
        document.querySelectorAll('.deleteVehicleType').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var name = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete " + name + "?", deleteUrl);
            });
        });

</script>
@endsection