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

// Initialize response array
$response = array();

// Check if the required parameters are set
if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Check for combination: table, day, start
    if (isset($_GET['day']) && isset($_GET['start'])) {
        $day = $_GET['day'];
        $start = $_GET['start'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT `course-id` FROM `$table` WHERE `day` = ? AND `start` = ?");
        $stmt->bind_param("ss", $day, $start);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the row and store it in response
            $row = $result->fetch_assoc();
            $response = $row;
        } else {
            $response['message'] = "No results found.";
        }

        // Close the statement
        $stmt->close();
    }
	// Check for combination: table, day, end, start, time
    elseif (isset($_GET['day']) && isset($_GET['time'])) {
        $day = $_GET['day'];
        $time = $_GET['time'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT `course-id` FROM `$table` WHERE `day` = ? AND `end` > ? AND `start` < ?");
        $stmt->bind_param("sss", $day, $time, $time);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the row and store it in response
            $row = $result->fetch_assoc();
            $response = $row;
        } else {
            $response['message'] = "No results found.";
        }

        // Close the statement
        $stmt->close();
    }
	// Check for combination: table, day
    elseif (isset($_GET['day'])) {
        $day = $_GET['day'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT `course-id`,`no` FROM `$table` WHERE `day` = ?");
        $stmt->bind_param("s", $day);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the row and store it in response
            $row = $result->fetch_assoc();
            $response = $row;
        } else {
            $response['message'] = "No results found.";
        }

        // Close the statement
        $stmt->close();
    }
    // Check for combination: table, idNum, column
    elseif (isset($_GET['idNum']) && isset($_GET['column'])) {
        $idNum = intval($_GET['idNum']); // Ensure idNum is an integer to prevent SQL injection
        $column = $_GET['column'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT `$column` FROM `$table` WHERE `id_number` = ?");
        $stmt->bind_param("i", $idNum);
        $stmt->execute();
        $stmt->bind_result($resultColumn);

        // Fetch the result and add it to the response
        if ($stmt->fetch()) {
            $response[$column] = $resultColumn;
        } else {
            $response['message'] = "No results found.";
        }

        // Close the statement
        $stmt->close();
    }
    // Check for combination: table, idNum only
    elseif (isset($_GET['idNum'])) {
        $idNum = intval($_GET['idNum']); // Ensure idNum is an integer to prevent SQL injection

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM `$table` WHERE `id_number` = ?");
        $stmt->bind_param("i", $idNum);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $response = $result->fetch_assoc();
        } else {
            $response['message'] = "No results found.";
        }

        // Close the statement
        $stmt->close();
    }
    else {
        $response['message'] = "Invalid parameters.";
    }
}
else {
    $response['message'] = "Invalid parameters.";
}

// Close connection
$conn->close();

// Output the response as JSON
echo json_encode($response);
?>