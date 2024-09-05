<div class="form">
    <div class="title">{{ __('Profile Information') }}</div>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
        </div>

        <div>
            <label for="email" class="label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="forgot-pass">
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline"><a href="#" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Click here to re-send the verification email.') }}</a></button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <button type="submit" class="submit">{{ __('Save') }}</button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-xl text-center p-1 m-1 text-green-600"
            >{{ __('Saved.') }}</p>
        @endif
    </form>
</div>

<style>
.form {
    max-width: 320px;
    width: 100%;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 0px 4px rgba(52, 52, 53, 0.185);
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    margin: auto; /* Alinea hacia la derecha */
}

.title {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #1a202c;
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
