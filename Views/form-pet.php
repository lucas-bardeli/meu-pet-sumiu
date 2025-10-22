<?php

require_once "cabecalho.php";

?>
	<div class="content">
		<div class="container">
			<h1 style="margin-top: 60px; margin-bottom: 20px">Pet</h1>
			<form class="row g-3" action="#" method="post" enctype="multipart/form-data">
				<div class="col-md-4">
					<label for="nome" class="form-label">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome">
				</div>
				<div class="col-md-4">
					<label for="idade" class="form-label">Idade</label>
					<input type="text" class="form-control" id="idade" name="idade">
				</div>
				<div class="col-md-4">
					<label for="raca" class="form-label">Raça</label>
					<input type="text" class="form-control" id="raca" name="raca">
				</div>
				<div class="col-md-4">
					<label for="porte">Porte</label>
					<select class="form-control" id="porte" name="porte">
						<option value="0">Escolha o porte do pet</option>
						<option>Mini</option>
					</option>
						<option>Pequeno</option>
						</option>
						<option>Médio</option>
						</option>
						<option>Grande</option>
					</select>
				</div>
				<div class="col-md-4">
					<label for="local">Local</label>
					<input type="text" class="form-control" id="local" name="local">
				</div>
				<div class="col-md-4">
					<label for="data">Data</label>
					<input type="date" class="form-control" id="data" name="data">
				</div>
				<!-- Mensagens de erro para Porte, Local e Data -->
				<div class="col-md-4 text-danger">
					<?php echo $msg[0]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[1]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[2]; ?>
        </div>
				
				<div class="col-md-4">
					<label for="cor">Cor</label>
					<input type="text" class="form-control" id="cor" name="cor">
				</div>
				<div class="col-md-4">
					<label for="cor_olhos">Cor dos Olhos</label>
					<input type="text" class="form-control" id="cor_olhos" name="cor_olhos">
				</div>
				<div class="col-md-4">
					<label class="mx-3" for="situacao">Situação:</label>
					<input type="radio" name="situacao" value="Procurando o Pet">
					<label class="me-3">Procurando o Pet</label>
					<input type="radio" name="situacao" value="Procurando o Tutor">
					<label>Procurando o Tutor</label>
				</div>
				<!-- Mensagens de erro para Cor, Cor dos Olhos e Situação -->
				<div class="col-md-4 text-danger">
					<?php echo $msg[3]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[4]; ?>
        </div>
				<div class="col-md-4 text-danger">
					<?php echo $msg[5]; ?>
        </div>

				<div class="col-md-6">
					<label for="observacao">Observações:</label>
					<textarea class="form-control" id="observacao" rows="3" name="observacao"></textarea>
				</div>
				<div class="col-md-6">
					<label for="imagem">Imagem:</label>
					<input class="form-control" type="file" id="imagem" name="imagem" onchange="mostrar(this)">
				</div>
				<div style="color:red; font-size:11px;"><?php echo $msg[6]; ?></div>
				<img src="" id="img">
				
				<div><button type="submit" class="btn btn-primary">Enviar</button></div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script>
		function mostrar(img) {
			if (img.files && img.files[0]) {
				const reader = new FileReader();
				reader.onload = (el) => {
					$('#img')
					.attr('src', el.target.result)
					.width(170)
					.height(100);
				};
				reader.readAsDataURL(img.files[0]);
			}
		}
	</script>
</body>
</html>