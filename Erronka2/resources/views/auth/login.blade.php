<x-guest-layout>
    <div class=" container flex justify-between gap-10 " id="container">
        <div class="lg:block hidden  border-lime-300 half-width bg-gray-700 rounded-md bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-30 glow-green">
            <h1 class=" pt-6 text-center text-2xl italic font-inter opacity-90 block font-medium text-white">ERREGISTROA EGIN</h1>
            <form method="POST" action="{{ route('register') }}" class="p-6" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label class="font-inter" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>



                <div class="mt-4 contenedo">

                        <!-- <x-input-label for="foto" value="Argazkia" />
                        <input type="file" name="foto" class="block mt-1 w-full"> -->
                        <div class="input-div">
                            <input class="inputs" name="imagen" type="file">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
                                <polyline points="16 16 12 12 8 16"></polyline>
                                <line y2="21" x2="12" y1="12" x1="12"></line>
                                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                <polyline points="16 16 12 12 8 16"></polyline>
                            </svg>
                        </div>

                    </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-white hover:text-green-300 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class=" block  half-width border-lime-300 lg:ml-44 h-full bg-gray-700 rounded-md bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-30 glow-green
        ">
        <h1 class="pt-6 text-center text-2xl italic font-inter opacity-90 block font-medium text-white">SAIOA HASI</h1>
        <a class=" lg:hidden block text-center mr-4 underline text-sm text-gray-400  hover:text-gray-100 "
        href="{{ route('register') }}"> {{ __('Register') }}
        </a>
            <form method="POST" action="{{ route('login') }}" class="p-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center ">
                        <input id="remember_me" type="checkbox"
                            class="rounded  dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm  text-white">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="mr-4 underline text-sm text-white hover:text-green-300 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="#">
                            {{ __('Return') }}
                        </a>
                    @if (Route::has('password.request'))
                        <a class="text-white underline text-sm hover:text-green-300 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>


        <div id="login" class="">
        </div>

    </div>

</x-guest-layout>
