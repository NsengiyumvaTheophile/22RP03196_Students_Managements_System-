
<?php
include 'session.php';
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, dob) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $dob);

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
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="date" name="dob" placeholder="Date of Birth" required>
    <button type="submit">Add Student</button>
</form>
    
</body>
</html>


