
<?php
include 'session.php';
include 'config.php';

$result = $conn->query("SELECT * FROM students");

echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Date of Birth</th>
    <th>Actions</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['first_name'] . "</td>
        <td>" . $row['last_name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['dob'] . "</td>
        <td>
            <a href='edit_student.php?id=" . $row['id'] . "'>Edit</a>
            <a href='delete_student.php?id=" . $row['id'] . "'>Delete</a>
        </td>
    </tr>";
}
echo "</table>";
?>
<link rel="stylesheet" href="style.css">
