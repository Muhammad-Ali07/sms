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
                       <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Broker</a> </div>
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
        
        
                    @if(empty($select))
                    <form method="post" id="broker_form" action="{{route('add-broker-process')}}" enctype="multipart/form-data">
                    @else
                    <form method="post" id="broker_edit_form"  action="{{route('broker-update', ['id' => $select->broker_id])}}" enctype="multipart/form-data">
                     @endif
        
                       @csrf
                    <div class="grid">
                       <div class="intro-y flex items-center mt-12">
                          <h2 class="text-lg font-medium mr-auto">
                             Broker Form
                          </h2>
                       </div>
        
                       <div class="grid grid-cols-12 gap-6 mt-5">
        
                          <div class="intro-y col-span-12 lg:col-span-12">
                             <!-- BEGIN: Input -->
                             <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                   <h2 class="font-medium text-base mr-auto">
                                    @php
                                        $user = auth()->user()->id;
                                        $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
                                    @endphp

        
        							 @if(!empty($select))
                                      Edit Broker Information
                                       @php
        
                                            $builty_type = explode(',', $select->builtytype)
                                        @endphp
        
        
                                      @endif
        
                                      @if(empty($select))
                                        Add New Broker
                                      @endif
        
        
                                   </h2>
        
        
                                </div>
        
        
                                <div id="input" class="p-5">
        
                                         <div class="preview">
                                                <div class="grid grid-cols-12 gap-2 phone-container">
                                                    <div class="mt-2 col-span-4">
                                                        <label for="regular-form-2" class="form-label">Broker Name</label>
                                                        <input id="regular-form-2" type="text" value="@if(!empty($select)) {{$select->broker_name}} @endif" class="form-control " placeholder="Enter Name in English" name="broker_name">
                                                    </div>
                                                    <div class="col-span-4 mt-2">
                                                        <label for="regular-form-4" class="form-label">Broker City</label>
                                                        <input id="regular-form-4" type="text" value="@if(!empty($select)){{$select->broker_city}} @endif"  class="form-control" placeholder="Enter Broker City" name="broker_city">
                                                    </div>
                                                     
                                                     <!--phone broker div starts   -->
                                                    @if(isset($select) && $select->now_broker_phone->isNotEmpty())
                                                        @foreach($select->now_broker_phone as $index => $phone)
                                                            <div class="col-span-4 mt-2 phone-entry">
                                                                <label for="broker_phone-{{ $index }}" class="form-label">Broker Phone</label>
                                                                <div class="flex items-center">
                                                                    <input id="broker_phone-{{ $index }}" type="text" class="form-control w-full phone_number" placeholder="Enter Broker Phone" name="broker_phone[]" value="{{ $phone->phone }}">
                                                                    <!--<input id="broker_phone-{{ $index }}" type="text" class="form-control w-full" placeholder="Enter Broker Phone" name="broker_phone[]" value="{{ $phone->phone }}">-->
            
                                                                    @if($index === 0)
                                                                        <!-- "Add More" button next to the first phone input -->
                                                                        <button type="button" class="btn btn-primary AddMorePhone ml-2">Add More</button>
                                                                    @elseif($index > 0)
                                                                        <button type="button" class="btn btn-danger RemovePhone ml-2">Remove</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-span-4 mt-2 phone-entry">
                                                            <label for="broker_phone-0" class="form-label">Broker Phone</label>
                                                            <div class="flex items-center">
                                                                <input type="text" class="form-control w-full phone_number" placeholder="Enter Broker Phone" name="broker_phone[]">
                                                                <!-- "Add More" button for the first input when no phone records exist -->
                                                                <button type="button" class="btn btn-primary AddMorePhone ml-2">Add More</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                     <!--phone broker div ends   -->
        
                                                </div>
                                                
                                                <div id="bank-fields-container">
                                                    @if(isset($bankRecords) && $bankRecords->isNotEmpty())
                                                        @foreach($bankRecords as $index => $bank)
                                                            <div class="bank-fields grid grid-cols-12 gap-2">
                                                                <div class="col-span-4 mt-2">
                                                                    <label for="title-{{ $index }}" class="form-label">Title</label>
                                                                    <input id="title-{{ $index }}" type="text" class="form-control" placeholder="Enter Title" name="title[]" value="{{ $bank->title }}">
                                                                </div>
                
                                                                <div class="col-span-4 mt-2">
                                                                    <label for="bank-{{ $index }}" class="form-label">Bank Name</label>
                                                                    <select class="form-control form-control-round" name="bank_name[]" id="bank-{{ $index }}">
                                                                        <option disabled>Select Bank</option>
                                                                        <option value="Allied Bank Limited" {{ $bank->bank_name == 'Allied Bank Limited' ? 'selected' : '' }}>Allied Bank Limited</option>
                                                                        <option value="Askari Bank" {{ $bank->bank_name == 'Askari Bank' ? 'selected' : '' }}>Askari Bank</option>
                                                                        <option value="Bank Alfalah" {{ $bank->bank_name == 'Bank Alfalah' ? 'selected' : '' }}>Bank Alfalah</option>
                                                                        <option value="Bank Al Habib" {{ $bank->bank_name == 'Bank Al Habib' ? 'selected' : '' }}>Bank Al Habib</option>
                                                                        <option value="BankIslami Pakistan" {{ $bank->bank_name == 'BankIslami Pakistan' ? 'selected' : '' }}>BankIslami Pakistan</option>
                                                                        <option value="Faysal Bank" {{ $bank->bank_name == 'Faysal Bank' ? 'selected' : '' }}>Faysal Bank</option>
                                                                        <option value="Habib Bank Limited" {{ $bank->bank_name == 'Habib Bank Limited' ? 'selected' : '' }}>Habib Bank Limited</option>
                                                                        <option value="Habib Metropolitan Bank" {{ $bank->bank_name == 'Habib Metropolitan Bank' ? 'selected' : '' }}>Habib Metropolitan Bank</option>
                                                                        <option value="JS Bank" {{ $bank->bank_name == 'JS Bank' ? 'selected' : '' }}>JS Bank</option>
                                                                        <option value="MCB Bank" {{ $bank->bank_name == 'MCB Bank' ? 'selected' : '' }}>MCB Bank</option>
                                                                        <option value="Meezan Bank" {{ $bank->bank_name == 'Meezan Bank' ? 'selected' : '' }}>Meezan Bank</option>
                                                                        <option value="National Bank of Pakistan" {{ $bank->bank_name == 'National Bank of Pakistan' ? 'selected' : '' }}>National Bank of Pakistan</option>
                                                                        <option value="Silk Bank" {{ $bank->bank_name == 'Silk Bank' ? 'selected' : '' }}>Silk Bank</option>
                                                                        <option value="Standard Chartered Bank" {{ $bank->bank_name == 'Standard Chartered Bank' ? 'selected' : '' }}>Standard Chartered Bank</option>
                                                                        <option value="Summit Bank" {{ $bank->bank_name == 'Summit Bank' ? 'selected' : '' }}>Summit Bank</option>
                                                                        <option value="United Bank Limited" {{ $bank->bank_name == 'United Bank Limited' ? 'selected' : '' }}>United Bank Limited</option>
                                                                        <option value="Easy Paisa" {{ $bank->bank_name == 'Easy Paisa' ? 'selected' : '' }}>Easy Paisa</option>
                                                                        <option value="Jazz Cash" {{ $bank->bank_name == 'Jazz Cash' ? 'selected' : '' }}>Jazz Cash</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-span-4 mt-2 phone-entry">
                                                                    <label for="account-{{ $index }}" class="form-label">Account Number / IBAN</label>
                                                                    <div class="flex items-center">
                                                                        <input id="account-{{ $index }}" type="text" class="form-control w-56 iban-field" placeholder="Enter Account Number / IBAN" name="broker_bank[]" value="{{ $bank->broker_bank }}">
                                                                        <!--<input id="broker_phone-{{ $index }}" type="text" class="form-control w-full" placeholder="Enter Broker Phone" name="broker_phone[]" value="{{ $phone->phone }}">-->
                
                                                                        @if($index === 0)
                                                                            <!-- "Add More" button next to the first phone input -->
                                                                            <button type="button" class="btn btn-primary AddMoreFileBank">Add More</button>
                                                                        @elseif($index > 0)
                                                                            <button type="button" class="btn btn-danger RemovePhone ml-2">Remove</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-span-4 mt-2">-->
                                                                <!--    <label for="account-{{ $index }}" class="form-label">Account Number / IBAN</label>-->
                                                                <!--    <input id="account-{{ $index }}" type="text" class="form-control" placeholder="Enter Account Number / IBAN" name="broker_bank[]" value="{{ $bank->broker_bank }}">-->
                                                                <!--</div>-->
                                                                <!--<div class="col-span-2 mt-2">-->
                                                                <!--    <label for="" class="form-label">Add</label>-->
                                                                <!--    <br>-->
                                                                <!--    <button type="button" class="btn btn-primary AddMoreFileBank">Add More</button>-->
                                                                <!--</div>-->
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <!-- Display an empty bank field if no records are available -->
                                                        <div class="bank-fields grid grid-cols-12 gap-2">
                                                            <div class="col-span-4 mt-2">
                                                                <label for="title-0" class="form-label">Title</label>
                                                                <input id="title-0" type="text" class="form-control" placeholder="Enter Title" name="title[]">
                                                            </div>
                
                                                            <div class="col-span-4 mt-2">
                                                                <label for="bank-0" class="form-label">Bank Name</label>
                                                                <select class="form-control form-control-round" name="bank_name[]" id="bank-0">
                                                                    <option disabled>Select Bank</option>
                                                                    <option value="Allied Bank Limited">Allied Bank Limited</option>
                                                                    <option value="Askari Bank">Askari Bank</option>
                                                                    <option value="Bank Alfalah">Bank Alfalah</option>
                                                                    <option value="Bank Al Habib">Bank Al Habib</option>
                                                                    <option value="BankIslami Pakistan">BankIslami Pakistan</option>
                                                                    <option value="Faysal Bank">Faysal Bank</option>
                                                                    <option value="Habib Bank Limited">Habib Bank Limited</option>
                                                                    <option value="Habib Metropolitan Bank">Habib Metropolitan Bank</option>
                                                                    <option value="JS Bank">JS Bank</option>
                                                                    <option value="MCB Bank">MCB Bank</option>
                                                                    <option value="Meezan Bank">Meezan Bank</option>
                                                                    <option value="National Bank of Pakistan">National Bank of Pakistan</option>
                                                                    <option value="Silk Bank">Silk Bank</option>
                                                                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                                    <option value="Summit Bank">Summit Bank</option>
                                                                    <option value="United Bank Limited">United Bank Limited</option>
                                                                    <option value="Easy Paisa">Easy Paisa</option>
                                                                    <option value="Jazz Cash">Jazz Cash</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <!--<div class="col-span-4 mt-2 phone-entry">-->
                                                            <!--    <label for="broker_phone-0" class="form-label">Broker Phone</label>-->
                                                            <!--    <div class="flex items-center">-->
                                                            <!--        <input id="broker_phone-0" type="text" class="form-control w-full" placeholder="Enter Broker Phone" name="broker_phone[]">-->
                                                                    <!-- "Add More" button for the first input when no phone records exist -->
                                                            <!--        <button type="button" class="btn btn-primary AddMorePhone ml-2">Add More</button>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            
                                                            <div class="col-span-4 mt-2">
                                                                <label for="account-0" class="form-label">Account Number / IBAN</label>
                                                                <div class="flex items-center">
                                                                    <input id="account-0" type="text" class="form-control w-full iban-field" placeholder="Enter Account Number / IBAN" name="broker_bank[]">
                                                                    <button type="button" class="btn btn-primary AddMoreFileBank ml-2">Add More</button>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="grid grid-cols-12 gap-2">
                                                    <div class="col-span-4 mt-2">
                                                        <label for="regular-form-4" class="form-label">Broker Account Limit</label>
                                                        <input id="regular-form-4" type="text" value="@if(!empty($select)){{$select->broker_limit}} @endif"
                                                            class="form-control" placeholder="Enter Account Limit" name="broker_limit">
                                                    </div>
                                                </div>
                                                <div class="file_upload">
                                                    @if(isset($select) && $select->other->isNotEmpty())
                                                        @foreach($select->other as $index => $file)
                                                        <div class="grid grid-cols-12 gap-2 mt-2">
                                                            <div class="col-span-4">
                                                                <label for="doc_name-{{ $index }}" class="form-label">File Type</label>
                                                                <input id="doc_name-{{ $index }}" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]" value="{{ $file->doc_name }}">
                                                            </div>
            
                                                            <div class="col-span-6">
                                                                <label for="doc_file-{{ $index }}" class="form-label">File</label>
                                                                <input id="doc_file-{{ $index }}" type="file" class="form-control" name="doc_file[]">
                                                                @if(!empty($file->doc_file))
                                                                    <a href="{{ asset('' . $file->doc_file) }}" target="_blank" class="text-blue-500 mt-2">View current file</a>
                                                                @endif
                                                            </div>
            
                                                            <div class="col-span-2 mt-1">
                                                                @if($index === 0)
                                                                    <button type="button" class="btn btn-primary AddMoreFile mt-6">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger RemoveFile mt-6">Remove</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                        <!-- Display an empty file upload field if no records are available -->
                                                        <div class="grid grid-cols-12 gap-2 mt-2">
                                                            <div class="col-span-4">
                                                                <label for="doc_name-0" class="form-label">File Type</label>
                                                                <input id="doc_name-0" type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]">
                                                                
                                                            </div>
                                                            <div class="col-span-8">
                                                                <label for="doc_file-0" class="form-label">File</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input id="doc_file-0" type="file" class="form-control" name="doc_file[]" style="width: auto; flex-grow: 1;">
                                                                    <button type="button" class="btn btn-primary AddMoreFile" style="margin-left: 10px;">Add More</button>
                                                                </div>
                                                            </div>
        
        
                                                            <!--<div class="col-span-4">-->
                                                                
                                                            <!--    <label for="doc_file-0" class="form-label">File</label>-->
                                                            <!--    <input id="doc_file-0" type="file" class="form-control w-56" name="doc_file[]">-->
                                                    
                                                            <!--    <button type="button" class="btn btn-primary AddMoreFile">Add More</button>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-span-6">-->
                                                            <!--    <label for="doc_file-0" class="form-label">File</label>-->
                                                            <!--    <input id="doc_file-0" type="file" class="form-control" name="doc_file[]">-->
                                                            <!--    <button type="button" class="btn btn-primary AddMoreFile mt-6">Add More</button>-->
                                                            <!--</div>-->
            
                                                            <!--<div class="col-span-2 mt-1">-->
                                                            <!--</div>-->
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="grid grid-cols-12 gap-2 mt-5">
                                                    <div class="col-span-4 mt-2" >
                                                        <label class="form-label">Vehicle Type</label><br>
                                                        <div class="checkbox-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                            @foreach($vehicleTypes as $type)
                                                                <div class="form-check" style="flex: 1 0 30%; max-width: 30%;"> <!-- Adjust width for 4 items -->
                                                                    <input
                                                                        type="checkbox"
                                                                        name="vehicle_types[]"
                                                                        class="form-check-input"
                                                                        id="vehicle-type-{{ $type->id }}"
                                                                        value="{{ $type->name }}"
                                                                        @if(!empty($selectedVehicleTypes) && in_array($type->name, $selectedVehicleTypes)) checked @endif
                                                                    >
                                                                    <label class="form-check-label" for="vehicle-type-{{ $type->id }}">{{ $type->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
        
                                                        <!--<div class="checkbox-container" style="display: flex; gap: 10px;">-->
                                                        <!--    @foreach($vehicleTypes as $type)-->
                                                        <!--        <div class="form-check">-->
                                                        <!--            <input-->
                                                        <!--                type="checkbox"-->
                                                        <!--                name="vehicle_types[]"-->
                                                        <!--                class="form-check-input"-->
                                                        <!--                id="vehicle-type-{{ $type->id }}"-->
                                                        <!--                value="{{ $type->name }}"-->
                                                        <!--                @if(!empty($selectedVehicleTypes) && in_array($type->name, $selectedVehicleTypes)) checked @endif-->
                                                        <!--            >-->
                                                        <!--            <label class="form-check-label" for="vehicle-type-{{ $type->id }}">{{ $type->name }}</label>-->
                                                        <!--        </div>-->
                                                        <!--    @endforeach-->
                                                        <!--</div>-->
        
                                                        <!--@foreach($vehicleTypes as $type)-->
                                                        <!--    <div class="form-check">-->
                                                        <!--        <input-->
                                                        <!--            type="checkbox"-->
                                                        <!--            name="vehicle_types[]"-->
                                                        <!--            class="form-check-input"-->
                                                        <!--            id="vehicle-type-{{ $type->id }}"-->
                                                        <!--            value="{{ $type->name }}"-->
                                                        <!--            @if(!empty($selectedVehicleTypes) && in_array($type->name, $selectedVehicleTypes)) checked @endif-->
                                                        <!--        >-->
                                                        <!--        <label class="form-check-label" for="vehicle-type-{{ $type->id }}">{{ $type->name }}</label>-->
                                                        <!--    </div>-->
                                                        <!--@endforeach-->
                                                    </div>
                                                    <div class="col-span-4 mt-2">
                                                        
                                                    </div>
                                                    <div class="col-span-4 mt-2" id="fix-vehicle-selection-container">
                                                        <label for="fix-vehicle-0"  class="form-label">Fix Vehicle Selection</label>
                                                        <div class="flex items-center">
                                                            <input id="fix-vehicle-0" maxlength="8" type="text" value="@if(!empty($select)){{$select->veh_selection}}@endif"
                                                                    class="form-control fix-vehicle-0" placeholder="Enter Fix Vehicle Selection" name="veh_selection[]">
                                                            <script>
                                                                $('.fix-vehicle-0').on('input', function() {
                                                                    // Get the current value
                                                                    let value = $(this).val();
                                                            
                                                                    // Replace any non-alphanumeric characters with an empty string
                                                                    value = value.replace(/[^a-zA-Z0-9]/g, '');
                                                            
                                                                    // Set the value back to the input
                                                                    $(this).val(value);
                                                                });
                                                            </script>        
                                                            <button type="button" class="btn btn-primary AddMoreFixVehicle ml-2">Add More</button>
                                                        </div>
                                                    </div>
                                                </div>
        
        
                                            
        
        
                                            
        
                                        <div class="btn btn-primary mt-5">
                                            @if($user_meta->setup == 1)
                                                @if(!empty($select))
                                                    @if($user_meta->edition == 1)
                                                        <button type="submit"> Submit </button>
                                                    @endif
                                                @else
                                                    @if($user_meta->insertion == 1)
                                                        <button type="submit"> Submit </button>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
        
                                </div>
                             </div>
                             <!-- END: Input -->
                             <!-- BEGIN: Input Sizing -->
                          </div>
        
                 </form>
                       </div>
        
                    </div>
        
                 </div>
                    @if (!Request::is('*edit-broker*'))

                        <div class="grid grid-cols-12 gap-6 mt-5">
                          <div class="intro-y col-span-12 lg:col-span-12">
                             <!-- BEGIN: Input -->
                             <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                   <h2 class="font-medium text-base mr-auto">
                                      View Broker
                                   </h2>
                                </div>
                                <div id="input" class="p-5">
                                   <div class="preview">
                                    <br>
                                    <table id="broker_table" class="display nowrap" style="width:100%">
                                         <thead>
                                            <tr>
                                                <th>Broker Name</th>
                                                <th>Broker Phone</th>
                                                <th>Broker City</th>
                                                <th>Vechile Type</th>
                                                <th>Broker Limit</th>
                                                <th>Fix Vehicle Selection</th>
                                                <th>Bank</th>
                                               <th>Action</th>
                                            </tr>
                                         </thead>
                                        <tbody>
                                            @php 
                                                $query = DB::table('broker')
                                                 
                                                ->orderby('broker_id', 'desc');
                                                
                                                 $brokerData = $query->get();
                                            @endphp
                                            @foreach($brokerData as $customer)
                                                @php
                                                    $broker_phone = DB::table('now_broker_phone')->where('broker_id','=',$customer->broker_id)->get();
                                                    $broker_banks = DB::table('now_bank')->where('broker_id','=',$customer->broker_id)->get();
                                                @endphp                                            
                                            <tr>
                                                <td>{{isset($customer->broker_name) ? $customer->broker_name : ''}}</td>
                                                <td>
                                                    @if(!empty($broker_phone))
                                                        @foreach($broker_phone as $b)
                                                            {{$b->phone}} <br>                                                       
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{$customer->broker_city}}</td>
                                                <td>{{$customer->vehicle_types}}</td>
                                                <td>{{$customer->broker_limit}}</td>
                                                <td>{{$customer->veh_selection}}</td>
                                                <td>
                                                    @if(!empty($broker_banks))
                                                        @foreach($broker_banks as $bank)
                                                            <strong>Title:</strong> {{$bank->title}}<br>
                                                            <strong>Bank Name:</strong> {{$bank->bank_name}}<br>
                                                            <strong>Broker Bank:</strong> {{$bank->broker_bank}}<br>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        No bank details available
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('broker-edit',[$customer->broker_id])}}">Edit</a> |
                                                    <a class="deleteBroker" href="javascript:void(0)" data-url="delete-broker/{{$customer->broker_id}}" data-name="{{$customer->broker_name}}"> Delete </a> |
                                                    <a href="view-broker/{{$customer->broker_id}}"> View </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                     @endif
               </div>
               <!-- END: Content -->
</div>
@endsection
@section('script')

<script>
 $('.phone_number').on('input', function() {
        // Get the current value
        let value = $(this).val();

        // Replace any non-numeric characters with an empty string
        value = value.replace(/[^0-9]/g, '');

        // Check if the value exceeds 13 digits
        if (value.length > 13) {
            // Trim the value to the first 13 digits
            value = value.slice(0, 13);
        }

        // Set the value back to the input
        $(this).val(value);
    });


   $(document).ready(function() {
        $('.AddMoreFile').click(function(e) {
            e.preventDefault();
            var newFileUpload = `
                <div class="file_upload">
                    <div class="grid grid-cols-12 gap-2 mt-2">
                        <div class="col-span-4 mr-4">
                            <label for="regular-form-4" class="form-label">File Type</label>
                            <input type="text" class="form-control" placeholder="Enter Doc Name" name="doc_name[]">
                        </div>

                        <div class="col-span-6 mr-4">
                            <label for="regular-form-4" class="form-label"> File</label>
                            <input type="file" class="form-control" name="doc_file[]">
                        </div>

                        <div class="col-span-2 mt-4">
                            <button class="btn btn-danger RemoveFile mt-4">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            // Append the new file upload section
            $('.file_upload').last().after(newFileUpload);
        });


        $('.AddMorePhone').click(function(e) {
    e.preventDefault();
    var newPhoneInput = `
        <div class="col-span-4 mt-2 phone-entry">
            <label class="form-label">Broker Phone</label>
            <div class="flex items-center">
                <input type="text" class="form-control w-56 phone_number " placeholder="Enter Broker Phone" name="broker_phone[]">
                <button type="button" class="btn btn-danger RemovePhone ml-2">Remove</button>
            </div>
        </div>
    `;
    // Append the new phone input field within the same container
    $('.phone-container').append(newPhoneInput);
});

$(document).on('click', '.RemovePhone', function(e) {
    e.preventDefault();
    $(this).closest('.phone-entry').remove();
});
        // Delegate click event to dynamically added Remove buttons
        $(document).on('click', '.RemoveFile', function(e) {
            e.preventDefault();
            $(this).closest('.file_upload').remove();
        });
    });


    $(document).ready(function() {
    let fieldIndex = 1; // Index for unique field IDs

    // Function to add more fields
    $('.AddMoreFileBank').click(function(e) {
        e.preventDefault();
        fieldIndex++;
        const newFields = `
            <div class="bank-fields grid grid-cols-12 gap-2">
                <div class="col-span-4 mt-2">
                    <label for="title-${fieldIndex}" class="form-label">Title</label>
                    <input id="title-${fieldIndex}" type="text" class="form-control" placeholder="Enter Title" name="title[]">
                </div>

                <div class="col-span-4 mt-2">
                    <label for="bank-${fieldIndex}" class="form-label">Bank Name</label>
                    <select class="form-control form-control-round" name="bank_name[]" id="bank-${fieldIndex}">
                        <option value="">Select Bank</option>
                    <option value="Allied Bank Limited">Allied Bank Limited</option>
                                                    <option value="Askari Bank">Askari Bank</option>
                                                    <option value="Bank Alfalah">Bank Alfalah</option>
                                                    <option value="Bank Al Habib">Bank Al Habib</option>
                                                    <option value="BankIslami Pakistan">BankIslami Pakistan</option>
                                                    <option value="Faysal Bank">Faysal Bank</option>
                                                    <option value="Habib Bank Limited">Habib Bank Limited</option>
                                                    <option value="Habib Metropolitan Bank">Habib Metropolitan Bank</option>
                                                    <option value="JS Bank">JS Bank</option>
                                                    <option value="MCB Bank">MCB Bank</option>
                                                    <option value="Meezan Bank">Meezan Bank</option>
                                                    <option value="National Bank of Pakistan">National Bank of Pakistan</option>
                                                    <option value="Silk Bank">Silk Bank</option>
                                                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                    <option value="Summit Bank">Summit Bank</option>
                                                    <option value="United Bank Limited">United Bank Limited</option>
                                                    <option value="Easy Paisa">Easy Paisa</option>
                                                    <option value="Jazz Cash">Jazz Cash</option>
                        <!-- Add other options here -->
                    </select>
                </div>

                <div class="col-span-4 mt-2">
                    <label for="account-${fieldIndex}" class="form-label">Account Number / IBAN</label>
                    <input id="account-${fieldIndex}" type="text" class="form-control w-56" placeholder="Enter Account Number / IBAN" name="broker_bank[]">
                    <button type="button" class="btn btn-danger remove-bank-field">Remove</button>
                </div>
            </div>
        `;
        $('#bank-fields-container').append(newFields);
    });

    // Function to remove a field group
    $(document).on('click', '.remove-bank-field', function() {
        $(this).closest('.bank-fields').remove();
    });
});

$(document).ready(function() {
    let vehicleIndex = 1; // Index for new input fields

    // Function to add more Fix Vehicle fields
    $('.AddMoreFixVehicle').click(function(e) {
        e.preventDefault();
        vehicleIndex++;
        const newFields = `
            <div class="grid grid-cols-12 gap-2 fix-vehicle-row">
                <div class="col-span-8 mt-2">
                    <label for="fix-vehicle-${vehicleIndex}" class="form-label">Fix Vehicle Selection</label>
                    <input id="fix-vehicle-${vehicleIndex}" maxlength="8" type="text" class="form-control fix-vehicle-0" placeholder="Enter Fix Vehicle Selection" name="veh_selection[]">
                </div>
                <div class="col-span-2 mt-2 flex items-end">
                    <button type="button" class="btn btn-danger RemoveFixVehicle">Remove</button>
                </div>
            </div>
        `;
        // Append the new Fix Vehicle selection row
        $('#fix-vehicle-selection-container').append(newFields);
    });

    // Function to remove Fix Vehicle fields
    $(document).on('click', '.RemoveFixVehicle', function(e) {
        e.preventDefault();
        $(this).closest('.fix-vehicle-row').remove();
    });
});


</script>

@endsection

@section('scripts')
<script>

    $('#broker_table').DataTable({

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




         // Attach event listener to all delete links
        document.querySelectorAll('.deleteBroker').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var name = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete " + name + "?", deleteUrl);
            });
        });
    

</script>


@endsection
@section('jquery_validation')
<script>
    $("#broker_form").validate({
        rules: {
            broker_name: {
                required: true,
            },
        },
        messages: {
            broker_name: {
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

</script>
@endsection