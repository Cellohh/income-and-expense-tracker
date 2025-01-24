<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::all(); // Fetch all income entries
        $expenses = Expense::all(); // Fetch all expense entries
        $totalIncome = $incomes->sum('amount'); // Calculate total income
        $totalExpenses = $expenses->sum('amount'); // Calculate total expenses

        return view('income.index', compact('incomes', 'expenses', 'totalIncome', 'totalExpenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.create'); // This loads the form for adding new income.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Income::create($request->all()); // Save the income record in the database.

        return redirect('/')->with('success', 'Income added successfully!');
    }

    public function destroy($id)
    {

        $income = Income::findOrFail($id); // Find the income entry by ID
        $income->delete(); // Delete the income entry

        return redirect('/')->with('success', 'Income entry deleted successfully!');
    }

}
