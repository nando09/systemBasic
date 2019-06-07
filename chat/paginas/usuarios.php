<div id="content">
	<table class="table">
		<tbody>
<?php

	$query = "SELECT * FROM usuario";
	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->execute();
	$user = $stmt->fetchAll();

	foreach ($user as $key) :
		$nome = $key['nome'];
		$usuario = $key['id'];

?>
			<tr>
				<td><b><?= $nome ?></b></td>
				<td><a href="?pagina=chat&usuario=<?= $usuario; ?>" class="btn btn-info">Iniciar</a></td>
			</tr>
<?php
	endforeach;
?>
		</tbody>
	</table>
</div>