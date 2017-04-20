<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Add User</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="query/insertTransport.php" class="form-horizontal" method="post" name="form">
            <fieldset>
              <div class="form-group">
                <label for="weight" class="col-lg-3 control-label">Weight :</label>
                <div class="col-lg-3">
                  <input name="weight" type="weight" class="form-control" id="weight" placeholder="Enter weight." autofocus>
                  <input type="hidden" name="id" value="<?=$_SESSION["ID"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address :</label>
                <div class="col-lg-3">
                  <textarea name="address" id="address" rows="5" cols="60" placeholder="Enter address."></textarea>
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

<?php require"footer.php" ;?>

</body>
</html>
