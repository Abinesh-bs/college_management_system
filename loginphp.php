<?php

include('db.php');
session_start();

	

	if(isset($_POST['submit'])){

		$email = mysqli_real_escape_string($con, $_POST['email']);
		$pass = mysqli_real_escape_string($con, ($_POST['password']));
	 
		$select = mysqli_query($con, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
	 
		if(mysqli_num_rows($select) > 0){
		   $row = mysqli_fetch_assoc($select);
		   $_SESSION['user_id'] = $row['id'];
		   header('location:dashboard.php');
		}else{
		   $message[] = 'incorrect email or password!';
		}
	 
	 }
		
?>