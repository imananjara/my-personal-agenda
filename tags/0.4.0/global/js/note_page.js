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
	
	fix_summernote_bug();
	
	//If the user click on submit button
	$("#save-note-btn").on("click", function(){
		
		fix_summernote_bug();
	
		$('#noteContent').val($('#noteContent').code());
		
		if ($("#noteTitle").val() == "" || $("#noteContent").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'ajout de note</strong> : Vous devez remplir les champs suivants : Titre, Contenu.');
			return;
		}
		
		//Submit the form
		$("#save-note-form").submit();
		
	});
	
	//Fix summernote's bug
	function fix_summernote_bug() {
		if ($(".note-editable").html() == "<p><br></p>" || $(".note-editable").html() == "<br>" || $(".note-editable").html() == "<div><br></div>") {
			$(".note-editable").html("");
		}
	}
		
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }

});