<?php
  require("../config/connection.php");
  $id = $_GET["id"];
  $sql = "UPDATE `Transports` SET `ReceiveDate`= NOW() WHERE `TranID` = ".$id;
  if($conn->query($sql) === TRUE){
        echo "<script>alert(\"Bill successfully.\")
        window.location.href=\"../TransportForSendList.php\";</script>";
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
