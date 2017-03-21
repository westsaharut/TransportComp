<?php
  session_start();
  require("../config/connection.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["input_username"]) && !empty($_POST["input_password"])){

      $sql_select = " SELECT *
                      FROM Users
                      WHERE UseUsername = '" . $_POST["input_username"] . "'
                            AND UsePassword = '" . $_POST["input_password"] ."' ";
      $result = $conn->query($sql_select);
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION["UseID"]         = $row["UseID"] ;
        $_SESSION["UseFirstName"]  = $row["UseFirstname"];
        $_SESSION["UseLastName"]   = $row["UseLastname"];
        $_SESSION["UseType"]   = $row["UseType"];
        echo "<script>alert(\"Login done!!.\")
        window.location.href=\"../index.php\";</script>";
      }else{
        echo "<script>alert(\"Username or password incorrect.\")
        window.location.href=\"../login.php\";</script>";
      }
    }else {

      echo "<script>alert(\"Please enter username and password.\")
      window.location.href=\"../login.php\";</script>";
    }
  }else{
    header('Location: ../login.php');
  }
?>
