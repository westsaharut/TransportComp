<?php
  session_start();
  require("../config/connection.php");
  $withdrawal = $_POST["withdrawal"];
  $sql = "SELECT * FROM `Users` WHERE `ID` = " . $_SESSION["ID"];
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      if($row["Money"]<$withdrawal){
        echo "<script>alert(\"เงินของคุณไม่พอที่จะถอนได้.\")
              window.location.href=\"../Withdrawal.php\";</script>";
      }else{
        $total = $row["Money"] - $withdrawal;
        $sql = "INSERT INTO `Histories`(`Amount`, `Date`, `ActionID`, `UserID`)
                VALUES ('" . $withdrawal ."', NOW(), 2, " . $_SESSION["ID"] .")";
        $sql2 = "UPDATE `Users` SET `Money`= " . $total ." WHERE `ID` = " . $_SESSION["ID"];
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
  }
?>
