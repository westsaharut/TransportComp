<?php
  session_start();
  require("../config/connection.php");
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $money = $_POST["money"];
  $accountTypeID = $_POST["accountTypeID"];

  $sql = "INSERT INTO `Users`(`UserName`, `Password`, `FirstName`, `LastName`, `Money`, `Type`, `AccountTypeID`)
          VALUES ('" . $username . "', '" . $password . "', '" . $firstname . "', '" . $lastname . "', '" . $money . "', 'User', '" . $accountTypeID ."')";
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"New record created successfully.\")
        window.location.href=\"../index.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
