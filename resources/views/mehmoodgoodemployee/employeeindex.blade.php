@include('includes/header')

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<!-- include top header -->
@include('includes/top_header')
<!-- End include top header -->

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<!-- include side Bar -->
@include('includes/side_bar')
<!-- End include sider Bar -->
<div class="pcoded-content">

<!-- include Top Dashboard -->
@include('includes/top_dashboard')
<br>
<div class="container">
<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
<center><h3 class="form_toheader"><u>Employee Forms</u></h3></center>
</div>
<div class="container"><br><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/addemployee')}}">		
<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">
<i class="fa fa-money mat-icon f-24"></i>
</div>
<div class="col-9 cst-cont">
<h4>Add Employee</h4>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/addemployee_report')}}">
<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">

<i class="fa fa-credit-card f-24 mat-icon"  aria-hidden="true"></i>

</div>
<div class="col-9 cst-cont">
<h4>Employee Report</h4>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="row">
<div class="col-md-2"></div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/sallary')}}">

<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">
<i class="fa fa-money mat-icon f-24"></i>
</div>
<div class="col-9 cst-cont">
<h4>Salary</h4>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/loanadvance')}}">

<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">

<i class="fa fa-credit-card f-24 mat-icon"  aria-hidden="true"></i>

</div>
<div class="col-9 cst-cont">
<h4>Advance Salary</h4>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/sallaryledger')}}">

<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">
<i class="fa fa-money mat-icon f-24"></i>
</div>
<div class="col-9 cst-cont">
<h4>Salary Ledger</h4>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-md-4">
<a href="{{url('/mehmoodgoodemployee/employeloan')}}">

<div class="card mat-clr-stat-card text-white green ">
<div class="card-block">
<div class="row">
<div class="col-3 text-center bg-c-green">
<i class="fa fa-money mat-icon f-24"></i>
</div>
<div class="col-9 cst-cont">
<h4>Employee Loan</h4>
</div>
</div>
</div>
</div></a>
</div>
</div>



</div>

</div>
<!-- Basic Form Inputs card end -->
</div>
</div>

</div>                       
</div>

</div>
</div>
</div>
</div>
</div>

<!-- Warning Section Starts -->

@section('script')
<script type="text/javascript">
$(function () {
$('#datetimepicker1').datetimepicker();
});
</script>
</div>
@endsection

@include('includes/footer')<div class="container">
