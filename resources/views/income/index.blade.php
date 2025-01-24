<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income and Expense Tracker</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-500">
    <div class="container mx-auto mt-10 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Income and Expense Tracker</h1>

        <!-- Display Total Income, Total Expenses, and Worth -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-xl font-bold">Total Income:</h2>
                    <p class="text-2xl font-semibold text-green-600">${{ number_format($totalIncome, 2) }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Total Expenses:</h2>
                    <p class="text-2xl font-semibold text-red-600">${{ number_format($totalExpenses, 2) }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Pocket:</h2>
                    <p class="text-2xl font-semibold text-blue-600">${{ number_format($totalIncome - $totalExpenses, 2) }}</p>
                </div>
            </div>
        </div>

<!-- Income Entries Section -->
<div class="bg-gray-800 text-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Income Entries</h2>
    @if ($incomes->isEmpty())
        <p class="text-gray-400">No income entries yet. <a href="{{ route('income.create') }}" class="text-blue-300">Add one</a>.</p>
    @else
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-600 text-gray-200 uppercase text-sm">
                <th class="px-4 py-2 text-left">Source</th>
                <th class="px-4 py-2 text-right">Amount</th>
                <th class="px-4 py-2 text-left">Created</th>
                <th class="px-4 py-2 text-center">Delete?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-2 text-center">{{ $income->source }}</td>
                    <td class="px-4 py-2 text-center">${{ number_format($income->amount, 2) }}</td>
                    <td class="px-4 py-2 text-center">{{ $income->created_at ? $income->created_at->format('m-d-Y g:i A') : '-' }}</td>
                   
                    <td class="px-4 py-2 text-center">
                        <form action="{{ route('income.destroy', $income->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this income entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-red-600 rounded hover:bg-red-600 hover:text-white">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>
        
<!-- Expense Entries Section -->
<div class="p-6 rounded shadow mt-6" style="background-color: #FEFCE8;">

    <h2 class="text-xl font-bold mb-4">Expense Entries</h2>
    @if ($expenses->isEmpty())
        <p class="text-gray-600">No expense entries yet. <a href="{{ route('expense.create') }}" class="text-blue-500">Add one</a>.</p>
    @else
    <table class="table-auto w-full bg-yellow-100">
        <thead>
            <tr class="bg-yellow-300 text-yellow-800 uppercase text-sm">
                <th class="px-4 py-2 text-left">Source</th>
                <th class="px-4 py-2 text-right">Amount</th>
                <th class="px-4 py-2 text-left">Created</th>
                <th class="px-4 py-2 text-center">Delete?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr class="border-t border-yellow-400 bg-yellow-50">
                    <td class="px-4 py-2 text-center">{{ $expense->source }}</td>
                    <td class="px-4 py-2 text-center">${{ number_format($expense->amount, 2) }}</td>
                    <td class="px-4 py-2 text-center">{{ $expense->created_at ? $expense->created_at->format('m-d-Y g:i A') : '-' }}</td>

                    <td class="px-4 py-2 text-center">
                        <form action="{{ route('expense.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-red-600 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>

        

        <!-- Buttons -->
        <div class="mt-6 text-center bg-gray-800 p-6 rounded shadow">
            <hr>
            <br>
            <a href="{{ route('income.create') }}" class="px-4 py-2 border text-white rounded shadow hover:bg-blue-600">Add Income</a>
            <a href="{{ route('expense.create') }}" class="px-4 py-2 border text-white rounded shadow hover:bg-red-600">Add Expense</a>
        </div>
        <br>
    </div>
</body>
</html>
