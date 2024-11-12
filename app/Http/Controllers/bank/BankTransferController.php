<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Bank_account;
use App\Bank_transfer;
use App\Bank_ledger;

class BankTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank_account::all();
        $transfer = Bank_transfer::where('status', 1)->get();
        return view('mehmoodgoodemployee.banktransfer',compact('bank','transfer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank_account::all();
        $transfer = Bank_transfer::where('status', 1)->get();
        return view('mehmoodgoodemployee.banktransfer',compact('bank','transfer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'withdraw_bank'     =>  'required|numeric|different:deposit_bank',
            'deposit_bank'      =>  'required|numeric|different:withdraw_bank',
            'amount'            =>  'required|integer',
            'description'       =>  'required|string',
            'date'              =>  'required|string',

        ]);

        $w_bank_account = Bank_account::where('id',$request->withdraw_bank)->first();
        $d_bank_account = Bank_account::where('id',$request->deposit_bank)->first();

        if($w_bank_account->amount > $request->amount)
        {
            $bank_charge = Bank_transfer::create([
                'withdraw_bank_id'      =>  $request->withdraw_bank,
                'deposit_bank_id'       =>  $request->deposit_bank,
                'transaction_type_id'   =>  3,
                'amount'                =>  $request->amount,
                'description'           =>  $request->description,
                'date'                  =>  $request->date,
                'status'                =>  1,
            ]);

            if($bank_charge->id)
            {
                $updated_w_amount = ($w_bank_account->amount)-($request->amount);
                $updated_d_amount = ($d_bank_account->amount)+($request->amount);
                
                Bank_account::where('id',$request->withdraw_bank)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

                Bank_account::where('id',$request->deposit_bank)->update([
                    'amount'   =>  $updated_d_amount,
                ]);

                Bank_ledger::create([
                    'bank_account_id'   =>  $request->withdraw_bank,
                    'bank_transfer_id'  =>  $bank_charge->id,
                    'description'       =>  'bank transfer',
                    'debit'             =>  null,
                    'status'            =>  1,
                    'credit'            =>  $request->amount,
                    'balance'           =>  $updated_w_amount
                ]);

                Bank_ledger::create([
                    'bank_account_id'   =>  $request->deposit_bank,
                    'bank_transfer_id'  =>  $bank_charge->id,
                    'description'       =>  'bank transfer',
                    'debit'             =>  $request->amount,
                    'credit'            =>  null,
                    'status'            =>  1,
                    'balance'           =>  $updated_d_amount
                ]);

                return redirect()->back()->with('success','Bank Transfer successfully');

            }
        }
        else
        {
            return redirect()->back()->withInput($request->input())->with('error','Bank transfer not added successfull, Withdrawl bank is greater than balance');
        }

        return redirect()->back()->with('error','Bank transfer not successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank_transfer_details = Bank_transfer::find($id);
        $w_bank_name = Bank::select('name')->where('id', $bank_transfer_details->withdraw_bank_id)->first()->name;
        $d_bank_name = Bank::select('name')->where('id', $bank_transfer_details->deposit_bank_id)->first()->name;
        return view('mehmoodgoodemployee.viewtransfer', compact('bank_transfer_details', 'w_bank_name', 'd_bank_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_transfer = Bank_transfer::find($id);
        $bank = Bank_account::all();
        $transfer = Bank_transfer::where('status', 1)->get();
        return view('mehmoodgoodemployee.banktransfer', compact('bank','transfer','bank_transfer'));
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
        request()->validate([
            'withdraw_bank'     =>  'required|numeric|different:deposit_bank',
            'deposit_bank'      =>  'required|numeric|different:withdraw_bank',
            'amount'            =>  'required|integer',
            'description'       =>  'required|string',
            'date'              =>  'required|string',
        ]);

        $w_bank_account = Bank_account::where('id',$request->withdraw_bank)->first();
        $d_bank_account = Bank_account::where('id',$request->deposit_bank)->first();

        $bank_charge = Bank_transfer::find($id);

        if($request->amount > $bank_charge->amount) {
$e = ($request->amount) - ($bank_charge->amount);
           $updated_w_amount = ($w_bank_account->amount)-($e);
           $updated_d_amount = ($d_bank_account->amount)+($e);
                
                Bank_account::where('id',$request->withdraw_bank)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

                Bank_account::where('id',$request->deposit_bank)->update([
                    'amount'   =>  $updated_d_amount,
                ]);
        } else {
          $updated_w_amount = ($w_bank_account->amount)+($request->amount);
           $updated_d_amount = ($d_bank_account->amount)-($request->amount);
                
                Bank_account::where('id',$request->withdraw_bank)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

                Bank_account::where('id',$request->deposit_bank)->update([
                    'amount'   =>  $updated_d_amount,
                ]);
        }

        if($w_bank_account->amount > $request->amount)
        {
            
            $bank_charge->withdraw_bank_id = $request->withdraw_bank;
            $bank_charge->deposit_bank_id = $request->deposit_bank;
            $bank_charge->transaction_type_id = 3;
            $bank_charge->amount = $request->amount;
            $bank_charge->description = $request->description;
            $bank_charge->date = $request->date;
            $bank_charge->save();

            if($bank_charge->id)
            {
                

                $w_bank_ledger = Bank_ledger::where('bank_transfer_id', $id)->where('debit', '=', null)->first(); 
                $w_bank_ledger->bank_account_id = $request->withdraw_bank;
                $w_bank_ledger->description = 'bank transfer';
                $w_bank_ledger->debit = null;
                $w_bank_ledger->credit = $request->amount;
                $w_bank_ledger->balance = $updated_w_amount;
                $w_bank_ledger->save();

                $d_bank_ledger = Bank_ledger::where('bank_transfer_id', $id)->where('credit', '=', null)->first();
                $d_bank_ledger->bank_account_id = $request->deposit_bank;
                $d_bank_ledger->description = 'bank transfer';
                $d_bank_ledger->debit = $request->amount;
                $d_bank_ledger->credit = null;
                $d_bank_ledger->balance = $updated_d_amount;
                $d_bank_ledger->save();

                return redirect()->back()->with('success','Bank Transfer Updated successfully');

            }
        }
        else
        {
            return redirect()->back()->withInput($request->input())->with('error','Bank transfer not added successfull, Withdrawl bank is greater than balance');
        }

        return redirect()->back()->with('error','Bank transfer not successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_transfer = Bank_transfer::where('id', $id)->first();
        $bank_transfer->status = 0;
        $bank_transfer->save();

        $bank_transfer_ledger = Bank_ledger::where('bank_transfer_id', $id)->get();
        foreach($bank_transfer_ledger as $value) {
           $value->status = 0;
           $value->save();
        }

        return redirect()->back()->with('success','Bank Transfer Deleted successfully');
    }
}
