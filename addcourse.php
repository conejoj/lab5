<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once "db_connection.php";

    $sql = "INSERT INTO Course_tab (course_code, course_name, department) VALUES ('$course_code', '$course_name', '$department')";
    if (mysqli_query($conn, $sql)) {
    echo "Course added successfully.";
    } else {
    echo "Error: " . $sql . "
    <br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0056b3;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

            input[type="text"], input[type="number"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
            }

                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
    </style>
</head>
<body>
    <h2>Add a Course</h2>
    <div class="container">
        <form action="add_course.php" method="post">
            <label for="course_code">Course Code:</label>
            <input type="text" id="course_code" name="course_code" placeholder="Enter Course Code" required>

            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" placeholder="Enter Course Name" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" placeholder="Enter Department" required>

            <input type="submit" value="Add Course">
        </form>
    </div>
</body>
</html>
