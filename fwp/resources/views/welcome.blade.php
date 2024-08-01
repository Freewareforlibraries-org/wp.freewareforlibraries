<x-guest-layout>
<div class="container rounded shadow bg-teal-light text-teal-dark border-start border-end mt-5 mb-5">
<form class="row" method="POST" action="upload.php" enctype="multipart/form-data">
  <h1 class="text-form-blue fw-bolder text-center display-5">Wireless Printing</h1>
                        
      <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="name" class="form-label text-form-blue">Name:</label>
          <input type="text" name="patron" id="patron" class="form-control" required>
          <div id="nameHelp" class="text-form-blue">Please enter your full name</div>
      </div>
      <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="Email" class="form-label text-form-blue">Email address:</label>
<input type="email" name="email" class="form-control" id="Email" aria-describedby="email" required>
<div id="emailHelp" class="text-form-blue">Please enter your email address</div>
</div>
<div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="phone" class="form-label text-form-blue">Phone:</label>
<input type="phone" name="phone" class="form-control" id="phone" aria-describedby="phone" required>
<div id="phoneHelp" class="text-form-blue">Please enter your phone number</div>
</div>
<div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="copies" class="form-label text-form-blue">Copies:</label>
          <input type="text" name="copies" id="copies" class="form-control" placeholder="" required>
<div id="copiesHelp" class="text-form-blue">How many copies would you like?</div>
         
      </div>
      <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="location" class="form-label text-form-blue">Pickup Location:</label>
          <select class="form-select" name="location" required>
<option selected></option>
<option value="Laman Library">Laman Library</option>
<option value="Argenta Library">Argenta Library</option>
</select>
      </div>
     
<div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
<label for="libnumber" class="form-label text-form-blue">Library Card:</label>
          <input name="libnumber" id="libnumber" class="form-control" placeholder="">
         <div id="librarycardHelp" class="text-form-blue">Please enter your library card number (optional)</div>
      </div>
<div class="mb-3 col-12 col-sm-12 col-md-6">
<input class="form-control upload-file text-form-blue" type="file" id="print" name="print" required>
</div>
      <div class="mb-3">

<button class="btn bg-teal-dark hvr-grow text-white mt-4 float-end dropshadow" type="submit" name="upload" value="Upload">Submit</button>
          
      </div>
  </form>
</div>
</x-guest-layout>