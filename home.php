<?php include('action_page2.php') ?>
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
		background-image: url('background.jpg');
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
	#dot:hover, #dot1:hover, #dot2:hover, #dot3:hover, #dot4:hover, #dot5:hover, #op:hover{
		background-color: #2e4045;
		color: whitesmoke;
		padding-bottom: 35px;
	}
	
	.matrimony_main_page_form_home{
		background-color: #5e3c58;
		opacity: 0.5;
		position: relative;
        padding: 25vh 10%;
		min-height: 100vh;
		width: 100vw;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	.matrimony_main_page_form_home h1{
		padding-top: 50px;	
		font-family: Brush Script MT, Brush Script Std, cursive	;
		font-size: 9em;
		color: #391d1d;		
		z-index: 1;	
		font-variant: small-caps;
		font-stretch: expanded;
	}
	.matrimoy_main_page_form_home h3{
		font-family: Arial, Arial, sans-serif;
		font-size: 1em;
		color: #391d1d;
		z-index: 1;
		padding-left:70px;
	}
	.matrimony_main_page_form_home h1,h3{
		position: relative;				
		text-align: right;;
		font-style: italic;
	}
	.matrimony_main_page_form_home h1 span{
		color: whitesmoke;
		opacity: 100%;
		padding: 15px;
		width: 75%;
		transition: color 0.5s ease, border-radius 0.5s ease;
		border-radius: 10px;
	}
	.matrimony_main_page_form_home h1 span:hover{
		color: whitesmoke;
		border-radius: 20px;
	}
	.matrimony_main_page_form_home a{
		text-decoration: none;
	}
	/*.matrimony_main_page_form_home h3 span{
		color: whitesmoke;
		opacity: 100%;
		letter-spacing: -1px;  
		background: rgb(0, 0, 0); 
		background: rgba(0, 0, 0, 1);
		padding: 7px;
	}*/
	
	.matrimony_main_page_form_about{
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		min-height: 70vh;
        padding: 5vh 10%;
		width: 100vw;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	.matrimony_main_page_form_about h1{
		padding-top: 70px;
		font-family: Gill Sans, sans-serif;
		color: #83adb5;
		font-style: italic;
	}
	.matrimony_main_page_form_about p{
		color:white;
		font-weight: bold;
		font-family: Bradley Hand, cursive;
		padding-top: 10px;
		font-size: 20px;
	}
	
	.matrimony_main_page_form_reg{		
		background-color: #5e3c58;
		opacity: 0.95;
		position: relative;
		min-height: 70vh;
        padding-top: 20px;
		padding-bottom: 20px;
		width: 100vw;
		box-sizing: border-box;
		border: none;
		box-shadow: 0 0px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	.matrimony_main_page_form_reg h2{
          padding-bottom: 10px;
		  padding-top: 20px;
		  background-color: #5e3c58;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }
	#bl, #br{
        color: #2e4045;
        padding: 60px;
        width: 50%;
        position: relative;
        margin-top: 70px;		
        transition: background-color 0.8s ease;
		font-size: 30px;
		display: inline;

    }
    #bl:hover, #br:hover{
        background-color: #2e4045;
        color: white;
        cursor: pointer;
    }
	#br{
		float: right;
	}
	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 10px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		border-radius: 8px 8px 8px 8px;
	}
	.error{
		width: 100%;
		padding: 12px 20px;
		margin: 10px 0;
		display: inline-block;
		border: 0.5px solid #5e3c58;
		box-sizing: border-box;
	}
	#bl2, #br2 {
		background-color: #2e4045;
		color: white;
		padding: 14px 10px;
		margin: 2px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		border-radius: 8px 8px 8px 8px;
	}	
	
	
	.cancelbtn {
		width: 15%;
		padding: 10px 18px;
		background-color: #2e4045;
		color: white;
		border-radius: 8px 8px 8px 8px;
	}
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}
	img.avatar {
		width: 40%;
		border-radius: 50%;
	}
	.container {
		padding: 16px;
		width: 80%;
	}
	span.psw {
		float: right;
		padding-top: 16px;
	}
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.4);
		padding-top: 40px;
	}
	.reg {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.4);
	}
	.modal-content {
		background-color: #c7bbc9;
		margin: 5% auto 15% auto;
		border: 1px solid #888;
		width: 80%;
	}
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}
	.close:hover, .close:focus {
		color: #cc0000;
		cursor: pointer;
	}
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}
	@-webkit-keyframes animatezoom {
		from {-webkit-transform: scale(0)} 
		to {-webkit-transform: scale(1)}
	}    
	@keyframes animatezoom {
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 40%;
		}
	}
	
	.matrimony_main_page_form_search{
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
    .matrimony_main_page_form_search h2{
          padding-bottom: 12px;
		  padding-top: 12px;
		  background-color: #5e3c58;
		  color: white;
		  font-family: Bradley Hand, cursive;
    }
	#o1, #o2{
        color: #2e4045;
        width: 100%;
        position: relative;
        margin-top: 5px;
        transition: background-color 0.8s ease;
		font-size: 18px;
		text-align: center;
		padding: 12px;
    }
    #o1:hover, #o2:hover{
        background-color: #2e4045;
        color: white;
        cursor: pointer;
    }
	
	.matrimony_main_page_form_contact {
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
	.matrimony_main_page_form_contact p{
		color: white;
		padding-top:7px;
		padding-bottom: 2px;
		text-align: left;
		font-size: 20px;
		font-family: Bradley Hand, cursive;
	}
	.link{
		display: inline-block;
		padding-bottom: 15px;
	}

	
	.matrimony_main_page_form_gap{
		background-color: #5e3c58;
		opacity: 0.4;
		position: relative;
		z-index: -1;
		min-height: 20vh;
		width: 100%;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
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
                    scrollTop: $("#comm5").offset().top -100
                }, 1000);
            });
        });	
	
	var modal = document.getElementById('id01');
	window.onclick = function(event) {
		if (event.target == modal) {
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
				<button id="dot1">About</button>
            </li>
            <li>
				<button id="dot2" >Register/Login</button>
            </li>
			<li>				
				<button id="dot3">Searching For</button>
            </li>
            <li>
				<button id="dot4">Contact Us</button>
            </li>
		</div>
      </div>
    </div>
	<div class="matrimony_main_page_form_home" id="comm1">
		<center>
			<a href="home.php"><h1><span>WedLock</span></h1></a>
			<h3><span></span></h3>
		</center>
	</div>
	<div class="matrimony_main_page_form_about" id="comm2">
		<left>
			<h1>
				"Marriage is neither heaven nor hell, it is simply purgatory" -Abraham Lincoln
			</h1>
			<p>
				You believe in soulmates, so do we.
				Connect with your perfect one here
				And keep trust on us..
			</p>
		</left>
	</div>
	<div class="matrimony_main_page_form_gap"></div>
	<div class="matrimony_main_page_form_reg" id="comm3">
		<left>
			<h2 style="text-align: center;">Register and login to interact...</h2>
			<button id="bl" onclick="document.getElementById('id01').style.display='block'" >Login</button>

			<div id="id01" class="modal">
  
				<form class="modal-content animate" method="post" action="action_page2.php">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
					</div>

					<div class="container">
						<input type="text" placeholder="Enter Username" name="uname" required>

						<input type="password" placeholder="Enter Password" name="psw" required>
        
						<button id="bl2" class="log" type="submit" name="logBut">Login</button>
					</div>

					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						<span class="psw">Have your own account? <a href="#" onclick="document.getElementById('id02').style.display='block'">Sign Up</a></span>
					</div>
				</form>
			</div>
			
			<button id="br" onclick="document.getElementById('id02').style.display='block'" >Register</button>

			<div id="id02" class="reg">
  
				<form class="modal-content animate" method="post" action="action_page2.php">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
					</div>

					<div class="container">
						<input type="text" placeholder="Enter Username" name="uname" required>

						<input type="text" placeholder="Enter Email Address" name="mail" required>
						
						<input type="password" placeholder="Enter Password" name="psw" required>
						
						<input type="password" placeholder="Enter Password Again" name="psw2" required>
        
						<button id="br2" class="log" type="submit" name="regBut">Register</button>
					</div>

					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
						<span class="psw">registered before? <a href="#comm3" onclick="document.getElementById('id02').style.display='none'" >Log In</a></span>
					</div>
				</form>
			</div>
		</left>
	</div>
	<div class="matrimony_main_page_form_gap"></div>
	<div class="matrimony_main_page_form_search" id="comm4">
		<h2 style="text-align: center;">Searching For....</h2>
        <button id="o1" class="o_1" onclick="document.getElementById('id01').style.display='block'" ><div ><center>Brides</center></div></button>    
        <button id="o2" class="o_2" onclick="document.getElementById('id01').style.display='block'" ><div ><center>Bridegrooms</center></div></button>   
	</div>
	<div class="matrimony_main_page_form_gap"></div>
	<div class="matrimony_main_page_form_contact" id="comm5">
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
	<div class="matrimony_main_page_form_gap">
		
	</div>
	<div class="footer">

    </div>
  </div>
    
</body>
</html>