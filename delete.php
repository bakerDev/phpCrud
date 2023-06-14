<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if (!$conn) {
        echo "connection error";
        die('connection Failed: ' . $conn->connection_error);
    } else {
        $sql = "DELETE FROM `registration` WHERE `id` = '$id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Record deleted successfully');</script>";
            echo "<script>window.location.href = 'display.php';</script>";
        } else {
            echo "<script>alert('Failed to delete record');</script>";
            echo "<script>window.location.href = 'display.php';</script>";
        }
    }
} else {
    // Redirect back to display.php if no ID is provided
    header("Location: display.php");
    exit;
}
?>
