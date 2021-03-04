<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo'); 
	$sql = "SELECT reg_id FROM profile WHERE id = '".$_POST["id"]."'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql));
	$reg = $getID['reg_id'];
	$sqlnew = "SELECT * FROM registration WHERE id = '$reg'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sqlnew));
	$email = $getID['email'];
	$to      = $email;
	$subject = 'Account Delete Confirmation';
	$message = 'Dear User,Your Account has been removed.';
	$headers = "From: wedlockmatrimony76@gmail.com" . "\r\n" .
				"CC: sabrinakhan.saama@gmail.com";

	mail($to, $subject, $message, $headers);
	$sql2 = "DELETE FROM profile WHERE id = '".$_POST["id"]."'";
	$sql3 = "DELETE FROM registration WHERE id ='$reg'";
	$sql4 = "SELECT FROM connecteduser WHERE person1 = '".$_POST["id"]."' OR person2 = '".$_POST["id"]."'";
	$result4 = mysqli_query($db, $sql4);
	$sql5 = "SELECT FROM interested WHERE interested_by = '".$_POST["id"]."' OR interested_in = '".$_POST["id"]."'";
	$result5 = mysqli_query($db, $sql5);
	$sql6 = "DELETE FROM connecteduser WHERE person1 = '".$_POST["id"]."' OR person2 = '".$_POST["id"]."'";
	$sql7 = "DELETE FROM interested WHERE interested_by = '".$_POST["id"]."' OR interested_in = '".$_POST["id"]."'";
	  
	if(!$result4 || mysqli_num_rows($result4) > 0){
		mysqli_query($db, $sql6);
		if(!$result5 || mysqli_num_rows($result5) > 0){
				mysqli_query($db, $sql7);
				if(mysqli_query($db, $sql3)){
					if(mysqli_query($db, $sql2)){
						echo "data deleted";
					}
				}
		}
	}
?>