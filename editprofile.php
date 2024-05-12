<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style_editprofile.css">
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

    <!-- Main -->
    <div class="main">
        <h2>
            <?php
            session_start();
            if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                // Display the username instead of "USER PAGE"
                echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "'s Profile Edit Page";
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

                        $userid = $_SESSION['userid'];

                        // Prepare your SQL statements
                        $sql1 = "SELECT * FROM tblprofile WHERE user_id = '$userid'";
                        $sql2 = "SELECT * FROM tbluserprofile WHERE userid = '$userid'";

                        // Execute the statements
                        $result1 = $connection->query($sql1);
                        $result2 = $connection->query($sql2);


                        // Fetch the data
                        if ($result1->num_rows > 0 && $result2->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                            $row2 = $result2->fetch_assoc();

                            // Now you can use $row1 and $row2 to access your data
                            echo "<tr>";
                            echo "<td class='titolo'>First Name</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['firstname'] . "</td>";
                            echo "<td class='ed'><button class='cantbtn'>Cannot Edit</button></td>";
                            echo "</tr>";  
                            // ... repeat for other fields ...
                            echo "</tr>";  
                            echo "<tr>"; 
                            echo "<td class='titolo'>Last Name</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['lastname'] . "</td>";
                            echo "<td class='ed'><button class='cantbtn'>Cannot Edit</button></td>";
                            echo "</tr>";    
                            echo "<tr>";
                            echo "<td class='titolo'>Birth Date</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['birthdate'] . "</td>";
                            echo "<td class='ed'><button class='cantbtn'>Cannot Edit</button></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Gender</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['gender'] . "</td>";
                            echo "<td class='ed'><button class='cantbtn'>Cannot Edit</button></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Home Address</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row1['homeaddress'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editHome()'>Update</button><p id='demo5'></p></td>";
                            echo "</tr>";  
                            echo "<tr>";
                            echo "<td class='titolo'>Email</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['emailadd'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editEmail()'>Update</button><p id='demo6'></p></td>";
                            echo "</tr>";  
                            echo "<tr>";
                            echo "<td class='titolo'>User Status</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row2['userstatus'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editStatus()'>Update</button><p id='demo4'></p></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Country</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row1['country'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editCountry()'>Update</button><p id='demo2'></p></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Hobbies</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row1['hobbies'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editHobby()'>Update</button><p id='demo1'></p></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='titolo'>Contact Number</td>";
                            echo "<td class='punct'>:</td>";
                            echo "<td class='content'>" . $row1['contactnumber'] . "</td>";
                            echo "<td class='ed'><button class='edbtn' onclick='editNum()'>Update</button><p id='demo3'></p></td>";
                            echo "</tr>"; 
                            echo "<tr>";
                            echo "<td class='sub' colspan='5'><button class='submitbtn' onclick='submit()'>Submit</button></td>";
                            echo "</tr>"; 
                        } else {
                            echo "<tr><td colspan='9'>No users found</td></tr>";
                        }

                        // Close the connection
                        $connection->close();
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="js/editprofile.js"></script>

    <script>
        const menu = document.getElementById("profile");
        menu.onclick = goProfile;

        const dark = document.getElementById("darkTheme");
        dark.onclick = setDark;

        function goProfile(){
        window.location.href = "profile.php";
        }

        function setDark(){
        dark.classList.toggle("button-Active");
        document.body.classList.toggle("dark-color");
        }
    </script>
</body>
</html>