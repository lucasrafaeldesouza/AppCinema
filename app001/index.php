<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <title>Massas</title>
	<link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/fonts/Glory.css?family=Glory:wght@100&display=swap" rel="stylesheet">
	<link href="lib/css/mj_app001.css" rel="stylesheet">
	<link rel="icon" href="lib/imagens/microjuntas.ico" type="image/x-icon">
	<link rel="shortcut icon" href="lib/imagens/microjuntas.ico" type="image/x-icon" />
</head>
<body>

	<!-- Processo de Entrada ou Saída (PRIMEIRA TELA) -->
	<nav class="nav">
		<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
		<h5 class="h5">Almoxarifado de Massas</h5>
	</nav>
	<center> 
		<h2 class="h2">Almoxarifado de Massas</h2><br>
	</center><br />

	<center> 
		<div class="container">
			<button onclick="FocusInput('E', event)" autofocus="autofocus" type="button" class="btn btn-light botao" data-toggle="modal" data-target="#entrada">Entrada</button>
			<button onclick="FocusInput('S', event)" type="button" class="btn btn-light botao" data-toggle="modal" data-target="#saida">Saída</button>
		</div>
	</center>

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
					<button onclick="ResetScreen('E')" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				
					<nav class="nav">
						<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
						<h5 class="h5">Almoxarifado de Massas</h5>
					</nav>
					
					<center> 
						<h2 class="h2">Almoxarifado de Massas - ENTRADA</h2><br />
						<div class="wait">
							<h3 class="waitMsg"></h3>	
						</div>
					</center><br />  
						
					<div class="container">
						<div class="row">
							<div class="col-12"> 
								<form id="entradaMassa" name="entradaMassa">
									<div class="barra"> 
										<div class="col-md-4">
											<h2>Código Etiqueta:</h2>
										</div>
										<div class="col-md-4 ">
											<input type="text" maxlength="6" class="form-control inputCodEtiq" id="CODETIE" name="CODETIE" onkeyup="Submit('E',event)">
										</div>
									</div>
									<div class="row"> 
										<h6 class="h6">Leitura: <i id="readEEtiq"></i></h6>
									</div>
									<div class="row">
										<div class="col-xs-6 col-md-3"></div>
										<div class="col-xs-6 col-md-3">									
											<button onclick="ResetScreen('E')" type="button" class=" btn btn-light sair " data-dismiss="modal">Sair</button>
										 </div>
										<div class="col-xs-6 col-md-3"></div>	
									</div>
									<h2 class="response" id="responseEntrada"></h2>									
								</form>
							</div>
						</div>			 	
					</div>
				</div>
			</div>	
		</div>
	</div>	

	<div class="modal fade" id="saida" tabindex="-1" role="dialog" aria-labelledby="entradaLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<!--Processo de Saída-->
				<div class="modal-body">
					<button onclick="ResetScreen('S')" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					<nav class="nav">
						<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
						<h5 class="h5">Almoxarifado de Massas</h5>
					</nav>
					<center> 
						<h2 class="h2">Almoxarifado de Massas - SAÍDA</h2><br />
						<div class="wait">
							<h3 class="waitMsg"></h3>	
						</div>
					</center><br />  
								
					<div class="container">
						<div class="row">
							<div class="col-12"> 
								<form id="saidaMassa" name="saidaMassa">
									<div class="barra"> 
										<div class="col-md-4">
											<h3>Código Etiqueta:</h3>
										</div>
								
										<div class="col-md-4 ">
											<input type="text" maxlength="6" class="form-control inputCodEtiq" id="CODETIS" name="CODETIS" onkeyup="Submit('S',event)">
										</div>
									</div>
									<div class="row"> 
										<h6 class="h6">Leitura: <i id="readEEtiq"></i></h6>
									</div>
									<div class="row">
										<div class="col-xs-6 col-md-3"></div>
										<div class="col-xs-6 col-md-3">									
											<button onclick="ResetScreen('S')" type="button" class=" btn btn-light sair " data-dismiss="modal">Sair</button>
										 </div>
										<div class="col-xs-6 col-md-3"></div>	
									</div>
									<h2 class="response" id="responseSaida"></h2>	
								</form>
							</div>
						 </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="lib/js/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="lib/js/bootstrap.min.js"></script>	 
	<script src="lib/js/mj_app001.js"></script>

</body>
</html>