<?php
  include 'direction/_dbconnect.php';
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Exam Forms</title>
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
      <th scope="col">Faculty</th>
      <th scope="col">Class</th>
      <th scope="col">Major</th>
      <th scope="col">semester</th>
      <th scope="col">Backlog</th>
      <th scope="col">Paper 1</th>
      <th scope="col">Paper 2</th>
      <th scope="col">Paper 3</th>
      <th scope="col">Paper 4</th>
      <th scope="col">Paper 5</th>
      <th scope="col">Paper 6</th>
      <th scope="col">Paper 7</th>
      <th scope="col">Paper 8</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM  ex_data WHERE status = 'pending' ORDER BY 'id'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <th scope="row"><?php echo $row['name']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['faculty']; ?></td>
      <td><?php echo $row['class']; ?></td>
      <td><?php echo $row['major_sub']; ?></td>
      <td><?php echo $row['sem']; ?></td>
      <td><?php echo $row['bk']; ?></td>
      <td><?php echo $row['sub1']; ?></td>
      <td><?php echo $row['sub2']; ?></td>
      <td><?php echo $row['sub3']; ?></td>
      <td><?php echo $row['sub4']; ?></td>
      <td><?php echo $row['sub5']; ?></td>
      <td><?php echo $row['sub6']; ?></td>
      <td><?php echo $row['sub7']; ?></td>
      <td><?php echo $row['sub8']; ?></td>

  
      <td><?php echo $row['status']; ?></td>


     <td>
		<form action="AproveForEx.php" method="POST">
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
	$select = "UPDATE ex_data SET status = 'approved' WHERE id = '$id' ";
	$resut = mysqli_query($con,$select);
	header("location:AproveForEx.php");
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM ex_data WHERE id = '$id' ";
	$resut = mysqli_query($con,$select);
	header("location:AproveForEx.php");
}

 ?>






<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 
<div class="center">
<a  href="/userapproval/welcome_admin.php" class="btn btn-primary">Home</a> 
</div>
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 



 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">USERNAME</th>
      <th scope="col">Faculty</th>
      <th scope="col">Class</th>
      <th scope="col">Major</th>
      <th scope="col">semester</th>
      <th scope="col">Backlog</th>
      <th scope="col">Paper 1</th>
      <th scope="col">Paper 2</th>
      <th scope="col">Paper 3</th>
      <th scope="col">Paper 4</th>
      <th scope="col">Paper 5</th>
      <th scope="col">Paper 6</th>
      <th scope="col">Paper 7</th>
      <th scope="col">Paper 8</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  ex_data WHERE status = 'approved' ORDER BY 'id'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <th scope="row"><?php echo $row['name']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['faculty']; ?></td>
      <td><?php echo $row['class']; ?></td>
      <td><?php echo $row['major_sub']; ?></td>
      <td><?php echo $row['sem']; ?></td>
      <td><?php echo $row['bk']; ?></td>
      <td><?php echo $row['sub1']; ?></td>
      <td><?php echo $row['sub2']; ?></td>
      <td><?php echo $row['sub3']; ?></td>
      <td><?php echo $row['sub4']; ?></td>
      <td><?php echo $row['sub5']; ?></td>
      <td><?php echo $row['sub6']; ?></td>
      <td><?php echo $row['sub7']; ?></td>
      <td><?php echo $row['sub8']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>