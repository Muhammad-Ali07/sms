
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
             <form method="post" autocomplete="off"  action="@if(!empty($select)) {{route('save-edit-purchase-inventory')}} @else {{route('purchase-inventory-process')}}  @endif ">
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Purchase Inventory Management
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              
                           </h2>
                        </div>
         
                            <div id="input" class="p-5">
                           <div class="preview">
                               
                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative">
                              
                                <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Select Customer </label>
                                 <select class="form-control" name="companyName"> 
                                 <option>Select Shop</option>
                                @foreach($autoshop as $shop)
                                <option value="{{$shop->id}}" @if(!empty($select)) @if($shop->id == $select->purchase_company_name ) {{'selected'}}  @endif @endif  >{{$shop->ShopName}}</option>
                                @endforeach
                                </select>     
                              </div>
                              
                              
                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Date</label>
                                 <input  id="regular-form-2"  @if(!empty($select)) value="{{$select->purchase_date}}" @endif  name="purchasedate" type="date" class="form-control" placeholder="Date">
                                  @if(!empty($select)) <input value="{{$select->id}}" name="id" type="hidden"> @endif 
                                    
                              
                              </div>

                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Invoice No</label>
                                 <input  id="regular-form-2"  @if(!empty($select)) value="{{$select->invoice}}" @endif name="invoice" type="text" class="form-control" placeholder="Invoice No">
                         
                              </div>
                              </div>
                              
                              
                              
                              

                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              <div class="addmorepurchase">
                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative">
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Products Name</label>
                                   <select id="dropdownvalues" @if(!empty($select)) name="itemName" @else name="itemName[]" @endif class="form-control">
                                       <option>Please Select </option>
                                    @foreach($comp as $rowcompany)<option value="{{$rowcompany->Cid}}" @if(!empty($select)) @if($rowcompany->Cid == $select->pcode ) {{'selected'}}  @endif  @endif    >{{$rowcompany->Cname}} |  Rate : {{$rowcompany->Rate}} | Company : {{$rowcompany->Shop}} | Quantity  {{$rowcompany->Quantity }} </option>@endforeach
                                 </select>
                                 </div>

                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Rate </label>
                                 <input   id="purchaserate"   @if(!empty($select)) value="{{$select->purchase_rate}}" @endif  @if(!empty($select)) name="purchaserate" @else name="purchaserate[]" @endif    type="text" class="form-control" placeholder="Enter Truck Name">
                              </div>
                              <div class="col-span-4 positon-relative">
                                 <label for="regular-form-2" class="form-label">Quantity</label>
                                 <input   id="purchasequantity"  type="text" @if(!empty($select)) value="{{$select->purchase_quantity}}" @endif   @if(!empty($select)) name="purchasequantity" @else name="purchasequantity[]" @endif class="form-control" placeholder="Enter Litre">
                                 @if(empty($select)) 
                                 <button class="addmoreproducts btn btn-success" type="button"> + Add </button>
                              @endif
                              </div>   
                              </div>
                              </div>
                              <button class="btn btn-primary mt-5">Submit</button>
                           </div>
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview" style="overflow:auto">
                              
                              @if(empty($select))
                              
                              <table id="examples"   class="display nowrap dataTable" style="width:100%">
                                 <thead>
                                 <tr>
                                       <th>#</th>
                                       <th>inventory Name</th>
                                       <th>Invoice</th>
                                       <th>Company Name</th>
                                       <th>Date</th>			   
									   <th>Rate</th>
                                       <th>Quantity</th>
                                       <th>Amount</th> 
                                       <th>Action</th>
                                    </tr>
                                   <?php $counter = 1; ?>
                                
                                    @foreach($invent as $rowinventory)            
                                    <tr>
                                    <td>{{$counter++}}</td>
                                 <td>{{$rowinventory->Des}}</td>
                                 <td>{{$rowinventory->invoice}}</td>
                                 <?php
                                    $companyNamer = DB::table('autoshop')
                                    ->where('id',$rowinventory->purchase_company_name)->first();
                                 ?>
                                 <td>{{$companyNamer->ShopName}}</td>
                                 <td>{{$rowinventory->purchase_date}}</td>
                                 <td>{{$rowinventory->purchase_rate}}</td>
                                 <td>{{$rowinventory->purchase_quantity	}}</td>
                                 <td>{{$rowinventory->purchase_amount}}</td>
                                 <td><a href="{{route('edit-purchase-inventory',['id' =>$rowinventory->id])}}"> Edit </a> 
                                     <a href="{{route('delete-purchase-inventory',['id' =>$rowinventory->id])}}"> Delete </a> </td>

                                 </td>
                                    </tr>
                                    @endforeach
                                 
                                 </tbody>
                              
                              </table>
                           </div>
                           @endif
                        </div>
                        </div>    
                  
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Content -->
                             

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
@section('script')
<script>
var x = 1;    
$(".addmoreproducts").click(function(){
var button = $('.'+$(this).attr('data-text')+'addmoreproducts').html();
$(".addmorepurchase").append('<div class="'+x+'remeve">'+button+'<div class="mt-2 grid grid-cols-12 gap-2 positon-relative"><div class="col-span-4 positon-relative"><label for="regular-form-2" class="form-label">Products Name</label><select id="dropdownvalues" @if(!empty($select)) name="itemName" @else name="itemName[]" @endif class="form-control"><option>Please Select </option>@foreach($comp as $rowcompany)<option value="{{$rowcompany->Cid}}" @if(!empty($select)) @if($rowcompany->Cid == $select->pcode ) {{'selected'}}  @endif  @endif    >{{$rowcompany->Cname}} |  Rate : {{$rowcompany->Rate}} | Company : {{$rowcompany->Shop}} | Quantity  {{$rowcompany->Quantity }} </option>@endforeach</select></div><div class="col-span-4 positon-relative"><label for="txtBox" class="form-label">Rate </label><input   id="purchaserate"   @if(!empty($select)) value="{{$select->purchase_rate}}" @endif  @if(!empty($select)) name="purchaserate" @else name="purchaserate[]" @endif    type="text" class="form-control" placeholder="Enter Truck Name"></div><div class="col-span-4 positon-relative"><label for="regular-form-2" class="form-label">Quantity</label><input   id="purchasequantity"  type="text" @if(!empty($select)) value="{{$select->purchase_quantity}}" @endif   @if(!empty($select)) name="purchasequantity" @else name="purchasequantity[]" @endif class="form-control" placeholder="Enter Litre">@if(empty($select))<button data-id="'+x+'remeve" class="removepackage btn btn-danger" type="button"> Remove </button>@endif</div></div>');
x++;
});

$(document).on('click','.removepackage',function(){
    $('.'+$(this).attr('data-id')).remove();
});
</script>



@endsection