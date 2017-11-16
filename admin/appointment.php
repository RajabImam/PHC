<?php //include '../includes/connection.php'; ?>
<?php include '../includes/login.php'; ?>
<?php include 'includes/adminFunction.php'; ?>
<?php include 'header.html'; ?>

<div class="container">
 <h5 class="text-primary">Welcome: <?php echo $_SESSION['surname']; ?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>
          
            <hr>

  
<div class="col-lg-12">
   		
	<div class="col-lg-6">
  <center><h4 class="text-primary">BOOK PATIENT APPOINTMENT</h4></center>
  <form class="form-horizontal" action="#" method="post" >
  <?php
   appointment();
   ?>
  <div class="form-group">
  <label class="control-label col-sm-4">Card No</label>
  <div class="col-sm-6">
     <input name="cardno" type="text" class="form-control" placeholder="Card No">
  </div>
 </div> 



  <div class="form-group">
  <label class="control-label col-sm-4">Appointment Date</label>
  <div class="col-sm-6">
      <input name="date" type="date" class="form-control" placeholder="Appointment Date">
  </div>
 </div>

  <button  class="btn btn-primary center-block" name="appointment" type="submit">Book Appointment</button>
  </form>
		
	</div>	

	<div class="col-lg-6">
	<center><h4 class="text-primary">VIEW APPOINTMENTS</h4></center>

   <div class="table-hover">
  <table class="table">
    <th>Card No</th>
    <th>Date of Appointment</th>
    <th>Last Visit</th>
    <th>Update</th>
    <th>Delete</th>
    
      <?php
      displayPatientAppointment();
             
      ?>

      <?php
      deleteAppointment();
      ?>
    </table>
    </div>
			
		<?php
      if (isset($_GET['edit'])) {
                           $id = $_GET['edit'];

                           
                           include "update_appointment.php";
          }

    ?>
	</div>	



	</div>

  

                    


					

 
					
            </div>


<?php include 'footer.html'; ?>