<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years  = Transaction::distinct()->get([DB::raw('YEAR(date) as year')]);
        $months = Transaction::distinct()->get([DB::raw('MONTH(date) as month')]);
        $months = Month::list_2_string($months);

        return view('transactions/index', compact('years', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'      => 'required|in:'.Transaction::INCOME.','. Transaction::EXPENSE,
            'amount'    => 'required|numeric|min:1'
        ]);
        $request->merge(['date' => date('Y-m-d h:i:s')]);

        Transaction::create($request->all());
        
        return redirect()->route('home')->with('success', 'Se ha registrado la transacción exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types          = array(Transaction::INCOME, Transaction::EXPENSE);
        $transaction    = Transaction::find($id);

        return view('transactions/edit', compact('transaction', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type'      => 'required|in:'.Transaction::INCOME.','. Transaction::EXPENSE,
            'date'      => 'required',
            'amount'    => 'required|numeric|min:1'
        ]);

        $transaction->update($request->all());
        $transaction->save();

        return redirect()->route('home')->with('success', 'Se ha actualizado la transacción exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Se ha eliminado la transacción exitosamente');
    }

    /**
     * Get tramsactions of an period
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_transactions(Request $request)
    {
        $request->validate([
            'year'  => 'required',
            'month' => 'required|in:'.implode(',', Month::MONTHS),
        ]);

        $month  = Month::string_2_number($request->month);

        $transactions   = Transaction::whereYear('date', $request->year)
                                    ->whereMonth('date', $month)->get();
                                     
        return back()->with('transactions', $transactions);
    }
}
