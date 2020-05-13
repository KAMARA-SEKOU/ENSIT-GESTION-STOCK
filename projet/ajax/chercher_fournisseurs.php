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
		$id_fournisseur=intval($_GET['id']);
		$query=mysqli_query($con, "select * from FOURNISSEUR where ID_Fournisseur='".$id_fournisseur."'");
		$count=mysqli_num_rows($query);

		if ($count){
			if ($delete1=mysqli_query($con,"DELETE FROM FOURNISSEUR WHERE ID_Fournisseur='".$id_fournisseur."'")){
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
		 $aColumns = array('EntrepriseFour','TelFour');//Columnas de busqueda
		 $sTable = "FOURNISSEUR";
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
		$sWhere.=" order by ID_Fournisseur asc";
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
		$reload = './fournisseurs.php';
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
					<th>Entreprise</th>
					<th>Adresse</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Date d'insertion</th>
					<th class='text-right'>Actions</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_fournisseur=$row['ID_Fournisseur'];
						$entreprise_fournisseur=$row['EntrepriseFour'];
						$adresse_fournisseur=$row['AdresseFour'];
						$email_fournisseur=$row['EmailFour'];
						$tel_fournisseur=$row['TelFour'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					<input type="hidden" value="<?php echo $entreprise_fournisseur;?>" id="EntrepriseFour<?php echo $id_fournisseur;?>">
					<input type="hidden" value="<?php echo $adresse_fournisseur;?>" id="AdresseFour<?php echo $id_fournisseur;?>">
					<input type="hidden" value="<?php echo $email_fournisseur;?>" id="EmailFour<?php echo $id_fournisseur;?>">
					<input type="hidden" value="<?php echo $tel_fournisseur;?>" id="TelFour<?php echo $id_fournisseur;?>">
					
					<tr>
						
						<td><?php echo $id_fournisseur; ?></td>
						<td><?php echo $entreprise_fournisseur; ?></td>
						<td><?php echo $adresse_fournisseur;?></td>
						<td><?php echo $email_fournisseur;?></td>
						<td><?php echo $tel_fournisseur;?></td>
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $id_fournisseur;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id_fournisseur; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
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