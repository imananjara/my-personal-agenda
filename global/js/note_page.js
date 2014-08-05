$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//Enable summernote
	$('#noteContent').summernote({
		lang: 'fr-FR',
		height: 200,
		toolbar: [
		          ['style', ['bold', 'italic', 'underline', 'clear']],
		          ['font', ['strikethrough']],
		          ['fontsize', ['fontsize']],
		          ['color', ['color']],
		          ['para', ['ul', 'ol', 'paragraph']],
		          ['height', ['height']],
		          ['insert', ['link', 'hr']],
		          ['misc', ['undo', 'redo']]
		        ]
	});
	
	//If the user click on submit button
	$("#save-note-btn").on("click", function(){
	
		$('#noteContent').val($('#noteContent').code());
		
		if ($("#noteTitle").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'ajout de note</strong> : Vous devez remplir le champ suivant : Titre');
			return;
		}
		
		//Submit the form
		$("#save-note-form").submit();
		
	});
		
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }

});