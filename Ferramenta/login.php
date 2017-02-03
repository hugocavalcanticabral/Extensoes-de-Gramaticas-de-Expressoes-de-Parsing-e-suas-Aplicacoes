<?php
	/**
		PAGINA QUE FARÁ O CADASTRO DO NOVO USUARIO, CRIANDO SUA PASTA NO GITHUB COM O DEFAULT DE UM ARQUIVO DE TEMPO E OUTRO ARQUIVO QUE DIRÁ SE 
		ESTE USUARIO SERÁ COMPILADO COM G++ OU VISUAL E EM PORTUGUÊS OU INGLES
	**/
	session_start();
	$login = $_POST['matricula'];
	$mkdir = shell_exec("mkdir {$login}");
	$_SESSION["matricula"] = $login;
	
	$contador = fopen("contador.txt", "r") or die("Unable to open file!");
	$num = fread($contador, 10);
	fclose($contador);
	$num = (int)$num;
	
	if($num%2 == 0){
		if($num%4 == 0)
			$cp = shell_exec("copy submit4.php C:\\inetpub\\wwwroot\\{$login}\\submit.php"); 
		else
			$cp = shell_exec("copy submit2.php C:\\inetpub\\wwwroot\\{$login}\\submit.php");
	}else{
		if( ($num + 1)%4 == 0)
			$cp = shell_exec("copy submit3.php C:\\inetpub\\wwwroot\\{$login}\\submit.php");
		else
			$cp = shell_exec("copy submit1.php C:\\inetpub\\wwwroot\\{$login}\\submit.php");
	}

	$escritor = fopen("contador.txt", "w") or dir("UNABLE TO OPEN FILE!");
	fwrite($escritor, $num+1);
	fclose($escritor);
	
	header("Location: main.php"); /* Redirect browser */
	exit();
?>