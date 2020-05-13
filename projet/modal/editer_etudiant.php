	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editer Etudiant</h4>
		  </div>
		  <div class="modal-body">

			<form class="form-horizontal" method="post" id="editer_etudiant" name="editer_etudiant">
			<div id="resultados_ajax2"></div>

			  <div class="form-group">
				<label for="mod_Nom_Etudiant" class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Nom_Etudiant" name="mod_Nom_Etudiant" placeholder="Nom Etudiant" required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>

			   <div class="form-group">
				<label for="mod_Prenom_Etudiant" class="col-sm-3 control-label">Prenom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Prenom_Etudiant" name="mod_Prenom_Etudiant" placeholder="Prenom Etudiant" required>
				</div>
			  </div>	
			  
			 <div class="form-group">
				<label for="mod_Matricule_Etudiant" class="col-sm-3 control-label">Matricule</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Matricule_Etudiant" name="mod_Matricule_Etudiant" placeholder="Matricule Etudiant" required> 
				</div>
			  </div>


			  <div class="form-group">
				<label for="mod_Sexe_Etudiant" class="col-sm-3 control-label">Sexe</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_Sexe_Etudiant" name="mod_Sexe_Etudiant" required>
					<option value=""> -- Selection du genre -- </option>
					<option value="1">Homme</option>
					<option value="2">Femme</option>
				  </select>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_Niveau_Etudiant" class="col-sm-3 control-label">Niveau</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_Niveau_Etudiant" name="mod_Niveau_Etudiant" required>
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
			<button type="submit" class="btn btn-primary" id="actualizar_datos" >Mise à Jour</button>
		  </div>

		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>