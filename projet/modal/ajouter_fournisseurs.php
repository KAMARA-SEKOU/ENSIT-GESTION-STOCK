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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Ajouter Fournisseur</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="ajouter_fournisseur" name="ajouter_fournisseur">
			<div id="resultados_ajax"></div>

			
			  <div class="form-group">
				<label for="EntrepriseFour" class="col-sm-3 control-label">Entreprise</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="EntrepriseFour" name="EntrepriseFour" pattern="[A-Za-z '-]{5,18}" title="Veuillez inserer un alphabet de 5 ou 18 caractères" placeholder="Nom Entreprise" required>
				</div>

			  </div>
			  <div class="form-group">
				<label for="AdresseFour" class="col-sm-3 control-label">Adresse</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="AdresseFour" name="AdresseFour"  pattern="[0-9A-Za-z '#\.-]{8,16}" title="Veuillez inserer une adresse postale de 8 à 16 caractères" placeholder="Adresse Entreprise" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="EmailFour" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="EmailFour" name="EmailFour" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title=" Veuillez respecter la forme toto@xxmail.xx" placeholder="Courier Electronique Entreprise" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="TelFour" class="col-sm-3 control-label">Contact</label>
				<div class="col-sm-8">
					<input type="tel" class="form-control" id="TelFour" name="TelFour"  pattern="^\d{8,14}$" title="Veuillez inserer un numero de 8 ou 14 caractères" placeholder="Numero Téléphone Ex: 45892922 ou +22545892922" required> 
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
		  	<button type="button" class="btn btn-default" onclick='effacer2()';>Initialiser</button>
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