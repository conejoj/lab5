<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Personal Info</title>
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

        .student-info {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        .info-row {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>View Personal Info</h2>

    <div class="student-info">
        <?php
         include("db_connection.php"); 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $student_id = $_GET['student_id']; 
        $sql = "SELECT * FROM Student_tab WHERE Stu_id = '$student_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="info-row">';
                echo '<label for="stu_id">Student ID:</label>';
                echo '<span id="stu_id">' . $row['Stu_id'] . '</span>';
                echo '</div>';

                echo '<div class="info-row">';
                echo '<label for="stu_name">Student Name:</label>';
                echo '<span id="stu_name">' . $row['Stu_name'] . '</span>';
                echo '</div>';

                echo '<div class="info-row">';
                echo '<label for="stu_dob">Date of Birth:</label>';
                echo '<span id="stu_dob">' . $row['Date_of_Birth'] . '</span>';
                echo '</div>';


            }
        } else {
            echo "Student not found";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
