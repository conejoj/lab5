<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .faculty-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #4e73df;
            color: white;
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
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Date of Joining</th>
                <th>Qualification</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost"; // Change this to your database server name
            $username = "username"; // Change this to your database username
            $password = "password"; // Change this to your database password
            $dbname = "emd_db"; // Change this to your database name
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from database
            $sql = "SELECT sid, Fac_id, Fac_name, Fac_DOJ, qualification, department FROM Faculty_tab";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["sid"] . "</td>";
                    echo "<td>" . $row["Fac_id"] . "</td>";
                    echo "<td>" . $row["Fac_name"] . "</td>";
                    echo "<td>" . $row["Fac_DOJ"] . "</td>";
                    echo "<td>" . $row["qualification"] . "</td>";
                    echo "<td>" . $row["department"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No faculty records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>