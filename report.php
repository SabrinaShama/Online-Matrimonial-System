<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo'); 
	$sql = "UPDATE profile SET reported = reported + 1 WHERE username = '".$_POST["user"]."'";
	if(mysqli_query($db, $sql))  
	{
		echo 'Account reported';
	}  
?>