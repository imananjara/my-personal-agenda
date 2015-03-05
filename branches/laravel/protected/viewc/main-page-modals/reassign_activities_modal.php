<div class="modal fade" id="activity-reassignment-modal" role="dialog" aria-labelledby="activity_reassignment" aria-hidden="true">
	 <div class="modal-dialog modal-lg">
	 	<div class="modal-content">
	   		<br>
	    	<div class="row">
				<div class="col-md-10 col-md-offset-1">
		       	 	<span class="hidden-elements" id="activity-type-deleted-id"></span>
		       	 	<h4 align="center">Suppression du type d'activité : <strong id="activity-type-deleted-name"></strong> - Réaffectation d'activités</h4><hr>
		       	 	<!-- Information -->
					<div class="alert alert-info custom-alert">
						<span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Information</strong> : Vous vous apprêtez à supprimer un type d'activité. Toutes les activités qui lui sont liées seront supprimées. Toutefois, il est toujours possible de les réaffecter à d'autres types d'activités. Si vous êtes sur de votre choix, cliquez sur "Valider mes choix" !
					</div><br>
					<table id="activities-list" class="table">
						<tr>
							<th>Votre activité</th>
							<th>À quel type voulez-vous assigner cette activité ?</th>
						</tr>
					</table>
					<br>
					<div class="pull-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
			       	 	<button type="button" id="reassign-activity-btn" class="btn btn-success">Valider mes choix</button>
					</div>		       	 
		       	 </div>
	       	 </div>
	        <br>
	    </div>
	</div>
</div>