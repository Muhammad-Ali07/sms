<!DOCTYPE html>
<html>
<head>

	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <link rel="stylesheet" href="{{ asset('public/assets/fonts/ArialUnicodeMS.ttf') }}"> -->
	<!-- <style>
		*{  font-family: 'Droid Arabic Naskh' }
	</style> -->
</head>
 
<body onload="window.print()">
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="width: 100%;">
		<table style="text-align: center;" border="1">
			<thead>
                          <th>Loan Type</th>
                          <th>Employee Type</th>
                          <th>Employee Name </th>
                          <th>Father Name</th>
                          <th>Mobile Number</th>
                          <th>CNIC</th>
                          <th>Salary </th>
                          <th>Payment Method </th>
                          <th>Date </th>
                          <th>Amount </th>
                        </thead>
<tbody>
@foreach($employee_loan as $alary)
<tr>
<td> {{$alary->LoanType}} </td>
<td> {{$alary->employee_type}} </td>
<td> {{$alary->employee_name}}  </td>
<td> {{$alary->father_name}}  </td>
<td> {{$alary->mobile_number}}  </td>
<td> {{$alary->cnic}}  </td>
<td> {{$alary->current_salary}}  </td>
<td> {{$alary->payment_method}}  </td>
<td> {{$alary->Date}}  </td>
<td> {{$alary->amount}}  </td>

</tr>
@endforeach
</tbody>
	
		</table>
	
</body>
</html>