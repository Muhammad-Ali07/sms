<div class="tbl">
  <table class="table table-condensed table-striped">
    <thead>
      <tr>
        <th>Employee Name</th>
        <th>Current Salary</th>
        <th>Pending Amount</th>
        <th>Deductive Amount</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee as $row)
<?php
$salary =DB::table('salary')->where('employeeID',$row->employeeID)->first();

?>      

      <tr>
        <td>{{$row->fullName}} {{$row->employeeID}} <input type="hidden" id="name<?php echo $row->employeeID; ?>" name="name" /></td>
        <td>{{(!empty($salary) ? $salary->salary : '')}}</td>
       
        <td>
          <input type="text" id="deduction<?php echo $row->employeeID; ?>" name="deduction" value="<?php $balance = 0;$debit = 0;$credit = 0;foreach($ledger as $res){if($res->fk_emp_id == $row->employeeID){$debit = $res->el_debit;$credit = $res->el_credit;$balance = $balance + $debit - $credit;}}echo $balance;?>" readonly/>
        </td>
        <?php
          $total = 0;
          $total = (int) $row->emp_salary + (int) $balance ;
        ?>
        <td><input type="text" id="deduct<?php echo $row->employeeID; ?>" name="deduct" value="0"/></td>
        <td><input type="text" id="total<?php echo $row->employeeID; ?>" name="total" value="<?php echo $total; ?>" readonly/></td>
        <td>

          <button id="ins<?php echo $row->employeeID; ?>" class="btn btn-sm btn-primary" <?php
            foreach($eledger as $rows){
              if($rows->fk_emp_id == $row->employeeID){
                  echo 'disabled';
              }
            }
          ?>>Pay</button>
        </td>
      </tr>
      <script>
        $(document).ready(function(){
          $(document).on('click','#ins<?php echo $row->employeeID; ?>', function(){
            var current_context = $(this).val();
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url:"{{ url('addSalary') }}",
              type:'POST',
              data:{date:$('#salaryDate').val(),employee:<?php echo "'$row->employeeID'"; ?>,desc:"Monthly Employee Salary",salary:"<?php echo $row->emp_salary; ?>",type:"Salary",deduct:$('#deduct<?php echo $row->employeeID; ?>').val()},
              success:function(response){
                alert('Employee Salary record has been saved successfully');
              }
              });
            });
          });
      </script>
      @endforeach
    </tbody>
  </table>
</div>
