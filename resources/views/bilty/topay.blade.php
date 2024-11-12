@php
	$edition = 1 ;
	$deletion = 1 ;
@endphp
<div id="load">
	<table class="table table-striped table-bordered table-responsive table-condensed">
		<thead>
			<tr>
				<th>Serial Number</th>
				<th>Date</th>
				<th>Bilty Number</th>
				<th>Vehicle Number</th>
				<th>Karachi To </th>
				<th>Total </th>
				<th>Action </th>
			</tr>
		</thead>
		<tbody>
		<?php
		$serial_number = 0 ;
		$serial = 0;
		?>
			@foreach($topaid_bilty_records as $rec)
			<?php $serial += 1; ?>
			<tr >
				<td><?php echo $serial_number+=1 ;?></td>
				<?php echo "<td>".$date = date('d/m/Y', strtotime($rec->DatePaidBilty))."</td>"; ?>
				<td> {{ $rec->BiltyNumber }} </td>
				<td> {{ $rec->VehicleNumber }} </td>
				<td> {{ $rec->KarachiTo }} </td>
				<td> {{ $rec->Total }} </td>
				<td>
					<a href="<?php echo url('topaid_view/'.$rec->PKBiltyID) ?>"><i class="fa fa-eye"></i></a>
					|||
					<?php if(!empty($edition) && $edition == 1){?>
						<a href="<?php echo url('topaid_edit/'.$rec->PKBiltyID) ?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil-square-o"></i></a>
					<?php }else{ ?>
						<a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
							<i class="fa fa-pencil"></i>
						</a>
					<?php } ?>
					|||
					<?php if(!empty($deletion) && $deletion == 1){?>
						<a href="<?php echo url('topaid_remove/'.$rec->PKBiltyID) ?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a></td>
					<?php }else{ ?>
						<a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
							<i class="fa fa-times"></i>
						</a>
					<?php } ?>
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
{{ $topaid_bilty_records->appends(request()->except('page'))->links() }}
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
