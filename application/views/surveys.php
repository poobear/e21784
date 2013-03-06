<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet/less" type="text/css" href="<?=base_url()?>assets/css/style.less" />
	<script src="<?=base_url()?>assets/js/less-1.3.3.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/jquery-ui.js" type="text/javascript"></script>
	<script>
	$(function(){
		$('.btn').click(function(){
			$(this).siblings().removeClass("btn-info");
			$(this).addClass("btn-info");
			var text = $(this).html();
			$(this).parent().siblings('.num').attr('value',text);
		});
	});
	</script>
</head>
<body class="full">
	<div id="header" class="clearfix navbar-fixed-top">
		<div class="ctn">
			<div class="logo">
				<a href=""><img src="<?=base_url()?>assets/img/logo-black2.png" alt=""></a>
			</div>
			<h1 class="left">ระบบเลือกภาคนิสิตคณะวิศวกรรมศาสตร์ ปีการศึกษา 2555</h1>
			<h2 class="right">4 มีนาคม 2556 - 13:30 น. <i class="icon-time"></i> </h2>
		</div>
	</div>
	<div class="ctn" id="content-wrapper">
		<div id="sidebar" class="affix hidden-phone" data-spy="affix" data-offset-top="0">
			<aside>
				<ul class="nav">
					<li><a href=""><i class="icon-home"></i> หน้าหลัก</a></li>
					<li class="current"><a href=""><i class="icon-edit"></i> แบบสอบถาม</a></li>
					<li><a href=""><i class="icon-user"></i> อันดับ (Rank)</a></li>
					<li><a href=""><i class="icon-reorder"></i> เลือกภาควิชา</a></li>
					<li><a href=""><i class="icon-ok"></i> ผลการเลือกภาควิชา</a></li>
					<li><a href=""><i class="icon-off"></i> ออกจากระบบ</a></li>
				</ul>
			</aside>
		</div>
		<div id="sidebar-phone" class="visible-phone">
			<aside>
				<ul class="nav nav-tabs nav-stacked ">
					<li class="current"><a href=""><i class="icon-home"></i> หน้าหลัก</a></li>
					<li><a href=""><i class="icon-edit"></i> แบบสอบถาม</a></li>
					<li><a href=""><i class="icon-user"></i> อันดับ (Rank)</a></li>
					<li><a href=""><i class="icon-reorder"></i> เลือกภาควิชา</a></li>
					<li><a href=""><i class="icon-ok"></i> ผลการเลือกภาควิชา</a></li>
					<li><a href=""><i class="icon-off"></i> ออกจากระบบ</a></li>
				</ul>
			</aside>
		</div>
		<div id="content" class="clearfix">
			<h1><i class="icon-edit"></i> แบบสอบถาม</h1>
			<div class="alert alert-error">
				<i class="icon-warning-sign"></i> &nbsp; error
			</div>
			<form class="form-horizontal survey">
				<table class="table">
					<tr>
						<td width="50%" class="text-right">เพศ</td>
						<td>
							<label class="radio"><input type="radio" name="q1" id="optionsRadios1" value="ชาย"> ชาย</label>
							<label class="radio"><input type="radio" name="q1" id="optionsRadios2" value="หญิง"> หญิง</label>
						</td>
					</tr>
					<tr>
						<td width="50%" class="text-right">นิสิตสามารถพบอาจารย์ที่ปรึกษาได้สะดวกเพียงไร</td>
						<td>
							<label class="radio"><input type="radio" name="q2" id="optionsRadios1" value="มาก"> มาก</label>
							<label class="radio"><input type="radio" name="q2" id="optionsRadios2" value="ปานกลาง"> ปานกลาง</label>
							<label class="radio"><input type="radio" name="q2" id="optionsRadios2" value="น้อย"> น้อย</label>
						</td>
					</tr>
					<tr>
						<td width="50%" class="text-right">นิสิตเคยได้รับคำปรึกษาจากอาจารย์ที่ปรึกษาโดยเฉลี่ยภาคการศึกษาละ</td>
						<td>
							<label class="radio"><input type="radio" name="q3" id="optionsRadios1" value="1 ครั้ง"> 1 ครั้ง</label>
							<label class="radio"><input type="radio" name="q3" id="optionsRadios2" value="2 ครั้ง"> 2 ครั้ง</label>
							<label class="radio"><input type="radio" name="q3" id="optionsRadios2" value="3 ครั้ง"> 3 ครั้ง</label>
							<label class="radio"><input type="radio" name="q3" id="optionsRadios2" value="4 ครั้งหรือมากกว่า"> 4 ครั้งหรือมากกว่า</label>
							<label class="radio"><input type="radio" name="q3" id="optionsRadios2" value="ไม่เคย"> ไม่เคย</label>
						</td>
					</tr>
					<tr>
						<td width="50%" class="text-right">นิสิตทราบหมายเลขโทรศัพท์ของอาจารย์ที่ปรึกษา</td>
						<td>
							<label class="radio"><input type="radio" name="q4" id="optionsRadios1" value="ทราบ"> ทราบ</label>
							<label class="radio"><input type="radio" name="q4" id="optionsRadios2" value="ไม่ทราบ"> ไม่ทราบ</label>
						</td>
					</tr>
					<tr>
						<td width="50%" class="text-right">นิสิตคิดว่าระบบอาจารย์ที่ปรึกษามีความสัมคัญ</td>
						<td>
							<label class="radio"><input type="radio" name="q5" id="optionsRadios1" value="มาก"> มาก</label>
							<label class="radio"><input type="radio" name="q5" id="optionsRadios2" value="าปนกลาง"> ปานกลาง</label>
							<label class="radio"><input type="radio" name="q5" id="optionsRadios2" value="น้อย"> น้อย</label>
						</td>
					</tr>
					<tr>
						<td width="50%" class="text-right">ปัญหาและข้อเสนอแนะอื่นๆ</td>
						<td>
							<textarea name="q6" id="" cols="20" rows="5"></textarea>
						</td>
					</tr>
				</table>
				<table class="table" class="text-center">
					<thead>
						<tr>
							<th width="40%" class="text-right"><strong>นิสิตขอคำแนะนำอาจารย์ที่ปรึกษาในเรื่องต่อไปนี้ในระดับใด</strong></th>
							<th width="30%" class="text-center">จนถึงปัจจุบัน (5 คือมากที่สุด)</th>
							<th width="30%" class="text-center">คาดหวังในอนาคต (5 คือมากที่สุด)</th>
						</tr>
					</thead>
					<tr>
						<td width="40%" class="text-right">การเรียนตามหลักสูตร</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q7" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q8" class="num">
							</div>
						</td>
					</tr>
					<tr>
						<td width="40%" class="text-right">ปัญหาการเรียน</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q9" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q10" class="num">
							</div>
						</td>
					</tr>
					<tr>
						<td width="40%" class="text-right">รับรองการขอทุน/สมัครโครงการต่างๆ</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q11" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q12" class="num">
							</div>
						</td>
					</tr>
					<tr>
						<td width="40%" class="text-right">ปัญหาชีวิต/ครอบครัว/การเงิน</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q13" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q14" class="num">
							</div>
						</td>
					</tr>
					<tr>
						<td width="40%" class="text-right">การพัฒนาคุณภาพชีวิต</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q15" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q16" class="num">
							</div>
						</td>
					</tr>
					<tr>
						<td width="40%" class="text-right">การพัฒนาการเรียน</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q17" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q18" class="num">
							</div>
						</td>
					</tr>
				</table>
				<table class="table" class="text-center">
					<thead>
						<tr>
							<th width="40%" class="text-right"><strong>ความสัมพันธ์ของนิสิตกับอาจารย์ที่ปรึกษาอยู่ในระดับใด</strong></th>
							<th width="30%" class="text-center">จนถึงปัจจุบัน (5 คือมากที่สุด)</th>
							<th width="30%" class="text-center">คาดหวังในอนาคต (5 คือมากที่สุด)</th>
						</tr>
					</thead>
					<tr>
						<td width="40%" class="text-right"></td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q19" class="num">
							</div>
						</td>
						<td width="30%">
							<div class="q1">
								<div class="btn-group" data-toggle="buttons-radio">
									<button type="button" class="btn">5</button>
									<button type="button" class="btn">4</button>
									<button type="button" class="btn">3</button>
									<button type="button" class="btn">2</button>
									<button type="button" class="btn">1</button>
									<button type="button" class="btn">0</button>
								</div>
								<input type="text" name="q20" class="num">
							</div>
						</td>
					</tr>
				</table>
				<div class="text-center">
					<button type="submit" class="btn btn-danger btn-large">ตกลง</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
