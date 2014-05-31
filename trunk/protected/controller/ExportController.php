<?php
Doo::loadController('BaseController');
Doo::loadHelper("HTML2PDF/HTML2PDF");
Doo::loadModel('Activity');
Doo::loadModel('User');
Doo::loadModel('Notification');

/**
 * Export Controller
 * This class is used for editing pdf's files
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class ExportController extends BaseController{
	
	/**
	 * Constructor for ExportController class
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Export the activities list to the PDF format using HTML2PDF
	 */
	public function exportActivitiesPdf() {
				
		//Create an HTML2PDF's object and generate a pdf file
		$html2pdf = new HTML2PDF('P', 'A4', 'fr', 'true', 'UTF-8');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->pdf->SetAuthor('My Personal Agenda');
		$html2pdf->writeHTML($this->getActivitiesReportHtml());
		$html2pdf->Output('Rapport activites - My Personal Agenda.pdf', 'D');
	}
	
	/**
	 * Export the notes list to the PDF format using HTML2PDF
	 */
	public function exportNotesPdf() {
		
	}
	
	/**
	 * Get the HTML page "Activities report"
	 */
	public function getActivitiesReportHtml() {
		
		//Load user's informations
		$this->_data['current_user'] = User::_getUserProfile();
		
		//Get all activities
		$activities = Activity::_getActivities();
		
		//Get current date
		setlocale(LC_ALL, 'fr_FR');
		$this->_data['current_date'] = (strftime("%A %d %B")) ." ". date("Y");
		$this->_data['current_hour'] = date("H\hi");
		
		//Get the notification object
		$notification = Notification::_getUserNotification();
		
		//Init tables
		$this->_data["end_date_reached"] = $this->_data["critical_alert_table"] = $this->_data["simple_alert_table"] = $this->_data["others_table"] = array();
		$end_date_reached_inc = $critical_alert_inc = $simple_alert_inc = $others_inc = 0;
		
		//Get tls
		$critical_alert_tl = $notification["critical_alert_tl"];
		$simple_alert_tl = $notification["simple_alert_tl"];
		
		$this->_data['critical_alert_tl_full'] = $this->get_days_hour_minutes($notification["critical_alert_tl"]);
		$this->_data['simple_alert_tl_full'] = $this->get_days_hour_minutes($notification["simple_alert_tl"]);
		
		//Fill all tables
		for ($i = 0; $i < count($activities); $i++) 
		{
			$activityTl = $activities[$i]["tmpLeft"];
			
			if ($activityTl == 0) {
				
				$this->_data["end_date_reached"][$end_date_reached_inc] = $activities[$i];
				$end_date_reached_inc++;
			}
			
			if (($activityTl > 0) && ($activityTl < $critical_alert_tl)) {
				
				$this->_data["critical_alert_table"][$critical_alert_inc] = $activities[$i];
				$critical_alert_inc++;
				
			} 
			
			if (($activityTl > $critical_alert_tl) && ($activityTl < $simple_alert_tl)) {
				
				$this->_data["simple_alert_table"][$simple_alert_inc] = $activities[$i];
				$simple_alert_inc++;
				
			}  
			
			if ($activityTl > $simple_alert_tl) {
	
				$this->_data["others_table"][$others_inc] = $activities[$i];
				$others_inc++;
				
			}
		}

		ob_start();
		$this->renderView('reports/activities_report');
		$content = ob_get_clean();
		return $content;
	}
	
	/**
	 * Get the HTML page "Notes report"
	 */
	public function getNotesReportHtml() {
	
	}
	
	/**
	 * Convert time (seconds) into days, hours and minutes format
	 */
	public function get_days_hour_minutes($time) {
		$tmp= $time;
		$nb_seconds_left = $tmp % 60;
				
		$tmp = floor( ($tmp - $nb_seconds_left) /60 );
		$nb_minutes_left = $tmp % 60;
				
		$tmp = floor( ($tmp - $nb_minutes_left)/60 );
		$nb_hours_left = $tmp % 24;
				
		$tmp = floor( ($tmp - $nb_hours_left)  /24 );
		$nb_days_left = $tmp;
		
		return $nb_days_left ." jour(s), ". $nb_hours_left ." heure(s) et ". $nb_minutes_left ." minute(s)";
	
	}
}