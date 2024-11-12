<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction_type;
use App\Bank_account;
use App\Bank_fund;
use App\Bank_ledger;

class BankFundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank_account::all();
        $transactionType = Transaction_type::all()->take(2);

        $funds = Bank_fund::all();
        return view('mehmoodgoodemployee.depositwithdrawl',compact('bank','transactionType','funds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $bank = Bank_account::all();
        $transactionType = Transaction_type::all()->take(2);      
$funds = Bank_fund::all();
        return view('mehmoodgoodemployee.depositwithdrawl',compact('bank','transactionType','funds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'type'          =>  'required|numeric',
            'bank'          =>  'required|numeric',
            'date'          =>  'required|date',
            'amount'        =>  'required|integer',
            'cheque_number' =>  'required|integer|unique:bank_funds,cheque_no',
            'description'   =>  'required|string',

        ]);

        $bank_account = Bank_account::where('id',$request->bank)->first();

        if($request->type == 1)
        {
            if ($bank_account->amount >= $request->amount) {
                $bank_funds = Bank_fund::create([
                    'bank_account_id'       =>  $request->bank,
                    'transaction_type_id'   =>  $request->type,
                    'amount'                =>  $request->amount,
                    'date'                  =>  $request->date,
                    'cheque_no'             =>  $request->cheque_number,
                    'description'           =>  $request->description
                ]);

                if($bank_funds->id)
                {
                    $updated_amount = ($bank_account->amount)-($request->amount);
                    
                    $branch = Bank_account::where('id',$request->bank)->update([
                        'amount'   =>  $updated_amount,
                    ]);

                    Bank_ledger::create([
                        'bank_account_id'   =>  $request->bank,
                        'description'       =>  'cash withdrawl',
                        'debit'             =>  null,
                        'credit'            =>  $request->amount,
                        'balance'           =>  $updated_amount
                    ]);

                    return redirect()->back()->with('success','Withdrawl successfully');

                }
            }
            else
            {
                return redirect()->back()->withInput($request->input())->with('error','Withdrawl not successfull, Withdrawl request is greater than balance');
            }
            
        } elseif ($request->type == 2) {

            $bank_funds = Bank_fund::create([
                'bank_account_id'       =>  $request->bank,
                'transaction_type_id'   =>  $request->type,
                'amount'                =>  $request->amount,
                'date'                  =>  $request->date,
                'cheque_no'             =>  $request->cheque_number,
                'description'           =>  $request->description
            ]);

            if($bank_funds->id)
            {
                $updated_amount = ($bank_account->amount)+($request->amount);
                $branch = Bank_account::where('id',$request->bank)->update([
                    'amount'   =>  $updated_amount,
                ]);

                Bank_ledger::create([
                    'bank_account_id'   =>  $request->bank,
                    'description'       =>  'cash deposit',
                    'debit'             =>  $request->amount,
                    'credit'            =>  null,
                    'balance'           =>  $updated_amount

                ]);

                return redirect()->back()->with('success','Deposit successfull');

            }
        }
       
        return redirect()->back()->with('error','Transaction not successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
