<?php //include '../includes/connection.php'; ?>
<?php include '../includes/login.php'; ?>
<?php include 'includes/adminFunction.php'; ?>
<?php include 'header.html'; ?>

<div class="container">
 <h5 class="text-primary">Welcome: <?php echo $_SESSION['surname']; ?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>
          
            <hr>

  
<div class="col-lg-12">
   		
	<div class="col-lg-6">
  <center><h4 class="text-primary">PATIENT TREATMENT/PRESCRIPTION ON BIRTH CONTROL</h4></center>
  <form class="form-horizontal" action="#" method="post">
  <?php
            
    prescription();
   ?>
  <div class="form-group">
  <label class="control-label col-sm-4">Card No</label>
  <div class="col-sm-6">
     <input name="cardno" type="text" class="form-control" placeholder="ENTER PATIENT CARD NO">
  </div>
 </div> 



  <div class="form-group">
  <label class="control-label col-sm-4">Diagnosis</label>
  <div class="col-sm-6">
      <textarea class="form-control" rows="5" name="diagnosis" id="diagnosis" required></textarea>
  </div>
 </div>

 <div class="form-group">
  <label class="control-label col-sm-4" for="method">Select Method of Birth Control:</label>
  <div class="col-sm-6">
  <select class="form-control" name="method" id="method">
    <option value="Noristherant">Noristherant</option>
    <option value="Depo Proven">Depo Proven</option>
    <option value="Implanon">Implanon</option>
    <option value="Jardell">Jardell</option>
    <option value="Progesterone">Progesterone</option>
    <option value="Microgyron Combined">Microgyron Combined</option>
    <option value="COC">COC</option>
    <option value="Cream">Cream</option>
    <option value="Condom">Condom</option>
    <option value="Withdrawal">Withdrawal</option>

  </select>
  </div>
</div> 

 <div class="form-group">
  <label class="control-label col-sm-4">Instructions</label>
  <div class="col-sm-6">
      <textarea class="form-control" rows="5" name="instruction" id="instruction" required></textarea>
  </div>
 </div>
 
<div class="form-group">
  <label class="control-label col-sm-4">Doctor Name</label>
  <div class="col-sm-6">
     <input name="doctor" type="text" class="form-control" placeholder="DOCTOR NAME">
  </div>
 </div>


  <button  class="btn btn-primary center-block" name="prescription" type="submit">Prescribe Method of Birth Control</button>
  </form>
		
	</div>	

	<div class="col-lg-6">
	<center><h4 class="text-primary">VIEW TREATMENT/PRESCRIPTION </h4></center>

  <div class="table-hover">
  <table class="table">
    <th>Card No</th>
    <th>Diagnosis</th>
    <th>Method</th>
    <th>Instruction</th>
    <th>Doctor Name</th>
    <th>Date</th>
    <th>Update</th>
    <th>Delete</th>
    
      <?php
      
         displayPatientPrescription();     
    ?>
<?php
        deletePrescription();
      ?>
    
    </table>
    </div>
			
		
	</div>	


	</div>

  

                    


					

 
					
            </div>


<?php include 'footer.html'; ?>