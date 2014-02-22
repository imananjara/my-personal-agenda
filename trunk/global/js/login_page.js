$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//Active datepicker	
	$('#inputBirthdayInscrip').datetimepicker({
		language: 'fr',
		pickTime: false
	});
  
	//If the user click on connect button
	$( "#to-connect-action" ).on("click", function() {
		
		//The application check if all fields are not empty
		if ($("#inputLoginAuth").val() == "" || $("#inputPasswordAuth").val() == "")
			{
				notification('alert-danger', '<strong>Erreur lors de la connexion</strong> : Vous devez fournir un login ou/et un mot de passe pour pouvoir vous connecter');
				return;
			}
		
		data = $("#connexion-form").serialize();
		url = baseurl + "getsession";

		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(isConnected) {
			
			if(isConnected=="true")
			{
				//Refresh to access to the main page
				location.href = baseurl;
			}
			
			else
			{
				notification('alert-danger', '<strong>Erreur lors de la connexion</strong> : Les identifiants sont incorrects');
				$("#inputLoginAuth").val("");
				$("#inputPasswordAuth").val("");
				$("#inputLoginAuth").focus();
				return;
			}
			
		})
		.error(function() {
			alert("Erreur de script");
		});

	});
	
	//If the user click on the subscribe button
	$("#to-subscribe-action").on('click', function(){
		if ($("#inputLoginInscrip").val() == "" || $("#inputPasswordInscrip").val() == "" && $("#inputFirstNameInscrip").val() == "" && $("#inputLastNameInscrip").val() == "" && $("#inputBirthdayInscrip").children( "input" ).val() == "" && $("#inputEmailInscrip").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'inscription</strong> : Vous devez remplir tous les champs pour vous inscrire');
			return;
		}
		
		data = $("#inscription-form").serialize();
		url = baseurl + "adduser";
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function() {
			
			notification('alert-success', '<strong>Inscription reussie</strong> : Vous pouvez des a present vous connecter sur l\'application (onglet Connexion)');
			
			//Clean the form
			$("#inputLoginInscrip").val("");
			$("#inputPasswordInscrip").val(""); 
			$("#inputFirstNameInscrip").val("");
			$("#inputLastNameInscrip").val("");
			$("#inputBirthdayInscrip").val("");
			$("#inputEmailInscrip").val("");
			
			$("#connexion-tab").trigger('click');
			
		})
		.error(function() {
			alert("Erreur de script");
		});
		

		return;
		
	});
	
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});