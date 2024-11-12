@include('includes/head')
@include('includes/nav')
@include('includes/header')
<script>
window.onload = function(){
   MaskedInput({
      elm: document.getElementById('cnic'), // select only by id
      format: '_____-_______-_',
      separator: '-'
   });
};





// masked_input_1.4-min.js
// angelwatt.com/coding/masked_input.php
(function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));
</script>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Add | Edit a Employee</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
              @if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
              <?php
                if(isset($emp[0]->emp_id)){
                  $form = url('updateEmp');
                }else{
                  $form = url('addEmp');
                }
              ?>
              <form method="post" action='{{$form}}'>
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="hidden" name="id" id="id" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_id;} ?>" class="form-control col-md-7 col-xs-12">
                <meta name="csrf-token" content="{{csrf_token()}}">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Employee Name</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="name" id="name" required value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_name;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date Appointed</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="date" id="datepicker" required value="<?php if(isset($emp[0]->emp_id)){echo date('d-m-Y',strtotime($emp[0]->emp_date_join));} ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Phone</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="phone" id="phone" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_phone;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Mobile</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="mobile" id="mobile" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_mobile;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">CNIC</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="cnic" id="cnic" maxlength="15" required value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_cnic;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Address</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="address" id="address" required value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_address;} ?>" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" required for="first-name">Salary Amount</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" id="salary" name="salary" value="<?php if(isset($emp[0]->emp_id)){echo $emp[0]->emp_salary;} ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <input type="submit" name="insertdata" class="btn btn-success" value="Save" <?php if($insertion == 0){echo 'disabled'; }?>>
                  </div>
                </div>
              </form>
            </span>
            <!-- FORM ENDS HERE -->
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>View All Employees</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Joining Date</th>
                  <th>Cnic</th>
                  <th>Phone</th>
                  <th>Mobile</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $serial = 0; ?>
                @foreach($emp_info as $row)
                <?php $serial += 1; ?>
                <tr>
                  <td>{{$row->emp_id}}</td>
                  <td>{{$row->emp_name}}</td>
                  <td>{{$row->emp_address}}</td>
                  <td>{{$row->emp_date_join}}</td>
                  <td>{{$row->emp_cnic}}</td>
                  <td>{{$row->emp_phone}}</td>
                  <td>{{$row->emp_mobile}}</td>
                  <td>{{$row->emp_salary}}</td>
                  <td>
                    <?php if($edition == 1){?>
                      <a href="<?php echo url('/emp_edit/'.$row->emp_id); ?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil"></i></a>
                    <?php }else{ ?>
                      <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                        <i class="fa fa-pencil"></i>
                      </a>
                    <?php } ?>
                     ||
                     <?php if($deletion == 1){?>
                     <a href="<?php echo url('/emp_remove/'.$row->emp_id); ?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
                    <?php }else{ ?>
                      <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                        <i class="fa fa-times"></i>
                      </a>
                    <?php } ?>
                  </td>
                </tr>
                <script>
                $(document).ready(function(){
                  $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                      e.preventDefault();
                      $("#dialog-confirm").dialog("close");
                  });
                  $("#datatable").on("click","#showBox<?php echo $serial; ?>",function(e){
                      e.preventDefault();
                      $("#dialog-confirm")
                      .dialog("option", "title", "Please Confirm")
                      .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                  });
                });
                </script>
                <script>
                $(document).ready(function(){
                  $("#dialog-confirm").dialog({ autoOpen: false }).find("a.cancel").click(function(e){
                      e.preventDefault();
                      $("#dialog-confirm").dialog("close");
                  });
                  $("#datatable").on("click","#showBox2<?php echo $serial; ?>",function(e){
                      e.preventDefault();
                      $("#dialog-confirm")
                      .dialog("option", "title", "Please Confirm")
                      .dialog("open").find("a.ok").attr({href: this.href, target: this.target});
                  });
                });
                </script>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('popup')
@include('includes/footer')
