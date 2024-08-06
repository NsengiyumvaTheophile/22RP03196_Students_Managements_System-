
<?php
include 'session.php';
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: view_students.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
