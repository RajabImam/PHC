<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$query = "SELECT * FROM appointment WHERE id = $id";
    $select_appointment = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_appointment))
    {
    $id = $row['id'];
    $cardno = $row['cardno'];
    $dateofappointment = $row['dateofappointment'];
   	$regdate = $row['regdate'];

}

if (isset($_POST['updateAppointment'])) {
  
  $cardno = $_POST['cardno'];
  $dateofappointment = $_POST['dateofappointment'];
  
  
  $query = "UPDATE appointment SET ";
    $query .= "cardno = '{$cardno}', ";
    $query .= "dateofappointment = '{$dateofappointment}', ";
    $query .= "regdate = now() ";
     $query .= "WHERE id = '{$id}' ";
   

    $update_appointment = mysqli_query($connection,$query);

    confirmQuery($update_appointment);

    echo "<p class='bg-success'>Patient New Appointment Booked.</p>";

}


?>

    <div class="table-hover">

    <h3 class="text-primary">BOOK NEW APPOINTMENT</h3>
    <form class="form-horizontal" method="post" action="">
        <div class="form-group">
  <label class="control-label col-sm-4">Card No</label>
  <div class="col-sm-6">
     <input name="cardno" type="text" class="form-control" value="<?php if (isset($cardno)) { echo $cardno; }?>" placeholder="Card No" required readonly>
  </div>
 </div> 



  <div class="form-group">
  <label class="control-label col-sm-4">Appointment Date</label>
  <div class="col-sm-6">
      <input name="date" type="date" class="form-control" value="<?php if (isset($dateofappointment)) { echo $dateofappointment; }?>" placeholder="Appointment Date" required>
  </div>
 </div>
<div class="form-group">
  <label class="control-label col-sm-4">Last Visitation</label>
  <div class="col-sm-6">
      <input name="date" type="text" class="form-control" value="<?php if (isset($regdate)) { echo $regdate; }?>" placeholder="" required readonly>
  </div>
 </div>

  <button  class="btn btn-primary center-block" name="appointment" type="submit">Book New Appointment</button>        

    </form>
 
    </div>


