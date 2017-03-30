<?php
  require "header.php";
  require("config/connection.php");
  $id = $_GET["id"];
  $refund = $_GET["refund"];
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
          <form action="query/insertRefund.php" class="form-horizontal" method="post" name="form" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-3 control-label">จำนวนเงินที่ต้องคืน :</label>
                <div class="col-lg-3">
                  <h1><?=$refund?> ฿</h1>
                </div>
              </div>
              <div class="form-group">
                <label for="refund" class="col-lg-3 control-label">จำนวนเงินที่คืน :</label>
                <div class="col-lg-3">
                  <input name="refund" type="text" class="form-control" id="refund" placeholder="Enter refund." autofocus>
                  <input type="hidden" name="id" value="<?=$id?>">
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
