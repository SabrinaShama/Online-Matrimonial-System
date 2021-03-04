<?php
	session_start();
	
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');

	//registration
	if (isset($_POST['regBut'])) {
		$username = mysqli_real_escape_string($db, $_POST['uname']);
		$email = mysqli_real_escape_string($db, $_POST['mail']);
		$password_1 = mysqli_real_escape_string($db, $_POST['psw']);
		$password_2 = mysqli_real_escape_string($db, $_POST['psw2']);
		
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO permission(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			echo "Thank you ! Please wait for admin approval";
		}
		else{
			header('location: home.php');
		}
		
	}
	
	//login
	if (isset($_POST['logBut'])) {
		$username = mysqli_real_escape_string($db, $_POST['uname']);
		$password = mysqli_real_escape_string($db, $_POST['psw']);
		
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM registration WHERE username='$username' AND username !='ADMIN' AND password='$password'";
			$results = mysqli_query($db, $query);
			$query2 = "SELECT * FROM registration WHERE username='ADMIN' AND password='$password'";
			$results2 = mysqli_query($db, $query2);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				$getID = mysqli_fetch_assoc($results);
				$_SESSION['id'] = $getID['id'];
				header('location: profile.php');
			}
			else if (mysqli_num_rows($results2) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: adminpro.php');
			}
			else{
				header('location: home.php');
			}
		}							
	}
	
	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['id']);
		header('location: home.php');
	}
	
	//edit profile
	if (isset($_POST['SBut1'])) {
		$username = $_SESSION['username'];
		$id = $_SESSION['id'];
		$uploaddir = 'profileimage/';
		$target = "$uploaddir".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$bday = mysqli_real_escape_string($db, $_POST['bday']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$living = mysqli_real_escape_string($db, $_POST['living']);
		$birth = mysqli_real_escape_string($db, $_POST['birth']);
		$marital = mysqli_real_escape_string($db, $_POST['marital']);
		$religion = mysqli_real_escape_string($db, $_POST['religion']);
		$edulevel = mysqli_real_escape_string($db, $_POST['edulevel']);
		$edufield = mysqli_real_escape_string($db, $_POST['edufield']);
		$work = mysqli_real_escape_string($db, $_POST['work']);
		$income = mysqli_real_escape_string($db, $_POST['income']);
		$height = mysqli_real_escape_string($db, $_POST['height']);
		$weight = mysqli_real_escape_string($db, $_POST['weight']);
		$body = mysqli_real_escape_string($db, $_POST['body']);
		$skin = mysqli_real_escape_string($db, $_POST['skin']);
		$disability = mysqli_real_escape_string($db, $_POST['disability']);
		$smoking = mysqli_real_escape_string($db, $_POST['smoking']);
		$drinking = mysqli_real_escape_string($db, $_POST['drinking']);
		$class = mysqli_real_escape_string($db, $_POST['social']);
		$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
		
		$query = "INSERT INTO profile(username, image, name, gender, bday, age, living, birth, marital, religion, edulevel, edufield, work, income, height, weight, body, skin, disability, smoking, drinking, class, mobile, reported, deletepro, reg_id) 
		VALUES('$username', '$image', '$name', '$gender', '$bday', '$age', '$living', '$birth', '$marital', '$religion', '$edulevel', '$edufield', '$work', '$income', '$height', '$weight', '$body', '$skin', '$disability', '$smoking', '$drinking', '$class', '$mobile','0','0', $id)";
		mysqli_query($db, $query);
		header('location: profile.php');
		
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
	}
	
	//change password
	if(isset($_POST['passBut']))
	{
		$username = $_SESSION['username'];
		$oldpass = mysqli_real_escape_string($db, $_POST['psw3']);
		$newpass = mysqli_real_escape_string($db, $_POST['psw4']);
		$conpass = mysqli_real_escape_string($db, $_POST['psw5']);
		
		if (empty($oldpass)) { array_push($errors, "Old Password is required"); }
		
		if ($newpass != $conpass) {
			array_push($errors, "The two passwords do not match");
		}
		
		if (count($errors) == 0) {
			$password1 = md5($oldpass);
			$password2 = md5($newpass);
			$query = "SELECT * FROM registration WHERE username='$username' AND username !='ADMIN' AND password='$password1'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$query3 = "UPDATE registration SET password='$password2' WHERE username='$username'";
				mysqli_query($db, $query3);
				header('location: profile.php');
			}
			else{
				echo ("<script language='javascript'> window.alert('Wrong Information'); window.location.href='profile.php'; </script>");
			}
		}
		
	}
	
	//change admin password
	if(isset($_POST['passBut2']))
	{
		$useradmin = $_SESSION['username'];
		$oldpass2 = mysqli_real_escape_string($db, $_POST['psw6']);
		$newpass2 = mysqli_real_escape_string($db, $_POST['psw7']);
		$conpass2 = mysqli_real_escape_string($db, $_POST['psw8']);
		
		if (empty($oldpass2)) { array_push($errors, "Old Password is required"); }
		
		if ($newpass2 != $conpass2) {
			array_push($errors, "The two passwords do not match");
		}
		
		if (count($errors) == 0) {
			$password1 = md5($oldpass2);
			$password2 = md5($newpass2);
			$query = "SELECT * FROM registration WHERE username='ADMIN' AND password='$password1'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$query3 = "UPDATE registration SET password='$password2' WHERE username='ADMIN'";
				mysqli_query($db, $query3);
				header('location: adminpro.php');
			}
			else{
				echo ("<script language='javascript'> window.alert('Wrong Information'); window.location.href='adminpro.php'; </script>");
			}
		}
		
	}
	
	
?>