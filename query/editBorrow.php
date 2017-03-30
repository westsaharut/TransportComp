<?php
  session_start();
  require("../config/connection.php");
  $userID = $_POST["userID"];
  $borrow = $_POST["borrow"];
  $refund = $_POST["refund"];
  $borrowID = $_POST["borrowID"];

  $sql = "UPDATE `BorrowHistories` SET `Total`='". $borrow ."', `MoneyRefund`='". $refund ."' WHERE `ID`= " . $borrowID;
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"New record created successfully.\")
        window.location.href=\"../borrowList.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  echo $sql;
?>
