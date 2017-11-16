<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$query = "SELECT * FROM patient WHERE id = $id";
    $select_patient = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_patient))
    {
    $id = $row['id'];
    $surname = $row['surname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $age = $row['age'];
    $bloodgroup = $row['bloodgroup'];
    $status = $row['status'];
    $cardno = $row['cardno'];
    $nextofkin = $row['nextofkin'];
    $nextofkincontact = $row['nextofkincontact'];
    $image       = $row['image'];
   	$regdate = $row['regdate'];

}

if (isset($_POST['updatePatient'])) {
  
  $surname = $_POST['surname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $bloodgroup = $_POST['bloodgroup'];
  $status = $_POST['status'];
  $cardno = $_POST['cardno'];
  $nextofkin = $_POST['nextofkin'];
  $nextofkincontact = $_POST['nextofkincontact'];
  
  $image       = $_FILES['image'] ['name'];
  $user_image_temp = $_FILES['image'] ['tmp_name'];

  move_uploaded_file($user_image_temp, "../patient/$image");
  //$regdate = $_POST['regdate'];
  
  $query = "UPDATE patient SET ";
    $query .= "surname = '{$surname}', ";
    $query .= "lastname = '{$lastname}', ";
    $query .= "address = '{$address}', ";
    $query .= "phone = '{$phone}', ";
    $query .= "gender = '{$gender}', ";
    $query .= "age = '{$age}', ";
    $query .= "bloodgroup = '{$bloodgroup}', ";
    $query .= "status = '{$status}', ";
    $query .= "cardno = '{$cardno}', ";
    $query .= "nextofkin = '{$nextofkin}', ";
    $query .= "nextofkincontact = '{$nextofkincontact}', ";
    $query .= "image = '{$image}', ";
    $query .= "regdate = now() ";
     $query .= "WHERE id = '{$id}' ";
   

    $update_patient = mysqli_query($connection,$query);

    confirmQuery($update_patient);

    echo "<p class='bg-success'>Patient Record Updated.</p>";

}


?>

    <div class="table-responsive">

    <h3 class="text-primary">UPDATE PATIENT RECORD</h3>
    <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Sur Name</label>
                  <input type="text" name="surname" class="form-control" value="<?php if (isset($surname)) { echo $surname; }?>" placeholder="SurName" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Other Names</label>
                  <input type="text" name="lastname" class="form-control" value="<?php if (isset($lastname)) { echo $lastname; }?>" placeholder="Other Names" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="5" name="address" id="address" required><?php if (isset($address)) { echo $address; }?></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-6 form-group">
                  <label class="control-label">Status/Problem</label>
                  <!--<input type="text" name="address" class="form-control" placeholder="Address" required>-->
                  <textarea class="form-control" rows="5" name="status" id="status" required><?php if (isset($status)) { echo $status; }?></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Phone Number</label>
                  <input type="number" name="phone" class="form-control" value="<?php if (isset($phone)) { echo $phone; }?>" placeholder="Phone Number" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Card No</label>
                  <input type="text" name="cardno" class="form-control" value="<?php if (isset($cardno)) { echo $cardno; }?>" placeholder="Card No" required readonly>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Age</label>
                  <input type="number" class="form-control" name="age" value="<?php if (isset($age)) { echo $age; }?>" placeholder="Age" size="2" required>
                  </div>
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Gender</label>
                   <input type="text" name="gender" class="form-control" value="<?php if (isset($gender)) { echo $gender; }?>" placeholder="Gender" required readonly>
                  </div>
                   <div class="col-xs-4 form-group">
                  <label class="control-label">Blood Group</label>
                  <input type="text" name="bloodgroup" class="form-control" value="<?php if (isset($bloodgroup)) { echo $bloodgroup; }?>" placeholder="Blood Group" required readonly>
                  
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Name of Next Of Kin</label>
                  <input type="text" name="nextofkin" class="form-control" value="<?php if (isset($nextofkin)) { echo $nextofkin; }?>" placeholder="Name Of Next Of Kin" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Next Of Kin Contact No</label>
                  <input type="number" name="nextofkincontact" class="form-control" value="<?php if (isset($nextofkincontact)) { echo $nextofkincontact; }?>" placeholder="Next Of Kin Contact No" required>
                  </div>
                </div>

                
                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <?php
                echo "<td><img width='100' src='../patient/{$image}' alt='Patient Picture'></td>";
                ?>
                  <input type="file" name="image" class="form-control" placeholder="" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-xs-4 form-group">
                  <label class="control-label">Last Modified On</label>
                  <input type="text" name="regdate" class="form-control" value="<?php if (isset($regdate)) { echo $regdate; }?>" placeholder="" required readonly>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="updatePatient" type="submit">Update Patient >></button>

                  </div>
                </div>

              </form>
 
    </div>


