@extends('layouts.master')

@section('body')
    main
@endsection

@section('main-content')
    @include('includes.mobile-nav')

    <div class="flex">
        @include('includes.side-nav')

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('includes.top-bar')
            <!-- END: Top Bar -->

            <form method="post"
                  @if(empty($select)) action="{{ route('add-customer-process') }}"
                  @else action="{{ route('customer-Edit-Process') }}"
                  @endif >
                @csrf

                <div class="grid">
                    <div class="intro-y flex items-center mt-12">
                        <h2 class="text-lg font-medium mr-auto">
                            View Customer
                        </h2>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Input -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Edit Customer Information
                                    </h2>
                                </div>

                                <div id="input" class="p-5">
                                    <div class="preview">
                                        <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-6" style="margin:0px 0px 0px 30px;padding">
                                                <label class="radio-switch-1">Customer Type</label><br><br>
                                                <input id="regular-form-2" value="{{ $customer->builtytype }}" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="col-span-6">
                                                <label for="regular-form-1" class="form-label">Customer Id</label>
                                                <input id="regular-form-2" value="{{ $customer->customer_id }}" type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="mt-2 c_name">
                                            <label for="regular-form-2" class="form-label">Customer Name</label>
                                            <input id="regular-form-2" value="{{ $customer->name }}" type="text" class="form-control" readonly>
                                        </div>

                                        <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-4 mt-2">
                                                <label for="regular-form-4" class="form-label">NTN No</label>
                                                <input id="regular-form-2" value="{{ $customer->contact_point }}" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="col-span-4 mt-2">
                                                <div class="col-span-12">
                                                    <label for="regular-form-4" class="form-label">Email</label>
                                                    <input id="regular-form-2" value="{{ $customer->email ?? 'Not provided' }}" type="text" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-span-4 mt-2">
                                                <!-- No of Prints can be included if needed -->
                                            </div>
                                        </div>

                                        <div class="mt-2 grid grid-cols-12 gap-2 position-relative phoneDivbar">
                                            <div class="col-span-12">
                                                <div class="mt-2">
                                                    <label for="regular-form-5" class="form-label">Phone</label>
                                                    @foreach($Phone as $phoneNo)
                                                        <input id="regular-form-2" value="{{ $phoneNo->phone }}" type="text" class="form-control" readonly>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <label for="regular-form-6" class="form-label">Address (Office)</label>
                                            <input id="regular-form-2" value="{{ $customer->Cus_Address }}" type="text" class="form-control" readonly>
                                        </div>

                                        <div class="mt-2 grid grid-cols-12 gap-2 position-relative-textarea phoneDivAddress_ware">
                                            <div class="col-span-12">
                                                <div class="mt-2">
                                                    <label for="regular-form-6" class="form-label">Address (Warehouse)</label>
                                                    @foreach($Address as $WAddress)
                                                        <input id="regular-form-2" value="{{ $WAddress->address }}" type="text" class="form-control" readonly>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Input -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Content -->
    </div>
@endsection
