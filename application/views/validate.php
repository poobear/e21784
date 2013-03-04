<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
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
		<?php if($result == "success"): ?>
		<form class="text-center form-horizontal">
			<legend>โปรดเช็คอีเมล</legend>
			<span class="help-block">โปรดเช็คอีเมล <strong class="text-success"><?=$email?></strong> เพื่อรอรับอีเมลยืนยันการเข้าระบบครั้งแรก</span>
		</form>
		<?php else: ?>
		<form class="text-center form-horizontal" action="<?=base_url()."validates/"?>" method="POST">
			<legend>ยืนยันอีเมล</legend>
			<span class="help-block">กรอกอีเมลที่ใช้ประจำเพื่อรับข่าวสารจากทางคณะ</span><br>
			<?php if($result == "invalid"): ?>
			<div class="alert alert-error text-center">
				<i class="icon-warning-sign"></i> &nbsp; มีนิสิตอื่นใช้อีเมลนี้แล้ว
			</div>
			<?php endif; ?>
			<div class="control-group">
				<label class="control-label" for="inputUsername">รหัสนิสิต</label>
				<div class="controls">
					<input type="text" id="inputUsername" placeholder="<?=$student_id?>" required disabled>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">อีเมล</label>
				<div class="controls">
					<input type="email" name="email" id="inputEmail" placeholder="youremail@gmail.com" required>
				</div>
			</div>
				<button type="submit" class="btn btn-primary">ตกลง</button>
				<br><br>
				<span class="help-block">หลังจากกดแล้ว โปรดเช็คใน Inbox เพื่อรอรับอีเมลยืนยัน</span>
		</form>
		<?php endif; ?>
	</div>
</div>
</body>
</html>