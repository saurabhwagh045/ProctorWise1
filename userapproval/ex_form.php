<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location : login.php");
  exit;
}

$showAlert = false;

include 'direction/_dbconnect.php';

$username1 = $_SESSION["username"];
//echo $username1;


$query = "SELECT * FROM  users WHERE username = '$username1'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))  {
   $name = $row['name'];
   $image = $row['stud_image'];
   $sign = $row['stud_sign'];

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
          include 'direction/_dbconnect.php';
          $faculty = $_POST["faculty"];
          $class = $_POST['class'];
          $major = $_POST['major_sub'];
          $semester = $_POST['semester'];
          $bk = $_POST['backlog'];

          if(($faculty == 'science')&&($class == 'BSC') && ($major == 'Computer_Science')&&($semester == "I")){
                    $sub1 = 'sci_bsc_cs_sem1_sub1';
                    $sub2 = 'sci_bsc_cs_sem1_sub2';
                    $sub3 = 'sci_bsc_cs_sem1_sub3';
                    $sub4 = 'sci_bsc_cs_sem1_sub4';
                    $sub5 = 'sci_bsc_cs_sem1_sub5';
                    $sub6 = 'sci_bsc_cs_sem1_sub6';
                    $sub7 = 'sci_bsc_cs_sem1_sub7';
                    $sub8 = 'sci_bsc_cs_sem1_sub8';
                    
                    $sql = "INSERT INTO ex_data (username,name,stud_image,stud_sign,faculty,class,major_sub,sem,bk,sub1,sub2,sub3,sub4,sub5,sub6,sub7,sub8,status) VALUES ('$username1','$name','$image','$sign','$faculty','$class','$major','$semester','$bk','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','pending')";
                        $result = mysqli_query($con,$sql);
                        
                                if ($result){
                                                $showAlert = true;
                                                header('Location: welcome.php');
                                                
                                }else{
                                $passErr = true;
                            }
            }elseif(($faculty == 'science')&&($class == 'BSC') && ($major == 'Computer_Science')&&($semester == "II")){
                $sub1 = 'sci_bsc_cs_sem2_sub1';
                $sub2 = 'sci_bsc_cs_sem2_sub2';
                $sub3 = 'sci_bsc_cs_sem2_sub3';
                $sub4 = 'sci_bsc_cs_sem2_sub4';
                $sub5 = 'sci_bsc_cs_sem2_sub5';
                $sub6 = 'sci_bsc_cs_sem2_sub6';
                $sub7 = 'sci_bsc_cs_sem2_sub7';
                $sub8 = 'sci_bsc_cs_sem2_sub8';
                
                $sql = "INSERT INTO ex_data (username,name,stud_image,stud_sign,faculty,class,major_sub,sem,bk,sub1,sub2,sub3,sub4,sub5,sub6,sub7,sub8,status) VALUES ('$username1','$name','$image','$sign','$faculty','$class','$major','$semester','$bk','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','pending')";
                $result = mysqli_query($con,$sql);
                    
                            if ($result){
                                            $showAlert = true;
                                            header('Location: welcome.php');
                                            
                            }else{
                            $passErr = true;
                        }
            }elseif(($faculty == 'science')&&($class == 'BSC') && ($major == 'Electronics')&&($semester == "II")){
                $sub1 = 'sci_bsc_ELE_sem2_sub1';
                $sub2 = 'sci_bsc_ELE_sem2_sub2';
                $sub3 = 'sci_bsc_ELE_sem2_sub3';
                $sub4 = 'sci_bsc_ELE_sem2_sub4';
                $sub5 = 'sci_bsc_ELE_sem2_sub5';
                $sub6 = 'sci_bsc_ELE_sem2_sub6';
                $sub7 = 'sci_bsc_ELE_sem2_sub7';
                $sub8 = 'sci_bsc_ELEs_sem2_sub8';
                
                $sql = "INSERT INTO ex_data (username,name,stud_image,stud_sign,faculty,class,major_sub,sem,bk,sub1,sub2,sub3,sub4,sub5,sub6,sub7,sub8,status) VALUES ('$username1','$name','$image','$sign','$faculty','$class','$major','$semester','$bk','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','pending')";
                $result = mysqli_query($con,$sql);
                    
                            if ($result){
                                            $showAlert = true;
                                            header('Location: welcome.php');
                                            
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
    <title>Exam Form</title>
  </head>
  <body>
       <?php
           if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong>Examform Submitted Successfully.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> ';
                              }
           ?>

<div class="container">
          <h1 class="text-center">Please Fill ExamForm Properly</h1>
               <form action="/userapproval/ex_form.php" method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                <label for="username" class="form-label">PRN Number</label>
                                <input type="text" value="<?php echo $username1; ?>" class="form-control" id="username" name="username" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="<?php echo $name; ?>" class="form-control" id="name" name="name" disabled>
                              </div>                              
                              <div class="mb-3">
                                  <label for="image" class="form-label">Student Image</label>
                                  <img src="<?php echo "images/".$image;?>" width="100px" alt="Image">
                               </div>
                               <div class="mb-3">
                                  <label for="image" class="form-label">Student Signature</label>
                                  <img src="<?php echo "signs/".$sign;?>" width="100px" alt="Image">
                               </div>

                              <div class="mb-3">
                              <label for="faculty" class="form-label">Select Faculty</label>
                               <select name="faculty">
                                <option>science</option>
                                <option>commerce</option>
                                <option>arts</option>
                                </select>
                              </div>

                              <div class="mb-3">
                              <label for="class" class="form-label">Select Class</label>
                               <select name="class">
                                <option>BSC</option>
                                <option>BCom</option>
                                <option>BA</option>
                                </select>
                              </div>

                              <div class="mb-3">
                              <label for="major_sub" class="form-label">Select Major</label>
                              <select name="major_sub">
                                <option>Computer_Science</option>
                                <option>Electronics</option>
                                <option>Mathematics</option>
                                <option>Microbiology</option>
                                <option>History</option>
                                <option>literature</option>
                                </select>
                              </div>

                              <div class="mb-3">
                              <label for="semester" class="form-label">Select Sem</label>
                               <select name="semester">
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                                <option>IV</option>
                                <option>V</option>
                                <option>VI</option>
                                <option>VII</option>
                                <option>VIII</option>
                                </select>
                              </div>

                              <div class="mb-3">
                              <label for="class" class="form-label">Backlogs</label>
                               <select name="backlog">
                                <option>NO</option>
                                <option>YES</option>
                                </select>
                              </div>

                              <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button class="btn btn-primary" onclick="history.back()">Back</button>

                              </div>
                              <?php  // echo $username1; ?>
              </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>