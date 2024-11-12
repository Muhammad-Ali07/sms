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

            <div class="top-bar">

               <!-- BEGIN: Breadcrumb -->

               <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Billing</a> </div>

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

           <form method="post" action="#" class="BillForm_______">

            <div class="grid">

               <div class="intro-y flex items-center mt-12">

                  <h2 class="text-lg font-medium mr-auto">

                     Add Bill Form

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <!--<h2 class="font-medium text-base mr-auto">-->

                           <!--   Add a Bill-->

                           <!--</h2>-->
                        <div class="row w-full">
                            <div class="col-lg-6">
                                <h2 class="font-medium text-base mr-auto">
                                    Bill
                                    <div class="intro-ul"></div>
                                </h2>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <p class="float-right"><b>{{isset($code) ? $code : 'BL-0001'}}</b></p>
                            </div>
                        </div>

                        </div>

                        <div id="input" class="p-5" style="padding-bottom: 65px;">

                           <div class="preview">

                              <input type="hidden" value="{{ csrf_token() }}" name="_token" />
            
                              <input type="hidden" id="id" name="id" <?php if(isset($record[0]->pkg_id)){ echo isset($record[0]->pkg_id)?' value="'.$record[0]->pkg_id.'" ':' '; }?> />
            
                             <input type="hidden" name="selfcompany" value="{{session('company')[0]->id}}" />

                              <div class="mt-2">
                                   <label  class="form-label col-md-4 col-sm-4 col-xs-12" >Enter Bill Number:</label>
                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="hidden" name="bill_code" value="{{$code}}" id="bill_code">
                                         <input type="number" name="bill_number" readonly id="bill_num" class="form-control col-md-7 col-xs-12" value="{{$billNum}}"/>
                                   </div>
                              </div>



                              <div class="mt-2">
            
                                   <label class="form-label col-md-4 col-sm-4 col-xs-12">Select a Customer :
            
                                    </label>
            
            
            
                                   <div class="col-md-8 col-sm-8 col-xs-12">
            
                                     <select class="form-control col-md-7 col-xs-12" id="customer" name="customer">
            
                                       <option>Select a Customer</option>
            
                                       @foreach($sender as $customer)
            
                                       <option value="{{$customer->id}}" <?php if(isset($record[0]->fk_sender_id)){if($record[0]->fk_sender_id == $customer->id){echo 'selected';}}?>>{{$customer->name}}</option>
            
                                       @endforeach
            
                                     </select>
            
                                 </div>
            
                              </div>


                               <div class="mt-2">
            
                                    <label class="form-label col-md-4 col-sm-4 col-xs-12">From Date :
            
                                    </label>
            
                                    <div class="col-md-8 col-sm-8 col-xs-12">
            
                                       <input type="date" id="datepicker" name="from" class="form-control col-md-7 col-xs-12" />
            
                                   </div>
            
                              </div>

                              <div class="mt-2">
                                     <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">To Date :
                                       </label>
                                      <div class="col-md-8 col-sm-8 col-xs-12">
                                       <input type="date" id="datepicker1" name="to" class="form-control col-md-7 col-xs-12" />
                                    </div>
                              </div>

                              <div class="clearfix"></div>
            
                              <div class="ln_solid"></div>

                              <br/>
            
                               <div class="mt-2">
                                     <div class="col-md-3  form-group has-feedback" id="weightClick">
                
                                       <label for="weight" class="form-label col-md-4">Weight
                
                                       </label>
                
                                       <div class="col-md-4">
                
                                         <input type="checkbox" id="weight" name="weight" class="flat" />
                
                                       </div>
                
                                     </div>
                                     <div class="col-md-3 form-group has-feedback" id="clickme">
                
                                          <label for="labour" class="form-label col-md-4">Labour
                
                                          </label>
                
                                          <div class="col-md-4" >
                
                                            <input type="checkbox" id="labour" name="labour" />
                
                                          </div>
                
                                     </div>
                                     <div class="col-md-3 form-group has-feedback" id="clickmefuel">
                
                                          <label for="fuel" class="form-label col-md-4">Fuel
                
                                          </label>
                
                                          <div class="col-md-4" >
                
                                            <input type="checkbox" id="fuel" name="fuel" />
                
                                          </div>
                
                                     </div>
                                    <div class="col-md-3 has-feedback" id="clickmetax">
                                        <label for="tax" class="form-label col-md-4">Tax</label>
                                        <div class="col-md-4">
                                            <input type="checkbox" id="tax" name="tax" />
                                        </div>
                                    </div>
                                </div>

                              <div class="mt-2" id="weightCharge" style="display: none;">
            
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" >Weight
            
                                </label>
            
                                 <div class="col-md-8 col-sm-8 col-xs-12">
            
                                    <input type="text" id="weightInput" name="weight" class="form-control col-md-7 col-xs-12" />
            
                                </div>
            
                              </div>

                              <div class="mt-2" id="labourCharge" style="display: none;">
            
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" >Labour Charges
            
                                </label>
            
                                 <div class="col-md-8 col-sm-8 col-xs-12">
            
                                    <input type="text" id="labourChargeInput" name="labourCharge" class="form-control col-md-7 col-xs-12" />
            
                                </div>
            
                              </div>
            
                              <div class="mt-2" id="fuelCharge" style="display: none;">
            
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" >Fuel %
            
                                </label>
            
                                 <div class="col-md-8 col-sm-8 col-xs-12">
            
                                    <input type="text" name="fuelCharge" id="fuelChargeInput" class="form-control col-md-7 col-xs-12" />
            
                                </div>
            
                              </div>

                                <div id="taxFieldsContainer" style="display: none;">
                                    <div class="mt-2" id="taxname1">
                                        <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax Name 1</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="taxname[]" placeholder="PRA" class="form-control col-md-7 col-xs-12" />
                                            <input type="number" name="taxpercentage[]" placeholder="Percentage" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                
                                    <div class="mt-2" id="taxname2">
                                        <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax Name 2</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="taxname[]" placeholder="SRB" class="form-control col-md-7 col-xs-12" />
                                            <input type="number" name="taxpercentage[]" placeholder="Percentage" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                
                                    <div class="mt-2" id="taxname3">
                                        <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax Name 3</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="taxname[]" placeholder="KPRA" class="form-control col-md-7 col-xs-12" />
                                            <input type="number" name="taxpercentage[]" placeholder="Percentage" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                
                                    <div class="mt-2" id="taxname4">
                                        <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax Name 4</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="taxname[]" placeholder="Other Tax" class="form-control col-md-7 col-xs-12" />
                                            <input type="number" name="taxpercentage[]" placeholder="Percentage" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                </div>
                                
                                  <!--  <div class="clearfix"></div>-->
                                  <!--  <div class="mt-2" id="taxpercentage" style="display: none;">-->
                
                                  <!--   <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax%-->
                
                                  <!--    </label>-->
                
                
                
                                  <!--   <div class="col-md-8 col-sm-8 col-xs-12">-->
                                  <!--       <input type="text" name="taxpercentage[]" class="form-control col-md-7 col-xs-12" />-->
                                  <!--          <button type="button" id="addMoreTax" class="btn btn-sm btn-secondary">One more tax</button>-->
                                  <!--    </div>-->
                
                                  <!--</div>-->
                                  <!--  <div class="mt-2" id="taxname_2" style="display: none;">-->
                
                                  <!--   <label class="form-label col-md-4 col-sm-4 col-xs-12" >Tax Name</span>-->
                
                                  <!--    </label>-->
                
                                  <!--   <div class="col-md-8 col-sm-8 col-xs-12">-->
                
                                  <!--      <input type="text" name="taxname[]" placeholder="SRB" class="form-control col-md-7 col-xs-12" />-->
                
                                  <!--  </div>-->
                
                                  <!--</div>-->
                                  <!--  <div class="clearfix"></div>-->
                                  <!--  <div class="mt-2" id="taxpercentage_2" style="display: none;">-->
                                  <!--       <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax%</label>-->
                                  <!--       <div class="col-md-8 col-sm-8 col-xs-12">-->
                                  <!--           <input type="text" name="taxpercentage[]" class="form-control col-md-7 col-xs-12" />-->
                                  <!--        </div>-->
                                  <!--</div>-->
                                  <!--  <div class="clearfix"><br/> <br/> <br/></div>-->
                                  <!--  <div class="ln_solid"></div>-->
            
                                <div class="form-group">
            
                                  <div class="col-md-6 col-sm-6 col-xs-12">
            
                                    <!--<button class="btn btn-primary" type="reset">Reset</button>-->
            
                                    <input type="hidden" name="generatedby" value="{{$name}}" />
                                      <!--<input type="submit" name="insertdata" class="btn btn-success" value="Generate Bill" <?php if($insertion == 0){ echo 'disabled'; }?>>-->
                                      <input type="button" class="btn btn-success"  id="getDetailBtn" value="Get Detail" >
            
                                  </div>
            
                                </div>

                        </div>
                            

                        </div>

                        <div id="input" class="p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3> All Builties</h3>
                                </div>

                                <div class="col-md-6">
                                      <input type="submit" name="insertdata" class="btn btn-success float-right"
                                      value="Generate Bill" id="generateBillButton"
                                      style="width: 17%;height: 29px;font-size: 12px;padding: 0px;"

                                      <?php if($insertion == 0){ echo 'disabled'; }?>
                                </div>
                                <script>
                                    $('#generateBillButton').on('click', function(event) {
                                            event.preventDefault(); // Prevent default form submission if inside a form
                                    
                                            // Array to hold checked builty IDs
                                            let checkedBuiltyIds = [];
                                                var customer_id = $('#customer').val();
                                                var bill_num = $('#bill_num').val();
                                                var bill_code = $('#bill_code').val();

                                            // Loop through checked checkboxes and collect their values
                                            $('.builty-checkbox:checked').each(function() {
                                                checkedBuiltyIds.push($(this).val());
                                            });
                                    
                                            // Check if the labour checkbox is checked
                                            let labourChargeValue = '';
                                            if ($('#labour').is(':checked')) {
                                                labourChargeValue = $('#labourChargeInput').val(); // Get the labour charge value
                                            }
                                            // Check if the fuel checkbox is checked and get its value
                                            let fuelChargeValue = '';
                                            if ($('#fuel').is(':checked')) {
                                                fuelChargeValue = $('#fuelChargeInput').val(); // Get the fuel charge value
                                            }

                                            if ($('#weight').is(':checked')) {
                                                weightValue = $('#weightInput').val(); // Get the fuel charge value
                                            }
                                
                                            // Check if the tax checkbox is checked and get its value
                                            let taxNameValue = '';
                                            if ($('#tax').is(':checked')) {
                                                taxNameValue = $('#taxNameInput').val(); // Get the tax name value
                                            }
                                            
                                            let taxInfo = [];
        
                                            // Check if the tax checkbox is checked
                                            if ($('#tax').is(':checked')) {
                                                $('input[name="taxname[]"]').each(function(index) {
                                                    const taxName = $(this).val();
                                                    const taxPercentage = $('input[name="taxpercentage[]"]').eq(index).val();
                                                    
                                                    if (taxName && taxPercentage) { // Ensure both fields are filled
                                                        taxInfo.push({
                                                            name: taxName,
                                                            percentage: taxPercentage
                                                        });
                                                    }
                                                });
                                            }

                                            // Log tax information to the console
                                            console.log("Tax Info:", taxInfo);
                                            // Prepare the data to be sent
                                                let formData = {
                                                    checkedBuiltyIds: checkedBuiltyIds,
                                                    labourCharge: labourChargeValue,
                                                    fuelCharge: fuelChargeValue,
                                                    weight: weightValue,
                                                    tax: taxInfo,
                                                    customer_id : customer_id,
                                                    bill_num: bill_num,
                                                    bill_code: bill_code,
                                                    _token: '{{ csrf_token() }}' // Include CSRF token
                                                };
                                        
                                                // Send the data using AJAX
                                                $.ajax({
                                                    url: '{{ url('generate-bill') }}', // Form action URL
                                                    type: 'POST',
                                                    data: formData,
                                                    success: function (response) {
                                                        // Handle success
                                                        console.log('Form submitted successfully:', response);
                                                        alert('Bill generated successfully!');
                                                        // Optionally reset the form or perform other actions
                                                    },
                                                    error: function (xhr) {
                                                        // Handle error
                                                        console.error('Error submitting form:', xhr);
                                                        alert('An error occurred while generating the bill.');
                                                    }
                                                });                                            
                                    });
                                </script>
                            </div>
                            <div class="preview articles">
    
                               <table id="bilty_table_for_bill" class="table table-hover display nowrap dataTable" style="width:100%">
    
                                  <thead>
    
                                     <tr>
                                        <th>Checked</th>
                                        <th>Builty ID</th>
                                        <th>Job No.</th>
                                        <th>Builty Date</th>
                                        <th>Expense</th>
                                        <th>Action</th>
                                     </tr>
    
                                  </thead>
    
                                  <tbody>
    
                                  </tbody>
    
                               </table>
                                <script>
                                $(document).ready(function() {
                                    $('#getDetailBtn').on('click', function() {
                                        // Collect form data
                                        var formData = {
                                            customer: $("#customer").val(),
                                             from: $('input[name="from"]').val(),
                                             to: $('input[name="to"]').val(),
                                        };
                                        console.log(formData);
                                        // Make AJAX call
                                         // Get the CSRF token from the meta tag
                                        var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                        $.ajax({
                                            url: '{{ route('get.details') }}',  // Laravel route helper
                                            method: 'POST',
                                            data: formData,
                                             headers: {
                                                'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                                            },
                                            success: function(response) {
                                                // Handle success response
                                                toastr.success('Data Load...', 'Success');

                                                // Clear previous table data
                                                    $('#bilty_table_for_bill tbody').empty();
                                                    var data = response.data;
                                                    console.log(data);
                                                    // Assuming response contains an array of records
                                                    data.forEach(function(item) {
                                                        // Create a new row
                                                        const row = `
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="builty-checkbox" value="${item.builty_id}" />
                                                                    <input type="hidden" class="builty-id" id="builty_id_${item.builty_id}" value="${item.builty_id}" />
                                                                </td>
                                                                <td>${item.builty_id}</td>
                                                                <td>${item.computerno}</td>
                                                                <td>${item.date}</td>
                                                                <td>${item.total_selling_expense}</td>
                                                                <td>
                                                                    <button class="btn btn-xs btn-primary type="button" onclick="showBuiltyDetails(${item.id})">View Details</button>
                                                                </td>
                                                            </tr>
                                                        `;
                                            
                                                        // Append the row to the table body
                                                        $('#bilty_table_for_bill tbody').append(row);
                                                    });

                                                // You can update the DOM or display the result as needed
                                            },
                                            error: function(xhr, status, error) {
                                                // Check if the response is JSON
                                                let errorMessage = 'An error occurred';
                                                try {
                                                    const jsonResponse = JSON.parse(xhr.responseText);
                                                    if (jsonResponse.message) {
                                                        errorMessage = jsonResponse.message;  // Use the message from the response
                                                    }
                                                } catch (e) {
                                                    // If parsing fails, keep the default error message
                                                    console.error('Failed to parse JSON:', e);
                                                }
                                        
                                                // Show error message
                                                toastr.error(errorMessage);
                                        
                                                // Log the entire response for debugging
                                                console.log(xhr.responseText);
                                            }
                                        });
                                    });
                                    
                                    
                                    
                                    

                                });
                                    // Function to open the modal
                                    function openModal() {
                                        document.getElementById("customModal").style.display = "block";
                                    }
                                    
                                    // Function to close the modal
                                    function closeModal() {
                                        document.getElementById("customModal").style.display = "none";
                                    }
                                    
                                    // Function to load and display builty details in the modal
                                    function showBuiltyDetails(builtyId) {
                                        event.preventDefault(); // Prevent the form from submitting
                                        // Fetch builty details using AJAX (adjust URL as needed)
                                        $.ajax({
                                            url: `/get-builty-details/${builtyId}`,
                                            method: 'GET',
                                            success: function(response) {
                                                // Populate the modal body with builty details
                                                // Create the modal content dynamically using template literals
                                                let modalBodyContent = `
                                                    <!-- Modal Body (Card) -->
                                                    <div class="card">
                                                        <!-- Card Header -->
                                                        <div class="card-header">
                                                            <h3><i class="fa fa-file-text"></i> Builty Information</h3>
                                                        </div>
                                                        
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <!-- Row 1 -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong><i class="fa fa-truck"></i> Builty ID:</strong>
                                                                    <span>${response.builty_id}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong><i class="fa fa-calendar"></i> Date:</strong>
                                                                    <span>${response.date}</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Row 2 -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong><i class="fa fa-user"></i> Customer ID:</strong>
                                                                    <span>${response.customer_name}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong><i class="fa fa-laptop"></i> Job No:</strong>
                                                                    <span>${response.computerno}</span>
                                                                </div>
                                                            </div>
                                            
                                                        </div>
                                                    </div>
                                                `;
                                                document.getElementById("modalBody").innerHTML = modalBodyContent;
                                                openModal(); // Open the modal after content is loaded
                                            },
                                            error: function(xhr) {
                                                alert("Error fetching builty details");
                                            }
                                        });
                                    }
                                    
                                    // Example usage: Call this function with the builty ID when you want to show details
                                    // showBuiltyDetails(item.id);

                            </script>
                            
                            
                            
                                <!-- Custom Modal Structure -->
                                <div id="customModal" class="custom-modal">
                                    <div class="custom-modal-content">
                                        <span class="close-btn" onclick="closeModal()">&times;</span>
                                        <!--<h2>Builty Details</h2>-->
                                        <div id="modalBody">
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    h2.text-center {
                                        font-size: 24px;
                                        font-weight: 600;
                                        margin-bottom: 20px;
                                    }
                                    
                                    .input-container {
                                        margin-top: 10px; /* Space between checkbox and input field */
                                    }
                                    /* Custom Modal Styles */
                                    .custom-modal {
                                        display: none; /* Hidden by default */
                                        position: fixed; /* Stay in place relative to the viewport */
                                        z-index: 1000; /* Sit on top */
                                        left: 0;
                                        top: 0;
                                        width: 100%; /* Full width */
                                        height: 100%; /* Full height */
                                        overflow: auto; /* Enable scroll if needed */
                                        background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
                                    }
                                    
                                    /* Centering the modal content */
                                    .custom-modal-content {
                                        background-color: #fefefe;
                                        padding: 20px;
                                        border: 1px solid #888;
                                        width: 80%; /* Can be adjusted */
                                        max-width: 600px; /* Limits the modal width */
                                        position: fixed; /* Fixed positioning to center in the viewport */
                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%); /* Center the modal */
                                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Optional shadow effect */
                                        border-radius: 10px; /* Optional rounded corners */
                                    }
                                    
                                    /* Close button */
                                    .close-btn {
                                        color: #aaa;
                                        float: right;
                                        font-size: 28px;
                                        font-weight: bold;
                                    }
                                    
                                    .close-btn:hover,
                                    .close-btn:focus {
                                        color: black;
                                        text-decoration: none;
                                        cursor: pointer;
                                    }
                                    
                                </style>
                            </div>
    
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

   <script type="text/javascript">



      var mh = [];

  $(document).ready(function(){



   localStorage.clear()  
    $('#weightCharge').hide();

    $('#labourCharge').hide();

    $('#fuelCharge').hide();

    $('#taxname').hide();

    $('#taxpercentage').hide();

    $('#weightClick').click(function(){

      if($('#weight').is(':checked')){

            $('#weightCharge').show();

        }else{

            $('#weightCharge').hide();

        }


    });


    $('#clickme').click(function(){

      if($('#labour').is(':checked')){

            $('#labourCharge').show();

        }else{

            $('#labourCharge').hide();

        }


    });

     $('#clickmefuel').click(function(){

        

      if($('#fuel').is(':checked')){

            $('#fuelCharge').show();

        }else{

            $('#fuelCharge').hide();

        }

    });

    $('#clickmetax').click(function(){

    //   if($('#tax').is(':checked')){

    //     $('#taxname').show();

    //     $('#taxpercentage').show();

    //     // $('#taxname_2').show();

    //     // $('#taxpercentage_2').show();

    //   }else{

    //     $('#taxname').hide();

    //     $('#taxpercentage').hide();
    //     // $('#taxname_2').hide();

    //     // $('#taxpercentage_2').hide();

    //   }

    });

    

  });

  var status = 'null';

  var ids = 0;

  

 /* function hello_medical(id){

     if ($("#hello_"+id).is(':checked')){

       status = 'medical_hide';

     }

     else{

       status = 'null';

     } 

  }

  */

  /*function hello_carton(id){

     if ($("#carton_check_"+id).is(':checked')){

       status = 'carton_hide';

     }

     else{

       status = 'null';

     }

  }

  */

 /* function view_update(id){

     ids = id;

      bill_ready()

  }*/

  

 /* function bill_ready(){

     var url = '<?php //echo url('/') ?>/generateBillById/'+ids+'/'+status+'';

     location.href = url;

  }

  */

 
$(document).ready(function() {
let taxCount = 0; // Counter for the number of tax fields

    // Show/hide tax fields based on checkbox state
    $('#tax').change(function() {
        if ($(this).is(':checked')) {
            $('#taxFieldsContainer').show();
        } else {
            $('#taxFieldsContainer').hide();
            $('#taxFieldsContainer').empty(); // Clear all tax fields when unchecked
            taxCount = 0; // Reset the counter
        }
    });

    // Add more tax fields
    $('#addMoreTax').click(function() {
        if (taxCount < 4) {
            taxCount++;
            const taxFields = `
                <div class="mt-2 tax-group" id="taxGroup_${taxCount}">
                    <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax Name</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="taxname[]" placeholder="Tax Name" class="form-control col-md-7 col-xs-12" />
                    </div>
                    <label class="form-label col-md-4 col-sm-4 col-xs-12">Tax %</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="taxpercentage[]" placeholder="Tax %" class="form-control col-md-7 col-xs-12" />
                    </div>
                    <button type="button" class="btn btn-danger btn-sm removeTax" data-id="${taxCount}">Remove</button>
                </div>
            `;
            $('#taxFieldsContainer').append(taxFields);
        } else {
            alert('You can only add up to 4 taxes.');
        }
    });

    // Remove a specific tax field group
    $('#taxFieldsContainer').on('click', '.removeTax', function() {
        const id = $(this).data('id');
        $(`#taxGroup_${id}`).remove();
        taxCount--; // Decrease the counter when a tax group is removed
    });






    // Flag to check if the fields are already added
    let fieldsAdded = false;

    // Handle the button click event
    // $('#addMoreTax').click(function() {
    //     // Check if fields are already added
    //     if (!fieldsAdded) {
    //         // Show the divs
    //         $('#taxname_2').show();
    //         $('#taxpercentage_2').show();

    //         // Change the button text to 'Remove' and update its class to a red button
    //         $(this).text('Remove').removeClass('btn-primary').addClass('btn-danger');

    //         // Set the flag to true
    //         fieldsAdded = true;
    //     } else {
    //         // Hide the divs when the button is 'Remove'
    //         $('#taxname_2').hide();
    //         $('#taxpercentage_2').hide();

    //         // Change the button text back to 'Add More' and update its class to a blue button
    //         $(this).text('Add More').removeClass('btn-danger').addClass('btn-primary');

    //         // Reset the flag to false
    //         fieldsAdded = false;
    //     }
    // });
});

  

  

</script>



   </script>

@endsection