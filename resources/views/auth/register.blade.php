<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative mt-1" style="position: relative;">
        <x-text-input id="password" class="block w-full pr-12"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
        
        <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;">
            <button type="button" onclick="toggleField('password', this)" class="text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none bg-white px-1">
                show
            </button>
        </div>
    </div>

    <div class="mt-2">
        <div class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200">
            <div id="strength-bar" class="transition-all duration-500 ease-out" style="width: 0%"></div>
        </div>
        <p id="strength-text" class="mt-1 text-xs text-gray-500">Enter a password</p>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <div class="relative mt-1" style="position: relative;">
        <x-text-input id="password_confirmation" class="block w-full pr-12"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />
        
        <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;">
            <button type="button" onclick="toggleField('password_confirmation', this)" class="text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none bg-white px-1">
                show
            </button>
        </div>
    </div>

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    // 1. Password Strength Logic
    const passwordInput = document.querySelector('input[name="password"]');
    const bar = document.getElementById('strength-bar');
    const text = document.getElementById('strength-text');

    passwordInput.addEventListener('input', () => {
        const val = passwordInput.value;
        let score = 0;

        if (val.length > 0) {
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
        }

        // Using Hex codes ensures the colors show up in your new project immediately
        const colors = ['#e5e7eb', '#ef4444', '#f97316', '#eab308', '#22c55e'];
        const labels = ['Enter a password', 'Too Weak', 'Weak', 'Good', 'Strong!'];
        
        // Update UI
        bar.style.backgroundColor = colors[score]; // Set the color directly
        bar.style.width = (score / 4) * 100 + '%';
        text.innerText = labels[score];
        
        // Optional: Match the text color to the bar color
        if (score > 0) text.style.color = colors[score];
    });

    // 2. Show/Hide Toggle Logic
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