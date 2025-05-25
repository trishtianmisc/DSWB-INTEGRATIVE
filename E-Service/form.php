<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel_form";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$child_name = $_POST['child_name'];
$dob = $_POST['dob'];
$minor_address = $_POST['minor_address'];
$parent_name = $_POST['parent_name'];
$parent_address = $_POST['parent_address'];
$validity_period = $_POST['validity_period'];
$companion_name = $_POST['companion_name'];
$companion_address = $_POST['companion_address'];
$companion_relationship = $_POST['companion_relationship'];
$destination = $_POST['destination'];
$purpose = $_POST['purpose'];

$sql = "INSERT INTO applications (
    child_name, dob, minor_address, parent_name, parent_address, validity_period,
    companion_name, companion_address, companion_relationship,
    destination, purpose
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssisssss",
    $child_name, $dob, $minor_address, $parent_name, $parent_address,
    $validity_period, $companion_name, $companion_address, $companion_relationship,
    $destination, $purpose
);

if ($stmt->execute()) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
