
<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['EntrepriseFour'])) {
           $errors[] = "Entreprise vide";
        } else if (!empty($_POST['EntrepriseFour'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

		$entreprise=mysqli_real_escape_string($con,(strip_tags($_POST["EntrepriseFour"],ENT_QUOTES)));
		$adresse=mysqli_real_escape_string($con,(strip_tags($_POST["AdresseFour"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["EmailFour"],ENT_QUOTES)));
		$telFour=mysqli_real_escape_string($con,(strip_tags($_POST["TelFour"],ENT_QUOTES)));
		$date_added=date("Y-m-d H:i:s");
		$session_id= session_id();

		$MajentrepriseFour=strtoupper($entreprise); // misen Majuscule du Nom de l'Entreprise


		$sql="INSERT INTO FOURNISSEUR (EntrepriseFour, AdresseFour, EmailFour, TelFour, date_added) 
						VALUES ('$MajentrepriseFour','$adresse','$email','$telFour','$date_added')";

						
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Le client a été entré avec succès.";
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