$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//Active datepicker	
	$('#inputBirthdayProfile').datetimepicker({
		language: 'fr',
		pickTime: false
	});
  
	
	//If the user click on the subscribe button
	$("#to-update-profile-action").on('click', function(){
		
		if ($("#inputFirstNameProfile").val() == "" || $("#inputLastNameProfile").val() == "" || $("#inputBirthdayProfile").children( "input" ).val() == "" || $("#inputEmailProfile").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'edition du profil</strong> : Vous devez remplir tous les champs pour pouvoir editer votre profil');
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