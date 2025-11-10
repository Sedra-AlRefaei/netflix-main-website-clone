<?php
$conn = new mysqli("localhost", "root", "", "beautynails");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
if (isset($_GET['delete'])) {
  $conn->query("DELETE FROM bookings WHERE id=" . $_GET['delete']);
}
$result = $conn->query("SELECT * FROM bookings");
?>

<h2>Admin - All Bookings</h2>
<table border="1">
<tr><th>Name</th><th>Email</th><th>Service</th><th>Date</th><th>Time</th><th>Action</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['name'] ?></td><td><?= $row['email'] ?></td><td><?= $row['service'] ?></td><td><?= $row['date'] ?></td><td><?= $row['time'] ?></td>
  <td><a href="admin.php?delete=<?= $row['id'] ?>">Delete</a></td>
</tr>
<?php endwhile; ?>
</table>
