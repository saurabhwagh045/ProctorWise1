<?php

include 'direction/_dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
</head>
<body>
    
<div class="center">
    <h1>user register.</h1>

<table id = "users">
    <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Email Address</th>
          <th>Action</th>
</tr>

<?php
        $query = "SELECT * FROM users WHERE status = 'pending' ORDER BY id ASC";
         $result = mysqli_query($con,$query);
         while($row = mysqli_fetch_array($result)){

         
?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['email'];?></td>
    <td>
           <form action = "admin-approval.php" method = "POST">
            <input type = "hidden" name = "id" value = "<?php echo $row['id'];?>"/>
            <input type = "submit" name = "approve" value = "<?php echo $row['id'];?>"/>
            <input type = "cancel" name = "deny" value = "<?php echo $row['id'];?>"/>

         </td>
</table>
<?php

         }
         ?>

</div>


<?php
if(isset($_POST['approve'])){
    $id = $_POST['id'];

    $select = "UPDATE users SET status = 'approved' WHERE id = '$id'";
    $result = mysqli_query($con,$select);

   
    echo 'alert("User approved!")';
    header("location: admin-approval.php");
   
}

if(isset($_POST['deny'])){
    $id = $_POST['id'];

    $select = "DELETE FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($con,$select);

   
    echo 'alert("User Denied!")';
    header("location: admin-approval.php");
}
    
   




?>

</body>
</html>