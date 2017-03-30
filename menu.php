	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid" style="background-color: #0dbb7b;">
			<div class="navbar-header" style="background-color: #0dbb7b;">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span style="color: #720b57;"><b>West</b></span>Parking</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<?php
							if(isset($_SESSION["Type"])){
						?>
								<a class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?= $_SESSION["FirstName"]?><span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="query/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sing out</a></li>
								</ul>
						<?php
							}else {
						?>
								<a href="login.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login</a>
						<?php
							}
						?>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>  หน้าหลัก</a></li>
			<?php
				if(!empty($_SESSION["Type"])){
					if($_SESSION["Type"] == "Admin"){
			?>
						<li><a href="addUser.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;&nbsp; เพิ่มบัญชี</a></li>
						<li><a href="deposit.php"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp; ฝากเงิน</a></li>
						<li><a href="borrow.php"><i class="fa fa-money" aria-hidden="true"></i> &nbsp;&nbsp; กู้ยืมเงิน</a></li>
						<li><a href="borrowList.php"><i class="fa fa-money" aria-hidden="true"></i> &nbsp;&nbsp; ประวัติการกู้ยืมเงิน</a></li>
			<?php
					}else if($_SESSION["Type"] == "User"){
			?>
						<?php
							if($_SESSION["AccountTypeID"]==1){
						?>
								<li><a href="Withdrawal.php"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp; ถอนเงิน</a></li>
						<?php
							}
						?>
						<li><a href="historyList.php"><i class="fa fa-list" aria-hidden="true"></i> &nbsp;&nbsp; ดูประวัติ</a></li>
			<?php
					}
				}
			?>
		</ul>
	</div><!--/.sidebar-->
