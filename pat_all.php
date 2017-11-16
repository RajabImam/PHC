<?php include 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>
<?php include 'admin/includes/adminFunction.php'; ?>
<?php

if(!isset($_SESSION['email'])) {
 
     header("Location: login.php");

}
?>
<div class="container">
           
            <hr>
<div class="col-lg-12">

 <center><h3 class="text-primary"> VIEW ALL REGISTERED PATIENTS</h3></center>
            <hr>
      <h4 class="text-primary">PATIENT INFORMATION</h4>
  <div class="table-hover">
  <table class="table">
    <th>S/N</th>
    <th>SurName</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Phone No</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Blood Group</th>
    <th>Status</th>
    <th>Card No</th>
    <th>Next Of Kin</th>
    <th>Next Of Kin Contact</th>
    <th>Picture</th>
    <th>Reg Date</th>
    <?php
      displayPatients1();
    ?>

    </table>
    </div>


	
</div>

</div>

          
       
<?php include 'includes/footer.php'; ?>