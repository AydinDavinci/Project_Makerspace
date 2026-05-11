<x-guest-layout>
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/custom_upload.js'])
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class = "input-container-login-forms">
              <x-text-input id="input" class="block mt-1 w-full" placeholder=" " name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-label id="input" for="input" :value="__('Name')" />
            <span class="underline"></span>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    <!-- Email Address -->
        <div class="input-container-login-forms">
            <x-text-input id="input" class="block mt-1 w-full" type="email" placeholder=" " name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-label id="input" for="input" :value="__('Email')" />
            <span class="underline"></span>
            <x-input-error :messages="$errors->get('email')" class="mt-2    " />
        </div>
        

    <!-- Password -->
        <div class="input-container-login-forms">
            <x-text-input id="input" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    placeholder=" "
                    required autocomplete="current-password" />
            <x-input-label for="input" :value="__('Password')" />
            <span class="underline"></span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        

        <!-- Confirm Password -->
        <div class="input-container-login-forms">
            <x-text-input id="input" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    placeholder=" "
                    required autocomplete="current-password" />
            <x-input-label for="input" :value="__('Confirm Password')" />
            <span class="underline"></span>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">Already registered?
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
