<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "Aucun Identifiant detecté";
        }else if (empty($_POST['mod_Entreprise'])) {
           $errors[] = "Champs Entreprise Fournisseur vide ";
        } else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_Entreprise'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$entreprise=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Entreprise"],ENT_QUOTES)));
		$adresse=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Adresse"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Email"],ENT_QUOTES)));
		$telFour=mysqli_real_escape_string($con,(strip_tags($_POST["mod_TelFour"],ENT_QUOTES)));
		
		$MajentrepriseFour=strtoupper($entreprise);
		
		$id_fournisseur=intval($_POST['mod_id']);
		$sql="UPDATE FOURNISSEUR SET EntrepriseFour='".$MajentrepriseFour."', AdresseFour='".$adresse."'
					, EmailFour='".$email."', TelFour='".$telFour."' WHERE ID_Fournisseur='".$id_fournisseur."'";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Le Fournisseur a été mis à jour avec succès.";
			} else{
				$errors []= "Désolé, quelque chose s'est mal passé, essayez à nouveau.".mysqli_error($con);
			}
		} else {
			$errors []= "Erreur inconnue";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Erreur!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Bien fait !</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>