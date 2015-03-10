<?php
include ("seguranca.php");
error_reporting(0);
?>
<html>
	<head>
		<title>Início - Nameless</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Importante para habilitar os recursos de Responsividade em conjunto com o CSS -->        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>   
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		
		<!-- Cabeçalho -->
		
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
          		<div class="navbar-header">
         			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#togglenavbar">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
      				</button>
      				<!-- Logo da página
            		<a class="navbar-brand"><img class="img-rounded" id="logo" src="img/logo.jpg"></a>
            		-->
          		</div>
    			<div class="collapse navbar-collapse" id="togglenavbar">
            		<ul class="nav navbar-nav">
              			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Início</a></li>
              		</ul>
              		<ul class="nav navbar-nav">
              			<li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
              		</ul>
            		<ul class="nav navbar-right">
            			<p class="navbar-text">alpha v0.2.5.150310</p> <!-- v[major].[minor].[rev].[ano/mês/dia] -->
            		</ul>
      			</div>
			</div>
		</div>

	<!-- Fim cabeçalho -->
		<div classs="container">
			<div class="row">
				<div class="panel panel-default" id="painellogin">
					<div class="panel-heading"><span class="glyphicon glyphicon-log-in"></span>    Login</div>
					<div class="panel-body">
						<form method="post" action="valida.php" id="formlogin">
							<input type="text" class="form-control" name="usuario" maxlength="50" placeholder="Usuário" /><br />
							<input class="form-control" type="password" name="senha" maxlength="16" placeholder="Senha" /><br />
							<button type="submit" class="btn btn-primary">Entrar</button>
						</form>
						<div class="alert alert-info" role="alert">
							<p><span class="glyphicon glyphicon-user"></span>&nbsp&nbspAinda não possui conta? <a href="cadastro.php"><b>Clique aqui!</b></a></p>
						</div>
						<?php
						if ($_SESSION["erro"] == 1) {// Requisita variável "erro" gravada em sessão e verifica se o valor é 1
							echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><span class='glyphicon glyphicon-warning-sign'></span> Usuário ou senha incorretos </div>";
							// Caso o valor seja 1, exibe o mensagem
							$_SESSION["erro"] = 0;
							// Reseta variável "erro" para evitar que seja exibida após atualização de página
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>