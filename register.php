<?php    
    include 'connect.php';    
    require_once 'includes/header.php';
?>
<html>

    <head>
        <title> Registration </title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    </head>
    
    <body class="regbody">
        
        <header id = "regtitle">
            <h1> REGISTRATION </h1>
        </header>
        
        <div class="regform">
        <form method="post">
            <div class="input-reg">
            Firstname:<input type="text" name="txtfirstname"><br>
            </div>  
            <div class="input-reg">
            Lastname:<input type="text" name="txtlastname"> <br>    
            </div>
            <div class="input-reg">
            Birthdate(YYYY-MM-DD):<input type="text" name="txtbirthdate"> <br>    
            </div>
            <div class="input-reg">
            Civil Status:<input type="text" name="txtuserstatus"> <br>    
            </div>
            <div class="input-reg">  
            Gender:
            <select name="txtgender">
            <option value="">----</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select><br>
            </div>
            <div class="input-reg">
            Email Address:<input type="text" name="txtemail">    
            </div>
            <div class="input-reg">
                Username:<input type="text" name="txtusername">
            </div>
            
            <div class="input-reg">
                Password:<input type="password" name="txtpassword">
            </div>
            
            <div class="btn-reg">
                <input type="submit" name="btnRegister" value="Register">
            </div>
        
        </form>
        </div>
        
        
        <footer class="reglink">
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
    if(isset($_POST['btnRegister'])){        
        //retrieve data from form and save the value to a variable
        //for tbluserprofile
        $fname=$_POST['txtfirstname'];        
        $lname=$_POST['txtlastname'];
        $gender=$_POST['txtgender'];
        $birthdate=$_POST['txtbirthdate'];
        $userstatus=$_POST['txtuserstatus']; // This is for civil status
        $status = 1; // Default status
        
        $email=$_POST['txtemail'];        
        
        //for tbluseraccount        
        $uname=$_POST['txtusername'];
        $pword=$_POST['txtpassword'];

        $hashed_password = password_hash($pword, PASSWORD_DEFAULT);
        
        //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true. (or emailadd='".$email."'";)
        $sql_acc ="SELECT * FROM tbluseraccount WHERE username='".$uname."'";  
        $result_acc = mysqli_query($connection,$sql_acc);
        $row_acc = mysqli_num_rows($result_acc);

        //Check tbluserprofile if email is already existing. Save info if false. Prompt msg if true.
        $sql_prof ="SELECT * FROM tbluserprofile WHERE emailadd='".$email."'";
        $result_prof = mysqli_query($connection,$sql_prof);
        $row_prof = mysqli_num_rows($result_prof);

        if($row_acc == 0 && $row_prof == 0){
            //save data to tbluserprofile            
            $sql1 ="INSERT INTO tbluserprofile(firstname, lastname, gender, emailadd, birthdate, userstatus, status) VALUES ('".$fname."','".$lname."','".$gender."','".$email."','".$birthdate."','".$userstatus."', '".$status."')";
            mysqli_query($connection,$sql1);

            $last_id = mysqli_insert_id($connection);

            $sql ="INSERT INTO tbluseraccount(user_id_2, username, password) VALUES ('".$last_id."','".$uname."','".$hashed_password."')";
            mysqli_query($connection,$sql);

            $sql2 = "INSERT INTO tblprofile(user_id, homeaddress, country, contactnumber, hobbies) VALUES ('".$last_id."',DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
            mysqli_query($connection,$sql2);

            ?>
            <script>
                swal({
                    title: "Success",
                    text: "Registered Successfully",
                    icon: "success",
                }).then(function() {
                    window.location.href = "login.php";
                });
            </script> 
            <?php

        } else {
            ?>
            <script>
                swal({
                    title: "Failed",
                    text: "Username or Email already exists",
                    icon: "error",
                });
            </script> 
            <?php
        }            
    }        
?>

<?php include_once("includes/footer.php"); ?>
