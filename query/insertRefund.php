<?php
  session_start();
  require("../config/connection.php");
  $refund = $_POST["refund"];
  $id = $_POST["id"];

  $sql = "SELECT * FROM `BorrowHistories` WHERE `ID` = " . $id;
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      $moneyRefund = $row["MoneyRefund"] - $refund;
      $sql = "INSERT INTO `RefundHistories`(`Refund`, `Date`, `BorrowID`) VALUES ('" . $refund . "', NOW(), '" . $id ."')";
      $sql2 = "UPDATE `BorrowHistories` SET `MoneyRefund`= '" . $moneyRefund . "' WHERE `ID` = " . $id;
      if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
            echo "<script>alert(\"New record created successfully.\")
            window.location.href=\"../borrowList.php\";</script>";
      }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
  }
?>
