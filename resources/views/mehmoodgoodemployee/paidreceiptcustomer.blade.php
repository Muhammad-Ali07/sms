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
           @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
  @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
  @if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
  @if ($errors->any())
    <div class="alert alert-danger">
     <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </ul>
    </div>
  @endif
<div style="display: none" id="myElem" class="alert alert-info"> {{"Your enter amount is lesser than actual amount therefore your amount will go in balance"}} </div> 

 <form enctype="multipart/form-data" action="{{ route('createpaidreceipt') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">
 <input type="hidden" value="{{ csrf_token() }}" name="_token" />
 <meta name="csrf-token" content="{{csrf_token()}}">

            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Paid Receipt Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                        Paid Receipt Customer
                           </h2>
                         
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-6 mt-5">
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Customer Type</label>
                                   <select value="{{ old('customer_type') }}" onchange="getcustomertype(this)" id="customer_type" name="customer_type"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Customer Type</option>
<option value="Paid">Paid</option>
<option value="ToPay">ToPay</option>

</select>
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Date</label>
  <input value="{{date("d-m-Y")}}"  required type="text" class="form-control form-control-round txtDate"  name="date"  >
                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Select Customer</label>
<select value="{{ old('customer_id') }}" onchange="getcustomerbalance(this)"   name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >
  <option value="">Select Customer Name</option>
   @foreach($customer as $value)
   <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>
   @endforeach
                               
   </select>                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Previous Balance</label>
<select value="{{ old('paymenttype') }}" onchange="getpaymenttype(this)"  name="paymenttype" id="paymenttype"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Payment Type</option>
@foreach($paymenttype as $value)
<option value="{{$value->id}}">{{$value->name}}</option>
@endforeach
</select>                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Payment Type</label>
<select value="{{ old('paymenttype') }}" onchange="getpaymenttype(this)"  name="paymenttype" id="paymenttype"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Payment Type</option>
@foreach($paymenttype as $value)
<option value="{{$value->id}}">{{$value->name}}</option>
@endforeach
</select>                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Balance</label>
 <input value="{{ old('balance') }}" readonly="true" type="text"  id="balance" name="balance" class="form-control form-control-round" placeholder="Enter Balance" >
                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Bank</label>
<select value="{{ old('bankid') }}" name="bankid" id="bankid" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
<option value="">Select Bank</option>
@foreach($bank_accounts as $value)
      <option value="{{$value->id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}} | {{$value->branch->name}}</option>
    @endforeach
</select>                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Cheque No</label>
 <input value="{{ old('chequeno') }}"  type="text"  id="chequeno" name="chequeno" class="form-control form-control-round" placeholder="Enter Cheque no" >
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Amount</label>
 <input value="{{ old('amount') }}" type="text" id="amount" onchange="changeamount()" name="amount"  class="form-control form-control-round" placeholder="Enter Amount">
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Total Amount</label>
 <input value="{{ old('billamount') }}" readonly="true" type="text" id="billamount" name="billamount"  class="form-control form-control-round" placeholder="Enter Amount">
                              </div>
                              </div>
                              <button id="showbill" type="button" onclick="myFunction()" class="btn btn-primary mt-5 btns_save">Show Bill</button>
                               <div id="dynamics">
 <table class="table table-bordered" id="dynamic_field" >

</table>
                               <button id="savebutton" class="btn btn-primary mt-5">Save</button>
                              <div class="btn btn-primary mt-5" id="Reset">Reset</div>
                              <div id="input" class="p-5">
                           <div class="preview">
                              <table id="example" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                <th>S.No</th>
                                
                                
                                <th>Customer Name</th>
                                <th>Date</th>
                                
                                <th>Enter Amount</th>
                                <th>Actions</th>
                                </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($records))
                                        @foreach($records as $key=>$value)
                                        <tr>
                                        
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->date ??''}}</td>
                                        <td>{{$value->getcustomer[0]->customer_name ??''}}</td>
                                        <td>{{$value->enter_amount ??''}}</td>
                                        <td>
                                         <a href="{{url('/mehmoodgoodemployee/pdf/'.$value->id)}}" target="blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;
                                         <a href="{{url('/mehmoodgoodemployee/viewpaidreceipt/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;
                                          <a href="{{url('/mehmoodgoodemployee/editpaidreceipt/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
                                          
                                            <a id="deletepaidreceipt" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>     
                                           </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                        <th>S.No</th>
                                        
                                        
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        
                                        <th>Enter Amount</th>
                                        <th>Actions</th>
                                        </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
            </form>
         </div>

        </div>
        
        
        
        
<!--<h4>Paid Receipt</h4>-->
<!--<div class="col-sm-3 col-sm-push-4">-->
<!--  <span id="customerbalance"></span>-->
<!--</div>-->
<!--</div>-->
<!--<div class="card-block">-->
<!--  @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif-->
<!--  @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif-->
<!--  @if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif-->
<!--  @if ($errors->any())-->
<!--    <div class="alert alert-danger">-->
<!--     <ul>-->
<!--            @foreach ($errors->all() as $error)-->
<!--                <li>{{ $error }}</li>-->
<!--            @endforeach-->
<!--    </ul>-->
<!--    </div>-->
<!--  @endif-->
<!--<div style="display: none" id="myElem" class="alert alert-info"> {{"Your enter amount is lesser than actual amount therefore your amount will go in balance"}} </div> -->

<!-- <form enctype="multipart/form-data" action="{{ route('createpaidreceipt') }}" method="post" class="bg-white post-form-validation topay-normal" id="post-form-validation" enctype="multipart/form-data">-->
<!-- <input type="hidden" value="{{ csrf_token() }}" name="_token" />-->
<!-- <meta name="csrf-token" content="{{csrf_token()}}">-->

<!--<div class="form-group row">-->

<!--<label class="col-sm-2 col-form-label">Customer Type</label>-->
<!--<div class="col-sm-4">-->
<!--<select value="{{ old('customer_type') }}" onchange="getcustomertype(this)" id="customer_type" name="customer_type"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">-->
<!--<option value="">Select Customer Type</option>-->
<!--<option value="Paid">Paid</option>-->
<!--<option value="ToPay">ToPay</option>-->

<!--</select>-->

<!--  </div>  -->
<!--   <label class="col-sm-2 col-form-label">Date</label>-->
<!--  <div class="col-sm-2">-->
<!--  <input value="{{date("d-m-Y")}}"  required type="text" class="form-control form-control-round txtDate"  name="date"  >-->
<!--  </div>   -->
<!--</div>    -->


<!--<div class="form-group row">-->
<!--<label class="col-sm-2 col-form-label">Select Customer</label>-->
<!--<div class="col-sm-4">-->
<!-- <select value="{{ old('customer_id') }}" onchange="getcustomerbalance(this)"   name="customer_id" id="customer_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary" >-->
<!--  <option value="">Select Customer Name</option>-->
<!--   @foreach($customer as $value)-->
<!--   <option value="{{$value->id}}" {{!empty(old('sender_name')) && old('sender_name')==$value->id?"selected":''}}>{{$value->customer_name}}</option>-->
<!--   @endforeach-->
                               
<!--   </select>-->
<!--</div>-->
<!--<label class="col-sm-2 col-form-label">Previous Balance</label>-->
<!--<div class="col-sm-4">-->
<!-- <input value="{{ old('prevbalance') }}" readonly="true" type="text"  id="prevbalance" name="prevbalance" class="form-control form-control-round" placeholder="Enter Balance" >-->
<!--</div>   -->
<!--</div> -->

<!--<div class="form-group row">-->
<!--<label class="col-sm-2 col-form-label">Payment Type</label>-->
<!--<div class="col-sm-4">-->
<!--<select value="{{ old('paymenttype') }}" onchange="getpaymenttype(this)"  name="paymenttype" id="paymenttype"class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">-->
<!--<option value="">Select Payment Type</option>-->
<!--@foreach($paymenttype as $value)-->
<!--<option value="{{$value->id}}">{{$value->name}}</option>-->
<!--@endforeach-->
<!--</select></div>-->

<!--<label class="col-sm-2 col-form-label">Balance</label>-->
<!--<div class="col-sm-4">-->
<!-- <input value="{{ old('balance') }}" readonly="true" type="text"  id="balance" name="balance" class="form-control form-control-round" placeholder="Enter Balance" >-->
<!--</div>    -->
<!--</div> -->

<!--<div id="bank"  class="form-group row" style="display: none">-->
<!--<label class="col-sm-2 col-form-label">Bank</label>-->
<!--<div class="col-sm-4">-->
<!--<select value="{{ old('bankid') }}" name="bankid" id="bankid" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">-->
<!--<option value="">Select Bank</option>-->
<!--@foreach($bank_accounts as $value)-->
<!--      <option value="{{$value->id}}" data-id="{{ \Crypt::encrypt($value->id) }}">{{$value->branch->bank->name}} | {{$value->branch->name}}</option>-->
<!--    @endforeach-->
<!--</select></div>-->

<!--<label class="col-sm-2 col-form-label">Cheque no</label>-->
<!--<div class="col-sm-4">-->
<!-- <input value="{{ old('chequeno') }}"  type="text"  id="chequeno" name="chequeno" class="form-control form-control-round" placeholder="Enter Cheque no" >-->
<!--</div>    -->
<!--</div> -->




<!--<div class="form-group row">-->
<!--<label class="col-sm-2 col-form-label">Amount</label>-->
<!--<div class="col-sm-4">-->
<!-- <input value="{{ old('amount') }}" type="text" id="amount" onchange="changeamount()" name="amount"  class="form-control form-control-round" placeholder="Enter Amount">-->
<!--</div>-->
   


<!--<label class="col-sm-2 col-form-label">Total amount</label>-->
<!--<div class="col-sm-4">-->
<!-- <input value="{{ old('billamount') }}" readonly="true" type="text" id="billamount" name="billamount"  class="form-control form-control-round" placeholder="Enter Amount">-->
<!--</div> -->
<!--</div>-->
<!--<div class="form-group row">-->
<!--<div class="col-sm-2">-->
<!--<button id="showbill" type="button" onclick="myFunction()" style="" class="btns_save">Show Bills</button>-->
<!--</div>-->
<!--</div>-->
<!--<div id="dynamics">-->
<!-- <table class="table table-bordered" id="dynamic_field" >-->

<!--</table>-->
<!--</div>-->
<!--</div>-->




<!--<br>-->
<!--<div class="form-group row">-->
<!--<label class="col-sm-4 col-form-label"></label>-->
<!--<div class="col-sm-2">-->
<!-- <button type="Reset" style="" class="btns_reset" >Reset</button>-->
<!--</div>-->

<!--<label class="col-sm-1 col-form-label"></label>-->
<!--<div class="col-sm-2">-->
<!-- <button id="savebutton" type="submit" style="" class="btns_save">Save</button>-->
<!--</div>    -->
<!--</div>-->
<!-- 
<div class="form-group row">
<div class="col-sm-2 col-md-pull-9"></div>
<div class="col-sm-2 col-md-pull-9">
 <button type="Reset" style="" class="btns_reset">Reset</button>
</div>
<div class="col-sm-1 col-md-pull-9"></div>

<div class="col-sm-2">
 <button type="button" style="" class="btns_save">Save</button>
</div>     
</div>
 -->

<!--</form>-->


<!--</div>-->
<!--</div>-->
<!-- Basic Form Inputs card end -->


<!--<div class="container">-->
<!--<div class="container-fluid">-->
<!--<div class="row">-->

<!--<div class="col-sm-12">-->
<!-- Basic Form Inputs card start -->
<!--<div class="card">-->
<!--<div class="card-header">-->
<!--<h4>View Paid Receipt</h4>-->
<!--</div>-->
<!--<div class="card-block">-->
<!--<div class="card-block table-border-style">-->
<!--<div class="table-responsive">-->
<!--<table class="table">-->
<!--<thead>-->

<!--<tr>-->
<!--<th>S.No</th>-->


<!--<th>Customer Name</th>-->
<!--<th>Date</th>-->

<!--<th>Enter Amount</th>-->
<!--<th>Actions</th>-->
<!--</tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--  @if(isset($records))-->
<!--@foreach($records as $key=>$value)-->
<!--<tr>-->

<!--<td>{{$key+1}}</td>-->
<!--<td>{{$value->date ??''}}</td>-->
<!--<td>{{$value->getcustomer[0]->customer_name ??''}}</td>-->
<!--<td>{{$value->enter_amount ??''}}</td>-->
<!--<td>-->
<!-- <a href="{{url('/mehmoodgoodemployee/pdf/'.$value->id)}}" target="blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>&nbsp;|&nbsp;-->
<!-- <a href="{{url('/mehmoodgoodemployee/viewpaidreceipt/'.$value->id)}}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;-->
<!--  <a href="{{url('/mehmoodgoodemployee/editpaidreceipt/'.$value->id)}}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;-->
  
<!--    <a id="deletepaidreceipt" data-deleteId="{{$value->id}}"><i class="fa fa-trash delete"></i></a>     -->
<!--   </td>-->
<!--</tr>-->
<!--@endforeach-->
<!--@endif-->

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

@endsection
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});
//on onchange amount

  function getpaymenttype(t) 
  {
    var type=t.value;
    if(type=="2")
    {
      $("#bank").show();
    }
    else{
       $("#bank").hide();
    } 
   

   } 

    function getcustomertype(t) 
  {
    var type=t.value;
    


    if(type=="Paid")
    {
     
     document.getElementById("showbill").disabled = false;
      var sender_dropdown = $("#customer_id");
    $.ajax({
      url:'getbiltysenderdropdown',
      type:'GET',
      async: false,
      data: { type: type },
      success:function(data){

        var optionpackages ='<option value="">Select Customer Name</option>';
        for(var i=0;i<data.length;i++){


          optionpackages += '<option value="'+ data[i].id +'">' +data[i].customer_name + '</option>';
        }

        sender_dropdown.html(optionpackages);
//$('#category_id').selectpicker('refresh');


      }
      }); 
    
      }
    else{
          document.getElementById("showbill").disabled = true;  
           var sender_dropdown = $("#customer_id");
    $.ajax({
      url:'getsenderdropdown',
      type:'GET',
      async: false,
      data: { type: type },
      success:function(data){

        var optionpackages ='<option value="">Select Customer Name</option>';
        for(var i=0;i<data.length;i++){


          optionpackages += '<option value="'+ data[i].id +'">' +data[i].customer_name + '</option>';
        }

        sender_dropdown.html(optionpackages);
//$('#category_id').selectpicker('refresh');


}
});
    } 
   

   } 
//on getting customer balance if to pay is selected
 function getcustomerbalance(t) 
  {
     var customer=t.value;
     let customertype = $('#customer_type').val();

    if(customertype=="ToPay")
    {
        $('#dynamic_field').empty();
      $.ajax({
     url:'gettopaybalance',
     type:'GET',
     async: false,
     data: { customer:customer },
     success:function(data){

      
      
      // $('#total_amount').val('');

     $("#customerbalance").html("Customer Balance:"+data);
     $("#customerbalance").css("fontSize", 20);
     $("#billamount").val(data);
      

     }
     });
    }
    else
    {
      $('#customerbalance').empty();
      $('#billamount').val(''); 
    }
  
    $.ajax({
     url:'getwalletbalance',
     type:'GET',
     async: false,
     data: { customer:customer },
     success:function(data){

      
      
      // $('#total_amount').val('');
     $("#prevbalance").val(data);
      

     }
     });


   } 


function myFunction() {
  var customer_name = $('#customer_id').val();




        // console.log(customer_id);
        var trc=""; 

    $.ajax({

        type: 'get',

        url: '{!!URL::to('getpaidtable')!!}',

        data: {"customer_name":customer_name},

        success:function(data)
        {
           
            
            trc+= '<thead><tr><th>Sr No</th><th>Bill Number</th><th>Amount</th>';
             trc+= '</tr></thead>';
             trc+= '<tbody>' ;
            for(var i=0;i<data.length;i++)
            {
              
            
             
            
             
              
              trc+="<tr><td><input type='checkbox' onchange='doalert(this)'  name='bill_id[]' id='bill_id' class='biltyCheck' value='" + data[i].id + "'/>" + data[i].id + "</td>";

                trc+='<td>' + data[i].bill_id + '</td>';
              
               
               
                trc+='<td>' + data[i].getbilty[0].total_charges + '</td>';
               

            
            
              
            
               
            
              trc+='</tr>';
            }
           
            trc+= '</tbody>';
      $('#dynamic_field').html(trc);
        table = $('#dynamic_field').DataTable();
table.destroy(); 
$('#dynamic_field').DataTable({
    "retrieve": true,
        "paging": false,
        "scrollY":"500px",
        "scrollCollapse": true,

      });
        },

        error:function(){



        }

    });

  
}
//on onchange function of doalert
var amount= 0;
function doalert(checkboxElem) {
  
 
   //if checkbox is check then it will add amount on the basis of selected value
  if (checkboxElem.checked) {
    var arr = checkboxElem.value;
  
     
     
    // arr.push(checkboxElem);
    
    $.ajax({
    url:'getbillbalance',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){

      amount +=+ data;
      
      // $('#total_amount').val('');
     $("#billamount").val(amount);
      

}
});
 let enteramount =  $('#amount').val();
 if(enteramount!="")
 {
 if(enteramount>amount)
 {
  let balance = enteramount-amount; 
  
  $('#balance').val(balance);
  document.getElementById("savebutton").disabled = false; 
 } 
 else{
  
   $("#myElem").show();
     setTimeout(function() { $("#myElem").hide(); }, 5000);
   document.getElementById("savebutton").disabled = true; 
 }
}
    
  } 
  //if checkbox is uncheck then it will deduct from previous account
  else {
   
    var deduction = 0;
    var finalamount = 0;
   var arr = checkboxElem.value;
   
    // arr.push(checkboxElem);
    
    $.ajax({
    url:'getbillbalance',
    type:'GET',
    async: false,
    data: { id:arr },
    success:function(data){
     deduction = data;
    
//$('#category_id').selectpicker('refresh');


}
});
    var adjustamount = $("#billamount").val();
    finalamount = adjustamount-deduction;
    amount +=-deduction;
    
    $("#billamount").val(finalamount);
  }
}



function changeamount()
{
  let previous = $('#prevbalance').val();
  let current = $('#amount').val();
  let type = $('#customer_type').val();
 
  if(type=="ToPay")
  {
   let amount = $('#amount').val();
   let billamount = $('#billamount').val();
   let billamountconv = billamount.substr(1);
  
    //if amount is greater than total amount then go in balance
   if (+amount > +billamountconv)
    {
      let balances = amount-billamountconv;

       $('#balance').val(balances);
   }
    
  }
  else{
 let enteramount = parseInt(previous) + parseInt(current);
 $('#amount').val(enteramount);

 if(enteramount>amount)
 {
  let balance = enteramount-amount; 
  
  $('#balance').val(balance);
  
  document.getElementById("savebutton").disabled = false; 
  Swal.fire({
  title: 'Your enter amount is greater than total amount therefore extra amount will add in balance',
  showClass: {
    popup: 'animated fadeInDown faster'
  },
  hideClass: {
    popup: 'animated fadeOutUp faster'
  }
})
 } 
 if(enteramount<amount)
 {
  let balance = enteramount; 
  
  $('#balance').val(balance);
 
  document.getElementById("savebutton").disabled = false; 
  Swal.fire({
  title: 'Your enter amount is less than total amount therefore it will add in balance',
  showClass: {
    popup: 'animated fadeInDown faster'
  },
  hideClass: {
    popup: 'animated fadeOutUp faster'
  }
})
 } 

 /*else{
  
   $("#myElem").show();
     setTimeout(function() { $("#myElem").hide(); }, 5000);
   document.getElementById("savebutton").disabled = false; 
 } */
 }
}


$(document).on("click","#deletepaidreceipt", function(e){ //user click on remove text
  var id = $(this).attr('data-deleteId');
  console.log(id);
  var data = {
    id : id,
  }
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) 
    {
      $.ajax({
        type: 'post',
        url: '{{url('deletepaidreceipt')}}',
        data: data,
        date: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
          if (response) {
            Swal.fire({
              title: 'Deleted!',
              html: '<strong>Your Receipt has been deleted.</strong>',
              type: 'success',
              showConfirmButton: false,
              timer: 3000,
            })
            location.reload();
          }
        },
        error: function () {
        }
      });
    }
  })
})



</script>

<div class="container">
