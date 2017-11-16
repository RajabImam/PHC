<?php include '../includes/login.php'; ?>
<?php include 'includes/adminFunction.php'; ?>
<?php include 'header.html'; ?>
<script type="text/javascript">
  function printlayer(layer)
  {
    var generator = window.open(",'name,");
    var layertext = document.getElementById(layer);
    generator.document.write(layertext.innerHTML.replace("Print Me"));
    generator.document.close();
    generator.print();
    generator.close();
  }
</script>
<script type="text/javascript">
  function printlayer1(layer)
  {
    var generator = window.open(",'name1,");
    var layertext = document.getElementById(layer);
    generator.document.write(layertext.innerHTML.replace("Print Me"));
    generator.document.close();
    generator.print();
    generator.close();
  }
</script>


<div class="container">
 <h5 class="text-primary">Welcome: <?php if(isset($_SESSION['surname'])){ echo $_SESSION['surname']; }?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>
          
            <hr>

  
<div class="col-lg-12">
   		
	<div class="col-lg-6">
  <center><h4 class="text-primary">PRINT PATIENT APPOINTMENT</h4></center>
  <form class="form-horizontal" action="#" method="post" >
  <?php
   

   ?>
  <div class="form-group">
  <label class="control-label col-sm-4">Card No</label>
  <div class="col-sm-6">
     <input name="cardno" type="text" class="form-control" placeholder="Card No">
  </div>
 </div> 

  <button  class="btn btn-primary center-block" name="searchAppointment" type="submit">Search Patient</button>
  </form>

  <?php

            if (isset($_POST['searchAppointment'])) {
                $search = $_POST['cardno'];

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
                    $cardno1 = $row['cardno'];
                    $dateofappointment = $row['dateofappointment'];
                   
                    
                  }
              }
            }
        ?>
<br/>
  <div class="panel panel-primary" id="div-id-name1">
  <div class="panel-heading">
  <center><h3 class="panel-title">YOUR APPOINTMENT</h3></center>
  </div>
  <div class="panel-body">
		 <div class="table-hover">
  <table class="table">
  <tr>
  <td><strong>Card No:</strong></td>
  <td><?php if (isset($cardno1)) { echo $cardno1; }?></td>
  </tr>
  <tr>
  <td><strong>Date:</strong></td>
  <td><?php if (isset($dateofappointment)) { echo $dateofappointment; }?></td>
  </tr>
  <tr>
  <td><strong>Sign:</strong></td>
  <td></td>
  </tr>
    <?php
      
    ?>
    
    </table>
    <h4 class="text-danger">Note: You are to come along with this sheet.</h4>
    
    </div>
	</div>	
  </div>
<center><a id="print1" onclick="javascript:printlayer1('div-id-name1')" class="btn btn-primary" href="">PRINT</a></center>

  </div>

	<div class="col-lg-6">
	<center><h4 class="text-primary">PRINT PATIENT PRESCRIPTION</h4></center>

   <form class="form-horizontal" action="#" method="post" >
   <div class="form-group">
  <label class="control-label col-sm-4">Card No</label>
  <div class="col-sm-6">
     <input name="cardno" type="text" class="form-control" placeholder="Card No">
  </div>
 </div> 

  <button  class="btn btn-primary center-block" name="searchPrescription" type="submit">Search Patient</button>
  </form>
			<?php

            if (isset($_POST['searchPrescription'])) {
                $search = $_POST['cardno'];

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
                    $dateofprescription = $row['dateofprescription'];
                    
                  }
              }
            }
        ?>

        <br/>
  <div class="panel panel-primary" id="div-id-name">
  <div class="panel-heading">
  <center><h3 class="panel-title">PRIMARY HEALTH CARE - PRESCRIPTION SHEET</h3></center>
  </div>
  <div class="panel-body">
  <h4><strong>Address:</strong> No 14, Karu Site, Abuja Nigeria</h4>
  <h4><strong>Phone:</strong> 07060679578</h4>
  <div class="table-hover">
  <table class="table">

  <tr>
  <td><strong>Card No:</strong></td>
  <td><?php if (isset($cardno)) { echo $cardno; }?></td>
  </tr>
  <tr>
  <td><strong>Diagnosis:</strong></td>
  <td><?php if (isset($diagnosis)) { echo $diagnosis; }?></td>
  </tr>
  <tr>
  <td><strong>Type/Method of Treatment:</strong></td>
  <td><?php if (isset($method)) { echo $method; }?></td>
  </tr>
  <tr>
  <td><strong>Remark/Medication Instructions:</strong></td>
  <td><?php if (isset($instructions)) { echo $instructions; }?></td>
  </tr>
  <tr>
  <td><strong>Prescribed By:</strong></td>
  <td><?php if (isset($docname)) { echo $docname; }?></td>
  </tr>
  <tr>
  <td><strong>Date of Prescription:</strong></td>
  <td><?php if (isset($dateofprescription)) { echo $dateofprescription; }?></td>
  </tr>
  <tr>
  <td><strong>Additional Information:</strong></td>
  <td></td>
  </tr>
  <tr>
  <td><strong>Sign:</strong></td>
  <td></td>
  </tr>
    <?php
      
    ?>
    
    </table>
    <h4 class="text-danger">Note: Adhere to the instructions on this sheet and report any abnormal feelings immediately to the hospital.</h4>
    
    </div>
  </div>  
  </div>

		<center><a href="#" id="print" onclick="javascript:printlayer('div-id-name')" class="btn btn-primary">PRINT</a></center>

	</div>	


	</div>

  

                    


					

 
					
            </div>


<?php include 'footer.html'; ?>