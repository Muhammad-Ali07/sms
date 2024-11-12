<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank_account;
use App\Bank;
use App\Bank_service_charge;
use App\Bank_ledger;


class BankServiceChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank_account::all();
        $charge = Bank_service_charge::where('status', 1)->get();
        return view('mehmoodgoodemployee.bankservices',compact('bank','charge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charge = Bank_service_charge::where('status', 1)->get();
        $bank = Bank_account::all();
        return view('mehmoodgoodemployee.bankservices',compact('bank','charge'));
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
            'bank_id'       =>  'required|numeric',
            'date'          =>  'required|date',
            'amount'        =>  'required|integer',
            'description'   =>  'required|string',

        ]);

        $bank_account = Bank_account::where('id',$request->bank_id)->first();

        if($bank_account->amount > $request->amount)
        {
            $bank_charge = Bank_service_charge::create([
                'bank_account_id'       =>  $request->bank_id,
                'amount'                =>  $request->amount,
                'date'                  =>  $request->date,
                'description'           =>  $request->description,
                'status'           =>  1
            ]);

            if($bank_charge->id)
            {
                $updated_amount = ($bank_account->amount)-($request->amount);
                $branch = Bank_account::where('id',$request->bank_id)->update([
                    'amount'   =>  $updated_amount,
                ]);

                Bank_ledger::create([
                    'bank_account_id'   =>  $request->bank_id,
                    'bank_service_charges_id' => $bank_charge->id,
                    'description'       =>  'service charges',
                    'debit'             =>  null,
                    'credit'            =>  $request->amount,
                    'balance'           =>  $updated_amount,
                    'status'            => 1,

                ]);

                return redirect()->back()->with('success','Bank added successfully');

            }
        }
        else
        {
            return redirect()->back()->with('error','Bank not added successfully, Service charge is greater than amount');
        }

        return redirect()->back()->with('error','Bank not added successfully');

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
        $amount = Bank_service_charge::find($id);
        $branch_id = Bank_account::find($amount->bank_account_id);
        $bank_name = Bank::find($branch_id->branch_id);
        $charge = Bank_service_charge::all();
        $bank = Bank_account::all();
        return view('mehmoodgoodemployee.bankservices',compact('bank_name','amount', 'bank', 'charge'));

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
            'bank_id'       =>  'required|numeric',
            'date'          =>  'required|date',
            'amount'        =>  'required|integer',
            'description'   =>  'required|string',

        ]);

        $bank_account = Bank_account::where('id',$request->bank_id)->first();

        if($bank_account->amount > $request->amount)
        {
            $bank_charge = Bank_service_charge::find($id);
            $bank_charge->bank_account_id = $request->bank_id;
            $bank_charge->amount = $request->amount;
            $bank_charge->date = $request->date;
            $bank_charge->description = $request->description;
            $bank_charge->save();

            if($bank_charge->id)
            {
                $updated_amount = ($bank_account->amount)-($request->amount);
                $branch = Bank_account::where('id',$request->bank_id)->update([
                    'amount'   =>  $updated_amount,
                ]);

                $bank_ledger = Bank_ledger::where('bank_service_charges_id', $id)->first();
                $bank_ledger->bank_account_id = $request->bank_id;
                $bank_ledger->description = $request->description;
                $bank_ledger->debit = null;
                $bank_ledger->credit = $request->amount;
                $bank_ledger->balance = $updated_amount;
                $bank_ledger->save();

                return redirect()->back()->with('success','Bank Updated successfully');

            }
        }
        else
        {
            return redirect()->back()->with('error','Bank not added successfully, Service charge is greater than amount');
        }

        return redirect()->back()->with('error','Bank not added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_service = Bank_service_charge::where('id', $id)->first();
        $bank_service->status = 0;
        $bank_service->save();

        $bank_ledger = Bank_ledger::where('bank_service_charges_id', $id)->first();
        $bank_ledger->status = 0;
        $bank_ledger->save();

        return redirect()->back()->with('success','Bank Service Charges Deleted successfully');
    }
}
