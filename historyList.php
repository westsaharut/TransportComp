<?php
  require "header.php";
  require("config/connection.php");
  $start = $_POST["start"];
  $end = $_POST["end"];
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
                    <th>Type</th>
                    <th>Date In</th>
                    <th>Date Out</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `History`";
                    if($start!=null && $end !=null){
                      $sql = $sql."WHERE `HisDateIn` >= '".$start."' AND `DateOut` <= '".$end."'";
                    }else if($start!=null){
                      $sql = $sql."WHERE `HisDateIn` >= '".$start."'";
                    }else if($end!=null){
                      $sql = $sql."WHERE `DateOut` <= '".$end."'";
                    }

                    $sql = $sql." ORDER BY HisDateIn DESC";

                    $result = $conn->query($sql);
                    $i=1;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                  ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $row["HisCarNo"] ?></td>
                          <td><?= $row["HisCarType"] ?></td>
                          <td><?= $row["HisDateIn"] ?></td>
                          <td><?= $row["DateOut"] ?></td>
                          <td><?= $row["Price"] ?> ฿</td>
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
</div>	<!--/.main-->

<?php require"footer.php" ;?>
</body>
</html>
