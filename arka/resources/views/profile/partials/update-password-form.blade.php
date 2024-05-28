<section class="form">
    <header>
        <h2 class="title">Update Password</h2>
        <p class="subtitle">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="label">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="input" autocomplete="current-password" />
            @if ($errors->updatePassword->has('current_password'))
                <div class="error">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div>
            <label for="update_password_password" class="label">New Password</label>
            <input id="update_password_password" name="password" type="password" class="input" autocomplete="new-password" />
            @if ($errors->updatePassword->has('password'))
                <div class="error">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation" class="label">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input" autocomplete="new-password" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="error">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="submit">Save</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xl text-center p-1 m-1 text-green-600"
                >Saved.</p>
            @endif
        </div>
    </form>
</section>

<style>
.form {
    max-width: 800px;
    width: 100%;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 0px 4px rgba(52, 52, 53, 0.185);
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    margin-left: auto; /* Alinea hacia la derecha */
}

.title {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #1a202c;
}

.subtitle {
    text-align: center;
    font-size: 1rem;
    margin-bottom: 20px;
    color: #4a5568;
}

.label {
    color: rgb(0, 0, 0);
    margin-bottom: 4px;
}

.input {
    padding: 10px;
    margin-bottom: 20px;
    width: 100%;
    font-size: 1rem;
    color: #4a5568;
    outline: none;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: all 0.2s ease-in-out;
}

.input:focus {
    background-color: #fff;
    box-shadow: 0 0 0 2px #cbd5e0;
}

.input:valid {
    border: 1px solid green;
}

.input:invalid {
    border: 1px solid rgba(14, 14, 14, 0.205);
}

.error {
    color: red;
}

.submit {
    background-color: #1a202c;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

</style>
