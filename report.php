<?php
    include 'connect.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link rel="stylesheet" href="css/style_userpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: var(--background);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: #3a78ffec;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            border: 1px solid;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-btn, .update-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
 
        /* Dropdown Button */
        .dropbtn {
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
            border: 1px solid;
            cursor: pointer;
            border-radius: 4px;
        }
 
        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border: 1px solid;
            border-radius: 4px;
        }
 
        /* Links inside the dropdown */
        .dropdown-content a {
            color: #333;
            padding: 10px;
            text-decoration: none;
            display: block;
        }
 
        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f2f2f2;
        }
 
        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
 
        /* Style the dropdown button on hover */
        .dropdown:hover .dropbtn {
            background-color: #f2f2f2;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 80px; /* Increase padding to make the popup larger */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        .popup table {
            width: 100%;
            font-size: 16px; /* Increase font size for better readability */
            border-collapse: collapse;
        }
 
        .popup th, .popup td {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            border: 1px solid;
            text-align: left;
            padding: 40px; /* Increase padding to make table cells bigger */
        }
 
        .popup th {
            background-color: #f2f2f2;
        }
 
        #exitBtn{
            background-color: #ff0000;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0 0 0;
        }
 
    </style>
</head>
 
<body>
    <header>
        <div class="header-container">
            <div class="header-wrapper">
                <div class="iconBox1">
                    <i class="fa-solid fa-arrow-left" id="userpage"></i>
                </div>    
                <div class="iconBox2">
                    <div class="dropdown">
                        <button class="dropbtn">Civil Status</button>
                        <div class="dropdown-content">
                            <a href="?status=Student">Student</a>
                            <a href="?status=Single">Single</a>
                            <a href="?status=Married">Married</a>
                        </div>
                    </div>
                <!-- Dropdown for age ranges -->
                    <div class="dropdown">
                        <button class="dropbtn">Age Range</button>
                        <div class="dropdown-content">
                            <a href="?age=18">18 age below</a>
                            <a href="?age=18plus">18 - 30 age</a>
                            <a href="?age=30">30 - 40 age</a>
                            <a href="?age=40">40 age above</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Gender</button>
                        <div class="dropdown-content">
                            <a href="?gender=Male">Male</a>
                            <a href="?gender=Female">Female</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Country</button>
                        <div class="dropdown-content">
                            <a href="?country=USA">USA</a>
                            <a href="?country=Philippines">Philippines</a>
                            <a href="?country=Russia">Russia</a>
                        </div>
                    </div>
                    <button class="dropbtn"id="totalCountBtn">Total</button>
                </div>
            </div>
        </div>
    </header>
 
    <?php if(!isset($_GET['country'])): ?>
    <div class="container">
        <h2>User Table</h2>
        <table>
            <!-- Table header -->
            <tr>
                <th>UserID</th>
                <th>Firstname</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>User Status</th>
                <?php if(isset($_GET['age']) && ($_GET['age'] == '18' || $_GET['age'] == '18plus' || $_GET['age'] == '30' || $_GET['age'] == '40')): ?>
                    <th>Age</th>
                <?php endif; ?>
            </tr>
            <?php
                // Include your database connection code
                include 'connect.php';
 
                // Initialize an array to store total counts
                $totalCountArray = array('Student' => 0, 'Single' => 0, 'Married' => 0);
 
                // Loop through each status to fetch and display total count
                foreach ($totalCountArray as $statusKey => $totalCount) {
                    // Query to fetch total count for the specific status
                    $totalCountQuery = "SELECT COUNT(*) AS total FROM tbluserprofile WHERE userstatus = '$statusKey'";
                    $totalCountResult = mysqli_query($connection, $totalCountQuery);
                    $totalCountRow = mysqli_fetch_assoc($totalCountResult);
                    $totalCountArray[$statusKey] = $totalCountRow['total'];
                }
 
                $query = null;
 
                // Check if status is set in the URL
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
 
                    // Query to fetch user data based on status from the database
                    $query = "SELECT * FROM tbluserprofile WHERE userstatus = '$status'";
                } elseif (isset($_GET['age'])) {
                    $ageRange = $_GET['age'];
 
                    // Query to fetch user data based on age range from the database
                    if ($ageRange == '18') {
                        // Age range 18 and below
                        $query = "SELECT *, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM tbluserprofile HAVING age < 18";
                    } elseif ($ageRange == '18plus') {
                        // Age range 18 - 30
                        $query = "SELECT *, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM tbluserprofile HAVING age >= 18 AND age < 30";
                    } elseif ($ageRange == '30') {
                        // Age range 30 - 40
                        $query = "SELECT *, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM tbluserprofile HAVING age >= 30 AND age < 40";
                    } elseif ($ageRange == '40') {
                        // Age range 40 above
                        $query = "SELECT *, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM tbluserprofile HAVING age >= 40";
                    }
                } else if(isset($_GET['gender'])){
                    $gender = $_GET['gender'];
 
                    // Query to fetch user data based on gender from the database
                    $query = "SELECT * FROM tbluserprofile WHERE gender = '$gender'";
                }
                else {
                    echo "<tr><td colspan='8'>Please select a status from the dropdown menu or an age range from the dropdown menu</td></tr>";
                }
                // Check if gender is set in the URL
               
                if($query){
                    $result = mysqli_query($connection, $query);
 
                    // Check if there are any records
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            // Display data from tbluserprofile
                            echo "<td>" . $row['userid'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['birthdate'] . "</td>";
                            echo "<td>" . $row['userstatus'] . "</td>";
                            if(isset($row['age'])) {
                                echo "<td>" . $row['age'] . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No users found within the specified criteria</td></tr>";
                    }

                }
            ?>
        </table>
    </div>
    <?php endif; ?>
 
    <?php if(isset($_GET['country']) && !empty($_GET['country'])): ?>
    <div class="container">
        <h2>User Profile</h2>
        <table>
            <!-- Table header -->
            <tr>
                <th>Profile ID</th>
                <th>Home Address</th>
                <th>Country</th>
                <th>User ID</th>
            </tr>
            <?php
                // Include your database connection code
                include 'connect.php';
 
                // Check if country is set in the URL
                if (isset($_GET['country'])) {
                    $country = $_GET['country'];
 
                    // Query to fetch user profile data based on country from the database
                    $query = "SELECT * FROM tblprofile WHERE country = '$country'";
 
                    $result = mysqli_query($connection, $query);
 
                    // Check if there are any records
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            // Display data from tblprofile
                            echo "<td>" . $row['profileid'] . "</td>";
                            echo "<td>" . $row['homeaddress'] . "</td>";
                            echo "<td>" . $row['country'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No profiles found for the selected country</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Please select a country from the dropdown menu</td></tr>";
                }
            ?>
        </table>
    </div>
    <?php endif; ?>
 
    <!-- Popup table for total counts -->
    <div id="popup" class="popup">
    <h2>Total Counts</h2>
    <table>
        <!-- Display total counts for each status -->
        <?php foreach ($totalCountArray as $statusKey => $totalCount): ?>
            <tr>
                <td><?= $statusKey ?></td>
                <td><?= $totalCount ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Include total counts for each gender -->
        <tr>
            <td>Male</td>
            <td>
                <?php
                // Query to fetch total count of males
                $maleCountQuery = "SELECT COUNT(*) AS male_count FROM tbluserprofile WHERE gender = 'Male'";
                $maleCountResult = mysqli_query($connection, $maleCountQuery);
                $maleCountRow = mysqli_fetch_assoc($maleCountResult);
                echo $maleCountRow['male_count'];
                ?>
            </td>
        </tr>
        <tr>
            <td>Female</td>
            <td>
                <?php
                // Query to fetch total count of females
                $femaleCountQuery = "SELECT COUNT(*) AS female_count FROM tbluserprofile WHERE gender = 'Female'";
                $femaleCountResult = mysqli_query($connection, $femaleCountQuery);
                $femaleCountRow = mysqli_fetch_assoc($femaleCountResult);
                echo $femaleCountRow['female_count'];
                ?>
            </td>
        </tr>
    </table>
    <!-- Exit button to hide the popup -->
    <button id="exitBtn">Exit</button>
</div>
 
</body>
 
   <script>
    const menu = document.getElementById("userpage");
    menu.addEventListener('click', goMenu);
 
    function goMenu(){
        window.location.href = "userpage.php";
    }
 
    // Function to handle the click event of the total count button
    document.getElementById('totalCountBtn').addEventListener('click', function() {
        // Check if country parameter exists in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const countryParam = urlParams.get('country');
        // If country parameter exists, reload the page with the country parameter preserved
        if (countryParam) {
            window.location.href = window.location.pathname + "?country=" + countryParam;
        } else {
            // Show the popup
            document.getElementById('popup').style.display = 'block';
        }
    });
 
    // Function to handle the click event of the exit button
    document.getElementById('exitBtn').addEventListener('click', function() {
        // Hide the popup
        document.getElementById('popup').style.display = 'none';
    });
</script>
 
</html>