	<?php

	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
		if (isset($_GET['ID_Com']))
	{
		$id_factura=intval($_GET['ID_Com']);
		$sql_factura=mysqli_query($con,"select fournisseur_FK from Commande,Fournisseur WHERE Commande.fournisseur_FK=Fournisseur.ID_Fournisseur
		 and ID_Com='".$id_factura."'");
		$count=mysqli_num_rows($sql_factura);
		if ($count==1)
		{
				$id_vendedor_db=$rw_factura['id_vendedor'];
				
		}	
		else
		{
			header("location: index.php");
			exit;	
		}
	}

?>

	<?php 
		if (isset($con))
		{
	?>

	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editer Commande</h4>
		  </div>
		  <div class="modal-body">

			<form class="form-horizontal" method="post" id="editer_commande" name="editer_commande">
			<div id="resultados_ajax2"></div>

			  

			<div class="form-group">
				<label for="mod_fournisseurCom" class="col-sm-3 control-label">Fournisseur</label>
				<input type="hidden" name="mod_id" id="mod_id">
				<div class="col-sm-8">

								<select class="form-control input-sm" id="mod_fournisseurCom" name="mod_fournisseurCom">
									
									<?php
										$sql_vendedor=mysqli_query($con,"select * from Fournisseur order by EntrepriseFour");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["ID_Fournisseur"];
											$nombre_vendedor=$rw["EntrepriseFour"];
											if ($id_vendedor==$id_vendedor_db){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>

								</select>
				</div>
			  </div>


			   <div class="form-group">
				<label for="mod_produitCom" class="col-sm-3 control-label">Produit</label>
				<div class="col-sm-8">
				   <input type="text" class="form-control" id="mod_produitCom" name="mod_produitCom" pattern="[[a-zA-Z0-9\s]+"{3,12} 
				  title="Veuillez inserer un mot de 3 à 12 caractères" placeholder="Produit " required>
				</div>
			  </div>	


			  <div class="form-group">
				<label for="mod_quantiteCom" class="col-sm-3 control-label">Quantité</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_quantiteCom" name="mod_quantiteCom" placeholder="Quantité" 
				  pattern="^\d{2,6}$" title="Veuillez inserer une nombre de 10 à 1000 " required>
				</div>
			  </div>	
		



		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" onclick='effacer()';>Initialiser</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos" >Mise à Jour</button>
		  </div>

		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>