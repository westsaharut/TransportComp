<?php
  session_start();
  require("../config/connection.php");
  $borrow = $_POST["borrow"];
  $id = $_POST["id"];

  $sql = "INSERT INTO `BorrowHistories`(`MoneyRefund`, `Total`, `Date`, `UserID`)
          VALUES ('" . $borrow . "', '" . $borrow . "', NOW(), " . $id .")";
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"New record created successfully.\")
        window.location.href=\"../borrowList.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
