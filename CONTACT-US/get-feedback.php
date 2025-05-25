<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "feedback";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to format date
function formatDate($date) {
    return date('M d, Y', strtotime($date));
}

// Query to get the latest feedback entries
$sql = "SELECT FEED_NAME, FEED_SUBJECT, FEED_MESSAGE, FEED_DATE 
        FROM feedback 
        ORDER BY FEED_DATE DESC 
        LIMIT 8";

$result = $conn->query($sql);

$feedbackData = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $feedbackData[] = array(
            'name' => htmlspecialchars($row["FEED_NAME"]),
            'subject' => htmlspecialchars($row["FEED_SUBJECT"]),
            'message' => htmlspecialchars($row["FEED_MESSAGE"]),
            'date' => formatDate($row["FEED_DATE"])
        );
    }
}

$conn->close();

// Return data as JSON if requested via AJAX
if(isset($_GET['format']) && $_GET['format'] == 'json') {
    header('Content-Type: application/json');
    echo json_encode($feedbackData);
    exit;
}

// Otherwise, return HTML for the table rows
foreach($feedbackData as $feedback) {
    echo "<tr>";
    echo "<td>" . $feedback['name'] . "</td>";
    echo "<td>" . $feedback['subject'] . "</td>";
    echo "<td>" . $feedback['message'] . "</td>";
    echo "<td>" . $feedback['date'] . "</td>";
    echo "</tr>";
}

// If no data, show a message
if(empty($feedbackData)) {
    echo "<tr><td colspan='4' class='text-center'>No feedback entries yet.</td></tr>";
}
?>