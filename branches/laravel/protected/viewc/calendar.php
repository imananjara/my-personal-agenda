<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Mon calendrier - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['baseurl']; ?>global/css/bootstrap-extensions/calendar/calendar.min.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src='<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/calendar/underscore-min.js'></script>
	<script type="text/javascript" src='<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/calendar/fr-FR.js'></script>
	<script type="text/javascript" src='<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/calendar/calendar.min.js'></script>
</head>
<body>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3></h3>
			<div id="calendar"></div><br>
			<div class="pull-right form-inline">
				<div class="btn-group">
					<button class="btn btn-primary" data-calendar-nav="prev"><< Precedent</button>
					<button class="btn" data-calendar-nav="today">Aujourd'hui</button>
					<button class="btn btn-primary" data-calendar-nav="next">Suivant >></button>
				</div>
				<div class="btn-group">
					<button class="btn btn-warning" data-calendar-view="year">Annee</button>
					<button class="btn btn-warning active" data-calendar-view="month">Mois</button>
					<button class="btn btn-warning" data-calendar-view="week">Semaine</button>
					<button class="btn btn-warning" data-calendar-view="day">Jour</button>
				</div>
		 	</div>
		</div>
	</div>
</body>
<script type="text/javascript" src='<?php echo $data['baseurl']; ?>global/js/calendar_page.js'></script>
</html>