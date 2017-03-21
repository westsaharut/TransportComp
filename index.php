<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Parking List </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Car NO.</th>
                    <th>Car Type</th>
                    <th>Date In</th>
                    <?php
        							if(isset($_SESSION["UseType"])){
                        if($_SESSION["UseType"] == "admin"){
        						?>
                        <td>Edit</td>
        						<?php
                        }
        							}
        						?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql_select = "SELECT * FROM `History` WHERE `DateOut` = '0000-00-00 00:00:00'";
                    $result = $conn->query($sql_select);
                    $i=1;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                  ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $row["HisCarNo"] ?></td>
                          <td><?= $row["HisCarType"] ?></td>
                          <td><?= $row["HisDateIn"] ?></td>
                          <?php
                    				if(!empty($_SESSION["UseType"])){
                    					if($_SESSION["UseType"] == "admin"){
                    			?>
                              <td>
                                <a href="query/bill.php?id=<?= $row["HisID"] ?>" class="btn btn-success btn-sm"><i class="fa fa-usd" aria-hidden="true"></i></i></a>
                                <a href="editParking.php?id=<?= $row["HisID"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="query/deleteParking.php?id=<?= $row["HisID"] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you want to delete?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                              </td>
                          <?php
                              }
                            }
                          ?>
                        </tr>
                  <?php
                        $i++;
                      }
                    }
                  ?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Search Parking History</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
            <div class="panel-body">
              <form action="historyList.php" class="form-horizontal" method="post" name="form">
                <fieldset>
                  <div class="form-group">
                    <label for="name" class="col-lg-3 control-label">Date Start</label>
                    <div class="col-lg-6">
                      <input name="start" type="date" class="form-control" id="name" placeholder="Enter animal name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-lg-3 control-label">Date End</label>
                    <div class="col-lg-6">
                      <input name="end" type="date" class="form-control" id="type" placeholder="Enter animal type">
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
  </div>
</div>	<!--/.main-->

<?php require"footer.php" ;?>
</body>
</html>
