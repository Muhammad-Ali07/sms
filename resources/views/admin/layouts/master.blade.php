<!DOCTYPE html>
<html lang="en" class="light">
   <head>
      <meta charset="utf-8">
      <link href="src/images/favicon.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="NSK admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, NSK Admin Template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="LEFT4CODE">
      <title>Dashboard - NSK - Management System</title>
      <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 
   </head>

    <body class="@yield('body')">
       
       @yield('main-content')
      
      <!-- BEGIN: Dark Mode Switcher-->
      <!-- BEGIN: Dark Mode Switcher-->
      <!-- BEGIN: JS Assets-->
      <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
      <div class="cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10 onClickdivAddorRemove">
         <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
         <div class="dark-mode-switcher__toggle border"></div>
      </div>
      <!-- END: Dark Mode Switcher-->
      <script src="{{asset('dist/js/jquery.js')}}"></script>
      <script src="{{asset('dist/js/app.js')}}"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <script>
    $(function() {
        $("#tabs").tabs();
    });
    </script>
      <script src="http://www.ajsoftpk.com/urdutextbox/urdutextbox.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/handsontable@latest/dist/handsontable.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/handsontable@latest/dist/handsontable.full.css">
 
      <script>
         window.onload = myOnload;
         function myOnload(evt){
             MakeTextBoxUrduEnabled(txtBox);//enable Urdu in html text box
             MakeTextBoxUrduEnabled(txtBox2);//enable Urdu in html text area
         }
      </script>
      <script>
         $(".onClickdivAddorRemove").click(function(){
           $(".light").toggleClass("dark");
         });
      </script>
      <!-- END: Dark Mode Switcher-->
      <!-- BEGIN: JS Assets-->
      <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="https://nsklog.com/nskupdated/public/assets/global/plugins/select2/select2.min.js"></script>
    <script src="https://nsklog.com/nskupdated/public/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="https://nsklog.com/nskupdated/public/assets/global/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
 
      @yield('script')
      <script>
          $(document).ready(function() {
             $('#example').DataTable( {
                 dom: 'Bfrtip',
				"order": [],
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         } );
               
      </script>
      <script>
         $(document).ready(function() {
             $('#examples').DataTable( {
                 dom: 'Bfrtip',
				 "order": [],
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         } );
               
      </script>
      <script>
         $(document).ready(function() {
             $('#exampless').DataTable( {
                 dom: 'Bfrtip',
				 "order": [],
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         } );
               
      </script>
      <!-- END: JS Assets-->
   </body>
      <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivEmail"); var add_button = $(".AddMoreEmail"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12"><div class="mt-2"><label for="regular-form-3" class="form-label">Email</label><input id="regular-form-3" type="text" class="form-control" placeholder="Enter Email"  name="emails[]"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivbar"); var add_button = $(".AddMorePhone"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12" id="rem-'+x+'"><div class="mt-2"><label for="regular-form-3" class="form-label">Phone</label><input id="regular-form-3" type="text" class="form-control" placeholder="Enter Phone"  name="phones[]"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
          $(document).on('click',".btn_remove", function(e) {
    e.preventDefault();
    $('#rem-'+x+'').remove();
    x--;
    });
      });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivAddress"); var add_button = $(".AddMoreAddress"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12"><div class="mt-2"><label for="regular-form-3" class="form-label">Address</label><textarea id="regular-form-3" class="form-control" placeholder="Enter Address"  name="address[]"></textarea></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivAddress_ware"); var add_button = $(".AddMoreAddress"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12" id="rem-'+x+'"><div class="mt-2"><label for="regular-form-3" class="form-label">Address(Warehouse)</label><textarea id="regular-form-3" class="form-control" placeholder="Enter Address" name="address[]"></textarea><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
           $(document).on('click',".btn_remove", function(e) {
    e.preventDefault();
    $('#rem-'+x+'').remove();
    x--;
    });
      });
   </script>
      <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivAddress_stat"); var add_button = $(".AddMoreAddress_stat"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12" id="rem-'+x+'"><div class="mt-2"><label for="regular-form-3" class="form-label">Address</label><textarea id="regular-form-3" class="form-control" placeholder="Enter Address" name="address[]"></textarea><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
           $(document).on('click',".btn_remove", function(e) {
    e.preventDefault();
    $('#rem-'+x+'').remove();
    x--;
    });
      });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivEmail"); var add_button = $(".AddMoreStation"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12"><div class="mt-2"><label for="regular-form-4" class="form-label">Station</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Station"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivDestination"); var add_button = $(".AddMorePhone"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12"><div class="mt-2"><label for="regular-form-5" class="form-label">Destination</label><input id="regular-form-5" type="text" class="form-control" placeholder="Enter Destination" name="destinations[]"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivDetail"); var add_button = $(".AddMoreDetail"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12"><div class="mt-2"><label for="regular-form-4" class="form-label">Detail</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Detail"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".senderForm"); var add_button = $(".AddMoreSender"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-4"><label for="regular-form-1" class="form-label">Sender</label><select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example"><option>Sender 1</option><option>Sender 2</option><option>Sender 3</option></select></div><div class="col-span-4"><label for="regular-form-4" class="form-label">Sender Name</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Sender Name"></div><div class="col-span-4"><label for="regular-form-4" class="form-label">Sender Phone</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Sender Phone"></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".receiverForm"); var add_button = $(".AddMoreReceiver"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-4"><label for="regular-form-1" class="form-label">Receiver</label><select id="regular-form-1" class="form-select sm:mr-2" aria-label="Default select example"><option>Receiver 1</option><option>Receiver 2</option><option>Receiver 3</option></select></div><div class="col-span-4"><label for="regular-form-4" class="form-label">Receiver Name</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Receiver Name"></div><div class="col-span-4"><label for="regular-form-4" class="form-label">Receiver Phone</label><input id="regular-form-4" type="text" class="form-control" placeholder="Enter Receiver Phone"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".GoodCalculation"); var add_button = $(".AddMoreGoodCalculation"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append(' <div class="col-span-3"><label for="regular-form-1" class="form-label">Packages</label><select name="package_id[]" id="regular-form-1" class="package_id form-select sm:mr-2" aria-label="Default select example">@if(!empty($packages)) @foreach($packages as $now_package)<option value="{{$now_package->id}}">{{$now_package->packagename}}</option> @endforeach @endif</select></div><div class="col-span-3"><label for="regular-form-1" class="form-label">Desc</label><input type="text" placeholder="Enter Description" class="form-control"  name="desc[]"></div><div class="col-span-3"><label for="regular-form-1" class="form-label">Quantity</label><input type="text" placeholder="Enter Quantity" class="form-control"   name="quantity[]"></div><div class="col-span-3"><label for="regular-form-1" class="form-label">Weight</label><input type="text" placeholder="Enter Weight"  name="weight[]" class="form-control"></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 100; var wrapper = $(".new_entry"); var add_button = $(".add"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<tr> <td><input type="text" placeholder="Quantity"> </td><td><select><option>Medicine</option><option>Literature</option><option>Sample</option><option>Carton</option><option>Weight</option><option>Other</option> </select></td><td><textarea Placeholder="Description"></textarea></td><td><input type="text"placeholder="Weight"></td><td><select><option>Paid</option><option>Unpaid</option></select></td><td><input type="text"placeholder="Remarks"></td></tr>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 100; var wrapper = $(".new_entry_"); var add_button = $(".add_deatils"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<tr><td><input type="text" placeholder=""></td><td><textarea Placeholder="Description"></textarea></td><td><input type="text" placeholder=""></td><td><input type="text" placeholder=""></td><td><input type="text" placeholder=""></td><td><input type="text" placeholder=""></td></tr>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; }) });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".other"); var add_button = $(".AddMoreother"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="rem" id="rem-'+x+'"><div class="col-span-3"><label for="regular-form-1" class="form-label">Charges Details</label><input type="text" name="other_charges[]" placeholder="Enter Charges Details" class="form-control"></div><div class="col-span-3"><label for="regular-form-1" class="form-label">Amount</label><input type="text" placeholder="Enter Amount" class="form-control" name="amount[]"></div><div class="col-span-3"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div><div class="col-span-3"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
            $(document).on('click',".btn_remove", function(e) {
            e.preventDefault();
            $('#rem-'+x+'').remove();
            x--;
        });
      });
   </script>
   
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".othercharges"); var add_button = $(".AddMoreother_charges"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="rem" id="rem-'+x+'"><div class="col-span-3"><label for="regular-form-1" class="form-label">Charges Details</label><input type="text" name="other_charges[]" placeholder="Enter Charges Details" class="form-control"></div><div class="col-span-3"><label for="regular-form-1" class="form-label">Amount</label><input type="text" placeholder="Enter Amount" class="form-control" name="amount[]"></div><div class="col-span-3"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div><div class="col-span-3"></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
            $(document).on('click',".btn_remove", function(e) {
            e.preventDefault();
            $('#rem-'+x+'').remove();
            x--;
        });
      });
   </script>
    
	
	<script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".AddMorePackages1"); var add_button = $(".AddMorePackages"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-6"><label for="regular-form-1" class="form-label">Select Package</label><select id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package[]"> <option> Select Package </option> @if(!empty($packeges))@foreach($packeges as $packege)<option value="{{$packege->id}}"> {{$packege->packagename}}</option> @endforeach @endif </select></div><div class="col-span-6"></div><div class="lcl_station_details_view" style="width:100%; grid-column: span 12 / span 12"><table id="customTable"><thead><tr></tr></thead><tbody class="new_entry"></tbody></table></div>'); }});
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
            $(document).on('click',".btn_remove", function(e) {
            e.preventDefault();
            $('#rem-'+x+'').remove();
            x--;
        });
      });
   </script>
	
	
	
	
	
	
	
	<script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".AddMorePackageslcl"); var add_button = $(".AddMorePackages"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-6"><label for="regular-form-1" class="form-label">Select Package</label><select id="regular-form-1" class="lcl_packages form-select sm:mr-2" aria-label="Default select example" name="lcl_package[]"> <option> Select Package </option> @if(!empty($lcl_packeges))@foreach($lcl_packeges as $packege)<option value="{{$packege->id}}"> {{$packege->packagename}}</option> @endforeach @endif </select></div><div class="col-span-6"></div><div class="lcl_entrustation_details_view" style="width:100%; grid-column: span 12 / span 12"><table id="customTable"><thead><tr></tr></thead><tbody class="new_entry"></tbody></table></div>'); }});
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
            $(document).on('click',".btn_remove", function(e) {
            e.preventDefault();
            $('#rem-'+x+'').remove();
            x--;
        });
      });
   </script>
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".AddMorePackagesfcl"); var add_button = $(".AddMorePackages_fcl"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-6"><label for="regular-form-1" class="form-label">Select Package</label><select id="regular-form-1" class="packages form-select sm:mr-2" aria-label="Default select example" name="package[]"> <option> Select Package </option> @if(!empty($packeges))@foreach($packeges as $packege)<option value="{{$packege->id}}"> {{$packege->packagename}}</option> @endforeach @endif </select></div><div class="col-span-6"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div></div><div class="station_details_view" style="width:100%; grid-column: span 12 / span 12"><table id="customTable"><thead><tr></tr></thead><tbody class="new_entry"></tbody></table></div>'); }});
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
            $(document).on('click',".btn_remove", function(e) {
            e.preventDefault();
            $('#rem-'+x+'').remove();
            x--;
        });
      });
   </script>
   
   <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".Attach"); var add_button = $(".AddMoreAttach"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="grid grid-cols-12 gap-2 col-span-12" id="rem-'+x+'"><div class="col-span-8" ><label for="regular-form-1" class="form-label">Company Attachment</label><input id="regular-form-2" type="file" class="form-control" placeholder="Name" name="name"></div><div class="col-span-4"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div></div>'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
           $(document).on('click',".btn_remove", function(e) {
    e.preventDefault();
    $('#rem-'+x+'').remove();
    x--;
    });
      });
   </script>
   <script>
       $("#Reset").bind("click", function() {
    $("input, textarea").val("");
	});
	   </script>
	    <script>
    var newdate = document.getElementById('date_c').valueAsDate = new Date();
    // var newdate = new Date();
   
</script>
   <script>
  $(document).on('change','#switcher',function(){
      if($('.viewchange input:checkbox').attr('checked','checked')){
          $('.classic').toggleClass('open_classic');
          $('.wizard').toggleClass('open_wizard');
      }
  });
   </script>
   <script>
       $(document).on('click','#his_btn',function(){
        $('.builty_history').toggleClass('builty_history_show'); 
       });
   </script>
   <script>
 $(document).ready(function(){
    $(".wizard .step").each(function(e) {
        if (e != 0)
            $(this).hide();
    });
    
    
    // console.log(numItems);
    // var hello = 16-15;
    //     console.log(hello);
    //  if (numItems => 2){
    //     $("#next").show();
    //     $("#prev").show();
    // }
    //  else {
         
    //  }
            
    $("#prev").hide();
    $("#viewPrint").hide();
    $("#submit_wiz").hide();
    var count = 2;
    $("#next").click(function(){
        count++;
         $("#prev").show();
          var numItems = $('.wizard').children('div').length;
          --numItems
          if(numItems == count){
               $("#next").hide();
               $("#viewPrint").show();
    $("#submit_wiz").show();
          }
        //   $("#date_c").keyup(function () {
        //         var value = $(this).val();
        //         console.log(value)
        //         $(".date_c2").val(value);
        //     });
        var value = $("#date_c").val();
                // console.log(value)
                $(".date_c2").val(value);
        if ($(".wizard .step:visible").next().length != 0)
            $(".wizard .step:visible").next().show().prev().hide();
        else {
            $(".wizard .step:visible").hide();
            $(".wizard .step:first").show();
        }
        return false;
    });
      $(".date_c2").change(function () {
                var value2 = $(this).val();
                // console.log(value2);
                $(".date_c2").val(value2);
                $("#date_c").val(value2);
            });
    
    $("#prev").click(function(){
         count--;
       
         $("#next").show();
          
          
          if(count == 2){
               $("#prev").hide();
          }
        if ($(".wizard .step:visible").prev().length != 0)
            $(".wizard .step:visible").prev().show().next().hide();
        else {
            $(".wizard .step:visible").hide();
            $(".wizard .step:last").show();
        }
        return false;
    });
});
   </script>
<script>
$(document).ready(function(){
   $('.cs_type').click(function(){
       $('.cs_type').removeClass('active_');
       $(this).addClass('active_');
   });
});
</script>
<script>
  $(document).on('click',".cs_type_",function(){
        $(this).addClass('active_');
   });
</script>


<script>
$(document).ready(function(){
   $('.cs_lang').click(function(){ 
       $('.cs_lang').removeClass('active_');
       $(this).addClass('active_');
   });
});
</script>
<script>
  $(document).on('click',".cs_lang",function(){
        $(this).addClass('active_');
   });
</script>

<script>
   $(document).ready( function(){
       $('.close_pop').click(function() {
        $(".builty_history").removeClass("builty_history_show");
    });
   });
   </script>
	</html>