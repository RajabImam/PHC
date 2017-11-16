<?php include '../includes/connection.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php

if(!isset($_SESSION['email'])) {
 
     header("Location: ../index.php");

}
?>
<?php include 'includes/adminFunction.php'; ?>
<?php include 'header.html'; ?>

<div class="container">
<h5 class="text-primary">Welcome: <?php echo $_SESSION['surname']; ?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>

            <hr>

  
<div class="col-lg-12">


  <center><h3 class="text-primary">REGISTER NEW PATIENT</h3></center>
        <hr>
<h4 class="text-primary">ADD NEW PATIENT</h4>
        <div class="table-responsive">
                  
                  <?php 
                    addPatient();
                  ?>
                <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Sur Name</label>
                  <input type="text" name="surname" class="form-control" placeholder="SurName" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Other Names</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Other Names" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="5" name="address" id="address" required></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Status/Problem</label>
                  <!--<input type="text" name="address" class="form-control" placeholder="Address" required>-->
                  <textarea class="form-control" rows="5" name="status" id="status" required></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Phone Number</label>
                  <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                  </div>
                </div>

                <?php
                  //$string = 'PHC001';
                  //$string = $row['cardno'];
                  //echo $string;

                  $query = "SELECT * FROM patient";
                  $displayPatients = mysqli_query($connection,$query);
                  while ($row = mysqli_fetch_assoc($displayPatients))
                  {
                    $id       = $row['id'];
                    $string = $row['cardno'];
                  }


                  $regex = '/^\w+(\d+)$/';
                  preg_match($regex, $string, $matches);
                  $last_used_number = $matches[1];
                  $new_number = $last_used_number + 1;
                  $new_string = 'PHC' . (str_pad($new_number, 3, 0, STR_PAD_LEFT));
                  //echo $new_string;

                ?>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Card No</label>
                  <input type="text" name="cardno" class="form-control" value="<?php echo $new_string; ?>" placeholder="Card No" required readonly>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Age</label>
                  <input type="number" class="form-control" name="age" placeholder="Age" size="2" required>
                  </div>
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Gender</label>
                   <select class="form-control" name="gender" id="gender">
                      <option value="male">MALE</option>
                      <option value="female">FEMALE</option>
                  </select>
                  </div>
                   <div class="col-xs-4 form-group">
                  <label class="control-label">Blood Group</label>
                  <select class="form-control" name="bloodgroup" id="bloodgroup">
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                  </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Name of Next Of Kin</label>
                  <input type="text" name="nextofkin" class="form-control" placeholder="Name Of Next Of Kin" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Next Of Kin Contact No</label>
                  <input type="number" name="nextofkincontact" class="form-control" placeholder="Next Of Kin Contact No" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Upload Patient Image</label>
                  <input type="file" name="patientImage" class="form-control" placeholder="Patient Image" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="addPatient" type="submit">Add Patient >></button>

                  </div>
                </div>

              </form>
  
    </div>
      
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
    <th>Update</th>
    <th>Delete</th>
    <?php
      displayPatients();
    ?>

    </table>
    </div>

  <?php
      if (isset($_GET['edit'])) {
                           $id = $_GET['edit'];

                           
                           include "update_patient.php";
          }

    ?>

     
  </div>



</div>


<?php include 'footer.html'; ?>