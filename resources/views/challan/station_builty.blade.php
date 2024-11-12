<?php
// dd($builties);
$count = 0;
  foreach($builties as $key => $builty){ 
      $count++;   
    if($builty->builty_status == 'in warehouse')
    {
        
        $stast = "In WareHouse";
        echo '
            <tr>
            <td> '.$count.' </td>
              <td><input type="checkbox" class="builties" id="track"  name="trno[]"  value="'.$builty->id.'"> <label for="track" style="position: relative;">Bilty NO # '.$builty->builty_id.'</label></td>
              <td >'.$stast.'</td>
             
          </tr>';
    }
    else
    {
      $stast = "Dispatched"; 
    }
    
   
    
    
          
        //   /*<td><a href="#"><a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-previews" class="btn btn-primary mt-5" style="margin-top: 0;">
        //  Child Bilty
        //  </a></a></td>*/
      
      }
    // /*  
    //   foreach($manualbook as  $mb){
    //       if($mb->builty_status == 'in warehouse'){
    //       $stast = "In WareHouse";
    //     echo '
    //         <tr>
    //           <td><input type="checkbox" class="builties" id="track"  name="trno[]"  value="'.$mb->TRNO.'"> <label for="track" style="position: relative;">Bilty NO # '.$mb->TRNO.'</label></td>
    //           <td >'.$stast.'</td>
             
    //       </tr>';
    //   }
    //   }*/
?>