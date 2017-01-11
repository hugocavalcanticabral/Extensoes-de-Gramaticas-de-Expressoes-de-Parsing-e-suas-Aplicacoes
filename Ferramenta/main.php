<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Compilador UFRN-ECT</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<style type="text/css" media="screen">
		html{
			 height: 100%;
		}
		body {
			overflow: hidden;
			height: 100%;
		}

		#editor {
			margin: 	0;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
		}
		</style>
		<script>
			var codigos = [];
			var codigo_atual = 0;
			$(function(){
				var jqXhr = $.getJSON("https://api.github.com/repos/JoseTobias/C-digos/contents", function (data) {})
				.done(function(parsedResponse,statusText,jqXhr) {
					var objeto = jqXhr.responseText;
					var json = $.parseJSON(objeto);
					
					for (var i in json) {
						if(json[i].name != 'README.md'){
							codigos.push(json[i].download_url);
						}
					}
				})
				.always(function(){
					load_code(codigos[codigo_atual]);
				});
			});
		</script>
	</head>
	<body>
		
		<!----------------------------------------------------------------------------------------------->		
		<div class="row" style="height:70%">
			<div class="col-xs-12" style="height:100%">
				<div class="well" id="codigo">
					<pre id="editor" style="font-size:15px"></pre>
				</div>
			</div>
		</div>
		<div class="row" style="height:10%">
			<div class="col-md-5 col-md-offset-5">
				<button type="button" class="btn btn-primary btn-lg" id="botao" data-toggle="modal" data-target="#myModal">COMPILAR</button>
				Aperte F8 como atalho para compilar
				<button type="button" class="btn btn-primary btn-lg" id="proximo">Próximo>></button>
			</div>
		</div>
		<div class="row" style="height:20%">
			<div class="col-xs-12">
				<textarea rows=6 cols=190 readonly='true' id="logDeSaida">
				
				</textarea>
			</div>
		</div>
		
		<!----------------------------------------------------------------------------------------------->
		
		<script src="ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
		<script>
			var editor = ace.edit("editor");
			editor.setTheme("ace/theme/sqlserver");
			editor.session.setMode("ace/mode/c_cpp");
		</script>
		
		<script>
		function load_code(str){
			$.get(str, function(data, status){
				data = data.replace(new RegExp('<', 'g'), "&lt;");
				data = data.replace(new RegExp('>', 'g'), "&gt;");
				
				document.getElementById('codigo').innerHTML = "<pre id='editor' style='font-size:15px'>" + data + " </pre>";
			})
				
			.always(function() {
				var editor = ace.edit("editor");
				editor.setTheme("ace/theme/sqlserver");
				editor.session.setMode("ace/mode/c_cpp");
			});
		};
		//SCRIPT PARA ADICIONAR O ATALHO NA TECLA F8 PARA COMPILAR
		$(window).keydown(function(e) {
			var x = e.key;
			if(x == 'F8')
				document.getElementById("botao").click();
		});
		
		$(function() {
			$('#botao').click(function(){
				var teste = $( "#editor" ).text();
				$.ajax({
						url: 'pro.php',   // link your page
						type: 'POST',
						data: {
							'teste': $( "#editor" ).text(),
							// 'key2': data2
							//if you want to post somethig 
						},
						success: function(data) {
						   // got success data
						   alert('Compilado com sucesso');
						   //$('#var').html(data);   // set value in the div
						},
						error: function(data) {
						   // if error occure
							alert('Some Error Occurred. Please Try Later.');
						}
					});
			})
			$('#proximo').click(function(){
				if((codigo_atual+1) == codigos.length)
					alert("Parabéns, você já concluiu as atividades");
				else{
					codigo_atual = codigo_atual + 1
					load_code(codigos[codigo_atual]);
				}
			});
		});
		</script>
	</body>
</html>