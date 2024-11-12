<style>
    .side-nav > ul > li > .side-menu:not(.side-menu--active):hover .side-menu__icon:before {
        background-color: #000 !important;
    }

    .sub-menu-active {
        background-color: #f0f0f0; /* Example active background color */
        color: #aa1c1c !important; /* Example active text color */
    }
</style>
    @php
        $user = auth()->user()->id;
        $user_meta = DB::table('user_meta')->where('fk_user_id',$user)->first();
    @endphp
    <nav class="side-nav">

        <a href="{{ route('home') }}" class="intro-x flex items-center pl-5 pt-4">

            <img alt="" class="logo-Class"
                @if (isset(session('company')[0]->logo)) src="{{ asset('selfcompany_image/' . session('company')[0]->logo) }}" @endif>



        </a>

        <div class="side-nav__devider my-6"></div>

        <ul>
            @php
                $company = session('company');
                $companyId = $company[0]->id;
            @endphp
            <li>

                <a href="{{ route('dashboard', ['id' => $companyId]) }}" class="side-menu ">

                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>

                    <div class="side-menu__title">

                        Dashboard

                    </div>

                </a>

            </li>
            <li>

                <a href="{{ route('videos.form', ['id' => $companyId]) }}" class="side-menu ">

                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>

                    <div class="side-menu__title">

                        Tutorial

                    </div>

                </a>

            </li>

        @if($user_meta->setup == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('addPickupPoint','addShippingLine','add-customer','add-broker','addvehicleType','add-station','add-package','view-category','self-company','add-roles','view-roles','assign-roles') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>

                    <div class="side-menu__title">

                        Setup

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>
                <ul style="{{ Request::is('addPickupPoint', 'addShippingLine','add-customer','add-broker','addvehicleType','add-station','add-package','view-category','self-company','add-roles','view-roles','assign-roles') ? 'display:block;' : 'display:none;' }}">

                            {{-- <li>
                                <a href="{{ route('addYard') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Yard
                                        <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                    </div>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('addPickupPoint') }}" class="side-menu {{ Request::is('addPickupPoint') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Pickup Point
                                        <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('addShippingLine') }}" class="side-menu {{ Request::is('addShippingLine') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Shipping Line
                                        <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('add-customer') }}" class="side-menu {{ Request::is('add-customer') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Customer
                                        <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('add-broker') }}" class="side-menu {{ Request::is('add-broker') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Broker
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('addvehicleType') }}" class="side-menu {{ Request::is('addVehicleType') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                    <div class="side-menu__title">
                                        Vehicle Category
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('add-station') }}" class="side-menu {{ Request::is('add-station') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                                    <div class="side-menu__title">
                                        Station
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('add-package') }}" class="side-menu {{ Request::is('add-package') ? 'sub-menu-active' : '' }}">
                                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                                    <div class="side-menu__title">
                                        Packages
                                    </div>
                                </a>
                            </li>

                            <li style="display: none;">

                                <a href="javascript:;.html" class="side-menu">

                                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>

                                    <div class="side-menu__title">

                                        Customer Profile

                                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                    </div>

                                </a>

                                <ul class="" style="{{ Request::is('customer-profile', 'add.status') ? 'display:block;' : 'display:none;' }}">

                                    <li>

                                        <a href="{{ route('customer-profile') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title">

                                                Add Customer Profile

                                            </div>

                                        </a>

                                    </li>

                                    <li>

                                        <a href="{{ route('view-customer-ratelist') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title">

                                                View Customer Profile

                                            </div>

                                        </a>

                                    </li>

                                    <li>

                                        <a href="{{ route('edit-rate') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title">

                                                Edit Rate

                                            </div>

                                        </a>

                                    </li>

                                </ul>

                            </li>

                            <!--<li>-->

                            <!--    <a href="javascript:;.html" class="side-menu">-->

                            <!--        <div class="side-menu__icon"> <i data-feather="box"></i> </div>-->

                            <!--        <div class="side-menu__title">-->

                            <!--            Inventory-->

                            <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

                            <!--        </div>-->

                            <!--    </a>-->

                            <!--    <ul class="">-->

                            <!--        <li>-->

                            <!--            <a href="{{ route('add-inventory') }}" class="side-menu">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title"> Add Inventory </div>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li>-->

                            <!--            <a href="{{ route('add-warehouse') }}" class="side-menu">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title"> Add Vendor </div>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li>-->

                            <!--            <a href="{{ route('add-packing') }}" class="side-menu">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title"> Add Packing </div>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--    </ul>-->

                            <!--</li>-->




                            <!--<li>-->

                            <!--   <a href="javascript:;.html" class="side-menu">-->

                            <!--      <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>-->

                            <!--      <div class="side-menu__title">-->

                            <!--         Rate List-->

                            <!--         <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

                            <!--      </div>-->

                            <!--   </a>-->

                            <!--   <ul class="">-->

                            <?php

                        //   $check = DB::table('now_rateslist')

                        //   ->where('customer_profile','normal')

                        //   ->get();

                        //   if($check->count() == '0'){
                            ?>

                            <!--      <li>-->

                            <!--         <a href="{{ route('add-ratelist') }}" class="side-menu">-->

                            <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--            <div class="side-menu__title"> Add Rate List </div>-->

                            <!--         </a>-->

                            <!--      </li>-->

                            <?php    // }
                            ?>

                            <!--      <li>-->

                            <!--         <a href="{{ route('view-ratelist') }}" class="side-menu">-->

                            <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--            <div class="side-menu__title"> View Rate List </div>-->

                            <!--         </a>-->

                            <!--      </li>-->

                            <!--   </ul>-->

                            <!--</li>-->

                            {{-- <li>

                                <a href="javascript:;.html" class="side-menu">

                                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>

                                    <div class="side-menu__title">

                                        Suggestion List

                                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                    </div>

                                </a>

                                <ul class="">

                                    <li>

                                        <a href="{{ route('Add-suggestion') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> Add Suggestion List </div>

                                        </a>

                                    </li>



                                    <li>

                                        <a href="{{ route('view-suggestion') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> View Suggestion List </div>

                                        </a>

                                    </li>

                                </ul>

                            </li> --}}




                            {{-- <li>

                                <a href="javascript:;.html" class="side-menu">

                                    <div class="side-menu__icon"> <i data-feather="book"></i> </div>

                                    <div class="side-menu__title">

                                        Maintenance Head

                                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                    </div>

                                </a>

                                <ul class="">

                                    <li>

                                        <a href="{{ route('head-maintenance') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> Add Maintenance Head </div>

                                        </a>

                                    </li>

                                </ul>--}}

                            <li>

                                <a href="{{ route('self-company') }}" class="side-menu {{ Request::is('self-company') ? 'sub-menu-active' : '' }}">

                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                                    <div class="side-menu__title">

                                        Self Company

                                    </div>

                                </a>

                            </li>



                            <!--<li>-->

                            <!--    <a href="{{ route('add-description') }}" class="side-menu">-->

                            <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--        <div class="side-menu__title"> Description </div>-->

                            <!--    </a>-->

                            <!--</li>-->

                            <li>

                                <a href="{{ route('view-category') }}" class="side-menu {{ Request::is('view-category') ? 'sub-menu-active' : '' }}">

                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                                    <div class="side-menu__title">

                                        Category

                                    </div>

                                </a>

                            </li>

                            <!--<li>-->
                            <!--    <a href="javascript:;.html" class="side-menu {{ Request::is('add-roles', 'view-roles','asign-roles') ? 'side-menu--active' : '' }}">-->

                            <!--        <div class="side-menu__icon"> <i data-feather="box"></i> </div>-->

                            <!--        <div class="side-menu__title">-->

                            <!--            Roles-->

                            <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

                            <!--        </div>-->

                            <!--    </a>-->

                            <!--    <ul class="" style="{{ Request::is('add-roles', 'view-roles','asign-roles') ? 'display:block;' : 'display:none;' }}">-->

                            <!--        <li>-->

                            <!--            <a href="{{ route('add-roles') }}" class="side-menu {{ Request::is('add-roles') ? 'sub-menu-active' : '' }}">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title">Add Roles </div>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li>-->

                            <!--            <a href="{{ route('view-roles') }}" class="side-menu {{ Request::is('view-roles') ? 'sub-menu-active' : '' }}">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title"> View Roles </div>-->

                            <!--            </a>-->

                            <!--        </li>-->





                            <!--        <li>-->

                            <!--            <a href="{{ route('assign-roles') }}" class="side-menu {{ Request::is('assign-roles') ? 'sub-menu-active' : '' }}">-->

                            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                            <!--                <div class="side-menu__title"> Assign Roles </div>-->

                            <!--            </a>-->

                            <!--        </li>-->



                            <!--    </ul>-->

                            <!--</li>-->


                    {{--
                            <li>

                                <a href="{{ route('add-autoshop') }}" class="side-menu">

                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                                    <div class="side-menu__title">

                                        Auto Shop

                                    </div>

                                </a>

                            </li> --}}

                            <!-- <li>

                        <a href="{{-- route('Add-labels') --}}" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                        <div class="side-menu__title">

                            Add Labels

                        </div>

                        </a>

                    </li>-->

                    </li>

                </ul>
            </li>
        @endif

        @if($user_meta->job_inquiry == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('add-job-inquiry', 'all-job-inquiry') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                    <div class="side-menu__title">

                        Job Inquiry

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>



                <ul class="" style="{{ Request::is('add-job-inquiry', 'all-job-inquiry') ? 'display:block;' : 'display:none;' }}">

                        <li>

                            <a href="{{ route('add-job-inquiry') }}" class="side-menu {{ Request::is('add-job-inquiry') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Form</div>

                            </a>

                        </li>


                    <li>

                        <a href="{{ route('all-job-inquiry') }}" class="side-menu {{ Request::is('all-job-inquiry') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> View Job Inquiry </div>

                        </a>

                    </li>


                </ul>

            </li>
        @endif

        @if($user_meta->builty == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('add-bilty','view-bilty','view-walkin-builty') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                    <div class="side-menu__title">

                        Builty

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>



                <ul class="" style="{{ Request::is('add-bilty','view-bilty','view-walkin-builty') ? 'display:block;' : 'display:none;' }}">

                        <li>

                            <a href="{{ route('add-bilty') }}" class="side-menu {{ Request::is('add-bilty') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> Add Builty </div>

                            </a>

                        </li>

                    <li>

                        <a href="{{ route('view-bilty') }}" class="side-menu {{ Request::is('view-bilty') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> View Builty </div>

                        </a>

                    </li>


                    <!--@if (Auth::user()->role_id != 2)-->
                    <!--    <li>-->

                    <!--        <a href="{{ route('view-normal-builty') }}" class="side-menu">-->

                    <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                    <!--            <div class="side-menu__title"> Normal Builty </div>-->

                    <!--        </a>-->

                    <!--    </li>-->
                    <!--@endif-->



                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        <li>

                            <a href="{{ route('view-walkin-builty') }}" class="side-menu {{ Request::is('view-walkin-builty') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> View Walkin Builty </div>

                            </a>

                        </li>
                    @endif

                </ul>

            </li>
        @endif



        @if($user_meta->bills == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('add-bills','view-bills','monthly-billing','out-standing-bill') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

                    <div class="side-menu__title">

                        Billing

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="{{ Request::is('add-bills','view-bills','monthly-billing','out-standing-bill') ? 'display:block;' : 'display:none;' }}">

                        <li>

                            <a href="{{ route('add-bills') }}" class="side-menu {{ Request::is('add-bills') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> Add Bill </div>

                            </a>

                        </li>
                    <li>

                        <a href="{{ route('view-bills') }}" class="side-menu {{ Request::is('view-bills') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> View Bill </div>

                        </a>

                    </li>

                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        <li>

                            <a href="{{ url('add-monthly-bill') }}" class="side-menu {{ Request::is('add-monthly-bill') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Add Monthly Billing</div>

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('monthly-billing') }}" class="side-menu {{ Request::is('monthly-billing') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Monthly Billing</div>

                            </a>

                        </li>





                        <li>

                            <a href="{{ url('out-standing-bill') }}" class="side-menu {{ Request::is('out-standing-bill') ? 'sub-menu-active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Out Standing</div>

                            </a>

                        </li>
                    @endif

                </ul>

            </li>
        @endif

        @if($user_meta->container_deposit == 1)
            <li>
                        <a href="javascript:;.html" class="side-menu {{ Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'side-menu--active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                            <div class="side-menu__title">

                                Container Deposit

                                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                            </div>

                        </a>
                        <ul style="{{ Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'display:block;' : 'display:none;' }}">
                            <li>

                            <a href="javascript:;.html" class="side-menu {{ Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'side-menu--active' : '' }}">

                                <div class="side-menu__icon"> <i data-feather="users"></i> </div>

                                <div class="side-menu__title">

                                    Depositor

                                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                </div>

                            </a>

                            <ul class="" style="{{ Request::is('add-depositor', 'view-depositors') ? 'display:block;' : 'display:none;' }}">

                                <li>

                                    <a href="{{ route('add-depositor') }}" class="side-menu {{ Request::is('add-depositor') ? 'sub-menu-active' : '' }}">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title"> Add </div>

                                    </a>

                                </li>
                                 <li>

                                    <a href="{{ route('view-depositors') }}" class="side-menu {{ Request::is('view-depositors') ? 'sub-menu-active' : '' }}">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title"> View </div>

                                    </a>

                                </li>

                            </ul>

                        </li>

                            <li>

                                <a href="javascript:;.html" class="side-menu {{ Request::is('add-initialization','view-initialization') ? 'side-menu--active' : '' }}">

                                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>

                                    <div class="side-menu__title">

                                        Container Delivery Order

                                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                    </div>

                                </a>

                                <ul class="" style="{{ Request::is('add-initialization','view-initialization') ? 'display:block;' : 'display:none;' }}">

                                    <li>

                                        <a href="{{ route('add-initialization') }}" class="side-menu {{ Request::is('add-initialization') ? 'sub-menu-active' : '' }}">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> Add </div>

                                        </a>

                                    </li>
                                    <li>

                                        <a href="{{ route('view-initializations') }}" class="side-menu {{ Request::is('view-initialization') ? 'sub-menu-active' : '' }}">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> View </div>

                                        </a>

                                    </li>

                                </ul>

                            </li>
                            <li>

                                <a href="javascript:;.html" class="side-menu">

                                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>

                                    <div class="side-menu__title">

                                        Refund/Detenetion

                                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                    </div>

                                </a>

                                <ul class="">

                                    <li>

                                        <a href="{{ route('add-refund-detention') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> Add </div>

                                        </a>

                                    </li>
                                     <li>

                                        <a href="{{ route('view-refund-detentions') }}" class="side-menu">

                                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                            <div class="side-menu__title"> View </div>

                                        </a>

                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
        @endif

        @if($user_meta->daily_expenses == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('add-daily-expense', 'view-daily-expense','add-expense-category') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

                    <div class="side-menu__title">

                        Daily Expenses

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="{{ Request::is('add-daily-expense', 'view-daily-expense','add-expense-category') ? 'display:block;' : 'display:none;' }}">

                    <li>

                        <a href="{{ route('add-daily-expense') }}" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Add Daily Expense </div>

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('view-daily-expense') }}" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Expense Reports</div>

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('add-expense-category') }}" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> add expense category</div>

                        </a>

                    </li>

                </ul>

            </li>
        @endif

        @if($user_meta->cash_statement_head_office == 1)
        <li>

            <a href="javascript:;.html" class="side-menu {{ Request::is('add-cash-statment', 'headoffice-report', 'campus-report') ? 'side-menu--active' : '' }}">

                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

                <div class="side-menu__title">

                    Cash Statement Head Office

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>

            <ul class="" style="{{ Request::is('add-cash-statment', 'headoffice-report', 'campus-report') ? 'display:block;' : 'display:none;' }}">

                <li>

                    <a href="{{ route('add-cash-statment') }}" class="side-menu {{ Request::is('add-cash-statement') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Head Office cash statement </div>

                    </a>

                </li>

                <!--<li>-->

                <!--    <a href="{{ route('add-campus') }}" class="side-menu">-->

                <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                <!--        <div class="side-menu__title">Campus Cash Statement</div>-->

                <!--    </a>-->

                <!--</li>-->

                <li>

                    <a href="{{ route('headoffice-report') }}" class="side-menu {{ Request::is('headoffice-report') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Head Office Reports</div>

                    </a>

                </li>

                <li>

                    <a href="{{ route('campus-report') }}" class="side-menu {{ Request::is('campus-report') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Campus Reports</div>

                    </a>

                </li>





                <!-- <li>-->

                <!--   <a href="{{ url('monthly-billing') }}" class="side-menu">-->

                <!--      <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                <!--      <div class="side-menu__title">Monthly Billing</div>-->

                <!--   </a>-->

                <!--</li>-->







            </ul>

        </li>
        @endif

        @if($user_meta->tracking == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('add-tracking', 'add.status') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

                    <div class="side-menu__title">Tracking

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="{{ Request::is('add-tracking', 'add.status') ? 'display:block;' : 'display:none;' }}">

                    <li>

                        <a href="{{ route('add-tracking') }}" class="side-menu {{ Request::is('add-tracking') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Bilty tracking </div>

                        </a>

                    </li>





                    <!--<li>-->

                    <!--    <a href="{{ route('bilty-tracking') }}" class="side-menu">-->

                    <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                    <!--        <div class="side-menu__title"> Bilty tracking </div>-->

                    <!--    </a>-->

                    <!--</li>-->





                    <li>

                        <a href="{{ route('add.status') }}" class="side-menu {{ Request::is('add.status') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Status </div>

                        </a>

                    </li>



                    <!--  -->

                </ul>

            </li>
        @endif

        @if($user_meta->ledger == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('ledger','customer-ledger', 'salary_ledger','emp_ledger','bank_ledger') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                    <div class="side-menu__title">

                        Ledger

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="{{ Request::is('ledger','customer-ledger','broker-ledger','salary_ledger','emp_ledger','bank_ledger') ? 'display:block;' : 'display:none;' }}">

                    <?php    if (Auth::user()->role_id != 2) {?>

                    <li>

                        <a href="{{ url('ledger') }}" class="side-menu {{ Request::is('ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> General Ledger </div>

                        </a>

                    </li>

                    <?php    } ?>

                    <li>

                        <a href="{{ url('customer-ledger') }}" class="side-menu {{ Request::is('customer-ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Customer Ledger </div>

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('broker-ledger') }}" class="side-menu {{ Request::is('broker-ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Broker Ledger </div>

                        </a>

                    </li>

                    <?php    if (Auth::user()->role_id != 2) {?>

                    <li>

                        <a href="{{ url('salary_ledger') }}" class="side-menu {{ Request::is('salary_ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Salary Ledger </div>

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('emp_ledger') }}" class="side-menu {{ Request::is('emp_ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Employee Ledger </div>

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('bank_ledger') }}" class="side-menu {{ Request::is('bank_ledger') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title">Banks Ledger</div>

                        </a>

                    </li>
                    <?php    }?>

                </ul>

            </li>
        @endif


        @if($user_meta->salary == 1)
            <li>

                <a href="javascript:;.html" class="side-menu {{ Request::is('salary') ? 'side-menu--active' : '' }}">

                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                    <div class="side-menu__title">

                        Salary

                        <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="{{ Request::is('salary') ? 'display:block;' : 'display:none;' }}">

                    <li>

                        <a href="{{ url('salary') }}" class="side-menu {{ Request::is('pnl-report-page') ? 'sub-menu-active' : '' }}">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Salary </div>

                        </a>

                    </li>



                </ul>

            </li>
        @endif


        @if($user_meta->hr == 1)
            <li>

            <a href="javascript:;.html" class="side-menu {{ Request::is('admin/employees/create','admin/employees','admin/departments','admin/expenses/create','admin/expenses','admin/holidays','admin/attendances/create','admin/attendances','admin/leavetypes','admin/leave_applications','admin/awards/create','admin/awards') ? 'side-menu--active' : '' }}">

                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                <div class="side-menu__title">

                    HR

                    <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>

            <ul class="" style="{{ Request::is('admin/employees/create','admin/employees','admin/departments','admin/expenses/create','admin/expenses','admin/holidays','admin/attendances/create','admin/attendances','admin/leavetypes','admin/leave_applications','admin/awards/create','admin/awards') ? 'display:block;' : 'display:none;' }}">

                <li>

                    <a href="{{ url('admin/employees/create') }}" class="side-menu {{ Request::is('admin/employees/create') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Employee </div>

                    </a>

                </li>

                <li>

                    <a href="{{ url('admin/employees') }}" class="side-menu {{ Request::is('admin/employees') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Employee </div>

                    </a>

                </li>

                <li>

                    <a href="{{ url('admin/departments') }}" class="side-menu {{ Request::is('admin/departments') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Departments</div>

                    </a>

                </li>



                {{-- <li>

                    <a href="{{ url('admin/expenses/create') }}" class="side-menu {{ Request::is('admin/expenses/create') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Expense </div>

                    </a>

                </li> --}}

                {{-- <li>

                    <a href="{{ url('admin/expenses') }}" class="side-menu {{ Request::is('admin/expenses') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Expense </div>

                    </a>

                </li> --}}



                {{-- <li>

                    <a href="{{ url('admin/holidays') }}" class="side-menu {{ Request::is('admin/holidays') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Holidays </div>

                    </a>

                </li> --}}

                <li>

                    <a href="{{ url('admin/attendances/create') }}" class="side-menu {{ Request::is('admin/attendances/create') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Mark Attendance </div>

                    </a>

                </li>



                <li>

                    <a href="{{ url('admin/attendances') }}" class="side-menu {{ Request::is('admin/attendances') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Attendance </div>

                    </a>

                </li>

                <li>

                    <a href="{{ url('admin/leavetypes') }}" class="side-menu {{ Request::is('admin/leavetypes') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Leave Types </div>

                    </a>

                </li>

                <li>

                    <a href="{{ url('admin/leave_applications') }}" class="side-menu {{ Request::is('admin/leave_applications') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Leave Applications </div>

                    </a>

                </li>



                <li>

                    <a href="{{ url('admin/awards/create') }}" class="side-menu {{ Request::is('admin/awards/create') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Awards </div>

                    </a>

                </li>

                <li>

                    <a href="{{ url('admin/awards') }}" class="side-menu {{ Request::is('admin/awards') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Awards </div>

                    </a>

                </li>





            </ul>

        </li>
        @endif

        @if($user_meta->accounts == 1)
            <li>

            <a href="javascript:;.html" class="side-menu {{ Request::is('banks', 'bank_service', 'addpettycash', 'addpettycashledger','add-heads','nill-labour-payment') ? 'side-menu--active' : '' }}">

                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>

                <div class="side-menu__title">

                    Accounts

                    <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>

            <ul style="{{ Request::is('banks', 'bank_service', 'addpettycash', 'addpettycashledger','add-heads','nill-labour-payment') ? 'display:block;' : 'display:none;' }}">

                <li>

                    <a href="javascript:;.html" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>

                        <div class="side-menu__title">

                            Bank Form

                            <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                        </div>

                    </a>

                    <ul class="">



                        <li>

                            <a href="{{ url('banks') }}" class="side-menu">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Banks</div>

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('bank_service') }}" class="side-menu">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title">Banks Services Charges</div>

                            </a>

                        </li>



                    </ul>

                </li>

                <li>

                    <a href="javascript:;.html" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>

                        <div class="side-menu__title">

                            Petty Cash

                            <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                        </div>

                    </a>

                    <ul class="">

                        <li>

                            <a href="{{ url('addpettycash') }}" class="side-menu">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> Add Petty Cash </div>

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('addpettycashledger') }}" class="side-menu">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> Petty Cash Transfer</div>

                            </a>

                        </li>



                    </ul>

                </li>





                <li>

                    <a href="{{ route('add-heads') }}" class="side-menu {{ Request::is('add-heads') ? 'sub-menu-active' : '' }}" >

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Head </div>

                    </a>

                </li>

                <li>

                    <a href="{{ route('nill-labour-payment') }}" class="side-menu {{ Request::is('nill-labour-payment') ? 'sub-menu-active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Maintain Accounts </div>

                    </a>

                </li>









            </ul>

        </li>
        @endif

        @if($user_meta->received_paid == 1)
            <li class="{{ Request::is('manage-paid-receiving') ? 'side-menu--active' : '' }}">
                <a href="javascript:;" class="side-menu {{ Request::is('manage-paid-receiving') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Received & Paid
                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                    </div>
                </a>

                <ul class="{{ Request::is('manage-paid-receiving') ? 'menu-open' : '' }}" style="{{ Request::is('manage-paid-receiving') ? 'display:block;' : 'display:none;' }}">
                    <li>
                        <a href="{{ url('manage-paid-receiving') }}" class="side-menu {{ Request::is('manage-paid-receiving') ? 'sub-menu-active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Manage Received & Paid </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('user-management-permissions-page') }}" class="side-menu {{ Request::is('user-management-permissions-page') ? 'sub-menu-active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title">User Management System </div>
                        </a>
                    </li>

                </ul>
            </li>
        @endif

        @if($user_meta->user_rights == 1)
          <li>

                    <a href="javascript:;" class="side-menu {{ Request::is('userRole') ? 'side-menu--active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>

                        <div class="side-menu__title"> User Rights

                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                        </div>

                    </a>

                    <ul class="" style="{{ Request::is('userRole') ? 'display:block;' : 'display:none;' }}">

                        <li>

                            <a href="{{ url('userRole') }}" class="side-menu">

                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                <div class="side-menu__title"> Roles </div>

                            </a>

                        </li>

                    </ul>

                </li>
        @endif

        {{-- @if($user_meta->reports == 1) --}}
             <li class="">

                    <a href="javascript:;" class="side-menu {{ Request::is('manager-wise-report-page', 'customer-wise-report-page', 'station-wise-report-page', 'broker-wise-report-page', 'pnl-report-page','all-customer-pnl-report-page','customer-pnl-report-page','cdo-report-page') ? 'side-menu--active' : '' }}">

                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>

                        <div class="side-menu__title"> Reports

                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                        </div>

                    </a>

                    <ul class="" style="{{ Request::is('manager-wise-report-page', 'customer-wise-report-page', 'station-wise-report-page', 'broker-wise-report-page', 'pnl-report-page','all-customer-pnl-report-page','customer-pnl-report-page','cdo-report-page') ? 'display:block;' : 'display:none;' }}">

                        <li>
                            <a href="{{ url('manager-wise-report-page') }}" class="side-menu {{ Request::is('manager-wise-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Manager Wise Report </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('customer-wise-report-page') }}" class="side-menu {{ Request::is('customer-wise-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Customer Wise Report </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('station-wise-report-page') }}" class="side-menu {{ Request::is('station-wise-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Station Wise Report </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('broker-wise-report-page') }}" class="side-menu {{ Request::is('broker-wise-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Broker Wise Report </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('pnl-report-page') }}" class="side-menu {{ Request::is('pnl-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> PNL Report </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('customer-pnl-report-page') }}" class="side-menu {{ Request::is('customer-pnl-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title">Customer Based PNL </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('all-customer-pnl-report-page') }}" class="side-menu {{ Request::is('all-customer-pnl-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title">All Customer Based PNL </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('cdo-report-page') }}" class="side-menu {{ Request::is('cdo-report-page') ? 'sub-menu-active' : '' }}">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title">CDO Report </div>
                            </a>
                        </li>

                    </ul>

            </li>
        {{-- @endif --}}

</nav>
