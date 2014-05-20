<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<!-- css definition -->
		<style type="text/css">
			.report_table {
				width:100%;
			}
			
			.report_table td,th {
				width:25%;
				padding:10px;
			}
		</style>
	</head>
	<body>
		<img src="<?php echo $data['baseurl']; ?>global/img/mpa_logo.gif" alt="MPA logo"/><br><br><br>
		<h2 align="center">My Personal Agenda - Rapport d'activités</h2><br><br>
		<p>Bonjour <?php echo $data['current_user']['firstname']; ?>,<br><br>Vous trouverez ci-dessous la liste des activités en cours &agrave; la date du <strong><?php echo $data['current_date']; ?></strong> &agrave; <strong><?php echo $data['current_hour']; ?></strong>.</p>
		
		<?php if( ! empty($data['end_date_reached']) ): ?>
		<p>Activité(s) terminée(s)</p>
		<table border="1" class="report_table">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Pourcentage fait</th>
			</tr>
			<?php foreach($data['end_date_reached'] as $k1=>$v1): ?>
			<tr>
				<td><?php echo $v1['title']; ?> (<?php echo $v1['activity_type']['activity_type_name']; ?>)</td>
				<td><?php echo $v1['description']; ?></td>
				<td><?php echo $v1['percent_done']; ?>%</td>
			</tr>
			<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
			
		<?php if( ! empty($data['critical_alert_table']) ): ?>
		<p>Activité(s) se terminant dans moins de <strong><?php echo $data['critical_alert_tl_full']; ?></strong></p>
		<table border="1" class="report_table">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Temps restant</th>
				<th>Pourcentage fait</th>
			</tr>
			<?php foreach($data['critical_alert_table'] as $k1=>$v1): ?>
			<tr>
				<td><?php echo $v1['title']; ?> (<?php echo $v1['activity_type']['activity_type_name']; ?>)</td>
				<td><?php echo $v1['description']; ?></td>
				<td><?php echo $v1['nb_days_left']; ?> jour(s), <?php echo $v1['nb_hours_left']; ?> heure(s) et <?php echo $v1['nb_minutes_left']; ?> minute(s)</td>
				<td><?php echo $v1['percent_done']; ?>%</td>
			</tr>
			<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
		
		<?php if( ! empty($data['simple_alert_table']) ): ?>
		<p>Activité(s) se terminant dans moins de <strong><?php echo $data['simple_alert_tl_full']; ?></strong></p>
		<table border="1" class="report_table">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Temps restant</th>
				<th>Pourcentage fait</th>
			</tr>
			<?php foreach($data['simple_alert_table'] as $k1=>$v1): ?>
			<tr>
				<td><?php echo $v1['title']; ?> (<?php echo $v1['activity_type']['activity_type_name']; ?>)</td>
				<td><?php echo $v1['description']; ?></td>
				<td><?php echo $v1['nb_days_left']; ?> jour(s), <?php echo $v1['nb_hours_left']; ?> heure(s) et <?php echo $v1['nb_minutes_left']; ?> minute(s)</td>
				<td><?php echo $v1['percent_done']; ?>%</td>
			</tr>
			<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
		
		<?php if( ! empty($data['others_table']) ): ?>
		<?php if( !empty($data['critical_alert_table']) || !empty($data['simple_alert_table']) || !empty($data['end_date_reached']) ): ?>
			<p>Autres activité(s)</p>
		<?php endif; ?>
		<table border="1" class="report_table">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Temps restant</th>
				<th>Pourcentage fait</th>
			</tr>
			<?php foreach($data['others_table'] as $k1=>$v1): ?>
			<tr>
				<td><?php echo $v1['title']; ?> (<?php echo $v1['activity_type']['activity_type_name']; ?>)</td>
				<td><?php echo $v1['description']; ?></td>
				<td><?php echo $v1['nb_days_left']; ?> jour(s), <?php echo $v1['nb_hours_left']; ?> heure(s) et <?php echo $v1['nb_minutes_left']; ?> minute(s)</td>
				<td><?php echo $v1['percent_done']; ?>%</td>
			</tr>
			<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
		<p><strong>N.B. : Nous considérons que une activité terminée est une activité dont le temps restant est égal &agrave; 0.</strong></p>
		<!-- Page footer -->
		<p align="center"><strong>My Personal Agenda</strong> - <?php echo $data['baseurl']; ?></p>
	</body>
</html>