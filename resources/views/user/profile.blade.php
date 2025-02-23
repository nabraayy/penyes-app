<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - PenyApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }
        .profile-container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgb(127, 0, 0);
        }
        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }
        .profile-info {
            margin-top: 15px;
            font-size: 18px;
        }
        .edit-btn {
            background-color: rgb(5, 90, 0);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-btn:hover {
            background-color: rgb(0, 114, 0);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="{{ Auth::user()->profile_image ?? 'https://via.placeholder.com/150' }}" alt="Foto de perfil" class="profile-img">
        <h2 class="profile-name">{{ Auth::user()->name }}</h2>
        <p class="profile-info">Correo: {{ Auth::user()->email }}</p>
        <p class="profile-info">Miembro desde: {{ Auth::user()->created_at->format('d M, Y') }}</p>
        <a href="{{ route('user.profile') }}">
            <button class="edit-btn">Editar Perfil</button>
        </a>
    </div>
</body>
</html>
