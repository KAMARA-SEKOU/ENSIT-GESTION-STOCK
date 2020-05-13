		

		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/chercher_commande.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Chargement...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			}) 
		}
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Vous voulez vraiment supprimer l'utilisateur")){	
		$.ajax({
        type: "GET",
        url: "./ajax/chercher_commande.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Message: Chargement en cours ...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
			
	
$( "#nouveau_commande" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nouveau_commande.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Message: Chargement...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
			effacer();
		  }
	});
  event.preventDefault();
})

$( "#editer_commande" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editer_commande.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Message: Chargement...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			effacer();
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){

			
			var FournisseurCom = $("#fournisseur_FK"+id).val();
			var ProduitCom = $("#produitCom"+id).val();
			var QuantiteCom	 = $("#quantiteCom"+id).val();
			
			$("#mod_fournisseurCom").val(FournisseurCom);
			$("#mod_produitCom").val(ProduitCom);
			$("#mod_quantiteCom").val(QuantiteCom);
			$("#mod_id").val(id);
		
		}

function effacer() {
		  $(':input','#editer_commande','#ajouter_commande')
		   .not(':button, :submit, :reset, :hidden')
		   .val('')
		   .removeAttr('checked')
		   .removeAttr('selected');
		}

		
		

