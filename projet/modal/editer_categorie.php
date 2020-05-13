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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editer Categorie</h4>
		  </div>
		  <div class="modal-body">

			<form class="form-horizontal" method="post" id="editer_categorie" name="editer_categorie">
			<div id="resultados_ajax2"></div>

			  <div class="form-group">
				<label for="mod_Categorie" class="col-sm-3 control-label">Categorie</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_Categorie" name="mod_Categorie" pattern="[A-Za-z '-]{3,18}" title="Veuillez inserer un alphabet de 3 à 18 caractères" placeholder="Nom Categorie" required>
					<input type="hidden" name="mod_id" id="mod_id">
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