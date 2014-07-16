<span class="caret pull-right reduce"></span>
<div class="custom-well-header">Mes notifications</div>

<div class="reduce-panel">
	<hr>			
	<div class="hidden-elements">
		<div id="simple_alert_tl_seconds"><?php echo $data['notification']['simple_alert_tl']; ?></div>
		<div id="critical_alert_tl_seconds"><?php echo $data['notification']['critical_alert_tl']; ?></div>
	</div>
	
	<div class="alert alert-warning custom-alert"><span class="glyphicon glyphicon-warning-sign"></span> <strong>Attention</strong> : L'alerte de niveau 1 doit apparaitre avant l'alerte de niveau 2</div>
							
	<form id="notification-form">
		<div class="panel panel-warning notification-panel">
			<div class="panel-body">
				<div class="custom-well-header">Alerte de niveau 1</div><hr>
				<div class="input-group">
					<span class="input-group-addon">Nom de l'activité :</span>
					<input type="text" class="form-control" id="simple_alert_msg" placeholder="Votre message" value="<?php echo $data['notification']['simple_alert_msg']; ?>" name="simple_alert_msg">
				</div>
				<p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activite : Votre message</p>
				<div class="well custom-well-grey">
					<div class="row">
						<div class="col-xs-2">
							<input type="number" id="simple_alert_tl_day" step="1" value="0" min="0" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>jour(s)</label>
						</div>
						<div class="col-xs-2">
							<input type="number" id="simple_alert_tl_hour" step="1" value="0" min="0" max="23" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>heure(s)</label>
						</div>
						<div class="col-xs-2">
							<input type="number" id="simple_alert_tl_minute" step="1" value="0" min="0" max="59" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>minute(s)</label>
						</div>
					</div>
				</div>
				<p class="help-block">Ce message apparaitra à <strong>X</strong> jour(s), <strong>Y</strong> heure(s) et <strong>Z</strong> minute(s) avant la fin de l'activité</p>
			</div>
		</div>
		<div class="panel panel-danger notification-panel">
			<div class="panel-body">
				<div class="custom-well-header">Alerte de niveau 2</div><hr>
				<div class="input-group">
					<span class="input-group-addon">Nom de l'activité :</span>
					<input type="text" class="form-control" id="critical_alert_msg" placeholder="Votre message" value="<?php echo $data['notification']['critical_alert_msg']; ?>" name="critical_alert_msg">
				</div>
				<p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activité : Votre message</p>
				<div class="well custom-well-grey">
					<div class="row">
						<div class="col-xs-2">
							<input type="number" id="critical_alert_tl_day" step="1" value="0" min="0" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>jour(s)</label>
						</div>
						<div class="col-xs-2">
							<input type="number" id="critical_alert_tl_hour" step="1" value="0" min="0" max="23" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>heure(s)</label>
						</div>
						<div class="col-xs-2">
							<input type="number" id="critical_alert_tl_minute" step="1" value="0" min="0" max="59" class="form-control"/>
						</div>
						<div class="col-xs-2 alert-tl-label">
							<label>minute(s)</label>
						</div>
					</div>
				</div>
				<p class="help-block">Ce message apparaitra à <strong>X</strong> jour(s), <strong>Y</strong> heure(s) et <strong>Z</strong> minute(s) avant la fin de l'activité</p>
			</div>
		</div>
		<div class="panel panel-info notification-panel">
			<div class="panel-body">
				<div class="custom-well-header">Fin de l'activité</div><hr>
				<div class="input-group">
					<span class="input-group-addon">Nom de l'activité :</span>
					<input type="text" class="form-control" id="end_activity_msg" placeholder="Votre message" value="<?php echo $data['notification']['end_activity_msg']; ?>" name="end_activity_msg">
				</div>
				<p class="help-block">Le message de la notification sera de la forme suivante : Nom de l'activité : Votre message</p>
			</div>
		</div>
		<input type="hidden" name="notification_id" value="<?php echo $data['notification']['notification_id']; ?>"/>
		<input type="hidden" id="simple_alert_tl" value='' id="simple_alert_tl" name="simple_alert_tl"/>
		<input type="hidden" id="critical_alert_tl" value='' id="critical_alert_tl" name="critical_alert_tl"/>
		<a href="javascript:void(0)" id="to-update-notifications-action" class="btn btn-success">Modifier mes notifications</a>
	</form>
</div>