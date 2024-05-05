<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style_profile.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>

    <header>
        <div class="header-container">
            <div class="header-wrapper">
                <div class="iconBox1">
                    <i class="fa-solid fa-arrow-left" id="menu"></i>
                </div>
                <div class="iconBox2">
                    <i class="fa-solid fa-circle-half-stroke" id="darkTheme"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <div class="main">
        <h2>
            <?php
            session_start();
            if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                // Display the username instead of "USER PAGE"
                echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "'s Profile";
            } else {
                // Display a default message if the username is not set
                echo "USER PROFILE";
            }
            ?>
        </h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                    <?php
                    if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['gender']) && isset($_SESSION['birthdate']) && isset($_SESSION['emailadd']) && isset($_SESSION['userstatus'])
                     && isset($_SESSION['country']) && isset($_SESSION['contactnumber']) && isset($_SESSION['hobbies']) && isset($_SESSION['homeaddress'])){
                        // Loop through each row of data
                            echo "<tr>";
                            // Display data from tbluserprofile
                            echo "<td class='titolo'>Full Name</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['firstname'] . " " . $_SESSION['lastname'] ."</td>";
                            echo "</tr>";   
                            echo "<tr>";
                            echo "<td class='titolo'>Email</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['emailadd'] . "</td>";
                            echo "</tr>";   
                            echo "<tr>";
                            echo "<td class='titolo'>Home Address</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['homeaddress'] . "</td>";
                            echo "</tr>";  
                            echo "<tr>";
                            echo "<td class='titolo'>Birth Date</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['birthdate'] . "</td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Gender</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['gender'] . "</td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>User Status</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['userstatus'] . "</td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Country</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['country'] . "</td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Hobbies</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['hobbies'] . "</td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Contact Number</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td>" . $_SESSION['contactnumber'] . "</td>";
                            echo "</tr>"; 
                            
                    } else {
                        echo "<tr><td colspan='9'>No users found</td></tr>";
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const menu = document.getElementById("menu");
        menu.onclick = goMenu;

        const dark = document.getElementById("darkTheme");
        dark.onclick = setDark;

        function goMenu(){
        window.location.href = "userpage.php";
        }

        function setDark(){
        dark.classList.toggle("button-Active");
        document.body.classList.toggle("dark-color");
        }
    </script>
</body>
</html>