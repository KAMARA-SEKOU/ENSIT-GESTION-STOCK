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
			<form class="form-horizontal" method="post" id="ajouter_categorie" name="ajouter_categorie">
			<div id="resultados_ajax"></div>

			
			  <div class="form-group">
				<label for="NomCat" class="col-sm-3 control-label">Categorie</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="NomCat" name="NomCat" pattern="[A-Za-z '-]{3,18}" title="Veuillez inserer un alphabet de 5 ou 18 caractères" placeholder="Nom Categorie" required>
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