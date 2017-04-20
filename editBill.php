<?php
  require "header.php";
  require("config/connection.php");
  $id = $_GET["id"];
  $sql = "SELECT * FROM `Transports`,`Users` WHERE `Users`.`ID` = `Transports`.`UserID` AND `ReceiveDate` != '0000-00-00 00:00:00' AND `Transports`.`UserID` = " . $id;
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Bill</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1>
            <label style="color: #cecece">Bill ID :</label> <?=$row["ID"]?>&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="color: #cecece">Name :</label> <?=$row["FirstName"]." ".$row["LastName"]?>
          </h1>
          <form action="query/editBill.php" class="form-horizontal" method="post" name="form" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="weight" class="col-lg-3 control-label">น้ำหนัก :</label>
                <div class="col-lg-3">
                  <input name="weight" type="text" class="form-control" id="weight" value="<?=$row["Weight"]?>" autofocus>
                  <input type="hidden" name="id" value="<?=$id?>">
                </div>
              </div>
              <div class="form-group">
                <label for="createDate" class="col-lg-3 control-label">วันที่ส่ง :</label>
                <div class="col-lg-3">
                  <input name="createDate" type="date" class="form-control" id="createDate" value="<?=$row["CreateDate"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="receiveDate" class="col-lg-3 control-label">วันที่ได้รับ :</label>
                <div class="col-lg-3">
                  <input name="receiveDate" type="date" class="form-control" id="receiveDate" value="<?=$row["ReceiveDate"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">ที่อยู่ :</label>
                <div class="col-lg-3">
                  <textarea name="address" id="address" rows="5" cols="60"><?=$row["Address"]?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <button type="submit" class="btn btn-info btn-sm">Submit</button>
                  <a href="index.php" class="btn btn-default btn-sm">Cancel</a>
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
