    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <h1 class="text-teal-dark text-center fw-bolder mb-3">Change Password</h1>
         <!-- Current Password -->
         <div class="form-floating mb-3">
            <input type="password" class="form-control" name="current_password" id="current Password" required autofocus>
            <label for="current_password">Current Password</label>
          </div>
          <!-- Password -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password" required autofocus>
            <label for="password">Password</label>
          </div>
          <!-- Library -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required autofocus>
            <label for="password_confirmation">Confirm Password</label>
          </div>

        <div class="d-flex">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

