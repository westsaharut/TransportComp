<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Profile</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1>
            <label style="color: #cecece">ชื่อ :</label> <?= $_SESSION["FirstName"] . " " . $_SESSION["LastName"]?><br>
            <label style="color: #cecece">ที่อยู่ :</label> <?= $_SESSION["Address"]?><br>
            <label style="color: #cecece">ชนิดบัญชี :</label> <?= $_SESSION["Type"]?><br>
          </h1>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php require"footer.php" ;?>
</body>
</html>
