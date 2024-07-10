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
    isset($_GET['timeOUT']) &&
    isset($_GET['date']) &&
    isset($_GET['subject-code'])
) {
    $student_id = $_GET['student-id'];
    $time_out = $_GET['timeOUT'];
    $timestamp_std = $_GET['date'];
    $course_id = $_GET['subject-code'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE `$student_id` SET `time-out` = ? WHERE `timestamp_std` = ? AND `course-id` = ?");
    $stmt->bind_param("sss", $time_out, $timestamp_std, $course_id);

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $response = array("message" => "Record updated successfully.");
        } else {
            $response = array("message" => "No records updated. Please check your criteria.");
        }
    } else {
        $response = array("message" => "Error updating record: " . $stmt->error);
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