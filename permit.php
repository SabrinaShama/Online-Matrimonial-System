<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo'); 
	$sql2 = "SELECT * FROM permission WHERE id = '".$_POST["id"]."'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql2));
	$user = $getID['username'];
	$email = $getID['email'];
	$pass = $getID['password'];
	
	$to      = $email;
	$subject = 'Registration Confirmation';
	$message = 'Dear User, Your Registration has been confirmed.' . PHP_EOL . ' Your Username: ' . $user;
	$headers = "From: wedlockmatrimony76@gmail.com" . "\r\n" .
				"CC: sabrinakhan.saama@gmail.com";
	mail($to, $subject, $message, $headers);
	
	$sql = "INSERT INTO registration(username, email, password) VALUES('$user', '$email', '$pass')";
	$sql3 = "DELETE FROM permission WHERE username='$user'";
	if(mysqli_query($db, $sql))  
	{  
		if(mysqli_query($db, $sql3)){
			echo 'Data Permitted';
		}  
	}  
?>