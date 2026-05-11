<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/custom_upload.js'])
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- new log-in fields --}}
        <!-- Email Address -->
        <div>
            <div class="input-container-login-forms">
                <x-text-input id="input" class="block mt-1 w-full" type="email" placeholder=" " name="email" ... />
                <x-input-label id="input" for="input" :value="__('Email')" />
                <span class="underline"></span>
                <x-input-error :messages="$errors->get('email')" class="mt-2    " />
            </div>
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

        
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="flex items-center gap-2 mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- register link -->
            <a class="text-sm hover:text-gray-900 dark:hover:text-gray-100 underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">New user? Create an account.</a>
        </div>

        <a class="text-sm hover:text-gray-900 dark:hover:text-gray-100 underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">New user? Create an account.</a>



    </form>
</x-guest-layout>
