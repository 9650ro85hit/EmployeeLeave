<?php
// Include database connection code here if not already included

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Receive input (e.g., record ID) from the client
    $recordId = $_GET['id']; // Adjust based on how data is sent

    // Connect to the database (you may need to modify the database connection code)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct and execute the DELETE query
    $sql = "DELETE FROM totalemployee WHERE id = $recordId"; // Modify table and field names
    if (mysqli_query($conn, $sql)) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'error' => mysqli_error($conn)];
    }

    // Close the database connection
    mysqli_close($conn);

    // Return a JSON response to the client
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
?>
