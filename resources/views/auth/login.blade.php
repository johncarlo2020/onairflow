@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .form-login{
        background-color: #fff;
        padding: 40px 20px;
        width: 95%;
        border-radius: 4px;
        color: rgb(37, 37, 37);
        height: fit-content;
    }
    .form-login input{
        background-color: #fff;
        border-radius: 50px;
        padding: 8px 20px;
        border: solid 1px #949494;
    }
    .form-login input::placeholder{
        font-size: 14px;
    }
    .submit-login-btn{
        width: 100%;
        background-image: linear-gradient(0deg, #00aff0, #1ea2f1);
        border-color: #1ea2f1;
        color: #fff;
        height: 48px;
        border-radius: 25px;
        font-size: 16px;
        margin-bottom: 20px;
        text-transform:uppercase;
    }

    @media (min-width: 601px) {
        .form-login{
            width: 500px;
            padding: 20px 4rem;
            margin-top: 5%;
        }
      }

</style>

<main class="flex justify-center w-full h-screen pt-10 bg-cyan-100">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="bg-white shadow-lg form-login" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mx-auto w-44 icon">
            <img src="{{asset('/images/logo.png')}}" alt="">
        </div>
        <p class="mb-4 text-sm text-center">Monetize your expertise with online education. Join now!</p>
        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter you email here"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Enter you password here"  />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        <div class="flex items-center justify-start pl-4 mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm rounded-md text-cyan-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="mt-8 mb-3">
            <button class="submit-login-btn">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</main>

@yield('scripts')
