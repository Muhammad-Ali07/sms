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
                    View Broker Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Broker
                           </h2>
                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                              </div> -->
                        </div>
                            @php
                                $user = auth()->user()->id;
                                $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
                            @endphp

                        <div id="input" class="p-5">
                           <div class="preview">
                            <!--<form method="GET" action="{{ route('broker.index') }}">-->
                                
                            <!--     <div class="grid grid-cols-12 gap-2">-->
                            <!--        <div class="mt-2 col-span-4">-->
                            <!--            <input type="text" name="broker_name" placeholder="Name" value="{{ request('broker_name') }}" class="form-control">-->
                            <!--        </div>-->
                            <!--        <div class="col-span-4 mt-2">-->
                            <!--            <input type="text" name="broker_phone" placeholder="Search Phone" value="{{ request('broker_phone') }}" class="form-control">-->
                            <!--        </div>-->
                            <!--        <div class="col-span-4 mt-2">-->
                            <!--            <input type="text" name="broker_city" placeholder="City" value="{{ request('broker_city') }}" class="form-control">-->
                            <!--        </div>-->
                            <!--    </div>-->

                                <!--<div class="flex flex-wrap gap-4 mb-4">-->
                                <!--    <input type="text" name="broker_name" placeholder="Name" value="{{ request('broker_name') }}" class="form-control">-->
                                <!--    <input type="text" name="broker_phone" placeholder="Search Phone" value="{{ request('broker_phone') }}" class="form-control">-->
                                <!--    <input type="text" name="broker_city" placeholder="City" value="{{ request('broker_city') }}" class="form-control">-->
                                <!--</div>-->
                            <!--    <button type="submit" class="btn btn-primary mt-2">Search</button>-->
                            <!--</form>-->
                            <br>
                            <table id="broker_table" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                        <th>Broker Name</th>
                                        <th>Broker Phone</th>
                                        <th>Broker City</th>
                                        <th>Vechile Type</th>
                                        <th>Broker Limit</th>
                                        <th>Fix Vehicle Selection</th>
                                        <th>Bank</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                <tbody>
                                    
                                    @foreach($brokerData as $customer)
                                    
                                    <tr>
                                        <td>{{isset($customer->broker_name) ? $customer->broker_name : ''}}</td>
                                        <td>
                                            @foreach ($customer->now_broker_phone as $item)
                                            {{$item->phone}} ,
                                            @endforeach
                                        </td>
                                        <td>{{$customer->broker_city}}</td>
                                        <td>{{$customer->vehicle_types}}</td>
                                        <td>{{$customer->broker_limit}}</td>
                                        <td>{{$customer->veh_selection}}</td>
                                        <td>
                                            @if(!empty($customer->now_bank))
                                                @foreach($customer->now_bank as $bank)
                                                    <strong>Title:</strong> {{$bank->title}}<br>
                                                    <strong>Bank Name:</strong> {{$bank->bank_name}}<br>
                                                    <strong>Broker Bank:</strong> {{$bank->broker_bank}}<br>
                                                    <hr>
                                                @endforeach
                                            @else
                                                No bank details available
                                            @endif
                                        </td>
                                        <td>
                                            @if($user_meta->setup == 1)
                                                @if($user_meta->edition == 1)
                                                    <a href="{{route('broker-edit',[$customer->broker_id])}}">Edit</a> |
                                                @endif
                                                @if($user_meta->deletion == 1)
                                                    <a class="deleteBroker" href="javascript:void(0)" data-url="delete-broker/{{$customer->broker_id}}" data-name="{{$customer->broker_name}}"> Delete </a> |
                                                @endif
                                            <a href="view-broker/{{$customer->broker_id}}"> View </a>
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
         </div>

        </div>

@endsection

@section('scripts')

<script>
    $('#broker_table').DataTable({

            "pageLength":25,

               dom: 'Bfrtip',

                buttons: [

            { extend: 'print', exportOptions:

                { columns: ':visible' }

            },

            // { extend: 'copy', exportOptions:

            //      { columns: [ 0, ':visible' ] }

            // },

            // { extend: 'excel', exportOptions:

            //      { columns: ':visible' }

            // },

            { extend: 'pdf'//, exportOptions:

                //   { columns: [ 0, 1, 2, 3, 4 ,5,6,7,8] }

            }

           ],

             });




         // Attach event listener to all delete links
        document.querySelectorAll('.deleteBroker').forEach(function(element) {
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