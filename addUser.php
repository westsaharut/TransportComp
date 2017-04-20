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
    if(document.form.address.value == ""){
      alert("Please input address");
      document.form.address.focus();
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
  }
</script>

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
          <form action="query/insertUser.php" class="form-horizontal" method="post" name="form" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="firstname" class="col-lg-3 control-label">ชื่อ :</label>
                <div class="col-lg-3">
                  <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter firstname." autofocus>
                </div>
                <div class="col-lg-3">
                  <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Enter lastname." >
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address :</label>
                <div class="col-lg-3">
                  <textarea name="address" rows="5" cols="60" id="address" placeholder="Enter address."></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="username" class="col-lg-3 control-label">Username :</label>
                <div class="col-lg-3">
                  <input name="username" type="text" class="form-control" id="username" placeholder="Enter username." >
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-3 control-label">Password :</label>
                <div class="col-lg-3">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Enter password." >
                </div>
              </div>
              <div class="form-group">
                <label for="confirmpassword" class="col-lg-3 control-label">Confirm Password :</label>
                <div class="col-lg-3">
                  <input name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Enter confirm password." >
                </div>
              </div>
              <div class="form-group">
                <label for="Type" class="col-lg-3 control-label">ชนิดผู้ใช้ :</label>
                <div class="col-lg-6">
                  <select name="type">
                    <option value="User">ผู้ใช้</option>
                    <option value="Clerk">เสมียน</option>
                    <option value="Chauffeur">พนักงานขับรถ</option>
                    <option value="Entrepreneur">ผู้ประกอบการ</option>
                  </select>
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
