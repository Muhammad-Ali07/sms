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
     <div id="dialog-confirm">
  <div class="message">Are you sure?</div>
  <div class="buttons">
    <a class="cancel" href="#">Cancel</a>
    <a class="ok" href="#">Ok</a>
  </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
   <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Input -->
      <div class="intro-y box mb-5">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              Add Heads
            </h2>
         </div>
         <form method="post" autocomplete="off" action="{{route('office_report')}}">
            @csrf
            <div id="input" class="p-5">
               <div class="preview">
                  <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                     <div class="col-span-4 positon-relative">
                        <label for="txtBox" class="form-label">Select Office</label>
                        <select id="office_id" name="office_id" class="form-control" required="required">
                          <option value="">Please Select Banks</option>
                          <option value="all">All Offices</option>
                        </select>
                     </div>
                     <button  class="btn btn-danger mt-5 ml-5">Generate Reports</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="intro-y box">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               Add Office Details
            </h2>
         </div>
         <?php
			if(isset($office[0]->office_id)){
				$form = url('updateOffice');
			}else{
				$form = url('newOffice');
			}
			?>
			
         <form method="post" autocomplete="off" action="{{$form}}">
            @csrf
            <input type="hidden" value="<?php if(isset($office[0]->office_id)){echo $office[0]->office_id; } ?>" name="id" />
            <div id="input" class="p-5">
               <div class="preview">
                  <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Date</label>
                         <input value={{date("Y-m-d")}} type="date" name="date" id="datepicker1" value="<?php if(isset($office[0]->office_date)){echo date('Y-m-d',strtotime($office[0]->office_date)); } ?>" class="form-control">
                     </div>
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Office Name</label>
                        <input type="text" name="name" required id="name" value="<?php if(isset($office[0]->office_name)){echo $office[0]->office_name;} ?>" class="form-control">
                     </div>
                  </div>
                  <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Office Address</label>
                         <input type="text" name="address" required id="address" value="<?php if(isset($office[0]->office_address)){echo $office[0]->office_address;} ?>" class="form-control">
                     </div>
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Office Contact</label>
                        <input type="text" name="contact" id="contact" value="<?php if(isset($office[0]->office_contact)){echo $office[0]->office_contact;} ?>" class="form-control">
                     </div>
                  </div>
                  <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Contact Person Name</label>
                        <input type="text" name="cpname" required id="cpname" value="<?php if(isset($office[0]->office_contact_person)){echo $office[0]->office_contact_person;} ?>" class="form-control">
                     </div>
                     <div class="col-span-6 positon-relative">
                        <label for="txtBox" class="form-label">Contact Person Contact</label>
                         <input type="text" name="cpcontact" required id="cpcontact" value="<?php if(isset($office[0]->office_contact_person_number)){echo $office[0]->office_contact_person_number;} ?>" class="form-control">
                     </div>
                  </div>
                  <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                     <div class="col-span-6 positon-relative Cnic">
                        <label for="txtBox" class="form-label">Cnic</label>
                        <input type="text" name="cnic" id="cnic" value="<?php if(isset($office[0]->cnic)){echo $office[0]->cnic;} ?>" class="form-control">
                     </div>
                  </div>
                  <button class="btn btn-danger mt-5">Reset</button>
                  <button class="btn btn-danger mt-5 ml-2">Add Office</button>
               </div>
            </div>
         </form>
      </div>
     

      <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
               <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                  <h2 class="font-medium text-base mr-auto">
                   View All Current Offices
                  </h2>
                  <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                     <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                     <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                     </div> -->
               </div>
               <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
               <div id="input" class="p-5">
                  <div class="preview">
                     <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Date</th>
                              <th>Office</th>
                              <th>Address</th>
                              <th>Office&nbsp;Contact</th>
                              <th>Contact&nbsp;Person&nbsp;Name</th>
                              <th>Contact&nbsp;Person&nbsp;Number</th>
                              <th>CNIC</th>
                              <th>Office&nbsp;Balance</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                       	<tbody>
                <?php $serial = 0; ?>
								@foreach($offices as $row)
                <?php $serial += 1; ?>
								<tr>
									<td>{{$row->office_id}}</td>
									<td>{{$row->office_date}}</td>
									<td>{{$row->office_name}}</td>
									<td>{{$row->office_address}}</td>
									<td>{{$row->office_contact}}</td>
									<td>{{$row->office_contact_person}}</td>
									<td>{{$row->office_contact_person_number}}</td>
									<td>{{$row->cnic}}</td>
                  <td>{{$row->office_balance}}</td>
									<td>
                    <?php if($edition == 1){?>
					            <a href="<?php echo url('editOffice/'.$row->office_id);?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil"></i></a>
                    <?php }else{ ?>
                      <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                        <i class="fa fa-pencil"></i>
                      </a>
                    <?php } ?>
										|||
                    <?php if($deletion == 1){?>
					            <a href="<?php echo url('removeOffice/'.$row->office_id);?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
                    <?php }else{ ?>
                      <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                        <i class="fa fa-times"></i>
                      </a>
                    <?php } ?>
									</td>
								</tr>
                <script>
                $(document).ready(function(){
                  $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                      e.preventDefault();
                      $("#dialog-confirm").dialog("close");
                  });
                  $("#datatable").on("click","#showBox<?php echo $serial; ?>",function(e){
                      e.preventDefault();
                      $("#dialog-confirm")
                      .dialog("option", "title", "Please Confirm")
                      .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                  });
                });
                </script>
                <script>
                $(document).ready(function(){
                  $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                      e.preventDefault();
                      $("#dialog-confirm").dialog("close");
                  });
                  $("#datatable").on("click","#showBox2<?php echo $serial; ?>",function(e){
                      e.preventDefault();
                      $("#dialog-confirm")
                      .dialog("option", "title", "Please Confirm")
                      .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                  });
                });
                </script>
								@endforeach
							</tbody>
                     </table>
                  </div>
               </div>
            </div>
            <!-- END: Input -->
            <!-- BEGIN: Input Sizing -->
         </div>
      </div>
   </div>
</div>
