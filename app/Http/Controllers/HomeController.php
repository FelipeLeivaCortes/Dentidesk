<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * This function will redirect to Home view.
     */
    public function index()
    {
        $types      = array(Transaction::INCOME, Transaction::EXPENSE);
        $incomes    = Transaction::all()->where('type', Transaction::INCOME)->sum('amount');
        $expenses   = Transaction::all()->where('type', Transaction::EXPENSE)->sum('amount');

        return view('index', compact('types', 'incomes', 'expenses'));
    }
}
