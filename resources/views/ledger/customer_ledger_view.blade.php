@include('includes/head')
@include('includes/nav')
@include('includes/header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Selected Customer Information</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-responsive table-condensed table-bordered">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Date</th>
                  <th>Particular</th>
                  <th>Reference</th>
                  <th>Payment</th>
                  <th>Reciept</th>
                  <th>Balance</th>
                </tr>
              </thead>
              <tbody>
                <?php $balance = 0; ?>
								@foreach($customer_ledger_record as $row)
                <tr>
                  <td>{{$row->cl_id}}</td>
                  <td>
                    <?php
        							if($row->cl_credit == '' || $row->cl_credit == NULL){
        								$date_format = date('d-m-Y',strtotime($row->cl_date));
        							}else{
        								$date_format = date('M-Y',strtotime($row->cl_date));
        							}
        							echo $date_format;
        						?>
                  </td>
                  <td>{{$row->cl_desc}}</td>
                  <td>{{$row->cl_reference}}</td>
                  <td><?php echo $debit = $row->cl_debit; ?></td>
                  <td><?php echo $credit = $row->cl_credit; ?></td>
                  <td>
        						<?php
        							$balance = $balance + $debit - $credit;
        							echo $balance;
        						?>
        					</td>
                </tr>
								@endforeach
              </tbody>
            </table>
          </div>
          <div class="x_panel">
            <div class="x_title">
              <h2>Generate Report</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- FORM STARTS HERE -->
              <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
                <form name="form2" method="post" action='{{url('getCustomerWiseLedgerReport')}}'>
                  <input type="hidden" value="{{csrf_token()}}" name="_token" />
                  <input type="hidden" value="{{$customer_id}}" name="id" />
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <label style="padding-top:8px;">
                      <span class="pull-left" style="padding-right:5px;padding-top:5px;"> Generate All Record </span>
                      <input type="checkbox" class="flat" name="all" id="all" />
                    </label>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date From
                    </label>
                    <meta name="csrf-token" content="{{csrf_token()}}">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="text" id="datepicker" name="from" value="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date To
                    </label>
                    <meta name="csrf-token" content="{{csrf_token()}}">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="text" id="datepicker1" name="to" value="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <input type="submit" id="view" name="insertdata" class="btn btn-success" value="Generate Report">
                    </div>
                  </div>
                </form>
              </span>
              <!-- FORM ENDS HERE -->
            </div>
          </div>
        </div>
      </div>
  	</div>
	</div>
</div>
<script>
  $(document).ready(function(){
    $('#view').click(function(){
      if($('#all').prop('checked') == false){
        $('#datepicker').attr("required","required");
        $('#datepicker1').attr("required","required");
      }else{
        $('#datepicker').removeAttr("required");
        $('#datepicker1').removeAttr("required");
      }
    });
  });
</script>
@include('includes/footer')
