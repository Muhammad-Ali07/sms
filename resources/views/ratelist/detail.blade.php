@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">

            <!-- BEGIN: Side Menu -->
       @include('includes.side-nav')

              <div class="content">
           <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->
            <div class="grid">
               
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Rate List Detail
                           </h2>
                        
                        </div>
                     
						<input type='hidden' id='data' value="{{$result}}" />
                        <div id="input" class="p-5">
						<div class="lcl_station_details_view">
							<table id="example" class="table display nowrap" style="width:100%">
								<thead>
								  <tr>
									<th>FROM</th>
									<th>To</th>
									<th>Package</th>
									<th>Rate</th>
									<th>Type</th>
									</tr>
								</thead>
									<tbody id="result" onload="">

									</tbody>
								
							</table>
							</div>          
						</div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
            </form>
         </div>
        </div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		    var res = $('#data').val();
			var data = JSON.parse(res);  
			$(data).each(function(index,val){    
			$("#result").append("<tr><td>"+val.from+"</td><td>"+val.to+"</td><td>"+val.package+"</td><td>"+val.rate+"</td><td>"+val.type+"</td></tr>");
			});
			
			 $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

             });
             
		});
		
		
</script>
@endsection