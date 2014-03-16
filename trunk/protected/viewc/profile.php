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
		<div class="col-md-8 col-md-offset-2 well">
			<div class="row">
				<ul class="nav nav-pills nav-stacked col-md-3">
				  <li class="active"><a href="#profile-content" data-toggle="tab">Mon profil</a></li>
				  <li><a href="#notifications-content" data-toggle="tab">Mes notifications</a></li>
				</ul>
				<div class="tab-content col-md-9">
					<div class="tab-pane fade in active" id="profile-content">
						<div><span class="glyphicon glyphicon-user"></span> MON PROFIL</div><hr>
						<form id="update-profile-form" method="post" action="<?php echo $data['baseurl']; ?>editprofile" role="form">
							  <div class="form-group">
							    <label for="inputFirstNameProfile">Prénom :</label><br>
							    <input type="text" value="<?php echo $data['user']['firstname']; ?>" class="form-control" name="inputFirstNameProfile" id="inputFirstNameProfile" placeholder="Prénom">
							  </div>
							  <div class="form-group">
							    <label for="inputLastNameProfile">Nom :</label><br>
							    <input type="text" value="<?php echo $data['user']['lastname']; ?>" class="form-control" name="inputLastNameProfile" id="inputLastNameProfile" placeholder="Nom">
							  </div>  
							  <div class="form-group">
							    <label for="inputEmailProfile">Email :</label><br>
							    <input type="text" value="<?php echo $data['user']['email']; ?>" class="form-control" name="inputEmailProfile" id="inputEmailProfile" placeholder="Email">
							  </div><br>
							  <div class="form-group">
							      <a href="javascript:void(0)" id="to-update-profile-action" class="btn btn-default">Editer mon profil</a>
							  </div>
						</form>
					</div>
					<div class="tab-pane fade" id="notifications-content">
						<div><span class="glyphicon glyphicon-bell"></span> MES NOTIFICATIONS</div><hr>
						
						<div class="hidden-elements">
							<div id="simple_alert_tl_seconds"><?php echo $data['notification']['simple_alert_tl']; ?></div>
							<div id="critical_alert_tl_seconds"><?php echo $data['notification']['critical_alert_tl']; ?></div>
						</div>
						
						<form id="notification-form">
							<div class="panel panel-warning">
							  <div class="panel-body">
							    <div>ALERTE DE NIVEAU 1</div><hr>
							    <div class="input-group">
							    	<span class="input-group-addon">Nom de l'activité :</span>
							    	<input type="text" class="form-control" id="simple_alert_msg" placeholder="Votre message" value="<?php echo $data['notification']['simple_alert_msg']; ?>" name="simple_alert_msg">
							    </div>
							    <p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activite : Votre message</p>
							    <div class="well">
								    <div class="row">
								    	<div class="col-xs-2">
								    		<input type="number" id="simple_alert_tl_day" step="1" value="0" min="0" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>jour(s)</label>
								    	</div>
								    	<div class="col-xs-2">
								    		<input type="number" id="simple_alert_tl_hour" step="1" value="0" min="0" max="23" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>heure(s)</label>
								    	</div>
								    	<div class="col-xs-2">
								    		<input type="number" id="simple_alert_tl_minute" step="1" value="0" min="0" max="59" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>minute(s)</label>
								    	</div>
								    </div>
							    </div>
							  </div>
							</div>
							<div class="panel panel-danger">
							  <div class="panel-body">
							    <div>ALERTE DE NIVEAU 2</div><hr>
							    <div class="input-group">
							    	<span class="input-group-addon">Nom de l'activité :</span>
							    	<input type="text" class="form-control" id="critical_alert_msg" placeholder="Votre message" value="<?php echo $data['notification']['critical_alert_msg']; ?>" name="critical_alert_msg">
							    </div>
							    <p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activité : Votre message</p>
							    <div class="well">
								    <div class="row">
								    	<div class="col-xs-2">
								    		<input type="number" id="critical_alert_tl_day" step="1" value="0" min="0" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>jour(s)</label>
								    	</div>
								    	<div class="col-xs-2">
								    		<input type="number" id="critical_alert_tl_hour" step="1" value="0" min="0" max="23" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>heure(s)</label>
								    	</div>
								    	<div class="col-xs-2">
								    		<input type="number" id="critical_alert_tl_minute" step="1" value="0" min="0" max="59" class="form-control"/>
								    	</div>
								    	<div class="col-xs-2 alert-tl-label">
								    		<label>minute(s)</label>
								    	</div>
								    </div>
							    </div>
							  </div>
							</div>
							<div class="panel panel-info">
							  <div class="panel-body">
							    <div>FIN DE L'ACTIVITE</div><hr>
							    <div class="input-group">
							    	<span class="input-group-addon">Nom de l'activité :</span>
							    	<input type="text" class="form-control" id="end_activity_msg" placeholder="Votre message" value="<?php echo $data['notification']['end_activity_msg']; ?>" name="end_activity_msg">
							    </div>
							    <p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activité : Votre message</p>
							  </div>
							</div>
							<input type="hidden" name="notification_id" value="<?php echo $data['notification']['notification_id']; ?>"/>
							<input type="hidden" id="simple_alert_tl" value='' id="simple_alert_tl" name="simple_alert_tl"/>
							<input type="hidden" id="critical_alert_tl" value='' id="critical_alert_tl" name="critical_alert_tl"/>
							<a href="javascript:void(0)" id="to-update-notifications-action" class="btn btn-default">Modifier mes notifications</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/profile_page.js"></script>
</html>