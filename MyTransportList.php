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
                    <th>วันที่รับ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `Transports`,`Users` WHERE `Users`.`ID` = `Transports`.`UserID` AND `Users`.`ID` = " . $_SESSION["ID"];
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
                          <?php
                            if($row["ReceiveDate"]=="0000-00-00 00:00:00"){
                          ?>
                              <td align="center"><label style="color: red">ของยิ่งไม่ถึงผู้รับ</label></td>
                          <?php
                            }else{
                          ?>
                              <td align="center"><?= $row["CreateDate"] ?></td>
                          <?php
                            }
                          ?>

                          <?php
                            if($_SESSION["Type"] == "Entrepreneur"){
                          ?>
                                <td align="center"><a href="query/bill.php?id=<?=$row["TranID"]?>" class="btn btn-warning btn-sm"><i class="fa fa-usd" aria-hidden="true"></i></a></td>
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
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php require"footer.php"; ?>
</body>
</html>
