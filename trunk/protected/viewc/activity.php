<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<?php if( isset($data['activity']) ): ?>
	<title>Edition d'activite - My Personal Agenda</title>
	<?php else: ?>
	<title>Creation d'activite - My Personal Agenda</title>
	<?php endif; ?>
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
	<div class="row">
  		<div class="col-md-6 col-md-offset-3 well">
  			<?php if( isset($data['activity']) ): ?>
 			<div>EDITION DE L'ACTIVITE <strong>"<?php echo $data['activity']['title']; ?>"</strong></div>
 			<?php else: ?>
 			<div>CREATION D'UNE ACTIVITE</div>
 			<?php endif; ?>
 			<hr>
 			<form id="save-activity-form" method="post" action="<?php echo $data['baseurl']; ?>saveactivity" class="form-horizontal" role="form">
 			  <?php if( isset($data['activity']) ): ?>
 			  <input type="hidden" name="idActivity" id="idActivity" value="<?php echo $data['activity']['activity_id']; ?>"/>
 			  <?php endif; ?>
			  <div class="form-group">
			    <label for="activityTitle" class="col-sm-2 control-label">Titre</label>
			    <div class="col-sm-5">
			      <?php if( isset($data['activity']) ): ?>
			      <input type="text" class="form-control" value="<?php echo $data['activity']['title']; ?>" name="activityTitle" id="activityTitle" placeholder="Titre de l'activite"/>
			      <?php else: ?>
			      <input type="text" class="form-control" name="activityTitle" id="activityTitle" placeholder="Titre de l'activite"/>
			      <?php endif; ?>
			    </div>
			  </div>
			  <?php if( isset($data['activitytypes']) ): ?>
			  <div class="form-group">
			    <label for="activityTypes" class="col-sm-2 control-label">Type activite</label>
			    <div class="col-sm-10">
			      <select id="activityTypes" name="activityTypes" class="form-control">
			      	  <?php foreach($data['activitytypes'] as $k1=>$v1): ?>
			      	  <?php if( isset($data['activity']) && $v1['activity_type_id'] == $data['activity']['activity_type_id'] ): ?>
			      	  <option selected="selected" value="<?php echo $v1['activity_type_id']; ?>"><?php echo $v1['activity_type_name']; ?></option>
			      	  <?php else: ?>
			      	  <option value="<?php echo $v1['activity_type_id']; ?>"><?php echo $v1['activity_type_name']; ?></option>
			      	  <?php endif; ?>
			      	  <?php endforeach; ?>
				  </select>
			    </div>
			  </div>
			  <?php endif; ?>
			  <div class="form-group">
			    <label for="activityDescription" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-10">
			      <?php if( isset($data['activity']) ): ?>
			      <input type="text" class="form-control" value="<?php echo $data['activity']['description']; ?>" name="activityDescription" id="activityDescription" placeholder="Description de l'activite"/>
			      <?php else: ?>
			      <input type="text" class="form-control" name="activityDescription" id="activityDescription" placeholder="Description de l'activite"/>
			      <?php endif; ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="activityEndDate" class="col-sm-2 control-label">Echeance</label>
			    <div class="col-sm-5">
			      <div class='input-group date' id="activityEndDate">
			      <?php if( isset($data['activity']) ): ?>
			      <input type="text" class="form-control" value="<?php echo $data['activity']['end_date']; ?>" placeholder="Date de fin de l'activite" name="activityEndDate">
			      <?php else: ?>
			      <input type="text" class="form-control" placeholder="Date de fin de l'activite" name="activityEndDate">
			      <?php endif; ?>
			      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			      </div>
			    </div>
			    <div class="col-sm-5">
			    	<div class='input-group date' id="activityEndHour">
			    	<?php if( isset($data['activity']) ): ?>
			    	<input type="text" class="form-control" value="<?php echo $data['activity']['end_hour']; ?>" placeholder="Heure de fin de l'activite" name="activityEndHour"/>
			    	<?php else: ?>
			    	<input type="text" class="form-control" placeholder="Heure de fin de l'activite" name="activityEndHour"/>
			    	<?php endif; ?>
			    	<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
			    	</div>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="activityDone" class="col-sm-2 control-label">Fait a (en %)</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="activityDone" id="activityDone">
			      	  <option value="0">0</option>
					  <option value="10">10</option>
					  <option value="20">20</option>
					  <option value="30">30</option>
					  <option value="40">40</option>
					  <option value="50">50</option>
					  <option value="60">60</option>
					  <option value="70">70</option>
					  <option value="80">80</option>
					  <option value="90">90</option>
					  <option value="100">100</option>
				  </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="activityCommentary" class="col-sm-2 control-label">Commentaire</label>
			    <div class="col-sm-10">
			      <?php if( isset($data['activity']) ): ?>
			      <textarea id="activityCommentary" name="activityCommentary" placeholder="Commentaires a saisir ici..." class="form-control" rows="5"><?php echo $data['activity']['commentary']; ?></textarea>
			      <?php else: ?>
			      <textarea id="activityCommentary" name="activityCommentary" placeholder="Commentaires a saisir ici..." class="form-control" rows="5"></textarea>
			      <?php endif; ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <?php if( isset($data['activity']) ): ?>
			      <a id="save-activity-btn" class="btn btn-default">Editer l'activite</a>
			      <?php else: ?>
			      <a id="save-activity-btn" class="btn btn-default">Creer l'activite</a>
			      <?php endif; ?>
			    </div>
			  </div>
			</form>
  		
  		</div>
	</div>
</body>
<script type="text/javascript" src='<?php echo $data['baseurl']; ?>global/js/activity_page.js'></script>
</html>