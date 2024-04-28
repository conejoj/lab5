<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses Taught by Self</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4e73df;
            color: white;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .course-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .course-item {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
            color: black; /* Text color set to black */
        }
    </style>
</head>
<body>
    <h2>View Courses Taught by Self</h2>
    <div class="courses">
        <ul class="course-list">
            <?php
            // Database credentials
            $servername = "localhost"; // Replace with your server name
            $username = "your_username"; // Replace with your database username
            $password = "your_password"; // Replace with your database password
            $dbname = "emd_db"; // Replace with your database name

            try {
                // Create a connection
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // SQL query to fetch courses taught by self
                $sql = "SELECT * FROM Faculty_tab WHERE Fac_name = 'Dr. John Doe'"; // Change the professor's name as needed

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $stmt->execute();

                // Fetch all rows as associative array
                $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Close the connection
                $conn = null;

                // Iterate through each course and display its information
                foreach ($courses as $course) {
                    echo "<li class='course-item'>";
                    echo "<h3>" . $course['department'] . "</h3>";
                    echo "<p>Course Code: " . $course['Fac_id'] . "</p>";
                    echo "<p>Professor: " . $course['Fac_name'] . "</p>";
                    echo "</li>";
                }
            } catch(PDOException $e) {
                // Display an error message if unable to connect to the database
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </ul>
    </div>
</body>
</html>
