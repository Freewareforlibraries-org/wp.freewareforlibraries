<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
       <div class="col-12 col-sm-6"> <img src="{{ asset('logo.png') }}" class=""/></div>
       <div class="col-12 col-sm-6"> <h1 class="text-center display-5 mb-4 fw-bolder">Register <br> your <br> Library</h1></div>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

          <!-- Library -->
          <div>
            <x-input-label for="library" :value="__('Library')" />
            <x-text-input id="library" class="block mt-1 w-full" type="text" name="library" :value="old('library')" required autofocus autocomplete="library" />
            <x-input-error :messages="$errors->get('library')" class="mt-2" />
        </div>

          <!-- Phone -->
          <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- addr -->
         <div>
            <x-input-label for="addr" :value="__('Address')" />
            <x-text-input id="addr" class="block mt-1 w-full" type="text" name="addr" :value="old('addr')" required autofocus autocomplete="addr" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- City -->
         <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- State -->
         <div>
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- Zip -->
         <div>
            <x-input-label for="zip" :value="__('Zip')" />
            <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autofocus autocomplete="zip" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

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
</x-guest-layout>
