$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
		
	//If the user click on the subscribe button
	$("#to-update-profile-action").on('click', function(){
		
		if ($("#inputFirstNameProfile").val() == "" || $("#inputLastNameProfile").val() == "" || $("#inputEmailProfile").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'edition du profil</strong> : Vous devez remplir tous les champs pour pouvoir editer votre profil');
			return;
		}
		
		//Check the mail format
		if (!(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($("#inputEmailProfile").val()))) {
			notification('alert-danger', '<strong>Erreur lors de l\'edition du profil</strong> : L\'email a été écrit dans un format incorrect.');
			return;
		}
		
		$("#update-profile-form").submit();
		
		
	});
	
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});