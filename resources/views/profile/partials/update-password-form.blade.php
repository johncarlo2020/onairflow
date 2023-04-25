<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="text-sm" for="password_confirmation">Current Password<label>
            <input id="current_password" name="current_password" type="password" class="block w-full mt-1 text-gray-400 border-gray-300 rounded" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div><label class="text-sm" for="password_confirmation">New Password<label>
            <input id="password" name="password" type="password" class="block w-full mt-1 text-gray-400 border-gray-300 rounded" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label class="text-sm" for="password_confirmation">Confirm Password<label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1 text-gray-400 border-gray-300 rounded" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
