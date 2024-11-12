<?php
include 'config.php';

// Add student
if (isset($_POST['add_student'])) {
    $stud_name = $_POST['stud_name'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student (stud_name, gender) VALUES ('$stud_name', '$gender')";
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete student
if (isset($_GET['delete_id'])) {
    $stud_id = $_GET['delete_id'];
    $sql = "DELETE FROM student WHERE stud_id='$stud_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all students
$result = $conn->query("SELECT * FROM student");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="stud_name" required>
        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <button type="submit" name="add_student">Add Student</button>
    </form>

    <h2>Student List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['stud_id']; ?></td>
                <td><?php echo $row['stud_name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><a href="?delete_id=<?php echo $row['stud_id']; ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
