		

		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/chercher_etudiant.php?action=ajax&page='+page+'&q='+q,
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
        url: "./ajax/chercher_etudiant.php",
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
			
	
$( "#ajouter_etudiant" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nouveau_etudiant.php",
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

$( "#editer_etudiant" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editer_etudiant.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Message: Chargement...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			effacer ();
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){

			
			var Nom_Etudiant = $("#NomEtud"+id).val();
			var Prenom_Etudiant = $("#PrenomEtud"+id).val();
			var Matricule_Etudiant = $("#MatriculeEtud"+id).val();
			var Sexe_Etudiant	 = $("#SexeEtud"+id).val();
			var Niveau_Etudiant = $("#NiveauEtud"+id).val();
			
			$("#mod_Nom_Etudiant").val(Nom_Etudiant);
			$("#mod_Prenom_Etudiant").val(Prenom_Etudiant);
			$("#mod_Matricule_Etudiant").val(Matricule_Etudiant);
			$("#mod_Sexe_Etudiant").val(Sexe_Etudiant);
			$("#mod_Niveau_Etudiant").val(Niveau_Etudiant);
			$("#mod_id").val(id);
		
		}

function effacer () {
		  $(':input','#editer_etudiant','#ajouter_etudiant')
		   .not(':button, :submit, :reset, :hidden')
		   .val('')
		   .removeAttr('checked')
		   .removeAttr('selected');
		}

		function effacer2() {
  document.getElementById("ajouter_etudiant").reset();
}
		
		

