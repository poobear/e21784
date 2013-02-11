<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css" media="all">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/select.js"></script>
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
				<ul class="nav nav-tabs nav-stacked" id="deptlist">
					<?php foreach ($dept as $row): ?>
					<li id="<?=$row['prefix_en']?>"><a href="#"><span class="badge"></span> <?=$row['prefix_en']." - ".$row['name_th']?></a></li>
					<?php endforeach; ?>
				</ul>
				<a href="#confirm" id="confirmbutton" role="button" class="btn" data-toggle="modal">ยืนยันการเลือกภาควิชา</a>
				<div id="confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="confirmDialog" aria-hidden="true">
					<div class="modal-header">
						<h3>ยืนยันลำดับการเลือกภาควิชา<br><small><?=$student['student_id']." - ".$student['prefix_th'].$student['firstname_th']." ".$student['lastname_th']?></small></h3>
					</div>
					<div class="modal-body">
						<div class="alert alert-error">คำเตือน: นิสิตสามารถเลือกได้ครั้งเดียวเท่านั้น ไม่สามารถแก้ไขได้</div>
						<ul id="confirmlist">
							
						</ul>
					</div>
					<div class="modal-footer">
						<form action="<?=base_url().'select/select_dept'?>" method="POST">
							<input style="display:none" type="text" name="selectlist" id="selectlist">
							<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
							<button class="btn btn-primary">ยืนยัน</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>