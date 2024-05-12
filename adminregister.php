<?php    
    include 'connect.php';    
    require_once 'includes/header.php';
?>
<html>

    <head>
        <title> Admin Registration </title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    </head>
    
    <body class="regbody">
        
        <header id = "regtitle">
            <h1> Admin Registration </h1>
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
            <input type="submit" id="adminPage" value="Go Back to Admin Page">
        </footer>

        <script>
        const ind = document.getElementById("adminPage");
        ind.onclick = goAdmin;

        function goAdmin(){
        window.location.href = "dashboard.php";
		}
		</script>
        
    </body>
    
</html>


<?php
    if(isset($_POST['btnRegister'])){
        include 'connect.php'; // Include your database connection
        
        // Retrieve data from form and save the value to a variable
        // for tbladmin
        $fname=$_POST['txtfirstname'];        
        $lname=$_POST['txtlastname'];
        $gender=$_POST['txtgender'];
        $email=$_POST['txtemail'];        

        // for tbluseradmin      
        $uname=$_POST['txtusername'];
        $pword=$_POST['txtpassword'];

        $hashed_password = password_hash($pword, PASSWORD_DEFAULT);
        
        // Check tbluseraccount if username is already existing
        $sql_acc ="SELECT * FROM tbluseradmin WHERE username='".$uname."'";  
        $result_acc = mysqli_query($connection,$sql_acc);
        $row_acc = mysqli_num_rows($result_acc);

        // Check tbladmin if email is already existing
        $sql_prof ="SELECT * FROM tbladmin WHERE emailadd='".$email."'";
        $result_prof = mysqli_query($connection,$sql_prof);
        $row_prof = mysqli_num_rows($result_prof);

        if($row_acc == 0 && $row_prof == 0){
            // Save data to tbladmin table            
            $sql1 ="INSERT INTO tbladmin(firstname, lastname, gender, emailadd) VALUES ('".$fname."','".$lname."','".$gender."','".$email."')";
            mysqli_query($connection,$sql1);

            // Save data to tbluseradmin table
            $sql ="INSERT INTO tbluseradmin(username, password) VALUES ('".$uname."','".$hashed_password."')";
            mysqli_query($connection,$sql);

            ?>
            <script>
                swal({
                    title: "Success",
                    text: "Registered Successfully",
                    icon: "success",
                }).then(function() {
                    window.location.href = "dashboard.php";
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
