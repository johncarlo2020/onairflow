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
    <form class="form-login" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mx-auto w-28 icon">
            <img src="{{asset('/images/logo.png')}}" alt="">
        </div>
        <p class="mb-5 text-sm text-center">Monetize your expertise with online education. Join now!</p>
        <!-- Name -->
        <div>
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div>
            <button class="mt-4 submit-login-btn">
                {{ __('Register') }}
            </button>
        </div>

        <div class="flex items-center justify-center mt-4 mb-3">
            <a class="text-sm rounded-md text-cyan-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</main>
@yield('scripts')
