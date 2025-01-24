<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        return view('expense.create'); // Loads the form for adding new expenses.
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Expense::create($request->only('source', 'amount')); // Save the expense record in the database.

        return redirect('/')->with('success', 'Expense added successfully!');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id); // Find the expense entry by ID
        $expense->delete(); // Delete the expense entry

        return redirect('/')->with('success', 'Expense entry deleted successfully!');
    }

}
