<?php
	define('Version', time());
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head> 
		<title>CONTAGEM DE PEÇAS</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Language" content="pt" />
		<link href="lib/css/bootstrap.min.css?v=<?php echo Version; ?>" rel="stylesheet">
		<link href="lib/fonts/Glory.css?family=Glory:wght@100&display=swap?v=<?php echo Version; ?>" rel="stylesheet">
		<link href="lib/css/mj_app001.css?v=<?php echo Version; ?>" rel="stylesheet">
		<link rel="icon" href="lib/imagens/microjuntas.ico" type="image/x-icon">
		<link rel="shortcut icon" href="lib/imagens/microjuntas.ico" type="image/x-icon" />

		<style>
			.h2_app003 {
				font-size: 22px;
				font-weight: bold;
				/**min-width: 253px;**/
			}

			.h6_app003 {
				font-size: 26px;
				font-weight: bold;
				min-width: 253px;
				/**text-align: right;**/
			}

			.section_02 > .col-sm-offset-1{
				flex-direction: column;
				align-items: center;
    			vertical-align: middle;
				display: flex; 
				margin: 0 !important;
			}

			div.col-sm-offset-1 > .h6_app003{
				text-align: right;
				min-width: 411px;
				position: relative;
    			right: 80px;
				color: black;
			}
			.h2_app003 {
				font-size: 16px;
				font-weight: bold;
				/**min-width: 253px;**/
			}
		
		</style>
	</head>
<body>

	<!-- Processo de Entrada ou Saída (PRIMEIRA TELA) -->
	<nav class="nav">
		<img src="lib/imagens/logo_protheus.png" height="20px" width="20px"> 
		<h5 class="h5">Contagem de Peças</h5>
	</nav>
	<center> 
		<h2 class="h2">Contagem de Peças</h2><br>
	</center><br />


	<div class="container">

	<div class="row section_01">

		<div class="col-sm-offset-1">

			<div class="col-sm-2 col-sm-4" controlAlign">
				<label for="qtd_amostras"><h2 class="h2_app003">QTD AMOSTRAS:</h2></label>
			</div>
			<div class="col-sm-3 col-sm-4" controllAlign">
				<input type="number" value="0" maxlength="3" class="form-control controlInput" id="qtd_amostras" name="qtd_amostras">
			</div>
			<div class="col-sm-2 col-sm-4" controlAlign">
			<label for="peso_amostras"><h2 class="h2_app003">PESO QTD AMOSTRAS:</h2></label>
			</div>
			<div class="col-sm-3 col-sm-4" controllAlign">
				<input type="nmber" maxlength="6" value="0" class="form-control controlInput" id="peso_amostras" name="peso_amostras">
		</div>
	</div>	
</div>	

		<hr class="hr_app003"/>
		
		<div class="row section_02">

			<div class="col-sm-offset-1">
				<h6 class=" h6_app003 col-sm-4">
					PESO LÍQUIDO: <i class="readEtiq" id="readEEtiq">0.000</i>
				</h6>
				
				<br />

				<h6 class=" h6_app003 col-sm-4">
					QUANTIDADE DE PEÇAS: <i class="readEtiq" id="readEEtiq">0</i>
				</h6>
			</div>
		</div>
	</div>

	<div class="step-container container-width">
		<div class="step-container-head bg-blue-3"></div>
		<div class="step-container-body"></div>
	</div>
	<script src="lib/js/jquery.min.js?v=<?php echo Version; ?>"></script>
	<script src="lib/js/bootstrap.min.js?v=<?php echo Version; ?>"></script>	 

</body>
</html>