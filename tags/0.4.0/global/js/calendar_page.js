$( document ).ready(function() {
	
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//console.log(jsonAct);
	//load calendar options
	var options = {
			events_source: baseurl + 'global/utils/events.json.txt',
			view: 'month',
			tmpl_path: baseurl + 'global/utils/tmpls/',
			onAfterViewLoad: function(view) {
				$('h3').text(this.getTitle());
				$('.btn-group button').removeClass('active');
				$('button[data-calendar-view="' + view + '"]').addClass('active');
			},
			classes: {
				months: {
					general: 'label'
				}
			}
		};
	
	//Initialize the calendar
	var calendar = $('#calendar').calendar(options);
	
	//Buttons actions
	$('.btn-group button[data-calendar-nav]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.navigate($this.data('calendar-nav'));
		});
	});

	$('.btn-group button[data-calendar-view]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.view($this.data('calendar-view'));
		});
	});
	
	calendar.setLanguage("fr-FR");
	calendar.view();
	
});