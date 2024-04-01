<?php
  include 'direction/_dbconnect.php';
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin approval</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  .center{
    text-align: center;
  }
  </style>

</head>
<body>
  
	

<h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">USERNAME</th>
      <th scope="col">DOB</th>
      <th scope="col">Adhar</th>
	 <th scope="col">Email</th>
   <th scope="col">Image</th>
   <th scope="col">Usertype</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM  users WHERE status = 'pending' ORDER BY 'id'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <th scope="row"><?php echo $row['name']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['dob']; ?></td>
      <td><?php echo $row['adhar']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td> 
           <img src="<?php echo "images/".$row['stud_image'];?>" width="100px" alt="Image">
      </td>
      <td><?php echo $row['usertype']; ?></td>
      <td><?php echo $row['status']; ?></td>


     <td>
		<form action="adminPowers.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp 
    <input type="submit" name="approve" value="Raised Issue"> &nbsp &nbsp 
		 <input type="submit" name="delete" value="Reject"> 

		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>


<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
	$select = "UPDATE users SET status = 'approved' WHERE id = '$id' ";
	$resut = mysqli_query($con,$select);
	//header("location:adminPowers.php");
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM users WHERE id = '$id' ";
	$resut = mysqli_query($con,$select);
	header("location:adminPowers.php");
}

 ?>






<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 
<div class="center">
<a  href="/userapproval/welcome_admin.php" class="btn btn-primary">Home</a> 
</div>
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 



 <h1 class="text-center  text-white bg-success col-md-12">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">USERNAME</th>
      <th scope="col">DOB</th>
      <th scope="col">Adhar</th>
      <th scope="col">EMAIL</th>
      <th scope="col">Image</th>
      <th scope="col">Usertype</th>
      <th scope="col">STATUS</th>
    </tr>
  </thead>


  
<?php 
$query = "SELECT * FROM  users WHERE status = 'approved' ORDER BY 'id'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <th scope="row"><?php echo $row['name']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['dob']; ?></td>
      <td><?php echo $row['adhar']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td> 
           <img src="<?php echo "images/".$row['stud_image'];?>" width="100px" alt="Image">
      </td>
      <td><?php echo $row['usertype']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
  </tbody>

  <?php } ?>

</table>



</body>

</html>