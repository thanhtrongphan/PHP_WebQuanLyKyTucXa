<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ClassTrait;
use function Laravel\Prompts\select;

class PaymentController extends Controller
{
    use ClassTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('payment_list')
            ->join('account_list', 'payment_list.account_id', '=', 'account_list.id')
            ->where('payment_list.is_payment', 0)
            ->select('payment_list.id', 'account_list.username', 'payment_list.month_of', 'payment_list.amount')
            ->get();
        return view('admin.payment.read_payment', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('account_list')->get();
        return view('admin.payment.create_payment', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('payments.create');
        }
        $code = $request->input('code');
        $month = $request->input('month');
        $amount = $request->input('amount');
        // check amount > 0
        if($amount <= 0){
            Session::flash('error', 'Amount must be greater than 0');
            return redirect()->route('payments.create');
        }
        $account_id = DB::table('account_list')->where('username', $code)->first()->id;
        DB::table('payment_list')->insert([
            'account_id' => $account_id,
            'month_of' => $month,
            'amount' => $amount,
            'is_payment' => 0
        ]);
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = DB::table('payment_list')
            ->join('account_list', 'payment_list.account_id', '=', 'account_list.id')
            ->where('payment_list.id', $id)
            ->select('payment_list.id', 'account_list.username', 'payment_list.month_of', 'payment_list.amount')
            ->first();
        $account = DB::table('account_list')->get();
        $data = [
            'payment_list' => $payment,
            'account_list' => $account
        ];
        return view('admin.payment.edit_payment', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('payments.show', ['payment' => $id]);
        }
        $code = $request->input('username');
        $month = $request->input('month');
        $amount = $request->input('amount');
        // check amount > 0
        if($amount <= 0){
            Session::flash('error', 'Amount must be greater than 0');
            return redirect()->route('payments.show', ['payment' => $id]);
        }
        $account_id = DB::table('account_list')->where('username', $code)->first()->id;
        DB::table('payment_list')->where('id', $id)->update([
            'account_id' => $account_id,
            'month_of' => $month,
            'amount' => $amount
        ]);
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('payment_list')->where('id', $id)->delete();
        return redirect()->route('payments.index');
    }
}
