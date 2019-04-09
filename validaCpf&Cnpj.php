<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var valor = $("#cnpj_cpf_doc").val().replace(/[._/-]/g, '');

		if(valor.length == 11){
			if (valor.length != 11 || valor == "00000000000" || valor == "11111111111" || valor == "22222222222" || valor == "33333333333" || valor == "44444444444" || valor == "55555555555" || valor == "66666666666" || valor == "77777777777" || valor == "88888888888" || valor == "99999999999")
			control = false;

			add = 0;
			for (i=0; i < 9; i ++)
				add += parseInt(valor.charAt(i)) * (10 - i);

			rev = 11 - (add % 11);
			if (rev == 10 || rev == 11)
				rev = 0;

			if (rev != parseInt(valor.charAt(9)))
				control = false;

			add = 0;
			for (i = 0; i < 10; i ++)
				add += parseInt(valor.charAt(i)) * (11 - i);

			rev = 11 - (add % 11);
			if (rev == 10 || rev == 11)
				rev = 0;
			if (rev != parseInt(valor.charAt(10)))
				control = false;

			if(!control)
				alert('CPF não é válido!');
		}else if(valor.length == 14){
			if(valor == '')
				control = false;

			if (valor.length != 14)
				control = false;

			// Elimina CNPJs invalidos conhecidos
			if (valor == "00000000000000" || 
				valor == "11111111111111" || 
				valor == "22222222222222" || 
				valor == "33333333333333" || 
				valor == "44444444444444" || 
				valor == "55555555555555" || 
				valor == "66666666666666" || 
				valor == "77777777777777" || 
				valor == "88888888888888" || 
				valor == "99999999999999")
				control = false;

			// Valida DVs
			tamanho = valor.length - 2
			numeros = valor.substring(0,tamanho);
			digitos = valor.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0))
				control = false;

			tamanho = tamanho + 1;
			numeros = valor.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1))
				  control = false;

			if(!control)
				alert('CNPJ não é válido!');

		}else if(valor.length != 11 && valor.length != 14){
			alert("Preencha corretamente o campo de CNPJ/CPF!");
			control = false;
		}		
	</script>
</head>
<body>

</body>
</html>
