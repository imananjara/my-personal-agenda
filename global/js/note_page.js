$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//If the user click on submit button
	$("#save-note-btn").on("click", function(){

		if ($("#noteTitle").val() == "" || $("#noteContent").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'ajout de note</strong> : Vous devez remplir les champs suivants : Titre, Contenu de la note');
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