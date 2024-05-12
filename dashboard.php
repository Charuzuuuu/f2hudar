<?php
    include 'connect.php';
?>

        <?php
        // Check if delete button is clicked
                if (isset($_POST['delete1'])) {
                    $userID = $_POST['userID'];
                    // Delete user from the database
                    $queryDeleteProfile = "DELETE FROM tbluserprofile WHERE userid = '$userID'";
                    $queryDeleteAccount = "DELETE FROM tbluseraccount WHERE acctid = '$userID'";
                    mysqli_query($connection, $queryDeleteProfile);
                    mysqli_query($connection, $queryDeleteAccount);
                    // Refresh the page
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                }
        ?>
        <?php
        if (isset($_POST['delete2'])) {
                $adminID = $_POST['adminID'];
                // Delete admin from the database
                $queryDeleteAdmin = "DELETE FROM tbladmin WHERE adminid = '$adminID'";
                $queryDeleteUserAdmin = "DELETE FROM tbluseradmin WHERE useradminID = '$adminID'";
                mysqli_query($connection, $queryDeleteAdmin);
                mysqli_query($connection, $queryDeleteUserAdmin);
                // Refresh the page
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
    
            // Check if update password button is clicked
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
                    <i class="fa-solid fa-arrow-left" id="userpage"></i>
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
                // Query to fetch user data from the database
                $query1 = "SELECT * FROM tbluserprofile";
                $result1 = mysqli_query($connection, $query1);

                $query2 = "SELECT * FROM tbluseraccount";
                $result2 = mysqli_query($connection, $query2);

                // Check if there are any records
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
                        echo "<button type='submit' name='delete1' class='delete-btn'>Delete</button>";
                        echo "<button type='button' class='update-btn' onclick='showUpdateForm(" . $row1['userid'] . ")'>Update</button>";
                        echo "</form>";
                        echo "</td>";

                        echo "</tr>";
                    }   
                } else {
                    echo "<tr><td colspan='9'>No users found</td></tr>";
                }
            ?>
        </table>
    </div>

    <div class="container">
    <h2>Admin Table</h2>
    <table>
    <tr>
    <th>AdminID</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Action</th> <!-- Added column for delete and update buttons -->
    </tr>
    <?php
            // Query to fetch admin data from the database
            $query3 = "SELECT * FROM tbladmin";
            $result3 = mysqli_query($connection, $query3);
    
            $query4 = "SELECT * FROM tbluseradmin";
            $result4 = mysqli_query($connection, $query4);
    
            // Check if there are any records
            if (mysqli_num_rows($result3) > 0 && mysqli_num_rows($result4) > 0) {
                // Loop through each row of data
                while ($row1 = mysqli_fetch_assoc($result3)) {
                    echo "<tr>";
                    // Display data from tbladmin
                    echo "<td>" . $row1['adminID'] . "</td>";
                    echo "<td>" . $row1['firstname'] . "</td>";
                    echo "<td>" . $row1['lastname'] . "</td>";
                    echo "<td>" . $row1['gender'] . "</td>";
                    echo "<td>" . $row1['emailadd'] . "</td>";
    
                    // Fetch corresponding data from tbluseradmin
                    $row2 = mysqli_fetch_assoc($result4);
                    // Display data from tbluseradmin
                    echo "<td>" . $row2['username'] . "</td>";
                    echo "<td>" . $row2['password'] . "</td>";
    
                    // Add delete button
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='adminID' value='" . $row1['adminID'] . "'>";
                    echo "<button type='submit' name='delete2' class='delete-btn'>Delete</button>";
                    echo "<button type='button' class='update-btn' onclick='showUpdateForm(" . $row1['adminID'] . ")'>Update</button>";
                    echo "</form>";
                    echo "</td>";
    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No admins found</td></tr>";
            }
    
            // Check if delete button is clicked
            ?>
    </table>
    </div>

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

        <!-- Update password form (hidden by default) -->
    <?php mysqli_data_seek($result3, 0); ?>
    <?php while ($row1 = mysqli_fetch_assoc($result3)) { ?>
    <form id="updateForm-<?php echo $row1['adminID']; ?>" method="post" style="display: none;">
    <input type="hidden" name="adminID" value="<?php echo $row1['adminID']; ?>">
    <input type="password" name="newPassword" placeholder="Enter new password" required>
    <button type="submit" name="update" class="update-btn">Update Password</button>
    </form>
    <?php } ?>

    <script>
        const userpage = document.getElementById("userpage");
        userpage.onclick = goUserPage;

        const adm = document.getElementById("add_admin");
        adm.onclick = goAddAdmin;

        const rep = document.getElementById("report");
        rep.onclick = goReport;

        function goUserPage(){
        window.location.href = "userpage.php";
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
