<head>
    <link href="https://fonts.google.com/share?selection.family=Caveat:wght@400..700" rel="stylesheet">
    <title>Register</title>

</head>
    <div class="form-container">
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
                    {{ __('OK') }}
                </x-primary-button>
            </div>
        </form>
    </div>

<style>
   @import url('https://fonts.google.com/share?selection.family=Caveat:wght@400..700');
   @font-face {
        font-family:Caveat;
        src: url('public/canveat/Tareas/penyes-app/public/build/canveat/Caveat-VariableFont_wght.ttf') format('Caveat');
    }
   body {

    font-family:'Caveat', sans-serif;
    background-image:url('https://st2.depositphotos.com/3233277/10047/v/450/depositphotos_100476030-stock-illustration-hand-drawing-of-a-raging.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    background-size: cover;
    margin: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;

}

.form-container {
    background: #ffffff;
    width: 320px;
    padding: 20px;
    border-radius: 8px;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Bear Images */
.bear-top-right {
    position: absolute;
    top: -40px;
    right: -40px;
    width: 80px;
}

.bear-bottom-left {
    position: absolute;
    bottom: -40px;
    left: -40px;
    width: 80px;
}

/* Form Group Styles */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 15px;
}

x-input-label {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

.input-field {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
}

.input-field:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
}

/* Error Message */
.error-message {
    color: #ff0000;
    font-size: 12px;
}

/* Submit Button */
.form-buttons {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.submit-button {
    padding: 10px 20px;
    font-size: 16px;
    color: #333;
    background-color: #ffffff;
    border: 2px solid #333;
    border-radius: 5px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-button:hover {
    background-color: #f5f5f5;
    border-color: #555;
    color: #000;
}
</style>
