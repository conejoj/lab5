<!DOCTYPE html >
        <html lang="en" >
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Students</title>
            <style>

                body {
                    background-color: #4e73df;
                    color: white;
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }

                .student-list {
                    list-style-type: none;
                    padding: 0;
                }

                .student-item {
                    border-bottom: 1px solid #ccc;
                    padding: 10px;
                    background-color: white;
                    color: #4e73df;
                    margin-bottom: 10px;
                    border-radius: 5px;
                }

                    .student-item:last-child {
                        border-bottom: none;
                    }

                strong {
                    color: black;
                }
            </style>
            <?php

            $connect = new mysqli("localhost", "root", "", "emb_db");

            if($connect->connect_errno )
            {
            die('Could not connect: ' . $connect->connect_errno);
            }


            $sql = "SELECT * FROM Student_tab";
            $result = $conn->query($sql);

            // Output data as JSON
            $students = array();
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $students[] = $row;
            }
            }




            $conn->close();
            ?>
        </head>
<body>
    <h1>Students</h1>
    <ul class="student-list" id="studentList">

    </ul>

    <script>

        fetch('fetch_students.php')
            .then(response => response.json())
            .then(data => {
                const studentList = document.getElementById('studentList');
                data.forEach(student => {
                    const studentItem = document.createElement('li');
                    studentItem.className = 'student-item';
                    studentItem.setAttribute('sid', student.sid);
                    studentItem.setAttribute('Stu_id', student.Stu_id);
                    studentItem.setAttribute('Stu_name', student.Stu_name);
                    studentItem.setAttribute('Stu_year_of_enrollment', student.Stu_year_of_enrollment);
                    studentItem.setAttribute('Stu_major', student.Stu_major);
                    studentItem.setAttribute('CGPA', student.CGPA);
                    studentItem.setAttribute('year_of_graduation', student.year_of_graduation);
                    studentItem.innerHTML = `
                        <strong>Name:</strong> ${student.Stu_name}<br>
                        <strong>Student ID:</strong> ${student.Stu_id}<br>
                        <strong>Year of Enrollment:</strong> ${student.Stu_year_of_enrollment}<br>
                        <strong>Major:</strong> ${student.Stu_major}<br>
                        <strong>CGPA:</strong> ${student.CGPA}<br>
                        <strong>Year of Graduation:</strong> ${student.year_of_graduation}
                    `;
                    studentList.appendChild(studentItem);
                });
            })
            .catch(error => console.error('Error fetching students:', error));
    </script>
</body>
</html>