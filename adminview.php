<?php
    include('open.php');
	$sname = $_SESSION['image'];
    $sresult = mysqli_query($db, "SELECT * FROM profile WHERE image='$sname' limit 1");
    $srow = mysqli_fetch_array($sresult);
    
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Matrimony</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
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
	#dot, #dot1, #dot2{
		padding-top: 20px;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 18px;
		opacity: 0.85;
		border-radius: 0px 0px 8px 8px;
	}
	#dot:hover, #dot1:hover, #dot2:hover, #op:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	
	.adminview_page_form_home{
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
	.adminview_page_form_home p{
		font-family: Bradley Hand, cursive;
		font-size: 3em;
		color: #000000;
		text-align: right;
		color: black;
	}
	
	.adminview_page_form_profile{
		display: block;
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		z-index: -1;
        padding-top: 30px;
		min-height: 140vh;
		width: 100%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
		padding-bottom: 30px;
	}
	.adminview_page_form_profile p{
		font-family: Bradley Hand, cursive;
		font-size: 1em;
		color: #2e4045;
		text-align: left;
	}	
	.adminview_page_form_profile h2{
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
	
	.adminview_page_form_contact {
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
	.adminview_page_form_contact p{
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
	
	.adminview_page_form_gap{
		background-color: #5e3c58;
		opacity: 0.4;
		position: relative;
		z-index: -1;
		min-height: 20vh;
		width: 100%;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
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
	
  </script>
</head>

<body>
  <div class="main_page_parallax">
    <div
	class="matrimony_title_bar_navigator">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-offset-8"> 
            <li class="active">
				<button id="dot">Home</button>
			</li>
			<li>
				<button id="dot1">Profile</button>
            </li>
            <li>
				<button id="dot2">Contact Us</button>
            </li>
		</div>
      </div>
    </div>
	<div class="adminview_page_form_home" id="comm1">
		
        <?php  if (isset($_SESSION['image'])) : ?>
			<p><strong><?php echo $srow['name']; ?></strong></p>
		<?php endif ?>
		
	</div>
	
	<div class="adminview_page_form_profile" id="comm2">
		<h2 class="profile" style="text-align: center;">PROFILE</h2>
		
		<div id="info">
			<div id="right">
				<?php
                echo '<img src="./profileimage/'.$srow['image'].'" />';
				?>
			</div>
			<div id="left">				
					<p><strong> Name </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['name']; ?> </p>
					<p><strong> Gender </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['gender']; ?></p>
					<p><strong> Birthdate </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['bday']; ?></p>
					<p><strong> Age </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['age']; ?></p>
					<p><strong> Lives in </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['living']; ?></p>
					<p><strong> Birthplace </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['birth']; ?></p>
					<p><strong> Marital Status </strong>&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['marital']; ?></p>
					<p><strong> Religion </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['religion']; ?></p>
					<p><strong> Education Level </strong>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['edulevel']; ?></p>
					<p><strong> Education Field </strong>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['edufield']; ?></p>
					<p><strong> Working Position </strong>&nbsp; : &nbsp;&nbsp; <?php echo $srow['work']; ?></p>
					<p><strong> Income </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['income']; ?></p>
					<p><strong> Height </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['height']; ?></p>
					<p><strong> Weight </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['weight']; ?></p>
					<p><strong> Body Type </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['body']; ?></p>
					<p><strong> Skin Type </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['skin']; ?></p>
					<p><strong> Disability </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['disability']; ?></p>
					<p><strong> Smoking </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['smoking']; ?></p>
					<p><strong> Drinking </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['drinking']; ?></p>
					<p><strong> Social Class </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['class']; ?></p>
					<p><strong> Mobile </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $srow['mobile']; ?></p>
			</div>
			
		</div>
		
	</div>
	<div class="adminview_page_form_gap"></div>
	<div class="adminview_page_form_contact" id="comm3">
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
	<div class="adminview_page_form_gap"></div>
	<div class="footer">

    </div>
  </div>

</body>
</html>