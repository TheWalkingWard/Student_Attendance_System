<?php
// Database connection details
$servername = "localhost";
$username = "earist_sas";
$password = "earist_1945";
$dbname = "earist_student_data";
$tableName = "student_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if GET parameter is set
if (isset($_GET['idNum'])) {
    $idNum = intval($_GET['idNum']);  // Ensure idNum is an integer to prevent SQL injection

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `id_number` = ?");
    $stmt->bind_param("i", $idNum);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the row and echo the result as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "No results found.";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid parameters.";
}

// Close connection
$conn->close();
?>