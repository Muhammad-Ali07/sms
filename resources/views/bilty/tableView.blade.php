<div id="load" style="overflow: scroll;">

 <table id="example" class="table table-hover display nowrap dataTable" style="width:100%">

  <thead>

     <tr>

        <th></th>

        <th>Builty ID</th>

        <th>Customer</th>

        <th>Receiver Name</th>

        <th>To</th>

        <th>Date</th>

        <th>Builty Type</th>

        <!--<th>Quantity</th>-->

        <!--<th>Local</th>-->

        <th>Action</th>

     </tr>

  </thead>

  <tbody>

     <?php

     

     foreach($builties as $builty){    

            $itmes = DB::table('now_builtyitems')->select('now_builtyitems.quantity as quantity','now_builtyitems.brand as brand')->where('builtyid',$builty->bid)->get();

            $qty = '0';

            $qtyWord = '';

              foreach($itmes as $itme){

               $qtyWord .= $itme->brand .' - '. $itme->quantity .'&#013;';

               $qty += !empty($itme->quantity) ? $itme->quantity : '0';

              }

          echo '

           <tr title="'.$qtyWord.'">   

               <td> <input class="tester" type="checkbox" value="'.$builty->bid.'"/> </td>

               <td>'.(!empty($builty->builty_id) ? $builty->builty_id : $builty->bid).'</td>

               <td>'.$builty->sendername.'</td>

              <td>'.$builty->receivername.'</td>

              <td>'.$builty->station.'</td>

                <td>'.date('d-m-Y', strtotime($builty->date)).'</td>

              <td>'.$builty->Builtytype.'</td>';

        ?>

     <td>

        <a title="generate" class="btn btn-secondary" href="{{route('generate-bilty',['id'=>$builty->bid])}}" target="_blank"> <i class="fa fa-eye"></i> </a>

        <?php if (Auth::user()->role_id != 2) {?> 

        <a title="edit" class="btn btn-secondary" href="{{route('edit-walkin-builty',['id'=>$builty->bid])}}"><i class="fa fa-edit"></i> </a>

        <a onclick="return confirm('Are you sure you want to delete this builty?');" title='Delete' class='btn btn-secondary' href="{{route('delete-walkin-builty',['id'=>$builty->bid])}}"><i class='fa fa-times'></i> </a>

        <?php }?>

     </tr>

     <?php

        }

        

        ?>

  </tbody>

  <tfoot>

     <tr>

       <th></th>

        <th>Builty ID</th>

        <th>Customer</th>

        <th>Receiver Name</th>

        <th>To</th>

        <th>Date</th>

        <th>Builty Type</th>

        <!--<th>Quantity</th>-->

        <!--<th>Local</th>-->

        <th>Action</th>

     </tr>

  </tfoot>

</table>

<span style="float:right"> {{ $builties->appends(request()->except('page'))->links() }} </span>

</div>

<script type="text/javascript">

   $(function() {

     //$('#example').DataTable();

     $('body').on('click', '.pagination a', function(e) {

        e.preventDefault();

   

        $('#load a').css('color', '#dfecf6');

        $('#load').append('<img style="position: absolute; left: 50%; top: 40%; z-index: 100000;" src="{{url("/images/loading.gif")}}" />');

   

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