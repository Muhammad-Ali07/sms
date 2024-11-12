<!DOCTYPE html>
<html>
<head>
<style>
.page-break {
    page-break-after: always;
}
</style>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <link rel="stylesheet" href="{{ asset('public/assets/fonts/ArialUnicodeMS.ttf') }}"> -->
  <!-- <style>
    *{  font-family: 'Droid Arabic Naskh' }
  </style> -->
</head>

    <div style="width:200%;">
            <img src="{{ url("public/images/MGT_LOGO-1.png") }}" width="1500%">
      </div>

<body>
    <table width="100%" align="right" >
      <tr>
        <td ><b style="font-size:12px;margin-left:-40px !important">Module</b><span> : Employee</span></td>
      </tr>
      <tr>
        <td><b style="font-size:12px;text-align:right;">User</b> <span style="position:absolute;right:143px;"> :{{Auth::user()->name}} </span></td>
      </tr>
      <?php
      $date = date('d-m-Y');
      date_default_timezone_set("Asia/Karachi");
      ?>
      <tr>
        <td><b style="font-size:12px;text-align:right;">Run Date</b> : <?php if(isset($run_date)){ echo $run_date; } ?> &nbsp;&nbsp;&nbsp;  {{date('h:i:a')}}</td>
      </tr>
    </table>
 <h6 style="float:left; font-size: 12px;"><b><u>Employee Basic Info</u></b></h6>
  <h6 style="float:right;width:47%;font-size:12px;"><b><u>Status</u></b> Active</h6>
  
<table width="100%"  >
 <tr>
<td width="15%" style="text-align:left; "><b>First Name:</b></td>
<td width="15%" style="border-bottom:1px solid #000">Umair</td>
<td width="20%" style="text-align:left; "><b>Employee F.Name:</b></td>
<td width="15%" style="border-bottom:1px solid #000">Umair</td>  
    </tr>
    <br>
   <tr>
<td width="15%" style="text-align:left; "><b>Phone:</b></td>
<td width="15%" style="border-bottom:1px solid #000">0316-3858458</td>
<td width="20%" style="text-align:left; "><b>Mobile:</b></td>
<td width="15%" style="border-bottom:1px solid #000">0316-3858458</td>  
    </tr>
    <br>
     <tr>
<td width="15%" style="text-align:left; "><b>CNIC:</b></td>
<td width="17%" style="border-bottom:1px solid #000">41304-19052-25-1</td>
<td width="20%" style="text-align:left; "><b>Joining Date:</b></td>
<td width="15%" style="border-bottom:1px solid #000">11-11-2019</td>  
    </tr>
    <br>
     <tr>
<td width="15%" style="text-align:left; "><b>Joining Salary:</b></td>
<td width="15%" style="border-bottom:1px solid #000">25000</td>
<td width="20%" style="text-align:left; "><b>Current Salary:</b></td>
<td width="15%" style="border-bottom:1px solid #000">30000</td>  
    </tr>
  <br>
       <tr>
<td width="15%" style="text-align:left; "><b>Address:</b></td>
<td width="30%" style="border-bottom:1px solid #000">Clifton House Karachi</td>
    </tr>
    <br>
    <tr>
      <td width="10%" style="text-align:left; "><b>Category</b></td>
      <td width="15%" >  <input type="radio" name="gender" value="male" checked> Male</td>
    </tr>
    </table>
      

</body>

</html>
