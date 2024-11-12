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
               Builty Form
            </h2>
         </div>
         <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
               <!-- BEGIN: Input -->
               <div class="intro-y box">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                     <h2 class="font-medium text-base mr-auto">
                        Builty
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
                           <?php
                              if(isset($edit_user[0]->id)){
                                $form = url('updateUser');
                              }else{
                                $form = url('addNewUser');
                              }
                              ?>
                              
                           <form method="post" action="{{$form}}">
                              <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                              <input type="hidden" value="<?php if(isset($edit_user[0]->id)){echo $edit_user[0]->id;} ?>" name="id" />
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                 <div class="x_panel">
                                    <div class="x_title">
                                       <h2>Create a New User</h2>
                                       <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                       <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                          @if(Session::has('message')) 
                                          <div class="alert alert-success"> {{Session::get('message')}} </div>
                                          @endif
                                          @if(Session::has('error')) 
                                          <div class="alert alert-danger"> {{Session::get('error')}} </div>
                                          @endif
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Username
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="text" name="username" id="username" value="<?php if(isset($edit_user[0]->name)){ echo $edit_user[0]->name; }?>" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Email
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="text" name="email" id="email" value="<?php if(isset($edit_user[0]->email)){ echo $edit_user[0]->email; }?>" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Password
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="password" name="password" id="password" <?php if(isset($edit_user[0]->password)){ echo 'readonly'; }?>  class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Confirm Password
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="password" name="confirm_password" id="confirm_password" <?php if(isset($edit_user[0]->password)){ echo 'readonly'; }?> class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <?php if(isset($edit_user[0]->password)){ ?>
                                          <div class="clearfix"></div>
                                          <div class="ln_solid"></div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                             <span class="btn btn-primary" id="showPass">Change Password</span>
                                          </div>
                                          
                                          <?php } ?>
                                          <div class="clearfix"></div>
                                          <div class="x_title">
                                             <h2>Navigation to be Displayed</h2>
                                             <br/>
                                             <div class="clearfix"></div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Setup
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="setup" <?php if(isset($edit_user_meta[0]->setup)){if($edit_user_meta[0]->setup == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Builty
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="builty" <?php if(isset($edit_user_meta[0]->builty)){if($edit_user_meta[0]->builty == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Challan
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="challan" <?php if(isset($edit_user_meta[0]->challan)){if($edit_user_meta[0]->challan == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Commission Book
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="commission_book" <?php if(isset($edit_user_meta[0]->commsion_book)){if($edit_user_meta[0]->commsion_book == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Billing
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="bills" <?php if(isset($edit_user_meta[0]->bills)){if($edit_user_meta[0]->bills == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Container Deposit
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="container_deposit" <?php if(isset($edit_user_meta[0]->container_deposit)){if($edit_user_meta[0]->container_deposit == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                          <!-- <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">-->
                                          <!--   <label class="control-label col-md-5 col-sm-5 col-xs-12">Daily Labour Payment-->
                                          <!--   </label>-->
                                          <!--   <div class="col-md-7 col-sm-7 col-xs-12">-->
                                          <!--      <input type="checkbox" class="flat" name="daily_labour_payment" <?php  if(isset($edit_user_meta[0]->daily_labour_payment)){if($edit_user_meta[0]->daily_labour_payment == 1){echo 'checked'; }}?>/>-->
                                          <!--   </div>-->
                                          <!--</div>-->
                                          
                                          
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Daily Expenses
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="daily_expenses" <?php  if(isset($edit_user_meta[0]->daily_expenses)){if($edit_user_meta[0]->daily_expenses == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Cash Statement Head Office
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="cash_statement_head_office" <?php  if(isset($edit_user_meta[0]->cash_statement_head_office)){if($edit_user_meta[0]->cash_statement_head_office == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                          
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12">Tracking
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="tracking" <?php  if(isset($edit_user_meta[0]->tracking)){if($edit_user_meta[0]->tracking == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                           <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">-->
                                           <!--  <label class="control-label col-md-5 col-sm-5 col-xs-12" >Own Vehicle Trip-->
                                           <!--  </label>-->
                                           <!--  <div class="col-md-7 col-sm-7 col-xs-12">-->
                                           <!--     <input type="checkbox" class="flat" name="own_vehicle_trip" <?php  if(isset($edit_user_meta[0]->own_vehicle_trip)){if($edit_user_meta[0]->own_vehicle_trip == 1){echo 'checked'; }}?>/>-->
                                           <!--  </div>-->
                                           <!-- </div>-->
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Ledger
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="ledger" <?php  if(isset($edit_user_meta[0]->ledger)){if($edit_user_meta[0]->ledger == 1){echo 'checked'; }}?>/>
                                             </div>
                                            </div>
                                            
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" >Salary
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="salary" <?php  if(isset($edit_user_meta[0]->salary)){if($edit_user_meta[0]->salary == 1){echo 'checked'; }}?>/>
                                             </div>
                                            </div>
                                            
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">HR
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="hr" <?php if(isset($edit_user_meta[0]->hr)){if($edit_user_meta[0]->hr == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Accounts
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="accounts" <?php if(isset($edit_user_meta[0]->accounts)){if($edit_user_meta[0]->accounts == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Received & Paid
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="received_paid" <?php  if(isset($edit_user_meta[0]->received_paid)){if($edit_user_meta[0]->received_paid == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">User Rights
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="user_rights" <?php  if(isset($edit_user_meta[0]->user_rights)){if($edit_user_meta[0]->user_rights == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                             <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Reports
                                             </label>
                                             <div class="col-md-7 col-sm-7 col-xs-12">
                                                <input type="checkbox" class="flat" name="reports" <?php  if(isset($edit_user_meta[0]->reports)){if($edit_user_meta[0]->reports == 1){echo 'checked'; }}?>/>
                                             </div>
                                          </div>
                                          
                        <div class="x_title">
                           <h2>Credentials to be Autherized</h2>
                           <div class="clearfix"></div>
                        </div>
                        <!--<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                           <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Wazir
                           </label>
                           <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="checkbox" class="flat" name="other_auth" <?php // if(isset($edit_user[0]->wazir) && $edit_user[0]->wazir == 1){ echo "checked"; } ?> />
                           </div>
                        </div>-->
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                           <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Add
                           </label>
                           <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="checkbox" class="flat" name="add" <?php  if(isset($edit_user_meta[0]->insertion)){if($edit_user_meta[0]->insertion == 1){echo 'checked'; }}?>/>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                           <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Edit
                           </label>
                           <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="checkbox" class="flat" name="edit" <?php  if(isset($edit_user_meta[0]->edition)){if($edit_user_meta[0]->edition == 1){echo 'checked'; }}?>/>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                           <label class="control-label col-md-5 col-sm-5 col-xs-12" for="first-name">Delete
                           </label>
                           <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="checkbox" class="flat" name="delete" <?php if(isset($edit_user_meta[0]->deletion)){if($edit_user_meta[0]->deletion == 1){echo 'checked'; }}?>/>
                           </div>
                        </div>
                        
                                          
                                            <div class="form-group">
                           <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <input type="submit" name="insertdata" class="btn btn-success" value="Save">
                           </div>
                        </div>
                        
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           
                           <div class="col-md-12 col-sm-12 col-xs-12" style="overflow: auto;">
                              <div class="x_panel">
                                 <div class="x_title">
                                    <h2>Current User's in Software Permissions Review</h2>
                                    <div class="clearfix"></div>
                                 </div>
                                 <div class="x_content">
                                    <table id="datatable" class="table table-responsive table-bordered table-striped">
                                       <thead>
                                          <tr>
                                             <th>Username</th>
                                             <th>Email</th>
                                            
                                             <th>Setup</th>
                                             <th> Builty </th>
                                             <th>Challan</th>
                                              <th>Commission Book</th>
                                               <th>Billing</th>
                                              <th>Container Deposit</th>

                                             <th>Vehicle Payment Voucher</th>
                                            
                                            
                                            <th>Daily Expenses</th>
                                            <th>Cash Statement Head Office</th>
                                            <th>Tracking</th>
                                            <!--<th>Own Vehicle Trip</th>-->
                                            <th>Ledger</th>
                                            <th>Salary</th>
                                             <th>HR</th>
                                             <th>Accounts</th>
                                          <th>Received & Paid</th>
                                        <th>User Rights</th>
                                          <th>Reports</th>

                                             <th>Add</th>
                                             <th>Edit</th>
                                             <th>Delete</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($users as $row)
                                          <tr>
                                             <td align="center">{{$row->name}}</td>
                                             <td align="center">{{$row->email}}</td>
                                             <?php
                                                foreach($user_meta as $res){
                                                  if($row->id == $res->fk_user_id){
                                                ?>
                                             <td align="center">
                                                <span class="<?php if($res->setup == null || $res->setup == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->setup == null || $res->setup == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->builty == null || $res->builty == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->builty == null || $res->builty == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                              <td align="center">
                                                <span class="<?php if($res->challan == null || $res->challan == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->challan == null || $res->challan == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                              <td align="center">
                                                <span class="<?php if(empty($res->commsion_book)){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if(empty($res->commsion_book)){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->bills == null || $res->bills == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->bills == null || $res->bills == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             <td align="center">
                                                <span class="<?php if($res->container_deposit == null || $res->container_deposit == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->container_deposit == null || $res->container_deposit == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <!--<td align="center">-->
                                             <!--   <span class="<?php if($res->daily_labour_payment == null || $res->daily_labour_payment == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">-->
                                             <!--   <?php if($res->daily_labour_payment == null || $res->daily_labour_payment == ''){ echo 'No'; }else{ echo 'Yes';} ?>-->
                                             <!--   </span>-->
                                             <!--</td>-->
                                             
                                             
                                             
                                             <td align="center">
                                                <span class="<?php if($res->daily_expenses == null || $res->daily_expenses == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->daily_expenses == null || $res->daily_expenses == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->cash_statement_head_office == null || $res->cash_statement_head_office == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->cash_statement_head_office == null || $res->cash_statement_head_office == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->tracking == null || $res->tracking == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->tracking == null || $res->tracking == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <!--<td align="center">-->
                                             <!--   <span class="<?php if($res->own_vehicle_trip == null || $res->own_vehicle_trip == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">-->
                                             <!--   <?php if($res->own_vehicle_trip == null || $res->own_vehicle_trip == ''){ echo 'No'; }else{ echo 'Yes';} ?>-->
                                             <!--   </span>-->
                                             <!--</td>-->
                                            
                                            <td align="center">
                                                <span class="<?php if($res->ledger == null || $res->ledger == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->ledger == null || $res->ledger == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->salary == null || $res->salary == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->salary == null || $res->salary == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             
                                             <td align="center">
                                                <span class="<?php if(empty($res->hr)){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if(empty($res->hr)){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             <td align="center">
                                                <span class="<?php if(empty($res->accounts)){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if(empty($res->accounts)){ echo 'No'; } else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                            
                                            <td align="center">
                                                <span class="<?php if($res->received_paid == null || $res->received_paid == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->received_paid == null || $res->received_paid == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                            <td align="center">
                                                <span class="<?php if($res->user_rights == null || $res->user_rights == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->user_rights == null || $res->user_rights == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                            <td align="center">
                                                <span class="<?php if($res->reports == null || $res->reports == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->reports == null || $res->reports == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             
                                             <td align="center">
                                                <span class="<?php if($res->insertion == null || $res->insertion == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->insertion == null || $res->insertion == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             <td align="center">
                                                <span class="<?php if($res->edition == null || $res->edition == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->edition == null || $res->edition == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             <td align="center">
                                                <span class="<?php if($res->deletion == null || $res->deletion == ''){ echo 'label label-danger'; }else{ echo 'label label-success'; }?>">
                                                <?php if($res->deletion == null || $res->deletion == ''){ echo 'No'; }else{ echo 'Yes';} ?>
                                                </span>
                                             </td>
                                             <?php }} ?>
                                             <td>
                                                <a href="<?php echo url('editUserControls/'.$row->id); ?>"><i class="fa fa-pencil"></i></a>
                                                |||
                                                <a href="<?php echo url('removeUser/'.$row->id); ?>"><i class="fa fa-times"></i></a>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="clearfix"></div>
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
@endsection
@section('script')
<script>
   
         $(document).ready(function(){
           $('#showPass').click(function(){
             $('#password').attr('readonly',false);
             $('#confirm_password').attr('readonly',false);
             $('#confirm_password').val('');
             $('#password').val('');
           });
         });
</script>
@endsection