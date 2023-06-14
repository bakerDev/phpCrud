<?php 
    $name = $_POST['nameEdit'];
    $date = $_POST['dateEdit'];
    $email = $_POST['emailEdit'];
    $select = $_POST['selectEdit'];

    $id = $_POST["IDEdit"];

    // Database Connection

    $conn = new mysqli('localhost', 'root', '', 'test');
    if (!$conn) {
        echo "connection error";
        die('connection Failed: ' . $conn->connection_error);
    } else {
        $sql = "UPDATE `registration` SET `name` = '$name', `email` = '$email', `date` = '$date', `select` = '$select' WHERE `registration`.`id` = '$id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Record updated successfully');</script>";
            echo "<script>window.location.href = 'display.php';</script>";
        } else {
            echo "<script>alert('Failed to update record');</script>";
            echo "<script>window.location.href = 'display.php';</script>";
        }
    }
?>