<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    //database connection

    $conn = new mysqli('localhost','root','Abhijit@123','portfolio');

    if($conn->connect_error)
    {
        die('Connection Failed : '. $conn->connect_error);
    }
    else{
        //sql query
        $stmt = $conn->prepare("insert into feedback(Name, email, message) values(?,?,?)");

        //binding parameters
        $stmt->bind_param("sss",$name,$email,$message);

        $stmt->execute();
        echo "Thanks for feedback....";
        $stmt->close();
        $conn->close();
    }
?>