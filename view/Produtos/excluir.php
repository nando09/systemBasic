<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	$query = "DELETE FROM PRODUTO WHERE ID = " . $view_dados[0];

	$db->query($query);

	// // Desenvolvido para percorrer o array e excluir todos os arquivos enviado por separação de "| popappi"
	// foreach ($view_dados as $key) {
	// 	echo $key;
	// }
?>
<script type="text/javascript">
	window.location.replace("http://localhost/System/systemBasic/Produtos");
</script>