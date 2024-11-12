@extends('layouts.master')

@section('body')

main

@endsection

@section('main-content')

@include('includes.mobile-nav')

@if(session()->has('success'))

<?php

   $subbmitted = "logo.png"; 
     ?>

@else

<?php

   $subbmitted = 0; 

   ?>

@endif
@php
$initialization_no  = $data['initialization_no'];
$depositors = $data['depositors'];
$customers = $data['customers'];
$builties = $data['builties'];

@endphp
<style>

   /**/

   /*.lcl_amount,.lcl_div,.fcl_div,.div_paid,.customer_type{*/

   /*display:none;*/

   /*}*/


   li.page-item {

   padding: 17px;

   font-size: 21px;

   }
.nav-item {
  margin-right: 10px; /* Adds gap between tabs */
}

.nav-link {
  transition: background-color 0.3s ease; /* Smooth transition effect */
}
.nav.nav-tabs .active{
    border-color:white !important;
}

#dynamic-inputs {
    display: flex;                /* Use flexbox for horizontal layout */
    flex-wrap: nowrap;           /* Prevent wrapping to the next line */
    overflow-x: auto;            /* Enable horizontal scrolling if necessary */
}

.input-container {
    margin-right: 16px;          /* Add some space between the input fields */
}


</style>

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

                    <div class="flex flex-col sm:flex-row items-center justify-between p-5 border-b border-gray-200 dark:border-dark-5">
                        <div class="row w-full">
                            <div class="col-lg-6">
                                <h2 class="font-medium text-base mr-auto">
                                    Container Deliver Order
                                    <div class="intro-ul"></div>
                                </h2>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <p class="float-right"><b>{{$initialization_no}}</b></p>
                            </div>
                        </div>
                    </div>


                  <div id="input" class="p-5">

                     <div class="preview">

                        @if (count($errors) > 0)

                        <div>

                           <ul>

                              @foreach ($errors->all() as $error)

                              <li style='color:red'>{{ $error }}</li>

                              @endforeach

                           </ul>

                        </div>

                        @endif

                        <form id="myForm" method="post" action="{{route('save-initialization')}}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">

                           @csrf
                            <input type="hidden" name="initialization_no" value="{{$initialization_no}}">
                            <div class="tab-content" id="myTabContent">
                                <!--main div tab starts here-->
                                <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                   <div class="classic open_classic">
        
                                      <div class="grid grid-cols-12 gap-2 mt-2 mb-2">
        
                                         <div id="walkin_customer_div" class="walkin_customer_div col-span-4">
        
                                            <label for="regular-form-22" class="form-label">CDO No#</label>
        
                                            <input id="regular-form-22" type="text" readonly class="form-control" value="{{$initialization_no}}" name="initialization_code">
        
                                         </div>
                                         <div class="col-span-4">
                                               <label for="regular-form-2" class="form-label">DO Date</label>
                                               <input type="date" class="form-control" id="do_date" name="date" value="{{date('Y-m-d')}}" >
                                        </div>
                                         
                                        <div class="col-span-4">
                                            <label for="regular-form-5" class="form-label">Job No.</label>

                                            <select id="job_no" class="form-select sm:mr-2"
                                                aria-label="Default select example" name="job_no">
                                                @foreach($builties as $b)
                                                    <option value="{{$b->computerno}}">{{$b->computerno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-span-4">
                                               <label for="regular-form-4" class="form-label">Consignee Name</label>
                                               <input  id="consignee_name" readonly type="text" class="form-control" placeholder="Consignee name" name="consignee_no">
                                          </div>
                                          <div class="col-span-4">
        
                                               <label for="regular-form-4" class="form-label">Bl No.</label>
        
                                               <input  id="bl_no" type="text" readonly class="form-control" placeholder="BL#" name="bl_no">
        
                                          </div>
                                          <div class="col-span-4">
                                               <label for="regular-form-4" class="form-label">Shipping Company Name</label>
                                               <input  id="shipping_company_name" type="text" class="form-control" placeholder="Shipping company name" name="shipping_company_name">
                                          </div>

                                            
                                      </div>
                                        <!--first row-->
                                        
                                        <style>
                                            .btn-custom-remove {
                                                font-size: 10px;
                                                padding: 2px 6px;
                                                height: 20px;
                                                line-height: 1;
                                                margin-top: -129px;
                                                position: relative;
                                                left: 190px;
                                                                                        
                                            }
                                        </style>
                                        <div class="show_fields mt-2 col-span-12">
                                            <label class="form-label d-inline-block">Container</label>
                                            <button type="button" class="btn btn-primary btn-sm float-right" id="add_more_container">Add More</button>
                                            <br><br>
                                            <div id="expense_fields_wrapper">
                                                
                                            </div>
                                        </div>
                                        <script>
                                            // Remove field functionality
                                                $(document).on('click', '.remove_field', function() {
                                                    var fieldId = $(this).data('id');
                                                    $('#expense_field_' + fieldId).remove(); // Remove the entire field set
                                                });
                                                                                    
                                                                                        // Show/Hide image upload field based on EIR Status selection
                                                $(document).on('change', '.eir_status', function() {
                                                    var selectedValue = $(this).val();
                                                    var imageDivId = 'imageDiv_' + $(this).closest('.expense_fields').attr('id').split('_')[2]; // Get the corresponding imageDiv ID
                                                    if (selectedValue === 'received') {
                                                        $('#' + imageDivId).show();
                                                    } else {
                                                        $('#' + imageDivId).hide();
                                                    }
                                                });
                                                let fieldCount = 1; // Initialize fieldCount

                                                // Add more fields
                                                $('#add_more_container').click(function() {
                                                    fieldCount++;
                                                    var newField = `
                                                        <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${fieldCount}">
                                                            <div class="col-span-3">
                                                                <label for="container_no_${fieldCount}" class="form-label">Container No.</label>
                                                                <input id="container_no_${fieldCount}" type="text" class="form-control" placeholder="Container No." name="container_no[]">
                                                            </div>
                                                            <div class="col-span-3">
                                                                <label for="placement_date_${fieldCount}" class="form-label">Placement Date</label>
                                                                <input id="placement_date_${fieldCount}" type="date" class="form-control" value="{{date('Y-m-d')}}" placeholder="Placement Date" name="placement_date[]">
                                                            </div>
                                                            <div class="col-span-3">
                                                                <label for="eir_date_${fieldCount}" class="form-label">EIR Date</label>
                                                                <input id="eir_date_${fieldCount}" type="date" class="form-control" value="{{date('Y-m-d')}}" placeholder="Eir Date" name="eir_date[]">
                                                            </div>
                                                            <div class="col-span-3 d-flex align-items-center">
                                                                <label for="eir_status_${fieldCount}" class="form-label">EIR Status</label>
                                                                <select id="eir_status_${fieldCount}" class="eir_status form-select sm:mr-2" aria-label="Default select example" name="eir_status[]">
                                                                    <option>--Select--</option>
                                                                    <option value="not-received">Not Received</option>
                                                                    <option value="received">Received</option>
                                                                    <option value="submitted">Submitted</option>
                                                                </select>
                                                                <button type="button" class="btn btn-danger btn-custom-remove ml-2 remove_field" data-id="${fieldCount}">Remove</button>
                                                            </div>
                                                            <div id="imageDiv_${fieldCount}" class="col-span-3" style="display: none;">
                                                                <div class="flex flex-row mt-2 items-center">
                                                                    <div class="flex flex-col mr-4" style="width:60%; margin-right:0px;">
                                                                        <label for="eir_document_${fieldCount}" class="mb-2">Upload Document</label>
                                                                        <input type="file" id="eir_document_${fieldCount}" name="eir_document[]" class="form-input">
                                                                    </div>
                                                                    <img id="imagePreview_${fieldCount}" src="" alt="Image Preview" class="mr-4" style="display: none; max-width: 200px; max-height: 200px; float: right; margin-left:10px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-span-3">
                                                                <label for="receiving_date_${fieldCount}" class="form-label">Receiving Date</label>
                                                                <input id="receiving_date_${fieldCount}" type="date" class="form-control" value="{{date('Y-m-d')}}" placeholder="Receiving Date" name="receiving_date[]">
                                                            </div>
                                                        </div>
                                                    `;
                                                    $('#expense_fields_wrapper').append(newField);
                                                });
                                        </script>
                                        
                                        <!--station from to -->
                                        <!--div bl, lc , container no.-->
                                      <div class="show_fields">
                                            <div class="grid grid-cols-12 gap-2 mt-2" id="bl_lc_container_div">
                                                <div class="col-span-4">
        
                                                   <label for="regular-form-2" class="form-label">Expiry Date</label>
            
                                                   <input  id="regular-form-2" type="date" class="form-control" id="date" name="expiry_date" value="{{date('Y-m-d')}}">
            
                                                </div>
                                                <!--<div class="col-span-4 mt-2">-->
                                                <!--    <label for="regular-form-5" class="form-label">EIR Status</label>-->
    
                                                <!--    <select id="regular-form-1" class="eir_status form-select sm:mr-2"-->
                                                <!--        aria-label="Default select example" name="eir_status">-->
                                                <!--        <option>--Select--</option>-->
                                                <!--        <option value="not-received"> Not Received</option>-->
                                                <!--        <option value="received"> Received</option>-->
                                                <!--        <option value="submitted"> Submitted</option>-->
                                                <!--    </select>-->
                                                <!--</div>-->
                                                <!-- This div will hold the document upload field -->
                                                <!--<div id="uploadFieldContainer" class="col-span-4 mt-4"></div>-->
                                            </div>
                                      </div>
                                      
                                      <div class="show_fields mt-2">
                                         <div class="grid grid-cols-12 gap-2 mt-2">
        
                                            <div class="col-span-4">
                                                <label for="regular-form-1" class="form-label">Deposit By</label>
                                                <select id="payment_by" class="form-select" aria-label="Default select example" name="deposit_by">
                                                        <option value="">--select--</option>
                                                        <option value="client">Client</option>
                                                        <option value="depositor">Depositor</option>
                                                </select>                                                    
        
                                            </div>
                                            <!-- Customer Dropdown (hidden initially) -->
                                            <div id="customerDropdownContainer" class="col-span-4" style="display: none;">
                                                <label for="customer_id" class="form-label">Select Customer</label>
                                                <select id="customer_id" name="customer_id" class="form-select">
                                                    <option value="">Select Customer</option>
                                                    <!-- Assuming you're looping through customers fetched from the DB -->
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <!-- Depositor Dropdown (hidden initially) -->
                                            <div id="depositorDropdownContainer" class="col-span-4" style="display: none;">
                                                <label for="depositor_id" class="form-label">Select Depositor</label>
                                                <select id="depositor_id" name="depositor_id" class="form-select">
                                                    <option value="">Select Depositor</option>
                                                    <!-- Assuming you're looping through depositors fetched from the DB -->
                                                    @foreach($depositors as $depositor)
                                                        <option value="{{ $depositor->id }}">{{ $depositor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-span-4">
        
                                                   <label for="regular-form-2" class="form-label">Payment Date</label>
            
                                                   <input type="date" class="form-control" readonly id="payment_date" name="payment_date">
            
                                            </div>
                                            <div class="col-span-4">
                                                <label for="regular-form-4" class="form-label">Deposit Amount</label>
                                                <input id="deposit_amount" type="text" class="form-control" placeholder="Deposit Amount" name="deposit_amount">
                                            </div>
                                            <div class="col-span-4">
                                                <label for="regular-form-4" class="form-label">Service Charges</label>
                                                <input id="supplier_charges" type="text" class="form-control" placeholder="Supplier Charges" name="supplier_charges">
                                            </div>
                                            <div class="col-span-4">
                                                <label for="regular-form-4" class="form-label">Total</label>
                                                <input id="total" type="text" class="form-control" readonly name="total">
                                            </div>

                                         </div>
                                            <script>
                                                $(document).ready(function() {
                                                    function calculateTotal() {
                                                        // Get the values from the input fields
                                                        var depositAmount = parseFloat($('#deposit_amount').val()) || 0; // If empty, treat as 0
                                                        var supplierCharges = parseFloat($('#supplier_charges').val()) || 0; // If empty, treat as 0
                                                
                                                        // Calculate the total
                                                        var total = depositAmount + supplierCharges;
                                                
                                                        // Set the total value in the #total field
                                                        $('#total').val(total.toFixed(2)); // Display with 2 decimal places
                                                    }
                                                
                                                    // Trigger calculation when input changes
                                                    $('#deposit_amount, #supplier_charges').on('input', calculateTotal);                                                    

                                                    // When the payment_by select changes
                                                    $('#payment_by').on('change', function() {
                                                        var selectedValue = $(this).val();  // Get selected value
                                                        console.log(selectedValue);
                                                        if (selectedValue === 'client') {
                                                            $('#customerDropdownContainer').show();   // Show customer dropdown
                                                            $('#depositorDropdownContainer').hide();  // Hide depositor dropdown
                                                        } else if (selectedValue === 'depositor') {
                                                            $('#depositorDropdownContainer').show();  // Show depositor dropdown
                                                            $('#customerDropdownContainer').hide();   // Hide customer dropdown
                                                        } else {
                                                            // Hide both if no valid option is selected
                                                            $('#customerDropdownContainer').hide();
                                                            $('#depositorDropdownContainer').hide();
                                                        }
                                                    });
                                                });
                                            </script>

                                      </div>

                                   </div>
                                </div>
                            </div>

                     </div>

                  </div>




                  <input type="button" value="Save" class="show_fields addBilty btn btn-primary mt-5">

                  <button class="show_fields btn btn-primary mt-5" id="Reset">Reset</button>

               </div>

               </form>

            </div>

         </div>

         <!--grid table-->

         </div>

      </div>

   </div>

</div>

</div>

</div>

@endsection

@section('script')
 <script>
  // When the DO date input changes
        $('#do_date').on('input', function() {
            // Get the value of the DO date
            const doDate = $(this).val();
            // Set the value to the payment date
            $('#payment_date').val(doDate);
        });
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Select radio buttons
        //     const yesRadio = document.getElementById('bl_yes');
        //     const noRadio = document.getElementById('bl_no');
        //     const uploadFieldContainer = document.getElementById('uploadFieldContainer');
    
        //     // Function to add the document upload field
        //     function appendUploadField() {
        //         // Clear any previous content in uploadFieldContainer
        //         uploadFieldContainer.innerHTML = '';
    
        //         // Create new div with upload input
        //         const uploadDiv = document.createElement('div');
        //         uploadDiv.classList.add('flex', 'flex-col', 'space-y-2'); // Add flex-col to stack label and input
    
        //         uploadDiv.innerHTML = `
        //             <label for="eir_document" class="mb-2">Upload Document</label>
        //             <input type="file" id="eir_document" name="eir_document" class="form-input">
        //         `;
    
        //         uploadFieldContainer.appendChild(uploadDiv);
        //     }
    
        //     // Listen for changes in the Yes/No radio buttons
        //     yesRadio.addEventListener('change', function () {
        //         if (this.checked) {
        //             appendUploadField();  // Append the upload field when Yes is selected
        //         }
        //     });
    
        //     noRadio.addEventListener('change', function () {
        //         if (this.checked) {
        //             uploadFieldContainer.innerHTML = '';  // Remove the upload field when No is selected
        //         }
        //     });
        // });
        function appendUploadField() {
                // Clear any previous content in uploadFieldContainer
                $('#uploadFieldContainer').empty();
        
                // Create new div with upload input
                const uploadDiv = `
                    <div class="flex flex-col space-y-2"> 
                        <label for="eir_document" class="mb-2">Upload Document</label>
                        <input type="file" id="eir_document" name="eir_document" class="form-input">
                    </div>
                `;
        
                $('#uploadFieldContainer').append(uploadDiv).show(); // Append the field and show the container
            }

    // Listen for changes in the dropdown
    $('.eir_status').change(function () {
        // Check if the selected value is 'received'
        if ($(this).val() === 'received') {
            appendUploadField();  // Append the upload field when 'Received' is selected
        } else {
            $('#uploadFieldContainer').empty().hide(); // Clear and hide the container for other options
        }
    });
    
    
    $('#job_no').change(function() {
        var jobNo = $(this).val(); // Get the selected job number

        // Make an AJAX call to get the corresponding BL No
        $.ajax({
            url: '/get-bl-no', // Your route to fetch the BL No
            type: 'GET',
            data: { job_no: jobNo }, // Send the job number to the server
            success: function(response) {
                toastr.success('BL No retrieved successfully!'); // Show success message
                // Assuming response contains the bl_no
                console.log(response.data);
                $('#bl_no').val(response.bl_no); // Set the BL No in the input field
                $('#consignee_name').val(response.customer.name); // Set the BL No in the input field

            },
            error: function(xhr) {
                toastr.error('Error retrieving BL No. Please try again.'); // Show error message
                console.error(xhr.responseText); // Handle error
            }
        });
    });    
    
    
    
    
    
</script>



<script>
       $('#bilty_table').DataTable({

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



    let counter = 2;

    // Function to dynamically add new fields with a Remove button
    // $('#add_more').click(function() {
    //     let newFields = `
    //         <div class="expense_fields grid grid-cols-12 gap-2 mt-2" id="expense_field_${counter}">
    //             <div class="col-span-4">
    //                 <label for="buying_rate_${counter}" class="form-label">Amount</label>
    //                 <input id="buying_rate_${counter}" type="text" class="form-control" placeholder="Enter Buying Amount" name="buying_rate[]">
    //             </div>
    //             <div class="col-span-12 text-right mt-2">
    //                 <button type="button" class="btn btn-danger remove_field" data-id="${counter}">Remove</button>
    //             </div>
    //         </div>
    //     `;

    //     // Append the new fields to the wrapper div
    //     $('#expense_fields_wrapper').append(newFields);
    //     counter++;
    // });
    // // Function to handle dynamic remove button click
    // $(document).on('click', '.remove_field', function() {
    //     let id = $(this).data('id'); // Get the id from the data-id attribute
    //     $('#expense_field_' + id).remove(); // Remove the corresponding div
    // });
</script>


<script>
$(document).ready(function() {
  // Handle tab switching
  $('.nav-link').on('click', function() {
    // Remove btn-primary class from all tabs
    $('.nav-link').removeClass('btn-primary').addClass('btn-default');

    // Add btn-primary class to the selected tab
    $(this).removeClass('btn-default').addClass('btn-primary');
  });
  
  // Apply the function to specific inputs (for 5 digits limit)
//   $('#job_no').limitNumericInput(5);  
});

$(document).ready(function() {
    // Event listener for checkboxes
    $('.form-checkbox').on('change', function() {
        var labelName = $(this).data('label');  // Get the label from data attribute
        var inputId = $(this).attr('id') + '-input'; // Create a unique input ID
        
        if ($(this).is(':checked')) {
            // Create the input field when checkbox is checked
            var newInputDiv = `
                <div id="${inputId}" class="input-container col-span-4 mr-4">
                    <label class="form-label">${labelName}</label>
                    <input type="text" placeholder="${labelName}" class="form-control" name="${labelName.toLowerCase().replace(/\s+/g, '_')}">
                </div>`;
            
            // Append the new input field to the container
            $('#dynamic-inputs').append(newInputDiv);
        } else {
            // Remove the input field if checkbox is unchecked
            $('#' + inputId).remove();
        }
    });
});


$("#buying").on('click',function(){
   $("#supplier_charges_div").hide(); 
});
$("#main").on('click',function(){
   $("#supplier_charges_div").show(); 
});

   $(function() {

    //   $("#supplier_charges_div").hide();

       $('body').on('click', '.pagination a', function(e) {

          e.preventDefault();

     

          $('#load a').css('color', '#dfecf6');

          $('#load').append('<img style="position: absolute; left: 50%; top: 40%; z-index: 100000;" src="{{url("/images/loading.gif")}}" />');

          var url = $(this).attr('href');

          getArticles(url);

          window.history.pushState("", "", url);

       });

       

       function getArticles(url) {

          $.ajax({

              url : url

          }).done(function (data) {

           

            $('.articles').html(data);

          }).fail(function () {

              alert('Articles could not be loaded.');

          });

       }

     });

     

     $(document).on('keyup','#search', function(){

    var current_context = $(this).val();

    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });

   

    $.ajax({

      type:'GET',

      url:"{{url('/add-bilty')}}",

      async: false,

      data: {'search':current_context},

      success: function(data){

        $('.articles').html(data);

      }

    });

   });

   

     

     $(document ).ready(function() {

            var returnvalue = "<?php echo $subbmitted ?>";

          

            if(returnvalue != 0){

               $('.customer_type').show();

                             var logo = '{{asset("selfcompany_image")}}/'+returnvalue;

                             $('.logo_div_1').hide();

                             $(".logo_div").html('<label for="regular-form-1" class="form-label">Selected Company</label><img width="100" height="100" src="' + logo + '" />');    

                  

            }

        });

        

         

          $(document).on("change","input[name='customerTtype']:checked",function(){

                 

                   if($("input[name='customerTtype']:checked").val() == 'Walkin'){

                     $('#lcl_topay').show();

                     $('.AddMoreGoodCalculation').hide();

                    $('.hidetopay').show();

                    $('.div_paid').hide();

                    $('.billed_builty_type').hide();

                    $('.items').show(); 

                    $('.charges_div').hide(); 

                    

                    $('.billed_builty_type > select').removeAttr('name');

                    $('.normal_walkin_builty_type > select').attr('name','Builtytype');

     

                    // $("#supplier_charges_div").hide();

     

                    // $('.billed_builty_type > select').attr('required');

     

                //   $('.normal_walkin_builty_type').show();

                

                    // $('.lcl_amount_status').hide();

                   }else if($("input[name='customerTtype']:checked").val() == 'Normal'){

                        $('.items').show(); 

                     $('#lcl_topay').show();

                     $('.AddMoreGoodCalculation').hide();

                    $('.hidetopay').show();

                    $('.div_paid').hide();

                    $('.billed_builty_type').hide();

                    $('.charges_div').hide(); 

     

                    

                    $('.billed_builty_type > select').removeAttr('name');

                    $('.normal_walkin_builty_type > select').attr('name','Builtytype');

     

                    // $("#supplier_charges_div").hide();

     

                    $('.billed_builty_type > select').attr('required');

     

                   $('.normal_walkin_builty_type').show();

                

                    $('.lcl_amount_status').hide();

                   }

                   else{

                    // $("#supplier_charges_div").hide();

                    $('.items').hide(); 

                    $('.charges_div').show(); 

                    $('.AddMoreGoodCalculation').show();

                    $('.div_paid').hide();

                    $('#lcl_topay').hide();

                    $('.hidetopay').show();

                    $('.billed_builty_type').show();

                    $('.normal_walkin_builty_type').hide();

                    $('.normal_walkin_builty_type > select').removeAttr('name');

                    $('.billed_builty_type > select').attr('name','Builtytype');

                    $('.normal_walkin_builty_type > select').removeAttr('required');

                   $('.lcl_amount_status').hide();

                   }

        

           });

          

        

        $('.selfcompany').on('change',function(){

           var id  = $(this).val();

             if(id != 0){

                     $.ajax({

                        url:"{{ url('selfcompany-data') }}",

                        type:'GET',

                        data:{id:id},

                        success:function(data){

                                 $('.customer_type').show();

                                 var logo = '{{asset("selfcompany_image")}}/'+data.logo;

                                 $('.logo_div_1').hide();

                                 $(".logo_div").html('<label for="regular-form-1" class="form-label">Selected Company</label><img width="100" height="100" src="' + logo + '" />');   

                              }

                         }); 

                     }

                });

        

        

        $(".walkinCustmer").on("change", function(e){

            

              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{'type':'walkin'},

                 success:function(data){

               

                   $('.sender').val($('.walkinCustmer').val());

                    $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        if(item.name == 'Karachi'){

                        $('.from').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                         }

                            

                       });

                    

                        $('.package_id').html('');

                        

                        $('.package_id').append($('<option>', { 

                            value: '',

                            text : 'Select Package' 

                           }));

                           

                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', { 

                            value: item.id,

                            text : item.packagename 

                           }));

                       });

                       

                        $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                       });

        

                    }

        

                }); 

        });

        

        $(".normalcustomerdropdown").on("change", function(e){

             var customer_id = $(this).val();

           

              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{'type':'normal',customer_id:customer_id},

                 success:function(data){

          

                   $('.sender').val($('.normalcustomerdropdown').find('option:selected').text());

                     $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        $('.from').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                       });

                       

                        $('.package_id').html('');

                        

                        $('.package_id').append($('<option>', { 

                            value: '',

                            text : 'Select Package' 

                           }));

                           

                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', { 

                           value: item.package_id,

                            text : item.packagename 

                           }));

                       });

                       

                        $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                       });

        

                    }

        

                }); 

        });

        

        

        $(".customerbilled").on("change", function(e){

            

             var customer_id = $(this).val();

              $.ajax({

                 url:"{{ url('get-customer-station') }}",

                 type:'GET',

                 data:{customer_id:customer_id},

                 success:function(data){

               

                   $('.sender').val(data.customer_name);

                      $('.from').html('');

                    $.each(data.station_form, function (i, item) {

                        $('.from').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                       });

        

                       $('.package_id').html('');

                       $('.package_id').append($('<option>', { 

                            value: '',

                            text : 'Select Package' 

                           }));

                           

                       $.each(data.packages, function (i, item) {

                        $('.package_id').append($('<option>', { 

                            value: item.package_id,

                            text : item.packagename 

                           }));

                       });

                       

                       $('.to').html('');

                       $.each(data.station_to, function (i, item) {

                        $('.to').append($('<option>', { 

                            value: item.id,

                            text : item.name 

                           }));

                       });

                      $('.description').val($('.package_id').find('option:selected').text());        

                    }

        

                }); 

        });

        

        

        

        $("input[name=senderphone]").on("keypress", function(e){

             var myval = $(this).val();

              

             if(myval.length > 10) {

                  alert("Value must contain 11 characters.");

                  $(this).focus();

                  e.preventDefault();

             }   

        });

        

        $("input[name=receiverphone]").on("keypress", function(e){

             var myval = $(this).val();

              

             if(myval.length > 10) {

                  alert("Value must contain 11 characters.");

                  $(this).focus();

                  e.preventDefault();

             }   

        });

        

         $(document).on('change','.to', function(){

            if($('.package_id').val != '' && $('.from').val != '' && $('.to').val != ''){

                 

                 $.ajax({

                 url:"{{ url('get-station-rate') }}",

                 type:'GET',

                 data:{station_from:$(".from").val(),station_to:$(".to").val(),sender_id:$(".customerbilled").val(),package_id:$(".package_id").val()},

                 success:function(data){

                    console.log(data);

                 }

                }); 

              }

              

            });

           

        $('#small').keyup(function(){

        

            var small=$('#small').val();

            var large=$('#large').val();

        

            if(small == '' && large != ''){

              $('#qty').val(large);

            }else if(small != '' && large == ''){

              $('#qty').val(small);

            }else if(small != '' && large != ''){

              $('#qty').val(parseInt(small) + parseInt(large));

            }

          });

        

             $('#sendernm').keyup(function() {

               var cslang = $('#sendernm').val();

                $( ".sendernamed" ).val(cslang);

            });

            

            $('#rcphone').keyup(function() {

           var cslang = $('#rcphone').val();

            $( ".rcphone" ).val(cslang);

            });

          

            $('input[name="senderphone"]').keyup(function() {

           var cslang = $('input[name="senderphone"]').val();

            $( ".senderphoned" ).val(cslang);

            });

            

            $('#rcname').keyup(function() {

           var cslang = $('#rcname').val();

            $( ".rcname" ).val(cslang);

            });

            

            $('input[name="quants"]').keyup(function() {

           var cslang = $('input[name="quants"]').val();

            $( ".quants" ).val(cslang);

            });

            

            $(".packages").change(function() {

                var cslang = $('input[name="packages"]:checked').val();

                $('.boras').val(cslang);

            }); 

            

           

            

            

            $('input[name="weights"]').keyup(function() {

           var cslang = $('input[name="weights"]').val();

            $( ".weights" ).val(cslang);

            });

            

        $('.deliverymode').change(function() {

            if($(this).val() == "Door To Door"){

                $("#supplier_charges_div").show();

            }else{

                $("#supplier_charges_div").hide();

            }

        });

         $(".languages").change(function() {

            var cslang = $('input[name="Language"]:checked').val();

            $('.langua').val(cslang);

         });    

         

         $(".dt_type").change(function() {

            var cslang = $('input[name="deliverymode"]:checked').val();

            $('.doortodoor').val(cslang);

         });

         

         $(".ctpe").change(function() {

            var cslang = $('input[name="customerTtype"]:checked').val();

            $('.bccustomer').val(cslang);

         });

         

         $(".bt_type").change(function() {

            var cslang = $('input[name="Builtytype"]:checked').val();

            $('.bts').val(cslang);

         });

         

            

          $('#large').keyup(function(){

        

            var small=$('#small').val();

            var large=$('#large').val();

        

            if(small == '' && large != ''){

              $('#qty').val(large);

            }else if(small != '' && large == ''){

              $('#qty').val(small);

            }else if(small != '' && large != ''){

              $('#qty').val(parseInt(small) + parseInt(large));

            }else{

              $('#qty').val('');

            }

          });

          

          

          $(document).on("change","input[name='builty_type']:checked",function(){

               if($(this).val() == 'lcl'){

                   if($("input[name='customerTtype']:checked").val() == 'Walkin'){

                      $('.lcl_amount').show();

                   }else{

                       $('.lcl_amount').hide();

                   }

                 $('.fcl_div').show();

                 $('.lcl_div').hide();

             

              }else if($(this).val() == 'fcl'){

                 $('.lcl_div').show();

                 $('.fcl_div').hide();

              }

           });

          

           $(document).on('change','.builtyType',function(){

              if($(this).val() == 'Paid'){

                 // $('.div_paid').show();

              }else{

                //  $('.div_paid').hide();

              }

           });

           

           //$('.show_fields').hide();

          $(document).on("change","input[type='radio']",function(){

             

              var radioValue = $("input[name='customerTtype']:checked").val();

        

              if(radioValue == 'Walkin'){


                 document.getElementById("walkin_customer_div").style.display = "block";

                 document.getElementById("Billed_customer_div").style.display = "none";

              }

              else if(radioValue == 'Billed'){

                 document.getElementById("walkin_customer_div").style.display = "none";

                 document.getElementById("Billed_customer_div").style.display = "block";

              }

           

                $('.show_fields').show();

           

          });

        

        

</script>

<script>

   $(document).ready(function() { var max_fields = 10; var y = 1; var x = 1; var wrapper = $(".GoodCalculation"); var add_button = $(".AddMoreGoodCalculation"); var x = 1; $(add_button).click(function(e){ 

   

     if($('.customerbilled').val()){

         var customer_id = $('.customerbilled').val();

         var type = 'billed';

     }else if($('.normalcustomerdropdown').val()){

         var customer_id = $('.normalcustomerdropdown').val();

         var type = 'normal';

         

     }else{

     var customer_id = 0;

         var type = 'normal';

     }

      

       e.preventDefault(); $(wrapper).append('<div class="remove_here'+x+' grid grid-cols-12 gap-2 mt-2 positon-relative "><div class=" col-span-2" ><label for="regular-form-1" class="form-label">Packages</label>   <select name="package_id[]" id="regular-form-1" data-id="'+y+'" class="changepackage package_id'+y+' form-select sm:mr-2" aria-label="Default select example"></select></div>  <div class="col-span-2"> <label for="regular-form-1" class="form-label">Desc</label><input  type="text" placeholder="Enter description" class="desc'+y+' form-control"  name="desc[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">QTY</label><input  type="text" placeholder="QTY" class="form-control"  name="quantity[]"></div><div class="col-span-2 lcl_amount_status" data-id="'+x+'" style="display:none"><label for="regular-form-1" class="form-label">Amount</label><input  type="text" placeholder="Amount" class="form-control"  name="Amount[]"></div><div class="hidetopay col-span-2" style="display: none"><label for="regular-form-1" class="form-label">Supplier</label><select name="supplier_type" data-id="'+x+'" class="drop suplier_feild'+x+' form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_carton">Per Carton</option><option value="lump_sum">Lump Sum</option></select></div><div class="lumbsum'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Lump sum Amount</label><input  type="text" placeholder="Lumb Sum Amount" class="form-control"  name="lumpsum[]"></div><div class="perCarton'+x+' col-span-2" style="display:none"><label for="regular-form-1" class="form-label">Per Carton Rate </label><input  type="text" placeholder="Per Carton Amount" class="form-control"  name="carton[]"></div><div class="col-span-2"><label for="regular-form-1" class="form-label">Weight</label><input  type="text" placeholder="Enter Weight" class="form-control" name="weight"> </div><div class="col-span-1 charges_div"><label for="regular-form-1" class="form-label">Charges</label><select name="charges[]" data-id="0" class="charges form-select sm:mr-2" aria-label="Default select example"><option value="">Select option</option><option value="per_quantity">Per Quantity</option><option value="per_weight">Per Weight</option></select></div><div class="col-span-1"> <button type="button" class="remove_builty btn btn-danger" data-id='+x+' >Remove</button> </div></div></div>');   x++;

   

     var f = y;

       $.ajax({

      url:"{{ url('get-customer-station') }}",

      type:'GET',

      data:{customer_id:customer_id,type:type},

      success:function(data){

    

        $('.sender').val(data.customer_name);

     

            $('.package_id'+f).html('');

            

            $('.package_id'+f).append($('<option>', { 

                            value: '',

                            text : 'Select Package' 

                           }));

                           

            $.each(data.packages, function (i, item) {

             $('.package_id'+f).append($('<option>', { 

                 value: item.package_id,

                 text : item.packagename 

                }));

            });

         }

   

     }); 

       y++;

   });

       

   });

    

   

    $(document).on('click',".remove_builty", function(e) {

            e.preventDefault();

            

            $('.remove_here'+$(this).attr('data-id')+'').remove();

           

        });

   

   $(document).on('change','.drop',function() {

     var id = $(this).attr('data-id');

   

     var val = $(this).val();

     

     if(val == 'per_carton'){

         $(".lumbsum"+id).hide();

         $(".perCarton"+id).show();

     }

   

     if(val == 'lump_sum'){

         $(".lumbsum"+id).show();

         $(".perCarton"+id).hide();

     }

   

   });

   

   

   $(document).on('change','.charges',function() { 

        var charges  = $(this).val();

        

        if(charges == 'per_quantity'){

            

                var a,b,c,d,e,f ;

               

               f = $('.qty').val();

               a=Number(document.getElementById("freight").value);

               b=Number(document.getElementById("labour").value);

               c=Number(document.getElementById("localfreight").value)

               d=Number(document.getElementById("other").value)

               e =  (a * f) + b + c +d ;

             

               document.getElementById("totaltopay").value= e;

               

   

            

        }else if(charges == 'per_weight'){

                var a,b,c,d,e,f ;

               f = $('.weight').val();

               a=Number(document.getElementById("freight").value);

               b=Number(document.getElementById("labour").value);

               c=Number(document.getElementById("localfreight").value)

               d=Number(document.getElementById("other").value)

               e =  (a * f) + b + c +d ;

             

               document.getElementById("totaltopay").value= e;

        }

   });

   

</script>

<script>

function calc() {

    return true;

}

   /*function calc() {

   var a,b,c,d,e,f ;

  

   a=Number(document.getElementById("totaltopay").value);

   b=Number(document.getElementById("labour").value);

   c=Number(document.getElementById("localfreight").value)

   d=Number(document.getElementById("other").value)

   e =  a  + b + c + d ;

 

   document.getElementById("totaltopay").value= e;

   

   }*/

   

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

    

    $(document).on('change','.package_id ',function(){

          if($("input[name='customerTtype']:checked").val() == 'Billed'){

                $('.description').val($(this).find('option:selected').text());       

          }

       

    });

    

    $(document).on('change','.package_id ',function(){

       

         var pack_id = $(this).find('option:selected').val();

         

         if($("input[name='customerTtype']:checked").val() == 'Billed'){

            var cust_id =  $(".customerbilled").find('option:selected').val();

            $("#supplier_charges_div").show();

        }else{

           var cust_id =  $(".normalcustomerdropdown").find('option:selected').val();

           $("#supplier_charges_div").hide();

        }

         var from = $(".from").val();

         var to = $(".to").val();

         $.ajax({

               url:"{{ url('get-station-rate') }}",

               type:'GET',

               data:{

                     station_from:from,

                     station_to:to,

                     sender_id:cust_id,

                     package_id:pack_id

                  },

               

               success:function(data){

                  $('#freight').val(data.rate);

               }

              }); 







          if($("input[name='customerTtype']:checked").val() == 'Billed'){

                $('.description').val($(this).find('option:selected').text());       

          }

       

    });

    

    $(document).on('change','.changepackage',function(){

        var id = $(this).attr('data-id');

        if($("input[name='customerTtype']:checked").val() == 'Billed'){

            $('.desc'+id).val($(this).find('option:selected').text()); 

            $("#supplier_charges_div").show();

        }else{

            $("#supplier_charges_div").hide();

        }

    });

    

    $('.addBilty').click(function(){

        var builty_no = $('.builty_no').val();

     

        $.ajax({

                 url:"{{ url('check-builty-no') }}",

                 type:'POST',

                 data:{_token: '{{csrf_token()}}',builty_no:builty_no},

                 success:function(data){

                    if(data){

                       alert('already exist'); 

                    }else{

                        $('form#myForm').submit();

                    }

                 }

                }); 

    });

    

</script>

@endsection