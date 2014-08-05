<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8>
	<?php if( isset($data['note']) ): ?>
	<title>Edition de note - My Personal Agenda</title>
	<?php else: ?>
	<title>Creation de note - My Personal Agenda</title>
	<?php endif; ?>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//css_files.php"; ?>
	<link href="<?php echo $data['globalurl']; ?>css/bootstrap-extensions/summernote/summernote.css" rel="stylesheet">
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/summernote/summernote.min.js"></script>
	<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/bootstrap-extensions/summernote/lang/summernote-fr-FR.js"></script>
</head>
<body>
<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well custom-well">
				<?php if( isset($data['note']) ): ?>
				<div class="custom-well-header">Edition de la note <strong>"<?php echo $data['note']['title']; ?>"</strong></div>
				<?php else: ?>
				<div class="custom-well-header">Creation d'une note</div>
				<?php endif; ?>
			</div>
			<div class="well custom-well">

				<form id="save-note-form" method="post" action="<?php echo $data['baseurl']; ?>savenote" role="form">
				  <?php if( isset($data['note']) ): ?>
	 			  <input type="hidden" name="idNote" id="idNote" value="<?php echo $data['note']['note_id']; ?>"/>
	 			  <?php endif; ?>
				  <div class="form-group">
				    <label for="noteTitle" class="control-label">Titre :</label>
				    <div>
				      <?php if( isset($data['note']) ): ?>
				      <input type="text" value="<?php echo $data['note']['title']; ?>" class="form-control" name="noteTitle" id="noteTitle" placeholder="Titre de la note">
				      <?php else: ?>
				      <input type="text" class="form-control" name="noteTitle" id="noteTitle" placeholder="Titre de la note">
				      <?php endif; ?>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="noteContent" class="control-label">Contenu :</label>
				    <div>
				      <?php if( isset($data['note']) ): ?>
				      <textarea id="noteContent" name="noteContent" placeholder="Contenu de la note ici..." class="form-control"><?php echo $data['note']['full_content']; ?></textarea>
				      <?php else: ?>
				      <textarea id="noteContent" name="noteContent" placeholder="Contenu de la note ici..." class="form-control"></textarea>
				      <?php endif; ?>
				    </div>
				  </div><br>
				  <div class="form-group">
				    <div>
				      <?php if( isset($data['note']) ): ?>
				      <a id="save-note-btn" class="btn btn-success">Editer la note</a>
				      <?php else: ?>
				      <a id="save-note-btn" class="btn btn-success">Creer la note</a>
				      <?php endif; ?>
				    </div>
				  </div>
				 </form>
			 </div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['globalurl']; ?>js/note_page.js"></script>
</html>