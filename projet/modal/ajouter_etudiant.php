	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Ajouter Etudiant</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="ajouter_etudiant" name="ajouter_etudiant">
			<div id="resultados_ajax"></div>

			  <div class="form-group">
				<label for="Nom_Etudiant" class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Nom_Etudiant" name="Nom_Etudiant" pattern="[A-Za-z '-]{2,10}" title="Veuillez inserer un alphabet de 2 ou 10 caractères" placeholder="Nom Etudiant" required>
				</div>

			  </div>
			  <div class="form-group">
				<label for="Prenom_Etudiant" class="col-sm-3 control-label">Prenom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Prenom_Etudiant" name="Prenom_Etudiant" pattern="[A-Za-z '-]{2,16}" title="Veuillez inserer un alphabet de 2 ou 16 caractères" placeholder="Prenom Etudiant" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="Matricule_Etudiant" class="col-sm-3 control-label">Matricule</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="Matricule_Etudiant" name="Matricule_Etudiant" pattern="[0-9]{2}[A-Z]{2}[0-9]{4}" title="Veuillez respecter la forme: 17EN1415" placeholder="Matricule" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="Sexe" class="col-sm-3 control-label">Sexe</label>
				<div class="col-sm-8">
				 <select class="form-control" id="Sexe" name="Sexe" required>
					<option value=""> -- Selection du genre -- </option>
					<option value="1">Homme</option>
					<option value="2">Femme</option>
				  </select>
				</div>
			  </div>


			  <div class="form-group">
				<label for="Niveau" class="col-sm-3 control-label">Niveau</label>
				<div class="col-sm-8">
				 <select class="form-control" id="Niveau" name="Niveau" required>
					<option value=""> -- Selection du Niveau -- </option>
					<option value="1">Année Préparatoire 1</option>
					<option value="2">Année Préparatoire 2</option>
					<option value="3">Ingénieur 1</option>
					<option value="4">Ingénieur 2</option>
					<option value="5">Ingénieur 3</option>
				  </select>
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
		  	<button type="button" class="btn btn-default" onclick='effacer()';>Initialiser</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Sauvergarder</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>