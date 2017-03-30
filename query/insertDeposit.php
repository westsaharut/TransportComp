<?php
  session_start();
  require("../config/connection.php");
  $deposit = $_POST["deposit"];
  $id = $_POST["id"];

  $sql = "SELECT * FROM `Users` WHERE `ID` = " . $id;
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      $total = $row["Money"] + $deposit;
      $sql = "INSERT INTO `Histories`(`Amount`, `Date`, `ActionID`, `UserID`)
              VALUES ('" . $deposit ."', NOW(), 1, " . $id .")";
      $sql2 = "UPDATE `Users` SET `Money`= " . $total ." WHERE `ID` = " . $id;
      if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
            echo "<script>alert(\"New record created successfully.\")
            window.location.href=\"../index.php\";</script>";
      }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
          echo "Error: " . $sql2 . "<br>" . $conn->error;
      }
      $conn->close();
    }
  }
?>
