<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_etudiant=intval($_GET['id']);
		$query=mysqli_query($con, "select * from  ETUDIANT where Id_Etud='".$id_etudiant."'");
		$count=mysqli_num_rows($query);

		if ($count){
			if ($delete1=mysqli_query($con,"DELETE FROM  ETUDIANT WHERE Id_Etud='".$id_etudiant."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			   <strong>Avis!</strong> Données supprimées avec succès.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Erreur!</strong> Je suis désolé que quelque chose à mal tourné.
			</div>
			<?php
			
		}
			
		} 
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('NomEtud','PrenomEtud','MatriculeEtud');//Columnas de busqueda  
		 $sTable = "ETUDIANT";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by Id_Etud asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './etudiant.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>N°</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Matricule</th>	
					<th>Sexe</th>
					<th>Niveau</th>
					<th>Date d'insertion</th>
					<th class='text-right'>Actions</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_etudiant=$row['Id_Etud'];
						$nom_etudiant=$row['NomEtud'];
						$prenom_etudiant=$row['PrenomEtud'];
						$matricule_etudiant=$row['MatriculeEtud'];

						$sexe_etudiant=$row['SexeEtud'];
						if ($sexe_etudiant==1){$sexe="Homme";}
						else if ($sexe_etudiant==2){$sexe="Femme";}

						$niveau_etudiant=$row['NiveauEtud'];
						if ($niveau_etudiant==1){$niveau="Année Préparatoire 1";}
						if ($niveau_etudiant==2){$niveau="Année Préparatoire 2";}
						if ($niveau_etudiant==3){$niveau="Ingénieur 1";}
						if ($niveau_etudiant==4){$niveau="Ingénieur 2";}
						else if($niveau_etudiant==5){$niveau="Ingénieur 3";}

						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
							<!-- RECUPERE DONNEES DANS LA BASE DE DONNEE PUIS AFFICHE DANS LE FORMULAIRE EDITER-->

					<input type="hidden" value="<?php echo $nom_etudiant;?>" id="NomEtud<?php echo $id_etudiant;?>">
					<input type="hidden" value="<?php echo $prenom_etudiant;?>" id="PrenomEtud<?php echo $id_etudiant;?>">
					<input type="hidden" value="<?php echo $matricule_Etudiant;?>" id="PrenomEtud<?php echo $id_etudiant;?>">
					<input type="hidden" value="<?php echo $sexe_etudiant;?>" id="SexeEtud<?php echo $id_etudiant;?>">
					<input type="hidden" value="<?php echo $niveau_etudiant;?>" id="NiveauEtud<?php echo $id_etudiant;?>">
					
					<tr>
						
						<td><?php echo $id_etudiant; ?></td>
						<td><?php echo $nom_etudiant; ?></td>
						<td><?php echo $prenom_etudiant;?></td>
						<td><?php echo $matricule_etudiant;?></td>
						<td><?php echo $sexe;?></td>
						<td><?php echo $niveau;?></td>
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editer etudiant' onclick="obtener_datos('<?php echo $id_etudiant;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='supprimer etudiant' onclick="eliminar('<?php echo $id_etudiant; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=11><span class="pull-right"> 
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>