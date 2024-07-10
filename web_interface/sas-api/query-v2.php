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

// Check if GET parameters are set
if (isset($_GET['column']) && isset($_GET['idNum'])) {
    $column = $_GET['column'];
    $idNum = intval($_GET['idNum']);  // Ensure idNum is an integer to prevent SQL injection

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT `$column` FROM `$tableName` WHERE `id_number` = ?");
    $stmt->bind_param("i", $idNum);
    $stmt->execute();
    $stmt->bind_result($resultColumn);

    // Fetch the result and echo the column value
    if ($stmt->fetch()) {
        echo $resultColumn;
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