//PRD
const _url = 'http://192.168.0.4:8083/rest/APP001';
//TST
//const _url = 'http://192.168.0.20:8084/rest/APP001';
const readEEtiq = $("#readEEtiq");
const readSEtiq = $("#readSEtiq");
const responseEntrada = $("#responseEntrada");
const responseSaida = $("#responseSaida");
const wait = $('.wait');
const waitMsg = $('.waitMsg');
var modalE = $('#entrada');
var modalS = $('#saida');
var dados = {};
var codeti;
var tpvm;

//==============MODAL=================================
$(function(){
	$('#entrada').on('shown.bs.modal', function () {
	//$('#myInput').focus()
	});
});

//==============FUNÇÕES================================
function Submit(xtpmv,event) {
	
	
	tpvm = xtpmv;
	codeti = tpvm ==  'E' ? $("#CODETIE").val() : $("#CODETIS").val();
	var xCampo = tpvm ==  'E' ? document.getElementById("CODETIE") : document.getElementById("CODETIS");	
		
	event.preventDefault();
	
	xCampo.style.textTransform = "uppercase";
	
	if(tpvm == 'E'){
		readEEtiq.html(codeti);
	} else if(tpvm == 'S') {
		readSEtiq.html(codeti);
	}
	
	dados = {
		CODETI: codeti,
		TPMV: tpvm,
		FILIAL: '01',
		EMPRESA: '01',
		CONFVALID: false
	}
	
	if(tpvm == 'S' && codeti.length == 6){
		dados.CONFVALID = true;
		DtVal(_url, dados);
	}else if(tpvm == 'E' && codeti.length == 6){
		SendData(_url, dados);
	}		
	
}

function ResetScreen(xtpmv){
	var tpvm = xtpmv;
	
	wait.hide();
	waitMsg.empty();
	
	if(tpvm == 'E'){
		$('input[name=CODETIE').val('');
	} else if(tpvm == 'S') {
		$('input[name=CODETIS').val('');
	}
	
	localStorage.removeItem(codeti);
	//localStorage.clear();
	
}

function DtVal(_url, dados){
	var yesno;
	var obj = {};
	var ret = true;
	
	$.get(_url, dados)
	.success(function( responseGet ) {
		
		localStorage.setItem(codeti, JSON.stringify(responseGet));
		var ObjectVal = localStorage.getItem(codeti);
		ObjectVal = JSON.parse(JSON.parse(JSON.stringify(ObjectVal)))
		
		if (ObjectVal.sucesso == true && ObjectVal.confirma == true) {
			
			if (ObjectVal.validade != ObjectVal.confirmaValidade 
				&& ObjectVal.validade != '' 
				&& ObjectVal.confirmaValidade != '' ){
					
				yesno = confirm(ObjectVal.mensagem+'\n\n'
				+"   Lote: "+ObjectVal.lote+"\n"
				+"   Validade: "+ObjectVal.validade+
				"\n\n Deseja continuar?");
				
				if (yesno == true){
					ret = yesno;
					dados.CONFVALID = ret;
					SendData(_url, dados);
				}else if(yesno == false) {
					ret = yesno;
				}
			}
				
		}else{
			dados.CONFVALID = ret;
			SendData(_url, dados);
		}
	})
	.fail(function(d) {
				
		var _obj = {};
		var msgFail = '';
		
		if (d.status == 400){	
			_obj = JSON.parse(JSON.stringify(d.responseJSON));
			msgFail = _obj.errorMessage;
		}else{
			_obj = JSON.parse(JSON.stringify(d.responseText));
			msgFail = _obj.mensagem;
		}
		
		if(tpvm == 'E'){
			responseEntrada.removeClass("green")
			responseEntrada.addClass("red");
			responseEntrada.html(msgFail);
			responseSaida.empty();
		} else if(tpvm == 'S') {
			responseSaida.removeClass("green")
			responseSaida.addClass("red");
			responseSaida.html(msgFail);
			responseEntrada.empty();
		}
		
		ResetScreen(tpvm);
		
	})
	.always(function() {
		ResetScreen(tpvm);
	});
	
	return ret;	
}


function SendData(_url, dados){
	
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
				waitMsg.html("Concluído...");
				wait.show().delay(5000);
				ResetScreen(tpvm);
			}
		})
		.success(function(response){
			 if(tpvm == 'E'){				 				
				responseEntrada.addClass("green");
				responseEntrada.html("Processo registrado com sucesso! ");
			
			} else if(tpvm == 'S') {
				responseSaida.addClass( "green" );
				responseSaida.html("Processo registrado com sucesso! ");
			}
		})
		.fail(function(d){
			var _obj = {};
			var msgFail = '';
		
			if (d.status == 400){	
				_obj = JSON.parse(JSON.stringify(d.responseJSON));
				msgFail = _obj.errorMessage;
			}else{
				_obj = JSON.parse(JSON.stringify(d.responseText));
				msgFail = _obj.mensagem;
			}
			
			if(tpvm == 'E'){
				responseEntrada.removeClass("green")
				responseEntrada.addClass("red");
				responseEntrada.html(msgFail);
				responseSaida.empty();
			} else if(tpvm == 'S') {
				responseSaida.removeClass("green")
				responseSaida.addClass("red");
				responseSaida.html(msgFail);
				responseEntrada.empty();
			}
			
			ResetScreen(tpvm);
		});	
	}
}

//Ativação do focus no input 
modalE.on('shown.bs.modal', function(event) {
	$("#CODETIE").focus();
});

modalS.on('shown.bs.modal', function(event) {
	$("#CODETIS").focus();
});

