<?php
 $showAlert = false;
 $passErr = false;
 $userInvalid = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
          include 'direction/_dbconnect.php';
          $username = $_POST["username"];
          $dob = $_POST["dob"];
          $adhar = $_POST["adhar"];
          $email = $_POST['email'];
          $password = $_POST["password"];
          $cpassword = $_POST["cpassword"];
          //$exists = false;
          // Check whether this username exists.
          $existSql = "SELECT * FROM `users` WHERE username = '$username'";    
          $result = mysqli_query($con,$existSql);
          $numExistRows = mysqli_num_rows($result);
          if($numExistRows > 0){
            //$exists = true;     
            $userInvalid = true;
          }else{
           // $exists = false;
          
            if(($password == $cpassword)){
                 $sql = "INSERT INTO `users` (`username`, `dob`, `adhar`, `email`, `usertype`, `password`, `status`) VALUES ('$username','$dob','$adhar', '$email','admin', '$password', 'pending')";
                 $result = mysqli_query($con,$sql);
                 
                            if ($result){
                            $showAlert = true;
                            }
            }else{
              $passErr = true;
          }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>signup</title>
  </head>
  <body>
   
  <?php require 'direction/admin_nav.php' ?>
           <?php
           if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong>Your Account is now Pending for Approval.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>
            
            <?php
           if($passErr){
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Error!<br></strong>PassWord Does not match.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>
           
           <?php
           if($userInvalid){
          echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong>Error!<br></strong>username is Already Exist.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>


           <div class="container">
          <h1 class="text-center">Remember You SignUp as An admin</h1>
               <form action="/userapproval/signup_admin.php" method="post">
                              <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="dob" class="form-label">DOB</label>
                                <input type="date" class="form-control" id="dob" name="dob" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="adhar" class="form-label">ADHAR Number</label>
                                <input type="text" class="form-control" id="adhar" name="adhar" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                              </div>
                              <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                                <div id="emailHelp" class="form-text">Make Sure You Type the same Password.</div>
                              </div>
                              <button type="submit" class="btn btn-primary">SignUp</button>
              </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>