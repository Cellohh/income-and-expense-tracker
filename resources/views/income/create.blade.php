<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 max-w-md">
        <h1 class="text-2xl font-bold mb-4">Add Income</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('income.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="source" class="block text-sm font-medium text-gray-700">Income Source</label>
                <input type="text" id="source" name="source" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" step="0.01" id="amount" name="amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <div class="text-right">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded shadow hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
