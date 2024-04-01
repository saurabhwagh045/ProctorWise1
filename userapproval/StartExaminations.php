<?php

 $showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
          include 'direction/_dbconnect.php';
          $ExamStatus = $_POST["exam_status"];
          $hallTickitstatus = $_POST["hallTickit_status"];
       $sql =   "UPDATE exam_portal SET exam_status = '$ExamStatus', hall_ticket_status = '$hallTickitstatus' WHERE id = 1";
            // $sql = "INSERT INTO `exam_portal` (`exam_status`, `hall_ticket_status`) VALUES ('$ExamStatus', '$hallTickitstatus')";
                 $result = mysqli_query($con,$sql);
                 
                            if ($result){
                              $showAlert = true;
                            }
            else{
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
    <title>Exam Portal</title>
  </head>
  <body>
   
           <?php require 'direction/admin_nav.php' ?>
           <?php  
           if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong>You have successfully make changes on examination portal.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }  
           ?>

           <div class="container">
          <h1 class="text-center">Are You Really Willing To Make Changes On Portal For Fill Examination Form.</h1>
               <form action="/userapproval/StartExaminations.php" method="post">
                              <div class="mb-3">
                             <h3><label for="exam_status" class="form-label">Open Portal For Accept Examinations Form</label></h3>&nbsp &nbsp 
                                <select name="exam_status">
                                <option>start</option>
                                <option>stop</option>
                                </select>
                              </div>

                              <div class="mb-3">
                             <h3><label for="hallTickit_status" class="form-label">Upload Hall Tickets of Students</label></h3>&nbsp &nbsp 
                                <select name="hallTickit_status">
                                <option>Upload</option>
                                <option>stop</option>
                                </select>
                              </div>
                             <br><br>
                             
                              <button type="submit" class="btn btn-primary">Proceed</button> &nbsp &nbsp
                              <a href="/userapproval/welcome_admin.php" class="btn btn-primary">Home</a> &nbsp &nbsp
                              <button class="btn btn-primary" onclick="history.back()">Go Back</button>
              </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>