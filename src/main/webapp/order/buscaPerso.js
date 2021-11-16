$(function(){ 
	//pesquisa
	$("#pesquisa").keyup(function(){
		
		var pesquisa = $(this).val();
		
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('pesquisaPerso.php', dados, function(retorna){
				$(".table table-striped").html(retorna);
			});
		}else{
			$(".table table-striped").html('');
		}
		
	
	});
	
});