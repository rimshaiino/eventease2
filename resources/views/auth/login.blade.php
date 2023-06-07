<x-guest-layout class="login-bg">
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-4">
                <x-label for="email" class="italic" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full py-3 px-4  border-gray-200 rounded-md text-sm focus:border-purple-300 focus:ring-purple-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" class="italic" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full  py-3 px-4  border-gray-200 rounded-md text-sm focus:border-purple-300 focus:ring-purple-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('パスワードを保存') }}</span>
                </label>



                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた方はこちら') }}
                    </a>
                @endif
            </div>

                {{-- <x-button class="ml-4 inline-flex items-center px-6 py-3 text-purple-500 bg-purple-100 rounded-md hover:bg-purple-200 hover:text-white">
                    {{ __('Log in') }}
                </x-button> --}}
            <div class="flex items-center justify-center mt-7">
                <x-button class="px-40 py-4 text-xl font-semibold text-center text-white transition duration-300 rounded-lg hover:from-purple-600 hover:to-pink-600 ease bg-gradient-to-br from-purple-500 to-pink-500 md:w-auto">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録の方はこちら</a>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
