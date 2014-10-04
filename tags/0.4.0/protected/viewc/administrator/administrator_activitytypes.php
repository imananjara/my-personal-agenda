<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<title>Administrateur - Gestions des types d'activités - My Personal Agenda</title>
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../css_files.php"; ?>
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../js_files.php"; ?>
	</head>
	<body id="administrator-body">
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/administrator_menu_bar.php"; ?>
		<div class="row">
		  <div class="col-md-10 col-md-offset-1 well">
		  	<h4><span class="glyphicon glyphicon-list-alt"></span> Liste des types d'activités</h4>
		  	<hr>
		  	<?php if( isset($data['admin_activitytypes_table']) ): ?>
		  	<table class="table table-bordered table-striped">
		  		<tr>
			  		<th>Nom</th>
			  		<th>Description</th>
			  	</tr>
			  	<?php foreach($data['admin_activitytypes_table'] as $k1=>$v1): ?>
			  	<tr>
			  		<td><?php echo $v1['activity_type_name']; ?></td>
			  		<td><?php echo $v1['activity_type_description']; ?></td>
			  		<td>
			  			<a href="javascript:void(0)" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
			  			<a href="javascript:void(0)" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
			  		</td>
				</tr>
			  	<?php endforeach; ?>
			</table>
		  	<?php else: ?>
		  	<p>Aucun type d'activité n'a ete enregistré dans l'application</p>
		  	<?php endif; ?>
		  </div>
		</div>
	
	</body>
</html>