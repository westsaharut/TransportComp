<?php
  require "header.php";
  require("config/connection.php");
?>
<?php require "menu.php" ;?>

<script>
  function checkspace(){
    if(document.form.firstname.value == ""){
      alert("Please input firstname");
      document.form.firstname.focus();
      return false;
    }
    if(document.form.lastname.value == ""){
      alert("Please input lastname");
      document.form.lastname.focus();
      return false;
    }
    if(document.form.username.value == ""){
      alert("Please input username");
      document.form.username.focus();
      return false;
    }
    if(document.form.password.value == ""){
      alert("Please input password");
      document.form.password.focus();
      return false;
    }else{
      if(document.form.confirmpassword.value == ""){
        alert("Please input confirm password");
        document.form.confirmpassword.focus();
        return false;
      }else{
        if(document.form.password.value != document.form.confirmpassword.value){
          alert("You will need to enter the same password twice to confirm this.");
          document.form.confirmpassword.focus();
          return false;
        }
      }
    }
    if(document.form.money.value < 2000){
      alert("Please input money > 2000 or = 2000");
      document.form.money.focus();
      return false;
    }
  }
</script>

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
          <form action="query/insertUser.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">ชื่อ :</label>
                <div class="col-lg-3">
                  <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter firstname." autofocus>
                </div>
                <div class="col-lg-3">
                  <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Enter lastname." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Username :</label>
                <div class="col-lg-3">
                  <input name="username" type="text" class="form-control" id="username" placeholder="Enter username." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Password :</label>
                <div class="col-lg-3">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Enter password." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Confirm Password :</label>
                <div class="col-lg-3">
                  <input name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Enter confirm password." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">จำนวนเงินที่ฝาก <label style="color:red">(ขั้นต่ำ 2000)</label> :</label>
                <div class="col-lg-3">
                  <input name="money" type="number" class="form-control" id="money" placeholder="Enter money." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">ชนิดบัญชี :</label>
                <div class="col-lg-6">
                  <select name="accountTypeID">
                    <?php
                      $sql = "SELECT * FROM `AccoutTypes`";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                          <option value="<?=$row["ID"]?>"><?= $row["Name"]?></option>
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
