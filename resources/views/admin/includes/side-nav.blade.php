
<nav class="side-nav">
   <a href="index.php" class="intro-x flex items-center pl-5 pt-4">
      <img alt="" class="logo-Class" src="{{asset('src/images/logo.png')}}">
   </a>
   <div class="side-nav__devider my-6"></div>
   <ul>
      <li>
         <a href="index.php" class="side-menu side-menu--active">
            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
            <div class="side-menu__title">
               Dashboard

            </div>
         </a>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
            <div class="side-menu__title">
               Setup

               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                  <div class="side-menu__title">
                     Customer

                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('add-customer')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Customer </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('view-customer')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View Customer </div>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- <li>
               <a href="{{route('customer-profile')}}" class="side-menu">
               <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
               <div class="side-menu__title">
                   Customer Profile
               </div>
               </a>
            </li> -->




			<li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                  <div class="side-menu__title">
                     Customer Profile

                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
				   <a href="{{route('customer-profile')}}" class="side-menu">
				   <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
				   <div class="side-menu__title">
					   Add Customer Profile
				   </div>
				   </a>
				</li>
				<li>
				   <a href="{{route('view-customer-ratelist')}}" class="side-menu">
					   <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
					   <div class="side-menu__title">
						  View Customer Profile
					   </div>
				   </a>
				</li>
               </ul>
            </li>

			 <li>
               <a href="{{'self-company'}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                  <div class="side-menu__title">
                     Self Company
                  </div>
               </a>
            </li>



            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                  <div class="side-menu__title">
                     Station

                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('add-station')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Station </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('view-station')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View Station </div>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                  <div class="side-menu__title">
                     Packages

                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('add-package')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Packages </div>
                     </a>
                  </li>

               </ul>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                  <div class="side-menu__title">
                     Rate List
                     <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
             <?php
$check = DB::table('now_rateslist')
->where('customer_profile','normal')
->get();
if($check->count() == '0'){
?>
                  <li>
                     <a href="{{route('add-ratelist')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Rate List </div>
                     </a>
                  </li>
                  <?php } ?>
                  <li>
                     <a href="{{route('view-ratelist')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View Rate List </div>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                  <div class="side-menu__title">
                     Ware House
                     <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('add-warehouse')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Ware House </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('view-warehouse')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View Ware House </div>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                  <div class="side-menu__title">
                     Vehicles
                     <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('add-vehicle')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Vehicles </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('vehicles-payment')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Vehicles Payment </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('vehicles-book-details')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Vehicles Book Details </div>
                     </a>
                  </li>
                 <!-- <li>
                     <a href="{{route('vehicles-tax-details')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Vehicles Tax Detail </div>
                     </a>
                  </li>
                  <li> -->
                     <a href="{{route('vehicles-details')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View Vehicles Detail </div>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                  <div class="side-menu__title">
                     Maintenance Head

                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="{{route('head-maintenance')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Maintenance Head </div>
                     </a>
                  </li>

               </ul>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
            <div class="side-menu__title">
               Builty
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="{{route('add-bilty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Builty </div>
               </a>
            </li>
            <li>
               <a href="{{route('view-bilty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Builty </div>
               </a>
            </li>

			 <!--<li>
               <a href="{{route('view-paid-builty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Paid Builty </div>
               </a>
            </li> -->

			   <li>
               <a href="{{route('view-walkin-builty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Walkin Builty </div>
               </a>
            </li>

			 <!-- <li>
               <a href="{{route('view-advance-builty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Advance Builty </div>
               </a>
            </li> -->

              <!--<li>
               <a href="{{route('view-to-pay-builty')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View To Pay Builty </div>
               </a>
            </li> -->
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
            <div class="side-menu__title">
               Challan Form
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="{{route('add-challan')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Challan Form </div>
               </a>
            </li>
            <li>
               <a href="{{route('view-challan')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Challan Form </div>
               </a>
            </li>
            <!--<li>-->
            <!--   <a href="ViewChallanReport.php" class="side-menu">-->
            <!--      <div class="side-menu__icon"> <i data-feather="activity"></i> </div>-->
            <!--      <div class="side-menu__title"> View Challan Report </div>-->
            <!--   </a>-->
            <!--</li>-->
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
            <div class="side-menu__title">
               Billing
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="{{route('view-bills')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Bill  </div>
               </a>
            </li>
            <li>
               <a href="{{route('add-bills')}}" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bill Report  </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
            <div class="side-menu__title">
               Commission Book
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="AddCommissionBook.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Commission Book  </div>
               </a>
            </li>
            <li>
               <a href="ViewCommissionBook.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Commission Book  </div>
               </a>
            </li>
            <li>
               <a href="EmployeeReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Employee Report  </div>
               </a>
            </li>
         </ul>
      </li>

       <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
            <div class="side-menu__title">
               HR
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/employees/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Employee  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/employees" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Employee  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/departments" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Departments</div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/departments/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Departments  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/expenses/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Expense  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/expenses" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Expense  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/holidays/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Holidays  </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/holidays" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Holidays </div>
               </a>
            </li>
            <li>
               <a href="http://nsklog.com/nskupdated/public/admin/attendances/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Mark Attendance </div>
               </a>
            </li>

              <li>
               <a href="http://nsklog.com/nskupdated/public/admin/attendances" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Attendance </div>
               </a>
            </li>
              <li>
               <a href="http://nsklog.com/nskupdated/public/admin/leavetypes" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Leave Types </div>
               </a>
            </li>
              <li>
               <a href="http://nsklog.com/nskupdated/public/admin/leave_applications" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Leave Applications </div>
               </a>
            </li>

              <li>
               <a href="http://nsklog.com/nskupdated/public/admin/awards/create" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Awards </div>
               </a>
            </li>
              <li>
               <a href="http://nsklog.com/nskupdated/public/admin/awards" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Awards </div>
               </a>
            </li>


         </ul>
      </li>

      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
            <div class="side-menu__title">
               Accounts
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul>


      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
            <div class="side-menu__title">
               Bank Form
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="AddBank.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Bank </div>
               </a>
            </li>
            <li>
               <a href="ViewBank.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                  <div class="side-menu__title"> View Bank </div>
               </a>
            </li>
            <li>
               <a href="BanktoBankTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank to Bank Transfer </div>
               </a>
            </li>
            <li>
               <a href="ViewBanktoBankTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Bank to Bank Transfer </div>
               </a>
            </li>
            <li>
               <a href="BankServiceCharges.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank Service Charges </div>
               </a>
            </li>
            <li>
               <a href="ViewBankServicesCharges.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Bank Service Charges </div>
               </a>
            </li>
            <li>
               <a href="Depositwithdraw.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Deposit withdraw </div>
               </a>
            </li>
            <li>
               <a href="BanktoPettyCashTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank to Petty Cash Transfer </div>
               </a>
            </li>
            <li>
               <a href="ViewBanktoPettyCashTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Bank to Petty Cash Transfer </div>
               </a>
            </li>
            <li>
               <a href="BankLedger.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank Ledger </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
            <div class="side-menu__title">
               Petty Cash
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="AddPettyCash.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Add Petty Cash </div>
               </a>
            </li>
            <li>
               <a href="ViewPettyCash.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Petty Cash </div>
               </a>
            </li>
            <li>
               <a href="PettyCashtoBankTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Petty Cash to Bank Transfer </div>
               </a>
            </li>
            <li>
               <a href="ViewBanktoPettyCashTransfer.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Bank to Petty Cash Transfer </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="shopping-bag"></i> </div>
            <div class="side-menu__title">
               Daily Cash
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="CashReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Cash Receipt </div>
               </a>
            </li>
            <li>
               <a href="ViewCashReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Cash Receipt </div>
               </a>
            </li>
            <li>
               <a href="CashJournal.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Cash Journal </div>
               </a>
            </li>
            <li>
               <a href="AccountTitleReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Account Title Report </div>
               </a>
            </li>
            <li>
               <a href="CashJournalReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Cash Journal Report </div>
               </a>
            </li>
            <li>
               <a href="ViewJournalReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Journal Report </div>
               </a>
            </li>
            <li>
               <a href="CashReceiptReports.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Cash Receipt Reports </div>
               </a>
            </li>
            <li>
               <a href="AccountTitleReportCash.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Account Title Report </div>
               </a>
            </li>
            <li>
               <a href="DailyCashReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Daily Cash Report </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
            <div class="side-menu__title">
               Paid Receipt
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="CustomerReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Customer Receipt </div>
               </a>
            </li>
            <li>
               <a href="ViewPaidReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Paid Receipt </div>
               </a>
            </li>
            <li>
               <a href="BorkenReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Borken Receipt </div>
               </a>
            </li>
            <li>
               <a href="BorkenReceipt.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Paid Broken Receipt </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="alert-octagon"></i> </div>
            <div class="side-menu__title">
               Expenses
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="OfficeExpense.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Office Expense </div>
               </a>
            </li>
            <li>
               <a href="ViewOfficeExpense.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> View Office Expense </div>
               </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
            <div class="side-menu__title">
               Ledger
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="CustomerLedger.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Customer Ledger </div>
               </a>
            </li>
            <li>
               <a href="javascript:;.html" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                  <div class="side-menu__title">
                     Broker Ledger
                     <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
                     <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                  </div>
               </a>
               <ul class="">
                  <li>
                     <a href="AddBrokerLedger.php" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Add Broker Ledger  </div>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;.html" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="box"></i> </div>
            <div class="side-menu__title">
               Accounts Report
               <!-- <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div> -->
               <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
         </a>
         <ul class="">
            <li>
               <a href="BankServiceChargesReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank Service Charges Report  </div>
               </a>
            </li>
            <li>
               <a href="BankTransferReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank Transfer Report  </div>
               </a>
            </li>
            <li>
               <a href="DepositWithdrawalReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Deposit Withdrawal Report  </div>
               </a>
            </li>
            <li>
               <a href="BankLedgerReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank Ledger Report  </div>
               </a>
            </li>
            <li>
               <a href="PettyCashLedgerReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Petty Cash Ledger Report  </div>
               </a>
            </li>
            <li>
               <a href="BanktoPettyCashTransferReport.php" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                  <div class="side-menu__title"> Bank to Petty Cash Transfer Report  </div>
               </a>
            </li>
         </ul>
           </li>

   </ul>
   </li>
   <li>
               <a href="javascript:;" class="side-menu">
                  <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                  <div class="side-menu__title"> User Rights </div>
               </a>
            </li>
</nav>
