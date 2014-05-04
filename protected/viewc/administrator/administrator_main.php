<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<title>Administrateur - Page principale - My Personal Agenda</title>
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../css_files.php"; ?>
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/../js_files.php"; ?>
	</head>
	<body id="administrator-body">
		<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/administrator/administrator_menu_bar.php"; ?>
		<div class="row">
		  <div class="col-md-10 col-md-offset-1 well">
		  	<div align="center"><img src="<?php echo $data['baseurl']; ?>global/img/mpa_logo.gif"/></div><br>
		  	<h4 align="center">Bienvenue sur l'interface administrateur de My Personal Agenda</h4>
		  	<h4 align="center">Il sera possible de gérer les utilisateurs de l'application ainsi que la liste des types d'activités</h4>
		  	<h4 align="center">Cette page sera amenée à changer. Restez connecté !</h4><br>
		  	<div align="center"><a href="<?php echo $data['baseurl']; ?>" class="btn btn-default">Aller sur l'interface utilisateur</a></div>
		  </div>
		</div>
	
	</body>
</html>