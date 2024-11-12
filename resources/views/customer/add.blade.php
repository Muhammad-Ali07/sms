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
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i
                        data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                        class="breadcrumb--active">Customer</a> </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                    </div>
                    <a class="notification sm:hidden" href=""> <i data-feather="search"
                            class="notification__icon dark:text-gray-300"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-10.jpg">
                                    </div>
                                    <div class="ml-3">Charlize Theron</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        charlizetheron@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-1.jpg">
                                    </div>
                                    <div class="ml-3">Russell Crowe</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        russellcrowe@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-3">Russell Crowe</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        russellcrowe@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-3">Al Pacino</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        alpacino@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-12.jpg">
                                </div>
                                <div class="ml-3">Samsung Q90 QLED TV</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
                    </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-10.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages
                                        of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomi</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-1.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-15.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-7.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s
                                        standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-8.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a
                                        reader will be distracted by the readable content of a page when looking at its
                                        layout. The point of using Lorem </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false">
                        <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                                <div class="font-medium">Charlize Theron</div>
                                <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                            </div>
                            <div class="p-2">
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </div>
                            <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
        @php
            $user = auth()->user()->id;
            $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
        @endphp


            @if (empty($select))
            <form method="post" id="customer_form" action="{{ route('add-customer-process') }}">
                    @else
            <form method="post" id="customer_edit_form" action="{{ route('customer-Edit-Process') }}">
                    @endif
                @csrf
                <div class="grid">
                    <div class="intro-y flex items-center mt-12">
                        <h2 class="text-lg font-medium mr-auto">
                            Customer Form
                        </h2>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">

                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Input -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">


                                        @if (!empty($select))
                                            Edit Customer Information
                                            @php

                                                $builty_type = explode(',', $select->builtytype);
                                            @endphp


                                        @endif

                                        @if (empty($select))
                                            Add New Customer
                                        @endif


                                    </h2>


                                </div>


                                <div id="input" class="p-5">

                                    <div class="preview">
                                        <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-3" >
                                                <label class="radio-switch-1">Customer Build Type</label> <br><br>
                                                <input id="radio-switch-1" class="form-check-input" type="radio"
                                                    @if (!empty($select)) 
                                                        @if ($select->builtytype == 'Paid') {{ 'checked' }} @endif
                                                    @else
                                                        checked
                                                    @endif
                                                name="customerTtype" value="Paid">
                                                <label class="Advance">Paid</label>
                                                <input id="radio-switch-2" class="Normal form-check-input" type="radio"
                                                    @if (!empty($select)) @if ($select->builtytype == 'To Pay') {{ 'checked' }} @endif
                                                    @endif name="customerTtype" value="To Pay">
                                                <label class="To Pay form-check-label" for="radio-switch-2">To Pay</label>
                                                <input id="radio-switch-2" class="Normal form-check-input" type="radio"
                                                    @if (!empty($select)) @if ($select->builtytype == 'Credit') {{ 'checked' }} @endif
                                                    @endif name="customerTtype" value="Credit">
                                                <label class="To Pay form-check-label" for="radio-switch-2">Credit</label>
                                            </div>

                                            <!--<div class="col-span-3">-->
                                            <!--    <input id="regular-form-2"-->
                                            <!--        value="@if (!empty($select)) {{ $select->id }} @endif "-->
                                            <!--        type="hidden" class="form-control" placeholder="ID" name="cusID">-->
                                            <!--    <label for="regular-form-1" class="form-label">Customer Id</label>-->
                                            <!--    <input id="regular-form-2"-->
                                            <!--        value="@if (!empty($select)) {{ $select->customer_id }} @else{{ 001 }} @endif "-->
                                            <!--        @if (!empty($select))  @endif readonly type="text"-->
                                            <!--        class="form-control" placeholder="ID" name="customer_id">-->
                                                <input id="regular-form-2"
                                                    value="@if (!empty($select)) {{ $select->id }} @endif "
                                                    type="hidden" class="form-control" placeholder="ID" name="cusID">

                                            <!--</div>-->
                                            <div class="col-span-3 form-group">

                                                <label for="regular-form-2" class="form-label">Customer Name</label>
                                                <input required id="regular-form-2" type="text"
                                                    value="@if (!empty($select)) {{ $select->name }} @endif"
                                                    class="form-control customer_name " placeholder="Enter Name in English" name="name_eng">
                                                <!--<input id="txtBox" name="name_urdu" type="text" value="@if (!empty($select)) {{ $select->nameinurdu }} @endif" class="form-control UrduFont" placeholder="اردو میں نام درج  کریں"-->
                                            </div>
                                            <div class="col-span-3 form-group">
                                                <label for="regular-form-2" class="form-label">Customer Prefix</label>
                                                <input required id="customerPrefix" type="text"
                                                    value="@if (!empty($select)) {{ $select->prefix }} @endif" @if(!empty($select)) disabled @endif
                                                    class="form-control prefix" placeholder="Enter Unique prefix" name="prefix" maxlength="3">
                                                <span id="prefixError" style="color: red;"></span> <!-- Error message display -->
                                            </div>
                                            <div class="col-span-3 ">
                                                <label for="regular-form-4" class="form-label">NTN No</label>
                                                <input id="regular-form-4" type="text"
                                                    value="@if (!empty($select)) {{ $select->contact_point }} @endif"
                                                    class="form-control" placeholder="Enter NTN No" name="contact_point">
                                            </div>
                                        </div>

                                        {{-- <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-4 mt-2">
                                                <label for="regular-form-4" class="form-label">SRB/PRA/KPRA/BRA </label>
                                                <input id="regular-form-4" type="number"
                                                    value="@if (!empty($select)) {{ $select->srb }} @endif"
                                                    class="form-control" placeholder="Enter SRB/PRB/KRB/BRB "
                                                    name="srb">
                                            </div>
                                        </div> --}}

                                        <div class="grid grid-cols-12 gap-2">
                                            <!-- Checkbox 1 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">SRB</label>
                                                <input type="checkbox" id="srbCheckbox"
                                                       onclick="toggleInput('srbInput')"
                                                       {{ !empty($select->srb) ? 'checked' : '' }}>
                                                <input id="srbInput" type="text" class="form-control mt-2" placeholder="Enter SRB"
                                                       name="srb"
                                                       style="{{ !empty($select->srb) ? 'display:block;' : 'display:none;' }}"
                                                       value="{{ $select->srb ?? '' }}">
                                            </div>

                                            <!-- Checkbox 2 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">PRA</label>
                                                <input type="checkbox" id="prbCheckbox"
                                                       onclick="toggleInput('prbInput')"
                                                       {{ !empty($select->prb) ? 'checked' : '' }}>
                                                <input id="prbInput" type="text" class="form-control mt-2" placeholder="Enter PRA"
                                                       name="prb"
                                                       style="{{ !empty($select->prb) ? 'display:block;' : 'display:none;' }}"
                                                       value="{{ $select->prb ?? '' }}">
                                            </div>

                                            <!-- Checkbox 3 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">KPRA</label>
                                                <input type="checkbox" id="krbCheckbox"
                                                       onclick="toggleInput('krbInput')"
                                                       {{ !empty($select->krb) ? 'checked' : '' }}>
                                                <input id="krbInput" type="text" class="form-control mt-2" placeholder="Enter KPRA"
                                                       name="krb"
                                                       style="{{ !empty($select->krb) ? 'display:block;' : 'display:none;' }}"
                                                       value="{{ $select->krb ?? '' }}">
                                            </div>

                                            <!-- Checkbox 4 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">BRA</label>
                                                <input type="checkbox" id="brbCheckbox"
                                                       onclick="toggleInput('brbInput')"
                                                       {{ !empty($select->brb) ? 'checked' : '' }}>
                                                <input id="brbInput" type="text" class="form-control mt-2" placeholder="Enter BRA"
                                                       name="brb"
                                                       style="{{ !empty($select->brb) ? 'display:block;' : 'display:none;' }}"
                                                       value="{{ $select->brb ?? '' }}">
                                            </div>
                                            
                                                                                        <!-- Checkbox 5 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">ICT</label>
                                                <input type="checkbox" id="ictCheckbox"
                                                       onclick="toggleInput('ictInput')"
                                                       {{ !empty($select->ict) ? 'checked' : '' }}>
                                                <input id="ictInput" type="text" class="form-control mt-2" placeholder="Enter ICT"
                                                       name="ict"
                                                       style="{{ !empty($select->ict) ? 'display:block;' : 'display:none;' }}"
                                                       value="{{ $select->ict ?? '' }}">
                                            </div>

                                        </div>
                                        
                                        <div class="grid grid-cols-12 gap-2">
                                                                                                                                    <!-- Checkbox 5 -->
                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">WTH I.T%</label>
                                                <input type="checkbox" id="itCheckbox"
                                                       onclick="toggleInput('itInput')"
                                                       {{ !empty($select->it) ? 'checked' : '' }}>
                                                <input id="itInput" type="text" class="form-control mt-2" placeholder="Enter IT"
                                                   name="it"
                                                   style="{{ !empty($select->it) ? 'display:block;' : 'display:none;' }}"
                                                   value="{{ $select->it ?? '' }}">
                                                   <script>
                                                        $(document).ready(function() {
                                                            $('#itInput').on('input', function() {
                                                                let value = $(this).val().replace('%', '');  // Remove any existing % sign
                                                                if ($.isNumeric(value) && value !== "") {     // Only add if value is numeric
                                                                    $(this).val(value + '%');
                                                                }
                                                            });
                                                        });
                                                    </script>
                                            </div>

                                            <div class="col-span-4 mt-2">
                                                <label class="form-label">WTH S.T%</label>
                                                <input type="checkbox" id="stCheckbox"
                                                       onclick="toggleInput('stInput')"
                                                       {{ !empty($select->st) ? 'checked' : '' }}>
                                                        <input id="stInput" type="text" class="form-control mt-2" placeholder="Enter ST"
                                                               name="st"
                                                               style="{{ !empty($select->st) ? 'display:block;' : 'display:none;' }}"
                                                               value="{{ $select->st ?? '' }}">
                                                       <script>
                                                            $(document).ready(function() {
                                                                $('#stInput').on('input', function() {
                                                                    let value = $(this).val().replace('%', '');  // Remove any existing % sign
                                                                    if ($.isNumeric(value) && value !== "") {     // Only add if value is numeric
                                                                        $(this).val(value + '%');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                            </div>

                                        </div>



                                        <div class="grid grid-cols-12 gap-2">

                                            <div class="col-span-4 mt-2">
                                                <label for="regular-form-4" class="form-label">Account Limit</label>
                                                <input id="regular-form-4" type="text"
                                                    value="@if (!empty($select)) {{ $select->account_limit }} @endif"
                                                    class="form-control" placeholder="Enter Account Limit"
                                                    name="account_limit">
                                            </div>


                                            <div class="col-span-4 mt-2">
                                                <label for="regular-form-5" class="form-label">No of Prints</label>

                                                <select id="regular-form-1" class="form-select sm:mr-2"
                                                    aria-label="Default select example" name="noofprints">
                                                    <option
                                                        @if (!empty($select)) @if ($select->noofprints == 0) {{ 'selected' }} @endif
                                                        @endif value="0"> 0</option>
                                                    <option
                                                        @if (!empty($select)) @if ($select->noofprints == 1) {{ 'selected' }} @endif
                                                        @endif value="1"> 1</option>
                                                    <option
                                                        @if (!empty($select)) @if ($select->noofprints == 2) {{ 'selected' }} @endif
                                                        @endif value="2"> 2</option>
                                                    <option
                                                        @if (!empty($select)) @if ($select->noofprints == 3) {{ 'selected' }} @endif
                                                        @endif value="3"> 3</option>

                                                </select>
                                            </div>
                                            
                                            <div class="col-span-4 mt-2">
                                                <label for="regular-form-5" class="form-label">Credit Days</label>
                                                    <input id="creditDaysInput" type="number"
                                                    value="{{ !empty($select) ? $select->credit_days : '' }}"
                                                    class="form-control" placeholder="Enter Credit days "
                                                    name="credit_days" min="0" max="999">
                                                <script>
                                                    $('#creditDaysInput').on('input', function() {
                                                        // Get the current value
                                                        let value = $(this).val();
                                                
                                                        // Check if the value is not empty and is greater than 999
                                                        if (value > 999) {
                                                            $(this).val(999); // Set the maximum limit to 999
                                                        }
                                                
                                                        // Allow only digits and limit to 3 digits
                                                        $(this).val(value.replace(/[^0-9]/g, '').slice(0, 3));
                                                    });
                                                </script>
                                            </div>

                                        </div>
                                        
                                        <div class="container mt-2">
                                          <div class="row">
                                            <!-- First column (6 units) -->
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-12">
                                                  <!-- Parent div for email input fields -->
                                                  <div id="emailFields">
                                                      <label for="email" class="input-group-prepend">
                                                        Customer Email:
                                                      </label>
                                                    <div class="input-group mb-3 p-1 email-field">
                                                      <input type="email" class="form-control" name="emails[]" placeholder="Enter your email">
                                                      <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button" id="addMoreEmail">Add More</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        
                                            <!-- Second column (6 units) -->
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-12">
                                                  <!-- Parent div for phone input fields -->
                                                  <div id="phoneFields">
                                                      <label for="phone" class="input-group-prepend">
                                                        Customer Phone number:
                                                      </label>
                                                    <div class="input-group mb-3 p-1 phone-field">
                                                      <input type="tel" class="form-control phone-number" name="phones[]" placeholder="Enter customer phone number">
                                                      <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button" id="addMorePhone">Add More</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
            
                                        </div>
                                        <div class="row g-3">
                                            <!-- Email column -->
                                            <div class="col-md-6 emailDivbar" style="width:48%; margin-right:10px;">
                                                @if(!empty($customerEmails))
                                                    @foreach($customerEmails as $e)
                                                        <div class="email-row mb-3">
                                                            <input type="email" value="{{$e->email}}" class="form-control" placeholder="Enter Email" name="emails[]">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        
                                            <!-- Add gap between the two columns using 'mb-3' or 'mt-md-0' -->
                                            <div class="col-md-6 emailDivbar mt-md-0 mb-3">
                                                @if(!empty($customerPhone))
                                                    @foreach($customerPhone as $p)
                                                        <div class="input-group mb-3 phone-field">
                                                            <input type="tel" class="form-control" name="phones[]" value="{{$p->phone}}" placeholder="Enter your phone number">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                            
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <!--<div class="col-span-6 mt-2  emailDivbar">-->
                                        <!--    <div class="col-span-12">-->
                                        <!--        <label for="regular-form-5" class="form-label">Email</label>-->
                                        <!--        @if (!empty($customerAddress))-->
                                        <!--            @foreach ($customerAddress as $index => $Emails)-->
                                        <!--                <div class="email-row">-->
                                        <!--                    <input type="email" class="form-control" value="{{ $Emails->email }}" placeholder="Enter Email" name="emails[]">-->
                                        <!--                    @if ($index == 0)-->
                                        <!--                        <button class="btn btn-primary mt-2 AddMoreEmail">Add More</button>-->
                                        <!--                    @else-->
                                        <!--                        <button type="button" class="btn btn-danger removeEmail mt-2">Remove</button>-->
                                        <!--                    @endif-->
                                        <!--                </div>-->
                                        <!--            @endforeach-->
                                        <!--        @else-->
                                        <!--            <div class="email-row">-->
                                        <!--                <input type="email" class="form-control" placeholder="Enter Email" name="emails[]">-->
                                        <!--                <button class="btn btn-primary mt-2 AddMoreEmail">Add More</button>-->
                                        <!--            </div>-->
                                        <!--        @endif-->
                                                <!--<div>-->
                                                <!--</div>-->
                                        <!--    </div>-->
                                        <!--</div>-->




                                        <!--<div class="mt-2 grid grid-cols-12 gap-2 positon-relative phoneDivbar">-->
                                        <!--    <div class="col-span-12">-->
                                        <!--        <div class="mt-2">-->
                                        <!--            <label for="regular-form-5" class="form-label">Phone</label>-->

                                        <!--            @if (!empty($customerPhone))-->
                                        <!--                @foreach ($customerPhone as $Phones)-->
                                        <!--                    <input type="number" class="form-control"-->
                                        <!--                        value="{{ $Phones->phone }}" placeholder="Enter Phone"-->
                                        <!--                        name="phones[]"><BR>-->
                                        <!--                @endforeach-->
                                        <!--            @endif-->

                                        <!--            @if (empty($customerPhone))-->
                                        <!--                <input type="number" class="valid form-control"-->
                                        <!--                    placeholder="Enter Phone" name="phones[]">-->

                                        <!--        </div>-->
                                        <!--        <button class="btn btn-primary mt-5 AddMorePhone">Add More</button>-->

                                        <!--    </div>-->
                                        <!--    @endif-->
                                        <!--</div>-->

                                        <div class="mt-2">
                                            <label for="regular-form-6" class="form-label">Address(Office)</label>

                                            <input id="regular-form-4" type="text"
                                                value="@if (!empty($select)) {{ $select->Cus_Address }} @endif"
                                                class="form-control" placeholder="Enter Customer Office Address"
                                                name="OfficeAddress">
                                        </div>
                                        @if (!empty($customerOAddress))
                                            <div
                                                class="mt-2 grid grid-cols-12 gap-2 positon-relative-textarea phoneDivAddress_ware">
                                                <div class="col-span-12">
                                                    <div class="mt-2">

                                                        <label for="regular-form-6"
                                                            class="form-label">Address(Warehouse)</label>


                                                        @foreach ($customerOAddress as $Address)
                                                            <input type="text" class="form-control"
                                                                value="{{ $Address->address }}"
                                                                placeholder="Enter Warehouse Address" name="address[]"><BR>
                                                        @endforeach
                                        @endif

                                        @if (empty($customerOAddress))
                                            <div
                                                class="mt-2 grid grid-cols-12 gap-2 positon-relative-textarea phoneDivAddress_ware">
                                                <div class="col-span-12">
                                                    <div class="mt-2">
                                                        <label for="regular-form-6"
                                                            class="form-label">Address(Warehouse)</label>
                                                        <textarea id="regular-form-6" class="form-control" placeholder="Enter Address" name="address[]"></textarea>
                                                    </div>
                                                    <button class="btn btn-primary mt-5 AddMoreAddress">Add More</button>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="btn btn-primary mt-5">
                    @if($user_meta->setup == 1)
                        @if (!empty($select))
                            @if($user_meta->edition == 1)
                                <button type="submit"> Submit </button>'
                            @endif
                        @else
                            @if($user_meta->insertion == 1)
                                <button type="submit"> Submit </button>'
                            @endif
                        @endif
                    @endif

                </div>
            </form>
            @if (!Request::is('*edit-customer*'))
                <!--table view starts here-->
                       <div class="grid grid-cols-12 gap-6 mt-5">
                          <div class="intro-y col-span-12 lg:col-span-12">
                             <!-- BEGIN: Input -->
                             <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                   <h2 class="font-medium text-base mr-auto">
                                      View Customer
                                   </h2>
                                   <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                      <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                                      <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                                      </div> -->
                                </div>
                                @php  
                                    $customerdata = App\Customer::orderBy('created_at', 'desc') ->with('nowEmails')->get();
                                @endphp
                                <div id="input" class="p-5">
                                   <div class="preview">
                                        
                                          <table id="customer_table" class="display nowrap" style="width:100%">
                                         <thead>
                                            <tr>
                                               <th>Name</th>
                                               <th>Buity Type</th>
                                              <th>NTN No</th>
                                               <th>Email Address</th>
                                               <th>Addresses</th>
                                               <th>Action</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                             @if(!empty($customerdata))
                                                @foreach($customerdata as $customer)
        
                                                <tr>
                                                      <td>{{$customer->name}}</td>
                                                      <td>{{$customer->builtytype}}</td>
                                                   <td>{{$customer->contact_point}}</td>
                                                   <td>
                                                    @if($customer->nowEmails->isNotEmpty())
                                                    @foreach ($customer->nowEmails as $item)
                                                        {{ $item->email }}<br>
                                                    @endforeach
                                                @else
                                                    No emails available
                                                @endif
                                                </td>
                                                      <td>{{$customer->Cus_Address}}</td>
        
                                                <td><a  href="edit-customer/{{$customer->id}}" > Edit </a>  |
                                                <a class="deletecustomer" href="javascript:void(0)" data-url="delete-customer/{{$customer->id}}" data-name="{{$customer->name}}">Delete</a>
                                                 <a href="view-customers-details/{{$customer->id}}"> View </a>
                                                   </td>
                                                </tr>
                                                @endforeach
                                            @endif
        
                                         </tbody>
                                         <tfoot>
                                            <tr>
                                                <th>Name</th>
                                               <th>Buity Type</th>
                                              <th>NTN No</th>
                                               <th>Email Address</th>
                                               <th>Addresses</th>
                                               <th>Action</th>
                                            </tr>
                                         </tfoot>
                                      </table>
                                   </div>
                                </div>
                             </div>
                             <!-- END: Input -->
                             <!-- BEGIN: Input Sizing -->
                          </div>
                       </div>
                <!--table view ends here-->
            @endif
        
        </div>
    </div>
@endsection
@section('script')
@endsection
@section('scripts')
<script>
        $('#customer_table').DataTable({

            "pageLength":15,
               "order": [[0, 'desc']],

               dom: 'Bfrtip',

                buttons: [

            { extend: 'print', exportOptions:

                { columns: ':visible' }

            },
            { extend: 'pdf'//, exportOptions:

                //   { columns: [ 0, 1, 2, 3, 4 ,5,6,7,8] }

            }

           ],

             });
// Attach event listener to all delete links
        document.querySelectorAll('.deletecustomer').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var customerName = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete " + customerName + "?", deleteUrl);
            });
        });
    
</script>

<script>
$(document).ready(function() {
    // Listen for input changes on the prefix field
    $('#customerPrefix').on('input', function() {
            var prefixValue = $(this).val();  // Get the current value of the prefix input
            
            // Check if the input is exactly 3 characters and all are alphabets
            if (prefixValue.length === 3 && /^[A-Za-z]+$/.test(prefixValue)) {
                $.ajax({
                    url: '{{ route("check.prefix") }}',  // The URL for the check prefix route
                    method: 'GET',
                    data: {
                        prefix: prefixValue  // Send the prefix value to the server
                    },
                    success: function(response) {
                        // Check if the prefix is unique
                        if (response.isUnique) {
                            // If unique, show a success notification
                            toastr.success('This prefix is available!');
                            $('#prefixError').text('');  // Clear previous error message
                        } else {
                            // If not unique, show an error notification
                            toastr.error('This prefix is already taken. Please choose a different one.');
                            $('#prefixError').text('This prefix is already taken. Please choose a different one.');
                        }                    },
                    error: function() {
                        // Handle errors if necessary
                        console.log('Error checking prefix uniqueness.');
                    }
                });
            } else {
                // If input is not exactly 3 letters, clear the error message
                $('#prefixError').text('');
            }
        });
});

$(document).ready(function() {
        if (typeof $.fn.validate === 'function') {
            console.log("jQuery Validation plugin loaded successfully.");
        } else {
            console.error("jQuery Validation plugin is not loaded.");
        }
    });

</script>
<script>
$(document).ready(function () {
    $("#customer_form").validate({
        rules: {
            name_eng: {
                required: true,
            },
            prefix: {
                required: true,
            },

        },
        messages: {
            name_eng: {
                required: "Please enter your name",
            },
            prefix: {
                required: "Prefix is required!",
            },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });
    $("#customer_edit_form").validate({
        rules: {
            name_eng: {
                required: true,
            },
        },
        messages: {
            name_eng: {
                required: "Please enter your name",
            },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });

    

});
</script>

    <script>
//       $(document).on('click', '.AddMoreEmail', function(e) {
//             e.preventDefault();
//             var newEmailRow = `
//                 <div class="email-row mt-2">
//                     <input type="email" class="form-control" placeholder="Enter Email" name="emails[]">
//                     <button type="button" class="btn btn-danger removeEmail mt-2">Remove</button>
//                 </div>`;
//             $('.emailDivbar').append(newEmailRow);
//         });

// $(document).on('click', '.removeEmail', function() {
//     $(this).closest('.email-row').remove();
// });


    </script>

<script>
    function toggleInput(inputId) {
        var checkbox = document.getElementById(inputId.replace('Input', 'Checkbox'));
        var input = document.getElementById(inputId);
        if (checkbox.checked) {
            input.style.display = 'block';
        } else {
            input.style.display = 'none';
        }
    }

    // Initialize inputs based on the current state
    document.addEventListener('DOMContentLoaded', function () {
        ['srb', 'prb', 'krb', 'brb','ict'].forEach(function (type) {
            var checkbox = document.getElementById(type + 'Checkbox');
            var input = document.getElementById(type + 'Input');
            if (checkbox && input) {
                if (input.value) {
                    checkbox.checked = true;
                    input.style.display = 'block';
                } else {
                    checkbox.checked = false;
                    input.style.display = 'none';
                }
            }
        });
    });
    </script>
    
    <script>
$(document).ready(function() {
  // Add More for Email
  $('#addMoreEmail').on('click', function() {
    let emailField = `
      <div class="input-group mb-3 email-field">
        <input type="email" name="emails[]" class="form-control" placeholder="Enter your email">
        <div class="input-group-append">
          <button class="btn btn-danger removeEmail" type="button">Remove</button>
        </div>
      </div>`;
    $('#emailFields').append(emailField);
  });

  // Remove dynamically added email fields
  $(document).on('click', '.removeEmail', function() {
    $(this).closest('.email-field').remove();
  });

  // Add More for Phone
  $('#addMorePhone').on('click', function() {
    let phoneField = `
      <div class="input-group mb-3 phone-field">
        <input type="tel" class="form-control" name="phones[]" placeholder="Enter your phone number">
        <div class="input-group-append">
          <button class="btn btn-danger removePhone" type="button">Remove</button>
        </div>
      </div>`;
    $('#phoneFields').append(phoneField);
  });

  // Remove dynamically added phone fields
  $(document).on('click', '.removePhone', function() {
    $(this).closest('.phone-field').remove();
  });
});
</script>
@endsection
