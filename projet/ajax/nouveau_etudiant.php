
<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['Nom_Etudiant'])) {
           $errors[] = "Nom Etudiant vide";
        } else if (!empty($_POST['Nom_Etudiant'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

		$Nom_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["Nom_Etudiant"],ENT_QUOTES)));
		$Prenom_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["Prenom_Etudiant"],ENT_QUOTES)));
		$Matricule_Etudiant=mysqli_real_escape_string($con,(strip_tags($_POST["Matricule_Etudiant"],ENT_QUOTES)));
		$Sexe=intval($_POST['Sexe']);
		$Niveau=intval($_POST['Niveau']);
		$date_added=date("Y-m-d H:i:s");

		$MajNom_Etudiant=strtoupper($Nom_Etudiant); // misen Majuscule du Nom de l'Entreprise
		$MajPrenom_Etudiant=strtoupper($Prenom_Etudiant); // misen Majuscule du Prenom de l'Entreprise


		$sql="INSERT INTO ETUDIANT (NomEtud, PrenomEtud, MatriculeEtud, SexeEtud, NiveauEtud ,date_added) 
						VALUES ('$MajNom_Etudiant','$MajPrenom_Etudiant','$Matricule_Etudiant','$Sexe','$Niveau','$date_added')";

						
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "L'etudiant a été entré avec succès.";
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