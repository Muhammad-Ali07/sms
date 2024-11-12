@extends('layouts.master')

@section('body')

    main

@endsection

@section('main-content')

@php
    $initializations = $data['initializatoins'];
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



         <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Container Depositor Orders

                     </h2>

                  </div>

                    <div id="input" class="p-5">

                       <div class="preview articles">

                           <div id="load" style="overflow: scroll;">

                                <table id="initializationTable" class="table table-hover display nowrap dataTable" style="width:100%">

                                      <thead>

                                         <tr>

                                            <th>SR#</th>

                                            <th>CSM No.</th>

                                            <th>Bill No.</th>

                                            <th>Container No.</th>

                                            <th>Action</th>

                                         </tr>

                                      </thead>

                                      <tbody>
                                            @php
                                                $sr = 1;
                                            @endphp
                                            @foreach($initializations as $i)
                                                <tr>
                                                    <td>{{$sr}}</td>
                                                    <td>{{isset($i->csm_no) ? $i->csm_no : ''}}</td>
                                                    <td>{{isset($i->bl_no) ? $i->bl_no : ''}}</td>
                                                    <td>{{isset($i->container_no) ? $i->container_no : ''}}</td>
                                                    <td>
                                                        @if($user_meta->container_deposit == 1)
                                                            @if($user_meta->edition == 1)
                                                                <a title="edit" class="btn btn-secondary" href="{{route('edit-initialization',['id'=>$i->id])}}"><i class="fa fa-edit"></i> </a>
                                                            @endif
                                                            @if($user_meta->deletion == 1)
                                                                <a class="btn btn-secondary deleteInitialization href="javascript:void(0)" data-url="delete-depositor/{{$i->id}}" data-name="{{$i->csm_no}}">Delete</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php $sr = $sr++; @endphp
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

$('#initializationTable').DataTable({

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



     // Attach event listener to all delete links
        document.querySelectorAll('.deleteDepositor').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var depositorName = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete " + depositorName + "?", deleteUrl);
            });
        });



</script>@endsection