<x-app-layout>
    
    <style>
        .submenu:after {
         content: '\2807';
         font-size: 2em;
         color: #11518C !important;
            cursor: pointer;
    }
    
    
        </style>

    <div class="container shadow bg-light mt-4 mb-5">
     <h1 class="text-center text-teal-dark fw-bolder display-1">Print Release Terminal</h1> 
        <!-- Error divs -->
        <div class="d-flex">
            @if(session()->has('success')) 
            <div class="success alert-success ms-auto me-auto p-4 mb-3">
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

    <div class="row px-2  pb-5">
                        <div class="border-start border-top border-teal-dark col-3 border-bottom text-form-blue  fw-bolder d-flex"><p class="mx-auto my-auto">Name</p></div>
                        <div class="border-end border-teal-dark border  col-5 border-bottom text-form-blue  fw-bolder d-flex"><p class="mx-auto my-auto">Contact</p></div>
                        <div class="border-end border-top border-teal-dark  col-1 border-bottom text-form-blue  fw-bolder d-flex"><p class="mx-auto my-auto">Copies</p></div>
                        <div class="border-end border-top border-teal-dark col-2 border-bottom text-form-blue  fw-bolder d-flex"><p class="mx-auto my-auto">Date</p></div>
                        <div class="col-1 border-end border-bottom border-teal-dark border-top text-form-blue  fw-bolder d-flex"><p class="mx-auto my-auto">&nbsp;</p></div>

                        @foreach ($wps as $wp)
                            
                        
                         <diV class='border-start border-bottom col-3 text-form-blue  border-teal-dark d-flex'><p class='mx-auto my-auto text-center'>{{$wp->patron}}</p></div>
                        <div class='border-start border-bottom col-5 text-form-blue text-break border-teal-dark d-flex'><p class='mx-auto my-auto text-center'>{{$wp->email}}<br>{{$wp->phone}}<br>{{$wp->libnumber}}</p></div>
                        <div class='border-start border-bottom col-1 text-form-blue  border-teal-dark d-flex'><p class='mx-auto my-auto text-center'>{{$wp->copies}}</p></div>
                        @php
                               $date = date('h:i:s a', strtotime($wp->created_at));  

                        @endphp
                        <div class='border-start border-bottom col-2 text-form-blue border-teal-dark d-flex'><p class='mx-auto my-auto text-center'>{{$date}}</p></div>
                  <div class='col-1 text-form-blue border-teal-dark border-start border-bottom border-end d-flex'>
                    
                    <div class="dropdown ms-auto me-auto mt-auto mb-auto">
                        <a class="submenu text-decoration-none" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li class="staff-link"><a href="../storage/prints/{{$wp->id}}/check" class="dropdown-item staff-link text-teal-dark text-decoration-none ms-1 fw-bolder">Print</a></li>
                          <li class="staff-link"><form class="" method="post"  action="{{route('wp.delete', ['wp' => $wp])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="dropdown-item text-teal-dark fw-bolder staff-link" /></form></li>
                        </ul>
                      </div>
                          


                  </div>
                  @endforeach

     
       </div>
  
   

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </body>

</x-app-layout>
