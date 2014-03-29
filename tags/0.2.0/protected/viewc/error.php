<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Erreur - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
</head>
<body>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<h3 align="center">Pas de chance, la page que vous cherchez est inexistante !!!</h3><br>
			<p align="center">Pour revenir sur la page principale, vous pouvez cliquer sur le bouton ci-dessous.</p><br>
			<div align="center"><a class="btn btn-default" href="<?php echo $data['baseurl']; ?>">Page Principale - My Personal Agenda</a></div>
		</div>
	</div>
</body>
</html>