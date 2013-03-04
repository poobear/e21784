<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet/less" type="text/css" href="<?=base_url()?>assets/css/style.less" />
	<script src="<?=base_url()?>assets/js/less-1.3.3.min.js" type="text/javascript"></script>
</head>
<body>
<div class="text-center">
	<br><br>
	<a href="index.html"><img src="<?=base_url()?>assets/img/logo.png" alt=""></a>
	<div id="login" class="well">
		<form class="form-horizontal" action="<?=base_url()."auth/"?>" method="POST">
			<legend class="text-center">เข้าสู่ระบบ</legend>
			<?php if($error == 1): ?>
			<div class="alert alert-error text-center">
				<i class="icon-warning-sign"></i> &nbsp; คุณกรอกรหัสนิสิตหรือรหัสผ่านผิด กรุณาลองอีกครั้ง
			</div>
			<?php elseif($error == 2): ?>
			<div class="alert alert-error text-center">
				<i class="icon-warning-sign"></i> &nbsp; ไม่พบข้อมูลนิสิตในระบบเลือกภาควิชา
			</div>
			<?php endif; ?>
			<div class="control-group">
				<label class="control-label" for="inputUsername">รหัสนิสิต</label>
				<div class="controls">
					<input type="text" id="inputUsername" name="student_id" placeholder="5531234521" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">รหัสผ่าน</label>
				<div class="controls">
					<input type="password" id="inputPassword" name="password" placeholder="******" required>
				</div>
			</div>
			<!--
			<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox"> อยู่ในระบบตลอดไป
				</label>
			</div>
			</div>
			-->
			<div class="text-center">
				<button type="submit" class="btn btn-large btn-danger">เข้าสู่ระบบ</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>