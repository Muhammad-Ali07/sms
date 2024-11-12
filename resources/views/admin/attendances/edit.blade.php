@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')


 @include('includes.mobile-nav')
      <div class="flex">
         @include('includes.side-nav')
    {!! HTML::style('assets/global/css/components.css') !!}
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    {!! HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('assets/global/plugins/select2/select2.css') !!}
    {!! HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
    <!-- END PAGE LEVEL STYLES -->

    <div class="content">


        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title text-lg font-medium mr-auto">
        {{$pageTitle}}</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{route('admin.dashboard.index')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('admin.attendances.index')}}">Attendance</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">attendance</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

            {{--INLCUDE ERROR MESSAGE BOX--}}
            @include('admin.common.error')
            {{--END ERROR MESSAGE BOX--}}

               <div class="row">
                           <div class="col-md-4 form-group">
                           {!! Form::open(['route'=>["admin.attendances.create"],'class'=>'form-horizontal','method'=>'GET']) !!}

                                  <div class="input-group input-medium date date-picker"   data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                       <input type="date" class="form-control" name="date"  placeholder="select another date">
                                       <span class="input-group-btn">


                                       </span>
                                       <button class="btn blue" style="z-index: 1" type="submit"></i> Edit</button>
                                  </div>

                           {!! Form::close() !!}

                                 </div>

                           <div class="col-md-4 form-group">

                             @if($date!=date('Y-m-d'))
                                 <a href="{{route('admin.attendances.create')}}" class="btn green">
                                    Mark Todays Attendance <i class="fa fa-plus"></i>
                                 </a>
                            @endif


                            </div>




               </div>

            <hr>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>
                            @if(isset($todays_holidays->date))
                                    Holiday , {{date('d M Y',strtotime($todays_holidays->date))}}
                             @else
                                    Mark Attendance
                            @endif
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body form">

                    @if(isset($todays_holidays->date))
                           <div class="note note-info">
                                        <h4 class="block">{{date('D', strtotime($todays_holidays->date))}}</h4>
                                        <p>
                                             Holiday on the occassion of {{ $todays_holidays->occassion }}
                                        </p>
                           </div>
                        @elseif(count($employees)==0)
                        <hr>
                    <div class="note note-warning">
                                    <h4 class="block">Employees Missing</h4>
                                    <p>
                                        Please add some employees to the database
                                    </p>
                       </div>
                       <hr>
                        @else
                    <!-- BEGIN FORM-->
                    {!! Form::open(['route'=>["admin.attendances.update",$date],'class'=>'form-horizontal','method'=>'PATCH']) !!}


                                <div class="form-body">

                                     <h3 class="form-section">Date  {{date('d-M-Y',strtotime($date))}}</h3>

                                    <div class="form-group">

                                       <label class="col-md-3 control-group">EmployeeID</label>
                                       <label class="col-md-2 control-group">Name</label>
                                       <label class="col-md-2 control-group">Status </label>
                                       <label class="col-md-2 control-group leaveType" id="leaveTypeLabel">Type of leave </label>
                                       <label class="col-md-2 control-group"><span class="halfLeaveType" id="halfDayLabel">half Day leave type</span> </label>
                                       <label class="col-md-3 control-group reason" id="reasonLabel">Reason </label>
                                    </div>
                                    {{-- @foreach($attendanceArray as $attend)
                                        @dump($attend)
                                    @endforeach --}}
                                    @foreach($employees as $employee)
                                        <div class="form-group">
                                            <label class="col-md-3 control-group">{{$employee->employeeID}} </label>
                                            <label class="col-md-2 control-group">{{$employee->fullName}} </label>
                                            <div class="col-md-2">
                                                {{-- <input type="checkbox"  id="checkbox{{$employee->employeeID}}" onchange="showHide('{{$employee->employeeID}}');return false;" class="checkbox make-switch" name="checkbox[{{$employee->employeeID}}]" checked data-on-color="success" data-on-text="P" data-off-text="A" data-off-color="danger"> --}}
                                                <input type="checkbox"
                                                id="checkbox{{$employee->employeeID}}"
                                                onchange="showHide('{{$employee->employeeID}}');return false;"
                                                class="checkbox make-switch"
                                                name="checkbox[{{$employee->employeeID}}]"
                                                {{ !empty($attendanceArray[$employee->employeeID]['checkin']) || (isset($attendanceArray[$employee->employeeID]['status']) && $attendanceArray[$employee->employeeID]['status'] == 'absent') ? 'disabled' : '' }}
                                                {{ !empty($attendanceArray[$employee->employeeID]['checkin']) ? 'checked' : '' }}
                                                data-on-color="success"
                                                data-on-text="P"
                                                data-off-text="A"
                                                data-off-color="danger">

                                                {{-- <input type="checkbox"
                                                id="checkbox{{$employee->employeeID}}"
                                                onchange="showHide('{{$employee->employeeID}}');return false;"
                                                class="checkbox make-switch"
                                                name="checkbox[{{$employee->employeeID}}]"
                                                {{ !empty($attendanceArray[$employee->employeeID]['checkin']) ? 'disabled' : '' }}
                                                {{ !empty($attendanceArray[$employee->employeeID]['checkin']) ? 'checked' : '' }}

                                                {{ !empty($attendanceArray[$employee->employeeID]['status']) == 'absent' ? 'disabled' : '' }}
                                                data-on-color="success"
                                                data-on-text="P"
                                                data-off-text="A"
                                                data-off-color="danger"> --}}

                                                {{-- <input type="checkbox"
                                                id="checkbox{{$employee->employeeID}}"
                                                onchange="showHide('{{$employee->employeeID}}');return false;"
                                                class="checkbox make-switch"
                                                name="checkbox[{{$employee->employeeID}}]"
                                                {{ empty($attendanceArray[$employee->employeeID]['leaveType']) ? 'checked' : '' }}
                                                data-on-color="success"
                                                data-on-text="P"
                                                data-off-text="A"
                                                data-off-color="danger"> --}}
                                                <input type="hidden"  name="employees[]" value="{{$employee->employeeID}}">
                                            </div>


                                            <div class="col-md-2" id="leaveType_div{{$employee->employeeID}}">
                                                @if(isset($attendanceArray[$employee->employeeID]['leaveType']))
                                                    {!!  Form::select('leaveType['.$employee->employeeID.']', $leaveTypes,$attendanceArray[$employee->employeeID]['leaveType'],['class' => 'form-control leaveType','onchange'=>'halfDayToggle('.$employee->employeeID.',this.value)','id'=>'leaveType'.$employee->employeeID.''] )  !!}
                                                @else
                                                    {!!  Form::select('leaveType['.$employee->employeeID.']', $leaveTypes,null,['class' => 'form-control leaveType','onchange'=>'halfDayToggle('.$employee->employeeID.',this.value)','id'=>'leaveType'.$employee->employeeID.''] )  !!}
                                                @endif
                                            </div>
                                            <div class="col-md-2" id="halfLeaveType_div{{$employee->employeeID}}">
                                                {{-- @dump($attendanceArray[$employee->employeeID]['leaveType']) --}}
                                                @if(isset($attendanceArray[$employee->employeeID]['leaveType']))
                                                     {!!  Form::select('leaveTypeWithoutHalfDay['.$employee->employeeID.']', $leaveTypeWithoutHalfDay,$attendanceArray[$employee->employeeID]['halfDayType'],['class' => 'form-control halfLeaveType','id'=>'halfLeaveType'.$employee->employeeID.''] )  !!}
                                                @else
                                                     {!!  Form::select('leaveTypeWithoutHalfDay['.$employee->employeeID.']', $leaveTypeWithoutHalfDay,null,['class' => 'form-control halfLeaveType','id'=>'halfLeaveType'.$employee->employeeID.''] )  !!}
                                                @endif
                                            </div>
                                             <div class="col-md-3" id="reason_div{{$employee->employeeID}}">
                                                    <input type="text" style="display:none;" class="form-control reason" id="reason{{$employee->employeeID}}" name="reason[{{$employee->employeeID}}]" placeholder="Absent Reason" value="{{ $attendanceArray[$employee->employeeID]['reason'] ?? ''}}">
                                             </div>
                                             <div class="col-md-2" class="checkoutBtn" class="checkin" id="checkoutBtn{{$employee->employeeID}}">
                                                <input type="text" readonly class="form-control reason" id="checkoutInput{{$employee->employeeID}}" name="checkout[{{$employee->employeeID}}]" placeholder="CheckOut Time" value="{{ $attendanceArray[$employee->employeeID]['checkout'] ?? ''}}">
                                                <button type="button" class="btn btn-success" id="checkout{{$employee->employeeID}}" onclick="checkoutCheckboxStatus('{{ str_pad($employee->employeeID, 3, '0', STR_PAD_LEFT) }}')" style="display:none;">Check Out</button>
                                                <script>
                                                    // Function to handle Check Out
                                                    function checkoutCheckboxStatus(employeeID) {
                                                        // Get the current time
                                                        var currentTime = new Date().toLocaleTimeString(); // Get only the time

                                                        // Create the input field HTML
                                                        var inputFieldHTML = `<input type="text" name="checkout[${employeeID}]" value="${currentTime}" readonly />`;

                                                        // Get the button element using its ID
                                                        var button = document.getElementById('checkout' + employeeID);

                                                        // Check if the button element exists
                                                        if (button) {
                                                            // Replace the button with the input field
                                                            button.outerHTML = inputFieldHTML;
                                                        } else {
                                                            console.error("Button with ID 'checkout" + employeeID + "' not found.");
                                                        }
                                                    }

                                                </script>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" readonly class="form-control reason" id="checkinInput{{$employee->employeeID}}" name="checkin[{{$employee->employeeID}}]" placeholder="CheckIn Time" value="{{ $attendanceArray[$employee->employeeID]['checkin'] ?? ''}}">
                                                <button type="button" onclick="checkCheckboxStatus('{{ str_pad($employee->employeeID, 3, '0', STR_PAD_LEFT) }}')" class="btn btn-success" id="checkin{{$employee->employeeID}}">Check In</button>
                                                <script>
                                                    function checkCheckboxStatus(employeeID) {
                                                        // Get the current time
                                                        var currentTime = new Date().toLocaleTimeString(); // Get only the time

                                                        // Create the input field HTML
                                                        var inputFieldHTML = `<input type="text" name="checkin[${employeeID}]" value="${currentTime}" readonly />`;

                                                        // Get the button element using its ID
                                                        var button = document.getElementById('checkin' + employeeID);

                                                        // Check if the button element exists
                                                        if (button) {
                                                            // Replace the button with the input field
                                                            button.outerHTML = inputFieldHTML;
                                                        } else {
                                                            console.error("Button with ID 'checkin" + employeeID + "' not found.");
                                                        }
                                                    }
                                                </script>
                                             </div>

                                        </div>
                                     @endforeach

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <button type="submit"   class="btn green"><i class="fa fa-edit"></i> Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                        {!!  Form::close()  !!}

                            @endif
                                                <!-- END FORM-->

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>



@stop

@section('script')
    <!-- END PAGE LEVEL PLUGINS -->
    {!! HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') !!}

    <script>
        jQuery(document).ready(function() {
            ComponentsPickers.init();
        });


	</script>
 <script>

        $('.leaveType').hide();
        $('.reason').hide();
        $('.halfLeaveType').hide();
        // $('.checkin').show();




       @foreach($attendanceArray as $attend)
       {
        @if($attend['status']=='absent')
            $('#leaveTypeLabel').show(100);
            $('#reasonLabel').show(100);
            $("#checkin{{$attend['employeeID']}}").hide();

            @if($attend['leaveType']=='half day')
             		$("#halfLeaveType{{$attend['employeeID']}}").show();
			@endif
            @if($attend['leaveType']=='public holiday')
             		$("#halfLeaveType{{$attend['employeeID']}}").show();
			@endif

            @if($attend['halfDayType']	!=null)
                $('#halfDayLabel').show(100);
                $("#reason{{$attend['employeeID']}}").show();
                $("#leaveType{{$attend['employeeID']}}").show();
                $("#halfLeaveType{{$attend['employeeID']}}").hide();
                $(".bootstrap-switch-id-checkbox{{$attend['employeeID']}}").bootstrapSwitch('state',false);
            @else
                $('#halfDayLabel').show(100);
                $("#reason{{$attend['employeeID']}}").show();
                $("#leaveType{{$attend['employeeID']}}").show();
                $("#halfLeaveType{{$attend['employeeID']}}").hide();
                $(".bootstrap-switch-id-checkbox{{$attend['employeeID']}}").bootstrapSwitch('state',false);

            @endif
            // $(".checkbox").bootstrapSwitch('state',true);


        @else
             @if (!empty($attend['checkin']))
                $("#checkin{{$attend['employeeID']}}").hide();
                $("#checkinInput{{$attend['employeeID']}}").show();
                $("#checkout{{$attend['employeeID']}}").show();

                $("#checkoutBtn{{$attend['employeeID']}}").show();

                $("#reason_div{{$attend['employeeID']}}").hide();
                $("#leaveType_div{{$attend['employeeID']}}").hide();
                $("#halfLeaveType_div{{$attend['employeeID']}}").hide();

                @else
                $("#checkin{{$attend['employeeID']}}").show();
                $("#reason{{$attend['employeeID']}}").hide();
                $("#leaveType{{$attend['employeeID']}}").hide();
                $("#halfLeaveType{{$attend['employeeID']}}").hide();
             @endif


             @if (!empty($attend['checkout']))
                $("#checkout{{$attend['employeeID']}}").hide();
                $("#checkoutInput{{$attend['employeeID']}}").show();
                // $("#checkout{{$attend['employeeID']}}").show();

                $("#reason_div{{$attend['employeeID']}}").hide();
                $("#leaveType_div{{$attend['employeeID']}}").hide();
                $("#halfLeaveType_div{{$attend['employeeID']}}").hide();

             @endif

        @endif

       }
       @endforeach

     function showHide(id){
                $('#leaveTypeLabel').show(100);
                $('#reasonLabel').show(100);
                // $('#checkin'+id).show();


            if($('#checkbox'+id+':checked').val() == 'on') {
                    $('#leaveType'+id).hide(1000);
                    $('#reason'+id).hide(1000);

            } else {
                $('#leaveType'+id).show(100);
                $('#reason'+id).show(500);
                $('#checkin'+id).show();

            }
     }

     function halfDayToggle(id,value){

		if(value	==	'half day')
		{
			$('#halfDayLabel').show(100);
			$('#halfLeaveType'+id).show(100);
		}else{
			$('#halfLeaveType'+id).hide(100);
		}


     }
 </script>

@stop
















