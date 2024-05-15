<?php
// Database connection details
$servername = "localhost";
$username = "earist_sas";
$password = "earist_1945";
$dbname = "earist_student_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required GET parameters are set
if (
    isset($_GET['student-id']) &&
    isset($_GET['unix']) &&
    isset($_GET['date']) &&
    isset($_GET['subject-code']) &&
    isset($_GET['time-in']) &&
    isset($_GET['location'])
) {
    $student_id = $_GET['student-id'];
    $timestamp_unix = $_GET['unix'];
    $timestamp_std = $_GET['date'];
    $course_id = $_GET['subject-code'];
    $time_in = $_GET['time-in'];
    $time_out = '00:00';
    $location = $_GET['location'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `$student_id` (`timestamp_unix`, `timestamp_std`, `course-id`, `time-in`, `time-out`, `location`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $timestamp_unix, $timestamp_std, $course_id, $time_in, $time_out, $location);

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        $response = array("message" => "Record inserted successfully.");
    } else {
        $response = array("message" => "Error inserting record: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    $response = array("message" => "Invalid parameters.");
}

// Close connection
$conn->close();

// Output the response as JSON
echo json_encode($response);
?>
