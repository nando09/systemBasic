<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
	<title>Chat</title>
</head>
<body>
	<div id="conteudo">
		<div id="caixa-chat">
			<div id="chat">
				<div id="dados-chat">
					<span>Hugo:	</span>
					<span>Texto Mensagem:	</span>
					<span>Hora:	</span>
				</div>
			</div>
		</div>

		<form method="POST" action="index.php">
			<input type="text" name="nome" placeholder="Preencha o nome">
			<textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</div>

</body>
</html>