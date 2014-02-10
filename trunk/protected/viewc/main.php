<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Page principale - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
</head>
<body>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div class="row">
		<div class="col-md-5 col-md-offset-1 well">
			<div><span class="glyphicon glyphicon-dashboard"></span> ACTIVITES<a href="<?php echo $data['baseurl']; ?>activity" class="btn btn-info pull-right">Ajouter une activite</a></div>
			<hr>
			<?php if( isset($data['activities']) ): ?>
			<?php foreach($data['activities'] as $k1=>$v1): ?>
			<div class="well activity-section">
				<a href="javascript:void(0)" id="activity-<?php echo $v1['activity_id']; ?>" data-toggle="confirmation" class="btn btn-danger btn-xs activity-btn pull-right del-activity"><span class="glyphicon glyphicon-trash"></span></a>
				<a href="<?php echo $data['baseurl']; ?>activity/<?php echo $v1['activity_id']; ?>" class="btn btn-info btn-xs activity-btn pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
				<h4><?php echo $v1['title']; ?> (<?php echo $v1['activity_type_name']; ?>)</h4>
				<hr>
				<p><?php echo $v1['description']; ?></p><br>
				<?php if( $v1['nb_days_left'] == 0 && $v1['nb_hours_left'] == 0 && $v1['nb_minutes_left'] == 0 ): ?>
				<p class="bg-success">L'activite est terminee</p><br>
				<?php else: ?>
				<p class="bg-info">Il reste <span class="text-info"><strong><?php echo $v1['nb_days_left']; ?></strong></span> jour(s), <span class="text-info"><strong><?php echo $v1['nb_hours_left']; ?></strong></span> heure(s) et <span class="text-info"><strong><?php echo $v1['nb_minutes_left']; ?></strong></span> minute(s) avant la fin de cet activité.</p><br>
				<?php endif; ?>
				<p>Pourcentage accompli :</p>
				<div class="progress progress-striped active">
				  <?php if( $v1['percent_done'] < 40 ): ?>
				  <div class="progress-bar progress-bar-danger"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
				  <?php elseif( $v1['percent_done'] >= 40 && $v1['percent_done'] < 70 ): ?>
				  <div class="progress-bar progress-bar-warning"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
				  <?php else: ?>
				  <div class="progress-bar progress-bar-success"  role="progressbar" style="width: <?php echo $v1['percent_done']; ?>%">
				  <?php endif; ?>
				    <span class="sr-only"><?php echo $v1['percent_done']; ?>% Complete</span>
				  </div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php else: ?>
			<p>Aucune activite n'a ete planifiee</p>
			<?php endif; ?>
		</div>
		<div class="col-md-4 col-md-offset-1 well">
			<div><span class="glyphicon glyphicon-list-alt"></span> NOTES<a href="javascript:void(0)" class="btn btn-info pull-right">Ajouter une note</a></div>
			<hr>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	<a href="javascript:void(0)" class="btn btn-danger btn-xs activity-btn pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			  	<a href="javascript:void(0)" class="btn btn-info btn-xs activity-btn pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
			    <h3 class="panel-title">Petites astuces pour les maths</h3>
			  </div>
			  <div class="panel-body">
			    <p>Avoir une calculette ! C'est important</p>
			  </div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	<a href="javascript:void(0)" class="btn btn-danger btn-xs activity-btn pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			  	<a href="javascript:void(0)" class="btn btn-info btn-xs activity-btn pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
			    <h3 class="panel-title">Petites astuces pour l'anglais</h3>
			  </div>
			  <div class="panel-body">
			    <p>- Apprendre les verbes irreguliers</p>
			    <p>- Prendre toujours ses cours</p>
			  </div>
			</div>
		</div>
	</div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//delete-modal.php"; ?>
	</body>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/main_page.js"></script>
</html>