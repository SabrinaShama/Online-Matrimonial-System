<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo'); 
	$sql = "UPDATE profile SET deletepro = deletepro + 1 WHERE reg_id = '".$_POST["id"]."'";
	if(mysqli_query($db, $sql))  
	{
		echo 'Admin will be notified';
	}
?>