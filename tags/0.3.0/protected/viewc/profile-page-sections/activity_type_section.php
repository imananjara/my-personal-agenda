<div><span class="glyphicon glyphicon-tasks"></span> MES TYPES D'ACTIVITES</div><hr>

<div class="well" style="background-color:white;"><span class="glyphicon glyphicon-warning-sign"></span> <strong>Attention</strong> : Supprimer un type d'activité aura pour effet de supprimer toutes les activités qui lui sont liées</div>

<table class="table table-bordered table-striped table-hover" id="activity-type-table">
	<tr>
		<th>Nom</th>
		<th>Description</th>
	</tr>
	<?php foreach($data['activity_types'] as $k1=>$v1): ?>
	<tr id="activity-type-<?php echo $v1['activity_type_id']; ?>">
		<td><?php echo $v1['activity_type_name']; ?></td>
		<td><?php echo $v1['activity_type_description']; ?></td>
		<td>
			<a href="javascript:void(0)" class="btn btn-primary edit-activity-type-btn">Editer</a>
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