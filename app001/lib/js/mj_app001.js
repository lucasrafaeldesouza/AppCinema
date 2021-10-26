const _url = 'http://192.168.0.20:8084/rest/WSMJ104';
const formE = $("#entradaMassa");
const formS = $("#saidaMassa");
const readEEtiq = $("#readEEtiq");
const responseEntrada = $("#responseEntrada");
const wait = $('.wait');
const waitMsg = $('.waitMsg');
const readSEtiq = $("#readSEtiq");
const responseSaida = $("#responseSaida");


//==============MODAL=================================
$(function(){
	$('#entrada').on('shown.bs.modal', function () {
	//$('#myInput').focus()
	});
});

//==============FUNÇÕES================================
function Submit(xtpmv,event) {
	
	var tpvm = xtpmv;
	var codeti = tpvm ==  'E' ? $("#CODETIE").val() :  $("#CODETIS").val();
	var xCampo = tpvm ==  'E' ? document.getElementById("CODETIE") : document.getElementById("CODETIS");	
	var regex = new RegExp("^[a-zA-Z0-9._\b]+$");
	var str = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	


	var dados = {
		CODETI: codeti,
		TPMV: tpvm,
		FILIAL: '01',
		EMPRESA: '01',
		CONFVALID: ''
	}

	//if (regex.test(str)  ) {
		if(codeti.length == 6){

			$.ajax({ // create an AJAX call...
				url: _url,
				data: JSON.stringify(dados),
				type: 'post',
				dataType: 'json',
				contentType: 'application/json',
				beforeSend: function() { 
				
					waitMsg.html("Aguarde, processando...");
					wait.show(); 
				},
				complete: function () {
					ResetScreen(tpvm);
				}
			})
			.done(function(response){
				 if(tpvm == 'E'){	
					 				
					readEEtiq.html(response.errorMessage);
					responseEntrada.addClass("green");
					responseEntrada.html("Processo registrado com sucesso! ");
					responseEntrada.empty().delay(5000);
					waitMsg.html("Concluído...");
					wait.show();
					//ResetScreen(tpvm);
				
				} else if(tpvm == 'S') {
					console.log('S: ' + tpvm);
					readSEtiq.html(response.errorMessage);
					responseSaida.addClass( "green" );
					responseSaida.html("Processo registrado com sucesso! ");
					responseSaida.empty().delay(5000);
					waitMsg.html("Concluído...");
					wait.show();					
					//ResetScreen(tpvm);
				}
			})
			.fail(function(jqXHR, textStatus, errorThrown){
				var msg = JSON.parse (jqXHR.responseText);
				console.log(msg.errorMessage);
		
				if(tpvm == 'E'){
					//$('#readEtiq').html(codeti);
					responseEntrada.removeClass("green")
					responseEntrada.addClass("red");
					responseEntrada.html(msg.errorMessage);
					//responseEntrada.delay(5000).empty();
					waitMsg.html("Erro no processamento de entrada...");
					wait.show();
					//ResetScreen(tpvm);
				} else if(tpvm == 'S') {
					//readSEtiq.html(codeti);
					responseSaida.removeClass("green")
					responseSaida.addClass("red");
					responseSaida.html(msg.errorMessage);
					responseSaida.empty().delay(5000);	
					waitMsg.html("Erro no processamento de saída...");
					wait.show();					
					//ResetScreen(tpvm);
				}
			});	
		}
	//	return true;
	//}else{
	//	event.preventDefault();
	//	xCampo.value = "";
	//	return false;
	//}
	
}

function ResetScreen(xtpmv){
	var tpvm = xtpmv;
	
	wait.hide();
	waitMsg.empty();
	
	if(tpvm == 'E'){
		formE.trigger("reset");
	} else if(tpvm == 'S') {
		formS.trigger("reset");
	}
	
}

	//Ativação do focus no input 
	$('#entrada').on('shown.bs.modal', function(event) {
	$("#CODETIE").focus();
	})

	$('#saida').on('shown.bs.modal', function(event) {
	$("#CODETIS").focus();
	})