<x-guest-layout>
    <div class="container rounded shadow bg-teal-light text-teal-dark border-start border-end mt-5 mb-5">
    <form class="row" method="POST" action="{{route('store')}}" enctype="multipart/form-data" id="printForm">
          @csrf
      <h1 class="text-form-blue fw-bolder text-center display-5">Wireless Printing</h1>
                            
      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
      <input type="text" name="patron" id="patron" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Name</label>                                
      </div>
    
      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
      <input type="text" name="email" id="email" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Email</label>                                
      </div>
    
      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
      <input type="text" name="phone" id="phone" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Phone</label>                                
      </div>
    
      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
      <input type="text" name="copies" id="copies" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">How many copies would you like?</label>                                
      </div>

      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
        <select class="form-select" id="location" name="location">
        <option selected></option>
        @foreach ($users as $user)
        <option value="{{$user->library}}">{{$user->library}}</option>
        @endforeach
        </select>
        <label for="location" class="text-form-body-blue fw-bolder ms-2">Pickup Location</label>                        
        </div>
    
      <div class="form-floating col-12 col-lg-6 mb-2 mt-4">
      <input type="text" name="libnumber" id="libnumber" class="form-control">
      <label class="text-form-blue fw-bolder ms-2">Library Card</label>                                
      </div>
    
      <div class="form-group col-12 col-lg-6 mb-2 mt-4">
      <input type="file" name="print" id="print" class="form-control p-3">                              
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