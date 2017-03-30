<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">ถอนเงิน</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="query/insertDeposit.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">ชื่อผู้ฝาก :</label>
                <div class="col-lg-6">
                  <select name="id">
                    <?php
                      $sql = "SELECT * FROM `Users` WHERE Type = 'User'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                          <option value="<?=$row["ID"]?>"><?= $row["FirstName"] . " " . $row["LastName"]?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">จำนวนเงินที่ฝาก :</label>
                <div class="col-lg-3">
                  <input name="deposit" type="text" class="form-control" id="deposit" placeholder="Enter deposit." autofocus>
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

<?php require"footer.php" ;?>

</body>
</html>
