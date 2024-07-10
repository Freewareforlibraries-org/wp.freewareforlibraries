<x-app-layout>
<?php
session_start();  
?>
<?php
    require '/var/www/vhosts/nlrlibrary.org/httpdocs/includes/header.php';
    require '/var/www/vhosts/nlrlibrary.org/httpdocs/includes/alerts.php';

    ?>
    <div class="container shadow mt-4 mb-5">
     <h1 class="text-center text-form-blue fw-bolder display-1">Wireless Printing</h1> 
      <?php
      if(isset($_SESSION['id'])){
        // Connect to the database
        $dbLink = new mysqli('127.0.0.1', 'remoteuser', 'Oxymoron-Festivity-Lettuce-Ninja-Barge6', 'Remote-Printing');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
         
        // Query for a list of all existing files
        $sql = 'SELECT * FROM `printing`';
        $result = $dbLink->query($sql);
         
        // Check if it was successfull
        if($result) {
            // Make sure there are some files in there
            if($result->num_rows == 0) {
                echo '<p>There are no print jobs at this time</p>';
            }
            else {
                // Print the top of a table
                       echo '	<div class="row px-2  pb-5">
                        <div class="border-end bg-white border col-2 border-bottom text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">Name</p></div>
                        <div class="border-end bg-white border  col-5 border-bottom text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">Contact</p></div>
                        <div class="border-end bg-white  border col-1 border-bottom text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">Copies</p></div>
                        <div class="border-end bg-white border col-2 border-bottom text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">Date</p></div>
                        <div class="border-end bg-white border col-1 border-bottom text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">&nbsp;</p></div>
                        <div class="col-1 border-end bg-white border text-form-blue border-4 fw-bolder d-flex"><p class="mx-auto my-auto">&nbsp;</p></div>
                        ';
            }
                // Print each file
                while($row = $result->fetch_assoc()) {
                    echo "
                         <diV class='border col-2 text-form-blue  bg-white border-2 d-flex'><p class='mx-auto my-auto text-center'>{$row['patron']}</p></div>
                        <div class='border col-5 text-form-blue text-break bg-white border-2 d-flex'><p class='mx-auto my-auto text-center'>{$row['email']}<br>{$row['phone']}<br>{$row['libnumber']}</p></div>
                        <div class='border col-1 text-form-blue  bg-white border-2 d-flex'><p class='mx-auto my-auto text-center'>{$row['copies']}</p></div>
                        <div class='border col-2 text-form-blue  bg-white border-2 d-flex'><p class='mx-auto my-auto text-center'>{$row['created']}</p></div>
                        <div class='d-flex border col-1 text-form-blue  bg-white border-2 d-flex'><p class='mx-auto my-auto'><a href='https://www.nlrlibrary.org/staff/wp/files/{$row['file']}'><i class='fa fa-print fa-2x'></i></a></p></div>
                  <div class='col-1 text-form-blue bg-white border border-2 d-flex'><p class='mx-auto my-auto'><a href='delete.php?id={$row['id']}&file={$row['file']}'><i class='fa fa-trash fa-2x'></i></a></p></div>
                  
                 
                        ";
                }
         
              echo '</div>'; 
            
         
            // Free the result
            $result->free();
        
        }
        else
        {
            echo 'Error! SQL query failed:';
            echo "<pre>{$dbLink->error}</pre>";
        }
         
        // Close the mysql connection
        $dbLink->close();
             }
        
   
     else {
      echo'
      <form class="text-dark offset-xl-3 col-xl-6" action="./includes/login.php" method="post">
      <input class="form-control mb-3 me-2" type="text" name="users" placeholder="Username" aria-label="Username">
  <input class="form-control me-2 mb-3" type="password" name="pwd" placeholder="Password" aria-label="Password">
      <button class="btn float-end bg-form-blue dropshadow hvr-grow text-light" name="submit" type="submit">Login</button>
    </form>
      ';
     }
     ?>
     
       </div>
  
   

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </body>
    <?php
    require '/var/www/vhosts/nlrlibrary.org/httpdocs/includes/footer.php';
    require '/var/www/vhosts/nlrlibrary.org/httpdocs/includes/modals.php';
    ?>
</x-app-layout>
