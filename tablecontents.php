<?php
    include 'connect.php';
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
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Table</h2>
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php
                // Query to fetch user data from the database
                $query1 = "select * from tbluserprofile";
                $result1 = mysqli_query($connection, $query1);

                $query2 = "select * from tbluseraccount";
                $result2 = mysqli_query($connection, $query2);

                // Check if there are any records
                if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
                    // Loop through each row of data
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        // Display data from tbluserprofile
                        echo "<td>" . $row1['firstname'] . "</td>";
                        echo "<td>" . $row1['lastname'] . "</td>";
                        echo "<td>" . $row1['gender'] . "</td>";
                        echo "<td>" . $row1['emailadd'] . "</td>";
                        echo "<td>" . $row1['birthdate'] . "</td>";
                        echo "<td>" . $row1['userstatus'] . "</td>";

                        // Fetch corresponding data from tbluseraccount
                        $row2 = mysqli_fetch_assoc($result2);
                        // Display data from tbluseraccount
                        echo "<td>" . $row2['username'] . "</td>";
                        echo "<td>" . $row2['password'] . "</td>";
                        echo "</tr>";
                    }   
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
            ?>
        </table>
    </div>

    <footer style="text-align: center;">
		<a href="index.php"> Go back to Menu </a>
	</footer>
</body>
</html>
