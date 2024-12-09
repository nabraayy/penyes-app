<head>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Register</h2>
            <p>Create a new account</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    class="input-field"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
                <x-input-error :messages="$errors->get('name')" class="error-message" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="input-field"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <x-text-input
                    id="date_of_birth"
                    class="input-field"
                    type="date"
                    name="date_of_birth"
                    :value="old('date_of_birth')"
                    required
                    autocomplete="bday"
                />
                <x-input-error :messages="$errors->get('date_of_birth')" class="error-message" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input
                    id="password"
                    class="input-field"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input
                    id="password_confirmation"
                    class="input-field"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
            </div>

            <!-- Submit Button -->
            <div class="form-buttons">
                <x-primary-button class="submit-button">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <div class="form-footer">
            <p>Already have an account? <a href="/login">Login here</a></p>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');

        body {
            font-family: 'Caveat', cursive;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }

        .form-header p {
            font-size: 16px;
            color: #777;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-top: 8px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .error-message {
            font-size: 12px;
            color: #e74c3c;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            margin-top: 15px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

    </style>
</body>
