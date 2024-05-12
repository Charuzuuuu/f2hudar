
<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/confirm.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>

<header>
        <div class="header-container">
            <div class="header-wrapper">
                <div class="iconBox1">
                    <i class="fa-solid fa-arrow-left" id="profile"></i>
                </div>
                <div class="iconBox2">
                    <i class="fa-solid fa-circle-half-stroke" id="darkTheme"></i>
                </div>
            </div>
        </div>
    </header>

    <div class="main">
    <h2>
           CONFIRMATION PAGE
    </h2>
    </div>


<?php
    // Get the edited status from the POST data
    $editedStatus = $_POST['editedStatus'];
    $editedEmail = $_POST['editedEmail'];
    $editedNum = $_POST['editedNum'];
    $editedHome = $_POST['editedHome'];
    $editedCountry = $_POST['editedCountry'];
    $editedHobby = $_POST['editedHobby'];

    // Create a form
    echo "<form method='post' class='confo'>";
    echo "<div><label for='editedStatus'>Modified Civil Status:</label>";
    echo "<input type='text' id='editedStatus' name='editedStatus' value='" . htmlspecialchars($editedStatus) . "' readonly></div>";
    echo "<div><label for='editedEmail'>Modified Email:</label>";
    echo "<input type='text' id='editedEmail' name='editedEmail' value='" . htmlspecialchars($editedEmail) . "' readonly></div>";
    echo "<div><label for='editedNum'>Modified Contact Number:</label>";
    echo "<input type='text' id='editedNum' name='editedNum' value='" . htmlspecialchars($editedNum) . "' readonly></div>";
    echo "<div><label for='editedHome'>Modified Home Address:</label>";
    echo "<input type='text' id='editedHome' name='editedHome' value='" . htmlspecialchars($editedHome) . "' readonly></div>";
    echo "<div><label for='editedCountry'>Modified Country:</label>";
    echo "<input type='text' id='editedCountry' name='editedCountry' value='" . htmlspecialchars($editedCountry) . "' readonly></div>";
    echo "<div><label for='editedHobby'>Modified Hobby:</label>";
    echo "<input type='text' id='editedHobby' name='editedHobby' value='" . htmlspecialchars($editedHobby) . "' readonly></div>";
    echo "<div><button class='confirmbtn' name='confirmbtn'>Confirm Changes</button></div>";
    echo "</form>";


    session_start();
    $userid = $_SESSION['userid'];

    // Check if the confirm button was clicked
    if(isset($_POST['confirmbtn'])){

        // Prepare your SQL statements
        $sql1 = "UPDATE tblprofile SET ";
        $sql2 = "UPDATE tbluserprofile SET ";

        // Check each variable individually
        if(isset($_POST['editedHome']) && $_POST['editedHome'] != "") {
            $sql1 .= "homeaddress = '$editedHome', ";
        }
        if(isset($_POST['editedHobby']) && $_POST['editedHobby'] != "") {
            $sql1 .= "hobbies = '$editedHobby', ";
        }
        if($_POST['editedCountry'] && $_POST['editedCountry'] != "") {
            $sql1 .= "country = '$editedCountry', ";
        }
        if($_POST['editedNum'] && $_POST['editedNum'] != "") {
            $sql1 .= "contactnumber = '$editedNum', ";
        }
        if($_POST['editedStatus'] && $_POST['editedStatus'] != "") {
            $sql2 .= "userstatus = '$editedStatus', ";
        }
        if($_POST['editedEmail'] && $_POST['editedEmail'] != "") {
            $sql2 .= "emailadd = '$editedEmail', ";
        }

        if ($sql1 != "UPDATE tblprofile SET ") {
            $sql1 = rtrim($sql1, ", ") . " WHERE user_id = '$userid'";
            if ($connection->query($sql1) !== TRUE) {
                echo "Error updating record: " . $connection->error;
            }
        }

        if ($sql2 != "UPDATE tbluserprofile SET ") {
            $sql2 = rtrim($sql2, ", ") . " WHERE userid = '$userid'";
            if ($connection->query($sql2) !== TRUE) {
                echo "Error updating record: " . $connection->error;
            }
        }
        
        $connection->close();

        header("location: profile.php");
    }
?>

<script>
        const menu = document.getElementById("profile");
        menu.onclick = goProfile;

        const dark = document.getElementById("darkTheme");
        dark.onclick = setDark;

        function goProfile(){
        window.location.href = "editprofile.php";
        }

        function setDark(){
        dark.classList.toggle("button-Active");
        document.body.classList.toggle("dark-color");
        }
    </script>
    
</body>
</html>