<?php 
	error_reporting(E_ALL ^ E_WARNING);
	include('action_page2.php');
	$output = ''; 
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$result = mysqli_query($db, "SELECT * FROM profile WHERE username='$username' limit 1");
	$row = mysqli_fetch_array($result);
	
	//Value for recommend
	$_SESSION['gender'] = $row['gender'];
	$_SESSION['religion'] = $row['religion'];
	$_SESSION['age'] = $row['age'];
	$_SESSION['living'] = $row['living'];	
	
    //Search
    if(isset($_GET['search']))
	{
		$RelToSearch = (isset($_GET['religionS']) ? $_GET['religionS'] : '');
		$AgeToSearch = (isset($_GET['ageS']) ? $_GET['ageS'] : '');
		$RegToSearch = (isset($_GET['regionS']) ? $_GET['regionS'] : '');
		if( $row['gender'] == 'Male'){
            $search_result = mysqli_query($db, "SELECT * FROM profile WHERE religion LIKE '%".$RelToSearch."%' AND age LIKE '%".$AgeToSearch."%' AND birth LIKE '%".$RegToSearch."%' AND gender='Female'");
	    }
	    else if(  $row['gender'] == 'Female'){
            $search_result = mysqli_query($db, "SELECT * FROM profile WHERE religion LIKE '%".$RelToSearch."%' AND age LIKE '%".$AgeToSearch."%' AND birth LIKE '%".$RegToSearch."%' AND gender='Male'");
	    }
    }
	else{
		$search_result = mysqli_query($db, "SELECT TOP 0 0");
	}
	
	//Recommend details
	if(isset($_POST['detailsBut2']))
	{
			$_SESSION['image'] = $_POST['openrecommend'];
			header('location: searchpro.php');
	}
	
	//Search details
	if(isset($_POST['detailsBut3']))
	{
			$_SESSION['image'] = $_POST['opensearch'];
			header('location: searchpro.php');
	}
	
	//interest details
	if(isset($_POST['detailsBut4']))
	{
			$_SESSION['image'] = $_POST['openinterest'];
			header('location: searchpro.php');
	}

?>
<html>

<head>
  <meta charset="utf-8">
  <title>Matrimony</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  <style>
    body {
		background-image: url('background3.jpg');
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		background-attachment: fixed;
		margin:0;
		padding:0;
		transform-style: preserve-3d;
		height: 80%;
		overflow-y: scroll;
		overflow-x: hidden;
    }
    .main_page_parallax {
		width: 100%;
		height: 100%;
    }
    .matrimony_title_bar_navigator {
		width: 100%;
		height: 60px;
		position: fixed;
        z-index: 1;
    }
	button{
		color: #2e4045;
		background-color: #83adb5;
		border: none;		
		text-align: center;
		display: inline-block;
		font-size: 15px;
		font-family: Bradley Hand, cursive;
		font-weight: bold;
		transition: padding 0.5s ease, background-color 0.5s ease, color 0.5s ease;
		font-variant: small-caps;
	}
	li{
		display: inline;
	}
	#dot, #dot1, #dot2, #dot3, #dot4{
		padding-top: 20px;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 18px;
		opacity: 0.85;
		border-radius: 0px 0px 8px 8px;
	}
	#dot:hover, #dot1:hover, #dot3:hover, #dot4:hover, #op:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	#dot2:hover, #dot4:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
		border-radius: 0px 0px 0px 0px;
	}
	.dropbtn {
		display: inline-block;
		color: #2e4045;
		text-align: right;
		text-decoration: none;
	}
	.dropdown-content {
		display: none;
		position: absolute;
		min-width: 37px;
		background-color: #83adb5;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		margin-left:191px;
	}
	.dropdown-content button{
		color: #2e4045;
		padding: 14px 51px;
		text-decoration: none;
		display: block;
		text-align: right;
		opacity: 0.85;
	}
	#dp4{
		border-radius: 0px 0px 8px 8px;
	}
	.dropdown-content button:hover {
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	.dropdown:hover .dropdown-content {
		display: block;
	}
	.dropbtn2 {
		display: inline-block;
		color: #2e4045;
		text-align: right;
		text-decoration: none;
	}
	.dropdown-content2 {
		display: none;
		position: absolute;
		min-width: 37px;
		background-color: #83adb5;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		margin-left:419px;
	}
	.dropdown-content2 button{
		color: #2e4045;
		padding: 14px 42px;
		text-decoration: none;
		display: block;
		text-align: center;
		opacity: 0.85;
	}
	#dp8{
		border-radius: 0px 0px 8px 8px;
	}
	.dropdown-content2 button:hover {
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	.dropdown2:hover .dropdown-content2 {
		display: block;
	}
	
	.profile_page_form_home{
		background-color: #5e3c58;
		opacity: 0.6;
		position: relative;
        padding: 25vh 10%;
		min-height: 60vh;
		width: 100vw;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	.profile_page_form_home p{
		font-family: Bradley Hand, cursive;
		font-size: 3em;
		color: #000000;
		text-align: right;
		color: black;
	}
	
	.profile_page_form_profile{
		display: block;
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 160vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
	.profile_page_form_profile p{
		font-family: Bradley Hand, cursive;
		font-size: 1em;
		color: #2e4045;
		text-align: left;
	}
	.profile_page_form_profile h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }
	#right{
		float: right;
		width: 30%;
	}
	#left{
		float: left;
		border:solid 1px black;
		width: 60%; 
		margin-left: 50px;
		height: 750px;
		text-align: left;
		padding: 20px;
		color: #2e4045;
		font-size: 18px;
		background-color: #c7bbc9;
		border-radius: 8px 8px 8px 8px;
	}
	img{
		margin: 5px;
		width: 250px;
		height: 300px;
	}
	
	.profile_page_form_edit{
		display: none;
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: auto;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
	.profile_page_form_edit h2{
        width: 70%;
		background-color: #2e4045;
		color: white;
		font-family: Bradley Hand, cursive;
    }
	.profile_page_form_edit p{
		width: 100%;
		background-color: #83adb5;
		color: #2e4045;
		text-align: center;
		margin-top: 10px;
		padding-top: 10px;
		padding-bottom: 10px;
		font-size: 35px;
		font-family: Bradley Hand, cursive;
	}
	.container {
		padding: 16px;
		width: 70%;
	}	
	input[type=text], input[type=hidden], input[type=date], input[list]{
		width: 100%;
		padding: 5px 10px;
		margin: 15px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	input[type=number]{
		width: 95%;
		padding: 5px 10px;
		margin: 15px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	input[type=radio], label{
		width: 20%;
		display: inline-block;
		padding: 5px 10px;
		margin: 5px 0;
		color: white;
	}
	#bs1{
		background-color: #2e4045;
		color: white;
		padding: 10px 10px;
		margin: 15px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		border-radius: 8px 8px 8px 8px;
	}
	
	.profile_page_form_recommend{
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 50vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
    .profile_page_form_recommend h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }	
	table {
		border-collapse: collapse;
		width: 100%;
	}
    th {
        height: auto;
        text-align: center;
    }
    tr {
		height: auto;
		padding: 5px;
	}
    td {
        padding-left: 5px;
        width: auto;
        position: relative;
    }
	#openrecommend{
		height: 200px;
		display: block;
		width: 100%;
	}
	#recommenduser{
		margin-top: 70px;
		width: 30%;
	}
	#details2{
		width: 16%;
		padding: 14px;
		margin: 100px; 
		position:relative;
		text-align: center;
		top:3%; 
		left:35%;
		border-radius: 8px 8px 8px 8px;
	}
	
	
	.profile_page_form_search{
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 50vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
    .profile_page_form_search h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }
    .searchcontainer {
		padding: 8px;
		width: 60%;
		margin:0 auto;
	}
	input[list]{
		width: 100%;
		padding: 5px 10px;
		margin: 5px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	input[type=number]{
		width: 100%;
		padding: 5px 10px;
		margin: 5px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	input[type=submit]{
		color: #2e4045;
		background-color: #83adb5;		
        transition: background-color 0.8s ease;
		font-size: 18px;
		font-weight: bold;
		text-align: center;
		padding: 10px 10px;
		margin: 5px 0;
		border: none;
		width: 100%;
		border-radius: 8px 8px 8px 8px;
	}
	input[type=submit]:hover{
        background-color: #2e4045;
        color: white;
        cursor: pointer;
    }
	
	table {
		border-collapse: collapse;
		width: 100%;
	}
    th {
        height: auto;
        text-align: center;
    }
    tr {
		height: auto;
		padding: 5px;
	}
    td {
        padding-left: 5px;
        width: auto;
        position: relative;
    }
	#opensearch{
		height: 200px;
		display: block;
		width: 100%;
	}
	#seuser{
		margin-top: 70px;
		width: 30%;
	}
	#details3{
		width: 16%;
		padding: 14px;
		margin: 100px; 
		position:relative;
		text-align: center;
		top:3%; 
		left:35%;
		border-radius: 8px 8px 8px 8px;
	}
	
	.profile_page_form_interested{
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 50vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
    .profile_page_form_interested h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }	
	table {
		border-collapse: collapse;
		width: 100%;
	}
    th {
        height: auto;
        text-align: center;
    }
    tr {
		height: auto;
		padding: 5px;
	}
    td {
        padding-left: 5px;
        width: auto;
        position: relative;
    }
	#openinterest{
		height: 200px;
		display: block;
		width: 100%;
	}
	#intuser{
		margin-top: 70px;
		width: 30%;
	}
	#details4{
		width: 16%;
		padding: 14px;
		margin: 100px; 
		position:relative;
		text-align: center;
		top:3%; 
		left:35%;
		border-radius: 8px 8px 8px 8px;
	}
	
	.profile_page_form_connected{
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 50vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
    .profile_page_form_connected h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }	
	table#contable {
		border-collapse: collapse;
		width: 100%;
		background-color: #c7bbc9;
		opacity: 30%;
		text-align: center;
	}
    th {
        height: auto;
        text-align: center;
    }
    tr {
		height: auto;
		padding: 5px;
	}
    td {
        padding-left: 5px;
        width: auto;
        position: relative;
    }
	
	.profile_page_form_password{
		display: none;
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: auto;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
	.profile_page_form_password h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }
	.container {
		padding: 8px;
		width: 60%;
	}	
	input[type=password]{
		width: 100%;
		padding: 5px 10px;
		margin: 5px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	#bpass2{
		background-color: #83adb5;
		color: #2e4045;
		padding: 10px 10px;
		margin: 5px 0;
		border: none;
		transition: background-color 0.8s ease;
		font-size: 18px;
		font-weight: bold;
		text-align: center;
		width: 100%;
		border-radius: 8px 8px 8px 8px;
	}
	#bpass2:hover{
        background-color: #2e4045;
        color: white;
        cursor: pointer;
    }
	.imgcontainer {
		text-align: center;
		margin: 10px 0 12px 0;
		position: relative;
	}
	.close {
		position: absolute;
		right: 200px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}
	.close:hover, .close:focus {
		color: #cc0000;
		cursor: pointer;
	}
	
	.profile_page_form_contact {
		background-color: #5e3c58;
		opacity: 0.95;
		background-attachment: fixed;
		z-index: -1;
		position: relative;
        padding: 15vh 10%;
		min-height: 40vh;
		width: 100vw;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit; 
	}
	.profile_page_form_contact p{
		color: white;
		padding-top:7px;
		padding-bottom: 2px;
		text-align: left;
		font-size: 20px;
		font-family: Bradley Hand, cursive;
	}
	.link{
		display: inline;
		padding-bottom: 15px;
	}
	
	.btn_recommend, .btn_s, .btn_interest, .btn_interest2{
		padding: 0px;
		border-radius: 0px 0px 0px 0px;
		
	}
	
	.profile_page_form_gap{
		background-color: #5e3c58;
		opacity: 0.4;
		position: relative;
		z-index: -1;
		min-height: 20vh;
		width: 100%;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}

	.profile_page_form_gap2{
		background-color: #5e3c58;
		opacity: 0.4;
		position: relative;
		z-index: -1;
		min-height: 20vh;
		width: 100%;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		display: none;
	}
	
	::placeholder {
		font-family: Bradley Hand;
		color: #151515;
	}
	
	.footer {
		position: relative;
		min-height: 7vh;
		right: 0;
		bottom: 0;
		left: 0;
		padding: 1rem;
		background-color: #5e3c58;
		text-align: center;
	}
	
  </style>
  <script>
	 
    $(document).ready(function (){
            $("#dot").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm1").offset().top 
                }, 1000);
            });
        });
    $(document).ready(function (){
            $("#dot1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm2").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm4").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp2").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm5").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp3").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm6").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp4").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm7").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot3").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm9").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp5").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm3").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dp6").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm8").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#bs1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm2").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#changeclose").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm1").offset().top -100
                }, 1000);
            });
        });
	
	$(document).on('click', '#dp8', function(){  
			var id = '<?php echo $_SESSION['id'] ;?>';
			if(confirm("Are you sure you want to delete your profile?"))  
			{  
                $.ajax({  
                    url:"deletepro.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){  
						alert(data); 
                    }  
                });  
           }  
		});
	
	$(document).ready(function(){  
		function fetch_data()  
		{  
			$.ajax({  
                url:"controlrecommend.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data3').html(data);  
                }  
			});  
		}
		fetch_data();
		$(document).on('click', '.btn_recommend', function(){  
			var id=$(this).data("id1");   
                $('html, body').animate({
                    scrollTop: $("#details2").offset().top -100
                }, 1000);
				$.ajax({  
                    url:"openrecommend.php",
					async: false,
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){
						$('#recommenduser').val(data);
                    }  
                });  
		});
	});
	
	$(document).ready(function(){  
		$(document).on('click', '.btn_s', function(){  
			var id=$(this).data("id1");   
                $('html, body').animate({
                    scrollTop: $("#details3").offset().top -100
                }, 1000);
				$.ajax({  
                    url:"opensearch.php",
					async: false,
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){
						$('#seuser').val(data);
                    }  
                });  
		});
	});
	
	$(document).ready(function(){  
		function fetch_data()  
		{  
			$.ajax({  
                url:"controlinterest.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data4').html(data);  
                }  
			});
			$.ajax({  
                url:"controlinterest2.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data5').html(data);  
                }  
			});
		}
		fetch_data();
		$(document).on('click', '.btn_interest', function(){  
			var id=$(this).data("id1");   
                $('html, body').animate({
                    scrollTop: $("#details4").offset().top -100
                }, 1000);
				$.ajax({  
                    url:"openinterest.php",
					async: false,
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){
						$('#intuser').val(data);
                    }  
                });  
		});
		$(document).on('click', '.btn_interest2', function(){  
			var id=$(this).data("id1");   
                $('html, body').animate({
                    scrollTop: $("#details4").offset().top -100
                }, 1000);
				$.ajax({  
                    url:"openinterest.php",
					async: false,
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){
						$('#intuser').val(data);
                    }  
                });  
		});
	});
	
	$(document).ready(function(){  
		function fetch_data()  
		{  
			$.ajax({  
                url:"controlusercom.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data6').html(data);  
                }  
			});  
		}
		fetch_data();
	});
	
	function expand_1(){
		document.getElementById("comm8").style.display = 'block';
		document.getElementById("commgap").style.display = 'block';
    }
	
	function expand_2(){
		document.getElementById("comm8").style.display = 'none';
		document.getElementById("commgap").style.display = 'none';
    }
	
	function expand_3(){
        document.getElementById("comm3").style.display = 'block';
		document.getElementById("comm2").style.display = 'none';
    }
	
	function expand_4(){
        document.getElementById("comm2").style.display = 'block';
		document.getElementById("comm3").style.display = 'none';
    }
	
	function expand_5(){
		document.getElementById("id03").style.display='block';
	}
	
	var oldpass = document.getElementById('id03');
	window.onclick = function(event) {
		if (event.target == oldpass) {
			modal.style.display = "none";
		}
	}
	
  </script>
</head>

<body>
  <div class="main_page_parallax">
    <div class="matrimony_title_bar_navigator">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-offset-6"> 
            <li class="active">
				<button id="dot">Home</button>
			</li>
			<li>
				<button id="dot1">My Profile</button>
            </li>
			<li class="dropdown">				
				<button class="dropbtn" id="dot2">Profile Interaction &#9660;</button>
				<div class="dropdown-content">
				<button id = "dp1">Recommended User</button>
				<button id = "dp2">Search User</button>
				<button id = "dp3">Interested User</button>
				<button id = "dp4">Connected User</button>
				</div>
            </li>
            <li>
				<button id="dot3">Contact Us</button>
            </li>
			<li class="dropdown2">				
				<button class="dropbtn2" id="dot4">Settings &#9660;</button>
				<div class="dropdown-content2">
					<button id = "dp5" onclick="expand_3()">Update Profile</button>
					<button id = "dp6" onclick="expand_1()">Change Password</button>
					<a href="profile.php?logout='1'" class="lout"><button id = "dp7">Log Out</button></a>
					<button id = "dp8">Delete Profile</button>
				</div>
            </li>
		</div>
      </div>
    </div>
	<div class="profile_page_form_home" id="comm1">
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<?php endif ?>
	</div>
	<div class="profile_page_form_profile" id="comm2">
		<h2 class="profile" style="text-align: center;">PROFILE</h2>
		
		<div id="info">
			<div id="right">
				<?php
				echo '<img src="./profileimage/'.$row['image'].'" />';
				?>
			</div>
			<div id="left">				
					<p><strong> Name </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['name']; ?> </p>
					<p><strong> Gender </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['gender']; ?></p>
					<p><strong> Birthdate </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['bday']; ?></p>
					<p><strong> Age </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['age']; ?></p>
					<p><strong> Lives in </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['living']; ?></p>
					<p><strong> Birthplace </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['birth']; ?></p>
					<p><strong> Marital Status </strong>&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['marital']; ?></p>
					<p><strong> Religion </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['religion']; ?></p>
					<p><strong> Education Level </strong>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['edulevel']; ?></p>
					<p><strong> Education Field </strong>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['edufield']; ?></p>
					<p><strong> Working Position </strong>&nbsp; : &nbsp;&nbsp; <?php echo $row['work']; ?></p>
					<p><strong> Income </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['income']; ?></p>
					<p><strong> Height </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['height']; ?></p>
					<p><strong> Weight </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['weight']; ?></p>
					<p><strong> Body Type </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['body']; ?></p>
					<p><strong> Skin Type </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['skin']; ?></p>
					<p><strong> Disability </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['disability']; ?></p>
					<p><strong> Smoking </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['smoking']; ?></p>
					<p><strong> Drinking </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['drinking']; ?></p>
					<p><strong> Social Class </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['class']; ?></p>
					<p><strong> Mobile </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $row['mobile']; ?></p>
			</div>
			
		</div>
		
	</div>
	<div class="profile_page_form_edit" id="comm3">		
		<h2 class="profile" style="text-align: center;">Edit Your Profile</h2>
		<form class="Info" method="post" enctype="multipart/form-data" action="action_page2.php">
			<div class="container">
				<p>Let us know some basic about you...</p>
				
				<label><b>Profile Image</b></label>
				<input type="hidden" name="img" value="1000000">
				<input type="file" name="image">
				
				<input type="text" placeholder="Enter Your Name" name="name" required autofocus>

				<label><b>Gender</b></label><br>
				<input type="radio" name="gender" value="Male"><label>Male</label>
				<input type="radio" name="gender" value="Female"><label>Female</label><br>
						
				<label><b>Date Of Birth</b></label>
				<input type="date" name="bday" required>

				<input type="number" placeholder="Enter Your Age" name="age" min="18" max="80" step="1" required>
				
				<input list="living" placeholder="Enter Where You Live" name="living">
				<datalist id="living">
					<option value="Barguna,Barisal">
					<option value="Barisal,Barisal">
					<option value="Bhola,Barisal">
					<option value="Jhalokati,Barisal">
					<option value="Patuakhali,Barisal">
					<option value="Pirojpur,Barisal">
					<option value="Bandarban,Chittagong">
					<option value="Brahmanbaria,Chittagong">
					<option value="Chandpur,Chittagong">
					<option value="Chittagong,Chittagong">
					<option value="Comilla District,Chittagong">
					<option value="Cox's Bazar,Chittagong">
					<option value="Feni District,Chittagong">
					<option value="Khagrachhari,Chittagong">
					<option value="Lakshmipur,Chittagong">
					<option value="Noakhali,Chittagong">
					<option value="Rangamati,Chittagong">
					<option value="Dhaka,Dhaka">
					<option value="Faridpur,Dhaka">
					<option value="Gazipur,Dhaka">
					<option value="Gopalganj,Dhaka">
					<option value="Kishoreganj,Dhaka">
					<option value="Madaripur,Dhaka">
					<option value="Manikganj,Dhaka">
					<option value="Munshiganj,Dhaka">
					<option value="Narayanganj,Dhaka">
					<option value="Narsingdi,Dhaka">
					<option value="Rajbari,Dhaka">
					<option value="Shariatpur,Dhaka">
					<option value="Tangail,Dhaka">
					<option value="Bagerhat,Khulna">
					<option value="Chuadanga,Khulna">
					<option value="Jessore,Khulna">
					<option value="Jhenaidah,Khulna">
					<option value="Khulna,Khulna">
					<option value="Kushtia,Khulna">
					<option value="Magura,Khulna">
					<option value="Meherpur,Khulna">
					<option value="Narail,Khulna">
					<option value="Satkhira,Khulna">
					<option value="Jamalpur,Mymensingh">
					<option value="Mymensingh,Mymensingh">
					<option value="Netrakona,Mymensingh">
					<option value="Sherpur,Mymensingh">
					<option value="Bogra,Rajshahi">
					<option value="Joypurhat,Rajshahi">
					<option value="Naogaon,Rajshahi">
					<option value="Natore,Rajshahi">
					<option value="Chapainawabganj,Rajshahi">
					<option value="Pabna,Rajshahi">
					<option value="Rajshahi,Rajshahi">
					<option value="Sirajgonj,Rajshahi">
					<option value="Dinajpur,Rangpur">
					<option value="Gaibandha,Rangpur">
					<option value="Kurigram,Rangpur">
					<option value="Lalmonirhat,Rangpur">
					<option value="Nilphamari,Rangpur">
					<option value="Panchagarh,Rangpur">
					<option value="Rangpur,Rangpur">
					<option value="Thakurgaon,Rangpur">
					<option value="Habiganj,Sylhet">
					<option value="Moulvibazar,Sylhet">
					<option value="Sunamganj,Sylhet">
					<option value="Sylhet,Sylhet">
				</datalist>

				<input list="birth" placeholder="Enter Your Birthplace" name="birth">
				<datalist id="birth">
					<option value="Barguna,Barisal">
					<option value="Barisal,Barisal">
					<option value="Bhola,Barisal">
					<option value="Jhalokati,Barisal">
					<option value="Patuakhali,Barisal">
					<option value="Pirojpur,Barisal">
					<option value="Bandarban,Chittagong">
					<option value="Brahmanbaria,Chittagong">
					<option value="Chandpur,Chittagong">
					<option value="Chittagong,Chittagong">
					<option value="Comilla District,Chittagong">
					<option value="Cox's Bazar,Chittagong">
					<option value="Feni District,Chittagong">
					<option value="Khagrachhari,Chittagong">
					<option value="Lakshmipur,Chittagong">
					<option value="Noakhali,Chittagong">
					<option value="Rangamati,Chittagong">
					<option value="Dhaka,Dhaka">
					<option value="Faridpur,Dhaka">
					<option value="Gazipur,Dhaka">
					<option value="Gopalganj,Dhaka">
					<option value="Kishoreganj,Dhaka">
					<option value="Madaripur,Dhaka">
					<option value="Manikganj,Dhaka">
					<option value="Munshiganj,Dhaka">
					<option value="Narayanganj,Dhaka">
					<option value="Narsingdi,Dhaka">
					<option value="Rajbari,Dhaka">
					<option value="Shariatpur,Dhaka">
					<option value="Tangail,Dhaka">
					<option value="Bagerhat,Khulna">
					<option value="Chuadanga,Khulna">
					<option value="Jessore,Khulna">
					<option value="Jhenaidah,Khulna">
					<option value="Khulna,Khulna">
					<option value="Kushtia,Khulna">
					<option value="Magura,Khulna">
					<option value="Meherpur,Khulna">
					<option value="Narail,Khulna">
					<option value="Satkhira,Khulna">
					<option value="Jamalpur,Mymensingh">
					<option value="Mymensingh,Mymensingh">
					<option value="Netrakona,Mymensingh">
					<option value="Sherpur,Mymensingh">
					<option value="Bogra,Rajshahi">
					<option value="Joypurhat,Rajshahi">
					<option value="Naogaon,Rajshahi">
					<option value="Natore,Rajshahi">
					<option value="Chapainawabganj,Rajshahi">
					<option value="Pabna,Rajshahi">
					<option value="Rajshahi,Rajshahi">
					<option value="Sirajgonj,Rajshahi">
					<option value="Dinajpur,Rangpur">
					<option value="Gaibandha,Rangpur">
					<option value="Kurigram,Rangpur">
					<option value="Lalmonirhat,Rangpur">
					<option value="Nilphamari,Rangpur">
					<option value="Panchagarh,Rangpur">
					<option value="Rangpur,Rangpur">
					<option value="Thakurgaon,Rangpur">
					<option value="Habiganj,Sylhet">
					<option value="Moulvibazar,Sylhet">
					<option value="Sunamganj,Sylhet">
					<option value="Sylhet,Sylhet">
				</datalist>

				<input list="marital" placeholder="Enter Your Marital Status" name="marital">
				<datalist id="marital">
					<option value="Single">
					<option value="Married">
					<option value="Widowed">
					<option value="Divorced">
				</datalist>
				
				<input list="religion" placeholder="Enter Your Religion" name="religion">
				<datalist id="religion">
					<option value="Muslim">
					<option value="Hindu">
					<option value="Christian">
					<option value="Others">
				</datalist>
				
				<p>What about your education or career...</p>
				
				<input list="edulevel" placeholder="Enter Your Education Level" name="edulevel">
				<datalist id="edulevel">
					<option value="Higher Secondary School Certificate (HSC) and below">
					<option value="Bachelors">
					<option value="Masters">
					<option value="Doctorate">
					<option value="Diploma">
				</datalist>

				<input list="edufield" placeholder="Enter Your Education Field" name="edufield">
				<datalist id="edufield">
					<option value="Accounting and Information Systems (AIS)">
					<option value="Aerospace Engineering">
					<option value="Animal Science">
					<option value="Anthropology">
					<option value="Applied Economics and Management">
					<option value="Applied Chemistry and Chemical Engineering">
					<option value="Applied Mathematics">
					<option value="Applied Physics">
					<option value="Arabic">
					<option value="Archaeology">
					<option value="Architecture">
					<option value="Art">
					<option value="Astronomy and Space Sciences">
					<option value="Atmospheric Science">
					<option value="Banking and Insurance">
					<option value="Bengali Language and Literature">
					<option value="Biochemistry, Molecular and Cell Biology">
					<option value="Biological and Environmental Engineering">
					<option value="Biomedical Engineering">
					<option value="Biophysics">
					<option value="Botany">
					<option value="Chemical Engineering">
					<option value="Chemistry and Chemical Biology">
					<option value="City and Regional Planning">
					<option value="Civil and Environmental Engineering">
					<option value="Classics">
					<option value="Clinical Psychology">
					<option value="Communication">
					<option value="Communication Disorders">
					<option value="Comparative Biomedical Sciences">
					<option value="Comparative Literature">
					<option value="Computational Biology">
					<option value="Computer Science and Engineering">
					<option value="Criminology">
					<option value="Design and Environmental Analysis">
					<option value="Development Studies">
					<option value="Disaster Science and Management">
					<option value="Drawing and Painting">
					<option value="Ecology and Evolutionary Biology">
					<option value="Economics">
					<option value="Education">
					<option value="Educational and Counseling Psychology">
					<option value="Electrical and Computer Engineering">
					<option value="Electrical and Electronic Engineering">
					<option value="English Language and Literature">
					<option value="Entomology">
					<option value="Environmental Toxicology">
					<option value="Fiber Science and Apparel Design">
					<option value="Finance">
					<option value="Fisheries">
					<option value="Food Science and Technology">
					<option value="Genetics, Genomics and Development">
					<option value="Genetic Engineering and Bio-technology">
					<option value="Geological Sciences">
					<option value="Geography and Environment">
					<option value="Global Development">
					<option value="History">
					<option value="History of Art, Archaeology, and Visual Studies">
					<option value="Horticulture">
					<option value="Hotel Administration">
					<option value="Human Development">
					<option value="Immunology and Infectious Disease">
					<option value="Industrial and Labor Relations">
					<option value="Information Science">
					<option value="International Business">
					<option value="International Relations">
					<option value="Islamic History and Culture">
					<option value="Islamic Studies">
					<option value="Landscape Architecture">
					<option value="Law">
					<option value="Linguistics">
					<option value="Management">
					<option value="Management Information Systems (MIS)">
					<option value="Marketing">
					<option value="Mass Communication and Journalism">
					<option value="Materials Science and Engineering">
					<option value="Mathematics">
					<option value="Mechanical Engineering">
					<option value="Medieval Studies">
					<option value="Microbiology">
					<option value="Music">
					<option value="Natural Resources">
					<option value="Neurobiology and Behavior">
					<option value="Nuclear Engineering">
					<option value="Nutrition">
					<option value="Oceanography">
					<option value="Operations Research and Information Engineering">
					<option value="Organization Strategy and Leadership">
					<option value="Pali and Buddhist Studies">
					<option value="Persian Language and Literature">
					<option value="Peace and Conflict Studies">
					<option value="Pharmacology">
					<option value="Pharmaceutical Chemistry">
					<option value="Pharmaceutical Technology">
					<option value="Philosophy">
					<option value="Physics">
					<option value="Plant Breeding">
					<option value="Policy Analysis and Management">
					<option value="Population Sciences">
					<option value="Political Science">
					<option value="Psychology">
					<option value="Public Affairs">
					<option value="Regional Science">
					<option value="Robotics and Mechatronics Engineering">
					<option value="Sanskrit">
					<option value="Science and Technology Studies">
					<option value="Sociology">
					<option value="Soil and Crop Sciences">
					<option value="Soil, Water and Environment">
					<option value="Statistics, Biostatistics & Informatics">
					<option value="Systems Engineering">
					<option value="Television and Film Studies">
					<option value="Theatre and Performance Studies">
					<option value="Theoretical and Applied Mechanics">
					<option value="Theoretical Physics">
					<option value="Tourism and Hospitality Management">
					<option value="Urban Studies">
					<option value="Water Resources">
					<option value="Women's and Gender Studies">
					<option value="World Religions and Culture">
					<option value="Zoology">
				</datalist>
						
				<input type="text" placeholder="Enter your working position(put 'Not Working' if not applicable)" name="work">
				
				<input type="text" placeholder="Enter your monthly salary(if applicable)" name="income" required>
				
				<p>Tell something of your lifestyle...</p>
								
				<input type="number" placeholder="Enter Your Height(in feet)" name="height" min="3" max="8" step="0.1">

				<input type="number" placeholder="Enter Your Weight(in kg)" name="weight" min="0" max="100" step="1">
				
				<input list="body" placeholder="Enter Your Body Type" name="body">
				<datalist id="body">
					<option value="Slim">
					<option value="Average">
					<option value="Fat">
					<option value="Athletic">
				</datalist>
				
				<input list="skin" placeholder="Enter Your Skin Type" name="skin">
				<datalist id="skin">
					<option value="Light, pale white">
					<option value="White, fair">
					<option value="Medium, white to light brown">
					<option value="Olive, moderate brown">
					<option value="Brown, dark brown">
					<option value="Very dark brown to black">
				</datalist>
				
				<label><b>Any Disability ?</b></label><br>
				<input type="radio" name="disability" value="yes"><label>Yes</label>
				<input type="radio" name="disability" value="no"><label>No</label><br>
				
				<label><b>Smoking Habits ?</b></label><br>
				<input type="radio" name="smoking" value="yes"><label>Yes</label>
				<input type="radio" name="smoking" value="no"><label>No</label><br>
				
				<label><b>Drinking Habits ?</b></label><br>
				<input type="radio" name="drinking" value="yes"><label>Yes</label>
				<input type="radio" name="drinking" value="no"><label>No</label><br>
				
				<input list="social" placeholder="Enter Your Social Class" name="social">
				<datalist id="social">
					<option value="The Lower Class">
					<option value="The Working Class">
					<option value="The Lower Middle Class">
					<option value="The Middle Class">
					<option value="The Upper Middle Class">
					<option value="The Lower-upper Class">
					<option value="The Upper-upper Class">
				</datalist>
				
				<input type="text" placeholder="Enter Your Phone Number" name="mobile" required>
        
				<button id="bs1" class="save" onclick="expand_4()" type="submit" name="SBut1">Save</button>
			</div>
		</form>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="profile_page_form_recommend" id="comm4">
		<h2 style="text-align: center;">Recommended</h2>
		<div id="info">
			<div class="table-responsive">   
                     <div id="live_data3"></div>                 
            </div>
		</div>
		<form action="profile.php" method="post" id="openrecommend">
			<input type="hidden" id="recommenduser" name="openrecommend"></input>
			<button id="details2" class="details2" type="submit" name="detailsBut2">Get Details</button>
		</form>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="profile_page_form_search" id="comm5">
		<h2 style="text-align: center;">Search</h2>
		<form action="profile.php" method="GET">            
				<div class="searchcontainer">	
                    <input list="religion" name="religionS" placeholder="Religion">
				    <datalist id="religion">
					   <option value="Muslim">
					   <option value="Hindu">
					   <option value="Christian">
					   <option value="Others">
				    </datalist>
				    <input type="number" name="ageS" placeholder="Age">
					<input list="region" name="regionS" placeholder="Region">
				    <datalist id="region">
						<option value="Barguna,Barisal">
						<option value="Barisal,Barisal">
						<option value="Bhola,Barisal">
						<option value="Jhalokati,Barisal">
						<option value="Patuakhali,Barisal">
						<option value="Pirojpur,Barisal">
						<option value="Bandarban,Chittagong">
						<option value="Brahmanbaria,Chittagong">
						<option value="Chandpur,Chittagong">
						<option value="Chittagong,Chittagong">
						<option value="Comilla District,Chittagong">
						<option value="Cox's Bazar,Chittagong">
						<option value="Feni District,Chittagong">
						<option value="Khagrachhari,Chittagong">
						<option value="Lakshmipur,Chittagong">
						<option value="Noakhali,Chittagong">
						<option value="Rangamati,Chittagong">
						<option value="Dhaka,Dhaka">
						<option value="Faridpur,Dhaka">
						<option value="Gazipur,Dhaka">
						<option value="Gopalganj,Dhaka">
						<option value="Kishoreganj,Dhaka">
						<option value="Madaripur,Dhaka">
						<option value="Manikganj,Dhaka">
						<option value="Munshiganj,Dhaka">
						<option value="Narayanganj,Dhaka">
						<option value="Narsingdi,Dhaka">
						<option value="Rajbari,Dhaka">
						<option value="Shariatpur,Dhaka">
						<option value="Tangail,Dhaka">
						<option value="Bagerhat,Khulna">
						<option value="Chuadanga,Khulna">
						<option value="Jessore,Khulna">
						<option value="Jhenaidah,Khulna">
						<option value="Khulna,Khulna">
						<option value="Kushtia,Khulna">
						<option value="Magura,Khulna">
						<option value="Meherpur,Khulna">
						<option value="Narail,Khulna">
						<option value="Satkhira,Khulna">
						<option value="Jamalpur,Mymensingh">
						<option value="Mymensingh,Mymensingh">
						<option value="Netrakona,Mymensingh">
						<option value="Sherpur,Mymensingh">
						<option value="Bogra,Rajshahi">
						<option value="Joypurhat,Rajshahi">
						<option value="Naogaon,Rajshahi">
						<option value="Natore,Rajshahi">
						<option value="Chapainawabganj,Rajshahi">
						<option value="Pabna,Rajshahi">
						<option value="Rajshahi,Rajshahi">
						<option value="Sirajgonj,Rajshahi">
						<option value="Dinajpur,Rangpur">
						<option value="Gaibandha,Rangpur">
						<option value="Kurigram,Rangpur">
						<option value="Lalmonirhat,Rangpur">
						<option value="Nilphamari,Rangpur">
						<option value="Panchagarh,Rangpur">
						<option value="Rangpur,Rangpur">
						<option value="Thakurgaon,Rangpur">
						<option value="Habiganj,Sylhet">
						<option value="Moulvibazar,Sylhet">
						<option value="Sunamganj,Sylhet">
						<option value="Sylhet,Sylhet">
				</datalist><br><br>
				    <input type="submit" name="search" value="Filter"><br><br>
                </div>
				<div class="searchedtable">
				<?php
					$output .= '  
						<div class="table-responsive">  
							<table>  
							';  
					if(!$search_result || mysqli_num_rows($search_result) > 0)  
					{  
						while($rownew = mysqli_fetch_array($search_result))  
						{  
						$output .= '  
						<td>   
							<tr><button type="button" name="s_btn" id="s_btn" class="btn btn_s" data-id1="'.$rownew["id"].'"><img src="./profileimage/'.$rownew['image'].'" /></button></td> 
						</td>  
						';  
						}
					}  
					else  
					{  
						$output .= '
						<td>  
							<tr colspan="4">No one recommended</td>  
						</td>';  
					}  
					$output .= '</table>  
						</div>';  
				echo $output;
				?>
				</div>
		</form>
		<div class="searchvalue">
		<form action="profile.php" method="post" id="opensearch">
			<input type="hidden" id="seuser" name="opensearch"></input>
			<button id="details3" class="details3" type="submit" name="detailsBut3">Get Details</button>
		</form>
		</div>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="profile_page_form_interested" id="comm6">
		<h2 style="text-align: center;">People That I'm Interested In</h2>
		<div id="info">
			<div class="table-responsive">   
                     <div id="live_data4"></div>                 
            </div>
		</div>
		<h2 style="text-align: center;">People That Interested In Me</h2>
		<div id="info2">
			<div class="table-responsive">   
                     <div id="live_data5"></div>                 
            </div>
		</div>
		<form action="profile.php" method="post" id="openinterest">
			<input type="hidden" id="intuser" name="openinterest"></input>
			<button id="details4" class="details4" type="submit" name="detailsBut4">Get Details</button>
		</form>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="profile_page_form_connected" id="comm7">
		<h2 style="text-align: center;">Connected Users</h2>
		<div id="info">
			<div class="table-responsive">   
                     <div id="live_data6"></div>                 
            </div>
		</div>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="profile_page_form_password" id="comm8">
		<h2 style="text-align: center;">Change Password</h2>
		<form class="password" method="post" action="action_page2.php">
		<div class="imgcontainer">
			<span id="changeclose" onclick="expand_2()" class="close" title="Close Modal">&times;</span>
		</div>
		
		<div class="container">
			<input type="password" placeholder="Enter Old Password" name="psw3" required>
			<input type="password" placeholder="Enter New Password" name="psw4" required>
			<input type="password" placeholder="Enter New Password Again" name="psw5" required>
        
			<button id="bpass2" onclick="document.getElementById('id03').style.display = 'block'" class="change" type="submit" name="passBut">Change</button>			
		</div>
		</form>
		
	</div>
	<div class="profile_page_form_gap2" id="commgap"></div>
	<div class="profile_page_form_contact" id="comm9">
		<p>You can contact us using the phone number/mail or you can use these links...</p>
		<div class="link">
			<a href="https://www.facebook.com/" target="_blank"><img src="link/facebook.png" alt="facebook" style="width:40px;height:40px;"/></a>
			<a href="https://plus.google.com/discover" target="_blank"><img src="link/googleplus.png" alt="google-plus" style="width:40px;height:40px;"/></a>
			<a href="https://twitter.com/?lang=en" target="_blank"><img src="link/twitter.png" alt="twitter" style="width:40px;height:40px;"/></a>
			<a href="https://www.instagram.com/" target="_blank"><img src="link/instagram.png" alt="instagram" style="width:40px;height:40px;"/></a>
			<a href="https://www.pinterest.com/login/" target="_blank"><img src="link/pinterest.png" alt="pinterest" style="width:40px;height:40px;"/></a>
			<a href="https://www.tumblr.com/login" target="_blank"><img src="link/tumblr.png" alt="tumblr" style="width:40px;height:40px;"/></a>
		</div>
		<div class="mail">
			<a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank"><img src="link/mail.png" alt="mail" style="width:40px;height:40px;"/></a>
			<p>matrimony@gmail.com</p>
		</div>
		<div class="phone">
			<img src="link/phone.png" alt="call" style="width:40px;height:40px;"/>
			<p>+8801.....</p>
		</div>
	</div>
	<div class="profile_page_form_gap"></div>
	<div class="footer">

    </div>
  </div>

</body>
</html>