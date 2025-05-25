<?php
// DB credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "feedback";

// Create a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // If not, terminate the script
}

// Retrieve submitted form data using POST method
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare SQL query to insert the feedback into the database with the current date
$sql = "INSERT INTO feedback (FEED_NAME, FEED_EMAIL, FEED_CONTACT, FEED_SUBJECT, FEED_MESSAGE, FEED_DATE)
        VALUES (?, ?, ?, ?, ?, CURRENT_DATE())";

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare($sql);

// attach the user input values to the prepared statement
$stmt->bind_param("sssss", $name, $email, $contact, $subject, $message);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Response</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f4f4f4;
    }

    /* Styling for the success popup message */
    .popup {
      display: block;
      padding: 20px;
      background-color: #dff0d8; /* light green */
      border: 1px solid #3c763d; /* dark green border */
      color: #3c763d;
      border-radius: 10px;
      margin-bottom: 20px;
      font-weight: bold;
      animation: fadeIn 1s ease-out;
      text-align: center;
    }

    /* Animation for the popup message */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Box to display the recent feedback details */
    .feedback-box {
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h3 {
      margin-top: 0;
      color: #333;
    }

    p {
      margin: 5px 0;
    }
  </style>
</head>
<body>

<?php
// Execute the insert query
if ($stmt->execute()) {
  // If successful, show success message
  echo "<div class='popup'>Feedback submitted successfully.</div>";

  // Retrieve the most recent feedback entry
  $result = $conn->query("SELECT FEED_NAME, FEED_SUBJECT, FEED_MESSAGE, FEED_DATE 
                          FROM feedback 
                          ORDER BY FEED_ID DESC LIMIT 1");

  // Display the latest feedback in a styled box
  if ($result && $row = $result->fetch_assoc()) {
    echo "<div class='feedback-box'>";
    echo "<h3>Recent Feedback</h3>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($row['FEED_NAME']) . "</p>";
    echo "<p><strong>Subject:</strong> " . htmlspecialchars($row['FEED_SUBJECT']) . "</p>";
    echo "<p><strong>Message:</strong> " . nl2br(htmlspecialchars($row['FEED_MESSAGE'])) . "</p>";
    echo "<p><strong>Date:</strong> " . $row['FEED_DATE'] . "</p>";
    echo "</div>";
  }
} else {
  // If the query fails, display an error message
  echo "<div class='popup' style='background-color: #f2dede; color: #a94442; border-color: #ebccd1;'>
        Error: " . htmlspecialchars($stmt->error) . "</div>";
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>

</body>
</html>
