<?php
// Connect to the MySQL database
$mysqli = new mysqli("mysql", "root", "password", "student_db");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if delete parameter is set and delete the corresponding student
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete']; // Cast to int for security
    $deleteQuery = "DELETE FROM students WHERE id = $id";
    if (!$mysqli->query($deleteQuery)) {
        die("Error deleting student: " . $mysqli->error);
    }
    // Redirect to avoid repeated deletion on page reload
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

// Insert a new student if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["course"]) && !empty($_POST["year_level"])) {
    $name = $mysqli->real_escape_string($_POST["name"]);
    $age = (int)$_POST["age"];
    $course = $mysqli->real_escape_string($_POST["course"]);
    $year_level = (int)$_POST["year_level"];
    $insertQuery = "INSERT INTO students (name, age, course, year_level) VALUES ('$name', $age, '$course', $year_level)";
    if (!$mysqli->query($insertQuery)) {
        die("Error inserting student: " . $mysqli->error);
    }
}

// Attempt to fetch all students
$result = $mysqli->query("SELECT * FROM students");

// Check if query was successful
if (!$result) {
    die("Error fetching students: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Information</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Enter student name" required>
            <input type="number" name="age" placeholder="Enter age" required>
            <input type="text" name="course" placeholder="Enter course" required>
            <input type="number" name="year_level" placeholder="Enter year level" required>
            <button type="submit">Add Student</button>
        </form>

        <h2>Students List</h2>
        <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo htmlspecialchars($row['name']); ?>, 
                Age: <?php echo htmlspecialchars($row['age']); ?>, 
                Course: <?php echo htmlspecialchars($row['course']); ?>, 
                Year Level: <?php echo htmlspecialchars($row['year_level']); ?>
                - <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
