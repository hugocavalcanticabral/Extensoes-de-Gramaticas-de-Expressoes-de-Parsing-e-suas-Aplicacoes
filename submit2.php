<?php
	/**
		AQUI VAI POSSUIR O ARQUIVO DE TEXTO, PODE SER CHAMADO UM EXECUTAVEL COM ALGORITMO PARA COMPILAR OS ARQUIVOS
	**/
	session_start();
	$matricula = $_SESSION["matricula"];
	$question = $_POST['question'];
	$file = $_POST['file'];
	
	//2>&1 pra poder pegar a mensagem de erro do terminal
	$cd = shell_exec("cd {$question} 2>&1");
	
	if($cd != null){
		$mkdir = shell_exec("mkdir {$question}");
		
		$contador = fopen("{$question}\\contador.txt", "w");
		fwrite($contador, "0");
		fclose($contador);
	}
	
	$contador = fopen("{$question}\\contador.txt", "r") or die("Unable to open file!");
	$num = fread($contador, 10);
	fclose($contador);
	$num = (int)$num;
	
	$escritor = fopen("{$question}\\contador.txt", "w") or dir("UNABLE TO OPEN FILE!");
	fwrite($escritor, $num+1);
	fclose($escritor);
	$escritor = fopen("{$question}\\tempo.txt", "a") or dir("UNABLE TO OPEN FILE!");
	fwrite($escritor, time() . PHP_EOL);
	fclose($escritor);
	
	
	$new_file = fopen("{$question}\\{$num}.cpp", "w") or die("Unable to open file!");
	fwrite($new_file, $file);
	fclose($new_file);
	
	//CONFIGURAR O CAMINHO DO COMPILADOR NO ARQUIVO "configG++.txt"
	$readCompile = fopen("configG.txt", "r") or die("Unable to open file!");
	$compile = fread($readCompile, 100);
	fclose($readCompile);
	$compileLog = shell_exec($compile." ".getcwd()."\\{$question}\\{$num}.cpp 2>{$question}\\log_{$num}.txt");
	
	$log = fopen("{$question}\\log_{$num}.txt", "r");
	$saida = fread($log, 1000);
	fclose($log);
	
	echo $saida;
	return $saida;
?>