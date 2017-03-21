<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Parking Add</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="query/insertParking.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Car NO. :</label>
                <div class="col-lg-6">
                  <input name="no" type="text" class="form-control" id="name" placeholder="Enter car NO." autofocus>
                </div>
              </div>
              <div class="form-group">
                <label for="type" class="col-lg-3 control-label">Car Type :</label>
                <div class="col-lg-6">
                  <input name="type" type="text" class="form-control" id="type" placeholder="Enter car type">
                </div>
              </div>
              <div class="form-group">
                <label for="userID" class="col-lg-3 control-label">User :</label>
                <div class="col-lg-6">
                  <select name="userID" id="userID">
                    <?php
                      $sql_select = "SELECT * FROM `Users` WHERE `UseType` != 'admin' ";
                      $result = $conn->query($sql_select);
                      $i=1;
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?= $row['UseID'] ?>"><?= $row["UseFirstname"] . " " . $row["UseLastname"] . " (" . $row["UseType"] . ")" ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
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
