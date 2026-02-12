<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative mt-1" style="position: relative;">
        <x-text-input id="password" class="block w-full pr-12"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
        
        <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;">
            <button type="button" onclick="toggleField('password', this)" class="text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none bg-white px-1">
                show
            </button>
        </div>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<script>
    function toggleField(fieldId, btn) {
        const input = document.getElementById(fieldId);
        if (input.type === 'password') {
            input.type = 'text';
            btn.innerText = 'hide';
        } else {
            input.type = 'password';
            btn.innerText = 'show';
        }
    }
</script>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif

    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('register') }}">
        {{ __('Not registered yet?') }}
    </a>

    <x-primary-button class="ms-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
    </form>
</x-guest-layout>
