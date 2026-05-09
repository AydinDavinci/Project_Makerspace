<x-guest-layout>
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/custom_upload.js'])
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to create a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-container-login-forms">
            
            <x-text-input id="input" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-label for="input" :value="__('Email')" />
            <span class="underline"></span>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
