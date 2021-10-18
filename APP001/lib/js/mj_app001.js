	//==============URI===================================
	const _url = 'http://192.168.0.20:8084/rest/WSMJ104';
	//==============MODAL=================================
	$(function(){
		$('#entrada').on('shown.bs.modal', function () {
		//$('#myInput').focus()
		});
	});
	
	//==============FUNÇÕES================================
	function Submit(xtpvm) {
		var tpvm = xtpvm;
		var codeti = tpvm ==  'E' ? $("#CODETIE").val() :  $("#CODETIS").val();
		
		var dados = {
			CODETI: codeti,
			TPMV: tpvm,
			FILIAL: '01',
			EMPRESA: '01',
			CONFVALID: ''
		}

		$.ajax({ // create an AJAX call...
			url: _url,
			data: JSON.stringify(dados),
			type: 'post',
			dataType: 'json',
			contentType: 'application/json',
			beforeSend: function() { $('#wait').show(); },
			success: function (response) {
				if(tpvm == 'E'){					
					$("#readEEtiq").html(response.errorMessage);
					$("#responseEntrada").addClass("green");
					$("#responseEntrada").html("Processo registrado com sucesso! ");
					//$("#responseEntrada").delay(5000).html("");
					//$("#responseEntrada").delay(5000).text('');
					//$("#readEEtiq").delay(5000).text('');
				} else if(tpvm == 'S') {
					console.log('S: ' + tpvm);
					$("#readSEtiq").html(response.errorMessage);
					$("#responseSaida").addClass( "green" );
					$("#responseSaida").html("Processo registrado com sucesso! ");
					//$("#responseSaida").delay(5000).html("");
					//$("#responseSaida" ).delay(5000).text('');
					//$("#readSEtiq").delay(5000).text('');
				}
			
			},
			error: function (xhr, status, error) {				
				var msg = JSON.parse (xhr.responseText);
	
				if(tpvm == 'E'){
					//$('#readEtiq').html(codeti);
					$("#responseEntrada").removeClass("green")
					$("#responseEntrada").addClass("red");
					$("#responseEntrada").html(msg.errorMessage);
					//$("#responseEntrada").delay(5000).html("");
					//$("#responseEntrada").delay(5000).text('');
				} else if(tpvm == 'S') {
					//$('#readSEtiq').html(codeti);
					$("#responseSaida").removeClass("green")
					$("#responseSaida").addClass("red");
					$("#responseSaida").html(msg.errorMessage);
					//$("#responseSaida").delay(5000).html("");
					//$("#responseSaida").delay(5000).text('');
				}
			},
			complete: function() { $('#wait').hide(); }
		});
	
		if(tpvm == 'E'){
			console.log('entradaMassa');
			$('#entradaMassa').trigger("reset");
		} else if(tpvm == 'S') {
			console.log('saidaMassa');
			$('#saidaMassa').trigger("reset");
		}
		
		$("#hidden").focus();
		
	}