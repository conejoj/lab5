            <?php
session_start();

include ("db_connection.php");




$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .faculty-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #4e73df;
            color: white;
            margin-bottom: 20px;
        }

            .faculty-table th,
            .faculty-table td {
                padding: 10px;
                border-bottom: 1px solid white;
                text-align: left;
            }

            .faculty-table th {
                background-color: #4e73df;
                color: white;
            }

            .faculty-table tr:nth-child(even) {
                background-color: #3879d9;
            }
    </style>
</head>
<body>
    <h2>Faculty Display</h2>

    <table class="faculty-table">
        <thead>
            <tr>
                <th>SID</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Year of Enrollment</th>
                <th>Major</th>
                <th>CGPA</th>
                <th>Year of Graduation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>" . $row["sid"] . "</td>
                <td>" . $row["Stu_id"] . "</td>
                <td>" . $row["Stu_name"] . "</td>
                <td>" . $row["Stu_year_of_enrollment"] . "</td>
                <td>" . $row["Stu_major"] . "</td>
                <td>" . $row["CGPA"] . "</td>
                <td>" . $row["year_of_graduation"] . "</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php

$conn->close();
?>
