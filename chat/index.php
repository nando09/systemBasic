<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.css" rel="stylesheet">
	<link type="text/css" href="/System/systemBasic/css/chat.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="logar.php" method="post" class="form-width">
				<input type="hidden" name="env-mensagem">
				<div class="form-group">
					<label for="exampleInputPassword1">Mensagem</label>
					<textarea class="form-control" id="exampleInputPassword1"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Entrar</button>
			</form>
		</div>
	</div>
</body>
</html>