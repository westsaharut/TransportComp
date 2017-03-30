<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Profile</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1>
            <label style="color: #cecece">ชื่อ :</label> <?= $_SESSION["FirstName"] . " " . $_SESSION["LastName"]?><br>
            <?php
              if($_SESSION["Type"]=="User"){
            ?>
              <label style="color: #cecece">ชนิด :</label>
              <?php
                $sql = "SELECT * FROM `AccoutTypes` WHERE `ID` = " . $_SESSION["AccountTypeID"];
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  if($row = $result->fetch_assoc()){
                    echo $row["Name"];
                  }
                }
              ?><br>
              <label style="color: #cecece">ยอดเงินคงเหลือ :</label>
              <?php
                $sql = "SELECT `Money` FROM `Users` WHERE ID = " . $_SESSION["ID"];
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  if($row = $result->fetch_assoc()){
                    echo $row["Money"];
                  }
                }
              ?>​ ฿<br>
            <?php
              }else if($_SESSION["Type"]=="Admin"){
            ?>
                You're Admin!!
            <?php
              }
            ?>
            <?php
              if($_SESSION["AccountTypeID"]==2){
            ?>
                ยังไม่ครบ 2 ปี ยังถอนไม่ได้
                <?php
                  $sql = "SELECT *, DATE_ADD(CreateDate, INTERVAL 1 YEAR) AS `endDate`, NOW() AS `now` FROM `Users` WHERE `ID` =" . $_SESSION["ID"];
                  $result = $conn->query($sql);
                  if($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                      // echo $row["endDate"] - $row["now"];
                    }
                  }
                ?>
            <?php
              }
            ?>
          </h1>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php require"footer.php" ;?>
</body>
</html>
