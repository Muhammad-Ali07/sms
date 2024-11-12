<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Bank_branch;
use App\Bank_account;
use App\Bank_ledger;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank_account::all();
        return view('mehmoodgoodemployee.add_bank',compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank_account::all();
        return view('mehmoodgoodemployee.add_bank',compact('bank'));
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
            'bank_name'     =>  'required|string|unique:banks,name',
            'branch_name'   =>  'required|string',
            'bank_address'  =>  'required|string',
            'amount'        =>  'required|integer'
        ]);

        $bank = Bank::create([
            'name'      =>  $request->bank_name
        ]);

        if($bank->id)
        {
            $branch = Bank_branch::create([
                'bank_id'   =>  $bank->id,
                'name'      =>  $request->branch_name,
                'address'   =>  $request->bank_address
            ]);

            $account = Bank_account::create([
                'branch_id' =>  $branch->id,
                'amount'    =>  $request->amount
            ]);

            Bank_ledger::create([
                'bank_account_id'   =>  $account->id,
                'description'       =>  'opening amount',
                'debit'             =>  $request->amount,
                'credit'            =>  null,
                'balance'           =>  $request->amount

            ]);

            return redirect()->back()->with('success','Bank added successfully');

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
        $bank = Bank_account::where('id',\Crypt::decrypt($id))->first();
        return view('mehmoodgoodemployee.edit_bank',compact('bank'));
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
            'bank_name'     =>  'required|string',
            'branch_name'   =>  'required|string',
            'bank_address'  =>  'required|string'
        ]);

        $bankName = Bank::where('id',$id)->first();

        if (!$bankName->name == $request->bank_name) {
            
            request()->validate([
                'bank_name'     =>  'unique:banks,name'
             ]);
        }

        $bank = Bank::where('id',$id)->update([
            'name'      =>  $request->bank_name
        ]);
        
        $branch = Bank_branch::where('bank_id',$id)->update([
            'name'      =>  $request->branch_name,
            'address'   =>  $request->bank_address
        ]);

        if ($bank && $branch) {

            return redirect('bank')->with('success','Bank updated successfully');
        }      

        return redirect('bank')->with('error','Bank not updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bank = Bank::where('id',\Crypt::decrypt($id))->delete();
         if($bank){
            $branch = Bank_branch::where('bank_id',\Crypt::decrypt($id))->delete();
                if($branch){
                   return redirect('bank')->with('success','Bank deleted successfully');
                }else{
                   return redirect('bank')->with('success','Bank not deleted successfully');
                  }
            }else{
                   return redirect('bank')->with('success','Bank not deleted successfully');
              }
          
    }
}
