<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
public function depositIndex()
{
    // Retrieve all deposit transactions for the authenticated user
    $transactions = Transaction::where('user_id', Auth::id())->where('type', 'deposit')->get();
    return view('deposit.index', ['transactions' => $transactions]);
}

public function deposit(Request $request)
{
    // Implement the deposit logic here
    // Create a new transaction record for the deposit

    return redirect('/deposit')->with('success', 'Deposit completed successfully');
}

public function withdrawalIndex()
{
    // Retrieve all withdrawal transactions for the authenticated user
    $transactions = Transaction::where('user_id', Auth::id())->where('type', 'withdrawal')->get();
    return view('withdrawal.index', ['transactions' => $transactions]);
}

public function withdrawal(Request $request)
{
    $user = Auth::user();
    $withdrawalAmount = $request->amount;
    $accountType = $user->account_type;

    // Update the total withdrawal amount
    if ($accountType === 'Business') {
        $newTotalWithdrawal = $user->total_withdrawal + $withdrawalAmount;
        $user->update(['total_withdrawal' => $newTotalWithdrawal]);
    }

    // Rest of the withdrawal logic remains the same

    return redirect('/withdrawal')->with('success', 'Withdrawal completed successfully');
}
}
