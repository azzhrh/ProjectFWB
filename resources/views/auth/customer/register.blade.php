<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">
        <div class="text-center mb-6">
            <a href="/">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-20 h-20 mx-auto">
            </a>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/customer/register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password_confirmation" required>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('/customer/login') }}">
                    Already registered?
                </a>
                <button type="submit" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Register
                </button>
            </div>
        </form>
    </div>

</body>
</html>
