<?php include "../includes/connection.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php

if(!isset($_SESSION['email'])) {
 
     header("Location: ../index.php");

}
?>
<?php include 'header.html'; ?>

<div class="container">
  <h5 class="text-primary">Welcome: <?php echo $_SESSION['surname']; ?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>         
            <hr>

    <h4>Admin Panel</h4> 
    <div class="row">

               <div class="col-md-3">
    <a href="patient.php" class="thumbnail">
      <img src="../images/icon.png" style="width:160px; min-height:160px;" alt="">
      <center>PATIENTS</center> 
    </a>
  </div>
  <div class="col-md-3">
    <a href="appointment.php" class="thumbnail">
       <img src="../images/doc.png" style="width:160px; min-height:160px;" alt="">
       <center>APPOINTMENTS</center>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#" class="thumbnail">
       <img src="../images/search.png" style="width:160px; min-height:160px;" alt="">
       <center>SEARCH</center>
    </a>
  </div>
  <div class="col-md-3">
    <a href="prescription.php" class="thumbnail">
       <img src="../images/service.png" style="width:160px; min-height:160px;" alt="">
      <center>PRESCRIPTION</center>
    </a>
  </div>

 
              </div>



   	<div class="col-lg-12">
   	<div class="col-lg-6">
		<div class="row">
   		<ul class="list-group">
  			<li class="list-group-item list-group-item-info"><?php echo $_SESSION['username']; ?> <a class="pull-right btn btn-danger" href="includes/logout.php"> Logout </a></li>
  						
		</ul>

   	</div>
	</div>	

	<div class="col-lg-6">
		<div class="row">
		<div class="row">
   		<ul class="list-group">
  			<li class="list-group-item list-group-item-success">PRIMARY HEALTH CARE</li>
  			<li class="list-group-item list-group-item-info">INFORMATION MANAGEMENT SYSTEM</li>
  			<li class="list-group-item list-group-item-warning">ADMINISTRATIVE</li>
  			<li class="list-group-item list-group-item-danger">ACCESS AREA</li>
		</ul>

   	</div>
			
		</div>
	</div>	


	</div>

  

                    


					

 
					
            </div>


<?php include 'footer.html'; ?>