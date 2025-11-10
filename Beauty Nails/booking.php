<?php
$conn = new mysqli("localhost", "root", "", "beautynails");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $service = $_POST['service'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $conn->query("INSERT INTO bookings (name, email, service, date, time) VALUES ('$name', '$email', '$service', '$date', '$time')");
  echo "<script>alert('Booking submitted!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Book Now</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="container">
    <header>
      <h1>Beauty Nails</h1>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="booking.php">Book Now</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
    
    <main class="booking-form">
      <h2>Book Your Appointment</h2>
      <form method="post" onsubmit="return validateForm()">
        <div class="form-group">
          <input type="text" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <input type="text" id="service" name="service" placeholder="Service" required>
        </div>
        <div class="form-group">
          <input type="date" name="date" required>
        </div>
        <div class="form-group">
          <input type="time" name="time" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Book Now">
        </div>
      </form>
    </main>
  </div>
  
  <footer>
    <p>&copy; 2025 Beauty Nails</p>
  </footer>

  <script>
    function validateForm() {
      let errors = [];
      if (!document.getElementById("name").value) errors.push("Name is required");
      if (!document.getElementById("email").value.includes("@")) errors.push("Valid email required");
      if (errors.length > 0) {
        alert("Fix these errors:\n" + errors.join("\n"));
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
