<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "Aucun Identifiant detecté";
        }else if (empty($_POST['mod_fournisseurCom'])) {
           $errors[] = "Champs Fournisseur vide ";
        } else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_fournisseurCom'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$Fournisseur=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fournisseurCom"],ENT_QUOTES)));
		$Produit=mysqli_real_escape_string($con,(strip_tags($_POST["mod_produitCom"],ENT_QUOTES)));
		$Quantite=mysqli_real_escape_string($con,(strip_tags($_POST["mod_quantiteCom"],ENT_QUOTES)));
		//$User=mysqli_real_escape_string($con,(strip_tags($_POST["mod_user"],ENT_QUOTES)));
		
		$id_commande=intval($_POST['mod_id']);

		//$MajFournisseur=strtoupper($Fournisseur); // misen Majuscule du Nom de l'Entreprise
		$MajProduit=strtoupper($Produit); // misen Majuscule du Nom de l'Entreprise

		$sql="UPDATE COMMANDE SET fournisseur_FK='".$Fournisseur."', produitCom='".$MajProduit."',
		 quantiteCom='".$Quantite."' WHERE ID_Com='".$id_commande."'";

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