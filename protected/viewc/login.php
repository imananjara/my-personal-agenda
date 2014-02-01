<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<title>Authentification - My Personal Agenda</title>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
</head>
<body>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
		
			<h2>My Personal Agenda</h2><br>
			
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#connexion-content" data-toggle="tab">Connexion</a></li>
			  <li><a href="#inscription-content" data-toggle="tab">Inscription</a></li>
			</ul>
			
			<br>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="connexion-content">
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <label for="inputLoginAuth" class="col-sm-2 control-label">Login</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputLoginAuth" placeholder="Login">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPasswordAuth" class="col-sm-2 control-label">Mdp</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="inputPasswordAuth" placeholder="Mot de passe">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Se connecter</button>
					    </div>
					  </div>
					</form>
				</div>
				
				<div class="tab-pane fade" id="inscription-content">
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <label for="inputLoginInscrip" class="col-sm-2 control-label">Login</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputLoginInscrip" placeholder="Login">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPasswordInscrip" class="col-sm-2 control-label">Mdp</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="inputPasswordInscrip" placeholder="Mot de passe">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputFirstNameInscrip" class="col-sm-2 control-label">Prenom</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputFirstNameInscrip" placeholder="Prenom">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputLastNameInscrip" class="col-sm-2 control-label">Nom</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputLastNameInscrip" placeholder="Nom">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmailInscrip" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputEmailInscrip" placeholder="Email">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">S'inscrire</button>
					   </div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>