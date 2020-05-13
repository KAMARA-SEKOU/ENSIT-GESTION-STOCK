	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Ajouter un nouveau Utilisateur</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nom" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname" class="col-sm-3 control-label">Prenom</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Prénom" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_name" class="col-sm-3 control-label">Login</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Login" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Courrier electronique" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_password_new" class="col-sm-3 control-label">Mot de passe</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password_new" name="user_password_new" placeholder="Mot de passe" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_password_repeat" class="col-sm-3 control-label">repeter Mot de passe</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="repeter Mot de passe" pattern=".{6,}" required>
				</div>
			  </div>
			 
			  

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">sauvegarder</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>