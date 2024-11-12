@extends('layouts.master')

@section('body')

main

@endsection

@section('main-content')



@include('includes.mobile-nav')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

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
                    Customer Rights Form
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
                    <!-- BEGIN: Input -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Create New Customer Right
                                <div class="intro-ul">
                                    <!--<ul>-->
                                    <!--   <li>Walkin Customer</li>-->
                                    <!--</ul>-->
                                </div>
                                <!-- intro-ul close -->
                            </h2>
                        </div>
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="row">
                                    <form method="post">
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                        <input type="hidden" name="id" id="id" />
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <div id="demo-form2" data-parsley-validate
                                                        class="form-horizontal form-label-left">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"
                                                                    for="customer_dropdown">Customer:</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <select class="form-control" id="customer_dropdown"
                                                                        name="customer_dropdown">
                                                                        <option value="">Select Customer</option>
                                                                        <!-- Options will be dynamically populated -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"
                                                                    for="email">Email:</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input type="email" name="email" id="email"
                                                                        class="form-control"
                                                                        placeholder="Enter Email Address" onchange="check_email_existance(event)" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"
                                                                    for="password">Password:</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input type="text" name="password" id="password"
                                                                        class="form-control"
                                                                        placeholder="Enter Password" required>
                                                                    <br><br>
                                                                    <button class="btn btn-info" id="generate_password"
                                                                        onclick="generatePassword(event)">Generate
                                                                        Password</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <button class="btn btn-success" type="button"
                                                                    id="save-btn"
                                                                    onclick="save_customer_right(event)">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
                    <!-- BEGIN: Input -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Customer Rights
                                <div class="intro-ul">
                                    <!--<ul>-->
                                    <!--   <li>Walkin Customer</li>-->
                                    <!--</ul>-->
                                </div>
                                <!-- intro-ul close -->
                            </h2>
                        </div>
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12" style="overflow: auto; margin-top:10px">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <table id="datatable"
                                                    class="table table-responsive table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Email</th>
                                                            <th> Password </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            $(document).ready(function () {
                fetch_unlinked_customers();
                fetch_customer_rights();
            });

            function generatePassword(event) {
                event.preventDefault();
                var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
                var password = "";
                length = 8;
                for (var i = 0; i < length; i++) {
                    var charIndex = Math.floor(Math.random() * charset.length);
                    password += charset.charAt(charIndex);
                }
                $('#password').val(password);
            }

            function save_customer_right(event) {
                event.preventDefault();
                var customer = $('#customer_dropdown').val();
                var customer_name = $('#customer_dropdown').find('option:selected').text();
                var email = $('#email').val();
                var password = $('#password').val();

                if (customer == '') {
                    toastr.warning('Please select customer');
                    return false;
                } else if (email == '') {
                    toastr.warning('Please enter email address');
                    return false;
                } else if (password == '') {
                    toastr.warning('Please enter password');
                    return false;
                }

                toastr.warning('Processing...');

                var customerData = {
                    '_token': $('input[name=_token]').val(),
                    'id': $('#id').val(),
                    'user_id': customer,
                    'name': customer_name,
                    'email': email,
                    'password': password
                };

                $.ajax({
                    type: 'POST',
                    url: "{{ route('save-customer-right') }}",
                    data: customerData,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $('#id').val(null);
                            $('#email').val(null);
                            $('#password').val(null);
                            fetch_unlinked_customers();
                            fetch_customer_rights();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error('An error occurred while processing the request');
                        console.error(xhr.responseText);
                    }
                });
            }


            function fetch_unlinked_customers() {
                $.ajax({
                    url: "{{ route('fetch-unlinked-customers') }}",
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.customers.length > 0) {
                            var options = '<option value="">Select Customer</option>';
                            $.each(response.customers, function (index, customer) {
                                options += '<option value="' + customer.id + '">' + customer.name + '</option>';
                            });
                            $('#customer_dropdown').html(options);
                        } else {
                            $('#customer_dropdown').html('<option value="">No Customers Found</option>');
                        }
                    }
                });
            }

            function fetch_customer_rights() {
                $.ajax({
                    url: "{{ route('fetch-customer-rights') }}",
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.customer_rights.length > 0) {
                            var html = '';
                            $.each(response.customer_rights, function (index, customer) {
                                html += '<tr>';
                                html += '<td>' + (index + 1) + '</td>';
                                html += '<td>' + customer.name + '</td>';
                                html += '<td>' + customer.email + '</td>';
                                html += '<td>' + customer.uncrypted_password + '</td>';
                                html += '<td><a onclick="edit_customer_right(event, ' + customer.customer_id + ', ' + customer.customer_right_id + ', \'' + customer.name + '\', \'' + customer.email + '\', \'' + customer.uncrypted_password + '\')"><i class="fa fa-pencil"></i></a><a style="margin-left:5px" onclick="delete_customer_rights(event,' + customer.customer_right_id + ')"><i class="fa fa-trash-o"></i></a></td>';
                                html += '</tr>';
                            });
                            $('#datatable tbody').html(html);
                        } else {
                            $('#datatable tbody').html('<tr><td colspan="5" style="text-align:center">No Data Found</td></tr>');
                        }
                    }
                });
            }

            function delete_customer_rights(event, id) {
                event.preventDefault();
                var confirmed = confirm("Are you sure you want to delete this customer right?");
                if (!confirmed) {
                    return false;
                }

                toastr.warning('Processing...');
                
                $.ajax({
                    url: "{{ route('delete-customer-rights') }}",
                    type: "POST",
                    data: {
                        customer_right_id: id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            fetch_unlinked_customers();
                            fetch_customer_rights();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error('An error occurred while processing the request');
                        console.error(xhr.responseText);
                    }
                });
            }

            function edit_customer_right(event, customer_id, customer_right_id, customer_name, email, password) {
                // Set values for existing input fields using jQuery
                $('#id').val(customer_right_id);
                $('#email').val(email);
                $('#password').val(password);

                // Create a new option element for the dropdown
                var newOption = document.createElement('option');
                newOption.value = customer_id;
                newOption.text = customer_name;

                // Reference the dropdown element by its ID
                var dropdown = document.getElementById('customer_dropdown');

                // Check if the customer ID already exists in the dropdown to avoid duplicates
                var optionExists = false;
                for (var i = 0; i < dropdown.options.length; i++) {
                    if (dropdown.options[i].value == customer_id) {
                        optionExists = true;
                        break;
                    }
                }

                // If the option doesn't exist, append it; otherwise, update the existing option text
                if (!optionExists) {
                    dropdown.appendChild(newOption);
                } else {
                    dropdown.options[i].text = customer_name;
                }

                // Set the dropdown's value to the new option's value to make it selected
                dropdown.value = customer_id;
            }

            function check_email_existance(event)
            {
                var user_id=$('#id').val();
                var email=$('#email').val();
                $.ajax({
                    url: '{{ route('check-customer-right-email') }}',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: user_id,
                        email: email
                    },
                    success: function(response) {
                        if (response.exists) {
                            toastr.error('Email already exists.');
                            $('#email').val(null);
                            // You can also show an error message on the form
                            // or disable the submit button if needed
                        } 
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ', error);
                    }
                });
            }




        </script>
        @endsection