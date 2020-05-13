<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "Aucun Identifiant detecté";
        }else if (empty($_POST['mod_Matricule_Etudiant'])) {
           $errors[] = "Champs Nom Etudiant vide ";
        } else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_Matricule_Etudiant'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$Nom_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Nom_Etudiant"],ENT_QUOTES)));
		$Prenom_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Prenom_Etudiant"],ENT_QUOTES)));
		$Matricule_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Matricule_Etudiant"],ENT_QUOTES)));
		$Sexe=intval($_POST['mod_Sexe_Etudiant']);
		$Niveau=intval($_POST['mod_Niveau_Etudiant']);
		$id_etudiant=intval($_POST['mod_id']);

		$MajNom_Etudiant=strtoupper($Nom_Etudiant); // misen Majuscule du Nom de l'Entreprise
		$MajPrenom_Etudiant=strtoupper($Prenom_Etudiant); // misen Majuscule du Nom de l'Entreprise

		$sql="UPDATE ETUDIANT SET NomEtud='".$MajNom_Etudiant."', PrenomEtud='".$MajPrenom_Etudiant."', MatriculeEtud='".$Matricule_Etudiant."', 				SexeEtud='".$Sexe."',NiveauEtud='".$Niveau."' WHERE Id_Etud='".$id_etudiant."'";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "L'Etudiant a été mis à jour avec succès.";
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