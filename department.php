<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #4e73df;
            color: white;
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4e73df;
        }

        tr:nth-child(even) {
            background-color: #8fb1ff;
        }
    </style>
    <?php
    session_start();

    include ("db_connection.php");



    $sql = "SELECT sid, Dept_id, Dept_name, Dept_chair, Dept_dean, _budget FROM Department_tab";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "sid: " . $row["sid"]. " - Dept_id: " . $row["Dept_id"]. " - Dept_name: " . $row["Dept_name"]. " - Dept_chair: " . $row["Dept_chair"]. " - Dept_dean: " . $row["Dept_dean"]. " - Budget: " . $row["_budget"]. "
    <br>";
    }
    } else {
    echo "0 results";
    }


    $conn->close();
    ?>
</head>
<body>
    <h2>Department Information</h2>
    <table>
        <thead>
            <tr>
                <th>SID</th>
                <th>Dept ID</th>
                <th>Dept Name</th>
                <th>Dept Chair</th>
                <th>Dept Dean</th>
                <th>Budget</th>
            </tr>
        </thead>
        <tbody>
            <tr>


                $sql = "SELECT sid, Dept_id, Dept_name, Dept_chair, Dept_dean, _budget FROM Department_tab";


                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "sid: " . $row["sid"]. " - Dept_id: " . $row["Dept_id"]. " - Dept_name: " . $row["Dept_name"]. " - Dept_chair: " . $row["Dept_chair"]. " - Dept_dean: " . $row["Dept_dean"]. " - Budget: " . $row["_budget"]. "
                <br>";
                }
                } else {
                echo "0 results";
                }
            </tr>
        </tbody>
    </table>
</body>
</html>