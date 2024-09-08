<?php
 $login = false;
 $passErr = false;
 $pending = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
          include 'direction/_dbconnect.php';
          $username = $_POST["username"];
          $password = $_POST["password"];
         

        //$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
         $sql = "SELECT * FROM users WHERE username = '$username'";
        $select = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($select);

        $status = $row['status'];
      /*  if($status == 'app'){
            $pending =true;
        }
      */
        $select2 = mysqli_query($con,$sql);
        $check_user = mysqli_num_rows($select2);


                      if($check_user==1){
                        while($count = mysqli_fetch_assoc($select2)){
                          if(password_verify($password,$count['password'])){

                            $_SESSION["status"]=$row['status'];
                            $_SESSION["username"]=$row['username'];
                            $_SESSION["password"]=$row['password'];
                            $usertype = $row['usertype'];
                
                            if($usertype=="user"){
    
                                        if($status=="approved"){
                                            $login = true;
                                            session_start();
                                            $_SESSION['loggedin'] = true;
                                            $_SESSION['username'] = $username;
                                          header("location: welcome.php");              
                                      }
                                          elseif($status=="pending"){
                                             $pending =true;
                                            // header("location: login.php");
                                              
                                          }
                                      }else{
    
                                        if($status=="approved"){
                                          $login = true;
                                          session_start();
                                          $_SESSION['loggedin'] = true;
                                          $_SESSION['username'] = $username;
                                          header("location: welcome_admin.php");              
                                      }
                                          elseif($status=="pending"){
                                            // $pending =true;
                                            // header("location: login.php");
                                            $pending = true;
                                          }
    
                                      }
                          }else{
                            $passErr = true;
                          }
                        }

                    }else{
                      $passErr = true;
                    }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
   
           <?php require 'direction/_nav.php' ?>
           <?php
           if($login){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong>Your Logged in.
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
           if($pending){
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Error!<br></strong>Your Request to register not approved yet<br>Kindly wait for approval.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>

           <div class="container">
          <h1 class="text-center">Login to Our Website</h1>
               <form action="/userapproval/login.php" method="post">
                              <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                              </div>
                              <button type="submit" class="btn btn-primary">Login</button>
              </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>