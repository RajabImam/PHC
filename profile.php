<?php include 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>
<?php

if(!isset($_SESSION['email'])) {
 
     header("Location: login.php");

}
?>

<div class="container">
           
            <hr>
<div class="col-lg-12">
  
  <div class="col-lg-6">
  <center><h4 class="text-success">PROFILE INFORMATION</h4></center>
  <ul class="list-group">
  <?php
    $query = "SELECT * FROM users WHERE email = '".$_SESSION['email']."' ";
    $displayUser = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayUser))
    {
    $id       = $row['id'];
    $username = $row['username'];
    $surname = $row['surname'];
    $lastname = $row['lastname'];
    $email     = $row['email'];
    $image     = $row['image'];
    $role     = $row['role'];
    $regdate     = $row['regdate'];
    echo "<li class='list-group-item'>UserName: {$username}</li>";
    echo "<li class='list-group-item'>SurName: {$surname}</li>";
    echo "<li class='list-group-item'>Last Name: {$lastname}</li>";
    echo "<li class='list-group-item'>Email: {$email}</li>";
    echo "<li class='list-group-item'><img width='100' src='uploads/{$image}' alt='User Profile Picture'></li>";
    echo "<li class='list-group-item'>Role: {$role}</li>";
    echo "<li class='list-group-item'>Account Created On: {$regdate}</li>";
  }

  ?>
</ul>
    
  </div>  

 <!-- Dashboard Here-->
 <?php include 'includes/dashboard.php'; ?>


</div>

					
</div>

          
       
<?php include 'includes/footer.php'; ?>