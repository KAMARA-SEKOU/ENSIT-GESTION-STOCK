		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_usuarios.php?action=ajax&page='+page+'&q='+q,
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
        url: "./ajax/buscar_usuarios.php",
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
		
		
		
		

