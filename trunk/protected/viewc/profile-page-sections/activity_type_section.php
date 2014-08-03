<span class="caret pull-right reduce"></span>
<div class="custom-well-header">Mes types d'activités</div>

<div class="reduce-panel">
	<hr>
	<div class="alert alert-warning custom-alert"><span class="glyphicon glyphicon-warning-sign"></span> <strong>Attention</strong> : Supprimer un type d'activité aura pour effet de supprimer toutes les activités qui lui sont liées</div>
	
	<table class="table" id="activity-type-table">
		<tr>
			<th>Nom</th>
			<th>Description</th>
		</tr>
		<?php foreach($data['activity_types'] as $k1=>$v1): ?>
		<tr class="activity-type-row" id="activity-type-<?php echo $v1['activity_type_id']; ?>">
			<td><a href="javascript:void(0)" class="activity-type-name"><?php echo $v1['activity_type_name']; ?></a></td>
			<td><a href="javascript:void(0)" class="activity-type-description"><?php echo $v1['activity_type_description']; ?></a></td>
			<td>
				<a href="javascript:void(0)" class="btn btn-danger delete-activity-type-btn">Supprimer</a>
			</td>
		</tr>
		<?php endforeach; ?>
		<tr id="add-activity-type-line">
			<td><input type="text" name="activity_type_name" id="activity_type_name" class="form-control" placeholder="Nom..."></td>
			<td><input type="text" name="activity_type_description" id="activity_type_description" class="form-control" placeholder="Description..."></td>
			<td><a href="javascript:void(0)" id="activity-type-add-action" class="btn btn-success">Ajouter</a></td>
		</tr>
	</table>
</div>

<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//profile-page-sections/../main-page-modals/reassign_activities_modal.php"; ?>