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

        

         <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Job Inquiries

                     </h2>

                  </div>

                  <!--<button class="btn btn-primary" onclick="print_multiple_invoice_redirect()" style="float: right;margin: 10px 10px;"> Print Selected </button>-->

                  <!--<button class="btn btn-primary" onclick="print_multiple_invoice_redirectWhatsApp()" style="float: right;margin: 10px 10px;"> Send to WhatsApp </button>-->

                   <!--<div id="example_filter" class="dataTables_filter Search_Input p-2"><label>Search:<input type="search" id="search" class="border m-1 p-2" placeholder="" aria-controls="example"></label></div>-->

                    <div id="input" class="p-5">

                       <div class="preview articles">

                           <div id="load" style="overflow: scroll;">
                            @php
                                $user = auth()->user()->id;
                                $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
                            @endphp

                                <table id="jobInquiryTable" class="table table-hover display nowrap dataTable" style="width:100%">
                                        <style>
                                            .custom-btn {
                                                background-color: #007bff !important;
                                                border-color: #007bff !important;
                                                color: white !important;
                                            }
                                            .btn-active {
                                                background-color: #007bff !important !important; /* Primary color */
                                                color: white !important !important;;
                                            }
                                            
                                            .btn-inactive {
                                                background-color: #ffc107 !important !important;; /* Warning color */
                                                color: black !important !important;;
                                            }
                                        </style>
                                      <thead>
                                    
                                         <tr>
                                    
                                            <th>SR#</th>
                                    
                                            <th>RFQ NO.</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Manager</th>
                                            <th>Selling Price</th>
                                    
                                            <th>Status</th>
                                    
                                            <th>Action</th>
                                    
                                         </tr>
                                    
                                      </thead>
                                    
                                      <tbody>
                                            @php
                                                $sr = 0;
                                            @endphp
                                            @foreach($ji as $ji)
                                                @php 
                                                    
                                                    $customer_name = '';
                                                    if($ji->customer_id != 0){
                                                        $customer = DB::table('customer')->where('id', '=', $ji->customer_id)->first();
                                                        $customer_name = $customer->name;
                                                    }else{
                                                        $customer_name = $ji->customer;
                                                    
                                                    }
                                                    $status = true;
                                                    $bilty = DB::table('now_builty')->where('job_inquiry_code','=',$ji->code)->first();
                                                    if($bilty){
                                                        $status = false;
                                                    }else{
                                                        $status = true;
                                                    }
                                                    $manager = DB::table('employees')->where('id','=',$ji->manager_id)->first();

                                                @endphp
                                                <tr>
                                                    <td>{{$sr}}</td>
                                                    <td>{{isset($ji->code) ? $ji->code : ''}}</td>
                                                    <td>{{isset($ji->date) ?  date('d-m-Y', strtotime($ji->date)) : ''}}</td>
                                                    <td>{{isset($customer_name) ? $customer_name : ''}}</td>
                                                    <td>{{isset($ji->from_station) ? $ji->from_station : ''}}</td>
                                                    <td>{{isset($ji->to_station) ? $ji->to_station : ''}}</td>
                                                    <td>{{isset($manager->fullName) ? $manager->fullName : ''}}</td>
                                                    <td>{{isset($ji->selling_rate) ? $ji->selling_rate : ''}}</td>
                                                    
                                                    <!--<td class="status-td" data-id="{{ $ji->id }}" @if($status == true) onclick="updateStatus(this)" @endif>-->
                                                    <!--    <button class="btn btn-sm btn-primary">{{isset($ji->status) ? $ji->status : ''}}</button>-->
                                                    <!--</td>-->
                                                    <td class="status-td" data-id="{{ $ji->id }}" @if($status == true) onclick="updateStatus(this)" @endif>
                                                        @if($user_meta->job_inquiry == 1)
                                                            @if($user_meta->edition == 1)
                                                                <button class="btn btn-sm  custom-btn
                                                                    @if($ji->status == 'immature') 
                                                                        btn-active 
                                                                    @else 
                                                                        btn-inactive 
                                                                    @endif">
                                                                    {{ isset($ji->status) ? ($ji->status) : '' }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($user_meta->job_inquiry == 1)
                                                            @if($user_meta->edition == 1)
                                                                <a title="edit" class="btn btn-secondary" href="{{route('edit-job-inquiry',['id'=>$ji->id])}}"><i class="fa fa-edit"></i> </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($user_meta->job_inquiry == 1)
                                                            @if($user_meta->deletion == 1)
                                                                <a title="View" class="btn btn-secondary" href="{{route('view-job-inquiry',['id'=>$ji->id])}}"><i class="fa fa-eye"></i> </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php $sr++; @endphp
                                            @endforeach
                                    
                                      </tbody>
                                
                                
                                </table>
                            
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

</div>

@endsection



@section('script')

<script type="text/javascript">

function updateStatus(element) {
    // Get the ID of the job inquiry
    var inquiryId = $(element).data('id');
    var currentStatus = $(element).text().trim(); // Get current status text

    // Prepare the data to send with the AJAX request
    var newStatus = currentStatus === 'mature' ? 'immature' : 'mature';

    $.ajax({
        url: '/update-status', // The route where you want to send the request
        type: 'POST',
        data: {
            id: inquiryId,
            status: newStatus,
            _token: '{{ csrf_token() }}' // Add CSRF token for security
        },
        success: function(response) {
            if (response.success) {
                // Update the status in the <td> on success
                // $(element).text(newStatus);
                $(element).html(`
                    <button class="btn btn-sm btn-primary" onclick="toggleStatus(${inquiryId}, this)">
                        ${newStatus}
                    </button>
                `);
                toastr.success('Status updated to ' + newStatus);
            } else {
                // alert('Failed to update status');
                // Display Toastr error message
                toastr.error('Failed to update status');
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
}



 $(document).on('change','#search', function(){

     

  var current_context = $(this).val();

  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });



  $.ajax({

    type:'GET',

    url:"{{ url('/view-bilty') }}",

    async: false,

    data: {'search':current_context},

    success: function(data){

      $('.articles').html(data);

    }

  });

});



    var print_multiple_invoice_arrays = [];

  function print_multiple_invoice_redirect(){

		var sList = "";

		$('.tester').each(function () {

			if (this.checked) {

			    id = $(this).val();

				print_multiple_invoice_arrays.push(id)

			}

		});

       window.open("print_multiple_invoice/"+JSON.stringify(print_multiple_invoice_arrays),'_self');

    }

    

    function print_multiple_invoice_redirectWhatsApp(){

		var sList = "";

		$('.tester').each(function () {

			if (this.checked) {

			    id = $(this).val();

				print_multiple_invoice_arrays.push(id)

			}

		});

		var encodeURL= encodeURI("https://www.nsk.com.pk/Software/print_multiple_invoice/"+encodeURIComponent(JSON.stringify(print_multiple_invoice_arrays)));

		var url = "https://wa.me/?text="+encodeURL;

       window.open(url,'_self');

    }

    
$('#jobInquiryTable').DataTable({

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
    

    

</script>@endsection