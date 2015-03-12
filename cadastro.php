<?php
include ("seguranca.php");
error_reporting(0);
?>
<html>
	<head>
		<title>Cadastro - Nameless</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Importante para habilitar os recursos de Responsividade em conjunto com o CSS -->        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
		<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="{{ site.cdn_bootstrap_js }}"></script>
		<script src="js/validator.min.js"></script>
		<script src="http://platform.twitter.com/widgets.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/cadastro.css">
        <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
        <script type="text/javascript">
		    window.onload = function() {
		        new dgCidadesEstados(
		            document.getElementById('estado'),
		            document.getElementById('cidade'),
		            true
		        );
		    }
		<!--</script>
        <script type="text/javascript">-->
        	$(document).ready(function() {
        			$("#cep").mask("99.999-999");
        			$("#cpf").mask("999.999.999-99"); // corrigir isso
        	});</script>
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
              			<li class="active"><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
              		</ul>
      			</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="panel panel-default" id="painelcadastro">
					<div class="panel-heading"><span class="glyphicon glyphicon-ok-circle"></span>  Cadastro</div>
					<div class="panel-body">
						<form method="post" id="formcadastro" action="cadastroinput.php" role="form" data-toggle="validator">
							<input class="form-control" type="text" maxlength="40" name="nome" id="nome" placeholder="Nome completo" required /><br />
							<input class="form-control" type="text" maxlength="15" name="cpf" id="cpf" placeholder="CPF" required /><br />
							<input class="form-control" type="email" maxlength="35" name="mail" id="mail" placeholder="E-mail" required /><br />
							<input class="form-control" type="text" maxlength="35" name="cep" id="cep" placeholder="CEP" required /><br />
							<select class="form-control" id="estado" name="estado" required></select><br />
							<select class="form-control" id="cidade" name="cidade" required></select><br />
							<div class="form-group">
							    <div class="form-group col-sm-6">
							      <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Senha" required>
							      <span class="help-block">Mínimo 6 caracteres</span>
							    </div>
							    <div class="form-group col-sm-6">
							      <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="As senhas não conferem" placeholder="Confirmar senha" required>
							      <div class="help-block with-errors"></div>
							    </div>
							    </div>
							    <br /><br /><br /><br /><!-- HUE HUE HUE -->
								<button class="btn btn-primary">Cadastrar</button>
							 </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>