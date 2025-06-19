<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Profile</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 2rem auto; padding: 1rem; background: #f9f9f9; }
        h1 { text-align: center; color: #333; }
        form { background: white; padding: 2rem; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 0.5rem; margin-top: 0.3rem; border: 1px solid #ccc; border-radius: 3px;
            box-sizing: border-box;
        }
        button {
            margin-top: 1.5rem; padding: 0.7rem 1.2rem; background-color: #007bff; color: white;
            border: none; border-radius: 4px; cursor: pointer; font-size: 1rem;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-message {
            background-color: #d4edda; color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px 15px;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Edit Profile</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required />
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required />
        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
