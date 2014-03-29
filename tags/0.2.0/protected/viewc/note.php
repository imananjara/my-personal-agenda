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
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//js_files.php"; ?>
</head>
<body>
<div id="notifications" class='alert alert-notification'></div>
	<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//menu_bar.php"; ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<?php if( isset($data['note']) ): ?>
			<div>EDITION DE LA NOTE <strong>"<?php echo $data['note']['title']; ?>"</strong></div>
			<?php else: ?>
			<div>CREATION D'UNE NOTE</div>
			<?php endif; ?>
			<hr>
			<form id="save-note-form" method="post" action="<?php echo $data['baseurl']; ?>savenote" class="form-horizontal" role="form">
			  <?php if( isset($data['note']) ): ?>
 			  <input type="hidden" name="idNote" id="idNote" value="<?php echo $data['note']['note_id']; ?>"/>
 			  <?php endif; ?>
			  <div class="form-group">
			    <label for="noteTitle" class="col-sm-2 control-label">Titre</label>
			    <div class="col-sm-5">
			      <?php if( isset($data['note']) ): ?>
			      <input type="text" value="<?php echo $data['note']['title']; ?>" class="form-control" name="noteTitle" id="noteTitle" placeholder="Titre de la note">
			      <?php else: ?>
			      <input type="text" class="form-control" name="noteTitle" id="noteTitle" placeholder="Titre de la note">
			      <?php endif; ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="noteContent" class="col-sm-2 control-label">Contenu</label>
			    <div class="col-sm-10">
			      <?php if( isset($data['note']) ): ?>
			      <textarea id="noteContent" name="noteContent" placeholder="Contenu de la note ici..." class="form-control" rows="5"><?php echo $data['note']['full_content']; ?></textarea>
			      <?php else: ?>
			      <textarea id="noteContent" name="noteContent" placeholder="Contenu de la note ici..." class="form-control" rows="5"></textarea>
			      <?php endif; ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <?php if( isset($data['note']) ): ?>
			      <a id="save-note-btn" class="btn btn-default">Editer la note</a>
			      <?php else: ?>
			      <a id="save-note-btn" class="btn btn-default">Creer la note</a>
			      <?php endif; ?>
			    </div>
			  </div>
			 </form>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/note_page.js"></script>
</html>