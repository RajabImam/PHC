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
  <center><h4 class="text-primary">SEARCH FOR PATIENT RECORD</h4></center>
    
                  <?php 
                    
                  ?>
                <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-12 form-group">
                  <label class="control-label">Enter Patient Card No</label>
                  <input type="text" name="search" class="form-control" placeholder="Type the Patient Card No" required>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="submit" type="submit">View Patient Records >></button>

                  </div>
                </div>
              </form>

      <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

            $query = "SELECT * FROM patient WHERE cardno LIKE '%$search%' ";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
                # code...
                die("Query Failed " . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);
            if ($count == 0) {
                # code...
                echo "<h3 class='text-danger'>No such Record in our Database</h3>";
            }else {
               
             while ($row = mysqli_fetch_assoc($search_query)) {
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
                    $image = $row['image'];
                    $regdate = $row['regdate'];

                    echo "*****************************************************************************************";
                    echo "<form method='post' action='print.php' enctype='multipart/form-data'>
                    <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <img width='100' name='image' src='patient/{$image}' alt='Patient Picture'>
                  </div>
                </div>
                <div class='form-row'>
                  <div class='col-xs-6 form-group'>
                  <label class='control-label'>Sur Name</label>
                  <input type='text' name='surname' class='form-control' value='{$surname}'  required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-6 form-group'>
                  <label class='control-label'>Last Name</label>
                  <input type='text' name='lastname' class='form-control' value='{$lastname}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-6 form-group'>
                  <label class='control-label'>Address</label>
                  <textarea class='form-control' rows='5' name='address' id='address' value='{$address}' required>{$address}</textarea>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-6 form-group'>
                  <label class='control-label'>Status</label>
                  <textarea class='form-control' rows='5' name='status' id='status' value='{$status}' required>{$status}</textarea>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Phone No</label>
                  <input type='number' name='phone' class='form-control' value='{$phone}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Card No</label>
                  <input type='text' name='cardno' class='form-control' value='{$cardno}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Gender</label>
                  <input type='text' name='gender' class='form-control' value='{$gender}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Age</label>
                  <input type='text' name='age' class='form-control' value='{$age}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Blood Group</label>
                  <input type='text' name='bloodgroup' class='form-control' value='{$bloodgroup}' required>
                  </div>
                </div>

               <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Next Of Kin</label>
                  <input type='text' name='nextofkin' class='form-control' value='{$nextofkin}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-4 form-group'>
                  <label class='control-label'>Next Of Kin Contact</label>
                  <input type='text' name='nextofkincontact' class='form-control' value='{$nextofkincontact}' required>
                  </div>
                </div>

                <div class='form-row'>
                  <div class='col-xs-12 form-group'>
                  <textarea class='form-control' rows='5' name='comment' id='comment' placeholder='Add Comment/Advice' required>Comments/Advice</textarea>
                  </div>
                </div>
                

                <div class='form-row'>
                  <div class='col-md-12 form-group'>
                  
                  <button class='form-control btn btn-primary' name='print' type='submit'>Print Record >></button>

                  </div>
                </div>
                

              </form>";


            }
}
}

      ?>
    
  </div>  
<div class="col-lg-10">
<center><h4 class="text-primary">SEARCH FOR PATIENT APPOINTMENT</h4></center>

 <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-12 form-group">
                  <label class="control-label">Enter Patient Card No</label>
                  <input type="text" name="appSearch" class="form-control" placeholder="Type the Patient Card No e.g A40 e.t.c" required>
                  </div>
                </div>

                
                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="appointment" type="submit">View Patient Appointment >></button>

                  </div>
                </div>

  </form>

  <?php

            if (isset($_POST['appointment'])) {
                $search = $_POST['appSearch'];

            $query = "SELECT * FROM appointment WHERE cardno LIKE '%$search%' ";
            $search_query = mysqli_query($connection, $query);

            

            if (!$search_query) {
                # code...
                die("Query Failed " . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);
            if ($count == 0) {
                # code...
                echo "<h3 class='text-danger'>No such Record in our Database</h3>";
            }else {

               
             while ($row = mysqli_fetch_assoc($search_query)) {
                    $cardno = $row['cardno'];
                    $date = $row['dateofappointment'];

                    echo "<center>";
                    echo "*****************************************************************************************";
                    echo "<p>Card No: {$cardno}</p>";
                    echo "<p>Date: {$date}</p>";

                  $query2 = "SELECT * FROM patient WHERE cardno = '".$search."' ";
            $search_query2 = mysqli_query($connection, $query2);
                    

            while ($row2 = mysqli_fetch_assoc($search_query2)) {
                    $surname = $row2['surname'];
                    $lastname = $row2['lastname'];
                    $gender = $row2['gender'];
                    $age = $row2['age'];

                    echo "<p>Sur Name: {$surname}</p>";
                    echo "<p>Last Name: {$lastname}</p>";
                    echo "<p>Gender: {$gender}</p>";
                    echo "<p>Age: {$age}</p>";
                    echo "</center>";


}     

}

         
      }
    }

      ?>
  
</div>

<div class="col-lg-10">
<center><h4 class="text-primary">SEARCH FOR PATIENT PRESCRIPTION</h4></center>

 <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-12 form-group">
                  <label class="control-label">Enter Patient Card No</label>
                  <input type="text" name="preSearch" class="form-control" placeholder="Type the Patient Card No e.g A40 e.t.c" required>
                  </div>
                </div>

                
                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="prescription" type="submit">View Patient Prescription >></button>

                  </div>
                </div>

              </form>

    <?php

            if (isset($_POST['prescription'])) {
                $search = $_POST['preSearch'];

            $query = "SELECT * FROM prescription WHERE cardno LIKE '%$search%' ";
            $search_query = mysqli_query($connection, $query);

            

            if (!$search_query) {
                # code...
                die("Query Failed " . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);
            if ($count == 0) {
                # code...
                echo "<h3 class='text-danger'>No such Record in our Database</h3>";
            }else {

               
             while ($row = mysqli_fetch_assoc($search_query)) {
                    $cardno = $row['cardno'];
                    $diagnosis = $row['diagnosis'];
                    $method = $row['method'];
                    $instruction = $row['instructions'];
                    $dateofprescription = $row['dateofprescription'];

                    echo "<center>";
                    echo "*****************************************************************************************";
                    echo "<p>Card No: {$cardno}</p>";
                    echo "<p>Diagnosis: {$diagnosis}</p>";
                    echo "<p>Treatment Type: {$method}</p>";
                    echo "<p>Instruction: {$instruction}</p>";
                    echo "<p>Date of Prescription: {$dateofprescription}</p>";
     
                    echo "</center>";
}

         
      }
    }

      ?>
  
</div>

<!--Dashboard-->
  <?php //include 'includes/dashboard.php'; ?>

</div>

          
</div>

          
       
<?php include 'includes/footer.php'; ?>