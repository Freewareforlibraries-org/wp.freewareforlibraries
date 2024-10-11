<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container rounded text-teal-dark bg-teal-light col-12 col-sm-12 col-md-12 col-lg-4 offset-lg-4 shadow">
    <form class="p-4" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mt-0">
            <div class="col-12 col-sm-12"> <h1 class="text-center mb-4 fw-bolder">Library Login</h1></div>
        </div>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" required autofocus>
            <label for="email">Email</label>
          </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password" required autofocus>
            <label for="password">Password</label>
          </div>

        <div class="d-flex">

            <button class="ms-auto btn bg-teal-dark text-white hvr-grow dropshadow">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
</x-guest-layout>
