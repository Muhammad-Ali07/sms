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
<h4>Add Packages</h4>
</div>
<div class="card-block">
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif
@if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
@if(Session::has('error')) <div class="alert alert-danger"> {{Session::get('error')}} </div> @endif
@if(Session::has('info')) <div class="alert alert-info"> {{Session::get('info')}} </div> @endif
<form enctype="multipart/form-data" action="{{route('createpackages')}}" method="post" class="bg-white post-form-validation" id="post-form-validation" enctype="multipart/form-data">
<input type="hidden" value="{{ csrf_token() }}" name="_token" />
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="alert alert-danger" id="message" style="display:none;">Alert!The Package with same name for this customer already exist</div>

<div class="input_fields_wrap">

<div class="form-group row">
<label class="col-sm-2 col-form-label ">Package Name</label>
<div class="col-sm-4">
 <input required onchange="checksamepackages()" type="text" name="package" id="package" class="form-control form-control-round" placeholder="Enter Package Name">
</div>
</div>
 <div class=" form-group row input_fields_wraps">
        <div class="container">
         <div class=" form-group row input_fields_wrap1">
          <label class="col-sm-2 col-form-label">Package Description</label>
           <div class="col-sm-4">
              <textarea required rows="3"   name="description[]" cols="3" class="form-control form-control-round" placeholder="Description"></textarea>
           </div>

              <div class="col-sm-2">
                <button class="add_field_button">Add More </button>
              </div>
           </div>
         </div>
        </div>
<div class="form-group row">
<label class="col-sm-4 col-form-label"></label>
<div class="col-sm-2">
 <button type="Reset" style="" class="btns_reset" >Reset</button>
</div>

<label class="col-sm-1 col-form-label"></label>
<div class="col-sm-2">
 <button type="submit" style="" id="submit" class="btns_save" >Save</button>
</div>    
</div>


</form>


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
@include('includes/footer')<div class="container">
@include('datatable/datatable');
<script type="text/javascript">

  $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wraps"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="container"><div class=" form-group row input_fields_wraps"><label class="col-sm-2 col-form-label"> Package Description '+x+' </label><div class="col-sm-4"> <textarea required rows="3"   name="description[]" cols="3" class="form-control form-control-round" placeholder="Description"></textarea></div><button class="remove_field " style=""> Remove</button></div></div>');}
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

$(document).on("click","#deletepackages", function(e){ //user click on remove text
    var id = $(this).attr('data-deleteId');
    var data = {
                id : id,
            }
    // console.log(data);
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) 
  {
    $.ajax({
        type: 'post',
        url: '{{url('deletepackages')}}',
        data: data,
        date: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
          if (response) {
            Swal.fire({
              title: 'Deleted!',
              html: '<strong>Your Customer has been deleted.</strong>',
              type: 'success',
              showConfirmButton: false,
              timer: 3000,
                })
                location.reload();
            }
        },
        error: function () {
        }
    });
  }
})
  })
function checksamepackages() {
  var value = $('#package').val(); 

  var customer =  $('#customer_name').val(); 
   
  $.ajax({
    url:'checksamepackages',
    type:'GET',
    async: false,
    data: { package_name: value,
             customer_id: customer },
    success:function(data){
    
     if(data=="error")
     {
       $('#package').val("");
      $('#message').fadeIn('slow', function(){
               $('#message').delay(5000).fadeOut(); 
            });
     }
    }
});


}


</script>
</div>

