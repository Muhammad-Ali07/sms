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

                          <form method="POST" name="paid_report" align="center" action="{{ url('paid_report') }}"  class="demo-form2"  data-parsley-validate class="bilty_form_validate">   

            <div class="mt-2 grid grid-cols-12 gap-2 positon-relative">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="col-span-3">

                    <label class="form-label">SELECT CUSTOMER </label>

                    <div class="controls">

                      <select class="form-control single_cal2" required="required" name="customer">

                        <?php if (Auth::user()->role_id != 2) {?> 

                        <option value="All">All Customers are Selected</option>

                        <?php }?>  

                         @foreach($customers as $customer)

                            <option value="{{$customer->id}}">{{$customer->name}}</option>

                        @endforeach

                      </select>

                    </div>

                    </div>

              

                  <div class="col-span-3">

                    <label class="form-label">FROM DATE </label>

                    <div class="controls">

                      <input type="date" name="from_date" id="datepicker1" class="form-control single_cal2"  required="required"  placeholder="From Date" aria-describedby="inputSuccess2Status2"/>

                    </div>

                  </div>

                  

                  <div class="col-span-3">

                    <label class="form-label">TO DATE </label>

                    <div class="controls">

                      <input type="date" name="to_date" id="datepicker2" class="form-control single_cal2"  required="required" placeholder="To Date" aria-describedby="inputSuccess2Status2"/>

                    </div>

                  </div>

                  

                    <div class="col-span-3">

                      <button type="submit" class="signbuttons btn btn-primary button_call" name="topaid_report" class="topaid_report" id="btn_submit" style="margin-top:23px;">Generate Report </button>

                    </div>

                    </div>

                </form>

                  </div>

                 

               </div>

               <!-- END: Input -->

               <!-- BEGIN: Input Sizing -->

            </div>

         </div>

      </div>

      

      <div class="grid">

        

         <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">

               <!-- BEGIN: Input -->

               <div class="intro-y box">

                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                     <h2 class="font-medium text-base mr-auto">

                        View Builty

                     </h2>

                  </div>

                  <button class="btn btn-primary" onclick="print_multiple_invoice_redirect()" style="float: right;margin: 10px 10px;"> Print Selected </button>

                  <button class="btn btn-primary" onclick="print_multiple_invoice_redirectWhatsApp()" style="float: right;margin: 10px 10px;"> Send to WhatsApp </button>

                   <div id="example_filter" class="dataTables_filter Search_Input p-2"><label>Search:<input type="search" id="search" class="border m-1 p-2" placeholder="" aria-controls="example"></label></div>

                    <div id="input" class="p-5">

                       <div class="preview articles">

                           @include('bilty.tableView')

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

    

    

    

</script>@endsection