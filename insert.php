<?php
    $name = $_POST['name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $select = $_POST['select'];


    //Database Connection

    $conn = new mysqli('localhost','root','','test');
    if(!$conn){
        echo"connection error";
        die('connection Failed : ' .$conn->connection_error);
    }else{
      $sql = "INSERT INTO registration(name,date,email,`select`) VALUES('$name','$date','$email','$select')";

        mysqli_query($conn,$sql);
        

    }

    // echo "1";
?>