<?php
  require "header.php";
  require("config/connection.php");
  $id = $_GET["id"];
  $sql = "SELECT *, `Users`.`ID` AS `UserID` FROM `BorrowHistories`,`Users` WHERE `BorrowHistories`.`UserID` = `Users`.`ID` AND `BorrowHistories`.`ID`= " . $id;
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">แก้ไขการกู้ยืมเงิน</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="query/editBorrow.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">ชื่อผู้กู้ : </label>
                <div class="col-lg-6">
                  <select name="userID">
                    <?php
                      $sqlUsers = "SELECT * FROM `Users` WHERE Type = 'User'";
                      $resultUsers = $conn->query($sqlUsers);
                      if($resultUsers->num_rows > 0) {
                        while($rowUsers = $resultUsers->fetch_assoc()){
                          if($rowUsers["ID"] == $row["UserID"]){
                    ?>
                          <option value="<?=$rowUsers["ID"]?>" selected><?= $rowUsers["FirstName"] . " " . $rowUsers["LastName"]?></option>
                        <?php
                          }else {
                        ?>
                            <option value="<?=$rowUsers["ID"]?>"><?= $rowUsers["FirstName"] . " " . $rowUsers["LastName"]?></option>
                    <?php
                          }
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="borrow" class="col-lg-3 control-label">จำนวนเงินที่กู้ทั้งหมด :</label>
                <div class="col-lg-3">
                  <input name="borrow" type="text" class="form-control" id="borrow" value="<?=$row["Total"]?>" autofocus>
                  <input type="hidden" name="borrowID" value="<?=$id?>">
                </div>
              </div>
              <div class="form-group">
                <label for="refund" class="col-lg-3 control-label">จำนวนเงินที่กู้ที่ต้องจ่าย :</label>
                <div class="col-lg-3">
                  <input name="refund" type="text" class="form-control" id="refund" value="<?=$row["MoneyRefund"]?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <a href="index.php" class="btn btn-default btn-sm">Cancel</a>
                  <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php
      require"footer.php" ;
    }
  }
?>

</body>
</html>
