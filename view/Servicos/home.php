<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Serviços</h1>
<div class="container clear-bolt">
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Adicionar novo usuario</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
		</div>
	</div>
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Adicionar tipos de acessos</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
		</div>
	</div>
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Apagar projetos</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-danger btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-example-modal-xl">VER</button>
		</div>
	</div>
</div>

<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="title-pag">Novo cliente</h1>
				<div id="novo-elemento">
					<div class="row">
						<div class="form-group col-md-4">
							<label>NOME <span class="obrigatorio"> *</span></label>
							<input id="nome" type="text" class="form-control">
						</div>
						<div class="form-group col-md-4" id="categoria">
							<label>EMPRESA</label>
							<input id="empresa" type="text" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label>CNPJ</label>
							<input id="cnpj" type="text" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label>TELEFONE <span class="obrigatorio"> *</span></label>
							<input id="telefone" class="form-control" rows="3" maxlength="20">
						</div>
						<div class="form-group col-md-8">
							<label>EMAIL</label>
							<input id="email" type="text" class="form-control">
						</div>
						<div id="cep-busca" class="form-group col-md-2">
							<label>CEP</label>
							<input id="cep" class="form-control" type="text" name="cep" placeholder="Buscar por CEP">
						</div>
						<div class="form-group col-sm-2">
							<label>Estado: </label>
							<select name="estado" id="estado" class="form-control">
								<option value="">--</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AP">AP</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS">RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Cidade: </label>
							<input type="text" class="form-control" name="Cidade" id="cidade" placeholder="Cidade">
						</div>
						<div class="form-group col-sm-4">
							<label>Bairro: </label>
							<input type="text" class="form-control" name="Bairro" id="bairro" placeholder="Bairro">
						</div>
						<div class="form-group col-sm-10">
							<label>Rua: </label>
							<input type="text" class="form-control" name="Rua" id="rua" placeholder="Rua">
						</div>
						<div class="form-group col-sm-2">
							<label>Numero: </label>
							<input type="text" class="form-control" name="Numero" id="numero" placeholder="N°">
						</div>
					</div>
					<button id="salvar-cliente" type="button" class="btn btn-primary">SALVAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'view/patterns/footer.php' ?>
