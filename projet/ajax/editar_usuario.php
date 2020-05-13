<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}		
		if (empty($_POST['firstname2'])){
			$errors[] = "Noms vides";
		} elseif (empty($_POST['lastname2'])){
			$errors[] = "Prenom vides";
		}  elseif (empty($_POST['user_name2'])) {
            $errors[] = "Nom d'utilisateur vide";
        }  elseif (strlen($_POST['user_name2']) > 64 || strlen($_POST['user_name2']) < 2) {
            $errors[] = "Le nom d'utilisateur ne peut pas contenir moins de 2 caractères ni plus de 64 caractères.";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name2'])) {
            $errors[] = "Le nom d'utilisateur ne rentre pas dans le schéma de noms: seuls les caractères aZ et sont autorisés, de 2 à 64 caractères";
        } elseif (empty($_POST['user_email2'])) {
            $errors[] = "L'email ne peut pas être vide";
        } elseif (strlen($_POST['user_email2']) > 64) {
            $errors[] = "L'email ne peut pas dépasser 64 caractères";
        } elseif (!filter_var($_POST['user_email2'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Votre adresse email n'est pas dans un format email validea";
        } elseif (
			!empty($_POST['user_name2'])
			&& !empty($_POST['firstname2'])
			&& !empty($_POST['lastname2'])
            && strlen($_POST['user_name2']) <= 64
            && strlen($_POST['user_name2']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name2'])
            && !empty($_POST['user_email2'])
            && strlen($_POST['user_email2']) <= 64
            && filter_var($_POST['user_email2'], FILTER_VALIDATE_EMAIL)
          )
         {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = mysqli_real_escape_string($con,(strip_tags($_POST["firstname2"],ENT_QUOTES)));
				$lastname = mysqli_real_escape_string($con,(strip_tags($_POST["lastname2"],ENT_QUOTES)));
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name2"],ENT_QUOTES)));
                $user_email = mysqli_real_escape_string($con,(strip_tags($_POST["user_email2"],ENT_QUOTES)));
				$user_id=intval($_POST['mod_id']);

				$Majfirstname =strtoupper($firstname);
				$Majlastname =strtoupper($lastname );
					
               
					// write new user's data into database
                    $sql = "UPDATE UTILISATEUR SET firstname='".$Majfirstname."', lastname='".$Majlastname."', user_name='".$user_name."', user_email='".$user_email."'
                            WHERE user_id='".$user_id."';";
                    $query_update = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_update) {
                        $messages[] = "Le compte a été modifié avec succès.";
                    } else {
                        $errors[] = "Désolé, l'enregistrement a échoué. S'il vous plaît, revenez et essayez à nouveau.";
                    }
                
            
        } else {
            $errors[] = "Une erreur inconnue s'est produite.";
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
						<strong> Bien fait !</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>