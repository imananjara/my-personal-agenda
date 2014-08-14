<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<?php if( isset($data['activity']) ): ?>
	<title>Edition d'activité - My Personal Agenda</title>
	<?php else: ?>
	<title>Creation d'activité - My Personal Agenda</title>
	<?php endif; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
	<link href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/summernote/summernote.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/x-editable/bootstrap-editable.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.fr.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/summernote/summernote.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/summernote/lang/summernote-fr-FR.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/x-editable/bootstrap-editable.min.js"></script>
</head>
<body>
	<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	
	<div class="row">
  		<div class="col-md-10 col-md-offset-1">
  			<div class="well custom-well">
  			<?php if( isset($data['activity']) ): ?>
 			<div class="custom-well-header">Edition de l'activité <strong>"<?php echo $data['activity']['title']; ?>"</strong></div>
 			<?php else: ?>
 			<div class="custom-well-header">Création d'une activité</div>
 			<?php endif; ?>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-5 col-md-offset-1">
	 		<div class="well custom-well">
	 			<div class="custom-well-header">Informations principales</div><hr>
	 			<form id="save-activity-form" method="post" action="<?php echo $data['baseurl']; ?>saveactivity">
	 			  <?php if( isset($data['activity']) ): ?>
	 			  <input type="hidden" name="idActivity" id="idActivity" value="<?php echo $data['activity']['activity_id']; ?>"/>
	 			  <?php endif; ?>
				  <div class="form-group">
				    <label for="activityTitle" class="control-label">Titre :</label>
				    <?php if( isset($data['activity']) ): ?>
				    <input type="text" class="form-control" value="<?php echo $data['activity']['title']; ?>" name="activityTitle" id="activityTitle" placeholder="Titre de l'activite"/>
				    <?php else: ?>
				    <input type="text" class="form-control" name="activityTitle" id="activityTitle" placeholder="Titre de l'activite"/>
				    <?php endif; ?>
				  </div>
				  <?php if( isset($data['activitytypes']) ): ?>
				  <div class="form-group">
				    <label for="activityTypes" class="control-label">Type :</label>
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
				  <?php endif; ?>
				  <div class="form-group">
				    <label for="activityDescription" class="control-label">Description :</label>
				    <?php if( isset($data['activity']) ): ?>
				    <input type="text" class="form-control" value="<?php echo $data['activity']['description']; ?>" name="activityDescription" id="activityDescription" placeholder="Description de l'activite"/>
				    <?php else: ?>
				    <input type="text" class="form-control" name="activityDescription" id="activityDescription" placeholder="Description de l'activite"/>
				    <?php endif; ?>
				  </div>
				  <div class="form-group">
				    <label for="activityEndDate" class="control-label">Echéance :</label>
				    <div class="row">
					    <div class="col-sm-6">
					      <div class='input-group date' id="activityEndDate">
					      <?php if( isset($data['activity']) ): ?>
					      <input type="text" class="form-control" value="<?php echo $data['activity']['end_date']; ?>" placeholder="Date de fin de l'activite" name="activityEndDate">
					      <?php else: ?>
					      <input type="text" class="form-control" placeholder="Date de fin de l'activite" name="activityEndDate">
					      <?php endif; ?>
					      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					      </div>
					    </div>
					    <div class="col-sm-6">
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
				  </div>
				  <div class="form-group">
				    <label for="activityDone" class="control-label">Fait à (en %)</label>
				      <select class="form-control" name="activityDone" id="activityDone">
						  <?php foreach(range(0, 100, 10) as $data['i']): ?>
						  <?php if( isset($data['activity']) && $data['i'] == $data['activity']['percent_done'] ): ?>
						  <option selected="selected" value="<?php echo $data['i']; ?>"><?php echo $data['i']; ?></option>
						  <?php else: ?>
						  <option value="<?php echo $data['i']; ?>"><?php echo $data['i']; ?></option>
						  <?php endif; ?>
						  <?php endforeach; ?>
					  </select>
				  </div>
				  <div class="form-group">
				    <label for="activityCommentary" class="control-label">Commentaire :</label><br>
				      <?php if( isset($data['activity']) ): ?>
				      <textarea id="activityCommentary" name="activityCommentary" placeholder="Commentaires a saisir ici..." class="form-control" rows="5"><?php echo $data['activity']['commentary']; ?></textarea>
				      <?php else: ?>
				      <textarea id="activityCommentary" name="activityCommentary" placeholder="Commentaires a saisir ici..." class="form-control" rows="5"></textarea>
				      <?php endif; ?>
				  </div>
				  <div class="form-group">
				      <?php if( isset($data['activity']) ): ?>
				      <a id="save-activity-btn" class="btn btn-success">Editer l'activité</a>
				      <?php else: ?>
				      <a id="save-activity-btn" class="btn btn-success">Créer l'activité</a>
				      <?php endif; ?>
				  </div>
				</form>
  			</div>
  		</div>
  		<div class="col-md-5">
	  		<div class="well custom-well">
	  			<div class="custom-well-header">Liste des tâches</div><hr>
	  			<?php if( isset($data['activity']) ): ?>
	  			<div class="alert alert-info custom-alert"><span class="glyphicon glyphicon-warning-sign"></span> <strong>Information</strong> : Pour chaque activité, il est possible de créer une ou plusieurs tâches. Pour cela, il suffit de renseigner un titre et un pourcentage puis de cliquer sur "Ajouter"</div>
	  			<table id="task-table" class="table">
	  				<tr>
	  					<th>Titre</th>
	  					<th>Fait à (en %)</th>
	  				</tr>
	  				<?php if( isset($data['tasks']) ): ?>
	  				<?php foreach($data['tasks'] as $k1=>$v1): ?>
	  				<tr class="task-row" id="task-<?php echo $v1['task_id']; ?>">
	  					<td><a href="javascript:void(0)" class="task-title"><?php echo $v1['title']; ?></a></td>
	  					<td><a href="javascript:void(0)" class="task-percent-done" data-value="<?php echo $v1['percent_done']; ?>"><?php echo $v1['percent_done']; ?></a></td>
	  					<td><button class="btn btn-danger delete-task-btn">Supprimer</button>
	  				</tr>
	  				<?php endforeach; ?>
	  				<?php endif; ?>
	  				<tr id="add-task-line">
						<td><input type="text" name="task_title" id="task_title" class="form-control" placeholder="Titre..."></td>
						<td>
					      <select class="form-control" name="task_percent_done" id="task_percent_done">
							  <?php foreach(range(0, 100, 10) as $data['i']): ?>
							  <option value="<?php echo $data['i']; ?>"><?php echo $data['i']; ?></option>
							  <?php endforeach; ?>
						  </select>
						</td>
						<td><a href="javascript:void(0)" id="add-task-btn" class="btn btn-success">Ajouter</a></td>
					</tr>
	  			</table>
	  			<?php else: ?>
	  			<div class="alert alert-warning custom-alert"><span class="glyphicon glyphicon-warning-sign"></span> <strong>Attention</strong> : Pour pouvoir ajouter une ou plusieurs tâches à votre activité, vous devez au préalable créer cette activité !</div>
	  			<?php endif; ?>
	  		</div>
  		</div>
  	</div>
  	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//main-page-modals/activity_redirection_modal.php"; ?>
</body>
<script type="text/javascript" src='<?php echo $data['globalurl']; ?>js/activity_page.js'></script>
</html>