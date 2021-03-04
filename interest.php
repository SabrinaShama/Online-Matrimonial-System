<?php  
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$sql = "SELECT id FROM profile WHERE reg_id = '".$_POST["id"]."'";
	$getID = mysqli_fetch_assoc(mysqli_query($db, $sql));
	$id = $getID['id'];
	$id2 = (isset($_POST['id2']) ? $_POST['id2'] : '');
	$user = (isset($_POST['user']) ? $_POST['user'] : '');
	$user2 = (isset($_POST['user2']) ? $_POST['user2'] : '');
	$sql = "INSERT INTO interested(interested_by, interested_by_user, interested_in, interested_in_user) VALUES ('$id', '$user', '$id2', '$user2')";
	if(mysqli_query($db, $sql))  
	{
		echo 'We will let the user know';
	}
?>