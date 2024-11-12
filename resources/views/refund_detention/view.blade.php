@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

@php
    $refund_detentions = $data['refund_detentions'];
    $user = auth()->user()->id;
    $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
@endphp

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
                    View Refund/Detention Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Refunds/Detentions
                           </h2>
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                            <br>
                            <table id="refund_detention_table" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                        <th>CSM No.</th>
                                        <th>Refund Amount</th>
                                        <th>Deduction/Detention</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                <tbody>
                                    
                                    @foreach($refund_detentions as $rd)
                                    
                                    <tr>
                                        <td>{{isset($rd->cdo_no) ? $rd->cdo_no : ''}}</td>
                                        <td>{{isset($rd->refund_amount) ? $rd->refund_amount : ''}}</td>
                                        <td>{{isset($rd->deduction_detention) ? $rd->deduction_detention : ''}}</td>
                                        <td>
                                            @if($user_meta->container_deposit == 1)
                                                @if($user_meta->edition == 1)
                                                    <a href="{{route('refund-detention-edit',[$rd->id])}}">Edit</a> |
                                                @endif
                                                @if($user_meta->deletion == 1)
                                                    <a class="deleteRefundDetention" href="javascript:void(0)" data-url="delete-refund-detention/{{$rd->id}}" data-name="{{$rd->cdo_no}}"> Delete </a> |
                                                @endif
                                            @endif
                                            <!--<a href="view-refund-detention/{{$rd->id}}"> View </a>-->
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
    $('#refund_detention_table').DataTable({

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
        document.querySelectorAll('.deleteRefundDetention').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var name = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete Refund associated with this CSM:  " + name + "?", deleteUrl);
            });
        });
    

</script>
@endsection