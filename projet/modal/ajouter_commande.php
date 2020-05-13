	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Ajouter Commande</h4>
		  </div>

		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="nouveau_commande" name="nouveau_commande">
			<div id="resultados_ajax"></div>


			  <div class="form-group">
				<label for="fournisseur_FK" class="col-sm-3 control-label">Fournisseur</label>
				<div class="col-sm-8">
				  
					<select class="form-control input-sm" id="fournisseur_FK" name="fournisseur_FK">
						<option value="0" selected="selected">-- Selection Fournisseur --</option>

									<?php
										$sql_vendedor=mysqli_query($con,"select * from FOURNISSEUR order by EntrepriseFour");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											    $id_vendedor=$rw["ID_Fournisseur"];
												$nombre_vendedor=$rw["EntrepriseFour"];
											?>
											<option value="<?php echo $id_vendedor?>"> <?php echo $nombre_vendedor?></option>
											<?php
										}
									?>

								</select>

				</div>

			  </div>


			  <div class="form-group">
				<label for="produitCom" class="col-sm-3 control-label">Produit</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="produitCom" name="produitCom" pattern="[a-zA-Z0-9 ]+" {3,14}
				  title="Veuillez inserer un mot de 3 à 14 caractères"placeholder="Produit " required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="quantiteCom" class="col-sm-3 control-label">Quantité</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="quantiteCom" name="quantiteCom" placeholder="Quantité" 
				  pattern="^\d{2,6}$" title="Veuillez inserer une nombre de 10 à 1000 " required>
				</div>

			  </div>

			
		  </div>
		  <div class="modal-footer">
		  	
			<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Sauvergarder</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>