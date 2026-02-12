<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
    <x-input-label for="password" :value="__('New Password')" />
    <div style="position: relative; display: flex; align-items: center;">
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="padding-right: 45px;" />
        <button type="button" onclick="toggleField('password', this)" 
                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #2563eb; cursor: pointer;">
            show
        </button>
    </div>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <div style="position: relative; display: flex; align-items: center;">
        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="padding-right: 45px;" />
        <button type="button" onclick="toggleField('password_confirmation', this)" 
                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #2563eb; cursor: pointer;">
            show
        </button>
    </div>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

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