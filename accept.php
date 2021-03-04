<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo'); 
	$sql = "SELECT * FROM interested WHERE id = '".$_POST["id"]."'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql));
	$person = $getID['interested_by'];
	$person2 = $getID['interested_in'];
	$personname = $getID['interested_by_user'];
	$personname2 = $getID['interested_in_user'];
	$sql5 = "SELECT reg_id FROM profile WHERE id = '$person'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql5));
	$reg = $getID['reg_id'];
	$sql6 = "SELECT reg_id FROM profile WHERE id = '$person2'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql6));
	$reg2 = $getID['reg_id'];
	$sql7 = "SELECT * FROM registration WHERE id = '$reg'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql7));
	$user = $getID['username'];
	$email = $getID['email'];
	$sql8 = "SELECT * FROM registration WHERE id = '$reg2'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql8));
	$user2 = $getID['username'];
	$email2 = $getID['email'];
	
	$to      = $email;
	$to2      = $email2;
	$subject = 'New Account Connected';
	$message = 'Dear User, A new account has been connnected to your account.' . PHP_EOL . 
				'User Account: ' . $user2 . PHP_EOL . 
				'User Mail: ' . $email2;
	$message2 = 'Dear User, A new account has been connnected to your account.' . PHP_EOL . 
				'User Account: ' . $user . PHP_EOL . 
				'User Mail: ' . $email;
	$headers = "From: wedlockmatrimony76@gmail.com" . "\r\n" .
				"CC: sabrinakhan.saama@gmail.com";
	mail($to, $subject, $message, $headers);
	mail($to2, $subject, $message2, $headers);
	
	$sql2 = "INSERT INTO connecteduser(person1, person_name1, person2, person_name2) VALUES('$person', '$personname', '$person2', '$personname2')";
	$sql3 = "DELETE FROM interested WHERE interested_by = '$person' ";
	$sql4 = "DELETE FROM interested WHERE interested_by = '$person2' ";
	if(mysqli_query($db, $sql2))  
	{  
		if(mysqli_query($db, $sql3))
		{
			if(mysqli_query($db, $sql4)){
				echo "Accounts has been connected";
			}
		}  
	}
?>