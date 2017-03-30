<?php
  session_start();
  date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>West Parking</title>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

	<link href="assets/img/h_admin.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/datepicker3.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

	<!--Icons-->
	<link rel="stylesheet" type="text/css" href="assets/vandor/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/lumino.glyphs.js"></script>
  <script type="text/javascript" src="assets/ckeditor_standard/ckeditor.js"></script>
  <?php
    if (empty($_SESSION["Type"])){
      echo "<script>alert(\"Please Login!!.\")
      window.location.href=\"login.php\";</script>";
    }
  ?>
</head>
