<?php

  function addUser(){
    global $connection;

  if (isset($_POST['addUser'])) {
  
  $username   = $_POST['username'];
  $password    = $_POST['password'];
  $surname   = $_POST['surname'];
  $lastname       = $_POST['lastname'];
  $email       = $_POST['email'];
  $image       = $_FILES['image'] ['name'];
  $user_image_temp = $_FILES['image'] ['tmp_name'];
  $role       = $_POST['role'];

   

  move_uploaded_file($user_image_temp, "../uploads/$image");

  if (!empty($username) && !empty($password) && !empty($surname) && !empty($lastname) && !empty($email) && !empty($image) 
    && !empty($role)) {
    
  $username   = mysqli_real_escape_string($connection,$username);
  $password    = mysqli_real_escape_string($connection,$password);
  $surname   = mysqli_real_escape_string($connection,$surname);
  $lastname   = mysqli_real_escape_string($connection,$lastname);
  $email   = mysqli_real_escape_string($connection,$email);
  $image   = mysqli_real_escape_string($connection,$image);
  $role   = mysqli_real_escape_string($connection,$role);

  $query = "SELECT randSalt FROM users";
  $select_randsalt_query = mysqli_query($connection, $query);

  if (!$select_randsalt_query) {
    die("Query Failed: " .mysqli_error($connection));
  }

    $row = mysqli_fetch_array($select_randsalt_query);
    
    $salt = $row['randSalt'];

    $password = crypt($password, $salt);

    $query = "INSERT INTO users (username, password, surname, lastname, email, image, role, regdate) ";
    $query .= "VALUES('{$username}', '{$password}', '{$surname}', '{$lastname}', '{$email}', '{$image}', '{$role}', now()) ";
    $addUser = mysqli_query($connection, $query);
    if (!$addUser) {
      
      die("Query Failed : " .mysqli_error($connection));
    }

   echo $message = "<p class='text-success'> New User Created </p>";


  } else {

   echo $message = "<p class='text-danger'> Fields cannot be empty </p>";
  


  }

} else {
  $message = "<p></p>";
}

}


  function displayUsers(){
    global $connection;
  $query = "SELECT * FROM users";
    $displayUser = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayUser))
    {
    $id       = $row['id'];
    $username = $row['username'];
    $surname = $row['surname'];
    $lastname = $row['lastname'];
    $email     = $row['email'];
    $image     = $row['image'];
    $role     = $row['role'];
    $regdate     = $row['regdate'];
    echo "<tr>";
    echo "<td>{$username}</td>";
    echo "<td>{$surname}</td>";
    echo "<td>{$lastname}</td>";
    echo "<td>{$email}</td>";
    echo "<td>{$role}</td>";
    echo "<td>{$regdate}</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='user.php?delete={$id}'>Delete</a></td>";
    echo "</tr>";
    }  

  }

  function addPatient(){
    global $connection;

  if (isset($_POST['addPatient'])) {
  
  $surname   = $_POST['surname'];
  $lastname    = $_POST['lastname'];
  $address   = $_POST['address'];
  $phone       = $_POST['phone'];
  $gender       = $_POST['gender'];
  $age       = $_POST['age'];
  $bloodgroup       = $_POST['bloodgroup'];
  $status       = $_POST['status'];
  $cardno       = $_POST['cardno'];
  $nextofkin       = $_POST['nextofkin'];
  $nextofkincontact       = $_POST['nextofkincontact'];
  $image       = $_FILES['patientImage'] ['name'];
  $user_image_temp = $_FILES['patientImage'] ['tmp_name'];
  

   

  move_uploaded_file($user_image_temp, "../patient/$image");

  if (!empty($surname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($gender) && !empty($age) 
    && !empty($bloodgroup) && !empty($status) && !empty($cardno) && !empty($nextofkin) && !empty($nextofkincontact) && !empty($image)) {
    
  $surname   = mysqli_real_escape_string($connection,$surname);
  $lastname    = mysqli_real_escape_string($connection,$lastname);
  $address   = mysqli_real_escape_string($connection,$address);
  $phone   = mysqli_real_escape_string($connection,$phone);
  $gender   = mysqli_real_escape_string($connection,$gender);
  $age   = mysqli_real_escape_string($connection,$age);
  $bloodgroup   = mysqli_real_escape_string($connection,$bloodgroup);
  $status   = mysqli_real_escape_string($connection,$status);
  $cardno   = mysqli_real_escape_string($connection,$cardno);
  $nextofkin   = mysqli_real_escape_string($connection,$nextofkin);
  $nextofkincontact   = mysqli_real_escape_string($connection,$nextofkincontact);
  $image   = mysqli_real_escape_string($connection,$image);

    $query = "INSERT INTO patient (surname, lastname, address, phone, gender, age, bloodgroup, status, cardno, nextofkin, nextofkincontact, image, regdate) ";
    $query .= "VALUES('{$surname}', '{$lastname}', '{$address}', '{$phone}', '{$gender}', '{$age}', '{$bloodgroup}', '{$status}', '{$cardno}', '{$nextofkin}', '{$nextofkincontact}', '{$image}', now()) ";
    $addPatient = mysqli_query($connection, $query);
    if (!$addPatient) {
      
      die("Query Failed : " .mysqli_error($connection));
    }

   echo $message = "<p class='text-success'> New Patient Record Created </p>";


  } else {

   echo $message = "<p class='text-danger'> Fields cannot be empty </p>";
  


  }

} else {
  $message = "<p></p>";
}

}

function addPatient2(){
    global $connection;

  if (isset($_POST['addPatient'])) {
  
  $surname   = $_POST['surname'];
  $lastname    = $_POST['lastname'];
  $address   = $_POST['address'];
  $phone       = $_POST['phone'];
  $gender       = $_POST['gender'];
  $age       = $_POST['age'];
  $bloodgroup       = $_POST['bloodgroup'];
  $status       = $_POST['status'];
  $cardno       = $_POST['cardno'];
  $nextofkin       = $_POST['nextofkin'];
  $nextofkincontact       = $_POST['nextofkincontact'];
  $image       = $_FILES['patientImage'] ['name'];
  $user_image_temp = $_FILES['patientImage'] ['tmp_name'];
  

  move_uploaded_file($user_image_temp, "patient/$image");

  if (!empty($surname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($gender) && !empty($age) 
    && !empty($bloodgroup) && !empty($status) && !empty($cardno) && !empty($nextofkin) && !empty($nextofkincontact) && !empty($image)) {
    
  $surname   = mysqli_real_escape_string($connection,$surname);
  $lastname    = mysqli_real_escape_string($connection,$lastname);
  $address   = mysqli_real_escape_string($connection,$address);
  $phone   = mysqli_real_escape_string($connection,$phone);
  $gender   = mysqli_real_escape_string($connection,$gender);
  $age   = mysqli_real_escape_string($connection,$age);
  $bloodgroup   = mysqli_real_escape_string($connection,$bloodgroup);
  $status   = mysqli_real_escape_string($connection,$status);
  $cardno   = mysqli_real_escape_string($connection,$cardno);
  $nextofkin   = mysqli_real_escape_string($connection,$nextofkin);
  $nextofkincontact   = mysqli_real_escape_string($connection,$nextofkincontact);
  $image   = mysqli_real_escape_string($connection,$image);

    $query = "INSERT INTO patient (surname, lastname, address, phone, gender, age, bloodgroup, status, cardno, nextofkin, nextofkincontact, image, regdate) ";
    $query .= "VALUES('{$surname}', '{$lastname}', '{$address}', '{$phone}', '{$gender}', '{$age}', '{$bloodgroup}', '{$status}', '{$cardno}', '{$nextofkin}', '{$nextofkincontact}', '{$image}', now()) ";
    $addPatient = mysqli_query($connection, $query);
    if (!$addPatient) {
      
      die("Query Failed : " .mysqli_error($connection));
    }

   echo $message = "<p class='text-success'> New Patient Record Created </p>";


  } else {

   echo $message = "<p class='text-danger'> Fields cannot be empty </p>";
  


  }

} else {
  $message = "<p></p>";
}

}

function displayPatients(){
    global $connection;
  $query = "SELECT * FROM patient";
    $displayPatients = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatients))
    {
    $id       = $row['id'];
    $surname = $row['surname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $phone     = $row['phone'];
    $gender     = $row['gender'];
    $age     = $row['age'];
    $bloodgroup     = $row['bloodgroup'];
    $status     = $row['status'];
    $cardno     = $row['cardno'];
    $nextofkin     = $row['nextofkin'];
    $nextofkincontact     = $row['nextofkincontact'];
    $image     = $row['image'];
    $regdate     = $row['regdate'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$surname}</td>";
    echo "<td>{$lastname}</td>";
    echo "<td>{$address}</td>";
    echo "<td>{$phone}</td>";
    echo "<td>{$gender}</td>";
    echo "<td>{$age}</td>";
    echo "<td>{$bloodgroup}</td>";
    echo "<td>{$status}</td>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$nextofkin}</td>";
    echo "<td>{$nextofkincontact}</td>";
    echo "<td><img width='100' src='../patient/{$image}' alt='Patient Picture'></td>";
    echo "<td>{$regdate}</td>";
    echo "<td><a href='patient.php?edit={$id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='patient.php?delete={$id}'>Delete</a></td>";
    echo "</tr>";
    }  

  }

  function displayPatients1(){
    global $connection;
  $query = "SELECT * FROM patient";
    $displayPatients = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatients))
    {
    $id       = $row['id'];
    $surname = $row['surname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $phone     = $row['phone'];
    $gender     = $row['gender'];
    $age     = $row['age'];
    $bloodgroup     = $row['bloodgroup'];
    $status     = $row['status'];
    $cardno     = $row['cardno'];
    $nextofkin     = $row['nextofkin'];
    $nextofkincontact     = $row['nextofkincontact'];
    $image     = $row['image'];
    $regdate     = $row['regdate'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$surname}</td>";
    echo "<td>{$lastname}</td>";
    echo "<td>{$address}</td>";
    echo "<td>{$phone}</td>";
    echo "<td>{$gender}</td>";
    echo "<td>{$age}</td>";
    echo "<td>{$bloodgroup}</td>";
    echo "<td>{$status}</td>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$nextofkin}</td>";
    echo "<td>{$nextofkincontact}</td>";
    echo "<td><img width='100' src='patient/{$image}' alt='Patient Picture'></td>";
    echo "<td>{$regdate}</td>";
    echo "</tr>";
    }  

  }

function confirmQuery($result){
  global $connection;
  if (!$result) {
    die("QUERY FAILED ." .mysqli_error($connection));
  }

}
  function prescription(){
    global $connection;

  if (isset($_POST['prescription'])) {
  
  $cardno   = $_POST['cardno'];
  $diagnosis    = $_POST['diagnosis'];
  $method   = $_POST['method'];
  $instruction       = $_POST['instruction'];
  $doctor       = $_POST['doctor'];


  if (!empty($cardno) && !empty($diagnosis) && !empty($method) && !empty($instruction) && !empty($doctor)) {
    
  $cardno   = mysqli_real_escape_string($connection,$cardno);
  $diagnosis    = mysqli_real_escape_string($connection,$diagnosis);
  $method   = mysqli_real_escape_string($connection,$method);
  $instruction   = mysqli_real_escape_string($connection,$instruction);
  $doctor   = mysqli_real_escape_string($connection,$doctor);

    $query = "INSERT INTO prescription (cardno, diagnosis, method, instructions, docname, dateofprescription) ";
    $query .= "VALUES('{$cardno}', '{$diagnosis}', '{$method}', '{$instruction}', '{$doctor}', now()) ";
    $prescription = mysqli_query($connection, $query);
    if (!$prescription) {
      
      die("Query Failed : " .mysqli_error($connection));
    }

   echo $message = "<p class='text-success'>Patient Prescription Record Created </p>";


  } else {

   echo $message = "<p class='text-danger'> Fields cannot be empty </p>";
  


  }

} else {
  $message = "<p></p>";
}

}

function appointment(){
    global $connection;

  if (isset($_POST['appointment'])) {
  
  $cardno   = $_POST['cardno'];
  $date    = $_POST['date'];


  if (!empty($cardno) && !empty($date)) {
    
  $cardno   = mysqli_real_escape_string($connection,$cardno);
  $date    = mysqli_real_escape_string($connection,$date);

    $query = "INSERT INTO appointment (cardno, dateofappointment, regdate) ";
    $query .= "VALUES('{$cardno}', '{$date}', now()) ";
    $appointment = mysqli_query($connection, $query);
    if (!$appointment) {
      
      die("Query Failed : " .mysqli_error($connection));
    }

   echo $message = "<p class='text-success'>Patient Appointment Booked Successfully </p>";


  } else {

   echo $message = "<p class='text-danger'> Fields cannot be empty </p>";
  


  }

} else {
  $message = "<p></p>";
}

}

function displayPatientPrescription(){
    global $connection;
  $query = "SELECT * FROM prescription";
    $displayPatientPrescription = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatientPrescription))
    {
    $id       = $row['id'];
    $cardno = $row['cardno'];
    $diagnosis = $row['diagnosis'];
    $method = $row['method'];
    $instruction     = $row['instructions'];
    $doctor     = $row['docname'];
    $date     = $row['dateofprescription'];
    echo "<tr>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$diagnosis}</td>";
    echo "<td>{$method}</td>";
    echo "<td>{$instruction}</td>";
    echo "<td>{$doctor}</td>";
    echo "<td>{$date}</td>";
    echo "<td><a href='prescription.php?edit={$id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='prescription.php?delete={$id}'>Delete</a></td>";
    echo "</tr>";
    }  

  }

function displayPatientAppointment(){
    global $connection;
  $query = "SELECT * FROM appointment";
    $displayPatientAppointment = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatientAppointment))
    {
    $id       = $row['id'];
    $cardno = $row['cardno'];
    $date = $row['dateofappointment'];
    $regdate = $row['regdate'];
    echo "<tr>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$regdate}</td>";
    echo "<td><a href='appointment.php?edit={$id}'>New</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='appointment.php?delete={$id}'>Delete</a></td>";    
    echo "</tr>";
    }  

  }
  

  function displayPatientPrescription1(){
    global $connection;
  $query = "SELECT * FROM prescription";
    $displayPatientPrescription = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatientPrescription))
    {
    $id       = $row['id'];
    $cardno = $row['cardno'];
    $diagnosis = $row['diagnosis'];
    $method = $row['method'];
    $instruction     = $row['instructions'];
    $doctor     = $row['docname'];
    $date     = $row['dateofprescription'];
    echo "<tr>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$diagnosis}</td>";
    echo "<td>{$method}</td>";
    echo "<td>{$instruction}</td>";
    echo "<td>{$doctor}</td>";
    echo "<td>{$date}</td>";
    echo "</tr>";
    }  

  }

function displayPatientAppointment1(){
    global $connection;
  $query = "SELECT * FROM appointment";
    $displayPatientAppointment = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($displayPatientAppointment))
    {
    $id       = $row['id'];
    $cardno = $row['cardno'];
    $date = $row['dateofappointment'];
    $regdate = $row['regdate'];
    echo "<tr>";
    echo "<td>{$cardno}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$regdate}</td>";
    echo "</tr>";
    }  

  }

  function deletePrescription(){
  global $connection;
  if (isset($_GET['delete'])) {
    #using super global get to get delete key set via the link
    $id = $_GET['delete'];
                                
    $query = "DELETE FROM prescription WHERE id = {$id} ";
    $delete_query = mysqli_query($connection,$query);
    //header("Location: prescription.php");
    }
}

function deleteAppointment(){
  global $connection;
  if (isset($_GET['delete'])) {
    #using super global get to get delete key set via the link
    $id = $_GET['delete'];
                                
    $query = "DELETE FROM appointment WHERE id = {$id} ";
    $delete_query = mysqli_query($connection,$query);
    //header("Location: appointment.php");
    }
}

function deleteUsers(){
  global $connection;
  if (isset($_GET['delete'])) {
    #using super global get to get delete key set via the link
    $id = $_GET['delete'];
                                
    $query = "DELETE FROM users WHERE id = {$id} ";
    $delete_query = mysqli_query($connection,$query);
    //header("Location: users.php");
    }
}

function deletePatient(){
  global $connection;
  if (isset($_GET['delete'])) {
    #using super global get to get delete key set via the link
    $id = $_GET['delete'];
                                
    $query = "DELETE FROM patient WHERE id = {$id} ";
    $delete_query = mysqli_query($connection,$query);
    //header("Location: patient.php");
    }
}
?>