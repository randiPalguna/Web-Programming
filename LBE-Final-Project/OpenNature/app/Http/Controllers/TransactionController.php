<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class TransactionController extends Controller
{
    public function view()
    {
        $transactionPlant = Transaction::with('Plant')->get(); 
        return view('/transaksi/transaksi', compact('transactionPlant'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction-id' => 'required|unique:transactions,transaction-id',
            'user-id-fk' => 'required|exists:users,user-id',
            'plant-id-fk' => 'required|exists:plants,plant-id',
            'transaction-date' => 'required|date'
        ]);

        // Use the Eloquent model's create() method to store data
        Transaction::create($validated);

        // Redirect or return a response after storing the transaction
        return redirect('/transaction')->with('success', 'Transaction successful!');    
    }
}
