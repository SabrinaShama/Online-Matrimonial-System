<?php 
	include('action_page2.php');
	$username = $_SESSION['username'];
	if(isset($_POST['detailsBut']))
	{
			$_SESSION['image'] = $_POST['openuser'];
			header('location: adminview.php');
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
		background-image: url('background4.jpg');
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
	#dot, #dot1, #dot2, #dot3, #dot4, #dot5{
		padding-top: 20px;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 18px;
		opacity: 0.85;
		border-radius: 0px 0px 8px 8px;
	}
	#dot:hover, #dot1:hover, #dot2:hover, #dot3:hover, #dot4:hover, #op:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	#dot5:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
		border-radius: 0px 0px 0px 0px;
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
		margin-left:633px;
	}
	.dropdown-content2 button{
		color: #2e4045;
		padding: 14px 32px;
		text-decoration: none;
		display: block;
		text-align: right;
		opacity: 0.85;
	}
	#dp2{
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
	
	.admin_page_form_home{
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
	.admin_page_form_home p{
		font-family: Bradley Hand, cursive;
		font-size: 4em;
		color: #000000;
		text-align: right;
		color: black;
	}
	
	.admin_page_form_reg{
		display: block;
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
	.admin_page_form_reg p{
		font-family: Bradley Hand, cursive;
		font-size: 3em;
		color: #000000;
		text-align: right;
	}	
	.admin_page_form_reg h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  margin-bottom: 15px;
		  font-family: Bradley Hand, cursive;
    }
	.admin_page_form_reg h3{
          width: 70%;
		  color: #c7bbc9;
		  margin-bottom: 20px;
		  margin-top: 30px;
		  font-family: Bradley Hand, cursive;
    }
	
	.admin_page_form_account{
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
    .admin_page_form_account h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  margin-bottom: 15px;
		  font-family: Bradley Hand, cursive;
    }
	.btn_user{
		border: none;
		background-color: Transparent;
		color: black;
	}
	.btn_user:hover{
		border: none;
		background-color: #2e4045;
		color: white;
	}
	img{
		margin: 5px;
		width: 250px;
		height: 300px;
	}
	#openuser{
		height: 200px;
		display: block;
		width: 100%;
	}
	#searchuser{
		margin-top: 70px;
		width: 30%;
	}
	#details{
		width: 16%;
		padding: 14px;
		margin: 100px; 
		position:relative;
		text-align: center;
		top:3%; 
		left:35%;
		border-radius: 8px 8px 8px 8px;
	}
	
	.admin_page_form_interest{
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
    .admin_page_form_interest h2{
          width: 70%;
		  background-color: #2e4045;
		  color: white;
		  margin-bottom: 15px;
		  font-family: Bradley Hand, cursive;
    }
	.admin_page_form_interest h3{
          width: 70%;
		  color: #c7bbc9;
		  margin-bottom: 20px;
		  margin-top: 30px;
		  font-family: Bradley Hand, cursive;
    }
	.{
		border: none;
		background-color: Transparent;
		color: black;
	}
	.:hover{
		border: none;
		background-color: #2e4045;
		color: white;
	}
	img{
		margin: 5px;
		width: 250px;
		height: 300px;
	}
    
	.admin_page_form_password{
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
	#bpassadmin{
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
	#bpassadmin:hover{
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
	
	.admin_page_form_contact {
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
	.admin_page_form_contact p{
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
	
	table {
		border-collapse: collapse;
		width: 100%;
		background-color: #c7bbc9;
		opacity: 30%;
	}
	
	.admin_page_form_gap{
		background-color: #5e3c58;
		opacity: 0.4;
		position: relative;
		z-index: -1;
		min-height: 20vh;
		width: 100%;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	
	.admin_page_form_gap2{
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
            $("#dot2").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm3").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot3").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm4").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot4").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm6").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#bchan").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm5").offset().top -100
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
	$(document).ready(function (){
            $("#dp1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm5").offset().top -100
                }, 1000);
            });
        });
	
	function expand_1(){
		document.getElementById("comm5").style.display = 'block';
		document.getElementById("commgap").style.display = 'block';
    }
	
	function expand_2(){
		document.getElementById("comm5").style.display = 'none';
		document.getElementById("commgap").style.display = 'none';
    }
	
	$(document).ready(function(){  
		function fetch_data()  
		{  
			$.ajax({  
                url:"control.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data').html(data);  
                }  
			});  
		}
		fetch_data();
		$(document).on('click', '.btn_delete', function(){  
			var id=$(this).data("id4");  
			if(confirm("Are you sure you want to delete this?"))  
			{  
                $.ajax({  
                    url:"delete.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){  
						alert(data);  
                        fetch_data();  
                    }  
                });  
           }  
		});
		$(document).on('click', '.btn_user', function(){  
			var id=$(this).data("id1");   
                $('html, body').animate({
                    scrollTop: $("#details").offset().top -100
                }, 1000);
				$.ajax({  
                    url:"open.php",
					async: false,
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){
						$('#searchuser').val(data);
						$('#searchuser2').html(data);
                    }  
                });  
		});
	});
	
	$(document).ready(function(){  
		function fetch_data2()  
		{  
			$.ajax({  
                url:"controlreg.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data2').html(data);  
                }  
			});  
		}
		fetch_data2();
		$(document).on('click', '.btn_permit', function(){  
			var id=$(this).data("id4");  
			if(confirm("Are you sure you want to permit this?"))  
			{  
                $.ajax({  
                    url:"permit.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){  
						alert(data);  
                        fetch_data2();  
                    }  
                });  
           }  
		});
	});
	
	$(document).ready(function(){  
		function fetch_data3()  
		{  
			$.ajax({  
                url:"controlinterestadmin.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data3').html(data);  
                }  
			});  
		}
		fetch_data3();
		$(document).on('click', '.btn_contact', function(){  
			var id=$(this).data("id3");  
			if(confirm("Are you sure?"))  
			{  
                $.ajax({  
                    url:"accept.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data){  
						alert(data);  
                        fetch_data3();  
                    }  
                });  
           }  
		});
	});
	
	$(document).ready(function(){  
		function fetch_data3()  
		{  
			$.ajax({  
                url:"controlregall.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data4').html(data);  
                }  
			});  
		}
		fetch_data3();
	});
	
	$(document).ready(function(){  
		function fetch_data3()  
		{  
			$.ajax({  
                url:"controlconnected.php",  
                method:"POST",  
                success:function(data){  
                    $('#live_data5').html(data);  
                }  
			});  
		}
		fetch_data3();
	});
	
  </script>
</head>

<body>
  <div class="main_page_parallax">
    <div class="matrimony_title_bar_navigator">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-offset-4"> 
            <li class="active">
				<button id="dot">Home</button>
			</li>
			<li>
				<button id="dot1">Registration Info</button>
            </li>
			<li>				
				<button id="dot2">Account Info</button>
            </li>
			<li>				
				<button id="dot3">Interested Accounts</button>
            </li>
            <li>
				<button id="dot4">Contact Us</button>
            </li>
			<li class="dropdown2">				
				<button class="dropbtn2" id="dot5">Settings &#9660;</button>
				<div class="dropdown-content2">
					<button id = "dp1" onclick="expand_1()">Change Password</button>
					<a href="profile.php?logout='1'" class="lout"><button id = "dp2">Log Out</button></a>
				</div>
            </li>
		</div>
      </div>
    </div>
	<div class="admin_page_form_home" id="comm1">
		<?php  if (isset($_SESSION['username'])) : ?>
			<p><strong><?php echo 'ADMIN PANEL'; ?></strong></p>
		<?php endif ?>
	</div>
	
	<div class="admin_page_form_reg" id="comm2">
		<h2 class="information" style="text-align: center;">Registration Information</h2>
		<div id="info">
			<h3 style="text-align: center;">Permission Table</h3>
			<div class="table-responsive">   
                     <div id="live_data2"></div>                 
            </div>
			<h3 style="text-align: center;">Registration Table</h3>
			<div class="table-responsive">   
                     <div id="live_data4"></div>                 
            </div>
		</div>
	</div>
	<div class="admin_page_form_gap"></div>
	<div class="admin_page_form_account" id="comm3">
		<h2 class="information" style="text-align: center;">Account Information</h2>		
		<div id="info">
			<div class="table-responsive">   
                     <div id="live_data"></div>                 
            </div>
		</div>
		<form action="adminpro.php" method="post" id="openuser">
			<input type="hidden" id="searchuser" name="openuser"></input>
			<button id="details" class="details" type="submit" name="detailsBut">Get Details</button>
		</form>
	</div>
	<div class="admin_page_form_gap"></div>
	<div class="admin_page_form_interest" id="comm4">
		<h2 class="information" style="text-align: center;">Interested Accounts</h2>		
		<div id="info">
			<h3 style="text-align: center;">Contact Permission Table</h3>
			<div class="table-responsive">   
                     <div id="live_data3"></div>                 
            </div>
			<h3 style="text-align: center;">Connected Account Table</h3>
			<div class="table-responsive">   
                     <div id="live_data5"></div>                 
            </div>
		</div>
	</div>
	<div class="admin_page_form_gap"></div>
	<div class="admin_page_form_password" id="comm5">
		<h2 style="text-align: center;">Change Password</h2>
		<form class="password" method="post" action="action_page2.php">
		<div class="imgcontainer">
			<span id="changeclose" onclick="expand_2()" class="close" title="Close Modal">&times;</span>
		</div>
		
		<div class="container">
			<label><b>Old Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw6" required>
			
			<label><b>New Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw7" required>
						
			<label><b>Confirm Password</b></label>
			<input type="password" placeholder="Enter Again" name="psw8" required>
        
			<button id="bpassadmin" class="change" type="submit" name="passBut2">Change</button>
		</div>
		</form>
	</div>
	<div class="admin_page_form_gap2" id="commgap"></div>
	<div class="admin_page_form_contact" id="comm6">
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
	<div class="admin_page_form_gap"></div>
	<div class="footer">

    </div>
  </div>

</body>
</html>