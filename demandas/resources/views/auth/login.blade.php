<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="expedient" :value="__('Expedient')" />
            <x-text-input id="expedient" class="block mt-1 w-full" type="text" name="expedient" :value="old('expedient')" required autofocus autocomplete="expedient" />
            <x-input-error :messages="$errors->get('expedient')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="text-center pt-2">
            <?php $url = route('denuncia.form'); ?>                 
            <a href="{{ $url }}">Todavia no tienes denuncia creada?</a>
        </div>
        <div class="flex items-center justify-center mt-4">          
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
