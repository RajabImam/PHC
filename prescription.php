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
  
  <div class="col-lg-10">
  <center><h4 class="text-info">VIEW ALL PATIENTS PRESCRIPTION</h4></center>
    
  <div class="table-hover">
  <table class="table">
    <th>Card No</th>
    <th>Diagnosis</th>
    <th>Method</th>
    <th>Instruction</th>
    <th>Doctor Name</th>
    <th>Date</th>
    
      <?php
      
         displayPatientPrescription1();     
      ?>
    </table>
    </div>           
                   
  </div>  
<!--Dashboard-->
  <?php //include 'includes/dashboard.php'; ?>


</div>

          
</div>

          
       
<?php include 'includes/footer.php'; ?>