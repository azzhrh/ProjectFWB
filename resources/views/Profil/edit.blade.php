<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Profil - Stylish</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            color: #333;
        }
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            max-width: 450px;
            width: 100%;
            padding: 2.5rem 2rem;
        }
        h1 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #444;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
            color: #555;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-top: 0.4rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 8px rgba(102,126,234,0.5);
        }
        .error-message {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px 15px;
            margin-bottom: 1.5rem;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
        }
        button {
            margin-top: 2rem;
            width: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            padding: 0.85rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        button:hover {
            background: linear-gradient(90deg, #5a6ede, #683db5);
            box-shadow: 0 12px 30px rgba(104,61,181,0.6);
        }
        .back-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            color: #764ba2;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: #4451b8;
        }
        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Edit Profil</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" novalidate>
            @csrf
            @method('PATCH')

            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required />
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required />
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Simpan Perubahan</button>
        </form>

        <a href="{{ route('profile.show') }}" class="back-link">&larr; Kembali ke Profil</a>
    </div>
</body>
</html>
