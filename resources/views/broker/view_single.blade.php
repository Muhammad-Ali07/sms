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
                    View Broker
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Broker Details
                            </h2>
                        </div>
                        <div class="p-5">
                            <table class="table">
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{ $brokerData->vehicle_types }}</td>
                                </tr>
                                <tr>
                                    <th>Broker City</th>
                                    <td>{{ $brokerData->broker_city }}</td>
                                </tr>
                                <tr>
                                    <th>Broker Limit</th>
                                    <td>{{ $brokerData->broker_limit }}</td>
                                </tr>
                                <tr>
                                    <th>Fix Vehicle Selection</th>
                                    <td>{{ $brokerData->veh_selection }}</td>
                                </tr>

                                @if($brokerData->now_bank->isNotEmpty())
                                    @foreach ($brokerData->now_bank as $item)
                                        <tr>
                                            <th>Bank Title</th>
                                            <td>{{ $item->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bank Name</th>
                                            <td>{{ $item->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Account Number</th>
                                            <td>{{ $item->broker_bank }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No bank details available</td>
                                    </tr>
                                @endif

                                @if($brokerData->now_broker_phone->isNotEmpty())
                                @foreach ($brokerData->now_broker_phone as $phone)
                                <tr>
                                            <th>Phone</th>
                                            <td>{{ $phone->phone }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No phone numbers available</td>
                                    </tr>
                                @endif

                                @if($brokerData->other->isNotEmpty())
                                    @foreach ($brokerData->other as $item)
                                        <tr>
                                            <th>Document Name</th>
                                            <td>{{ $item->doc_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Document File</th>
                                            <td>
                                                <img src="{{ asset($item->doc_file) }}" style="height: 100px; width: 100px;" alt="Document">
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No additional documents available</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
