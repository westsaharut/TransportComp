<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
?>
<script>
  $(document).ready(function() {
    $('#table1').dataTable( {
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
      'bInfo': false,
    } );
  } );
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Transport For Send List</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-bordered table-hover" id="table1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>น้ำหนัก</th>
                    <th>ราคา</th>
                    <th>ที่อยู่ที่ส่ง</th>
                    <th>วันที่ส่ง</th>
                    <th>วันที่ได้รับ</th>
                    <?php
                      if($_SESSION["Type"] == "Entrepreneur"){
                    ?>
                        <th>แก้ไข</th>
                    <?php
                      }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `Transports`,`Users` WHERE `Users`.`ID` = `Transports`.`UserID` AND `ReceiveDate` != '0000-00-00 00:00:00'";
                    $result = $conn->query($sql);
                    $i=1;
                    $totalPrice = 0;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                        $totalPrice = $totalPrice + $row["Price"];
                  ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td align="center"><?= $row["FirstName"] ." ". $row["LastName"] ?></td>
                          <td align="center"><?= $row["Weight"] ?></td>
                          <td align="center"><?= $row["Price"] ?> ฿</td>
                          <td align="center"><?= $row["AddressToSend"] ?></td>
                          <td align="center"><?= $row["CreateDate"] ?></td>
                          <td align="center"><?= $row["ReceiveDate"] ?></td>
                          <?php
                            if($_SESSION["Type"] == "Entrepreneur"){
                          ?>
                                <td align="center"><a href="editBill.php?id=<?=$row["UserID"]?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
                          <?php
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
          <h1><label style="color: #cecece">ยอดรวมทั้งหมด :</label> <?= $totalPrice ?> ฿</h1>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php require"footer.php"; ?>
</body>
</html>
