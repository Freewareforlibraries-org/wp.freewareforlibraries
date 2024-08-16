    <h2 class="text-teal-dark fw-bolder">
        {{ __('Delete Account') }}
    </h2>

    <p class="mt-1 text-teal-dark fw-bold">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')
     <!-- Password -->
     <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" id="password" required autofocus>
        <label for="password">Password</label>
      </div>
    <div class="d-flex">
    <x-danger-button class="bg-danger text-white dropshadow ms-auto">{{ __('Delete Account') }}</x-danger-button>
</div>
    </form>
    


      

       