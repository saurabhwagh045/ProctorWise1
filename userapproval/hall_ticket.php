<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location : login.php");
  exit;
}


include 'direction/_dbconnect.php';

$username1 = $_SESSION["username"];

$query = "SELECT * FROM  ex_data WHERE username = '$username1'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))  {
   $roll = $row['id'];
    $name = $row['name']; 
    $class = $row['class'];
    $sem = $row['sem'];
    $major = $row['major_sub'];
   $image = $row['stud_image'];
   $sign = $row['stud_sign'];
   $sub1 = $row['sub1'];
   $sub2 = $row['sub2'];
   $sub3 = $row['sub3'];
   $sub4 = $row['sub4'];
   $sub5 = $row['sub5'];
   $sub6 = $row['sub6'];
   $sub7 = $row['sub7'];
   $sub8 = $row['sub8'];

   if($sem == 'I'){
    $semester= "sem 1";
   }elseif($sem == 'II'){
    $semester= "sem 2";
   }elseif($sem == 'III'){
    $semester= "sem 3";
   }elseif($sem == 'IV'){
    $semester= "sem 4";
   }elseif($sem == 'V'){
    $semester= "sem 5";
   }elseif($sem == 'VI'){
    $semester= "sem 6";
   }elseif($sem == 'VII'){
    $semester= "sem 7";
   }elseif($sem == 'VIII'){
    $semester= "sem 8";
   }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hall Ticket<?php echo $roll; ?></title>

    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #container {
            position: relative;
            padding: 20px;
        }
        #top-right-images {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        #left-div {
            width: 90%;
            padding: 20px;
            background-color: #f0f0f0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px; 
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .containerbtn{
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 10vh; /* Make the container full height of the viewport */
        }

        
        .grad {
              background-color: red;
              background-image: linear-gradient(#fddaa6, white);
      }
      .top-inner {
         width: 5;
         height: 5;
         padding-bottom: 10px;
      }
      .top-left {
         float: left;
         width: 9%;
         padding-top: 40px;
      }
      .top-right-left {
         float: left;
         width: 70%;
         padding-top: 10px;
      }
      div.vt1 {
         color: #030104;
         font-size: 15px;
         font-family: 'open sans';
      }
      div.vt {
         color: #990E00;
         font-size: 26px;
         font-family: 'open sans';
      }
    </style>

  </head>

  <body>
    <div id="container">
        <div id="top-right-images">
        <img src="<?php echo "images/".$image;?>" width="100" height="100" alt="Image 1"><br>
        <img src="<?php echo "signs/".$sign;?>" width="100" height="50" alt="Image"> 
        </div>
    
        <div class="top-left">
		   <div>
			<img src="mj_logo.png" width="50px"  alt="Image">
		  </div>
	      </div>

         <div class="top-right-left">
         <div class="vt1">khandesh College Education Society's</div>
         <div class="vt">Moolji Jaitha College</div>
         <div class="vt1"> 
               ""An Autonomus College Affiliated to K.B.C North Maharashtra University, Jalgaon.""
         <br>
               "NAAC Re-Accredited Grade "A" CGPA 3.15 (3rd Cycle) | UGC Honoured "College of Excellence" "
         <br>
               " "Star College" By Ministry of Science and Technology"
         </div>
         </div>

        <br><br><br><br>
        <table>
            <tr>
                <th>student name: <?php echo $name; ?></th>
                <td>PRN Number: <?php echo $username1; ?></td>
            </tr>
            <tr>
                <td>Seat Number: <?php echo $roll; ?> </td>
                <td>Major Subject: <?php echo $major; ?> </td>
            </tr>
            <tr>
                <td>Center Name: KCES Moolji Jaitha College, Jalgaon.</td>
            </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>S/N</th>
            <th>Semester</th>
            <th>INT/EXT</th>
            <th>Paper Name</th>
            <th>R/B</th>
            <th>Jr.Supervisor/s Sign</th>
         </tr>
         <tr> 
            <td>1</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub1; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>2</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub2; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr>
            <td>3</td> 
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub3; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr>
            <td>4</td> 
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub4; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>5</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub5; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>6</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub6; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>7</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub7; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>8</td>
            <td><?php echo $semester; ?></td>
            <td>INT</td>
            <td><?php echo $sub8; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
           <td>9</td>
           <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub1; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>10</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub2; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>11</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub3; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>12</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub4; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>13</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub5; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>14</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub6; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>15</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub7; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
         <tr> 
            <td>16</td>
            <td><?php echo $semester; ?></td>
            <td>EXT</td>
            <td><?php echo $sub8; ?></td>
            <td>Regular</td>
            <td></td>
         </tr>
      </table>
        <div class="containerbtn">
            
             <button class="btn btn-primary" onclick="window.print()">Print</button> &nbsp &nbsp 
             <button class="btn btn-primary" onclick="history.back()">Go Back</button>
         </div>
    </div>
</body>

<!--
<body>
<div class="container">
          <h1 class="text-center"></h1>
                            <div class="mb-3">
                                  <label for="name" class="form-label">Student RollNO: <?php echo $roll; ?></label>
                               </div> 
                             <div class="mb-3">
                                  <label for="name" class="form-label">Student name: <?php echo $name; ?></label>
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
                                        <button type="submit" class="btn btn-primary">SignUp</button>
                                        <button onclick="window.print()">Print</button>
                              </div>
                              <?php  // echo $username1; ?>
          
</div>

    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>