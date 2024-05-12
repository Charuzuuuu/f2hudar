<?php
   include 'connect.php';
   require_once 'includes/header.php';
?>


<html>

	<head>
		<title> Login </title>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	
	<body class="loginbody">
		<header id = "logtitle">
			<h1> LOGIN </h1>
		</header>
		
		<div class="logform">
		<form method='post'>
			
			<div class="input-log">
				<input type="text" name="txtusername" placeholder="Username">
				<i class='bx bxs-user'></i>
			</div>
			
			<div class="input-log">
				<input type="password" id="oldpass" name="txtpassword" placeholder="Password">
				<i class='bx bxs-lock-alt' ></i>
			</div>
			
			<input type="submit" class="btn-log" name="btnLogin" value="Login">
		
		</form>
		</div>
		
		<footer class="loglink">
			<input type="submit" id="indexPage" value="Go Back to Menu">
		</footer>
	</body>

	<script>
        const ind = document.getElementById("indexPage");
        ind.onclick = goIndex;

        function goIndex(){
        window.location.href = "index.php";
		}
		</script>
</html>

<?php	
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['txtusername'];
		$pwd=$_POST['txtpassword'];
		//check tbluseraccount if username is existing
		$sql_user ="Select * from tbluseraccount where username='".$uname."'";
		$sql_admin ="Select * from tbluseradmin where username='".$uname."'";
		
		$result_user = mysqli_query($connection,$sql_user);
		$result_admin = mysqli_query($connection,$sql_admin);

		$count_user = mysqli_num_rows($result_user);
		$count_admin = mysqli_num_rows($result_admin);

		$row_user = mysqli_fetch_array($result_user);
		$row_admin = mysqli_fetch_array($result_admin);

		$hashed_password_user = $row_user['password'];
		$hashed_password_admin = $row_admin['password'];
		
		if($count_user == 0 && $count_admin == 0){
			?>
			<script>
				swal({
					title: "Failed",
					text: "Username not existing",
					icon: "error",
				});
			</script> 
			<?php
		}else if(!password_verify($pwd, $hashed_password_user) && !password_verify($pwd, $hashed_password_admin))	 {
			?>
			<script>
				swal({
					title: "Failed",
					text: "Incorrect password",
					icon: "error",
				});
			</script> 
			<?php
		}else{
			session_start();
			// Fetch the username from tbluseraccount
			$sql_user = "SELECT * FROM tbluseraccount WHERE username='".$uname."'";
			$result_user = mysqli_query($connection, $sql_user);
			$count_user = mysqli_num_rows($result_user);
			
			if ($count_user > 0) {
				// Fetch the row from the result set
				$row_user = mysqli_fetch_array($result_user);
				// Set the session username to the fetched username
				$userID = $row_user['acctid'];
			} 

			$sql_acc = "SELECT * FROM tbluserprofile WHERE userid='".$userID."'";
			$result_acc = mysqli_query($connection, $sql_acc);
			$count_acc = mysqli_num_rows($result_acc);

			$sql_acc2 = "SELECT * FROM tblprofile WHERE profileid='".$userID."'";
			$result_acc2 = mysqli_query($connection, $sql_acc2);
			$count_acc2 = mysqli_num_rows($result_acc2);

			if ($count_acc2 > 0) {
				$row_acc = mysqli_fetch_array($result_acc);
				$row_acc2 = mysqli_fetch_array($result_acc2);
				$_SESSION['userid'] = $row_acc['userid'];
				$_SESSION['firstname'] = $row_acc['firstname'];
				$_SESSION['lastname'] = $row_acc['lastname'];
				$_SESSION['gender'] = $row_acc['gender'];
				$_SESSION['emailadd'] = $row_acc['emailadd'];
				$_SESSION['birthdate'] = $row_acc['birthdate'];
				$_SESSION['userstatus'] = $row_acc['userstatus'];
				$_SESSION['hobbies'] = $row_acc2['hobbies'];
				$_SESSION['homeaddress'] = $row_acc2['homeaddress'];
				$_SESSION['country'] = $row_acc2['country'];
				$_SESSION['contactnumber'] = $row_acc2['contactnumber'];

				header("location: userpage.php");
			}else{
				header("location: dashboard.php");
			} 
		}
	}
?>

<?php include_once("includes/footer.php"); ?>
