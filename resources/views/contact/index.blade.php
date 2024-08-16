<x-guest-layout>
    <div class="container rounded shadow bg-teal-light text-teal-dark border-start border-end mt-5 mb-5">
    <form class="row" method="POST" action="{{route('contact.store')}}" enctype="multipart/form-data" id="printForm">
          @csrf
      <h1 class="text-form-blue fw-bolder text-center display-5">Contact Us!</h1>
         <!-- Error divs -->
         <div class="d-flex">
          @if(session()->has('success')) 
          <div class="text-dark  ms-auto me-auto p-4 mb-3">
          {{Session::get('success')}}
          </div>          
          @endif

          @if(session()->has('fail')) 
          <div class="warning alert-warning ms-auto me-auto p-4 mb-3">
          {{Session::get('fail')}}
          </div>          
          @endif

          @if ($errors->any())
          <div class="alert alert-danger ms-auto me-auto">
          <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
          </ul>
          </div>
          @endif
        </div>
                        
      <div class="form-floating col-12 col-md-12 col-lg-12 col-xl-6 mb-2 mt-4">
      <input type="text" name="patron" id="patron" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Name</label>                                
      </div>
    
      <div class="form-floating col-12 col-md-12 col-lg-12 col-xl-6 mb-2 mt-4">
      <input type="text" name="email" id="email" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Email</label>                                
      </div>
    
      <div class="form-floating col-12 col-md-12 col-lg-12 col-xl-6 mb-2 mt-4">
      <input type="text" name="phone" id="phone" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Phone</label>                                
      </div>
    
      <div class="form-floating col-12 col-md-12 col-lg-12 col-xl-12 mb-4 mt-4">
      <textarea class="form-control" style="height: 200px" placeholder="Leave a comment here" id="message" name="message"></textarea>
      <label for="message" class="ms-2">Message</label>
      </div>

      <div class="mb-3">
      <button class="g-recaptcha btn bg-teal-dark text-white float-end dropshadow hvr-grow"
      data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}"
      data-callback="onSubmit"
      data-action="submit">Submit</button>        
      </div>
    </form>
    </div>
</x-guest-layout>