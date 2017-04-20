<?php
  session_start();
  require("../config/connection.php");
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $address = $_POST["address"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $type = $_POST["type"];

  $sql = "INSERT INTO `users`(`UserName`, `Password`, `FirstName`, `LastName`, `Address`, `Type`)
          VALUES ('".$username."', '".$password."', '$firstname', '".$lastname."', '".$address."', '".$type."')";
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"User created successfully.\")
        window.location.href=\"../index.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
