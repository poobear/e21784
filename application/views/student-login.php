<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css" media="all">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui-1.10.0.custom.min.js"></script>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<div class="well">
					<form action="<?=base_url()."students/login"?>" method="POST">
						<legend>Login</legend>
						<?php if($error == 1): ?>
						<div class="alert">
							<p>รหัสนิสิต และ/หรือ รหัสผ่าน ไม่ถูกต้อง</p>
						</div>
						<?php endif; ?>
						<label for="student_id">รหัสนิสิต</label>
						<input type="text" name="student_id" id="">
						<label for="password">รหัสผ่าน</label>
						<input type="password" name="password" id="">
						<br>
						<button class="btn btn-primary" type="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>