<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Compilador UFRN-ECT</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/style.css">
		
	</head>
	<body>
	
		<div class="container">
			<div class="row row-centered">
				<div class="col-md-3 col-centered">
					<img src="assets/img/ufrn_logo.png" class="img-responsive float-xs-left" alt="Logo UFRN" />
				</div>
				<div class="col-md-3 col-centered">
					<img src="assets/img/ect_logo.png" class="img-responsive float-xs-right" alt="Logo ECT"/>
				</div>
			</div>
			
			<div class="row row-centered">
				<div class="col-md-6 col-centered">
					<h2> Projeto de pesquisa de Sérgio </h2>
				</div>
			</div>
		</div>
		
		<div class="container">
			<form action="login.php" method="POST">
				<div class="form-group row">
					<label for="matricula" class="col-form-label">Matricula:</label>
					<input required type="number" class="form-control" name="matricula" aria-describedby="emailHelp" placeholder="Digite sua matricula">
				</div>
				<div class="form-group row">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>