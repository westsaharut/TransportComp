 <?php
  require "header.php";
  require("config/connection.php");
  if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM `History`, `Users` WHERE `History`.`UseID` = `Users`.`UseID` AND `HisID` = " .$id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $discount = 0;
    if($row["UseType"]=="silver"){
      $discount = 10;
    }else if($row["UseType"]=="gold"){
      $discount = 25;
    }else if($row["UseType"]=="premium"){
      $discount = 35;
    }
    $price = ($row["Price"]*(100-$discount))/100;
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
          Car No : <?=$row["HisCarNo"]?><br>
          Car Type : <?=$row["HisCarType"]?><br>
          Date In : <?=$row["HisDateIn"]?><br>
          Date Out : <?=$row["DateOut"]?><br>
          Price : <?=$row["Price"]?> ฿<br>
          Type : <?=$row["UseType"]?> (<?=$discount?> %)<br>
          Discount : <?=$price?> ฿<br><br>

          <form action="change.php" method="post">
            <fieldset>
              <div class="form-group">
                <label for="money" class="col-lg-1 control-label">Money</label>
                <div class="col-lg-3">
                  <input name="money" type="number" class="form-control" id="money" placeholder="Enter money">
                  <input type="hidden" name="price" value="<?=$price?>">
                  <input type="hidden" name="id" value="<?=$row["HisID"]?>">
                </div>
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
              </div>
            </fieldset>
          </form>
          <a href="index.php" class="btn btn-sm btn-primary"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php
    require"footer.php" ;
  }
?>

</body>
</html>
