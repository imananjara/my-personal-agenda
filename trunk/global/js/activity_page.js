$( document ).ready(function() {
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//Active datepicker
	$(".datepicker").datepicker();
	
	//If the user click on submit button
	$("#save-activity-btn").on("click", function(){

		if ($("#activityTitle").val() == "" || $("#activityDescription").val() == "" || $("#activityEndDate").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'ajout d\'activite</strong> : Vous devez remplir les champs suivants : Titre, Description, Date de fin');
			return;
		}
		
		//Submit the form
		$("#save-activity-form").submit();
		
	});
		
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});