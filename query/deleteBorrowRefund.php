<?php
  require("../config/connection.php");
  if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "DELETE FROM `BorrowHistories` WHERE `ID` = " . $id;
    $sql2 = "DELETE FROM `RefundHistories` WHERE `BorrowID` = " . $id;
    if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
      echo "<script>alert(\"Delete successfully.\")
      window.location.href=\"../borrowList.php\";</script>";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  $conn->close();
?>
