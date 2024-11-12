<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use mPDF;

class DailyExpenseController extends Controller
{
    public function add_daily_expense(){
       

        $data=DB::table('expense_category')->get();
        $column=DB::table('daily_expense')->get();

        return view ('DailyExpense.add-expense',compact('column','data'));
    }

    public function view_daily_expense(){

         $data=DB::table('expense_category')->get();
        $column = DB::table('daily_expense')
    ->join('expense_category', 'daily_expense.exp_category', '=', 'expense_category.id')
    ->select(
        'daily_expense.id as id',  // Alias the `id` column from daily_expense
        'daily_expense.Expense_Name', 
        'daily_expense.Expense_Amount',  // Add the specific columns from daily_expense that you need
        'daily_expense.Expense_Date',
        'expense_category.id as expense_category_id',  // Alias the id of expense_category
        'expense_category.expense_category as expense_category_name' // Use relevant fields from expense_category
    )
    ->where('daily_expense.is_delete', 1)
    ->get();
    //   dd($column);
        return view('DailyExpense.expense-reports',compact('column','data'));
    }

    public function add_daily_expense_process(Request $request){


       // dd($request->all());
        $expensename = $request->input('expensename');
        $expensedate = $request->input('expensedate');
        $expenseamount = $request->input('expenseamount');
        $expcategory = $request->input('expcategory');

        $insert = DB::table('daily_expense')->insert([

            'Expense_Name' => $expensename,
            'Expense_Date' => $expensedate,
            'Expense_Amount' => $expenseamount,
            'exp_category' => $expcategory,
        ]);


        return redirect('view-daily-expense');

    }




    public function edit_daily_expense_process(Request $request){

   //dd($request->all());
   $id       = $request->input('id');
   $expensename = $request->input('expensename');
   $expensedate = $request->input('expensedate');
   $expenseamount = $request->input('expenseamount');
   $expcategory = $request->input('expcategory');
   

        $insert = DB::table('daily_expense')
        ->where('id',$id)
        ->update([

            'Expense_Name' => $expensename,
            'Expense_Date' => $expensedate,
            'Expense_Amount' => $expenseamount,
            'exp_category' => $expcategory,
            
        ]);


        return redirect('view-daily-expense');

    }


    public function delete_daily_expense($id){



        $insert = DB::table('daily_expense')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);
        return redirect('view-daily-expense');

    }




    

    public function edit_daily_expense($id){

     //   $selectcategory = DB::table('category')->get();
    $data=DB::table('expense_category')->get();
        $query = DB::table('daily_expense')
        ->where('id',$id)
        ->first();
   
        
        $column=DB::table('daily_expense')
        ->where('is_delete',1)
        ->get();
    
        return view ('DailyExpense.add-expense',compact('query','column','data'));
    
    }

    public function get_expense_data(Request $request){

    
     $data=DB::table('expense_category')
     ->get();

        $getexpense =DB::table('daily_expense')
          
           ->whereBetween('Expense_Date',[$request->fromdate,$request->todate])
            ->get();

       // dd($getexpense); 
        $column=DB::table('daily_expense')
        ->get();
        // dd($getexpense);
        $pdf = PDF::loadView('DailyExpense.generatedailyreport',['getexpense'=>$getexpense]);
        $pdf->setPaper('A4', 'Landscape');
      return $pdf->stream('report.pdf');      

        return view('DailyExpense.expense-reports',compact('column','getexpense','data'));
    }

    public function generate_daily_expense($id){
        
    $getexpense['expensereports']= DB::table('daily_expense')->find($id);
    // dd($getexpense['expensereports']);
        $pdf = PDF::loadView('DailyExpense.generatedailyreport',['getexpense'=>$getexpense]);
        $pdf->setPaper('A4', 'Landscape');
      return $pdf->stream('report.pdf');
    }



    public function add_expense_category(){

        
         $data=DB::table('expense_category')
 ->where('is_delete',1)
         ->get();
        $expcategory=DB::table('expense_category')
         ->where('is_delete',1)
        ->get();


        return view('DailyExpense.add-expense-category',compact('expcategory','data'));
    }
    public function save_expense_category(Request $request){

        $categorydate = $request->input('categorydate');
        $categoryname = $request->input('expensecategory');

         $insert = DB::table('expense_category')->insert([

            'category_date' => $categorydate,
            'expense_category' => $categoryname,
          
        ]);

return redirect('add-expense-category');

    }


    public function delete_expense_category($id){


        $insert = DB::table('expense_category')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);

        return redirect('add-expense-category');

    }

public function edit_expense_category($id){

     

        $query = DB::table('expense_category')
        ->where('id',$id)
        ->first();
   
        
         $data=DB::table('expense_category')
         ->where('is_delete',1)
         ->get();
        $expcategory=DB::table('expense_category')
         ->where('is_delete',1)
        ->get();
    
        return view ('DailyExpense.add-expense-category',compact('query','data','expcategory'));
    
    }
 public function save_edit_expense_category(Request $request){

   //dd($request->all());
         $id       = $request->input('id');
        $categorydate = $request->input('categorydate');
        $categoryname = $request->input('expensecategory');
   

        $insert = DB::table('expense_category')
        ->where('id',$id)
        ->update([

            'category_date' => $categorydate,
            'expense_category' => $categoryname,
          
        ]);


        return redirect('add-expense-category');

    }

public function add_labour_payment(){
$dateWiseLabour = [];
$mazdadata=DB::table('daily_mazda_labour')
->where('is_delete',1)
->paginate(30);

$container=DB::table('daily_container')
->where('is_delete',1)
->paginate(30);

foreach($container as $cont){
   
    $dateWiseLabour[$cont->Container_date][] = $cont->Container_Amount;
}

foreach($mazdadata as $mazda){
  
    $dateWiseLabour[$mazda->Mazda_date][] = $mazda->Mazda_Amount;
}

return view('DailyExpense.add-labour',compact('mazdadata','container','dateWiseLabour'));

}

public function nill_labour($date){
   return view('DailyExpense.add-labour-expenses',compact('date'));

}
    
    public function nill_labour_payment(){
        
        $data['office']      = DB::table('office')->get();
        if(isset($_GET['q'])){
            $q = $_GET['q'];
    		$data['pettycash'] = DB::table('pettycash')
                        ->join('office','pettycash.fk_office_id','office.office_id')
                        ->where ('office.office_name', 'LIKE', '%' . $q . '%' )
                        // ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
                        ->select('pettycash.*')
                        ->paginate(30)->setPath ('');
        
            $data['pagination'] = $data['pettycash']->appends ( array (
                'q' => $_GET['q']
              ) );
        }else{
            $data['pettycash']   = DB::table('pettycash')->orderBy('id','DESC')->paginate(30);
        }
		$data['petty_meta']  = DB::table('pettycash_meta')->get();
		$data['bank_record'] = DB::table('ws_banks')->get();
// 	dd($data);
        return view('DailyExpense.nill-labour-payment',$data);
    }
    
    
    
     public function getlabourpayment(){
        global $row_count;
        $row_count = 1;

        $data['office'] = DB::table('office')->get();
		$data['pettycash'] = DB::table('pettycash')->orderBy('id','DESC')->paginate(30);
		$data['petty_meta'] = DB::table('pettycash_meta')->get();
		$data['bank_record'] = DB::table('ws_banks')->get();
	



        // $bills = DB::table('bill')
        //     ->select('bill.bill_id', 'bill.bill_Number', 'bill.bill_date', 'bill.total', 'bill.desType',
        //         'bill.tax_percentage',  'bill.bill_date', 'bill.end_date', 'bill.bill_customer', 'customer.name')
        //     ->join('customer', 'bill.bill_customer', 'customer.id');

    

        return DataTables::of($data)
            ->filter(function ($query) {
                $value = \request()->get('search')['value'];

                if(!is_null($value) && !empty($value)){
                    $query->where(function ($query) use ($value){
                        $query->orWhere('pettycash.office_name', 'LIKE', '%'.$value.'%');
                    });
                }
            })
            ->editColumn('bill_Number', function ($data) {
                $cust = explode(' ',$data->office_name);
                $result ='';
                $bill_no = date('ym',strtotime($data->date));
                
                foreach($cust as $name){
                    $result .= substr($name,0,1);
                }
                $wrd = substr($result,0,2);
                $wrd = str_replace('(',"",$wrd);
                $wrd = str_replace('&',"",$wrd);
                

                return $bill_no;
            })
            ->editColumn('total', function ($bill) {
                $taxamountss = DB::table('now_builty')
                    ->select('now_builtyitems.total')
                    ->join('now_station','now_builty.to','now_station.id')
                    ->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')
                    ->WhereBetween('now_builty.date',[$bill->bill_date,$bill->end_date])
                    ->where('now_station.station_type_name','=',$bill->desType)
                    ->where('now_builty.customer',$bill->bill_customer)
                    ->sum('now_builtyitems.total');

                return !empty($bill->tax_percentage) ?  $taxamountss + ( $taxamountss * ($bill->tax_percentage / 100)) : $taxamountss;
            })
            ->addColumn('sno', function ($bill) {
                global $row_count;
                return $row_count++;
            })
            ->addColumn('action', function ($bill) {
                $actions = '<a href="javascript:void(0)" onclick="view_update('.$bill->bill_id.')">';
                $actions .= '<i class="fa fa-eye"></i></a> | ';

                if(false){
                    $actions .= '<a href="url(\'removeBillRecord/'.$bill->bill_id.');\'"><i class="fa fa-times"></i></a>';
                }else {
                    $actions .= '<a href="javascript:void(0)" data-toggle="tooltip" title="You don\'t have enough permision for this action.">
                            <i class="fa fa-times"></i>
                        </a>';
                }

                return $actions;
            })->make();
    }
    
    
    
    public function generate_petty_report(Request $req){
       
		$office_id = $req->input('office');
	
		$from = date('Y-m-d',strtotime($req->input('from')));
		$to = date('Y-m-d',strtotime($req->input('to')));
        $fromnew = "2016-01-01";
        $tonew = date("Y-m-d");
		if($office_id == "All"){
		    
			$data['individual'] = 0;
			$data['petty_Record'] = DB::table('pettycash')->whereBetween('date',[$from,$to])->get();
			$data['pettymeta'] = DB::table('pettycash_meta')->get();
            //	$data['getbalance'] = DB::table('office')->get();
            $data['petty_Records'] = DB::table('pettycash')->whereBetween('date',[$fromnew,$tonew])->get();

            $data['pettymetas'] = DB::table('pettycash_meta')->get();
			$data['office'] = DB::table('office')->get();
            $data['office_name'] = DB::table('office')
            //->where(['office_id'=>$office_id])
            ->get();
           

// 			$mpdf = new \mPDF('utf-8', 'A4-L');
	    $pdf = PDF::loadView('DailyExpense/pettyCashReport',$data);
	    return $pdf->stream('ledger_report.pdf');
		}else{
		  
			$data['individual'] = 1;
			$data['petty_Record'] = DB::table('pettycash')->whereBetween('date',[$from,$to])->where('fk_office_id',$office_id)->get();
			$data['pettymeta'] = DB::table('pettycash_meta')->get();
            $data['petty_Records'] = DB::table('pettycash')->whereBetween('date',[$fromnew,$tonew])->where(['fk_office_id'=>$office_id])->get();

            $data['pettymetas'] = DB::table('pettycash_meta')->get();
			$data['office'] = DB::table('office')->get();
            $data['office_name'] = DB::table('office')
            ->where(['office_id'=>$office_id])
            ->get();
           
          
// 			$mpdf = new \mPDF('utf-8', 'A4-L');

	    $pdf = PDF::loadView('DailyExpense/pettyCashReport',$data);
	    return $pdf->stream('ledger_report.pdf');
		}
	}
	
	
    public function addPettyCash(Request $req){
       
		$date = date('Y-m-d',strtotime($req->input('date')));
		$office = $req->input('office');
		$payType = $req->input('payType');
		/*ARRAYS*/
		$desc = $req->input('desc');
		$ref = $req->input('ref');
		$amount = $req->input('amount');
		$ttlamount = 0;
		$totalPettyCashAmount = 0;

		/**ADDING AMOUNT TO SELECTED OFFICE OR DEDUCTING THE AMOUNT BY TYPE SELECTED**/
		$data['get_balance'] = DB::table('office')->where('office_id',$office)->get();
		$totalBalance = $data['get_balance'][0]->office_balance;

		if($payType == "Payment"){
			foreach($amount as $amnt){
				$ttlamount += $amnt;
			}
// 			if($ttlamount > $totalBalance){
				// return redirect('pettyCash')->with('error',"Sorry not enough balance to proceed");
// 			}else{
				$result = $totalBalance - $ttlamount;
				$officeBalance = array(
					'office_balance'=>$result
				);
				$setOfficeBalance = DB::table('office')->where('office_id',$office)->update($officeBalance);
				/******ADDING RECORD TO PETTYCASH********/
				$pcInfo = array(
					'date'=>$date,
					'fk_office_id'=>$office,
					'type'=>$payType
				);
				$lastId = DB::table('pettycash')->insertGetId($pcInfo);
				foreach($req->desc as $key => $value){
					$dataExp = array(
						'desc'=>$desc[$key],
						'ref'=>$ref[$key],
						'amount'=>$amount[$key],
						'fk_pettycash_id'=>$lastId
					);
					DB::table('pettycash_meta')->insert($dataExp);
					$totalPettyCashAmount += $amount[$key];
				}
				$description = implode(",",$desc);
				$reference = implode(",",$ref);

				$dataLdg = array(
					'date'=>$date,
					'description'=>$description,
					'ref'=>$reference,
					'credit'=>$totalPettyCashAmount,
					'fk_petty_id'=>$lastId,
					'fk_office_id'=>$office
				);
				$ledgerUpdate = DB::table('pettycash_ledger')->insert($dataLdg);
				return redirect('nill-labour-payment')->with('message',"Record Added and Balance Updated successfully");
// 			}
		}else{
			foreach($amount as $amnt){
				$ttlamount += $amnt;
			}
			$result = $totalBalance + $ttlamount;
			$officeBalance = array(
				'office_balance'=>$result
			);
			$setOfficeBalance = DB::table('office')->where('office_id',$office)->update($officeBalance);
			/******ADDING RECORD TO PETTYCASH********/
			$pcInfo = array(
				'date'=>$date,
				'fk_office_id'=>$office,
				'type'=>$payType
			);
			$lastId = DB::table('pettycash')->insertGetId($pcInfo);
			foreach($req->desc as $key => $value){
				$dataExp = array(
					'desc'=>$desc[$key],
					'ref'=>$ref[$key],
					'amount'=>$amount[$key],
					'fk_pettycash_id'=>$lastId
				);
				DB::table('pettycash_meta')->insert($dataExp);
				$totalPettyCashAmount += $amount[$key];
			}
			$description = implode(",",$desc);
			$reference = implode(",",$ref);

			$dataLdg = array(
				'date'=>$date,
				'description'=>$description,
				'ref'=>$reference,
				'debit'=>$totalPettyCashAmount,
				'fk_petty_id'=>$lastId,
				'fk_office_id'=>$office
			);
			$ledgerUpdate = DB::table('pettycash_ledger')->insert($dataLdg);
			return redirect('nill-labour-payment')->with('message',"Record Added and Balance Updated successfully");
		}
	}
	
    
    public function add_heads(){
       
       	$data['offices'] = DB::table('office')->get();
		
        return view('DailyExpense.add_heads',$data);
    }
    
    
    public function returningCash(Request $req){
		$office_id = $req->input('roffice');
		$bank_id = $req->input('bank');
		$amount = $req->input('ramount');

		$data['getOfficeAmount'] = DB::table('office')->where('office_id',$office_id)->get();
		$currentOfficeAmount = $data['getOfficeAmount'][0]->office_balance;

		$data['getBankAmount'] = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
		$currentBankAmount = $data['getBankAmount'][0]->TotalAmount;
		if($currentOfficeAmount < $amount){
			return redirect()->back()->with('error',"Office doesn't have enough Amount to return at this time.");
		}else{
			$bankTotalAmount = $currentBankAmount + $amount;
			$bank_amount = array(
				'TotalAmount'=>$bankTotalAmount
			);
			$updateBank = DB::table('ws_banks')->where('PKBankID',$bank_id)->update($bank_amount);

			$officeTotalAmount = $currentOfficeAmount - $amount;
			$office_amount = array(
				'office_balance'=>$officeTotalAmount
			);
			$updateBank = DB::table('office')->where('office_id',$office_id)->update($office_amount);

			$bank_name = $data['getBankAmount'][0]->BankName;
			$office_name = $data['getOfficeAmount'][0]->office_name;
			$data = array(
				'date'=>date('Y-m-d'),
				'fk_office_id'=>$office_id,
				'type'=>'Daily Cash Return',
				'return_amount'=>$amount,
				'fk_bank_id'=>$bank_id
			);
			$pettyCash = DB::table('pettycash')->insertGetId($data);
			$bnk_array = array(
				'bank_ledger_date'=>date('Y-m-d'),
				'bank_ledger_name'=>$bank_name,
				'bank_ledger_type'=>'Daily Cash Return',
				'CustomerName'=>$office_name,
				'bank_ledger_debit'=>$amount,
				'pettyCashId'=>$pettyCash
			);
			$bankLedger = DB::table('bank_ledger')->insert($bnk_array);
			 $main_array= array(
				'ledger_date'=>date('Y-m-d'),
				'ledger_desc'=>'Daily Cash Return',
				'ledger_reference'=>'Petty Cash',
				'ledger_debit'=>$amount,
				'FKPettyID'=>$pettyCash
			);
			$mainLedger =DB::table('ledger')->insert($main_array);
			 $petty_array= array(
				'date'=>date('Y-m-d'),
				'description'=>'Daily Cash Return',
				'ref'=>$office_name,
				'credit'=>$amount,
				'fk_petty_id'=>$pettyCash,
				'fk_office_id'=>$office_id
			);
			$pettyLedger = DB::table('pettycash_ledger')->insert($petty_array);

			return redirect()->back()->with('message',"Amount Returned and Bank Updated, New Record inserted in Petty Cash");
		}
	}
	

 public function save_mazda_expense(Request $request){
      //  dd($request->all());
        $mazdaname = $request->input('mazdaname');
            $pointofloading = $request->input('pointofloading');
            $mazdaamount = $request->input('mazdaamount');
            $mazdadate = $request->input('mazdadatefrom');
            
        
        if($request->labour_type == 'Mazda'){
          
            $insert = DB::table('daily_mazda_labour')->insert([
            'Mazda_name' => $mazdaname,
            'Piont_of_loading' => $pointofloading,
           'Mazda_Amount' => $mazdaamount,
           'Mazda_date' => $mazdadate]);
        }else if($request->labour_type == 'Container'){
        
             $insert = DB::table('daily_container')->insert([

            'Container_Number' => $mazdaname,
            'Container_pointsale' => $pointofloading,
           'Container_Amount' => $mazdaamount,
           'Container_date' => $mazdadate,

        ]);
        
        }
        

return redirect('add-labour-payment');

    }

     public function delete_mazda_expense($id){


        $insert = DB::table('daily_mazda_labour')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);

        return redirect('add-labour-payment');

    }

    public function edit_mazda_expense($id){

     $mazdadata=DB::table('daily_mazda_labour')
        ->where('is_delete',1)
         ->get();
         
     $container=DB::table('daily_container')
        ->where('is_delete',1)
        ->get();

    $query = DB::table('daily_mazda_labour')
        ->where('id',$id)
        ->first();
        
        return view ('DailyExpense.add-labour',compact('query','mazdadata','container'));
    
    }
    
 public function save_edit_mazda_expense(Request $request){

   //dd($request->all());
         $id       = $request->input('id');
          $mazdaname = $request->input('mazdaname');
        $pointofloading = $request->input('pointofloading');
         $mazdaamount = $request->input('mazdaamount');
           $mazdadate = $request->input('mazdadatefrom');
   

        $insert = DB::table('daily_mazda_labour')
        ->where('id',$id)
        ->update([

            'Mazda_name' => $mazdaname,
            'Piont_of_loading' => $pointofloading,
            'Mazda_Amount' => $mazdaamount,
                'Mazda_date' => $mazdadate,
          
        ]);


        return redirect('add-labour-payment');

    }

    public function add_container(){

        $container=DB::table('daily_container')
        ->where('is_delete',1)
        ->get();

        return view('DailyExpense.add-container',compact('container'));
    }

public function save_container_expense(Request $request){

        $containernumber = $request->input('containernumber');
        $containesale = $request->input('containesale');
         $containeramount = $request->input('containeramount');
          $containerdate = $request->input('containerdate');

         $insert = DB::table('daily_container')->insert([

            'Container_Number' => $containernumber,
            'Container_pointsale' => $containesale,
           'Container_Amount' => $containeramount,
           'Container_date' => $containerdate,

        ]);

return redirect('add-container');

    }

  public function delete_container($id){


        $insert = DB::table('daily_container')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);

        return redirect('add-container');

    }

    public function edit_container_expense($id){
$container=DB::table('daily_container')
->where('is_delete',1)
->paginate(30);;

  $query = DB::table('daily_container')
        ->where('id',$id)
        ->first();

return view('DailyExpense.add-container',compact('container','query'));
    }

public function save_edit_container_expense(Request $request){
    dd($request->all());

$id               = $request->input('id');
 $containernumber = $request->input('containernumber');
        $containesale = $request->input('containesale');
         $containeramount = $request->input('containeramount');
            $containerdate = $request->input('containerdate');

         $insert = DB::table('daily_container')
        ->where('id',$id)
        ->update([

            'Container_Number' => $containernumber,
            'Container_pointsale' => $containesale,
           'Container_Amount' => $containeramount,
            'Container_date' => $containerdate,
              ]);

        return redirect('add-container');

}
public function reports_data(){

    return view('DailyExpense.reports');
}

public function get_account_reports(Request $request){
// dd($request->all());

  $getmazda =DB::table('daily_mazda_labour')
        ->where('Mazda_date',$request->fromdate)
        ->where('is_delete',1)
        ->get();

//dd($getmazda);

   $getcontainer =DB::table('daily_container')
        ->where('Container_date',$request->fromdate)
        ->where('is_delete',1)
        ->get();
        
        
        $expenses =DB::table('nill_daily_expense')
        ->where('labour_date',$request->fromdate)
        ->get();
        

//dd($getcontainer);

        $pdf = PDF::loadView('DailyExpense.generateaccountreport',['expenses'=>$expenses,'getcontainer'=>$getcontainer],['getmazda'=>$getmazda]);
        $pdf->setPaper('A4', 'Landscape');
      return $pdf->stream('report.pdf');      

        return view('DailyExpense.reports',compact('getcontainer'));
    }

public function add_cash_statment(){
$head=DB::table('head_cash_statement')
->where('is_delete',1)
->get();
    return view('DailyExpense.add-headoffice',compact('head'));
}
public function save_head_statement(Request $request){


        $headdate = $request->input('headdate');
        $cashcategory = $request->input('cashcategory');
         $cashdescription = $request->input('cashdescription');
          $recieptamount = $request->input('recieptamount');
           $paymentamount = $request->input('paymentamount');
             $headreference = $request->input('headreference');

         $insert = DB::table('head_cash_statement')->insert([

            'Date' => $headdate,
            'Cash_Category' => $cashcategory,
           'Head_Desctiption' => $cashdescription,
           'Reciept_Amount' => $recieptamount,
           'Payment_Amount' => $paymentamount,
           'Reference' => $headreference,


        ]);

return redirect('add-cash-statment');

    }


 public function delete_head_statement($id){


        $insert = DB::table('head_cash_statement')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);

        return redirect('add-cash-statment');

    }

    public function edit_head_statement($id){


$head=DB::table('head_cash_statement')
->where('is_delete',1)
->get();
  $query = DB::table('head_cash_statement')
        ->where('id',$id)
        ->first();

return view('DailyExpense.add-headoffice',compact('query','head'));
    }

public function save_edit_cash_statment(Request $request){
    dd($request->all());

          $id               = $request->input('id');
          $headdate = $request->input('headdate');
          $cashcategory = $request->input('cashcategory');
          $cashdescription = $request->input('cashdescription');
          $recieptamount = $request->input('recieptamount');
           $paymentamount = $request->input('paymentamount');
            $headreference = $request->input('headreference');

         $insert = DB::table('head_cash_statement')
        ->where('id',$id)
        ->update([

          'Date' => $headdate,
            'Cash_Category' => $cashcategory,
           'Head_Desctiption' => $cashdescription,
           'Reciept_Amount' => $recieptamount,
           'Payment_Amount' => $paymentamount,
           'Reference' => $headreference,
              ]);

        return redirect('add-cash-statment');

}
public function add_campus(){

  $heading=DB::table('campus_cash_statement')
->where('is_delete',1)
->get();

  return view('DailyExpense.add-kharadar-office',compact('heading'));
}
public function save_add_campus(Request $request){


        $campusdate = $request->input('campusdate');
        $campuscategory = $request->input('campuscategory');
         $campusdescription = $request->input('campusdescription');
          $campusrecieptamount = $request->input('campusrecieptamount');
           $campuspaymentamount = $request->input('campuspaymentamount');
            $campusreference = $request->input('campusreference');

         $insert = DB::table('campus_cash_statement')->insert([

            'Campus_Date' => $campusdate,
            'Campus_Cash_Category' => $campuscategory,
           'Campus_Description' => $campusdescription,
           'Campus_Reciept_Amount' => $campusrecieptamount,
           'Campus_Payment_Amount' => $campuspaymentamount,
           'Campus_Reference' => $campusreference,


        ]);

return redirect('add-campus');

    }
     public function delete_campus($id){


        $insert = DB::table('campus_cash_statement')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);

        return redirect('add-campus');

    }

 public function edit_campus($id){


  $heading=DB::table('campus_cash_statement')
->where('is_delete',1)
->get();
  $query = DB::table('campus_cash_statement')
        ->where('id',$id)
        ->first();

return view('DailyExpense.add-kharadar-office',compact('query','heading'));
    }

public function save_edit_campus(Request $request){
    // dd($request->all());

          $id               = $request->input('id');
          $campusdate = $request->input('campusdate');
        $campuscategory = $request->input('campuscategory');
         $campusdescription = $request->input('campusdescription');
          $campusrecieptamount = $request->input('campusrecieptamount');
           $campuspaymentamount = $request->input('campuspaymentamount');
            $campusreference = $request->input('campusreference');

         $insert = DB::table('campus_cash_statement')
        ->where('id',$id)
        ->update([

          'Campus_Date' => $campusdate,
            'Campus_Cash_Category' => $campuscategory,
           'Campus_Description' => $campusdescription,
           'Campus_Reciept_Amount' => $campusrecieptamount,
           'Campus_Payment_Amount' => $campuspaymentamount,
           'Campus_Reference' => $campusreference,
              ]);

        return redirect('add-campus');

}
public function getOfficeBalance(Request $req){
	$id = $req->input('id');
        $from = "2016-01-01";
	$to = date("Y-m-d");
	$data['getbalance'] = DB::table('office')->where(['office_id'=>$id])->get();
        $petty_Record = DB::table('pettycash')->whereBetween('date',[$from,$to])->where(['fk_office_id'=>$id])->get();

        $pettymeta = DB::table('pettycash_meta')->get();
        $allAmountPayment1 = 0;
        $allAmountReciept1 = 0;



        foreach($petty_Record as $row)
        {
            $totalAmount = 0;
            $totalReciept = 0;
            $totalPayment = 0;
            foreach($pettymeta as $meta){
                if($meta->fk_pettycash_id == $row->id){
                    if($row->type=="Reciept"){
                        $totalReciept += $meta->amount;
                    }
                    else{
                        $totalPayment += $meta->amount;
                    }
                    $totalAmount += $meta->amount;
                }
            }
            $allAmountReciept1 += $totalReciept;
            $allAmountPayment1 += $totalPayment;
        }
        $balance=  $allAmountReciept1-$allAmountPayment1;
        return $balance;
}
	
public function cash_statement_report(){

  return view('DailyExpense.headoffice-reports');
}

public function campus_report(){

  return view('DailyExpense.campus-reports');
}

public function get_campus_report(Request $request){

$getdata=DB::table('campus_cash_statement')
->whereBetween('Campus_Date',[$request->campusfromdate,$request->campustodate])
->get();
//dd($getdata);

 $pdf = PDF::loadView('DailyExpense.generatecampus',['getdata'=>$getdata]);
        $pdf->setPaper('A4', 'Landscape');
      return $pdf->stream('report.pdf');

}
public function get_headoffice_report(Request $request){

$getheaddata=DB::table('head_cash_statement')
->whereBetween('Date',[$request->headfromdate,$request->headtodate])
->get();
//dd($getheaddata);
$head=DB::table('head_cash_statement')
->where('is_delete',1)
->get();

 $pdf = PDF::loadView('DailyExpense.generateheadoffice',['getheaddata'=>$getheaddata]);
        $pdf->setPaper('A4', 'Landscape');
      return $pdf->stream('report.pdf');

return view('DailyExpense.generateheadoffice',compact('head'));
}

    public function newOffice(Request $req){
       
		$date = $req->input('date');
		$officeName = $req->input('name');
		$address = $req->input('address');
		$contact = $req->input('contact');
		$cpname = $req->input('cpname');
		$cpcontact = $req->input('cpcontact');
		$cnic = $req->input('cnic');

		$data = array(
			'office_date'=>date('Y-m-d',strtotime($date)),
			'office_name'=>$officeName,
			'office_address'=>$address,
			'office_contact'=>$contact,
			'office_contact_person'=>$cpname,
			'office_contact_person_number'=>$cpcontact,
			'cnic'=>$cnic
		);
		$addingNewOffice = DB::table('office')->insert($data);
		return redirect()->back()->with('message',"Record added successfully");
	}
	
	public function office_report(Request $req){
		$office = $req->input('office_id');

		if($office == "all"){
		 $data['bank_records'] = DB::table('office')->get();
		 $data['current_date'] = date('Y-m-d');
        // 	$mpdf = new \mPDF('utf-8', 'A4-L');
      
		 $pdf = PDF::loadView('DailyExpense.officeReport',$data);
		 return $pdf->stream('document.pdf');
		}
	}
	
		public function editOffice($id){
		if($id > 0){
			$data['office'] = DB::table('office')->where('office_id',$id)->get();
			$data['offices'] = DB::table('office')->get();
			
		return view('DailyExpense.add_heads',$data);
		}else{
			return redirect('add-heads');
		}
	}
	
	
	public function updateOffice(Request $req){
		$id = $req->input('id');
		$date = $req->input('date');
		$officeName = $req->input('name');
		$address = $req->input('address');
		$contact = $req->input('contact');
		$cpname = $req->input('cpname');
		$cpcontact = $req->input('cpcontact');
		$cnic = $req->input('cnic');

		$data = array(
			'office_date'=>date('Y-m-d',strtotime($date)),
			'office_name'=>$officeName,
			'office_address'=>$address,
			'office_contact'=>$contact,
			'office_contact_person'=>$cpname,
			'office_contact_person_number'=>$cpcontact,
			'cnic'=>$cnic
		);
		$addingNewOffice = DB::table('office')->where('office_id',$id)->update($data);
		return redirect('add-heads')->with('message',"Record updated successfully");
	}
	
	public function removeOffice($id){
		DB::table('office')->where('office_id',$id)->delete();
		return redirect('add-heads')->with('error',"Record deleted successfully");
	}
	
	


}
