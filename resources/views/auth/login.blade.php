<head>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <!-- Logo centrado -->
        <div class="logo-container">
            <img src="log.jpg" alt="Logo" class="logo">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="checkbox">
                    <span class="text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('register') }}" class="forgot-password">
                        {{ __('You do not have an account?') }}
                    </a>
                @endif

                <x-primary-button class="login-button">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <style>
        /* Cargando la fuente 'Caveat' */
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');

        /* Estilos generales */
        body {
            font-family: 'Caveat', cursive;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor principal del login */
        .login-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Logo centrado */
        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            margin: 0 auto;
        }

        /* Estilos del formulario */
        .login-form {
            width: 100%;
        }

        /* Estilo para los inputs */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 16px;
            color: #666;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        .input-field:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Estilos del checkbox */
        .checkbox {
            margin-right: 8px;
        }

        /* Estilo del botón */
        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        /* Estilo de opciones adicionales */
        .forgot-password {
            display: block;
            font-size: 14px;
            color: #007BFF;
            margin-top: 10px;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Estilo del texto "Remember me" */
        .remember-me {
            text-align: left;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        /* Estilo de la parte inferior del formulario */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</body>
