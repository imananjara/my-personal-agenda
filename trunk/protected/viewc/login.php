<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Authentification - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link rel="stylesheet" href="<?php echo $data['baseurl']; ?>global/css/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/bootstrap-extensions/bootstrap-datepicker/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
	<input type="hidden" id="base-url" value="<?php echo $data['baseurl']; ?>">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<div id="notifications-login" class='alert alert-notification'></div>
			<div id="ajax-loader"><img src="<?php echo $data['baseurl']; ?>global/img/ajaxloader.gif"/></div>
			<img src="<?php echo $data['baseurl']; ?>global/img/mpa_logo.gif" alt="mpa_logo"/><br><br>
			
			<ul class="nav nav-tabs">
			  <li class="active"><a id="connexion-tab" href="#connexion-content" data-toggle="tab">Connexion</a></li>
			  <li><a id="inscription-tab" href="#inscription-content" data-toggle="tab">Inscription</a></li>
			</ul>
			
			<br>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="connexion-content">
					<form id="connexion-form" class="form-horizontal" method="post" role="form">
					  <div class="form-group">
					    <label for="inputLoginAuth" class="col-sm-3 control-label">Pseudonyme</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="inputLoginAuth" id="inputLoginAuth" placeholder="Pseudonyme">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPasswordAuth" class="col-sm-3 control-label">Mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="inputPasswordAuth" id="inputPasswordAuth" placeholder="Mot de passe">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="admin_page_access"> Accéder à la page d'administration *
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					      <a href="javascript:void(0)" id="to-connect-action" class="btn btn-default">Se connecter</a>
					    </div>
					  </div>
					</form><br>
					<p>* Reservé uniquement aux administrateurs de l'application</p>
				</div>
				
				<div class="tab-pane fade" id="inscription-content">
					<form id="inscription-form" class="form-horizontal" method="post" role="form">
					  <div class="form-group">
					    <label for="inputLoginInscrip" class="col-sm-3 control-label">Pseudonyme</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="inputLoginInscrip" id="inputLoginInscrip" placeholder="Pseudonyme">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPasswordInscrip" class="col-sm-3 control-label">Mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="inputPasswordInscrip" id="inputPasswordInscrip" placeholder="Mot de passe">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputFirstNameInscrip" class="col-sm-3 control-label">Prénom</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="inputFirstNameInscrip" id="inputFirstNameInscrip" placeholder="Prénom">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputLastNameInscrip" class="col-sm-3 control-label">Nom</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="inputLastNameInscrip" id="inputLastNameInscrip" placeholder="Nom">
					    </div>
					  </div>  
					  <div class="form-group">
					    <label for="inputEmailInscrip" class="col-sm-3 control-label">Email</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="inputEmailInscrip" id="inputEmailInscrip" placeholder="Email">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					      <a href="javascript:void(0)" id="to-subscribe-action" class="btn btn-default">S'inscrire</a>
					   </div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/login_page.js"></script>

</html>