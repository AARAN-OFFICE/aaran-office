<x-guest-layout>
    <x-jet.authentication-card>
        <x-slot name="logo">
            <x-assets.logo.cxlogo :icon="'light'" class="h-20 ml-4 mx-auto w-auto  block"/>
        </x-slot>

        <x-jet.validation-errors class="mb-4"/>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet.label for="email" value="{{ __('Email') }}"/>
                <x-jet.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-jet.label for="password" value="{{ __('Password') }}"/>
                <x-jet.input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet.checkbox id="remember_me" name="remember"/>
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet.button class="ms-4">
                    {{ __('Log in') }}
                </x-jet.button>
            </div>
        </form>
    </x-jet.authentication-card>
</x-guest-layout>
