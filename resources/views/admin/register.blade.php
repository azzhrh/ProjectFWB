<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <!-- Menampilkan error -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Flash success -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('submitregister') }}">
        @csrf

        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Role:</label>
        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
            <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
        </select><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</body>
</html>
