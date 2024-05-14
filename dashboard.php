<?php
    include 'connect.php';
?>

<?php
    // Check if deactivate button is clicked for user
    if (isset($_POST['deactivate1'])) {
        $userID = $_POST['userID'];
        
        // Deactivate user account in the database
        $queryDeactivateProfile = "UPDATE tbluserprofile SET status = 0 WHERE userid = '$userID'";
        mysqli_query($connection, $queryDeactivateProfile);
        
        // Refresh the page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>

<?php
    // Check if deactivate button is clicked for admin
    if (isset($_POST['deactivate2'])) {
        $adminID = $_POST['adminID'];
        
        // Deactivate admin account in the database
        $queryDeactivateAdmin = "UPDATE tbladmin SET status = 0 WHERE adminid = '$adminID'";
        mysqli_query($connection, $queryDeactivateAdmin);
        
        // Refresh the page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>

<?php
    // Check if update password button is clicked
    if (isset($_POST['update'])) {
        $adminID = $_POST['adminID'];
        $newPassword = $_POST['newPassword'];

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password hash in the database
        $queryUpdatePassword = "UPDATE tbluseradmin SET password = '$hashedPassword' WHERE useradminID = '$adminID'";
        mysqli_query($connection, $queryUpdatePassword);
        // Refresh the page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>

<?php
    if (isset($_POST['activate'])) {
        $userID = $_POST['userID'];
        
        // Activate user account in the database
        $queryActivateProfile = "UPDATE tbluserprofile SET status = 1 WHERE userid = '$userID'";
        mysqli_query($connection, $queryActivateProfile);
        
        // Refresh the page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
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
            border: 2px solid;
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
        .delete-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-btn {
            background-color: #87A922;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .activate-btn {
            background-color: #87A922;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .activate-btn-grey {
            background-color: #848884;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn-grey {
            background-color: #848884;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
 
        button{
            margin: 10px;
        }
        

    </style>
    <link rel="stylesheet" href="css/style_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>

    <header>
        <div class="header-container">
            <div class="header-wrapper">
                <div class="iconBox1">
                    <i class="fa-solid fa-arrow-left" id="loginpage"></i>
                </div>
                <div class="iconBox2">
                    <div>
                        <i class="fa-solid fa-circle-plus" id="report"></i>
                    </div>
                    <div>
                        <i class="fa-solid fa-plus" id="add_admin"></i>
                        <label id="dash_label">Add New Admin</label>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
    <h2>User Table</h2>
    <table>
        <tr>
            <th>UserID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>User Status</th>
            <th>AccountID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th> <!-- Added column for delete button -->
        </tr>
        <?php
            // Query to fetch user data from the database for active users
            $query1 = "SELECT * FROM tbluserprofile"; // Fixed missing closing quote
            $result1 = mysqli_query($connection, $query1);

            $query2 = "SELECT * FROM tbluseraccount";
            $result2 = mysqli_query($connection, $query2);

            // Check if there are any active records
            if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
                // Loop through each row of data
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    echo "<tr>";
                    // Display data from tbluserprofile
                    echo "<td>" . $row1['userid'] . "</td>";
                    echo "<td>" . $row1['firstname'] . "</td>";
                    echo "<td>" . $row1['lastname'] . "</td>";
                    echo "<td>" . $row1['gender'] . "</td>";
                    echo "<td>" . $row1['emailadd'] . "</td>";
                    echo "<td>" . $row1['birthdate'] . "</td>";
                    echo "<td>" . $row1['userstatus'] . "</td>";

                    // Fetch corresponding data from tbluseraccount
                    $row2 = mysqli_fetch_assoc($result2);
                    // Display data from tbluseraccount
                    echo "<td>" . $row2['acctid'] . "</td>";
                    echo "<td>" . $row2['username'] . "</td>";
                    echo "<td>" . $row2['password'] . "</td>";

                    // Add delete button
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='userID' value='" . $row1['userid'] . "'>";
                    echo "<button type='button' class='update-btn' onclick='showUpdateForm(" . $row1['userid'] . ")'>Update</button>";
                    echo "</form>";
                    echo "</td>";

                    echo "</tr>";
                }   
            } else {
                echo "<tr><td colspan='11'>No active users found</td></tr>"; // Fixed colspan to match the number of columns
            }
            ?>
        </table>
    </div>
        <!-- Update password form (hidden by default) -->
          

    <!-- Inactive User Table -->
    <div class="container">
    <h2>Status Table</h2>
    <table>
        <tr>
            <th>UserID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>User Status</th>
            <th>AccountID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        // Query to fetch inactive user data from the database
        $query3 = "SELECT * FROM tbluserprofile";
        $result3 = mysqli_query($connection, $query3);

        // Check if there are any records
        if (mysqli_num_rows($result3) > 0) {
            // Loop through each row of data
            while ($row3 = mysqli_fetch_assoc($result3)) {
                echo "<tr>";
                // Display data from tbluserprofile
                echo "<td>" . $row3['userid'] . "</td>";
                echo "<td>" . $row3['firstname'] . "</td>";
                echo "<td>" . $row3['lastname'] . "</td>";
                echo "<td>" . $row3['gender'] . "</td>";
                echo "<td>" . $row3['emailadd'] . "</td>";
                echo "<td>" . $row3['birthdate'] . "</td>";
                echo "<td>" . ($row3['status'] ? 'Active' : 'Inactive') . "</td>";

                // Query to fetch corresponding data from tbluseraccount
                $query4 = "SELECT * FROM tbluseraccount WHERE acctid = '{$row3['userid']}'";
                $result4 = mysqli_query($connection, $query4);
                $row4 = mysqli_fetch_assoc($result4);

                // Display data from tbluseraccount
                if ($row4) {
                    echo "<td>" . $row4['acctid'] . "</td>";
                    echo "<td>" . $row4['username'] . "</td>";
                    echo "<td>" . $row4['password'] . "</td>";
                } else {
                    echo "<td colspan='3'>No account data found</td>";
                }

                // Determine button styles based on user status
                $activateBtnClass = $row3['status'] ? 'activate-btn-grey' : 'activate-btn';
                $deactivateBtnClass = $row3['status'] ? 'delete-btn' : 'delete-btn-grey';

                // Add action buttons with dynamically assigned classes
                echo "<td>";
                echo "<form method='post' onsubmit='return confirmAction(" . $row3['status'] . ")'>";
                echo "<input type='hidden' name='userID' value='" . $row3['userid'] . "'>";
                echo "<button type='submit' name='activate' class='$activateBtnClass'>Activate</button>";
                echo "<button type='submit' name='deactivate1' class='$deactivateBtnClass'>Deactivate</button>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No users found</td></tr>";
        }
        ?>
    </table>
</div>

<?php mysqli_data_seek($result3, 0); ?>
<?php while ($row1 = mysqli_fetch_assoc($result3)) { ?>
    <form id="updateForm-<?php echo $row1['userid']; ?>" method="post" style="display: none;">
        <input type="hidden" name="userid" value="<?php echo $row1['userid']; ?>">
        <input type="password" name="newPassword" placeholder="Enter new password" required>
        <button type="submit" name="update" class="update-btn">Update Password</button>
    </form>
<?php } ?>  





    <!-- JavaScript to show/hide update password form -->
    <script>
    function showUpdateForm(adminID) {
        var form = document.getElementById('updateForm-' + adminID);
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
    </script>

    

    <script>
        function confirmAction(isActive) {
            if (isActive) {
                return confirm("Are you sure you want to deactivate this account?");
            } else {
                return confirm("Are you sure you want to activate this account?");
            }
        }
        const loginpage = document.getElementById("loginpage");
        loginpage.onclick = goLoginPage;

        const adm = document.getElementById("add_admin");
        adm.onclick = goAddAdmin;

        const rep = document.getElementById("report");
        rep.onclick = goReport;

        function goLoginPage(){
        window.location.href = "login.php";
        }

        function goAddAdmin(){
        window.location.href = "adminregister.php";
        }

        function goReport() {
        window.location.href = "report.php";
        }  

    
    </script>
</body>
</html>
