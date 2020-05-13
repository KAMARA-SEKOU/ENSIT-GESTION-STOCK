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
		$id_commande=intval($_GET['id']);
		$query=mysqli_query($con, "select * from  COMMANDE where ID_Com='".$id_commande."'");
		$count=mysqli_num_rows($query);

		if ($count){
			if ($delete1=mysqli_query($con,"DELETE FROM  COMMANDE WHERE ID_Com ='".$id_commande."' ")){
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
			  <strong>Erreur!</strong>  Impossible de supprimer car le login toujours existant.
			</div>
			<?php
			
		}
			
		} 	
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));

		  $sTable = "FOURNISSEUR,UTILISATEUR,COMMANDE"; // ici l'ordre de positionnement des tables a une consequence
		
		  $sWhere.=" WHERE COMMANDE.fournisseur_FK = FOURNISSEUR.ID_Fournisseur AND COMMANDE.utilisateur_FK = UTILISATEUR.user_id";

		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and  (
						   COMMANDE.produitCom like '%$q%' 
						or FOURNISSEUR.EntrepriseFour like '%$q%'
						or UTILISATEUR.firstname like '%$q%'
						or UTILISATEUR.lastname like '%$q%'
					)";
		}
		
		$sWhere.=" order by COMMANDE.date_added asc";
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
		$reload = './commandes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>N°</th>
					<th>Fournisseur</th>
					<th>Produit</th>
					<th>Quantite</th>
					<th>Login</th>
					<th>Date commande</th>
					<th class='text-right'>Actions</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_commande=$row['ID_Com'];
						$fournisseur=$row['EntrepriseFour'];
						$produit=$row['produitCom'];
						$quantite=$row['quantiteCom'];
						$login=$row['firstname']." ".$row['lastname'];
						$date=date("d/m/Y", strtotime($row['date_added']));
						
					?>
							<!-- RECUPERE DONNEES DANS LA BASE DE DONNEE PUIS AFFICHE DANS LE FORMULAIRE EDITER-->

					<input type="hidden" value="<?php echo $fournisseur;?>" id="fournisseur_FK<?php echo $id_commande;?>">
					<input type="hidden" value="<?php echo $produit;?>" id="produitCom<?php echo $id_commande;?>">
					<input type="hidden" value="<?php echo $quantite;?>" id="quantiteCom<?php echo $id_commande;?>">


					<tr>
						<td><?php echo $id_commande; ?></td>
						<td><?php echo $fournisseur; ?></td>
						<td><?php echo $produit; ?></td>
						<td><?php echo $quantite; ?></td>
						<td><?php echo $login; ?></td>
						<td><?php echo $date; ?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editer commande' onclick="obtener_datos('<?php echo $id_commande;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='supprimer commande' onclick="eliminar('<?php echo $id_commande; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
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