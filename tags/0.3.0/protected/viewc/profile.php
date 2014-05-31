<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Mon profil - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
	<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div id="ajax-loader"><img src="<?php echo $data['baseurl']; ?>global/img/ajaxloader.gif" alt="ajax-loader-gif"/></div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1 well">
			<div class="row">
				<ul class="nav nav-pills nav-stacked col-md-3">
				  <li class="active"><a href="#profile-content" data-toggle="tab">Mon profil</a></li>
				  <li><a href="#notifications-content" data-toggle="tab">Mes notifications</a></li>
				  <li><a href="#activity-type-content" data-toggle="tab">Mes types d'activités</a>
				</ul>
				<div class="tab-content col-md-9">
					<div class="tab-pane fade in active" id="profile-content">
						<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/user_profile_section.php"; ?>
					</div>
					<div class="tab-pane fade" id="notifications-content">
						<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/notification_section.php"; ?>
					</div>
					<div class="tab-pane fade" id="activity-type-content">
						<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/activity_type_section.php"; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/profile_page.js"></script>
</html>