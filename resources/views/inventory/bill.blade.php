
@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   @include('includes.side-nav')

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">

<style>

.tablePreview table tr td {

    font-family: 'Noto Nastaliq Urdu', serif;

}

</style>



<body class="main">

   
        <!-- BEGIN: Content -->

       <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
               <!-- BEGIN: Breadcrumb -->
               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
               <!-- END: Breadcrumb -->
               <!-- BEGIN: Search -->
               <div class="intro-x relative mr-3 sm:mr-6">
                  <div class="search hidden sm:block">
                     <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
                     <i data-feather="search" class="search__icon dark:text-gray-300"></i> 
                  </div>
                  <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                  <div class="search-result">
                     <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center">
                              <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                              <div class="ml-3">Mail Settings</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                              <div class="ml-3">Users & Permissions</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                              <div class="ml-3">Transactions Report</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              </div>
                              <div class="ml-3">Charlize Theron</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">charlizetheron@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              </div>
                              <div class="ml-3">Russell Crowe</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                           </a>
                           <a href="" class="flex items-center mt-2">
                              <div class="w-8 h-8 image-fit">
                                 <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              </div>
                              <div class="ml-3">Al Pacino</div>
                              <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>
                           </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                           </div>
                           <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-12.jpg">
                           </div>
                           <div class="ml-3">Samsung Q90 QLED TV</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                           </div>
                           <div class="ml-3">Nike Air Max 270</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                           <div class="w-8 h-8 image-fit">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                           </div>
                           <div class="ml-3">Sony Master Series A9G</div>
                           <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                     </div>
                  </div>
               </div>
               <!-- END: Search -->
               <!-- BEGIN: Notifications -->
               <div class="intro-x dropdown mr-auto sm:mr-6">
                  <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                  <div class="notification-content pt-2 dropdown-menu">
                     <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                           </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                           <div class="w-12 h-12 flex-none image-fit mr-1">
                              <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                              <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                           </div>
                           <div class="ml-2 overflow-hidden">
                              <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                                 <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                              </div>
                              <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Notifications -->
               <!-- BEGIN: Account Menu -->
               <div class="intro-x dropdown w-8 h-8">
                  <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                     <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
                  </div>
                  <div class="dropdown-menu w-56">
                     <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                           <div class="font-medium">Charlize Theron</div>
                           <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                        </div>
                        <div class="p-2">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                           <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->

            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                  Bill 
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                         Clear Bill     
                           </h2>
                        </div>
                        <div id="tabs">
                    <ul>
                            <li>
                                <a href="#Inventory"></a>
                            </li>
                           <!-- <li>
                                <a href="#Purchase">Purchase Inventory</a>
                            </li>-->
                        </ul>
                        <div id="Inventory">
                            <div id="input" class="p-5">

                                <form autocomplete="off"  enctype="multipart/form-data"  method="post" action="{{route('clearBill')}}">
                                    @csrf
                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative">
                                 @foreach($ids as $rows)
                                 <input readonly value="{{$rows}}" name="invoices[]" type="hidden" class="form-control">
                                 @endforeach
                            
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Auto Shop Name</label>
                                 <select readonly name="shopName" class="form-control">
                                          <option value="{{$shopName->id}}">{{$shopName->ShopName}}</option>
                                 </select>
                              </div>  
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Bill NO</label>
                                <input readonly value="{{$billNo}}" name="BillNo" type="text" class="form-control" >
                              </div> 
                              
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Total Amount</label>
                                 <input readonly value="{{$InvoiceAmount}}"  name="Total" type="text" class="form-control" >
                              </div>  

         
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label"> Balance</label>
                                 <input readonly @if(!empty($privious)) value="{{$privious->Amount}}" @endif  name="Previous" type="text" class="form-control" >
                              </div>  

                    
                              
                             


                                  <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Payment Method</label>
                                 <select id="method" required  name="method"  class="form-control" >
                                     <option value="" >Please Select</option>
                                     <option value="1" >Cash</option>
                                     <option value="2" >Cheque</option>
                                 </select>
                              </div> 
                         
                         
                         
                         
                              
                            <div id="cheque" class="cheque col-span-12 positon-relative" style="display:none" >
                            <label for="regular-form-2" class="form-label">Bank Name</label>
                            <input name="bank[]" type="text" class="form-control" >
                            <label for="regular-form-2" class="form-label">Cheque NO</label>
                            <input   name="chequeNO[]" type="text" class="form-control" >
                            <label for="regular-form-2" class="form-label">Amount</label>
                            <input name="chequeAmount[]" type="text" class="form-control" >
                            <label for="regular-form-2" class="form-label">Upload Image</label>
                            <input name="upload[]" type="file" class="form-control" >
                             <button type="button" class="AddMorebank btn btn-primary mt-5"> Add More</button>
                            </div>
                                  
                                         
                                         
                                                
                            <div id="cash" class="col-span-4 positon-relative" style="display:none">
                                 <label for="regular-form-2" class="form-label">Payable Amount</label>
                                 <input onkeyup="calc()" id="Paid"   name="Paid" type="text" class="form-control" >
                           
                                </div> 
                                
                          
                            </div>
                           <button type="submit" class="btn btn-danger mt-5">Clear Bill</button>      
                            </form>
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              @if(!empty($privious))
                           <table id="example" class="display nowrap dataTable">
                           <h1 class="font-medium text-base mr-auto">
                         Last Clear Bill    
                           </h1>
                                 <thead>
                                    <tr>
                                    <th>Bill No</th>	
									         <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    </tr>
                                 </thead>
                                 <tbody>                               
                                
                        
                              </tbody>
                              </table>
                           <BR><BR><hr><hr><br>
                           @endif
                           <table id="example" class="display nowrap dataTable">
                           <h1 class="font-medium text-base mr-auto">
                         Targeted invoices     
                           </h1>
                                 <thead>
                                    <tr>
                                    <th>
                            
                                    </th>	
                                    <th>Invoice No</th>	
									         <th>Date</th>
                                    <th>Amount</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $invoices = DB::table('purchase_invoices')
                                    ->whereIn('id',$ids)
                                    ->get();  
                                    //dd($invoices);
                                    $counter = 1;
                                    ?>
                                @foreach($invoices as $rowinvoice)
                                <tr>   
                                   <td>{{$counter++}}</td>
                                   <td>{{$rowinvoice->invoice}}</td>
                                   <td>{{$rowinvoice->Date}}</td>
                                   <td>{{$rowinvoice->Amount}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                              </table>
                           </div>
                        </div>
                        </div>
        
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Content -->                       

@section('script')
<script>
    function calc() {
    var Paid = document.getElementById('Paid').value;
    var net = document.getElementById('net').value;
    var amount =  net - Paid;  
    document.getElementById('Remain').value = amount;
}
</script>

<script>
$('#method').change(
    function() {
   var val = $(this).val();

if(val == 1){
$("#cash").show();
$("#cheque").hide();
  
}

if(val == 2){
 $("#cheque").show();  
 $("#cash").hide();
   
}

    }
);

</script>

  <script>
      $(document).ready(function() { var max_fields = 10; var wrapper = $(".cheque"); var add_button = $(".AddMorebank"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div id="cheque1" class="cheque col-span-12 positon-relative"><label for="regular-form-2" class="form-label">Bank Name</label><input name="bank[]" type="text" class="form-control" ><label for="regular-form-2" class="form-label">Cheque NO</label><input name="chequeNO[]" type="text" class="form-control" ><label for="regular-form-2" class="form-label">Amount</label><input name="chequeAmount[]" type="text" class="form-control" ><label for="regular-form-2" class="form-label">Upload Image</label><input name="upload[]" type="file" class="form-control">'); } });
          $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
          $(document).on('click',".btn_remove", function(e) {
    e.preventDefault();
    $('#rem-'+x+'').remove();
    x--;
    });
      });
   </script>

@endsection