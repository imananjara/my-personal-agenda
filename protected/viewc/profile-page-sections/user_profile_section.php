<span class="caret pull-right reduce"></span>
<div class="custom-well-header">Mon profil</div>
<div class="reduce-panel">
	<hr>
	<form id="update-profile-form" method="post" action="<?php echo $data['baseurl']; ?>editprofile" role="form">
		<div class="form-group">
			<label for="inputFirstNameProfile">Prénom :</label><br>
			<input type="text" value="<?php echo $data['user']['firstname']; ?>" class="form-control" name="inputFirstNameProfile" id="inputFirstNameProfile" placeholder="Prénom">
		</div>
		<div class="form-group">
			<label for="inputLastNameProfile">Nom :</label><br>
			<input type="text" value="<?php echo $data['user']['lastname']; ?>" class="form-control" name="inputLastNameProfile" id="inputLastNameProfile" placeholder="Nom">
		</div>  
		<div class="form-group">
			<label for="inputEmailProfile">Email :</label><br>
			<input type="text" value="<?php echo $data['user']['email']; ?>" class="form-control" name="inputEmailProfile" id="inputEmailProfile" placeholder="Email">
		</div><br>
		<div class="form-group">
			<a href="javascript:void(0)" id="to-update-profile-action" class="btn btn-success">Editer mon profil</a>
		</div>
	</form>
</div>