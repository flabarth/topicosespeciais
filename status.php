<?php
include ("seguranca.php");
?>
<html>
	<head>
		<title>Meu status - Nameless</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Importante para habilitar os recursos de Responsividade em conjunto com o CSS -->        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>   
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/status.css">
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
              			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Início</a></li>
              		</ul>
              		<ul class="nav navbar-nav">
              			<li class="active"><a href="status.php"><span class="glyphicon glyphicon-check"></span>  Meu status</a></li>
              		</ul>
              		<ul class="nav navbar-nav navbar-right">
              			<li><a href="desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
              		</ul>
      			</div>
			</div>
		</div>

	<!-- Fim cabeçalho -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default" id="statuspanel">
						<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>&nbsp&nbsp Status</div>
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				<div class="thumbnail" id="imagem-novo-membro">
					<img src="img/hapwo.jpg" alt="...">
				    <div class="caption">
				    	<h4>Indique alguém.</h4>
				        <p>Obtenha maiores benefícios ao indicar mais pessoas!</p>
				        <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus"></span> Cadastrar pessoas</a>
				    </div>
				</div>
				<div class="thumbnail" id="imagem-novo-membro">
					<img src="img/hapwo2.png" alt="...">
				    <div class="caption">
				    	<h4>Fui convidado.</h4>
				        <p>Se alguém o indicou, acesse aqui para obter seus benfícios já!</p>
				        <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-ok"></span> Começar</a>
				    </div>
				</div>
			</div>
		</div>	
	</body>
</html>