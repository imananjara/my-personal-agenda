<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<title>Administrateur - Gestion des utilisateurs - My Personal Agenda</title>
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../css_files.php"; ?>
	</head>
	<body id="administrator-body">
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/administrator_menu_bar.php"; ?>
		<div class="row">
		  <div class="col-md-10 col-md-offset-1 well">
		  	<h4><span class="glyphicon glyphicon-user"></span> Liste des utilisateurs de My Personal Agenda</h4>
		  	<hr>
		  	<?php if( isset($data['admin_users_table']) ): ?>
		  	<table class="table table-bordered table-striped">
		  		<tr>
			  		<th>Pseudonyme</th>
			  		<th>Nom</th>
			  		<th>Prénom</th>
			  		<th>Email</th>
			  		<th>Administrateur</th>
			  	</tr>
			  	<?php foreach($data['admin_users_table'] as $k1=>$v1): ?>
			  	<tr>
			  		<td><?php echo $v1['login']; ?></td>
			  		<td><?php echo $v1['lastname']; ?></td>
			  		<td><?php echo $v1['firstname']; ?></td>
			  		<td><?php echo $v1['email']; ?></td>
			  		<?php if( $v1['is_admin'] ): ?>
			  			<td>Oui</td>
			  		<?php else: ?>
			  			<td>Non</td>
			  		<?php endif; ?>
				</tr>
			  	<?php endforeach; ?>
			</table>
		  	<?php else: ?>
		  	<p>Aucun utilisateur n'a ete enregistré dans l'application</p>
		  	<?php endif; ?>
		  </div>
		</div>
		
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../js_files.php"; ?>
	</body>
</html>