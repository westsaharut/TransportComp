<?php
  require("../config/connection.php");
  $weight = $_POST["weight"];
  $createDate = $_POST["createDate"];
  $receiveDate = $_POST["receiveDate"];
  $address = $_POST["address"];
  $id = $_POST["id"];
  $price = $weight*5;

  $sql = "UPDATE `Transports` SET `AddressToSend`='".$address."', `Weight`='".$weight."', `Price`='".$price."', `CreateDate`='".$createDate."', `ReceiveDate`='".$receiveDate."' WHERE `TranID` =".$id;

  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"Transport update successfully.\")
        window.location.href=\"../TransportSuccList.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
