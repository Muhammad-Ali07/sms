<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petty_cash;
use App\Bank_account;
use App\Bank_transfer;
use App\Bank_ledger;

class BankToPettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank_account::all();
        $transfer = Bank_transfer::all();
        return view('mehmoodgoodemployee.pettytransfer',compact('bank','transfer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $bank = Bank_account::all();
        $transfer = Bank_transfer::all();
        return view('mehmoodgoodemployee.pettytransfer',compact('bank','transfer'));
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
            'withdraw_bank'     =>  'required|numeric',
            'amount'            =>  'required|integer',
            'description'       =>  'required|string',
            'date'              =>  'required|string',
        ]);

        $w_bank_account = Bank_account::where('id',$request->withdraw_bank)->first();
        $d_bank_account = Petty_cash::first();
        
        if($w_bank_account->amount >= $request->amount)
        {
            $bank_transfer = Bank_transfer::create([
                'withdraw_bank_id'      =>  $request->withdraw_bank,
                'deposit_bank_id'       =>  null,
                'transaction_type_id'   =>  4,
                'amount'                =>  $request->amount,
                'description'           =>  $request->description
            ]);

            if($bank_transfer->id)
            {
                $updated_w_amount = ($w_bank_account->amount)-($request->amount);
                $updated_d_amount = ($d_bank_account->amount)+($request->amount);
                
                Bank_account::where('id',$request->withdraw_bank)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

                Petty_cash::where('id',1)->update([
                    'amount'   =>  $updated_d_amount,
                ]);

                Bank_ledger::create([
                    'bank_account_id'   =>  $request->withdraw_bank,
                    'description'       =>  'bank to petty cash',
                    'debit'             =>  null,
                    'credit'            =>  $request->amount,
                    'balance'           =>  $updated_w_amount
                ]);

                return redirect()->back()->with('success','Bank To Petty Cash Transfer successfully');

            }
        }
        else
        {
            return redirect()->back()->withInput($request->input())->with('error','Bank To Petty Cash transfer not successfull, Withdrawl amount is greater than balance');
        }

        return redirect()->back()->with('error','Bank To Petty Cash transfer not successfulls');
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
