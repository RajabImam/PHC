<?php include "connection.php"; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
	 $username = $_POST['username'];
	 $password = $_POST['pwd'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);


$query = "SELECT * FROM users WHERE username = '{$username}' ";
$select_user_query = mysqli_query($connection,$query);

if (!$select_user_query) {
	die("QUERY FAILED" .mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query)) {
	
	$id = $row['id'];
	$user_name = $row['username'];
	$user_email = $row['email'];
	$user_surname = $row['surname'];
	$user_lastname = $row['lastname'];
	$user_password = $row['password'];
	$user_image = $row['image'];
	$user_role = $row['role'];

}

$password = crypt($password, $user_password);

if ($username !== $user_name && $password !== $user_password) {
	
	header("Location: ../error.php ");

} else if ($username == $user_name && $password == $user_password && $user_role == 'receptionist') {

	$_SESSION['email'] = $user_email;
	$_SESSION['username'] = $user_name;
	$_SESSION['role'] = $user_role;
	$_SESSION['surname'] = $user_surname;
	$_SESSION['lastname'] = $user_lastname;

	header("Location: ../profile.php");

} else if ($username == $user_name && $password == $user_password && $user_role == 'admin'){

	$_SESSION['email'] = $user_email;
	$_SESSION['username'] = $user_name;
	$_SESSION['role'] = $user_role;
	$_SESSION['surname'] = $user_surname;
	$_SESSION['lastname'] = $user_lastname;
	$_SESSION['image'] = $user_image;

	header("Location: ../admin");
} else {

	header("Location: ../error.php");
}




}





?>