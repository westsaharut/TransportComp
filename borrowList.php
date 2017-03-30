<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
  if($_SESSION["Type"]=="Admin"){
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
      <h1 class="page-header">Borrow List</h1>
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
                    <th>เงินทั้งหมด</th>
                    <th>เงินที่ต้องคืน</th>
                    <th>วันที่ยืม</th>
                    <th>ตัวเลือก</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, `BorrowHistories`.`ID` AS `BorrowID` FROM `BorrowHistories`,`Users` WHERE `BorrowHistories`.`UserID` = `Users`.`ID` ORDER BY `BorrowHistories`.`MoneyRefund` DESC";
                    $result = $conn->query($sql);
                    $i=1;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                  ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td align="center"><?= $row["FirstName"] ." ". $row["LastName"] ?></td>
                          <td align="center"><?= $row["Total"] ?> ฿</td>
                          <td align="center" style="color: red">
                            <?php if($row["MoneyRefund"]<=0){ ?>
                              0.00 ฿
                            <?php
                              }else{
                                echo $row["MoneyRefund"]." ฿";
                            ?>
                            <?php } ?>
                          </td>
                          <td align="center"><?= $row["Date"] ?></td>
                          <td align="center">
                            <?php
                              if($row["MoneyRefund"]<=0){
                            ?>
                                <a href="#" class="btn btn-warning btn-sm" onclick="alert('คืนเงินครบแล้ว');" disabled><i class="fa fa-usd fa-lg" aria-hidden="true"></i></a>
                            <?php
                              }else{
                            ?>
                                <a href="refund.php?id=<?= $row["BorrowID"] ?>&refund=<?= $row["MoneyRefund"] ?>" class="btn btn-warning btn-sm"><i class="fa fa-usd fa-lg" aria-hidden="true"></i></a>
                            <?php
                              }
                            ?>
                            <a href="editBorrow.php?id=<?= $row["BorrowID"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="query/deleteBorrowRefund.php?id=<?= $row["BorrowID"] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
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

<?php
    require"footer.php";
  }
?>
</body>
</html>
