<?php  
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	if((isset($_POST['id'])) && !empty($_POST['id']))
	{
				$sql2 = "SELECT image FROM profile WHERE id = '".$_POST["id"]."'";
				$getID = mysqli_fetch_assoc(mysqli_query($db, $sql2));
				echo $getID['image'];
				
	}	
	
?>