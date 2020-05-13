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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editer Utilisateur</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			<div class="form-group">
				<label for="firstname2" class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="firstname2" name="firstname2" placeholder="Nom" required>
				  <input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname2" class="col-sm-3 control-label">Prénom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="lastname2" name="lastname2" placeholder="Prénom" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_name2" class="col-sm-3 control-label">Login</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="user_name2" name="user_name2" placeholder="Login" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_email2" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="user_email2" name="user_email2" placeholder="Adresse Electronique" required>
				</div>
			  </div>
						 	 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Mise à jour</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>