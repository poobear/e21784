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
				<h2>เลือกภาควิชา ปีการศึกษา 2556<br>
				<small>คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</small></h1>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<div class="row">
					<blockquote><?=$student['student_id']?><br>
					<?=$student['prefix_th'].$student['firstname_th']." ".$student['lastname_th']?></blockquote>
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
			<?php if($args == "success"): ?>
				<div class="alert alert-success">
					นิสิตได้ทำการเลือกภาควิชาเรียบร้อยแล้ว
				</div>
			<?php elseif($args == "selected"): ?>
				<div class="alert">นิสิตได้ทำการเลือกภาควิชาแล้ว</div>
			<?php elseif($args == "empty"): ?>
				<div class="alert alert-error">นิสิตยังไม่ได้ทำการเลือกภาควิชา</div>
			<?php endif; ?>
			<?php if($args != "empty"): ?>
				<!-- generate list -->
				<ul>
				<?php foreach ($list as $row): ?>
					<li><?=$row['prefix_en']." - ".$row["name_th"];?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>