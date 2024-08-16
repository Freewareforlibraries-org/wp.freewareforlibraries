    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
                <h1 class="text-teal-dark text-center fw-bolder mb-3">Edit Profile</h1>
                <input type="hidden" value="{{$user->id}}" />
                  <!-- name -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required autofocus>
                    <label for="library">Name</label>
                  </div>
                  <!-- email -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" required autofocus>
                    <label for="library">Name</label>
                  </div>
                  <!-- Library -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="library" id="library" value="{{$user->library}}" required autofocus>
                    <label for="library">Library Name</label>
                  </div>
                  <!-- Phone -->
                  <div class="form-floating mb-3">
                    <input type="phone" class="form-control" name="phone" id="phone" value="{{$user->phone}}" required autofocus>
                    <label for="phone">Phone</label>
                  </div>
                 <!-- addr -->
                 <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="addr" id="addr" value="{{$user->addr}}" required autofocus>
                    <label for="Address">Address</label>
                  </div>
        
                 <!-- City -->
                 <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="city" id="city" value="{{$user->city}}" required autofocus>
                    <label for="City">City</label>
                  </div>
        
                 <!-- State -->
                 <div class="form-floating mb-3">
                    <select class="form-select" id="state" name="state">
                    <option value="{{$user->state}}" selected>{{$user->state}}</option>
                    <option value="AK">Alaska</option>
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                    <option value="AZ">Arizona</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DC">District of Columbia</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="IA">Iowa</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MD">Maryland</option>
                    <option value="ME">Maine</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MO">Missouri</option>
                    <option value="MS">Mississippi</option>
                    <option value="MT">Montana</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="NE">Nebraska</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NV">Nevada</option>
                    <option value="NY">New York</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VA">Virginia</option>
                    <option value="VT">Vermont</option>
                    <option value="WA">Washington</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WV">West Virginia</option>
                    <option value="WY">Wyoming</option>
                    </select>
                    <label class="" for="state">State</label> 
                    </div>                          
        
                 <!-- Zip -->
                 <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="zip" id="zip" value="{{$user->zip}}" required autofocus>
                    <label for="zip">Zip</label>
                  </div>
        
        <div class="d-flex">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

