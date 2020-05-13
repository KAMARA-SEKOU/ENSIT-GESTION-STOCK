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
		if (empty($_POST['firstname'])){
			$errors[] = "Nom vide";
		} elseif (empty($_POST['lastname'])){
			$errors[] = "Prenom vide";
		}  elseif (empty($_POST['user_name'])) {
            $errors[] = "Nom d'utilisateur vide";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $errors[] = "Mot de passe vide";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $errors[] = "le mot de passe et la répétition du mot de passe ne sont pas identiques";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $errors[] = "Le mot de passe doit comporter au moins 6 caractères ";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $errors[] = "Le nom d'utilisateur ne peut pas être inférieur à 2 ou supérieur à 64 caractères";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $errors[] = "Le nom d'utilisateur ne rentre pas dans le schéma de noms: seuls 2 et 64 caractères sont autorisés, de 2 à 64 caractères";
        } elseif (empty($_POST['user_email'])) {
            $errors[] = "L'email ne peut pas être vide";
        } elseif (strlen($_POST['user_email']) > 64) {
            $errors[] = "Le courrier électronique ne peut dépasser 64 caractères";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Votre adresse email n'est pas dans un format email valide";
        } elseif (
			!empty($_POST['user_name'])
			&& !empty($_POST['firstname'])
			&& !empty($_POST['lastname'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = mysqli_real_escape_string($con,(strip_tags($_POST["firstname"],ENT_QUOTES)));
				$lastname = mysqli_real_escape_string($con,(strip_tags($_POST["lastname"],ENT_QUOTES)));
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name"],ENT_QUOTES)));
                $user_email = mysqli_real_escape_string($con,(strip_tags($_POST["user_email"],ENT_QUOTES)));
				$user_password = $_POST['user_password_new'];
				$date_added=date("Y-m-d H:i:s");
                $session_id= session_id();


                $Majfirstname =strtoupper($firstname);  // mise en Majuscule du Nom user
                $Majlastname =strtoupper($lastname ); // mise en Majuscule du Prenom user

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
				$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
					
                // check if user or email address already exists
                $sql = "SELECT * FROM UTILISATEUR WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = mysqli_query($con,$sql);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = "Désolé, le nom d'utilisateur ou l'adresse e-mail est déjà utilisé.";
                } else {
					// write new user's data into database
                    $sql = "INSERT INTO UTILISATEUR (firstname, lastname, user_name, user_password_hash, user_email, date_added)
                            VALUES('".$Majfirstname."','".$Majlastname."','" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "','".$date_added."');";
                    $query_new_user_insert = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $messages[] = "Le compte a été créé avec succès.";
            
                    } else {
                        $errors[] = "Désolé, l'enregistrement a échoué, merci de revenir et d'essayer à nouveau.";
                    }
                }
            
        } else {
            $errors[] = "Une erreur inconnue est survenue.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Erreur !</strong> 
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