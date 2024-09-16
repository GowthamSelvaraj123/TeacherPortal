<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Teacher Name')" />
            <div class="input-wrap">
            <div class="icon-wrap">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="input-wrap">
            <div class="icon-wrap"><i class="fa fa-user-o" aria-hidden="true"></i></div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="input-wrap">
            <div class="icon-wrap"><i class="fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="password-icon-wrap" onclick="showPassword('password')">
            <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="input-wrap">
            <div class="icon-wrap"><i class="fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="password-icon-wrap" onclick="showPassword('password_confirmation')">
            <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function showPassword(id) {
    var password = document.getElementById(id);
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
    </script>
</x-guest-layout>
