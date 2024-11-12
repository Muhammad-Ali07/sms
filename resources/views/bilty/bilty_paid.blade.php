<script>
$(document).ready(function(){
/*******************************************************************************
********************************************************************************
***** CHECKING IF THE CUSTOMER FIELD IS NOT SELECTED
********************************************************************************
*******************************************************************************/

  $('#insertion').click(function(){
    var sender = $('#sender').val();
    if(sender == 0){
      alert('Please Select a Sender');
    }
  });

/*******************************************************************************
********************************************************************************
***** HIDING AND SHOWING DESCRIPTION AND RATE ON LITERATURE SELECTION
********************************************************************************
*******************************************************************************/
  $('#station_type').change(function(){
    if($('#station_type').val() == 2){
      $('#grno').show();
      $('#grOnly').show();
    }else{
      $('#grno').hide();
      $('#grOnly').hide();
    }
  });

  $('#grno').hide();
  $('#grOnly').hide();
  var st = $('#station_type').val();
  if(st == 2){
    $('#grno').show();
    $('#grOnly').show();
  }else{
    $('#grno').hide();
    $('#grOnly').hide();
  }

  $('.tohide').show();
  $('.toshow').hide();
  $('.ctnQty').hide();
  var type_val = $('#type').val();
  $('#category').val(type_val);
  if(type_val == 'Literature'){
    $('.tohide').hide();
    $('.toshow').show();
    $('.ctnQty').hide();
    $('.whide').hide();
    $('#cweight').show();
    $('#details').html('Description');
  }

  else if(type_val == 'Other'){
    $('.tohide').hide();
    $('.toshow').show()
    $('.ctnQty').hide();
    $('.whide').hide();
    $('#cweight').show();
    $('#details').html('Description');
  }

  else if(type_val == 'Carton'){
    $('.tohide').hide();
    $('.toshow').show();
    $('.ctnQty').show();
    $('.whide').hide();
    $('.ctn').hide();
    $('#cweight').show();
  }

  else if(type_val == 'Weight'){
      $('#cweight').hide();
      $('.tohide').hide();
      $('.toshow').hide();
      $('.ctnQty').hide();
      $('.whide').show();
      $('#details').html('Ctn.Details');
  }

  else{
    $('#cweight').show();
    $('.tohide').show();
    $('.toshow').hide();
    $('.ctnQty').hide();
    $('.whide').hide();
    $('#details').html('Description');
  }

  /*
    ON CHANGE
  */
  $('#type').on('change',function(){
    var type_val = $('#type').val();
    $('#category').val(type_val);

    if(type_val == 'Literature'){
      $('.tohide').hide();
      $('.toshow').show();
      $('.ctnQty').hide();
      $('.whide').hide();
      $('#cweight').show();
      $('.otherTotal').hide();
      $('#details').html('Description');
      $('#checkOther').html('Weight');
    }

    else if(type_val == 'Other'){
      $('.tohide').hide();
      $('.toshow').show()
      $('.ctnQty').hide();
      $('.whide').hide();
      $('#cweight').show();
      $('.otherTotal').show();
      $('#details').html('Description');
      $('#checkOther').html('Weight/Qty');
    }

    else if(type_val == 'Carton'){
      $('.tohide').hide();
      $('.toshow').show();
      $('.ctnQty').show();
      $('.whide').hide();
      $('.ctn').show();
      $('.otherTotal').hide();
      $('#cweight').show();
      $('#checkOther').html('Weight');
    }

    else if(type_val == 'Weight'){
        $('#cweight').hide();
        $('.tohide').hide();
        $('.toshow').hide();
        $('.ctnQty').hide();
        $('.whide').show();
        $('.otherTotal').hide();
        $('#details').html('Ctn.Details');
        $('#checkOther').html('Weight');
    }

    else{
      $('#cweight').show();
      $('.tohide').show();
      $('.toshow').hide();
      $('.ctnQty').hide();
      $('.whide').hide();
      $('#details').html('Description');
      $('.otherTotal').hide();
      $('#checkOther').html('Weight');
    }

  });

/*******************************************************************************
********************************************************************************
***** SETTING CATEGORY NAME ON TEXTBOX
********************************************************************************
*******************************************************************************/
  $('#category').val($('#type').val());
/*******************************************************************************
********************************************************************************
***** CALCULATING TOTAL QUANTITY OF SMALL AND LARGE
********************************************************************************
*******************************************************************************/
  $('#small').keyup(function(){

    var small=$('#small').val();
    var large=$('#large').val();

    if(small == '' && large != ''){
      $('#qty').val(large);
    }else if(small != '' && large == ''){
      $('#qty').val(small);
    }else if(small != '' && large != ''){
      $('#qty').val(parseInt(small) + parseInt(large));
    }
  });

  $('#large').keyup(function(){

    var small=$('#small').val();
    var large=$('#large').val();

    if(small == '' && large != ''){
      $('#qty').val(large);
    }else if(small != '' && large == ''){
      $('#qty').val(small);
    }else if(small != '' && large != ''){
      $('#qty').val(parseInt(small) + parseInt(large));
    }else{
      $('#qty').val('');
    }
  });

/*******************************************************************************
********************************************************************************
***** CALCULATING TOTAL BY WEIGHT AND RATE
********************************************************************************
*******************************************************************************/

  $('#weightkg').keyup(function(){
    var kg = $('#weightkg').val();
    var perkg = $('#ratekg').val();

    var kgtotal = parseFloat(kg) * parseFloat(perkg);
    $('#wtotal').val(kgtotal);
  });

  $('#ratekg').keyup(function(){
    var kg = $('#weightkg').val();
    var perkg = $('#ratekg').val();

    var kgtotal = parseFloat(kg) * parseFloat(perkg);
    $('#wtotal').val(kgtotal);
  });

/*******************************************************************************
********************************************************************************
***** CALCULATING TOTAL BY CTN QTY AND RATE
********************************************************************************
*******************************************************************************/

$('#ctnQty').keyup(function(){
  var ctn = $('#ctnQty').val();
  var rate = $('#ratectnQty').val();

  var total = parseInt(ctn) * parseInt(rate);
  $('#rate').val(total);
});

$('#ratectnQty').keyup(function(){
  var ctn = $('#ctnQty').val();
  var rate = $('#ratectnQty').val();

  var total = parseInt(ctn) * parseInt(rate);
  $('#rate').val(total);
});

$('#rate').keyup(function(){
  var weight = $('#weight').val();
  var rate = $('#rate').val();

  var total = parseInt(weight) * parseInt(rate);
  $('#otherTotal').val(total);
});
$('#weight').keyup(function(){
  var weight = $('#weight').val();
  var rate = $('#rate').val();

  var total = parseInt(weight) * parseInt(rate);
  $('#otherTotal').val(total);
});
/*******************************************************************************
********************************************************************************
***** GETTING GR_NO FROM SELECTED STATION
********************************************************************************
*******************************************************************************/

  $(document).on('change','#station_name', function(){
    var current_context = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url:"{{ url('get_station_gr') }}",
      type:'POST',
      async: false,
      data:$("#station_name").serialize(),
      success:function(data){
        $("#grNum").val(data[0].station_gr_no);
      }
    });
  });

/*******************************************************************************
********************************************************************************
***** GETTING TOTAL AMOUNT FROM TOTAL OF QTY AND SMALL, LARGE FIXED AMOUNTS
********************************************************************************
*******************************************************************************/
  $('#small,#large').keyup(function(){
    var smallQty = $('#small').val();
    var largeQty = $('#large').val();

    if(smallQty != '' && largeQty != ''){
      var fixedsmall = $('#smallRate').val();
      var fixedlarge = $('#largeRate').val();

      var largeTotal = parseInt(largeQty) * parseInt(fixedlarge);
      var smallTotal = parseInt(smallQty) * parseInt(fixedsmall);

      var result = parseInt(largeTotal) + parseInt(smallTotal);
      $('#amount').val(result);
    }
    else if(smallQty == ''){

      var fixedlarge = $('#largeRate').val();
      var largeTotal = parseInt(largeQty) * parseInt(fixedlarge);

      $('#amount').val(largeTotal);
    }
    else if(largeQty == ''){

      var fixedsmall = $('#smallRate').val();
      var smallTotal = parseInt(smallQty) * parseInt(fixedsmall);

      $('#amount').val(smallTotal);
    }
  });


/*******************************************************************************
********************************************************************************
***** GETTING STATION BY TYPE EXAMPLE (DOMESTIC,EXPORT)
********************************************************************************
*******************************************************************************/
    $(document).on('change','#station_type', function(){
      var current_context = $(this).val();
     
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#station_name').find('option').remove().end().append('<option value=""></option>').val('');
      $.ajax({
        url:"{{ url('get_station') }}",
        type:'POST',
        data:$("#station_type").serialize(),
        success:function(data){
          var option ='';
          for(var i=0;i<data.length;i++){
            option += '<option value="'+ data[i].id + '">' + data[i].name + '</option>';
          }
          $('#station_name').append(option);
          $('select').selectpicker('refresh');
        }
      });
    });
    /***************************************************************************
    ****************************************************************************
    ***** GETTING STATIONS ON EDIT
    ****************************************************************************
    ***************************************************************************/
    var q = $('#station_type').val();

    if(q > 0){
      var current_context = $(this).val();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#station_name').find('option').remove().end().append('<option value=""></option>').val('');
      $.ajax({
        url:"{{ url('get_station') }}",
        type:'POST',
        data:$("#station_type").serialize(),
        success:function(data){
          console.log(data);
          var option ='';
          var chk = '<?php if(isset($record[0]->bilty_station_id)){ echo $record[0]->bilty_station_id; }?>';
          for(var i=0;i<data.length;i++){
            if(data[i].station_id == chk){
              option += '<option value="'+ data[i].station_id + '" selected>' + data[i].station_city_name + '</option>';
              $('#city_name').val(data[i].station_id);
            }else{
              option += '<option value="'+ data[i].station_id + '">' + data[i].station_city_name + '</option>';
            }
          }
          $('#station_name').append(option);
          $('select').selectpicker('refresh');
          /*********************************************************************
          **********************************************************************
          ***** GETTING RATES AFTER GETTING STATIONS
          **********************************************************************
          *********************************************************************/
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url:"{{ url('get_station_rate') }}",
            type:'POST',
            data:{station_id:$("#station_name").val(),sender_id:$("#sender").val(),date:$("#datepicker").val()},
            success:function(data){
              var cat = $("#type").val();
              if(cat == 'Medicine'){

                $("#smallRate").val(data[0].medicine_small);
                $("#largeRate").val(data[0].medicine_large);
              }
              else if(cat == 'Sample'){
                $("#smallRate").val(data[0].sample_small);
                $("#largeRate").val(data[0].sample_large);
              }
              else if(cat == 'Carton'){
                $("#ratectnQty").val(data[0].ctn_rate);
              }else if(cat == 'Weight'){
                $("#ratekg").val(data[0].rate_kg);
              }
            }
          });
          /*********************************************************************
          **********************************************************************
          ***** CALCULATING TOTAL QUANTITY OF SMALL AND LARGE
          **********************************************************************
          *********************************************************************/
            var small = $('#small').val();
            if(small != ''){
              var small=$('#small').val();
              var large=$('#large').val();

              if(small == '' && large != ''){
                $('#qty').val(large);
              }else if(small != '' && large == ''){
                $('#qty').val(small);
              }else if(small != '' && large != ''){
                $('#qty').val(parseInt(small) + parseInt(large));
              }
            }

            var large = $('#large').val();
            if(large != ''){
              var small=$('#small').val();
              var large=$('#large').val();

              if(small == '' && large != ''){
                $('#qty').val(large);
              }else if(small != '' && large == ''){
                $('#qty').val(small);
              }else if(small != '' && large != ''){
                $('#qty').val(parseInt(small) + parseInt(large));
              }else{
                $('#qty').val('');
              }
            }
          /*********************************************************************
          **********************************************************************
          ***** END OF GETTING STATION ON EDIT
          **********************************************************************
          *********************************************************************/
        }
      });
    }
/*******************************************************************************
********************************************************************************
***** GETTING RATES BY CATEGORY SELECTION FROM CUSTOMER AND STATION
********************************************************************************
*******************************************************************************/
    $(document).on('change','#type', function(){
      var current_context = $(this).val();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:"{{ url('get_station_rate') }}",
        type:'POST',
        data:{station_id:$("#station_name").val(),sender_id:$("#sender").val(),date:$("#datepicker").val()},
        success:function(data){
          var cat = $("#type").val();
          if(cat == 'Medicine'){
            $("#smallRate").val(data[0].medicine_small);
            $("#largeRate").val(data[0].medicine_large);
          }
          else if(cat == 'Sample'){
            $("#smallRate").val(data[0].sample_small);
            $("#largeRate").val(data[0].sample_large);
          }
          else if(cat == 'Carton'){
            $("#ratectnQty").val(data[0].ctn_rate);
          }else if(cat == 'Weight'){
            $("#ratekg").val(data[0].rate_kg);
          }else if(cat == 'Other'){
            $("#rate").val(data[0].other);
          }
        }
      });
    });

/*******************************************************************************
********************************************************************************
***** END OF SCRIPT
********************************************************************************
*******************************************************************************/
});
</script>
