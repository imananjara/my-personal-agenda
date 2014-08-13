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
	
	activate_x_editable();
	
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
	
	//The user clicks on task's add btn
	$("#add-task-btn").on("click", function(){
		
		if ($("#task_title").val() == "") {
			notification('alert-danger', '<strong>Erreur lors de l\'ajout d\'une tâche</strong> : Vous devez renseigner un titre avant de continuer');
			return;
		}
		
		var data = "activity_id=" + $("#idActivity").val() + "&task_title=" + $("#task_title").val() + "&task_percent_done=" + $("#task_percent_done option:selected").val();
		var url = baseurl + "savetask";

		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(task_id){
			
			//Line's insertion
			var newTabLine = $("<tr></tr>").addClass("task-row").attr("id", "task-" + task_id);
			newTabLine.append($("<td></td>").html($("<a></a>").addClass("task-title").attr("href","javascript:void(0)").html($("#task_title").val())));
			newTabLine.append($("<td></td>").html($("<a></a>").addClass("task-percent-done").attr("href","javascript:void(0)").attr("data-value", $("#task_percent_done option:selected").val()).html($("#task_percent_done option:selected").val())));
			
			var deleteButton = $("<a></a>").addClass("btn btn-danger delete-task-btn").attr("href","javascript:void(0)").html("Supprimer");
			newTabLine.append($("<td></td>").append(deleteButton));

			newTabLine.insertBefore($("#add-task-line")).hide().fadeIn('slow');
			
			$("#task_title").val("");
			$("#task_percent_done").val('0');
			
			$('#ajax-loader').hide();
			
			//Setup editable for the new elements
			activate_x_editable();
			
			notification('alert-success', 'Votre tâche a bien été enregistrée');
			
		});
		
	});
	
	//If the user clicks on 'delete' button
	$("#task-table").on("click", ".delete-task-btn", function(){
		
		var task_id = $(this).parent().parent().attr("id").split("-")[1];
		
		var url = baseurl + 'deletetask/' + task_id;
		
		$.ajax({
            url: url
	    }).success(function(){

	    		$('#task-' + task_id).remove();
	            notification('alert-success', 'Votre tâche a été supprimée avec succès');
	    });

	});
	
	//Enable x_editable for task's title and percent_done
	function activate_x_editable() {
		
		//Task's title
		$(".task-title").editable({
			placement: 'left',
			emptytext: "Indéfini",
			emptyclass: '',
		    type: 'text',
		    title: 'Veuillez saisir un titre',
		    success: function(response, task_title) {
		    	
		    	if(task_title == "") {
		    		task_title = "Indéfini";
		    	}
		    	var task_id = $(this).parent().parent().attr("id").split("-")[1];
		    	var data = "task_title=" + task_title + "&task_id=" + task_id;
				var url = baseurl + "savetask";
				
				$.ajax({
					type: "POST",
					url: url,
					data: data
				}).success(function(){
					notification('alert-success', 'Votre tâche a bien été modifiée');
				});
		    }  
		});
		
		//Task's percent_done
		$('.task-percent-done').editable({
			placement: 'left',
			type: 'select',
			source: [
			       {value: 0, text: '0'},
			       {value: 10, text: '10'},
			       {value: 20, text: '20'},
			       {value: 30, text: '30'},
			       {value: 40, text: '40'},
			       {value: 50, text: '50'},
			       {value: 60, text: '60'},
			       {value: 70, text: '70'},
			       {value: 80, text: '80'},
			       {value: 90, text: '90'},
			       {value: 100, text: '100'}
			       ],
			success: function(response, task_percent_done) {
				
				var task_id = $(this).parent().parent().attr("id").split("-")[1];
				var data = "task_percent_done=" + task_percent_done + "&task_id=" + task_id;
				
				var url = baseurl + "savetask";
				
				$.ajax({
					type: "POST",
					url: url,
					data: data
				}).success(function(){
					notification('alert-success', 'Votre tâche a bien été modifiée');
				});
			}
		});
	}
	
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