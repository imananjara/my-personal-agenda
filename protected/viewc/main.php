<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<meta name="viewport" content="width=device-width">
	<title>Page principale - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/bootstrap-notify/bootstrap-notify.css" rel="stylesheet">
</head>
<body class="container-fluid">
	<div style="z-index: 10;" class='notifications bottom-right'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	
	<div id="user-parameters" class="hidden-elements">
		<div id="simple_alert_msg"><?php echo $data['notification']['simple_alert_msg']; ?></div>
		<div id="simple_alert_tl"><?php echo $data['notification']['simple_alert_tl']; ?></div>
		<div id="critical_alert_msg"><?php echo $data['notification']['critical_alert_msg']; ?></div>
		<div id="critical_alert_tl"><?php echo $data['notification']['critical_alert_tl']; ?></div>
		<div id="end_activity_msg"><?php echo $data['notification']['end_activity_msg']; ?></div>
	</div>

	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<?php if( isset($data['activities']) ): ?>
			<div id="activity-section-panel">
				<?php foreach($data['activities'] as $k1=>$v1): ?>
				<div class="well custom-well">
					<div class="activityNameForNotif custom-well-header"><?php echo $v1['title']; ?> (<?php echo $v1['activity_type']['activity_type_name']; ?>)</div>
					<hr>
					<p class="activityDescription"><?php echo $v1['description']; ?></p><br>
					<?php if( $v1['nb_days_left'] == 0 && $v1['nb_hours_left'] == 0 && $v1['nb_minutes_left'] == 0 && $v1['nb_seconds_left'] == 0 ): ?>
					<p class="bg-success">L'activité est terminée</p><br>
					<?php else: ?>
					<p class="bg-info">Il reste <span class="text-info"><strong><?php echo $v1['nb_days_left']; ?></strong></span> jour(s), <span class="text-info"><strong><?php echo $v1['nb_hours_left']; ?></strong></span> heure(s), <span class="text-info"><strong><?php echo $v1['nb_minutes_left']; ?></strong></span> minute(s) et <span class="text-info"><strong><?php echo $v1['nb_seconds_left']; ?></strong></span> seconde(s)  avant la fin de cet activité.</p><br>
					<?php endif; ?>
					<p>Pourcentage accompli :</p>
					<div class="progress progress-striped active">
					  <div class="activityPercentDone hidden-elements">Pourcentage accompli : <?php echo $v1['percent_done']; ?>%</div>
					  <?php if( $v1['percent_done'] < 40 ): ?>
					  <div class="progress-bar progress-bar-danger"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
					  <?php elseif( $v1['percent_done'] >= 40 && $v1['percent_done'] < 70 ): ?>
					  <div class="progress-bar progress-bar-warning"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
					  <?php else: ?>
					  <div class="progress-bar progress-bar-success"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
					  <?php endif; ?>
					    <?php echo $v1['percent_done']; ?>%
					  </div>
					</div>
					<?php if( $v1['commentary'] != "" ): ?>
					<div class="more-details-trigger" align="center">Plus de détails <span class="glyphicon glyphicon-chevron-down"></span></div>
					<div class="more-details-zone hidden-elements">
						<hr>
						<div class="activityCommentary"><?php echo $v1['commentary']; ?></div>
					</div>
					<?php endif; ?>
					<div class="activityIdentifiant hidden-elements"><?php echo $v1['activity_id']; ?></div>
					<div class="leftTimeSeconds hidden-elements"><?php echo $v1['tmpLeft']; ?></div>
					<div class="activityEndDate hidden-elements"><?php echo $v1['end_date']; ?></div> 
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
			<div class="well custom-well">Aucune activité n'a été planifiée.</div>
			<?php endif; ?>
		</div>
		<div class="col-md-5">
			<?php if( isset($data['notes']) ): ?>
			<div id="note-section-panel">
				<?php foreach($data['notes'] as $k1=>$v1): ?>
				<div class="panel panel-info custom-panel ">
				  <div class="panel-heading">
				    <h3 class="panel-title"><?php echo $v1['title']; ?></h3>
				  </div>
				  <div class="panel-body"><?php echo $v1['full_content']; ?></div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
			<div class="well custom-well">Aucune note n'est enregistrée dans l'application</div>
			<?php endif; ?>
		</div>
	</div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//main-page-modals/delete_activity_modal.php"; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//main-page-modals/delete_note_modal.php"; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//main-page-modals/activity_modal.php"; ?>
	
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-notify/bootstrap-notify.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/main_page.js"></script>
	</body>
</html>