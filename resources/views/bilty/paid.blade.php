@php
	$edition = 1 ;
	$deletion = 1 ;
@endphp
<div id="load">
<table id="example" class="display nowrap" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Sender</th>
				<th>Reciever</th>
				<th>Phone</th>
				<th>Station</th>
				<th>Type</th>
				<th>GrNo.</th>
				<th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>BiltyNo.</th>
				<th>Vehicle Type</th>
				<th>VehicleNo.</th>
				<th>Category</th>
				<th>Large</th>
				<th>Small.</th>
				<th>Description</th>
				<th>Ctn. Qty</th>
				<th>Labour</th>
				<th>Weight</th>
				<th>Tax</th>
				<th>Rate</th>
				<th>Invoice</th>
				<th>Total</th>
				<th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php $serial = 0; ?>
			@foreach($bilty_data as $rows)
			<?php $serial += 1; ?>
			<tr>
				<td>{{$rows->bilty_id}}</td><!-- 0 -->
				<td>{{$rows->bilty_sender}}</td><!-- 1 -->
				<td>{{$rows->bilty_reciever}}</td><!-- 2 -->
				<td>{{$rows->bilty_phone}}</td><!-- 3 -->
				<td>{{$rows->bilty_station}}</td><!-- 4 -->
				<td>{{$rows->bilty_station_type}}</td><!-- 5 -->
				<td>{{$rows->bilty_station_grno}}</td><!-- 6 -->
				<td>{{$rows->bilty_date}}</td><!-- 7 -->
				<td>{{$rows->bilty_number}}</td><!-- 8 -->
				<td>{{$rows->vehicle_type}}</td><!-- 9 -->
				<td>{{$rows->bilty_vehicle_id}}</td><!-- 9 -->
				<td>{{$rows->bilty_category}}</td><!-- 10 -->
				<td>{{$rows->bilty_large}}</td><!-- 11 -->
				<td>{{$rows->bilty_small}}</td><!-- 12 -->
				<td>{{$rows->bilty_description}}</td><!-- 13 -->
				<td>{{$rows->ctn_qty}}</td><!-- 13 -->
				<td>{{$rows->labour}}</td>
				<td>{{$rows->weight}}</td>
				<td>{{$rows->tax}}</td>
				<td>{{$rows->rate}}</td><!-- 14 -->
				<td>{{$rows->bilty_invoice}}</td><!-- 15 -->
				<td>{{$rows->bilty_total}}</td><!-- 16 -->
				<td>
					<a href="<?php echo url('viewpdf/'.$rows->bilty_id); ?>" target="_blank"><i class="fa fa-eye"></i></a>
					|||
					<?php if(!empty($edition) && $edition == 1){?>
						<a href="<?php echo url('paid_edit/'.$rows->bilty_id); ?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil"></i></a>
					<?php }else{ ?>
						<a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
							<i class="fa fa-pencil"></i>
						</a>
					<?php } ?>
					|||
					<?php if(!empty($deletion) && $deletion == 1){?>
						<a href="<?php echo url('remove_paid/'.$rows->bilty_id); ?>"  id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
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
{{ $bilty_data->appends(request()->except('page'))->links() }}
<script type="text/javascript">
	$(function() {
	  $('body').on('click', '.pagination a', function(e) {
      e.preventDefault();

      $('#load a').css('color', '#dfecf6');
      $('#load').append('<img style="position: absolute; left: 50%; top: 40%; z-index: 100000;" src="{{url('/images/loading.gif')}}" />');

      var url = $(this).attr('href');
      getArticles(url);
      window.history.pushState("", "", url);
	  });
	  function getArticles(url) {
      $.ajax({
          url : url
      }).done(function (data) {
          $('.articles').html(data);
      }).fail(function () {
          alert('Articles could not be loaded.');
      });
	  }
	});
</script>
