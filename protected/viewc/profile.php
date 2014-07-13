<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Mon profil - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/x-editable/bootstrap-editable.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/x-editable/bootstrap-editable.min.js"></script>
</head>
<body>
	<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div id="ajax-loader"><img src="<?php echo $data['baseurl']; ?>global/img/ajaxloader.gif" alt="ajax-loader-gif"/></div>
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div class="well custom-well">
				<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/user_profile_section.php"; ?>
			</div>
			<div class="well custom-well">
				<div class="custom-well-header">Section en travaux</div><hr>
				<p>Un nouvel élément sera bientôt disponible. Restez connecté !</p>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well custom-well">
				<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/notification_section.php"; ?>
			</div>
			<div class="well custom-well">
				<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/activity_type_section.php"; ?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/profile_page.js"></script>
</html>