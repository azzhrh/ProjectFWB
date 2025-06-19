<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profil Saya - Stylish</title>
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
            max-width: 400px;
            width: 100%;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #764ba2;
            color: white;
            font-size: 3rem;
            line-height: 100px;
            margin: 0 auto 1.5rem;
            font-weight: 600;
            user-select: none;
            box-shadow: 0 5px 15px rgba(118,75,162,0.6);
        }
        h1 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #444;
        }
        p.email {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
            letter-spacing: 0.05em;
        }
        .btn-edit {
            display: inline-block;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-edit:hover {
            background: linear-gradient(90deg, #5a6ede, #683db5);
            box-shadow: 0 12px 30px rgba(104,61,181,0.6);
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
        <div class="avatar">{{ strtoupper(substr($user->name,0,1)) }}</div>
        <h1>{{ $user->name }}</h1>
        <p class="email">{{ $user->email }}</p>
        <a href="{{ route('profile.edit') }}" class="btn-edit">Edit Profil</a>
    </div>
</body>
</html>
