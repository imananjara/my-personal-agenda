<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Mon profil - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['baseurl']; ?>global/css/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
	<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<div>MON PROFIL</div>
			<hr>
				<form id="update-profile-form" class="form-horizontal" method="post" action="<?php echo $data['baseurl']; ?>editprofile" role="form">
					  <div class="form-group">
					    <label class="col-sm-2 control-label">Login</label>
					    <div class="col-sm-10">
					      <p class="form-control-static"><?php echo $data['user']['login']; ?></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputFirstNameProfile" class="col-sm-2 control-label">Prenom</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo $data['user']['firstname']; ?>" class="form-control" name="inputFirstNameProfile" id="inputFirstNameProfile" placeholder="Prenom">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputLastNameProfile" class="col-sm-2 control-label">Nom</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo $data['user']['lastname']; ?>" class="form-control" name="inputLastNameProfile" id="inputLastNameProfile" placeholder="Nom">
					    </div>
					  </div>  
					  <div class="form-group">
					    <label for="inputBirthdayProfile" class="col-sm-2 control-label">Naissance</label>
					    <div class="col-sm-5">
						  <div class='input-group date' id="inputBirthdayProfile">
					      	<input type="text" value="<?php echo $data['user']['birthday_date']; ?>" class="form-control" name="inputBirthdayProfile" placeholder="Date de naissance">
					      	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmailProfile" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo $data['user']['email']; ?>" class="form-control" name="inputEmailProfile" id="inputEmailProfile" placeholder="Email">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <a href="javascript:void(0)" id="to-update-profile-action" class="btn btn-default">Editer mon profil</a>
					   </div>
					  </div>
				</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/profile_page.js"></script>
</html>