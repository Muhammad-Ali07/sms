<!DOCTYPE html>
<html>
    <title>Bill Report</title>
    <meta charset="utf-8">
    <style>
        body{
            margin:0;
            padding:0;
            font-size: 14px;
            font-family: serif;
        }
        p{
            padding:0px;
            margin:0px;
        }
        .lh{
            padding:0px;
            margin:0px;
        }
        td{
            width:64.5px;
            text-align: center;
        }
        th{
            width:64.5px;
            text-align: center;
        }
        .page-break {
            page-break-after: always;
        }
.breaker {page-break-after: always !important;}
@media print {
  .breaker {page-break-after: always;}
}
    html, body { display: block; }

    </style>
<!--BILL TOP INFORMATION AREA-->
<div style="width:1150px !important;">
    <!--BREAKING DATA IN PAGES -->
    <?php
		
    $mytotal = 0;
    $totalamount = 0;
    $totalpageamount = 0;
    $totalpagefreightamount = 0;
    $totalamountfreight = 0;
    $totalpagepackamount = 0;
    $totalpackages = 0;
    $totaltaxamount = 0;
    $totalPacks = 0;
    $total = 0;
    $pg = 1;
    $totalQtyDisplay = 0;
    //   $per_page = 18;
    $per_pages = 18;
    $Qtyttls = 0;
    $normal_packs = 0;
    $small_packs = 0;
    $large_packs = 0;
    $pagenormal_packs= 0;
    $pagesmall_packs= 0;
    $pagelarge_packs= 0;
    $linepage = 0;
    $pagecount = 0;
    $increment = 0;
    $serial_number = 0;



 //   $pg +=1;

    ?>
    <div style="width:100%;">
        <div style="float:left;width:40%;" >

            <header>
                <img src="images/logo.jpg" th="180px" height="70px" style="padding:10px 0px 0px 0px;"/>
            </header>

        </div>
        <div style="float:left;width:20%;text-align:center;">
            <center>
                <h3>SALE TAX INVOICE<br>Page # </h3>
            </center>
        </div>
        <div style="float:left;width:40%;text-align:right;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">SALE TAX INVOICE :
               
                </p>

        </div>
        <div class="lh" style="float:left;width:80%;border:1px solid #ccc;">
            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: adadaasdasdasdasdad</p>
 
        </div>
        <div style="clear:both;"></div>
        
         
         <!-- $bill_date =$record[0]->bill_date; -->
     
        <div style="float:left;width:30%;">BILLING MONTH : </div>
        <div style="float:left;width:30%">
            <center>
                <p> </p>
            </center>
        </div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <table cellspacing="0" cell-padding="0" width="100%" border="1" class="breaker">
        <thead>
        <tr>
            <th style="width:20px !important;">#</th>
            <th>Date Issued</th>
            <th style="width:160px !important;">Invoice# / DC</th>
            <th>T/R ###</th>
			<th>Total Small Packs</th>
            <th>Total Large Packs</th>
            <th>Total Packs</th>
            <th style="width:70px !important;">Station</th>
          
            <th style="width:10px !important;">Rate Per Small Pack</th>
            <th style="width:10px !important;">Rate Per Large Pack</th>
            <th>Total Frieght</th>
            <th style="width:20px !important;">Tax Amount<br></th>
            <th style="width:20px !important;">Total Amount</th>
        </tr>
        </thead>

    
        <tr>
           
            <td colspan="3">Total Page-# </td>
            <td>Total Qty :</td>			
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          
            <td></td>
           <td>  Total Amount :</td>
           <td></td>
          
            <td></td>
      
        </tr>
    </table>

    <div style="width:100%;">
        <div style="float:left;width:40%;">

            <header>
         
    <img src="images/logo.jpg" th="180px" height="70px" style="padding:10px 0px 0px 0px;"/>
            </header>

        </div>
        <div style="float:left;width:20%;text-align:center;">
            <center>
                <h3> SALE TAX INVOICE<br>Page # </h3>
            </center>
        </div>
        <div style="float:left;width:40%;text-align:right;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">BILL NO : 7879878979
            </p>

        </div>
        <div class="lh" style="float:left;width:80%;border:1px solid #ccc;">
            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: PAKISTAN</p>
        </div>
        <div style="clear:both;"></div>
     
        <div style="float:left;width:30%;">BILLING MONTH : August </div>
        <div style="float:left;width:30%">
            <center>
                <p> </p>
            </center>
        </div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <table cellspacing="0" cell-padding="0" width="100%" border="1" class="breaker">
        <thead>
        <tr>
            <th style="width:20px !important;">#</th>
            <th>Date Issued</th>
            <th style="width:160px !important;">Invoice# / DC</th>
            <th>T/R ###</th>
			<th>Total Small Packs</th>
            <th>Total Large Packs</th>
            <th>Total Packs</th>
            <th style="width:70px !important;">Station</th>
            <th style="width:10px !important;">Rate Per Normal Pack</th>
            <th style="width:10px !important;">Rate Per Small Pack</th>
            <th style="width:10px !important;">Rate Per Large Pack</th>
            <th>Total Frieght</th>
            <th style="width:20px !important;">Tax Amount<br></th>
            <th style="width:20px !important;">Total Amount</th>
        </tr>
        </thead>

    
        <tr>
           
            <td colspan="3">Total Page-# </td>
            <td>Total Qty :</td>			
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           <td>  Total Amount :</td>
           <td></td>
          
            <td></td>
      
        </tr>
    </table>

    <div style="clear:both;"></div>



    <span style="float:right;text-align:right;display:block;"></span>
    <br>
    <span style="float:right;text-align:right;display:block;"> </span>
  
    <div style="clear:both;"></div>
    <div style="width:100%;padding:5px;">
        <div style="float:left;width:40%;">
            <img src="images/logo.jpg"  th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
        </div>
        <div style="float:left;width:20%;">
            <center><h3>Bill Summary</h3></center>
        </div>
        <div style="float:left;width:40%;text-align:right;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>

        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">BILL NO :
             7896654</p>
        </div>
        <div class="lh" style="float:left;width:80%;border:1px solid #ccc;">
            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME:
               PAKISTAN PHARMACEUTICALS PRODUCTS PVT.LTD. 
                &nbsp;
             
            </p>
        </div>
        <div style="clear:both;"></div>
        <div style="float:left;width:30%;">BILLING MONTH : August
            
     
            &nbsp;
            
        </div>
        <div style="float:left;width:30%"><center><p> </p></center></div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <div>
        <img src="images/logo.jpg" style="z-index:0;top:50px;position:absolute;opacity: 0.1;-webkit-transform: rotate(-30deg);transform: rotate(-30deg);"/>
        <div style="width:50%;margin:0px auto;z-index:999;">

            <!-- amount start -->

            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <th >Number of pages</th>

                    <th>Total freight per page</th>
                    <th>Total tax per page</th>
                    <th>Total amount per page</th>

                </tr> 
              
                <tr>
                    <td> &nbsp; </td>
                    <td> &nbsp; </td>
                </tr>
               
                <tr>
                    <th>Total Amount</th>

                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
            </table>

            <!-- amount end -->

            <!-- tax start -->
            <br>
            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <th>Number of pages</th>
                    <th>Total tax per page</th>
                </tr>
               
                <tr>
                    <td> &nbsp; </td>
                    <td> &nbsp; </td>
                </tr>
              
                <tr>
                    <th>Total Tax</th>
                    <th></th>
                </tr>
            </table>
            <!-- tax end -->

            <!-- freight start -->
            <br>
            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <th>Number of pages</th>
                    <th>Total freight per page</th>
                </tr>
             
                <tr>
                    <td> &nbsp; </td>
                    <td> &nbsp; </td>
                </tr>
           
                <tr>
                    <th>Total Freight</th>
                    <th></th>
                </tr>
            </table>
            <!-- freight end -->

        </div>


        <table width="100%" cellspacing="20" style="position:absolute;bottom:30px;">
            <tr>
                <th style="width:23%;border-bottom:1px solid #000;"><center></center></th>
                <th style="width:23%;border-bottom:1px solid #000;"></th>
                <th style="width:23%;border-bottom:1px solid #000;"></th>
            </tr>
            <tr>
                <td>Prepared By</td>
                <td>Accountant</td>
                <td>Chief Executive</td>
            </tr>
        </table>
        
    </div>
    
    <div style="text-align:right;font-size:10px;align:bottom;">-By Dusky Solution</div>
    <div style="clear:both;" class="page-break"></div>
    <div style="width:100%;padding:5px;margin-top:15px;">
        <div style="float:left;width:40%;">
            <img src="images/logo.jpg"  th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
        </div>
        <div style="float:left;width:20%;">
            <center><h3>Sales Tax Invoice</h3></center>
        </div>
        <div style="float:left;width:40%;text-align:right;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:50%;">
            <p><b>Customer Name</b>&nbsp;</p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:50%;">
            <p><b>Delivery Address</b>&nbsp; </p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>

        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">BILL NO :
               </p>
        </div>
       
        <div style="clear:both;"></div>
        <div style="float:left;width:30%;">Month :
            
       
      
            &nbsp;
           
        </div>
        <div style="float:left;width:30%"><center><p> </p></center></div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
   
    <div style="clear:both;"></div>
    <div class="lh" style="float:left;width:50%;">
        <p>GST Jurisdication</p>
    </div>
    <div style="clear:both;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <div>
        
    
    <div style="width:100%;margin:0px auto;z-index:999;float:left;width:70%;">

        <!-- amount start -->

        <table width="100%" cellspacing="0" border="1" >
            <thead>
            <tr>
                <th style="width:10px !important;">S.NO</th>

                <th style="width:20px !important;">Description</th>
                <th style="width:20px !important;">Total No of Ctn/Qty</th>
                <th style="width:20px !important;">Value Exclusive of Srb</th>
                <th style="width:20px !important;">SRB 3% amount</th>
                <th style="width:20px !important;">Value Inclusive of SRB</th>
            </tr>
            </thead>
           <tbody>
            <tr>
                <td>1</td>

                <td>Transporation Freight</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
           </tbody>
    </table>
   
    <div style="clear:both;"></div>
    <br>
    <br>
    <br>

    <div class="lh" style="float:right;width:30%;">
        <p><b>Net Amount:</b>&nbsp;&nbsp;&nbsp;</p>
        <br>
        <p><b>SRB 3%:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <br>
        <p><b>Gross Amount:</b>&nbsp; </p>
    </div>
    <div style="clear:both;"></div>
    <br>
    <br>
    <br>
    <div class="lh" style="float:left;width:30%;">
        <hr style="width:50%;text-align:left;margin-left:0">

        <p>Signature</p>
    </div>
</div>
</div>
<!--END OF BILL -->
</body>
</html>
