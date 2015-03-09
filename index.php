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
        <link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		
		<!-- Cabeçalho -->
		
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
          		<div class="navbar-header">
         			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#togglenavbar">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
      				</button>
            		<a class="navbar-brand"><img class="img-rounded" id="logo" src="img/logo_sindicato.gif"></a>
          		</div>
    			<div class="collapse navbar-collapse" id="togglenavbar">
            		<ul class="nav navbar-nav">
              			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Início</a></li>
            		<ul class="nav navbar-right">
            			<a href="changelog.php" id="linkeast" class="navbar-text">v0.9.0a</a>
            		</ul>
      			</div>
			</div>
		</div>

	<!-- Fim cabeçalho -->

	</body>
</html>