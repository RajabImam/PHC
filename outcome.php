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

       <div class="well" style="display: block; overflow: hidden; margin: 20px auto 0 auto; padding: 10px 5px 5px 10px; width: 96%; max-width:940px; min-width: 240px; border: 1px solid #ccc; background-color: #fff; box-shadow: 2px 2px 10px 2px #dddddd; -webkit-box-shadow: 0px 0px 5px 0px #dddddd; line-height: 1.5em;">
                     <div class="row">
                    <div class="col-md-12">
        
     <!--Start first panel category-->      
	<div class="panel panel-primary">
  						<div class="panel-heading">
   						<h3 class="panel-title">PRIMARY HEALTH CARE INFORMATION SYSTEM</h3>
  						</div>
  						<div class="panel-body">

              <div class="row">
              	<form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-xs-12 form-group">
                  <label class="control-label">Enter Patient Card No</label>
                  <input type="text" name="search" class="form-control" placeholder="Type the Patient Card No" required>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-12 form-group">
                  
                  <button class="form-control btn btn-primary" name="submit" type="submit">Search >></button>

                  </div>
                </div>
              </form>
       
 
              </div>

              <div class="row">
              	  <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

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
                    $instructions = $row['instructions'];
                    $docname = $row['docname'];


                    echo "<ul class='list-group'>";
                    echo "<li class='list-group-item list-group-item'><strong>Doctor Name:</strong> <center><h4 class='text-info'>{$docname}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Treatment Type:</strong> <center><h4 class='text-info'>{$method}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Medication Instruction:</strong> <center><h4 class='text-info'>{$instructions}</h4></center></li>";

            $query2 = "SELECT * FROM patient WHERE cardno = '".$search."' ";
            $search_query2 = mysqli_query($connection, $query2);
                    

            while ($row2 = mysqli_fetch_assoc($search_query2)) {
                    $surname = $row2['surname'];
                    $lastname = $row2['lastname'];
                    $gender = $row2['gender'];
                    $age = $row2['age'];
                    $bloodgroup = $row2['bloodgroup'];
                    $nextofkin = $row2['nextofkin'];
                    $address = $row2['address'];
                    $phone = $row2['phone'];
                    $image = $row2['image'];


    				echo "<li class='list-group-item'><img width='100' src='patient/{$image}' alt='Patient'></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Patient Sur Name:</strong>  <center><h4 class='text-info'>{$surname}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Last Name:</strong> <center><h4 class='text-info'>{$lastname}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Gender:</strong> <center><h4 class='text-info'>{$gender}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Blood Group:</strong> <center><h4 class='text-info'>{$bloodgroup}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Age:</strong> <center><h4 class='text-info'>{$age}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Address:</strong> <center><h4 class='text-info'>{$address}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Phone:</strong> <center><h4 class='text-info'>{$phone}</h4></center></li>";
                    echo "<li class='list-group-item list-group-item'><strong>Next of Kin:</strong> <center><h4 class='text-info'>{$nextofkin}</h4></center></li>";
                    //echo "<li class='list-group-item list-group-item-success'>Additional Comments: <form> </form</li>";

    $query3 = "SELECT * FROM appointment WHERE cardno = '".$search."' ";
            $search_query3 = mysqli_query($connection, $query3);
                    

            while ($row3 = mysqli_fetch_assoc($search_query3)) {
                    $dateofappointment = $row3['dateofappointment'];
                    
                    echo "<li class='list-group-item list-group-item'><strong>Date of Appointment:</strong> <center><h4 class='text-info'>{$dateofappointment}</h4></center></li>";
                    echo "</ul>";

               echo "<form method='post' action=''>
                
                <div class='form-row'>
                  <div class='col-md-12 form-group'>
                  
                  <button class='form-control btn btn-primary' name='submit' type='submit'>Print >></button>

                  </div>
                </div>
              </form>";


}     

}
}
         
      }
    }



      ?>
              </div>
<center><h4 class="text-danger"><a target="_blank" href="PDF.php">Download Blank Copy</a></h4> </center>
              </div>

</div>
</div>
<!--End first panel category-->

  

                    


					</div>

 
                </div>




</div>
          
       
<?php include 'includes/footer.php'; ?>