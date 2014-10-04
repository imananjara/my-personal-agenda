<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Authentification - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>"><br><br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div align="center"><img src="<?php echo $data['globalurl']; ?>img/mpa_logo.gif" alt="mpa_logo"/></div><br><br>
			<div id="notifications-login" class='alert alert-notification'></div>
			<div id="ajax-loader"><img src="<?php echo $data['globalurl']; ?>img/ajaxloader.gif"/></div>
			
			
			<ul class="nav nav-pills nav-justified">
			  <li class="active"><a id="connexion-tab" href="#connexion-content" data-toggle="tab">Connexion</a></li>
			  <li><a id="inscription-tab" href="#inscription-content" data-toggle="tab">Inscription</a></li>
			</ul>
			
			<br>
			<div class="tab-content">
				<div class="tab-pane fade in active well custom-well" id="connexion-content">
					<form id="connexion-form" method="post" role="form">
					  <div class="form-group input-group">
					  	  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					      <input type="text" class="form-control" name="inputLoginAuth" id="inputLoginAuth" placeholder="Pseudonyme">
					  </div>
					  <div class="form-group input-group">
					  	  <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
					      <input type="password" class="form-control" name="inputPasswordAuth" id="inputPasswordAuth" placeholder="Mot de passe">
					  </div>
					  <div class="form-group">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="admin_page_access"> Accéder à la page d'administration *
					        </label>
					    </div>
					  </div>
					  <div class="form-group">
					      <a href="javascript:void(0)" id="to-connect-action" class="btn btn-success">Se connecter</a>
					  </div>
					</form><br>
					<p>* Reservé uniquement aux administrateurs de l'application</p>
				</div>
				
				<div class="tab-pane fade well custom-well" id="inscription-content">
					<form id="inscription-form" method="post" role="form">
					  <div class="form-group">
					    <label for="inputLoginInscrip">Pseudonyme :</label>
					    <input type="text" class="form-control" name="inputLoginInscrip" id="inputLoginInscrip" placeholder="Pseudonyme">
					  </div>
					  <div class="form-group">
					    <label for="inputPasswordInscrip">Mot de passe :</label>
					    <input type="password" class="form-control" name="inputPasswordInscrip" id="inputPasswordInscrip" placeholder="Mot de passe">
					  </div>
					  <div class="form-group">
					    <label for="inputFirstNameInscrip">Prénom :</label>
					    <input type="text" class="form-control" name="inputFirstNameInscrip" id="inputFirstNameInscrip" placeholder="Prénom">
					  </div>
					  <div class="form-group">
					    <label for="inputLastNameInscrip">Nom :</label>
					    <input type="text" class="form-control" name="inputLastNameInscrip" id="inputLastNameInscrip" placeholder="Nom">
					  </div>  
					  <div class="form-group">
					    <label for="inputEmailInscrip">Email :</label>
					    <input type="text" class="form-control" name="inputEmailInscrip" id="inputEmailInscrip" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <a href="javascript:void(0)" id="to-subscribe-action" class="btn btn-success">S'inscrire</a>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/login_page.js"></script>

</html>