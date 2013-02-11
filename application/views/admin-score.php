<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css" media="all">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="page-header">
				<!-- <h2>เลือกภาควิชา ปีการศึกษา 2556<br>
				<small>คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</small></h1> -->
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<div class="row">
					<blockquote>Admin Panel</blockquote>
				</div>
				<div class="row">
					<ul class="nav nav-tabs nav-stacked">
						<li><a href="#">รายละเอียดภาควิชา</a></li>
						<li><a href="#">เลือกภาควิชา</a></li>
						<li><a href="#">สถิติ</a></li>
					</ul>
				</div>
			</div>
			<div class="span9">
				<?php echo form_open_multipart('scores/admin_upload_csv');?>
					<fieldset>
						<div class="well">
							<legend>Upload data using CSV</legend>
							<input type="file" name="userfile" id="">
							<button type="submit" class="btn btn-primary"><i class="icon-circle-arrow-up icon-white"></i> Upload</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>