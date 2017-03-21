<?php
  require("../config/connection.php");
  if(isset($_GET["id"])){
    $id = $_GET["id"];
    $update = "UPDATE `History` SET `DateOut` = NOW() WHERE `HisID` = " .$id;
      if($conn->query($update) === TRUE){
          $sql = "SELECT `HisCarNo`, DATEDIFF(`HisDateIn`,`DateOut`) As DiffDate, HOUR(TIMEDIFF(`DateOut`, `HisDateIn`)) AS DiffHour, MINUTE(TIMEDIFF(`DateOut`, `HisDateIn`)) AS DiffMinute
                  FROM `History` WHERE `HisID` = " .$id;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          if($row["DiffMinute"]>=40){
            $row["DiffMinute"] = 1;
          }else if($row["DiffMinute"]<40){
            $row["DiffMinute"] = 0;
          }
          $price = (($row["DiffDate"]*24)+$row["DiffHour"]+$row["DiffMinute"])*50;

          $update = "UPDATE `History` SET `Price` = " . $price ." WHERE `HisID` = " .$id;
            if($conn->query($update) === TRUE){
                echo "<script>alert(\"Update successfully.\")
                window.location.href=\"../showBill.php?id=$id\";</script>";
            }else{
                  echo "Error: " . $update . "<br>" . $conn->error;
            }
      }else{
            echo "Error: " . $update . "<br>" . $conn->error;
      }
      $conn->close();
  }
?>
