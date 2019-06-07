<div id="content">
	<div class="lista">
		
	</div>
	<hr>
	<form id="form-chat" action="" method="post" enctype="multipart/form-data">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem..." class="form-control">
				<span class="input-group-btn">
					<input type="submit" value="&rang; &rang;" class="btn btn-success">
					<input type="hidden" name="env" value="envMsg">
				</span>
			</div>
		</div>
	</form>
	<?php
		if (isset($_POST['env']) == 'envMsg') {
			$mensagem = $_POST['mensagem'];
			$id_para = $_GET['usuario'];
			$id_de = $_SESSION['id'];

			if (empty($mensagem)) {
				echo "<code>Digite sua mensagem!</code>";
			}else{
				$query = "INSERT INTO mensagem (id_de, id_para, mensagem) VALUES (:de, :para, :mensagem)";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				if ($stmt->execute(array(':de' => $id_de, ':para' => $id_para, ':mensagem' => $mensagem))){
					echo "Mensagem enviada!";
				}else{
					echo "<code>Erro ao enviar mensagem!</code>";
				}
			}
		}
	?>
</div>
