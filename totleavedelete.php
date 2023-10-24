<?php
if (isset($_POST['sr_no'])) {
    $sr_no = $_POST['sr_no'];

    // Perform the delete operation using the received sr_no
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "employee_leave_management";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM totalleavetype WHERE sr_no = $sr_no";

    if (mysqli_query($conn, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_close($conn);
}
?>
