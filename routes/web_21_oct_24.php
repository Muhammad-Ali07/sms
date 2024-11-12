<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php
Route::get('/bill', function () {
    return view('bills.formats.format_two');
});


Route::get('/cleareverything', function () {

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $clearroutes = Artisan::call('route:clear');
    echo "Route cache cleared<br>";

});



Route::get('dump-autoload', function() {
    $name = \DB::connection()->getDatabaseName(); return $name;
    echo "here";
//   \Artisan::call('dump-autoload');
//     echo 'dump-autoload complete';
});


// Route::get('custom-login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $email = $request->input('email');
//     $password = $request->input('password');

//     Log::info('Attempting login with:', ['email' => $email, 'password' => $password]);

//     if (Auth::attempt(['email' => $email, 'password' => $password])) {
//         return response()->json([
//             'message' => 'Login successful!',
//             'redirect_url' => route('home')
//         ], 200);

//     } else {
//         return response()->json(['message' => 'Invalid credentials.'], 401);
//     }
// })->name('login.custom');


Route::get('clear_cache', function () {
     Artisan::call('cache:clear');
     Artisan::call('view:clear');
    \Artisan::call('config:cache');
    dd("Cache is cleared");
});

Auth::routes();


Route::get('test-login', function () {
    $credentials = ['email' => 'admin@admin.com', 'password' => '12345678'];
    if (Auth::attempt($credentials)) {
        return 'Login successful!';
    } else {
        return 'Invalid credentials.';
    }
});

Route::get('custom-login', '\App\Http\Controllers\Auth\LoginController@customLogin')->name('login.custom');

Route::get('/login', function () {
    return view('adminLogin');
})->middleware('guest')->name('login');

Route::get('/', function () {
    return view('adminLogin');
})->middleware('guest');


Route::middleware(['auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard/{id}', 'HomeController@dashboard')->name('dashboard');
Route::get('/dashboard/{id}/widget-data', 'HomeController@fetchWidgetData')->name('widget-data-own');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
//NEw
Route::get('/view-edit-ratelist/{id}', 'rateController@view_edit_ratelist')->name('view-edit-ratelist');
Route::get('/save-edit-ratelist', 'rateController@save_edit_ratelist')->name('save-edit-ratelist');
//ENd
Route::get('/selfcompany-data', 'selfCompany@selfcompany_data')->name('selfcompany-data');
Route::get('/get-customer-station', 'biltyController@get_customer_station')->name('get-customer-station');

Route::get('/edit-bilty-tracking/{id}', 'biltyController@edit_bilty_tracking')->name('edit-bilty-tracking');

Route::post('/edit-tracking-builty-search', 'biltyController@edit_tracking_builty_search')->name('edit-tracking-builty-search');

Route::get('/print-challan-report/{id}','challan_Controller@print_challan_report')->name('print-challan-report');

Route::get('/checkbalance','challan_Controller@checkbalance')->name('checkbalance');

Route::post('/normal_ratelist_edit', 'rateController@normal_ratelist_edit')->name('normal_ratelist_edit');

Route::get('/Add-labels','customerController@add_labels')->name('Add-labels');
Route::post('/save-labels','customerController@save_labels')->name('save-labels');
Route::get('/manage-customer-rights',"customerController@manage_customer_rights");
Route::get('/fetch-unlinked-customers', 'customerController@fetch_unlinked_customers')->name('fetch-unlinked-customers');
Route::get('/fetch-customer-rights', 'customerController@fetch_customer_rights')->name('fetch-customer-rights');
Route::post('/save-customer-right', 'customerController@save_customer_right')->name('save-customer-right');
Route::post('/delete-customer-rights', 'customerController@delete_customer_rights')->name('delete-customer-rights');
Route::get('/check-customer-right-email', 'customerController@check_customer_right_email')->name('check-customer-right-email');
Route::get('/check-prefix', 'customerController@checkPrefix')->name('check.prefix');
//1/17/2022
Route::get('/Add-manual-book','biltyController@Add_manual_book')->name('Add-manual-book');
Route::post('/save-mannual-book','biltyController@save_mannual_book')->name('save-mannual-book');
Route::get('/edit-mannual-book/{id}','biltyController@edit_mannual_book')->name('edit-mannual-book');
Route::post('/save-edit-mannual-book','biltyController@save_edit_mannual_book')->name('save-edit-mannual-book');
Route::get('/delete-mannual-book/{id}','biltyController@delete_edit_mannual_book')->name('delete-mannual-book');
Route::get('/generate-mannual-book/{id}','biltyController@generate_mannual_book')->name('generate-mannual-book');

//End

//Yard
Route::get('/addYard', 'YardController@addYard')->name('addYard');
Route::post('/yard', 'YardController@storeYard')->name('yard.store');
Route::get('/yardEdit/{id}', 'YardController@yard_edit')->name('yard.edit');
Route::post('/yardUpdate/{id}', 'YardController@yard_update')->name('yard.update');
Route::get('/yardDelete/{id}', 'YardController@yardDelete')->name('yard.delete');

//pickup point
Route::get('/addPickupPoint', 'YardController@addPickupPoint')->name('addPickupPoint');
Route::post('/pickupPoint-store', 'YardController@storePickupPoint')->name('pickupPoint.store');
Route::get('/pickupPoint-edit/{id}', 'YardController@pickupPoint_edit')->name('pickupPoint.edit');
Route::post('/pickupPointUpdate/{id}', 'YardController@pickupPoint_update')->name('pickupPoint.update');
Route::get('/pickupPointDelete/{id}', 'YardController@pickupPointDelete')->name('pickupPoint.delete');

//Shipping line
Route::get('/addShippingLine', 'YardController@addShippingLine')->name('addShippingLine');
Route::post('/shippingLine-store', 'YardController@storeShippingLine')->name('shippingLine.store');
Route::get('/shippingLine-edit/{id}', 'YardController@shippingLine_edit')->name('shippingLine.edit');
Route::post('/shippingLineUpdate/{id}', 'YardController@shippingLine_update')->name('shippingLine.update');
Route::get('/shippingLineDelete/{id}', 'YardController@shippingLineDelete')->name('shippingLine.delete');

//Customer Routes
Route::post('/customer-Edit-Process', 'customerController@save_edit_customer')->name('customer-Edit-Process');
Route::get('/add-customer', 'customerController@add_customer')->name('add-customer');
Route::get('/delete-customer/{id}', 'customerController@del_customer')->name('delete-customer');
Route::get('/view-customer', 'customerController@view_customer')->name('view-customer');
Route::get('/edit-customer/{id}', 'customerController@edit_customer')->name('edit-customer');
Route::get('/edit_customer_record/{id}',"customerController@editCustomer");
Route::post('/add-customer-process', 'customerController@add_customer_process')->name('add-customer-process');
Route::get('/customer-profile', 'customerController@customer_profile')->name('customer-profile');



//Vehicle Type
Route::get('/vehicleType', 'customerController@showvehicleType')->name('vehicleType');
Route::get('/addvehicleType', 'customerController@addvehicleType')->name('addvehicleType');
Route::post('/vehicleType', 'customerController@vehicleType')->name('vehicleType.store');
Route::get('/vehicleTypeEdit/{id}', 'customerController@vehicleTypeEdit')->name('vehicleType.edit');
Route::post('/vehicleTypeUpdate/{id}', 'customerController@vechileUpdate')->name('vehicleType.update');
Route::get('/vehicleType/{id}', 'customerController@vehicleTypeDelete')->name('vehicleType.delete');
// Route::get('/vehicleType/{id}', 'customerController@vehicleTypeEdit')->name('vehicleType.edit');



//Broker Routes
Route::get('/index', 'BrokerController@index')->name('broker.index');
Route::get('/add-broker', 'BrokerController@add_broker')->name('add-broker');
Route::post('/add-broker-process', 'BrokerController@add_broker_process')->name('add-broker-process');
Route::get('/view-broker', 'BrokerController@view_broker')->name('view-broker');
Route::get('/view-broker/{id}', 'BrokerController@view_broker_single')->name('view-broker-single');
Route::get('/delete-broker/{id}', 'BrokerController@deleteBroker')->name('delete-broker');
Route::get('/edit-broker/{id}', 'BrokerController@brokerEdit')->name('broker-edit');
Route::post('/update-broker/{id}', 'BrokerController@brokerUpdate')->name('broker-update');

Route::get('/edit-rate','customerController@edit_rate')->name('edit-rate');
Route::post('/save-edit-rate','customerController@save_edit_rate')->name('save-edit-rate');
Route::get('/delete-rete-history','customerController@delete_rete_history')->name('delete-rete-history');
// End Customer


/*Start Roles */
Route::get('/add-roles', 'customerController@add_roles')->name('add-roles');
Route::get('/view-roles', 'customerController@view_roles')->name('view-roles');
Route::post('/roles','TrackingController@save_roles')->name('save.roles');
Route::get('/assign-roles', 'customerController@assign_roles')->name('assign-roles');
Route::post('/assign-role-process','customerController@assign_role_process')->name('assign-role-process');

/*End Roles*/
Route::get('/substation', 'stationController@sub_station')->name('substation');
Route::post('/add-sub-station-process', 'stationController@add_sub_station_process')->name('add-sub-station-process');
Route::get('/view-station-details/{id}', 'stationController@view_station_details')->name('view-station-details');
Route::get('/view-customers-details/{id}', 'customerController@view_customers_details')->name('view-customers-details');
Route::post('/filter-challan', 'challan_Controller@find_bilty_from_date')->name('filter-challan');
Route::post('/add-vehicle-voucher-process', 'challan_Controller@add_vehicle_voucher_process')->name('add-vehicle-voucher-process');
Route::get('/show-payment-voucher', 'challan_Controller@show_payment_voucher')->name('show-payment-voucher');
Route::get('/viewall-payment-voucher/{id}', 'challan_Controller@viewall_payment_voucher')->name('viewall-payment-voucher');
Route::get('/add-payment-voucher-Expsense/{id}', 'challan_Controller@add_payment_voucher_Expsense')->name('add-payment-voucher-Expsense');
Route::post('/add-vehicle-voucher-expense', 'challan_Controller@add_vehicle_voucher_expense')->name('add-vehicle-voucher-expense');
 Route::post('/add-nill-labour-process', 'challan_Controller@add_nill_labour_process')->name('add-nill-labour-process');
Route::get('/edit-vehicle-voucher-expense/{id}', 'challan_Controller@edit_vehicle_voucher_expense')->name('edit-vehicle-voucher-expense');

Route::post('/save-edit-vehicle-voucher/', 'challan_Controller@save_edit_vehicle_voucher')->name('save-edit-vehicle-voucher');
Route::get('/delete-challan-process/{id}', 'challan_Controller@delete_challan_process')->name('delete-challan-process');


//station Routes
Route::get('/stations', 'stationController@index')->name('station.index');

Route::get('/add-station', 'stationController@add_station')->name('add-station');
Route::get('/view-station', 'stationController@view_station')->name('view-station');
Route::post('/add-station-process', 'stationController@add_station_process')->name('add-station-process');
Route::get('/add-customer-to-station', 'stationController@add_customer_to_station')->name('add-customer-to-station');
Route::post('/add-customer-station-process', 'stationController@add_customer_station_process')->name('add-customer-station-process');
Route::get('/view-customer-to-station', 'stationController@view_customer_to_station')->name('view-customer-to-station');
Route::get('/edit-station-view/{id}', 'stationController@editstation')->name('edit-station-view');
Route::post('/save-edit-process', 'stationController@saveeditstation')->name('save-edit-process');
Route::get('/delete-edit-process/{id}', 'stationController@delete_station')->name('delete-edit-process');
//End Station
//package Rouetes
Route::get('/package', 'packageController@index')->name('package.index');
Route::get('/add-description', 'stationController@add_description')->name('add-description');
Route::post('/add-description-process', 'stationController@add_description_process')->name('add-description-process');
Route::post('/edit-save-package-process', 'packageController@save_edit')->name('edit-save-package-process');
Route::get('/add-package', 'packageController@add_package')->name('add-package');
Route::get('/view-package', 'packageController@view_package')->name('view-package');
Route::get('/edit-package/{id}', 'packageController@edit_packages')->name('edit-package');
Route::get('/del-package/{id}', 'packageController@delete_packages')->name('del-package');
Route::post('/add-package-process', 'packageController@add_package_process')->name('add-package-process');
//end packages
//warehouse routes
Route::get('/add-warehouse', 'warehouseController@add_warehouse')->name('add-warehouse');
Route::get('/delete-warehouse/{id}', 'warehouseController@del_warehouse')->name('delete-warehouse');
Route::get('/view-warehouse', 'warehouseController@view_warehouse')->name('view-warehouse');
Route::post('/add-warehouse-process', 'warehouseController@add_warehouse_process')->name('add-warehouse-process');
Route::get('/edit-warehouse/{id}', 'warehouseController@edit_warehouse')->name('edit-warehouse');
Route::post('/save_edit-warehouse', 'warehouseController@save_edit_warehouse')->name('save_edit-warehouse');
//warehouse End
//vehicle Route
Route::get('/add-vehicle', 'vehicleController@add_vehicle')->name('add-vehicle');
Route::get('/vehicles-payment', 'vehicleController@vehicles_payment')->name('vehicles-payment');
Route::post('/add-vehicle-process', 'vehicleController@add_vehicle_process')->name('add-vehicle-process');
Route::post('/edit-vehicle-process', 'vehicleController@edit_vehicle_process')->name('edit-vehicle-process');
Route::get('/vehicles-delete/{id}', 'vehicleController@delete_vehicle_process')->name('vehicles-delete');
Route::post('/add-vehicle-payment', 'vehicleController@add_vehicle_payment')->name('add-vehicle-payment');
Route::get('/vehicles-book-details', 'vehicleController@vehicles_book_details')->name('vehicles-book-details');
Route::post('/add-vehicles-boook-detail', 'vehicleController@add_vehicles_boook_detail')->name('add-vehicles-boook-detail');
Route::get('/vehicles-tax-details', 'vehicleController@vehicles_tax_details')->name('vehicles-tax-details');
Route::get('/vehicles-details', 'vehicleController@vehicles_details')->name('vehicles-details');
Route::get('/vehicles-edit/{id}', 'vehicleController@vehicles_edit')->name('vehicles-edit');
//End Vehicle
//SelfCompany
Route::get('/self-company', 'selfCompany@self_company')->name('self-company');
Route::post('/add-self-company', 'selfCompany@add_self_company')->name('add-self-company');
Route::get('/edit-self-company/{id}', 'selfCompany@edit_selfcompany')->name('edit-self-company');
Route::post('/save-edit-self-company', 'selfCompany@save_edit_selfcompany')->name('save-edit-self-company');
Route::get('/delete-self-company/{id}', 'selfCompany@delete_selfemployee')->name('delete-self-company');
Route::post('/delete-self-company/{id}', 'selfCompany@detele_view_selfcompany')->name('delete-self-company');
// End SelfCompany
//Maintenance Route
Route::get('/head-maintenance', 'maintenanceController@head_maintenance')->name('head-maintenance');
Route::get('/miantenance-edit/{id}', 'maintenanceController@maintenance_edit_process')->name('miantenance-edit');
Route::get('/miantenance-del/{id}', 'maintenanceController@maintenance_del_process')->name('miantenance-del');
Route::post('/save-maintenance-edit-process', 'maintenanceController@save_edit_maintenance')->name('save-maintenance-edit-process');
Route::get('/view-head-maintenance', 'maintenanceController@view_head_maintenance')->name('view-head-maintenance');
Route::post('/head-maintenance-process', 'maintenanceController@head_maintenance_process')->name('head-maintenance-process');
//End Maintenance
Route::get('/add-ratelist', 'rateController@add_ratelist')->name('add-ratelist');
Route::get('/view-ratelist', 'rateController@view_ratelist')->name('view-ratelist');
Route::get('/view-customer-ratelist', 'rateController@view_customer_ratelist')->name('view-customer-ratelist');
Route::get('/view-ratelist-detail/{id}', 'rateController@view_ratelist_detail')->name('view-ratelist-detail');
Route::get('/Edit-customer-profile', 'rateController@Edit_customer_profile')->name('Edit-customer-profile');
Route::get('/Edit-customer-profile-process/{id}', 'rateController@Edit_customer_profile_process')->name('Edit-customer-profile-process');
Route::post('/add-ratelist-process', 'rateController@add_ratelist_process')->name('add-ratelist-process');
Route::post('/add-simple-ratelist-process', 'rateController@add_simple_ratelist_process')->name('add-simple-ratelist-process');
Route::get('/add-station-prices', 'rateController@add_station_prices')->name('add-station-prices');
Route::get('/getbiltyno',"biltyController@getbiltyno");
Route::get('/checkbiltyno',"biltyController@checkbiltyno");
Route::post('/get_station',"biltyController@station_by_type");
Route::get('/add-bilty', 'biltyController@add_bilty')->name('add-bilty');
Route::get('/get-station-rate', 'biltyController@get_station_rate')->name('get-station-rate');
Route::get('/view-bilty', 'biltyController@view_bilty')->name('view-bilty');
Route::get('/view-paid-builty', 'biltyController@view_paid_builty')->name('view-paid-builty');
Route::get('/view-advance-builty', 'biltyController@view_advance_builty')->name('view-advance-builty');
Route::get('/view-to-pay-builty', 'biltyController@view_to_pay_builty')->name('view-to-pay-builty');
Route::get('/view-walkin-builty', 'biltyController@view_walkin_builty')->name('view-walkin-builty');



Route::get('/view-normal-builty', 'biltyController@view_normal_builty')->name('view-normal-builty');
Route::get('/edit-walkin-builty/{id}', 'biltyController@edit_walkin_builty')->name('edit-walkin-builty');
Route::get('/edit-customer-builty-request/{id}', 'biltyController@edit_customer_builty_request')->name('edit-customer-builty-request');
Route::get('/delete-walkin-builty/{id}', 'biltyController@delete_walkin_builty')->name('delete-walkin-builty');
Route::get('/change-customer-builty-request-status/{id}/{status}', 'biltyController@change_customer_builty_request_status')->name('change-customer-builty-request-status');


Route::get('/delete-customer-builty-request/{id}', 'biltyController@delete_customer_builty_request')->name('delete-customer-builty-request');
Route::post('/save-edit-walkin-builty', 'biltyController@save_edit_walkin_builty')->name('save-edit-walkin-builty');
Route::post('/save-edit-customer-builty-request', 'biltyController@save_edit_customer_builty_request')->name('save-edit-customer-builty-request');
Route::get('/tracking-builty', 'biltyController@builty_tracking')->name('tracking-builty');
Route::match(['get','post'],'/tracking-builty-search', 'biltyController@builty_tracking_seacrh')->name('tracking-builty-search');
Route::match(['get','post'],'/tracking-builty-panel/{id}', 'biltyController@tracking_builty_panel')->name('tracking-builty-panel');
Route::post('/add-bilty-process', 'biltyController@add_bilty_process')->name('add-bilty-process');
Route::post('/add-customer-bilty-request-process', 'biltyController@add_customer_bilty_request_process')->name('add-customer-bilty-request-process');
Route::post('/add-bilties-process', 'biltyController@add_bilties_process')->name('add-bilties-process');
Route::get('/generate-bilty/{id}', 'biltyController@generate_bilty')->name('generate-bilty');
Route::get('/generate-customer-bilty-request/{id}', 'biltyController@generate_customer_bilty_request')->name('generate-customer-bilty-request');
Route::get('/generate-urdu-bilty/{id}', 'biltyController@generate_urdu_bilty')->name('generate-urdu-bilty');
Route::get('/add-builty', 'biltyController@add_builty')->name('add-builty');
Route::get('/add-customer-bilty-request', 'biltyController@add_customer_builty_request')->name('add-customer-bilty-request');
Route::get('/paid-builty', 'biltyController@paid_builty')->name('paid-builty');
Route::get('/viewpdf/{id}',"biltyController@loadpdf");
Route::post('/paid_report',"biltyController@paid_report");
Route::post('/topaid_report',"biltyController@topaid_report");
Route::get('/topaid_edit/{id}',"biltyController@edit");
Route::get('/to-pay', 'biltyController@to_pay')->name('to-pay');
Route::post('/topaid_insert',"biltyController@insertform");
Route::get('/topaid_view/{id}',"biltyController@view");

Route::get('/add-bills', 'billController@add_bills')->name('add-bills');
Route::get('/view-bills', 'billController@view_bills')->name('view-bills');
Route::post('/generate-bill', 'billController@generate_bill')->name('generate-bill');
Route::get('/generateBillById/{id}/{status}',"billController@generateBillById");
Route::post('/deleteGeneratedBillFile',"billController@deleteGeneratedBillFile");
Route::get('add-monthly-bill', 'billController@add_monthly_bill');
Route::get('/delete-monthly-bill/{id}', 'billController@delete_monthly_bill')->name('delete-monthly-bill');
Route::post('add-monthly-bill-process', 'billController@add_monthly_billing_process');
Route::get('/edit-monthly-bill/{id}', 'billController@edit_monthly_bill')->name('edit-monthly-bill');
Route::post('/edit-monthly-bill-process', 'billController@edit_monthly_bill_process')->name('edit-monthly-bill-process');
Route::get('/get-bills', 'billController@getBills')->name('get-bills');
Route::post('/get-bilties-for-bill', 'billController@getBuiltiesForBill')->name('get.details');
Route::get('/get-builty-details/{id}', 'billController@getBuiltyDetails')->name('get.builty.details');


Route::get('/add-job-inquiry', 'JobInquiryController@create')->name('add-job-inquiry');
Route::post('/save-job-inquiry', 'JobInquiryController@save')->name('save-job-inquiry');
Route::get('/all-job-inquiry', 'JobInquiryController@index')->name('all-job-inquiry');
Route::get('/edit-job-inquiry/{id}', 'JobInquiryController@edit')->name('edit-job-inquiry');
Route::post('/update-status', 'JobInquiryController@updateStatus');
Route::post('/update-job-inquiry', 'JobInquiryController@update')->name('update-job-inquiry');
Route::post('/get-job-inquiry', 'biltyController@getJobInquiry');
// depositor routes
Route::get('/add-depositor', 'DepositorController@create')->name('add-depositor');
Route::post('/save-depositor', 'DepositorController@save')->name('save-depositor');
Route::get('/all-depositors', 'DepositorController@index')->name('view-depositors');
Route::get('/edit-depositor/{id}', 'DepositorController@edit')->name('edit-depositor');
Route::post('/update-depositor', 'DepositorController@update')->name('update-depositor');
Route::get('/delete-depositor/{id}', 'DepositorController@destroy')->name('delete-depositor');
// Initialiation routes
Route::get('/add-initialization', 'InitializationController@create')->name('add-initialization');
Route::post('/save-initialization', 'InitializationController@save')->name('save-initialization');
Route::get('/all-initializaitons', 'InitializationController@index')->name('view-initializations');
Route::get('/edit-initialization/{id}', 'InitializationController@edit')->name('edit-initialization');
Route::post('/update-initialization', 'InitializationController@update')->name('update-initialization');
Route::get('/get-bl-no', 'InitializationController@getBlNo');
// Route::get('/delete-depositor/{id}', 'DepositorController@destroy')->name('delete-depositor');

// Refund/Detention routes
Route::get('/add-refund-detention', 'RefundDetentionController@create')->name('add-refund-detention');
Route::get('/fetch-csm-data', 'RefundDetentionController@fetchCsmData');
Route::post('/save-refund-detention', 'RefundDetentionController@save')->name('save-refund-detention');
Route::get('/all-refund-detentions', 'RefundDetentionController@index')->name('view-refund-detentions');
Route::get('/refund-detention-edit/{id}', 'RefundDetentionController@edit')->name('refund-detention-edit');
Route::post('/update-refund-detention', 'RefundDetentionController@update')->name('update-refund-detention');
Route::get('/delete-refund-detention/{id}', 'RefundDetentionController@destroy')->name('delete-depositor');




Route::get('/add-challan','challan_Controller@add_challan')->name('add-challan');
Route::get('/view-challan','challan_Controller@view_challan')->name('view-challan');
Route::get('/trs-builty/{id}','challan_Controller@trs_builty')->name('trs-builty');
Route::post('/add-trs-builty','challan_Controller@add_trs_builty')->name('add-trs-builty');
Route::get('/challan-report/{id}','challan_Controller@challan_report')->name('challan-report');
Route::post('/add-challan-process', 'challan_Controller@add_challan_process')->name('add-challan-process');
Route::get('/generate-challan/{id}', 'challan_Controller@generate_challan')->name('generate-challan');
Route::get('/builycheck-challan', 'challan_Controller@builty_check_challan')->name('builycheck-challan');
Route::post('/save-goods-process',"biltyController@good_add_save")->name('/save-goods-process');
Route::post('/save-amaount-calculation',"biltyController@amount_add_save")->name('/save-amaount-calculation');
Route::get('/good-calculation',"biltyController@good_add")->name('/good-calculation');

Route::get('/filter-builty',"challan_Controller@filter_builty")->name('/filter-builty');

/* User Rights */

Route::get('/userRole',"userroleController@index");
Route::post('/addNewUser',"userroleController@addNewUser");

Route::get('/editUserControls/{id}',"userroleController@editUserControls");
Route::post('/updateUser',"userroleController@updateUser");
Route::get('/removeUser/{id}',"userroleController@removeUser");


/*Start Tracking*/
Route::get('/status','TrackingController@stutus')->name('add.status');
Route::post('/status','TrackingController@save_status')->name('save.status');
Route::post('/roles','TrackingController@save_roles')->name('save.roles');
Route::get('/status/edit/{id}','TrackingController@editStatus')->name('edit.status');
Route::post('/status/edit-process','TrackingController@save_editstatus')->name('save.editstatus');
Route::get('/status/delete/{id}','TrackingController@deletestatus')->name('delete.status');
Route::post('/add-tracking/chalan', 'TrackingController@track_by_challan')->name('track.challan');


Route::get('/bilty-tracking', 'TrackingController@bilty_tracking')->name('bilty-tracking');
Route::post('/bilty-tracking-process', 'TrackingController@bilty_tracking_process')->name('bilty-tracking-process');
Route::post('/bilty-tracking-filter', 'TrackingController@bilty_tracking_filter')->name('bilty-tracking-filter');
/*End Tracking*/


Route::get('/Add-CommissionBook', 'challan_Controller@viewSVG')->name('Add-CommissionBook');
Route::post('/saveviewSVG', 'challan_Controller@saveviewSVG')->name('saveviewSVG');
Route::get('/viewcommission/{id}', 'challan_Controller@viewcommission')->name('viewcommission');
Route::get('/showcommissionbook', 'challan_Controller@showcommissionbook')->name('showcommissionbook');
Route::post('/saveeditcommission', 'challan_Controller@saveeditcommission')->name('saveeditcommission');
Route::get('/NewviewCommission/{id}', 'challan_Controller@NewviewCommission')->name('NewviewCommission');


//Suggestion Routes
Route::get('/Add-suggestion', 'SuggestController@Add_suggestion')->name('Add-suggestion');
Route::post('/add-suggestion-process', 'SuggestController@add_suggestion_process')->name('add-suggestion-process');
Route::get('/view-suggestion', 'SuggestController@view_suggestion')->name('view-suggestion');
Route::get('/delete-suggest/{id}', 'SuggestController@delete_suggest')->name('delete-suggest');
Route::post('/get-suggest-data', 'SuggestController@get_suggest_data')->name('get-suggest-data');
Route::get('/edit-suggest/{id}', 'SuggestController@edit_suggest')->name('edit-suggest');
Route::post('/edit-suggest-porcess', 'SuggestController@edit_suggest_porcess')->name('edit-suggest-porcess');







/* Reports */
//Route::get('/vehicle-trip-report',"ReportController@vehicle_trip_report")->name('/vehicle-trip-report');
Route::get('/vehicle-trip-report-form',"ReportController@vehicle_trip_report_form")->name('/vehicle-trip-report-form');
Route::get('/challan-report',"ReportController@challan_report")->name('/challan-report');
Route::post('/filter-challan-report',"ReportController@filter_challan_report")->name('/filter-challan-report');


// Admin Panel After Login
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function()
{

    Route::resource('dashboard', 'AdminDashboardController',['as' => 'admin']);
    Route::get('employees/export',['as'=>'admin.employees.export','uses'=>'EmployeesController@export']);
    Route::get('employees/employeeLogin/{id}',['as'=>'admin.employees.employeeLogin','uses'=>'EmployeesController@employeesLogin']);
    Route::get('employees/employeelist',['as'=>'admin.employees.ajaxlist','uses'=>'EmployeesController@ajaxEmployees']);
    Route::resource('employees', 'EmployeesController',['except' => ['show'],'as' => 'admin']);
    Route::get('ajax_awards/',['as'=>'admin.ajax_awards','uses'=> 'AwardsController@ajax_awards']);
    Route::resource('awards', 'AwardsController',['except'=>['show'],'as' => 'admin']);
    Route::get('departments/ajax_designation/',['as'=>'admin.departments.ajax_designation','uses'=> 'DepartmentsController@ajax_designation']);
    Route::get('departments/ajax_department/',['as'=>'admin.departments.ajax_department','uses'=> 'DepartmentsController@ajaxDepartments']);
    Route::resource('departments', 'DepartmentsController',['as' => 'admin']);
    Route::get('ajax_expenses/',['as'=>'admin.ajax_expenses','uses'=> 'ExpensesController@ajax_expenses']);
    Route::resource('expenses', 'ExpensesController',['except' => ['show'],'as' => 'admin']);
    Route::get('holidays/mark_sunday', 'HolidaysController@Sunday');
    Route::resource('holidays', 'HolidaysController',['as' => 'admin']);
    Route::get('attendances/report/{attendances}', ['as'=>'admin.attendance.report','uses'=>'AttendancesController@report']);
    Route::get('attendances/ajax-attendance-list', ['as'=>'admin.attendance.ajax-attendance-list','uses'=>'AttendancesController@ajaxAttendanceList']);
    Route::post('attendances/export', ['as'=>'admin.attendance.export','uses'=>'AttendancesController@export']);
    Route::resource('attendances', 'AttendancesController',['as' => 'admin']);
    Route::get('leavetypes/ajax_list',['as'=>'admin.leavetypes.ajax_list','uses'=> 'LeavetypesController@ajaxLeaveType']);
    Route::resource('leavetypes', 'LeavetypesController',['except'=>['show'],'as' => 'admin']);
    Route::get('leave_applications/ajaxApplications',['as'=>'admin.leave_applications','uses'=> 'LeaveApplicationsController@ajaxApplications']);
    Route::resource('leave_applications', 'LeaveApplicationsController',['except'=>['create','store','edit'],'as' => 'admin']);
    Route::resource('settings', 'SettingsController',['only'=>['edit','update'],'as' => 'admin']);
    Route::get('add-salary-modal/{employeeID}',['as'=>'admin.add-salary-modal','uses'=>  'SalaryController@addSalaryModal']);
    Route::resource('salary','SalaryController',['only'=>['destroy','show','update','store'],'as' => 'admin']);
    Route::resource('profile_settings', 'ProfileSettingsController',['only'=>['edit','update'],'as' => 'admin']);
    Route::post('ajax_update_notification',['as'=>'admin.ajax_update_notification','uses'=> 'NotificationSettingsController@ajax_update_notification']);
    Route::resource('notificationSettings', 'NotificationSettingsController',['only'=>['edit','update'],'as' => 'admin']);
    Route::post('ajax_update_email_setting',['as'=>'admin.ajax_update_email_setting','uses'=> 'EmailSettingsController@ajax_email_setting']);
    Route::resource('email_settings', 'EmailSettingsController',['only'=>['edit','update'],'as' => 'admin']);
    Route::get('ajax_notices/',['as'=>'admin.ajax_notices','uses'=> 'NoticeboardsController@ajax_notices']);
    Route::resource('noticeboards', 'NoticeboardsController',['except'=>['show'],'as' => 'admin']);
    Route::get('update-new-version', ['as' => 'admin.updateVersion.index', 'uses' => 'AdminUpdateVersionController@index']);


});
Event::listen('auth.login', function($user)
{
    $user->last_login = new DateTime;
    $user->save();
});
// Lock Screen Routing
Route::get('screenlock', 'Admin\AdminDashboardController@screenlock');



/*mehmoodgoods Accounts*/
Route::get('/mehmoodgoodemployee/accountindex','mehmoodemployee\Accountindex@accountindex');
Route::get('/mehmoodgoodemployee/bank','mehmoodemployee\Bank@index');
Route::get('/mehmoodgoodemployee/pettycash',"mehmoodemployee\Pettycash@index");
Route::get('/mehmoodgoodemployee/dailycash',"mehmoodemployee\Dailycash@index");
Route::get('/mehmoodgoodemployee/paidreceipt',"mehmoodemployee\Paidreceipt@index");
Route::get('mehmoodgoodemployee/getbillbalance',"mehmoodemployee\Paidreceipt@getbillbalance");
Route::get('mehmoodgoodemployee/getbrokerbalance',"mehmoodemployee\Paidreceipt@getbrokerbalance");
Route::get('mehmoodgoodemployee/getbankbalance',"mehmoodemployee\Paidreceipt@getbankbalance");
Route::get('mehmoodgoodemployee/getpettycashamount',"mehmoodemployee\Paidreceipt@getpettycashamount");
Route::get('mehmoodgoodemployee/gettopaybalance',"mehmoodemployee\Paidreceipt@gettopaybalance");
Route::get('/getpaidtable',"mehmoodemployee\Paidreceipt@getpaidtable");
Route::get('/mehmoodgoodemployee/brokerpaid',"mehmoodemployee\Brokerpaid@index");
/*mehmoodgoods Accounts/ Banks*/
Route::get('/mehmoodgoodemployee/add_bank',"mehmoodemployee\Bank@addbank");
Route::get('/mehmoodgoodemployee/bankservices',"mehmoodemployee\Bank@bankservices");
Route::get('/mehmoodgoodemployee/banktransfer',"mehmoodemployee\Bank@banktransfer");
Route::get('/mehmoodgoodemployee/depositwithdrawl',"mehmoodemployee\Bank@depositwithdrawl");
Route::get('/mehmoodgoodemployee/bankledger',"mehmoodemployee\Bank@bankledger");
Route::get('/mehmoodgoodemployee/pettytransfer',"mehmoodemployee\Bank@pettytransfer");
Route::post('/mehmoodgoodemployee/createbankledger',"bank\BankLedgerController@bankledger")->name('createbankledger');

Route::post('/getOfficeBalance',"DailyExpenseController@getOfficeBalance")->name('getOfficeBalance');

/*mehmoodgoods Accounts/ Pettycash*/
Route::get('addpettycash',"mehmoodemployee\Pettycash@addpettycash");
Route::any('search',"mehmoodemployee\Pettycash@search")->name('search');;


Route::post('/mehmoodgoodemployee/addpettycashamount',"mehmoodemployee\Pettycash@addpettycashamount")->name('addpettycashamount');
Route::post('/mehmoodgoodemployee/editpettycashamount',"mehmoodemployee\Pettycash@editpettycashamount")->name('editpettycashamount');
Route::get('editpettycash/{id}',"mehmoodemployee\Pettycash@editpettycash");

Route::get('edit-account/{id}',"mehmoodemployee\Pettycash@editpettycash");
Route::post('/updatePettyCash',"mehmoodemployee\Pettycash@updatePettyCash");
Route::get('/removePettyCash/{id}',"mehmoodemployee\Pettycash@removePettyCash");
Route::get('addpettycashledger',"mehmoodemployee\Pettycash@addpettycashledger");
Route::get('/mehmoodgoodemployee/cashrecipt',"mehmoodemployee\Dailycash@cashrecipt");
Route::post('/mehmoodgoodemployee/add_cash_reciept',"mehmoodemployee\Dailycash@add_cash_reciept");
Route::get('/mehmoodgoodemployee/cashjournal',"mehmoodemployee\Dailycash@cashjournal");
Route::get('/mehmoodgoodemployee/cashreciptreports',"mehmoodemployee\Dailycash@cashreciptreports");
Route::get('/mehmoodgoodemployee/paidreceiptcustomer',"mehmoodemployee\Paidreceipt@paidreceiptcustomer");
Route::get('/mehmoodgoodemployee/paidreceiptbroker',"mehmoodemployee\Paidreceipt@paidreceiptbroker");
Route::post('/mehmoodgoodemployee/createpaidreceipt',"mehmoodemployee\Paidreceipt@insert")->name('createpaidreceipt');
Route::post('/mehmoodgoodemployee/createpaidreceiptbroker',"mehmoodemployee\Paidreceipt@insertbroker")->name('createpaidreceiptbroker');
Route::get('mehmoodgoodemployee/getwalletbalance',"mehmoodemployee\Paidreceipt@getwalletbalance");
Route::post('/deletepaidreceipt',"mehmoodemployee\Paidreceipt@deletepaidreceipt");
Route::get('/deletebrokerpaidreceipt',"mehmoodemployee\Paidreceipt@deletebrokerpaidreceipt");
Route::get('/mehmoodgoodemployee/viewpaidreceipt/{id}',"mehmoodemployee\Paidreceipt@viewpaidreceipt");
Route::get('/mehmoodgoodemployee/brokerpaidreceipt',"mehmoodemployee\Brokerpaid@brokerpaidreceipt");
Route::get('/mehmoodgoodemployee/viewpaidreceiptbroker/{id}',"mehmoodemployee\Paidreceipt@viewpaidreceiptbroker");
//for customer ledger routes
Route::get('mehmoodgoodemployee/customerledger',"mehmoodemployee\Paidreceipt@customerledger");
Route::get('mehmoodgoodemployee/brokerledger',"mehmoodemployee\Paidreceipt@brokerledger");
Route::post('/mehmoodgoodemployee/generatecustomerledger',"mehmoodemployee\Paidreceipt@generatecustomerledger")->name('generatecustomerledger');
Route::post('/mehmoodgoodemployee/generatebrokerledger',"mehmoodemployee\Paidreceipt@generatebrokerledger")->name('generatebrokerledger');
/*Bank controllers*/
Route::get('/bank',"bank\BankController@index")->name('view-bank');
Route::get('/add-bank',"bank\BankController@create")->name('add-bank');
Route::post('/store-bank',"bank\BankController@store")->name('store-bank');
Route::get('/edit-bank/{id}',"bank\BankController@edit")->name('edit-bank');
Route::post('/update-bank/{id}',"bank\BankController@update")->name('update-bank');
Route::get('/delete-bank/{id}',"bank\BankController@destroy")->name('delete-bank');
/*Bank service charge*/
Route::get('/bank-services',"bank\BankServiceChargeController@index")->name('bank-services');
Route::get('/add-bank-service-charge',"bank\BankServiceChargeController@create")->name('add-bank-service-charge');
Route::post('/add-bank-service-charge',"bank\BankServiceChargeController@store")->name('store-bank-service-charge');
Route::get('/edit-bank-service-charge/{id}',"bank\BankServiceChargeController@edit")->name('edit-bank-service-charge');
Route::post('/update-bank-service-charge/{id}',"bank\BankServiceChargeController@update")->name('update-bank-service-charge');
Route::get('/delete-bank-service-charge/{id}',"bank\BankServiceChargeController@destroy")->name('delete-bank-service-charge');
/*Bank Ledger*/
Route::get('/bank-ledger',"bank\BankLedgerController@index")->name('bank-ledger');
Route::post('/mehmoodgoodemployee/createbankledger',"bank\BankLedgerController@bankledger")->name('createbankledger');

/*Bank Deposit/Withdrawl*/
Route::get('/bank-deposit-withdrawl',"bank\BankFundsController@index")->name('bank-deposit-withdrawl');
Route::get('/add-bank-deposit-withdrawl',"bank\BankFundsController@create")->name('add-bank-deposit-withdrawl');
Route::post('/store-bank-deposit-withdrawl',"bank\BankFundsController@store")->name('store-bank-deposit-withdrawl');
Route::get('/edit-bank-deposit-withdrawl/{id}',"bank\BankFundsController@edit")->name('edit-bank-deposit-withdrawl');
Route::post('/update-bank-deposit-withdrawl/{id}',"bank\BankFundsController@update")->name('update-bank-deposit-withdrawl');
Route::get('/delete-bank-deposit-withdrawl/{id}',"bank\BankFundsController@destroy")->name('delete-bank-deposit-withdrawl');
/* Ajax Controller */
Route::get('/bank-account-amount/{id}',"AjaxController@bankAccountAmount")->name('bank-account-amount');
/*Bank Transfer*/
Route::get('/bank-transfer',"bank\BankTransferController@index")->name('bank-transfer');
Route::get('/add-bank-transfer',"bank\BankTransferController@create")->name('add-bank-transfer');
Route::post('/store-bank-transfer',"bank\BankTransferController@store")->name('store-bank-transfer');
Route::get('/edit-bank-transfer/{id}',"bank\BankTransferController@edit")->name('edit-bank-transfer');
Route::post('/update-bank-transfer/{id}',"bank\BankTransferController@update")->name('update-bank-transfer');
Route::get('/delete-bank-transfer/{id}',"bank\BankTransferController@destroy")->name('delete-bank-transfer');
Route::get('/view-transfer/{id}', "bank\BankTransferController@show")->name('view-transfer-details');
/*Bank To Petty Cash Transfer*/
Route::get('/bank-pettycash',"bank\BankToPettyCashController@index")->name('bank-pettycash');
Route::get('/add-bank-pettycash',"bank\BankToPettyCashController@create")->name('add-bank-pettycash');
Route::post('/store-bank-pettycash',"bank\BankToPettyCashController@store")->name('store-bank-pettycash');
Route::get('/edit-bank-pettycash/{id}',"bank\BankToPettyCashController@edit")->name('edit-bank-pettycash');
Route::post('/update-bank-pettycash/{id}',"bank\BankToPettyCashController@update")->name('update-bank-pettycash');
Route::get('/delete-bank-pettycash/{id}',"bank\BankToPettyCashController@destroy")->name('delete-bank-pettycash');
Route::get('/mehmoodreports/depositwithdrwalreport',"mehmoodreports\Accountsreports@depositwithdrawl");
Route::get('/mehmoodreports/bankledgerreports',"mehmoodreports\Accountsreports@bankledger");
Route::get('/mehmoodreports/pettycashledgerreport',"mehmoodreports\Accountsreports@pettycashledger");
Route::get('/mehmoodreports/banktopettycashtransferreports',"mehmoodreports\Accountsreports@banktopettycashtransfer");
Route::get('/mehmoodreports/bankservicescharereports',"mehmoodreports\Accountsreports@bankservicescharge");
Route::get('/mehmoodreports/banktransferreport',"mehmoodreports\Accountsreports@banktransfer");

// end account routes


Route::get('/extra-inventory','InventoryController@ExtraInventory')->name('extra-inventory');
Route::get('/delete-extra/{id}','InventoryController@delete_extra')->name('delete-extra');

Route::get('/edit-extra/{id}','InventoryController@edit_extra')->name('edit-extra');
Route::post('/edit-extra-porcess','InventoryController@edit_extra_process')->name('edit-extra-porcess');


Route::post('/SaveExtra', 'InventoryController@ExtraInventorySave')->name('SaveExtra');
Route::get('/checkpro', 'InventoryController@checkpro')->name('checkpro');
Route::get('/invoices-', 'InventoryController@invoices')->name('invoices');
Route::post('/generateinvoice', 'InventoryController@generateinvoice')->name('generateinvoice');
Route::post('/savegenerateinvoice','InventoryController@savegenerateinvoice')->name('savegenerateinvoice');
Route::post('/clearBill', 'InventoryController@clearBill')->name('clearBill');
Route::get('/clearshopamount/{id}', 'InventoryController@clearshopamount')->name('clearshopamount');
Route::post('/saveclearshopamount','InventoryController@saveclearshopamount')->name('saveclearshopamount');
Route::get('/checkprevious','InventoryController@checkprevious')->name('checkprevious');
Route::get('/checkpacking', 'InventoryController@checkpacking')->name('checkpacking');
Route::get('/delete-packing/{id}', 'InventoryController@delete_packing')->name('delete-packing');

Route::get('/edit-packing/{id}', 'InventoryController@edit_packing')->name('edit-packing');
Route::post('/edit-packing-process', 'InventoryController@edit_packing_process')->name('edit-packing-process');


Route::get('/add-packing', 'InventoryController@add_packing')->name('add-packing');
Route::post('/save-packing','InventoryController@save_packing')->name('save-packing');
Route::get('/add-inventory', 'InventoryController@add_inventory')->name('add-inventory');
Route::post('/add-inventory-data','InventoryController@add_inventory_process')->name('add-inventory-data');
Route::get('/view-inventory-data','InventoryController@view_inventory_data')->name('view-inventory-data');
Route::post('/edit-inventory-process', 'InventoryController@edit_inventory_process')->name('edit-inventory-process');
Route::get('/edit-inventory/{id}', 'InventoryController@edit_inventory')->name('edit-inventory');
Route::get('/delete-inventory/{id}', 'InventoryController@delete_inventory')->name('delete-inventory');
Route::post('/data-invevtory-process','InventoryController@data_inventory_process')->name('data-invevtory-process');
Route::get('/data-inventory', 'InventoryController@add_data_inventory')->name('data-inventory');
Route::post('/add-data-invevtory-process','InventoryController@module_inventory_process')->name('add-data-invevtory-process');
Route::post('/data-inventory process', 'InventoryController@data_inventory_process')->name('data-inventory process');
Route::get('/delete-data-inventory/{id}','InventoryController@delete_data_inventory')->name('delete-data-inventory');
Route::get('/purchase-inventory','InventoryController@purchase_inventory')->name('purchase-inventory');
Route::get('/edit-purchase-inventory/{id}', 'InventoryController@edit_purchase_inventory')->name('edit-purchase-inventory');
Route::post('/edit-purchase-inventory-process', 'InventoryController@edit_purchase_inventory-process')->name('edit-purchase-inventory-process');
Route::get('/delete-purchase-inventory/{id}','InventoryController@delete_purchase_inventory')->name('delete-purchase-inventory');
Route::post('/purchase-inventory-process', 'InventoryController@purchase_inventory_process')->name('purchase-inventory-process');
Route::get('/edit-purchase-inventory/{id}', 'InventoryController@editpurchaseinentory')->name('edit-purchase-inventory');
Route::post('/save-edit-purchase-inventory','InventoryController@saveeditpurchaseinventory')->name('save-edit-purchase-inventory');
Route::get('/add-warehouse','InventoryController@add_warehouse')->name('add-warehouse');

Route::get('/edit-ware-house/{id}','InventoryController@edit_ware_house')->name('edit-ware-house');
Route::post('/edit-ware-house-process','InventoryController@edit_warehouse_process')->name('edit-ware-house-process');

Route::get('/delete-warehouse/{id}','InventoryController@delete_warehouse')->name('delete-warehouse');
Route::post('/save-warehouse','InventoryController@save_warehouse')->name('save-warehouse');
//end inventory controller

//garage routes


Route::get('/accidentvehicles', 'GarageController@accidentvehicles')->name('accidentvehicles');
Route::get('/data-garage', 'GarageController@data_garage')->name('data-garage');
Route::post('/trip-garage-process', 'GarageController@trip_garage_process')->name('trip-garage-process');
Route::get('/trip-garage', 'GarageController@trip_garage')->name('trip-garage');
Route::get('/delete-garage/{id}', 'GarageController@delete_garage')->name('delete-garage');
Route::get('/garage-reports','GarageController@garage_reports')->name('garage-reports');
Route::post('/garagereportgenerate', 'GarageController@garagereportgenerate')->name('garagereportgenerate');
Route::get('/get-autoshop-categories','GarageController@get_autoshop_categories')->name('get-autoshop-categories');
Route::get('/garage', 'GarageController@add_new_garage')->name('garage');
Route::post('/save-add-new-garage','GarageController@save_add_new_garage')->name('save-add-new-garage');
Route::get('/vehicle-garage', 'GarageController@acident_garage')->name('acident-garage');
Route::post('/save-acident-garage','GarageController@save_acident_garage')->name('save-acident-garage');
Route::post('/save-edit-garage','GarageController@save_edit_garage')->name('save-edit-garage');
Route::get('/edit-garage/{id}', 'GarageController@edit_garage')->name('edit-garage');
Route::post('/add-item-process','GarageController@add_item_process')->name('add-item-process');
Route::get('/Edit-vehicle-expense/{id}','GarageController@Edit_vehicle_expense')->name('Edit-vehicle-expense');
Route::get('/delete_vehicle_expense/{id}', 'GarageController@delete_vehicle_expense')->name('delete_vehicle_expense');
Route::get('/Edit-vehicle-Accident/{id}','GarageController@Edit_vehicle_Accident')->name('Edit-vehicle-Accident');
Route::get('/Edit-vehicle-Replacement/{id}','GarageController@Edit_vehicle_Replacement')->name('Edit-vehicle-Replacement');



//end garage

//Category Controller
Route::get('/edit-category/{id}','categoryController@edit_category')->name('edit-category');
Route::get('/delete-category/{id}', 'categoryController@delete_category')->name('delete-category');
Route::post('/edit-category-process', 'categoryController@edit_category_process')->name('edit-category-process');
Route::get('/add-category', 'categoryController@add_category')->name('add-category');
Route::post('/save-category', 'categoryController@save_category')->name('save-category');
Route::get('/view-category', 'categoryController@view_category')->name('view-category');
//ENd Category


/*Route::get('/view-vehicle', 'vehicleController@view_vehicle')->name('view-vehicle');
Route::post('/add-vehicle-process', 'vehicleController@add_vehicle_process')->name('add-vehicle-process');*/






// vheicle income


Route::get('/view-income-detail', 'Vehicle_IncomeController@view_income_detail')->name('view-income-detail');
Route::post('/voucher-details', 'Vehicle_IncomeController@voucher_details')->name('voucher-details');
Route::post('/income-details', 'Vehicle_IncomeController@Vehicle_income_details')->name('income-details');
Route::get('/vehicle-expensive-detail', 'Vehicle_IncomeController@view_voucher_detail')->name('vehicle-expensive-detail');
Route::get('/view-voucher-detail', 'Vehicle_IncomeController@view_voucher_detail')->name('view-voucher-detail');
Route::get('/add-vehicles', 'Vehicle_IncomeController@add_vehicle')->name('add-vehicles');
Route::post('/add-vehicle-process', 'Vehicle_IncomeController@add_vehicle_process')->name('add-vehicle-process');
Route::get('/view-vehicle', 'Vehicle_IncomeController@view_vehicle')->name('view-vehicle');
Route::get('/edit-vehicle/{id}','Vehicle_IncomeController@edit_vehicle')->name('edit-vehicle');
Route::get('/delete-vehicle/{id}','Vehicle_IncomeController@delete_vehicle')->name('delete-vehicle');
Route::post('/edit-vehicle-process', 'Vehicle_IncomeController@edit_process_vehicle')->name('edit-vehicle-process');
Route::get('/add-vehicle', 'Vehicle_IncomeController@add_vehicle')->name('add-vehicle');
Route::post('/add-vehicle-process','Vehicle_IncomeController@add_vehicle_process')->name('add-vehicle-process');
Route::get('/delete-income/{id}', 'Vehicle_IncomeController@delete_income')->name('delete-income');
Route::get('/delete-expense/{id}', 'Vehicle_IncomeController@delete_expense')->name('delete-expense');
Route::get('/edit-income/{id}', 'Vehicle_IncomeController@edit_income')->name('edit-income');
Route::post('/edit-income-process', 'Vehicle_IncomeController@edit_income_process')->name('edit-income-process');
Route::get('/edit-expense/{id}','Vehicle_IncomeController@edit_expense')->name('edit-expense');
Route::post('/edit-expense-process', 'Vehicle_IncomeController@edit_expense_process')->name('edit-expense-process');
Route::get('/vehicleaccidentManagement/{id}','Vehicle_IncomeController@vehicleaccidentManagement')->name('vehicleaccidentManagement');

//end Controller


Route::get('/view-driver-form', 'Vehicle_IncomeController@view_driver_form')->name('view-driver-form');
Route::post('/insert-driver', 'Vehicle_IncomeController@insert_drivers')->name('insert-driver');
Route::get('/edit-driver/{id}', 'Vehicle_IncomeController@edit_drivers')->name('edit-driver');
Route::post('/save-edit-driver', 'Vehicle_IncomeController@save_edit_drivers')->name('save-edit-driver');
Route::get('/delete-driver/{id}', 'Vehicle_IncomeController@delete_drivers')->name('delete-driver');
Route::get('/assign-Driver','Vehicle_IncomeController@assign_Driver')->name('assign-Driver');
Route::post('/save-Driver-assign', 'Vehicle_IncomeController@save_assign_Driver')->name('save-Driver-assign');

Route::get('/save-edit-driver-assign/{id}', 'Vehicle_IncomeController@save_edit_driver_assign')->name('save-edit-driver-assign');
Route::get('/delete-Driver-assign/{id}', 'Vehicle_IncomeController@delete_Driver_assign')->name('delete-Driver-assign');


//Autoshop Controller
Route::get('/view-autoshop', 'AutoshopController@view_autoshop')->name('view-autoshop');
Route::get('/edit-autoshop/{id}', 'AutoshopController@edit_autoshop')->name('edit-autoshop');
Route::get('/delete-autoshop/{id}', 'AutoshopController@delete_autoshop')->name('delete-autoshop');
Route::post('/save-edit-autoshop', 'AutoshopController@save_edit_autoshop')->name('save-edit-autoshop');
Route::get('/add-autoshop', 'AutoshopController@add_autoshop')->name('add-autoshop');
Route::post('/save-autoshop', 'AutoshopController@save_autoshop')->name('save-autoshop');
Route::post('/view-autoshop', 'AutoshopController@view_autoshop')->name('view-autoshop');
//End Autoshop

//Expense Controller
Route::get('/view-daily-expense', 'DailyExpenseController@view_daily_expense')->name('view-daily-expense');
Route::get('/add-daily-expense', 'DailyExpenseController@add_daily_expense')->name('add-daily-expense');
Route::post('/add-daily-expense-process', 'DailyExpenseController@add_daily_expense_process')->name('add-daily-expense-process');
Route::get('/delete-daily-expense/{id}', 'DailyExpenseController@delete_daily_expense')->name('delete-daily-expense');
Route::get('/edit-daily-expense/{id}', 'DailyExpenseController@edit_daily_expense')->name('edit-daily-expense');
Route::post('/edit-daily-expense-process', 'DailyExpenseController@edit_daily_expense_process')->name('edit-daily-expense-process');
Route::post('/get-expense-data', 'DailyExpenseController@get_expense_data')->name('get-expense-data');
Route::get('/generate-daily-expense/{id}', 'DailyExpenseController@generate_daily_expense')->name('generate-daily-expense');

Route::post('/newOffice',"DailyExpenseController@newOffice")->name('newOffice');
Route::post('/office_report',"DailyExpenseController@office_report")->name('office_report');

Route::get('/add-labour-payment', 'DailyExpenseController@add_labour_payment')->name('add-labour-payment');
Route::get('/nill-labour/{id}', 'DailyExpenseController@nill_labour')->name('nill-labour');

Route::post('/save-mazda-expense', 'DailyExpenseController@save_mazda_expense')->name('save-mazda-expense');
Route::get('/delete-mazda-expense/{id}', 'DailyExpenseController@delete_mazda_expense')->name('delete-mazda-expense');
Route::post('/save-edit-mazda-expense', 'DailyExpenseController@save_edit_mazda_expense')->name('save-edit-mazda-expense');
Route::get('/edit-mazda-expense/{id}', 'DailyExpenseController@edit_mazda_expense')->name('edit-mazda-expense');
Route::get('/add-container', 'DailyExpenseController@add_container')->name('add-container');
Route::get('/delete-container/{id}', 'DailyExpenseController@delete_container')->name('delete-container');
Route::post('/save-container-expense', 'DailyExpenseController@save_container_expense')->name('save-container-expense');
Route::post('/save-edit-container-expense', 'DailyExpenseController@save_edit_container_expense')->name('save-edit-container-expense');
Route::get('/edit-container-expense/{id}', 'DailyExpenseController@edit_container_expense')->name('edit-container-expense');
Route::get('/reports-data', 'DailyExpenseController@reports_data')->name('reports-data');
Route::post('/get-account-reports', 'DailyExpenseController@get_account_reports')->name('get-account-reports');

Route::post('/generate_petty_report',"DailyExpenseController@generate_petty_report")->name('generate_petty_report');
Route::post('/addPettyCash',"DailyExpenseController@addPettyCash")->name('addPettyCash');
Route::post('/updateOffice',"DailyExpenseController@updateOffice");
Route::get('/removeOffice/{id}',"DailyExpenseController@removeOffice");
Route::post('/returnCash',"DailyExpenseController@returningCash")->name('returnCash');
Route::get('/nill-labour-payment', 'DailyExpenseController@nill_labour_payment')->name('nill-labour-payment');
Route::get('/add-heads', 'DailyExpenseController@add_heads')->name('add-heads');
 Route::get('/editOffice/{id}',"DailyExpenseController@editOffice")->name('editOffice');
//daily cash statement

Route::get('/add-cash-statment', 'DailyExpenseController@add_cash_statment')->name('add-cash-statment');
Route::post('/save-cash-statment', 'DailyExpenseController@save_head_statement')->name('save-cash-statment');
Route::get('/delete-head-statement/{id}', 'DailyExpenseController@delete_head_statement')->name('delete-head-statement');
Route::post('/save-edit-cash-statment', 'DailyExpenseController@save_edit_cash_statment')->name('save-edit-cash-statment');
Route::get('/edit-head-statement/{id}', 'DailyExpenseController@edit_head_statement')->name('edit-head-statement');
Route::get('/add-campus', 'DailyExpenseController@add_campus')->name('add-campus');
Route::post('/save-add-campus', 'DailyExpenseController@save_add_campus')->name('save-add-campus');
Route::get('/delete-campus/{id}', 'DailyExpenseController@delete_campus')->name('delete-campus');
Route::post('/save-edit-campus', 'DailyExpenseController@save_edit_campus')->name('save-edit-campus');
Route::get('/edit-campus/{id}', 'DailyExpenseController@edit_campus')->name('edit-campus');
Route::get('/headoffice-report', 'DailyExpenseController@cash_statement_report')->name('headoffice-report');
Route::post('/get-campus-report', 'DailyExpenseController@get_campus_report')->name('get-campus-report');
Route::post('/get-headoffice-report', 'DailyExpenseController@get_headoffice_report')->name('get-headoffice-report');
Route::get('/campus-report', 'DailyExpenseController@campus_report')->name('campus-report');
Route::get('/add-expense-category', 'DailyExpenseController@add_expense_category')->name('add-expense-category');
Route::post('/save-expense-category', 'DailyExpenseController@save_expense_category')->name('save-expense-category');
Route::get('/delete-expense-category/{id}', 'DailyExpenseController@delete_expense_category')->name('delete-expense-category');
Route::post('/save-edit-expense-category', 'DailyExpenseController@save_edit_expense_category')->name('save-edit-expense-category');
Route::get('/edit-expense-category/{id}', 'DailyExpenseController@edit_expense_category')->name('edit-expense-category');


//End Expense
Route::post('/edit-challan-process/{id}', 'challan_Controller@edit_challan_process')->name('edit-challan-process');
Route::get('/edit-challan/{id}','challan_Controller@edit_challan')->name('edit-challan');
Route::get('/station-builty', 'stationController@station_builty')->name('station-builty');
Route::get('/get-total-challan-frieght', 'challan_Controller@get_total_challan_frieght')->name('get-total-challan-frieght');
Route::get('/update-challan', 'challan_Controller@update_challan')->name('update-challan');

Route::post('/get-all-builties', 'biltyController@get_all_builties')->name('get-all-builties');
Route::get('/get-all-walkin-builties', 'biltyController@get_all_walkin_builties')->name('get-all-walkin-builties');
Route::get('/paid-report', 'biltyController@paid_report')->name('paid-report');

Route::get('/manage-paid-receiving', 'biltyController@manage_paid_receiving')->name('manage-paid-receiving');
Route::get('/GetBillDataByCus', 'biltyController@GetBillDataByCus')->name('GetBillDataByCus');
Route::get('/GetBiltyDataByBroker', 'biltyController@GetBiltyDataByBroker')->name('GetBiltyDataByBroker');

Route::get('/print_multiple_invoice/{array}', 'biltyController@print_multiple_invoice')->name('print_multiple_invoice');

Route::get('/search',"biltyController@search");


//tracking routes
Route::get('/add-tracking', 'TrackingController@view_tracking')->name('add-tracking');
Route::get('/fetch-builty-details','TrackingController@fetchBuiltyDetails');
Route::post('/add-tracking-process', 'TrackingController@view_tracking_process')->name('add-tracking-process');
Route::get('/delete-tracking/{id}', 'TrackingController@delete_tracking')->name('delete-tracking');

Route::post('/edit-tracking-process', 'TrackingController@edit_tracking_process')->name('edit-tracking-process');
Route::get('/edit-tracking/{id}', 'TrackingController@edit_tracking')->name('edit-tracking');
Route::get('/removeBillRecord/{id}',"billController@removeBillRecord");
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('monthly-billing', 'billController@monthly_billing');
Route::post('monthly-billing-report', 'billController@monthly_billing_report');
Route::post('check-builty-no', 'biltyController@check_builty_no')->name('check-builty-no');

Route::get('out-standing-bill', 'billController@out_standing_bill')->name('out-standing-bill');
Route::post('outstanding-bill-report', 'billController@outstanding_bill_report')->name('outstanding-bill-report');

 // });
Route::get('/generated-qr/{id}', 'biltyController@generated_qr')->name('generated-qr');



/*******************************************************************************
***************************SALARY ROUTES*********************************
*******************************************************************************/
Route::get('/salary',"Salary\Salary@index");
Route::post('/getEmployeeSalary',"Salary\Salary@getEmployeeSalary");
Route::post('/getEmployeeBalance',"Salary\Salary@getEmployeeBalance");
Route::post('/addSalary',"Salary\Salary@addSalary");
Route::get('/salary_ledger',"Salary\SalaryLedger@index");
Route::post('/generate_salary_ledger',"Salary\SalaryLedger@generate_salary_ledger");
Route::post('/salary_report',"Salary\Salary@salaryReport");
Route::post('/getEmployeeData',"Salary\Salary@getEmployeeData");


   // Employee Ledger

Route::get('/emp_ledger',"Employee\Empledger@index");
Route::post('/getEmployeeLedgerRecord',"Employee\Empledger@getEmployeeLedgerRecord");
Route::post('/getEmployeeWiseLedgerReport',"Employee\Empledger@getEmployeeWiseLedgerReport");
Route::post('/getEmployeeLedgerReport',"Employee\Empledger@getEmployeeLedgerReport");

// customer ledger
Route::post('/getCustomerLedgerReport',"CustomerLedgerController@getCustomerLedgerReport");
Route::get('/customer-ledger',"CustomerLedgerController@index");
Route::post('/getCustomerLedgerRecord',"CustomerLedgerController@getCustomerLedgerRecord");
Route::post('/getCustomerWiseLedgerReport',"CustomerLedgerController@getCustomerWiseLedgerReport");

// broker ledger
Route::get('/broker-ledger',"BrokerLedgerController@index");
Route::post('/getBrokerLedgerReport',"BrokerLedgerController@getBrokerLedgerReport");
Route::post('/getBrokerLedgerRecord',"BrokerLedgerController@getBrokerLedgerRecord");

/*******************************************************************************
****************************** RECEIVING MODULE ********************************
/******************************************************************************/
Route::get('/receiving',"Receiving\ReceivingController@mainpage")->name('receiving');
Route::post('/receiving_insert',"Receiving\ReceivingController@insertform");
Route::post('/GetPreviousBalance',"Receiving\ReceivingController@GetPreviousBalance"); /* AjaxFunction */
Route::get('/editRecievable/{id}',"Receiving\ReceivingController@editRecievable");
Route::post('/receiving_update',"Receiving\ReceivingController@receiving_update");
Route::get('/deleteRecievable/{id}/{type}',"Receiving\ReceivingController@removeReceivableRecord");



/*******************************************************************************
***************************BANK ROUTES******************************************
*******************************************************************************/
Route::get('/banks',"nsk\bank\BankController@mainpage");
Route::post('/bank_insert',"nsk\bank\BankController@insertform");
Route::get('/remove_bank/{id}','nsk\bank\BankController@remove');
Route::post('/bankservicecharges_report','nsk\bank\BankController@bankservicecharges_report');
Route::post('/bank_report','nsk\bank\BankController@bank_report');

/*******************************************************************************
*********************** BANK LEDGER MODULE *************************************
*******************************************************************************/
Route::get('/bank_ledger',"nsk\bank\BankledgerController@mainpage");
Route::post('/ledger_report',"nsk\bank\BankledgerController@ledger_report");

/*******************************************************************************
************************* BANK SERVICE CHARGES MODULE **************************
*******************************************************************************/
Route::get('/bank_service',"nsk\bank\BankservicechargesController@mainpage");
Route::post('/bankservicecharges_insert',"nsk\bank\BankservicechargesController@insertform");
Route::post('/servicecharges_report','nsk\bank\BankservicechargesController@bankservicecharges_report');
Route::post('/GetPreviousBalanceBank',"nsk\bank\BankservicechargesController@GetPreviousBalanceBank"); /* AjaxFunction */
Route::get('/deleteBankServiceCharges/{id}/{amount}','nsk\bank\BankservicechargesController@deleteBankServiceCharges');
Route::get('/editBankServiceCharges/{id}/{amount}','nsk\bank\BankservicechargesController@editBankServiceCharges');
Route::post('/editServiceCharges','nsk\bank\BankservicechargesController@updateBankServiceRecord');


/*******************************************************************************
***************************LEDGER ROUTES****************************************
*******************************************************************************/
Route::get('/ledger',"nsk\ledger\Ledger@index");
Route::post('/generate_main_ledger',"nsk\ledger\Ledger@generate_main_ledger");


/*******************************************************************************
***************************Reports****************************************
*******************************************************************************/
Route::get('/manager-wise-report-page',"ReportController@manager_wise_report_page")->name('manager-wise-report-page');
Route::post('/manager-wise-report',"ReportController@manager_wise_report")->name('manager_wise_report');

Route::get('/customer-wise-report-page',"ReportController@customer_wise_report_page")->name('customer-wise-report-page');
Route::post('/customer-wise-report',"ReportController@customer_wise_report")->name('customer_wise_report');

Route::get('/station-wise-report-page',"ReportController@station_wise_report_page")->name('station-wise-report-page');
Route::post('/station-wise-report',"ReportController@station_wise_report")->name('station_wise_report');

Route::get('/broker-wise-report-page',"ReportController@broker_wise_report_page")->name('broker-wise-report-page');
Route::post('/broker-wise-report',"ReportController@broker_wise_report")->name('broker_wise_report');

Route::get('/pnl-report-page',"ReportController@pnl_report_page")->name('pnl-report-page');
Route::post('/pnl-report',"ReportController@pnl_report")->name('pnl_report');


 });
