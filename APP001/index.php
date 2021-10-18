<!--
$logo_smartClient = sc_url_library("prj", "app001", "imagens/logo_protheus.png");
$mj_css = sc_url_library("prj", "app001", "css/mj_app001.css");
$mj_js = sc_url_library("prj", "app001", "js/mj_app001.js");
-->

<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <title>Massas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@100&display=swap" rel="stylesheet">
	<link href="lib/css/mj_app001.css" rel="stylesheet">

</head>
<body>

<!-- Processo de Entrada ou Saída (PRIMEIRA TELA) -->

<nav class="nav">
	<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
	<h5 class="h5">Almoxarifado de Massas</h5>
</nav>


<center> 
	<h2 class="h2">Almoxarifado de Massas</h2><br>
	<p id="wait">Aguarde, processando</p>
</center><br />

<center> 
	<div class="container">
		<button type="button" class="btn btn-light botao" data-toggle="modal" data-target="#entrada">Entrada</button>
		<button type="button" class="btn btn-light botao" data-toggle="modal" data-target="#saida">Saída</button>
	</div>
</center>
<!--
<center> 
	<div class="container">
		<button type="button" class="btn btn-light sair">Sair</button>     
	</div>
</center>
-->
<div class="step-container container-width">
	<div class="step-container-head bg-blue-3">
		
	</div>
	<div class="step-container-body">
		
	</div>
</div>

<input type="hidden" id="hidden">

<div class="modal fade" id="entrada" tabindex="-1" role="dialog" aria-labelledby="entradaLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<!--Processo de Entrada-->
		
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
				<nav class="nav">
					<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
					<h5 class="h5">Almoxarifado de Massas</h5>
				</nav>
			
				<center> 
					<h2 class="h2">Almoxarifado de Massas - ENTRADA</h2><br />
				</center><br />   
				<div class="container">
					<div class="row">
						<div class="col-2"></div>
						<form id="entradaMassa" name="entradaMassa">
							<div class="barra"> 
								<div class="col-md-4">
									<h2>Código Etiqueta:</h2>
								</div>
						
								<div class="col-md-4 ">
									<input type="text" class="form-control inputCodEtiq" id="CODETIE" name="CODETIE" onchange="Submit('E')">
								</div>

							</div>
							<div class="row"> 
								<h6 class="h6">Leitura: <i id="readEEtiq"></i></h6>
							</div>
							<h2 class="response" id="responseEntrada"></h2>
						</form>
						
						<center> 
							<div class="ButtomClose">
								<button type="button" class=" btn btn-light sair " data-dismiss="modal">Sair</button>     
							</div>
						</center>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Processo de Saída -->
<div class="modal fade" id="saida" tabindex="-1" role="dialog" aria-labelledby="entradaLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
				<nav class="nav">
					<img src="<?php echo $logo_smartClient;?>" height="20px" width="20px"> 
					<h5 class="h5">Almoxarifado de Massas</h5>
				</nav>
			
				<center> 
					<h2 class="h2">Almoxarifado de Massas - SAÍDA</h2><br />
				</center><br />   
				<div class="container">
					<div class="row">
						<div class="col-2"></div>
						<form id="saidaMassa" name="saidaMassa">
							<div class="barra"> 
								<div class="col-md-4">
									<h2>Código Etiqueta:</h2>
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control inputCodEtiq" id="CODETIS" name="CODETIS" onchange="Submit('S')">
								</div>
							</div>
							<div class="row"> 
								<h6 class="h6">Leitura: <i id="readSEtiq"></i></h6>
							</div><br /> 
							<h2 class="response" id="responseSaida"></h2>
						</form>
						
						<center> 
							<div class="ButtomClose">
								<button type="button" class=" btn btn-light sair " data-dismiss="modal">Sair</button>     
							</div>
						</center>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	 
<script src="lib/css/mj_app001.js"></script>

</body>
</html>
