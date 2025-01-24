<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income and Expense Tracker</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-5">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-5">Income and Expense Tracker</h1>
        
        <!-- Grand Total -->
        <div class="bg-green-100 p-4 rounded mb-5">
            <h2 class="text-2xl">Grand Total: $<span id="grand-total">0.00</span></h2>
        </div>

        <!-- Income Section -->
        <div class="mb-10">
            <h3 class="text-xl font-bold mb-2">Income Sources</h3>
            <a href="{{ route('income-sources.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Income</a>
            <!-- Display income data here -->
        </div>

        <!-- Expense Section -->
        <div>
            <h3 class="text-xl font-bold mb-2">Expenses</h3>
            <a href="{{ route('expenses.create') }}" class="bg-red-500 text-white px-4 py-2 rounded">Add Expense</a>
            <!-- Display expense data here -->
        </div>
    </div>
</body>
</html>
