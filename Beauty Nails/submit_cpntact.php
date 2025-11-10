<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // You can change this to your email address
    $to = "your_email@example.com"; 
    $subject = "Contact Form Submission - Beauty Nails";

    // Prepare the email body
    $body = "You have received a new message from the contact form on your website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";

    // Send the email
    if (mail($to, $subject, $body)) {
        echo "<script>alert('Thank you for reaching out! Your message has been sent.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error. Please try again later.');</script>";
    }
}
?>

<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$dbname = "beautynails"; // Update with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to contact page with success message
        echo "<script>alert('Thank you for reaching out! Your message has been submitted.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error. Please try again later.'); window.location.href = 'contact.html';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
