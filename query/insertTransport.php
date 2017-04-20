<?php
  require("../config/connection.php");
  $weight = $_POST["weight"];
  $address = $_POST["address"];
  $id = $_POST["id"];
  $price = $weight*5;
  $sql = "INSERT INTO `Transports`(`AddressToSend`, `Weight`, `Price`, `UserID`, `CreateDate`)
          VALUES ('".$address."', '".$weight."' , '".$price."', '".$id."', NOW())";
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"Transport created successfully.\")
        window.location.href=\"../MyTransportList.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
