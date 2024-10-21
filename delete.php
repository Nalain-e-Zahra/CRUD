<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // Prepare the SQL statement
    $stmt = $con->prepare("DELETE FROM crud WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" specifies that the parameter is an integer
    if ($stmt->execute()) {
        // echo "Deleted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
    $stmt->close();

}
?>
