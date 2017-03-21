<?php
  require("../config/connection.php");
  $no = $_POST["no"];
  $type = $_POST["type"];
  $userID = $_POST["userID"];

  $sql = "INSERT INTO `History`(`HisCarNo`, `HisCarType`, `HisDateIn`, `UseID`)
          VALUES ('" . $no . "', '" . $type  . "', NOW(), " . $userID . ")";

  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"New record created successfully.\")
        window.location.href=\"../index.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

?>
