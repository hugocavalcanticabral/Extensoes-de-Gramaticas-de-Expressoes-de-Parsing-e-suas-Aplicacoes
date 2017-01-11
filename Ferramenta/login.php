<?php
	/**
		PAGINA QUE FARÁ O CADASTRO DO NOVO USUARIO, CRIANDO SUA PASTA NO GITHUB COM O DEFAULT DE UM ARQUIVO DE TEMPO E OUTRO ARQUIVO QUE DIRÁ SE 
		ESTE USUARIO SERÁ COMPILADO COM G++ OU VISUAL E EM PORTUGUÊS OU INGLES
	**/
	$login = $_POST['matricula'];
	
	/*curl -i -X PUT -H 'Authorization: token <token_string>' -d '
		{"path": "<filename.extension>", "message": "<Commit Message>", 
		"committer": {"name": "<Name>", "email": "<E-Mail>"}, 
		"content": "<Base64 Encoded>", "branch": "master"}' 
		https://api.github.com/repos/<owner>/<repository>/contents/<filename.extension>
	*/
	/*
		$curl_url = $url
		$curl_token_auth = 'Authorization: token ' . $token;
		$ch = curl_init($curl_url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'User-Agent: $username', $curl_token_auth ));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

		$response = curl_exec($ch);  
		curl_close($ch);
		$response = json_decode($response);

		return $response;
	*/
	header("Location: main.php"); /* Redirect browser */
	exit();
?>