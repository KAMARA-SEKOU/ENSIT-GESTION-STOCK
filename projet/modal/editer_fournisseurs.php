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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editer Fournisseur</h4>
		  </div>
		  <div class="modal-body">

			<form class="form-horizontal" method="post" id="editer_fournisseur" name="editer_fournisseur">
			<div id="resultados_ajax2"></div>

			  <div class="form-group">
				<label for="mod_Entreprise" class="col-sm-3 control-label">Entreprise</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Entreprise" name="mod_Entreprise" pattern="[A-Za-z '-]{5,18}" title="Veuillez inserer un alphabet de 8 à 14 caractères" placeholder="Nom Entreprise" required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>

			   <div class="form-group">
				<label for="mod_Adresse" class="col-sm-3 control-label">Adresse</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Adresse" name="mod_Adresse" pattern="[0-9A-Za-z '#\.-]{8,16}" title="Veuillez inserer une adresse postale de 8 à 16 caractères" placeholder="Adresse Entreprise" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_Email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				 <input type="email" class="form-control" id="mod_Email" name="mod_Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title=" Veuillez respecter le format : toto@xxmail.xx" placeholder="Courier Electronique Entreprise" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="mod_TelFour" class="col-sm-3 control-label">Contact</label>
				<div class="col-sm-8">
				 <input type="text" class="form-control" id="mod_TelFour" name="mod_TelFour" pattern="^\d{8,14}$" title="Veuillez inserer un numéro de téléphone de 8 à 14 caractères" placeholder="Numero Téléphone Ex: 45892922 ou +22545892922" required>
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