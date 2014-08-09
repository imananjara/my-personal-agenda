$( document ).ready(function() {
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//Enable summernote for the commentary's field
	$('#activityCommentary').summernote({
		lang: 'fr-FR',
		height: 150,
		toolbar: [
		          ['style', ['bold', 'italic', 'underline', 'clear']],
		          ['font', ['strikethrough']],
		          ['fontsize', ['fontsize']],
		          ['color', ['color']],
		          ['para', ['ul', 'ol', 'paragraph']],
		          ['height', ['height']],
		          ['insert', ['link', 'hr']]
		        ]
	});
	
	fix_summernote_bug();
	
	//Active datepicker	
	$('#activityEndDate').datetimepicker({
		language: 'fr',
		pickTime: false
	});
	
	$('#activityEndHour').datetimepicker({
		language: 'fr',
		pickDate: false
	});
	
	//If the user click on submit button
	$("#save-activity-btn").on("click", function(){
		
		fix_summernote_bug();
		
		$('#activityCommentary').val($('#activityCommentary').code());

		if ($("#activityTitle").val() == "" || $("#activityDescription").val() == "" || $("#activityEndDate").children( "input" ).val() == "" || $('#activityEndHour').children( "input" ).val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'ajout/modification de l\'activité</strong> : Vous devez remplir les champs suivants : Titre, Description, Date de fin');
			return;
		}
		
		//Check the date format
		if (!(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/.test($("#activityEndDate").children( "input" ).val()))) {
			notification('alert-danger', '<strong>Erreur lors de l\'ajout/modification de l\'activite</strong> : La date de l\'échéance est écrit dans un format incorrect.');
			return;
		}
		
		//Check the hour format
		if (!(/^[0-9]{2}\:[0-9]{2}$/.test($("#activityEndHour").children( "input" ).val()))) {
			notification('alert-danger', '<strong>Erreur lors de l\'ajout/modification de l\'activite</strong> : L\'heure de l\'échéance est écrit dans un format incorrect.');
			return;
		}
		
		//Submit the form
		$("#save-activity-form").submit();
		
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