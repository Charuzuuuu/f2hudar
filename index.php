<?php
   include 'connect.php';
?>
			
<html>

		<head>
			<title> Visual Vibe </title>
			
			<link rel="stylesheet" href="css/style.css">
		</head>
		
		<body class="indexbody">
			<header id="webtitle">
				<h1> VISUAL VIBE </h1>
			</header>
			
		<div class="container">
			<input type="submit" id="registerPage" value="Register">
			<input type="submit" id="loginPage" value="Login">
		</div>
			
		</body>

		<script>
        const reg = document.getElementById("registerPage");
        reg.onclick = goRegister;

        const log = document.getElementById("loginPage");
        log.onclick = goLog;

        function goRegister(){
        window.location.href = "register.php";
        }

        function goLog(){
        window.location.href = "login.php";
		}
		</script>
		
	</html>

	<?php include_once("includes/footer.php"); ?>