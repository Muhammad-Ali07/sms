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
             @if(@$amount != '')
<form action="{{ route('update-bank-service-charge', @$amount->id) }} " method="post">
@else
<form action="{{ route('add-bank-service-charge') }} " method="post">
@endif
{{ csrf_field() }}
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Bank Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Bank Services
                           </h2>
                         
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-6 mt-5">
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Deposit Bank Name</label>
                                    <select name="bank_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">
                                		<option value="">Select Deposit Bank Name</option>
                                		@foreach($bank as $value)
                                		<option value="{{$value->id}}" @if(@$amount->bank_account_id == $value->id) selected @endif>{{$value->branch->bank->name}}/{{$value->branch->name}}</option>
                                		@endforeach
                                	</select>
                                	@if ($errors->has('bank_id'))
                                		<div class="alert alert-danger">{{ $errors->first('bank_id') }}</div>
                                	@endif
                                </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Date</label>
                                                               <input type="date" id="date" name="date" class="form-control form-control-round" placeholder="Enter Client Type" value="{{ old('date',date('Y-m-d',strtotime(@$amount->date))) }}">
                            @if ($errors->has('date'))
                            	<div class="alert alert-danger">{{ $errors->first('date') }}</div>
                            @endif
                              </div>
                               <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Amount</label>
                                                                       <input type="text" id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Amount" value="{{ old('amount',@$amount->amount) }}">
                                    @if ($errors->has('amount'))
                                    	<div class="alert alert-danger">{{ $errors->first('amount') }}</div>
                                    @endif
                              </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Description</label>
                                                                  <input type="text" id="description" name="description" class="form-control form-control-round" placeholder="Enter Description" value="{{ old('description',@$amount->description) }}">
                                @if ($errors->has('description'))
                                	<div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                              </div>
                              </div>
                              <button class="btn btn-primary mt-5 btns_save">Submit</button>
                              <div class="btn btn-primary mt-5" id="Reset">Reset</div>
                              <div id="input" class="p-5">
                           <div class="preview">
                              <table id="example" class="display nowrap" style="width:100%">
                                 <thead>
                                   	<tr style="width:100%">
				<th>S.No</th>
				<th>Date</th>
				<th>Description</th>
				<th> Amount</th>
				<th>Actions</th>
			</tr>
                                 </thead>
                                 <tbody>
                                  	@php $count = 1 @endphp

			@foreach ($charge as $value) 
			<tr>
            
				<th scope="row">{{$count}}</th>
				<td>{{$value->date}}</td>
				<td>{{$value->description}}</td>
				<td>{{$value->amount}}</td>
				<td>
					<a href="{{ route('edit-bank-service-charge', $value->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
					<a href="{{ route('delete-bank-service-charge', $value->id) }}">Delete<i class="fa fa-trash"></i></a> 
				</td>
			</tr>
     @php $count++; @endphp
			@endforeach          
                                 </tbody>
                                 <tfoot>
                                     	<tr style="width:100%">
				<th>S.No</th>
				<th>Date</th>
				<th>Description</th>
				<th> Amount</th>
				<th>Actions</th>
			</tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                           </div>
                        </div>
                     </div>


<!--@if(@$amount != '')-->
<!--<form action="{{ route('update-bank-service-charge', @$amount->id) }} " method="post">-->
<!--@else-->
<!--<form action="{{ route('add-bank-service-charge') }} " method="post">-->
<!--@endif-->
<!--{{ csrf_field() }}-->
 

<!--<div class="form-group row">-->
<!--<label class="col-sm-2 col-form-label">Deposit Bank Name</label>-->
<!--<div class="col-sm-4">-->
<!--	<select name="bank_id" class="form-control form-control-round mdb-select md-form colorful-select dropdown-primary">-->
<!--		<option value="">Select Deposit Bank Name</option>-->
<!--		@foreach($bank as $value)-->
<!--		<option value="{{$value->id}}" @if(@$amount->bank_account_id == $value->id) selected @endif>{{$value->branch->bank->name}}/{{$value->branch->name}}</option>-->
<!--		@endforeach-->
<!--	</select>-->
<!--	@if ($errors->has('bank_id'))-->
<!--		<div class="alert alert-danger">{{ $errors->first('bank_id') }}</div>-->
<!--	@endif-->
<!--</div>-->

<!--<label class="col-sm-2 col-form-label">Date</label>-->
<!--<div class="col-sm-4">-->
<!--<input type="date" id="date" name="date" class="form-control form-control-round" placeholder="Enter Client Type" value="{{ old('date',date('Y-m-d',strtotime(@$amount->date))) }}">-->
<!--@if ($errors->has('date'))-->
<!--	<div class="alert alert-danger">{{ $errors->first('date') }}</div>-->
<!--@endif-->
<!--</div>    -->
<!--</div> -->


<!--<div class="form-group row">-->
<!--<label class="col-sm-2 col-form-label">Amount</label>-->
<!--<div class="col-sm-4">-->
<!--<input type="text" id="amount" name="amount" class="form-control form-control-round" placeholder="Enter Amount" value="{{ old('amount',@$amount->amount) }}">-->
<!--@if ($errors->has('amount'))-->
<!--	<div class="alert alert-danger">{{ $errors->first('amount') }}</div>-->
<!--@endif-->
<!--</div>-->

<!--<label class="col-sm-2 col-form-label">Description </label>-->
<!--<div class="col-sm-4">-->
<!--<input type="text" id="description" name="description" class="form-control form-control-round" placeholder="Enter Description" value="{{ old('description',@$amount->description) }}">-->
<!--@if ($errors->has('description'))-->
<!--	<div class="alert alert-danger">{{ $errors->first('description') }}</div>-->
<!--@endif-->
<!--</div>    -->
<!--</div> -->

<!--<br>-->
<!--<div class="form-group row">-->

<!--<label class="col-sm-10 col-form-label"></label>-->
<!--		<div class="col-sm-2">-->
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
<!--<div class="container">-->
<!--<div class="container-fluid">-->
<!--<div class="row">-->

<!--<div class="col-sm-12">-->
<!-- Basic Form Inputs card start -->
<!--<div class="card">-->
<!--<div class="card-header">-->
<!--<h4>View Bank Services Charge</h4>-->
<!--</div>-->
<!--<div class="card-block">-->
<!--<div class="card-block table-border-style">-->
<!--<div class="table-responsive">-->

<!--	<table class="table" id="DataTable">-->
<!--		<thead>-->
<!--			<tr style="width:100%">-->
<!--				<th>S.No</th>-->
<!--				<th >Bank Name</th>-->
<!--				<th>Date</th>-->
<!--				<th>Description</th>-->
<!--				<th> Amount</th>-->
<!--				<th>Actions</th>-->
<!--			</tr>-->
<!--		</thead>-->
<!--		<tbody>-->
<!--			@php $count = 1 @endphp-->

<!--			@foreach ($charge as $value) -->
<!--			<tr>-->
<!--				<th scope="row">{{$count}}</th>-->
<!--				<td>{{$value->date}}</td>-->
<!--				<td>{{$value->description}}</td>-->
<!--				<td>{{$value->amount}}</td>-->
<!--				<td>-->
<!--					<a href="{{ route('edit-bank-service-charge', $value->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;-->
<!--					<a href="{{ route('delete-bank-service-charge', $value->id) }}"><i class="fa fa-trash"></i></a> -->
<!--				</td>-->
<!--			</tr>-->
<!--			@php $count++; @endphp-->
<!--			@endforeach-->

<!--		</tbody>-->
<!--	</table>-->

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


<script type="text/javascript">
    $(document).ready(function() {
    $('#DataTable').DataTable();
} );
</script>
</div>


@endsection 
