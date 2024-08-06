
<?php
include 'session.php';
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id = $id");
    $student = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $stmt = $conn->prepare("UPDATE students SET first_name = ?, last_name = ?, email = ?, dob = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $dob, $id);

    if ($stmt->execute()) {
        header('Location: view_students.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
    <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required>
    <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required>
    <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
    <input type="date" name="dob" value="<?php echo $student['dob']; ?>" required>
    <button type="submit">Update Student</button>
</form>

    
</body>
</html>



