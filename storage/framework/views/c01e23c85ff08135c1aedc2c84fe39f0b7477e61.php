<style>
.side-nav > ul > li > .side-menu:not(.side-menu--active):hover .side-menu__icon:before {
    background-color: #000 !important;
}

.sub-menu-active {
    background-color: #f0f0f0; /* Example active background color */
    color: #aa1c1c !important; /* Example active text color */
}
</style>
<?php
    $user = auth()->user()->id;
    $user_meta = DB::table('user_meta')->where('fk_user_id',$user)->first();
?>
<nav class="side-nav">

    <a href="<?php echo e(route('home')); ?>" class="intro-x flex items-center pl-5 pt-4">

        <img alt="" class="logo-Class"
            <?php if(isset(session('company')[0]->logo)): ?> src="<?php echo e(asset('selfcompany_image/' . session('company')[0]->logo)); ?>" <?php endif; ?>>



    </a>

    <div class="side-nav__devider my-6"></div>

    <ul>
        <?php
            $company = session('company');
            $companyId = $company[0]->id;
        ?>
        <li>

            <a href="<?php echo e(route('dashboard', ['id' => $companyId])); ?>" class="side-menu ">

                <div class="side-menu__icon"> <i data-feather="home"></i> </div>

                <div class="side-menu__title">

                    Dashboard

                </div>

            </a>

        </li>
        <li>

            <a href="<?php echo e(route('videos.form', ['id' => $companyId])); ?>" class="side-menu ">

                <div class="side-menu__icon"> <i data-feather="home"></i> </div>

                <div class="side-menu__title">

                    Tutorial

                </div>

            </a>

        </li>

    <?php if($user_meta->setup == 1): ?>
        <li>

            <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('addPickupPoint','addShippingLine','add-customer','add-broker','addvehicleType','add-station','add-package','view-category','self-company','add-roles','view-roles','assign-roles') ? 'side-menu--active' : ''); ?>">

                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>

                <div class="side-menu__title">

                    Setup

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>
            <ul style="<?php echo e(Request::is('addPickupPoint', 'addShippingLine','add-customer','add-broker','addvehicleType','add-station','add-package','view-category','self-company','add-roles','view-roles','assign-roles') ? 'display:block;' : 'display:none;'); ?>">

                        
                        <li>
                            <a href="<?php echo e(route('addPickupPoint')); ?>" class="side-menu <?php echo e(Request::is('addPickupPoint') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                <div class="side-menu__title">
                                    Pickup Point
                                    <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('addShippingLine')); ?>" class="side-menu <?php echo e(Request::is('addShippingLine') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                <div class="side-menu__title">
                                    Shipping Line
                                    <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add-customer')); ?>" class="side-menu <?php echo e(Request::is('add-customer') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                <div class="side-menu__title">
                                    Customer
                                    <!--<div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add-broker')); ?>" class="side-menu <?php echo e(Request::is('add-broker') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                <div class="side-menu__title">
                                    Broker
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('addvehicleType')); ?>" class="side-menu <?php echo e(Request::is('addVehicleType') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                                <div class="side-menu__title">
                                    Vehicle Category
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add-station')); ?>" class="side-menu <?php echo e(Request::is('add-station') ? 'sub-menu-active' : ''); ?>">
                                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                                <div class="side-menu__title">
                                    Station
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('add-package')); ?>" class="side-menu <?php echo e(Request::is('add-package') ? 'sub-menu-active' : ''); ?>">
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

                            <ul class="" style="<?php echo e(Request::is('customer-profile', 'add.status') ? 'display:block;' : 'display:none;'); ?>">

                                <li>

                                    <a href="<?php echo e(route('customer-profile')); ?>" class="side-menu">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title">

                                            Add Customer Profile

                                        </div>

                                    </a>

                                </li>

                                <li>

                                    <a href="<?php echo e(route('view-customer-ratelist')); ?>" class="side-menu">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title">

                                            View Customer Profile

                                        </div>

                                    </a>

                                </li>

                                <li>

                                    <a href="<?php echo e(route('edit-rate')); ?>" class="side-menu">

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

                        <!--            <a href="<?php echo e(route('add-inventory')); ?>" class="side-menu">-->

                        <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--                <div class="side-menu__title"> Add Inventory </div>-->

                        <!--            </a>-->

                        <!--        </li>-->

                        <!--        <li>-->

                        <!--            <a href="<?php echo e(route('add-warehouse')); ?>" class="side-menu">-->

                        <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--                <div class="side-menu__title"> Add Vendor </div>-->

                        <!--            </a>-->

                        <!--        </li>-->

                        <!--        <li>-->

                        <!--            <a href="<?php echo e(route('add-packing')); ?>" class="side-menu">-->

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

                        <!--         <a href="<?php echo e(route('add-ratelist')); ?>" class="side-menu">-->

                        <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--            <div class="side-menu__title"> Add Rate List </div>-->

                        <!--         </a>-->

                        <!--      </li>-->

                        <?php    // }
                        ?>

                        <!--      <li>-->

                        <!--         <a href="<?php echo e(route('view-ratelist')); ?>" class="side-menu">-->

                        <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--            <div class="side-menu__title"> View Rate List </div>-->

                        <!--         </a>-->

                        <!--      </li>-->

                        <!--   </ul>-->

                        <!--</li>-->

                        




                        

                        <li>

                            <a href="<?php echo e(route('self-company')); ?>" class="side-menu <?php echo e(Request::is('self-company') ? 'sub-menu-active' : ''); ?>">

                                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                                <div class="side-menu__title">

                                    Self Company

                                </div>

                            </a>

                        </li>



                        <!--<li>-->

                        <!--    <a href="<?php echo e(route('add-description')); ?>" class="side-menu">-->

                        <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--        <div class="side-menu__title"> Description </div>-->

                        <!--    </a>-->

                        <!--</li>-->

                        <li>

                            <a href="<?php echo e(route('view-category')); ?>" class="side-menu <?php echo e(Request::is('view-category') ? 'sub-menu-active' : ''); ?>">

                                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                                <div class="side-menu__title">

                                    Category

                                </div>

                            </a>

                        </li>

                        <!--<li>-->
                        <!--    <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-roles', 'view-roles','asign-roles') ? 'side-menu--active' : ''); ?>">-->

                        <!--        <div class="side-menu__icon"> <i data-feather="box"></i> </div>-->

                        <!--        <div class="side-menu__title">-->

                        <!--            Roles-->

                        <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

                        <!--        </div>-->

                        <!--    </a>-->

                        <!--    <ul class="" style="<?php echo e(Request::is('add-roles', 'view-roles','asign-roles') ? 'display:block;' : 'display:none;'); ?>">-->

                        <!--        <li>-->

                        <!--            <a href="<?php echo e(route('add-roles')); ?>" class="side-menu <?php echo e(Request::is('add-roles') ? 'sub-menu-active' : ''); ?>">-->

                        <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--                <div class="side-menu__title">Add Roles </div>-->

                        <!--            </a>-->

                        <!--        </li>-->

                        <!--        <li>-->

                        <!--            <a href="<?php echo e(route('view-roles')); ?>" class="side-menu <?php echo e(Request::is('view-roles') ? 'sub-menu-active' : ''); ?>">-->

                        <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--                <div class="side-menu__title"> View Roles </div>-->

                        <!--            </a>-->

                        <!--        </li>-->





                        <!--        <li>-->

                        <!--            <a href="<?php echo e(route('assign-roles')); ?>" class="side-menu <?php echo e(Request::is('assign-roles') ? 'sub-menu-active' : ''); ?>">-->

                        <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

                        <!--                <div class="side-menu__title"> Assign Roles </div>-->

                        <!--            </a>-->

                        <!--        </li>-->



                        <!--    </ul>-->

                        <!--</li>-->


                

                        <!-- <li>

                    <a href="" class="side-menu">

                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

                    <div class="side-menu__title">

                        Add Labels

                    </div>

                    </a>

                </li>-->

                </li>

            </ul>
        </li>
    <?php endif; ?>

    <?php if($user_meta->job_inquiry == 1): ?>
        <li>

            <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-job-inquiry', 'all-job-inquiry') ? 'side-menu--active' : ''); ?>">

                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                <div class="side-menu__title">

                    Job Inquiry

                    <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>



            <ul class="" style="<?php echo e(Request::is('add-job-inquiry', 'all-job-inquiry') ? 'display:block;' : 'display:none;'); ?>">

                    <li>

                        <a href="<?php echo e(route('add-job-inquiry')); ?>" class="side-menu <?php echo e(Request::is('add-job-inquiry') ? 'sub-menu-active' : ''); ?>">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title">Form</div>

                        </a>

                    </li>


                <li>

                    <a href="<?php echo e(route('all-job-inquiry')); ?>" class="side-menu <?php echo e(Request::is('all-job-inquiry') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Job Inquiry </div>

                    </a>

                </li>


            </ul>

        </li>
    <?php endif; ?>

    <?php if($user_meta->builty == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-bilty','view-bilty','view-walkin-builty') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

            <div class="side-menu__title">

                Builty

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>



        <ul class="" style="<?php echo e(Request::is('add-bilty','view-bilty','view-walkin-builty') ? 'display:block;' : 'display:none;'); ?>">

                <li>

                    <a href="<?php echo e(route('add-bilty')); ?>" class="side-menu <?php echo e(Request::is('add-bilty') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Builty </div>

                    </a>

                </li>

            <li>

                <a href="<?php echo e(route('view-bilty')); ?>" class="side-menu <?php echo e(Request::is('view-bilty') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> View Builty </div>

                </a>

            </li>


            <!--<?php if(Auth::user()->role_id != 2): ?>-->
            <!--    <li>-->

            <!--        <a href="<?php echo e(route('view-normal-builty')); ?>" class="side-menu">-->

            <!--            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

            <!--            <div class="side-menu__title"> Normal Builty </div>-->

            <!--        </a>-->

            <!--    </li>-->
            <!--<?php endif; ?>-->



            <?php if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2): ?>
                <li>

                    <a href="<?php echo e(route('view-walkin-builty')); ?>" class="side-menu <?php echo e(Request::is('view-walkin-builty') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> View Walkin Builty </div>

                    </a>

                </li>
            <?php endif; ?>

        </ul>

    </li>
    <?php endif; ?>



    <?php if($user_meta->bills == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-bills','view-bills','monthly-billing','out-standing-bill') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

            <div class="side-menu__title">

                Billing

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul class="" style="<?php echo e(Request::is('add-bills','view-bills','monthly-billing','out-standing-bill') ? 'display:block;' : 'display:none;'); ?>">

                <li>

                    <a href="<?php echo e(route('add-bills')); ?>" class="side-menu <?php echo e(Request::is('add-bills') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Bill </div>

                    </a>

                </li>
            <li>

                <a href="<?php echo e(route('view-bills')); ?>" class="side-menu <?php echo e(Request::is('view-bills') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> View Bill </div>

                </a>

            </li>

            <?php if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2): ?>
                <li>

                    <a href="<?php echo e(url('add-monthly-bill')); ?>" class="side-menu <?php echo e(Request::is('add-monthly-bill') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Add Monthly Billing</div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(url('monthly-billing')); ?>" class="side-menu <?php echo e(Request::is('monthly-billing') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Monthly Billing</div>

                    </a>

                </li>





                <li>

                    <a href="<?php echo e(url('out-standing-bill')); ?>" class="side-menu <?php echo e(Request::is('out-standing-bill') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Out Standing</div>

                    </a>

                </li>
            <?php endif; ?>

        </ul>

    </li>
    <?php endif; ?>

    <?php if($user_meta->container_deposit == 1): ?>
        <li>
                    <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'side-menu--active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                        <div class="side-menu__title">

                            Container Deposit

                            <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                        </div>

                    </a>
                    <ul style="<?php echo e(Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'display:block;' : 'display:none;'); ?>">
                        <li>

                        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-depositor', 'view-depositors', 'add-initialization', 'view-initializations', 'add-refund-detention','view-refund-detentions') ? 'side-menu--active' : ''); ?>">

                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>

                            <div class="side-menu__title">

                                Depositor

                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                            </div>

                        </a>

                        <ul class="" style="<?php echo e(Request::is('add-depositor', 'view-depositors') ? 'display:block;' : 'display:none;'); ?>">

                            <li>

                                <a href="<?php echo e(route('add-depositor')); ?>" class="side-menu <?php echo e(Request::is('add-depositor') ? 'sub-menu-active' : ''); ?>">

                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                    <div class="side-menu__title"> Add </div>

                                </a>

                            </li>
                             <li>

                                <a href="<?php echo e(route('view-depositors')); ?>" class="side-menu <?php echo e(Request::is('view-depositors') ? 'sub-menu-active' : ''); ?>">

                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                    <div class="side-menu__title"> View </div>

                                </a>

                            </li>

                        </ul>

                    </li>

                        <li>

                            <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-initialization','view-initialization') ? 'side-menu--active' : ''); ?>">

                                <div class="side-menu__icon"> <i data-feather="users"></i> </div>

                                <div class="side-menu__title">

                                    Container Delivery Order

                                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                                </div>

                            </a>

                            <ul class="" style="<?php echo e(Request::is('add-initialization','view-initialization') ? 'display:block;' : 'display:none;'); ?>">

                                <li>

                                    <a href="<?php echo e(route('add-initialization')); ?>" class="side-menu <?php echo e(Request::is('add-initialization') ? 'sub-menu-active' : ''); ?>">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title"> Add </div>

                                    </a>

                                </li>
                                <li>

                                    <a href="<?php echo e(route('view-initializations')); ?>" class="side-menu <?php echo e(Request::is('view-initialization') ? 'sub-menu-active' : ''); ?>">

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

                                    <a href="<?php echo e(route('add-refund-detention')); ?>" class="side-menu">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title"> Add </div>

                                    </a>

                                </li>
                                 <li>

                                    <a href="<?php echo e(route('view-refund-detentions')); ?>" class="side-menu">

                                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                                        <div class="side-menu__title"> View </div>

                                    </a>

                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
    <?php endif; ?>



    <?php if (isset(session('company')[0]->id) && session('company')[0]->id == 1) {
    if (!empty($daily_labour_payment) && $daily_labour_payment == 1) { ?>

    <!--<li>-->

    <!--    <a href="javascript:;.html" class="side-menu">-->

    <!--        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>-->

    <!--        <div class="side-menu__title">-->

    <!--            Daily Labour Payment-->

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

    <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

    <!--        </div>-->

    <!--    </a>-->

    <!--    <ul class="">-->









     <!--        <li>-->

    <!--            <a href="<?php echo e(route('add-labour-payment')); ?>" class="side-menu">-->

    <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--                <div class="side-menu__title"> add Daily Payment </div>-->

    <!--            </a>-->

    <!--        </li>-->





            <!-- <li>

    <!-        <a href="<?php echo e(route('add-container')); ?>" class="side-menu">-->

    <!--           <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--           <div class="side-menu__title"> add container</div>-->

    <!--        </a>-->

    <!--     </li>-->

    <!--        <li>-->

    <!--            <a href="<?php echo e(route('reports-data')); ?>" class="side-menu">-->

    <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--                <div class="side-menu__title">Reports</div>-->

    <!--            </a>-->

    <!--        </li>-->



    <!--    </ul>-->

    <!--</li>-->

    <?php    }
} ?>

    <?php if($user_meta->daily_expenses == 1): ?>
        <li>

            <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-daily-expense', 'view-daily-expense','add-expense-category') ? 'side-menu--active' : ''); ?>">

                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

                <div class="side-menu__title">

                    Daily Expenses

                    <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>

            <ul class="" style="<?php echo e(Request::is('add-daily-expense', 'view-daily-expense','add-expense-category') ? 'display:block;' : 'display:none;'); ?>">

                <li>

                    <a href="<?php echo e(route('add-daily-expense')); ?>" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Add Daily Expense </div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(route('view-daily-expense')); ?>" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Expense Reports</div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(route('add-expense-category')); ?>" class="side-menu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> add expense category</div>

                    </a>

                </li>

            </ul>

        </li>
    <?php endif; ?>

    <?php if($user_meta->cash_statement_head_office == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-cash-statment', 'headoffice-report', 'campus-report') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

            <div class="side-menu__title">

                Cash Statement Head Office

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul class="" style="<?php echo e(Request::is('add-cash-statment', 'headoffice-report', 'campus-report') ? 'display:block;' : 'display:none;'); ?>">

            <li>

                <a href="<?php echo e(route('add-cash-statment')); ?>" class="side-menu <?php echo e(Request::is('add-cash-statement') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title">Head Office cash statement </div>

                </a>

            </li>

            <!--<li>-->

            <!--    <a href="<?php echo e(route('add-campus')); ?>" class="side-menu">-->

            <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

            <!--        <div class="side-menu__title">Campus Cash Statement</div>-->

            <!--    </a>-->

            <!--</li>-->

            <li>

                <a href="<?php echo e(route('headoffice-report')); ?>" class="side-menu <?php echo e(Request::is('headoffice-report') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title">Head Office Reports</div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(route('campus-report')); ?>" class="side-menu <?php echo e(Request::is('campus-report') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title">Campus Reports</div>

                </a>

            </li>





            <!-- <li>-->

            <!--   <a href="<?php echo e(url('monthly-billing')); ?>" class="side-menu">-->

            <!--      <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

            <!--      <div class="side-menu__title">Monthly Billing</div>-->

            <!--   </a>-->

            <!--</li>-->







        </ul>

    </li>
    <?php endif; ?>


    <!--<li>

      <a href="javascript:;.html" class="side-menu">

         <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

         <div class="side-menu__title">

        Invoice



            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

         </div>

      </a>

      <ul class="">

         <li>

            <a href="<?php echo e(route('invoices')); ?>" class="side-menu">

               <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

               <div class="side-menu__title"> Purchase Invoice </div>

            </a>

         </li>



      </ul>

   </li>-->



    <?php if($user_meta->tracking == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('add-tracking', 'add.status') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

            <div class="side-menu__title">Tracking

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul class="" style="<?php echo e(Request::is('add-tracking', 'add.status') ? 'display:block;' : 'display:none;'); ?>">

            <li>

                <a href="<?php echo e(route('add-tracking')); ?>" class="side-menu <?php echo e(Request::is('add-tracking') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Bilty tracking </div>

                </a>

            </li>





            <!--<li>-->

            <!--    <a href="<?php echo e(route('bilty-tracking')); ?>" class="side-menu">-->

            <!--        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

            <!--        <div class="side-menu__title"> Bilty tracking </div>-->

            <!--    </a>-->

            <!--</li>-->





            <li>

                <a href="<?php echo e(route('add.status')); ?>" class="side-menu <?php echo e(Request::is('add.status') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Status </div>

                </a>

            </li>



            <!--  -->

        </ul>

    </li>
    <?php endif; ?>



    <!-- <li>

      <a href="javascript:;.html" class="side-menu">

         <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>

         <div class="side-menu__title">

         Inventory

            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

         </div>

      </a>

      <ul class="">

         <li>

            <a href="<?php echo e(route('data-inventory')); ?>" class="side-menu">

               <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

               <div class="side-menu__title"> Sale Inventory </div>

            </a>

         </li>

         <li>

            <a href="<?php echo e(route('purchase-inventory')); ?>" class="side-menu">

               <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

               <div class="side-menu__title"> Purchase Inventory  </div>

            </a>

         </li>

         <li>

            <a href="<?php echo e(route('extra-inventory')); ?>" class="side-menu">

               <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

               <div class="side-menu__title"> Add Extra Inventory </div>

            </a>

         </li>

      </ul>

   </li>-->

    <!--     <li>-->

    <!--    <a href="javascript:;.html" class="side-menu">-->

    <!--        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>-->

    <!--        <div class="side-menu__title">-->

    <!--            Own Vehicle Trip-->

    <!--             <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

    <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

    <!--        </div>-->

    <!--    </a>-->

    <!--    <ul class="">-->

    <!--        <li>-->

    <!--            <a href="<?php echo e(route('Add-CommissionBook')); ?>" class="side-menu">-->

    <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--                <div class="side-menu__title"> Add Own Vehicle Trip </div>-->

    <!--            </a>-->

    <!--        </li>-->

    <!--        <li>-->

    <!--            <a href="<?php echo e(route('showcommissionbook')); ?>" class="side-menu">-->

    <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--                <div class="side-menu__title"> View Own Vehicle Trip </div>-->

    <!--            </a>-->

    <!--        </li>-->

    <!--        <li>-->

    <!--        <a href="#" class="side-menu">-->

    <!--           <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

    <!--           <div class="side-menu__title"> Employee Report  </div>-->

    <!--        </a>-->

    <!--     </li>-->-->

    <!--    </ul>-->

    <!--</li>-->

    <?php if($user_meta->ledger == 1): ?>
        <li>

            <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('ledger','customer-ledger', 'salary_ledger','emp_ledger','bank_ledger') ? 'side-menu--active' : ''); ?>">

                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

                <div class="side-menu__title">

                    Ledger

                    <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                </div>

            </a>

            <ul class="" style="<?php echo e(Request::is('ledger','customer-ledger','broker-ledger','salary_ledger','emp_ledger','bank_ledger') ? 'display:block;' : 'display:none;'); ?>">

                <?php    if (Auth::user()->role_id != 2) {?>

                <li>

                    <a href="<?php echo e(url('ledger')); ?>" class="side-menu <?php echo e(Request::is('ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> General Ledger </div>

                    </a>

                </li>

                <?php    } ?>

                <li>

                    <a href="<?php echo e(url('customer-ledger')); ?>" class="side-menu <?php echo e(Request::is('customer-ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Customer Ledger </div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(url('broker-ledger')); ?>" class="side-menu <?php echo e(Request::is('broker-ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Broker Ledger </div>

                    </a>

                </li>

                <?php    if (Auth::user()->role_id != 2) {?>

                <li>

                    <a href="<?php echo e(url('salary_ledger')); ?>" class="side-menu <?php echo e(Request::is('salary_ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Salary Ledger </div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(url('emp_ledger')); ?>" class="side-menu <?php echo e(Request::is('emp_ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title"> Employee Ledger </div>

                    </a>

                </li>

                <li>

                    <a href="<?php echo e(url('bank_ledger')); ?>" class="side-menu <?php echo e(Request::is('bank_ledger') ? 'sub-menu-active' : ''); ?>">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                        <div class="side-menu__title">Banks Ledger</div>

                    </a>

                </li>
                <?php    }?>

            </ul>

        </li>
    <?php endif; ?>


    <?php if($user_meta->salary == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('salary') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>

            <div class="side-menu__title">

                Salary

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul class="" style="<?php echo e(Request::is('salary') ? 'display:block;' : 'display:none;'); ?>">

            <li>

                <a href="<?php echo e(url('salary')); ?>" class="side-menu <?php echo e(Request::is('pnl-report-page') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Salary </div>

                </a>

            </li>



        </ul>

    </li>
    <?php endif; ?>


    <?php if($user_meta->hr == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('admin/employees/create','admin/employees','admin/departments','admin/expenses/create','admin/expenses','admin/holidays','admin/attendances/create','admin/attendances','admin/leavetypes','admin/leave_applications','admin/awards/create','admin/awards') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>

            <div class="side-menu__title">

                HR

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul class="" style="<?php echo e(Request::is('admin/employees/create','admin/employees','admin/departments','admin/expenses/create','admin/expenses','admin/holidays','admin/attendances/create','admin/attendances','admin/leavetypes','admin/leave_applications','admin/awards/create','admin/awards') ? 'display:block;' : 'display:none;'); ?>">

            <li>

                <a href="<?php echo e(url('admin/employees/create')); ?>" class="side-menu <?php echo e(Request::is('admin/employees/create') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Add Employee </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(url('admin/employees')); ?>" class="side-menu <?php echo e(Request::is('admin/employees') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> View Employee </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(url('admin/departments')); ?>" class="side-menu <?php echo e(Request::is('admin/departments') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title">Departments</div>

                </a>

            </li>



            

            



            

            <li>

                <a href="<?php echo e(url('admin/attendances/create')); ?>" class="side-menu <?php echo e(Request::is('admin/attendances/create') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Mark Attendance </div>

                </a>

            </li>



            <li>

                <a href="<?php echo e(url('admin/attendances')); ?>" class="side-menu <?php echo e(Request::is('admin/attendances') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> View Attendance </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(url('admin/leavetypes')); ?>" class="side-menu <?php echo e(Request::is('admin/leavetypes') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Leave Types </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(url('admin/leave_applications')); ?>" class="side-menu <?php echo e(Request::is('admin/leave_applications') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Leave Applications </div>

                </a>

            </li>



            <li>

                <a href="<?php echo e(url('admin/awards/create')); ?>" class="side-menu <?php echo e(Request::is('admin/awards/create') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Add Awards </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(url('admin/awards')); ?>" class="side-menu <?php echo e(Request::is('admin/awards') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> View Awards </div>

                </a>

            </li>





        </ul>

    </li>
    <?php endif; ?>

    <?php if($user_meta->accounts == 1): ?>
        <li>

        <a href="javascript:;.html" class="side-menu <?php echo e(Request::is('banks', 'bank_service', 'addpettycash', 'addpettycashledger','add-heads','nill-labour-payment') ? 'side-menu--active' : ''); ?>">

            <div class="side-menu__icon"> <i data-feather="trello"></i> </div>

            <div class="side-menu__title">

                Accounts

                <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->

                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

            </div>

        </a>

        <ul style="<?php echo e(Request::is('banks', 'bank_service', 'addpettycash', 'addpettycashledger','add-heads','nill-labour-payment') ? 'display:block;' : 'display:none;'); ?>">

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

                        <a href="<?php echo e(url('banks')); ?>" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title">Banks</div>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo e(url('bank_service')); ?>" class="side-menu">

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

                        <a href="<?php echo e(url('addpettycash')); ?>" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Add Petty Cash </div>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo e(url('addpettycashledger')); ?>" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Petty Cash Transfer</div>

                        </a>

                    </li>



                </ul>

            </li>





            <li>

                <a href="<?php echo e(route('add-heads')); ?>" class="side-menu <?php echo e(Request::is('add-heads') ? 'sub-menu-active' : ''); ?>" >

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Add Head </div>

                </a>

            </li>

            <li>

                <a href="<?php echo e(route('nill-labour-payment')); ?>" class="side-menu <?php echo e(Request::is('nill-labour-payment') ? 'sub-menu-active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                    <div class="side-menu__title"> Maintain Accounts </div>

                </a>

            </li>









        </ul>

    </li>
    <?php endif; ?>

    <?php if($user_meta->received_paid == 1): ?>
        <li class="<?php echo e(Request::is('manage-paid-receiving') ? 'side-menu--active' : ''); ?>">
            <a href="javascript:;" class="side-menu <?php echo e(Request::is('manage-paid-receiving') ? 'side-menu--active' : ''); ?>">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> Received & Paid
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>

            <ul class="<?php echo e(Request::is('manage-paid-receiving') ? 'menu-open' : ''); ?>" style="<?php echo e(Request::is('manage-paid-receiving') ? 'display:block;' : 'display:none;'); ?>">
                <li>
                    <a href="<?php echo e(url('manage-paid-receiving')); ?>" class="side-menu <?php echo e(Request::is('manage-paid-receiving') ? 'sub-menu-active' : ''); ?>">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Manage Received & Paid </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('user-management-permissions-page')); ?>" class="side-menu <?php echo e(Request::is('user-management-permissions-page') ? 'sub-menu-active' : ''); ?>">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">User Management System </div>
                    </a>
                </li>

            </ul>
        </li>
    <?php endif; ?>

    <?php if($user_meta->user_rights == 1): ?>
      <li>

                <a href="javascript:;" class="side-menu <?php echo e(Request::is('userRole') ? 'side-menu--active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>

                    <div class="side-menu__title"> User Rights

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="<?php echo e(Request::is('userRole') ? 'display:block;' : 'display:none;'); ?>">

                    <li>

                        <a href="<?php echo e(url('userRole')); ?>" class="side-menu">

                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>

                            <div class="side-menu__title"> Roles </div>

                        </a>

                    </li>

                </ul>

            </li>
    <?php endif; ?>

    
        <li class="">

                <a href="javascript:;" class="side-menu <?php echo e(Request::is('manager-wise-report-page', 'customer-wise-report-page', 'station-wise-report-page', 'broker-wise-report-page', 'pnl-report-page','all-customer-pnl-report-page','customer-pnl-report-page','cdo-report-page') ? 'side-menu--active' : ''); ?>">

                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>

                    <div class="side-menu__title"> Reports

                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>

                    </div>

                </a>

                <ul class="" style="<?php echo e(Request::is('manager-wise-report-page', 'customer-wise-report-page', 'station-wise-report-page', 'broker-wise-report-page', 'pnl-report-page','all-customer-pnl-report-page','customer-pnl-report-page','cdo-report-page') ? 'display:block;' : 'display:none;'); ?>">

                    <li>
                        <a href="<?php echo e(url('manager-wise-report-page')); ?>" class="side-menu <?php echo e(Request::is('manager-wise-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Manager Wise Report </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(url('customer-wise-report-page')); ?>" class="side-menu <?php echo e(Request::is('customer-wise-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Customer Wise Report </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(url('station-wise-report-page')); ?>" class="side-menu <?php echo e(Request::is('station-wise-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Station Wise Report </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(url('broker-wise-report-page')); ?>" class="side-menu <?php echo e(Request::is('broker-wise-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Broker Wise Report </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(url('pnl-report-page')); ?>" class="side-menu <?php echo e(Request::is('pnl-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> PNL Report </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('customer-pnl-report-page')); ?>" class="side-menu <?php echo e(Request::is('customer-pnl-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title">Customer Based PNL </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('all-customer-pnl-report-page')); ?>" class="side-menu <?php echo e(Request::is('all-customer-pnl-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title">All Customer Based PNL </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('cdo-report-page')); ?>" class="side-menu <?php echo e(Request::is('cdo-report-page') ? 'sub-menu-active' : ''); ?>">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title">CDO Report </div>
                        </a>
                    </li>

                </ul>

            </li>
    
            <!--<li>-->

            <!--    <a href="javascript:;" class="side-menu">-->

            <!--        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>-->

            <!--        <div class="side-menu__title"> Customer Login Rights-->

            <!--            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>-->

            <!--        </div>-->

            <!--    </a>-->

            <!--    <ul class="">-->

            <!--        <li>-->

            <!--            <a href="<?php echo e(url('manage-customer-rights')); ?>" class="side-menu">-->

            <!--                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->

            <!--                <div class="side-menu__title"> Manage Rights </div>-->

            <!--            </a>-->

            <!--        </li>-->

            <!--    </ul>-->

            <!--</li>-->
<script>

</script>
</nav>
<?php /**PATH H:\xamp_7.2.5\htdocs\projects\software2\sms\resources\views/includes/side-nav.blade.php ENDPATH**/ ?>