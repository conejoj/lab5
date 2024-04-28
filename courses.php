<!DOCTYPE html>
<html lang="en">
<head>
    <php? include ("db_connection.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #4e73df;
            color: white;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }

        th {
            background-color: #4e73df;
        }
    </style>
</head>
<body>

    <h2>Courses</h2>
    <table>
        <thead>
            <tr>
                <th>SID</th>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Faculty ID</th>
                <th>Offered In</th>
                <th>Credits</th>
                <th>Pre-requisite</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $servername = "localhost";
            $username = "your_username";
            $password = "your_password";
            $dbname = "emd_db";

            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT * FROM Courses_tab";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
     
            while($row = $result->fetch_assoc()) {
            echo "
            <tr>
                ";
                echo "
                <td>" . $row["sid"] . "</td>";
                echo "
                <td>" . $row["Course_id"] . "</td>";
                echo "
                <td>" . $row["Course_name"] . "</td>";
                echo "
                <td>" . $row["Fac_id"] . "</td>";
                echo "
                <td>" . $row["Offered_in"] . "</td>";
                echo "
                <td>" . $row["credits"] . "</td>";
                echo "
                <td>" . $row["pre_req"] . "</td>";
                echo "
                <td>" . $row["type"] . "</td>";
                echo "
            </tr>";
            }
            } else {
            echo "
            <tr><td colspan='8'>No courses found.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>