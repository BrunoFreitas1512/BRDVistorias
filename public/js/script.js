$(document).ready(function() {
	$("#cep").mask("00000-000", { placeholder: "_____-___" });
	
	$(".botaolimpar").on("click", function() {
		$("#txtCidade").val(""), $("#txtEstado").val(""), $("#txtBairro").val(""), $("#txtRua").val(""), $("#txtNumero").val(""), 
		$("#cep").val(""), $("#identLoja").val(""), $("#nomePropri").val("")
	});
	$(".botao-limpar").on("click", function() {
		$("#pergunta").val("")
	});

	$("#cep").on("change", function() {
		var cep = $(this).cleanVal();
		if (cep.length == 8) {
            var url = "https://viacep.com.br/ws/" + cep + "/json/ ";
            
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success: function(data) {
					$("#txtCidade").val(data.localidade);
                    $("#txtEstado").val(data.uf);
                    $("#txtBairro").val(data.bairro);
                    $("#txtRua").val(data.logradouro);
                }
			});
		}
	});
	
});