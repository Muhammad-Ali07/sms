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
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
               <!-- END: Breadcrumb -->
               <!-- BEGIN: Search -->
               <div class="intro-x relative mr-3 sm:mr-6">
                  <div class="search hidden sm:block">
                     <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
                     <i data-feather="search" class="search__icon dark:text-gray-300"></i> 
                  </div>
                  <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                  <div class="search-result">
                     <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center">
                              <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                              <div class="ml-3">Mail Settings</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                              <div class="ml-3">Users & Permissions</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                              <div class="ml-3">Transactions Report</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              </div>
                              <div class="ml-3">Charlize Theron</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">charlizetheron@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              </div>
                              <div class="ml-3">Al Pacino</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                           </div>
                           <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-12.jpg">
                           </div>
                           <div class="ml-3">Samsung Q90 QLED TV</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                           </div>
                           <div class="ml-3">Nike Air Max 270</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
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
                  <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                  <div class="notification-content pt-2 dropdown-menu">
                     <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Notifications -->
               <!-- BEGIN: Account Menu -->
               <div class="intro-x dropdown w-8 h-8">
                  <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                     <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
                  </div>
                  <div class="dropdown-menu w-56">
                     <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                           <div class="font-medium">Charlize Theron</div>
                           <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                        </div>
                        <div class="p-2">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
       
       <form>
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                   Daily Cash Form 
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                             Cash Receipt
                           </h2>
                         
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-6 mt-5">
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Document Date</label>
                                <input type="date"  class="form-control form-control-round" name="document_date" id="document_date" placeholder="Enter Document Date">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Document Serial No</label>
                            <input type="text"  class="form-control form-control-round"  name="docserial" id="exdocserial" placeholder="Enter Document Serial No">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Transaction Type</label>
<input type="text"  class="form-control form-control-round"name="transtype" id="transtype" placeholder="Enter Transaction Type">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">GL Account</label>
	<input type="text" name="ref" class="form-control form-control-round">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Reference</label>
	<input type="text" name="ref" class="form-control form-control-round">
                              </div>
                              <div class="col-span-6 mt-2">
                                                                <label for="regular-form-6" class="form-label">Account Title</label>
                            <select name="customer_id"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                            	<option value="">Select account title</option>
                            	@foreach($customers as $customer)
                            	<option value="{{$customer->id}}"> {{$customer->customer_name}} </option>
                            	@endforeach
                            </select>                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Narration</label>
<input type="text"  class="form-control form-control-round" name="description" id="description" placeholder="Enter Narration">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Amount</label>
<input type="text" class="form-control form-control-round"  name="amount" id="amount" placeholder="Enter Amount">
                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Bank</label>
<input type="checkbox" name="chktype" id="chktype"  style="height:30px;width:20%">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Bank Name</label>
                        	<select class="form-control form-control-round" name="bank_id" id="bank">
                        				<option value="">Select Bank</option>
                        				@foreach($banks as $bank)
                        				<option value="{{$bank->id}}"> {{ $bank->name }} </option>
                        				@endforeach
                        			</select>                              </div>
                              </div>
                              <button class="btns_save btn btn-primary mt-5">Submit</button>
                              <div type="reset" class="btn btn-primary mt-5 btns_reset" >Reset</div>
             
       <div id="input" class="p-5">
                           <div class="preview">
                              <table id="example" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>

                                    	<th>S.No</th>
                                    	<th>Document Date</th>
                                    	<th>Document Serial No</th>
                                    	<th>Transaction Type</th>
                                    	<th>GL Account</th>
                                    	<th>Account title </th>
                                    
                                    <!-- 	<th>Narration</th> -->
                                    	<th>Amount (Rs)</th>
                                    	<th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($cash_reciepts as $key => $cash_reciept)
                                    <tr>
                                    
                                    	<th scope="row">{{ $key }}</th>
                                    	<td>{{$cash_reciept->doc_date}}</td>
                                    	<td>{{$cash_reciept->doc_serial}}</td>
                                    	<td>{{$cash_reciept->transtype}}</td>
                                    	<td>{{$cash_reciept->gl_account}}</td>
                                    
                                    	<td>{{$cash_reciept->ref_account}}</td>
                                    	<!-- <td></td> -->
                                    	<td>{{$cash_reciept->amount}}</td>
                                    
                                    <td>
                                    
                                    <a href=""><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
                                    
                                    <a href=""><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
                                    
                                    <a href=""><i class="fa fa-trash"></i></a>                                                                </td>
                                    
                                    </tr>
                                    @endforeach
                                 </tbody>
                                 <tfoot>
                                     <tr>

                                	<th>S.No</th>
                                	<th>Document Date</th>
                                	<th>Document Serial No</th>
                                	<th>Transaction Type</th>
                                	<th>GL Account</th>
                                	<th>Account title </th>
                                
                                <!-- 	<th>Narration</th> -->
                                	<th>Amount (Rs)</th>
                                	<th>Actions</th>
                                </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                           </div>
                        </div>
                     </div>
       
       
       
       
       
       
       
       
<!--<h4>Cash Receipt</h4>-->

<!--</div>-->

<!--<div class="card-block">-->

<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Document Date</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="date"  class="form-control form-control-round" name="document_date" id="document_date" placeholder="Enter Document Date">-->

<!--</div>-->



<!--<label class="col-sm-2 col-form-label">Document Serial No</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="text"  class="form-control form-control-round"  name="docserial" id="exdocserial" placeholder="Enter Document Serial No">-->

<!--</div>    -->

<!--</div> -->





<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Transaction Type</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="text"  class="form-control form-control-round"name="transtype" id="transtype" placeholder="Enter Transaction Type">-->
<!--</div>-->



<!--<label class="col-sm-2 col-form-label">GL Account</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="text" class="form-control form-control-round" name="gl" id="gl"  placeholder="Enter GL Account">-->

<!--</div>    -->

<!--</div> -->





<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Reference</label>-->

<!--<div class="col-sm-4">-->
<!--	<input type="text" name="ref" class="form-control form-control-round">-->
<!--</div>-->

<!--  <label class="col-sm-2 col-form-label">Account Title</label>-->

<!--<div class="col-sm-4">-->


<!--<select name="customer_id"  class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">-->
<!--	<option value="">Select account title</option>-->
<!--	@foreach($customers as $customer)-->
<!--	<option value="{{$customer->id}}"> {{$customer->customer_name}} </option>-->
<!--	@endforeach-->
<!--</select>-->
<!--</div>   -->

<!--</div> -->





<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Narration</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="text"  class="form-control form-control-round" name="description" id="description" placeholder="Enter Narration">-->

<!--</div>-->



<!--<label class="col-sm-2 col-form-label">Amount</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="text" class="form-control form-control-round"  name="amount" id="amount" placeholder="Enter Amount">-->

<!--</div>    -->

<!--</div> -->



<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Bank</label>-->

<!--<div class="col-sm-4">-->

<!--<input type="checkbox" name="chktype" id="chktype"  style="height:30px;width:20%">-->

<!--</div>-->


<!--</div> -->
<!--<div class="form-group row" id="bank_div" style="display: none;">-->
<!--		<label class="col-sm-2 col-form-label">Bank Name</label>-->
<!--		<div class="col-sm-4">-->
<!--			<select class="form-control form-control-round" name="bank_id" id="bank">-->
<!--				<option value="">Select Bank</option>-->
<!--				@foreach($banks as $bank)-->
<!--				<option value="{{$bank->id}}"> {{ $bank->name }} </option>-->
<!--				@endforeach-->
<!--			</select>-->
<!--		</div>-->
<!--	</div>-->





<!--<br>-->

<!--<div class="form-group row">-->

<!--<label class="col-sm-4 col-form-label"></label>-->

<!--<div class="col-sm-2">-->

<!--<button type="Reset" style="" class="btns_reset" >Reset</button>-->

<!--</div>-->



<!--<label class="col-sm-1 col-form-label"></label>-->

<!--<div class="col-sm-2">-->

<!--<button type="submit" style="" class="btns_save">Save</button>-->

<!--</div>    -->

<!--</div>-->



<!--</form>-->





<!--</div>-->

<!--</div>-->

<!-- Basic Form Inputs card end -->

<!--</div>-->

<!--</div>-->



<!--</div>                       -->

<!--</div>-->
<!--</form>-->
<!--<div class="container">-->

<!--<div class="container-fluid">-->

<!--<div class="row">-->



<!--<div class="col-sm-12">-->

<!-- Basic Form Inputs card start -->

<!--<div class="card">-->

<!--<div class="card-header">-->

<!--<h4>View Cash Receipt</h4>-->

<!--</div>-->

<!--<div class="card-block">-->

<!--<div class="card-block table-border-style">-->

<!--<div class="table-responsive">-->

<!--<table class="table">-->

<!--<thead>-->

<!--<tr>-->

<!--	<th>S.No</th>-->
<!--	<th>Document Date</th>-->
<!--	<th>Document Serial No</th>-->
<!--	<th>Transaction Type</th>-->
<!--	<th>GL Account</th>-->
<!--	<th>Account title </th>-->
<!--	<th>Reference</th>-->
<!-- 	<th>Narration</th> -->
<!--	<th>Amount (Rs)</th>-->
<!--	<th>Actions</th>-->
<!--</tr>-->

<!--</thead>-->

<!--<tbody>-->
<!--@foreach($cash_reciepts as $key => $cash_reciept)-->
<!--<tr>-->

<!--	<th scope="row">{{ $key }}}</th>-->
<!--	<td>{{$cash_reciept->doc_date}}}</td>-->
<!--	<td>{{$cash_reciept->doc_serial}}</td>-->
<!--	<td>{{$cash_reciept->transtype}}</td>-->
<!--	<td>{{$cash_reciept->gl_account}}</td>-->
<!--	
<!--	<td>{{$cash_reciept->ref_account}}</td>-->
	<!-- <td></td> -->
<!--	<td>{{$cash_reciept->amount}}</td>-->

<!--<td>-->

<!--<a href=""><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;-->

<!--<a href=""><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;-->

<!--<a href=""><i class="fa fa-trash"></i></a>                                                                </td>-->

<!--</tr>-->
<!--@endforeach-->


<!--</tbody>-->

<!--</table>-->

<!--</div>-->

<!--</div>-->



<!--</div>-->

<!--</div>-->

<!-- Basic Form Inputs card end -->

<!--</div>-->

<!--</div>-->



<!--</div>                       -->

<!--</div>-->

<!--</div>-->

<!--</div>-->

<!--</div>-->

<!--</div>-->

<!--</div>-->



<!-- Warning Section Starts -->


<script type="text/javascript">

// Returns true if checked, false if unchecked.
	$(document).ready(function(){
		$(document).on('change','#chktype',function(){
			if($('input[type=checkbox]').prop('checked') == true){
				$('#bank_div').show();
			}else{
				$('#bank_div').hide();
				$('#bank').val('');
			}
		});
 	});
</script>
@section('script')
<script type="text/javascript">
$(function () {
	$('#datetimepicker1').datetimepicker();
});
</script>

</div>

@endsection



@endsection