<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<!-- <?php //$this->load->view('header'); ?> --> 
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css" media="all">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui-1.10.0.custom.min.js"></script>
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
				<div class="alert alert-error">นิสิตได้ทำการเลือกภาควิชาไปแล้ว</div>
			</div>
		</div>
	</div>
</body>
</html>