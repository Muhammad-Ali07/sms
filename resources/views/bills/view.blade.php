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
                        Bills
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    View Bills
                                </h2>
                                <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                   <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                                   <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                                   </div> -->
                            </div>
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <table id="table-view-bill" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bill No.</th>
                                            <th>Status</th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <!--<th>Type</th>-->
                                            <th>Grand Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

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
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var mh = [];
        var status = 'null';
        var ids = 0;

        $('#table-view-bill').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('get-bills')}}",
            columns: [
                {data: 'sno'},
                {data: 'bill_Number'},
                {data: 'status'},

                {data: 'name'},
                {data: 'bill_date'},
                // {data: 'desType'},
                {data: 'total'},
                {data: 'action'}
            ]
        });

        function hello_medical(id){
            if ($("#hello_"+id).is(':checked')){
                status = 'medical_hide';
            }
            else{
                status = 'null';
            }
        }

        function hello_carton(id){
            if ($("#carton_check_"+id).is(':checked')){
                status = 'carton_hide';
            }
            else{
                status = 'null';
            }
        }

        function view_update(id){
            ids = id;
            bill_ready()
        }

        function bill_ready(){
            var url = '<?php echo url('/') ?>/generateBillById/'+ids+'/'+status+'';
            // location.href = url;
            window.open(
                url,
                '_blank' // <- This is what makes it open in a new window.
            );

        }

        $(document).ready(function(){
            $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                e.preventDefault();
                $("#dialog-confirm").dialog("close");
            });

            let startSerial = $('#examples tbody tr:nth-of-type(1) td:nth-of-type(1)').text().trim();
            let endSerial = $('#examples tbody tr:nth-last-of-type(1) td:nth-of-type(1)').text().trim();

            for (let i = startSerial; i <= endSerial; i++) {
                $("#datatable").on("click","#showBox" + i,function(e){
                    e.preventDefault();
                    $("#dialog-confirm")
                        .dialog("option", "title", "Please Confirm")
                        .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                });
            }
        });
    </script>
@endsection
