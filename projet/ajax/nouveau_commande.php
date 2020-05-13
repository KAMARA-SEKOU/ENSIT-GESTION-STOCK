
<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['produitCom'])) {
           $errors[] = "Fournisseur vide";
        } else if (!empty($_POST['produitCom']) and ($_POST['fournisseurCom'] !='-- Selection Fournisseur --') ){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

		$UtilisateurCom=$_SESSION['user_id'];
		$FournisseurCom=mysqli_real_escape_string($con,(strip_tags($_POST["fournisseur_FK"],ENT_QUOTES)));
		$ProduitCom=mysqli_real_escape_string($con,(strip_tags($_POST["produitCom"],ENT_QUOTES)));
		$QuantiteCom=mysqli_real_escape_string($con,(strip_tags($_POST["quantiteCom"],ENT_QUOTES)));
		$date_added=date("Y-m-d H:i:s");

		//$MajFournisseurCom=strtoupper($FournisseurCom); // misen Majuscule du Nom de l'Entreprise
		$MajProduitCom=strtoupper($ProduitCom); // misen Majuscule du Prenom de l'Entreprise


		$sql="INSERT INTO COMMANDE (utilisateur_FK,fournisseur_FK, produitCom, quantiteCom,date_added) 
		VALUES ('$UtilisateurCom','$FournisseurCom','$MajProduitCom','$QuantiteCom','$date_added')";

						
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "La commande a été entré avec succès.";
			} else{
				$errors []= "Je suis désolé que quelque chose a mal tourné, essayez encore.".mysqli_error($con);
			}
		} else {
			$errors []= "Erreur inconnue";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Erreur !</strong> 
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
						<strong>Bien fait!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>