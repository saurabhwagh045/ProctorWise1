<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location : login.php");
  exit;
}

include 'direction/_dbconnect.php';

$username1 = $_SESSION["username"];
$userInvalid = false;
       $existSql = "SELECT * FROM `ex_data` WHERE username = '$username1'";    
          $result = mysqli_query($con,$existSql);
          $numExistRows = mysqli_num_rows($result);
          while($row = mysqli_fetch_array($result))  {
             $status = $row['status'];
          }

?>

<?php

       $existSql1 = "SELECT * FROM `exam_portal` WHERE id = '1'";    
          $result1 = mysqli_query($con,$existSql1);
          $numExistRows1 = mysqli_num_rows($result1);
          while($rows = mysqli_fetch_array($result1))  {
             $ExamStatus = $rows['exam_status'];
             $hallTickitstatus = $rows['hall_ticket_status'];
          }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Welcome-<?php $_SESSION['username']?></title>
  </head>
  <body>
    <?php require 'direction/_nav.php' ?>

    <?php
           if($userInvalid){
          echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong>Error!<br></strong>You Have Already Filled Exam Form.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>

    <div class="container">
    <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?>!</h4>
                <p>Hey how are you doing? Welcome to mySystem. You are logged in as <?php echo $_SESSION['username']?>!</p>
                <hr>
                <p class="mb-0">Whenever you need to ,be sure to logout.<a href="/userapproval/logout.php">Click Here for Logout.</a></p>
</div>

<div class="mb-3">
  <?php
     if($hallTickitstatus == 'Upload'){
              if(($numExistRows > 0) && ($status == 'approved')){
                  //$exists = true;   
                  ?>  
                  <a href="/userapproval/hall_ticket.php" class="btn btn-primary">Download Hall Ticket</a>
                  <?php
                  $userInvalid = true;
                }
     }

   
                  if(($numExistRows > 0) && ($status == 'pending')){
                    //$exists = true;   
                    ?>  
                    <h3> You Already Filled Your Exam Form Kindly Wait for Publishing HallTickets </h3>
                    <?php
                    $userInvalid = true;
                  }
     if($ExamStatus == 'start'){    
                  if($numExistRows <= 0){
                    ?>
                    <h2>Hey Examinations Session is Started Apply for Examination </h2>
                  <h3><label>You have Not filled your exam form yet,<br>Please fill it as soon as possible</label><h3><br>
                    <a href="/userapproval/ex_form.php" class="btn btn-primary">Fill Exam Form</a>
                    <?php
                  }
        }
            ?>
</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 </body>
</html>