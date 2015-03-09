<?php
	/**
	* Sistema de segurança com acesso restrito
	*
	* Usado para restringir o acesso de certas páginas do seu site
	*
	* @author Thiago Belem <contato@thiagobelem.net>
	* @link http://thiagobelem.net/
	*
	* @version 1.0
	* @package SistemaSeguranca
	*/
	
	//  Configurações do Script
	// ==============================
	$_SG['conectaServidor'] = false;    // Abre uma conexão com o servidor MySQL?
	$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
	
	$_SG['caseSensitive'] = true;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
	
	$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
	// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.
	
	$_SG['servidor'] = 'localhost';    // Servidor MySQL
	$_SG['usuario'] = 'root';          // Usuário MySQL
	$_SG['senha'] = '';                // Senha MySQL
	$_SG['banco'] = 'login';            // Banco de dados MySQL
	
	$_SG['paginaLogin'] = 'index.php'; // Página de login
	
	$_SG['tabela'] = 'usuarios';       // Nome da tabela onde os usuários são salvos
	// ==============================
	
	// ======================================
	//   ~ Não edite a partir deste ponto ~
	// ======================================
	
	// Verifica se precisa fazer a conexão com o MySQL
	if ($_SG['conectaServidor'] == true) {
	$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
	mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
	}
	
	// Verifica se precisa iniciar a sessão
	if ($_SG['abreSessao'] == true) {
	session_start();
	}
	
	/**
	* Função que valida um usuário e senha
	*
	* @param string $usuario - O usuário a ser validado
	* @param string $senha - A senha a ser validada
	*
	* @return bool - Se o usuário foi validado ou não (true/false)
	*/
	function validaUsuario($usuario, $senha) {
	global $_SG;
	
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	
	// Usa a função addslashes para escapar as aspas
	$nusuario = addslashes($usuario);
	$nsenha = addslashes($senha);
	
	// Conecta com API
	$controle = 0; // variável de controle do if, if só será executado se $controle for 0
	//return false;
	$object_associados = file_get_contents('http://187.7.114.68:8080/associados?date=0'); // Conecta
	$associados_dec1 = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $object_associados), true); // Decodifica
	foreach ($associados_dec1 as $key => $value) {
		unset($userassoc, $senhassoc);
		$userassoc = $associados_dec1[$key]["id"]; // pega user -- neste caso usando o ID da API dos associados
		$senhassoc = $associados_dec1[$key]["access_key"]; // pega senha
			if ($userassoc == $usuario) { // verifica se usuário existe na API
				if ($senhassoc == $senha) { // verifica se senha confere com usuário
					// O registro foi encontrado => o usuário é valido

					// Definimos dois valores na sessão com os dados do usuário
					$_SESSION['usuarioID'] = $associados_dec1[$key]["id"]; // Pega o valor da coluna 'id do registro encontrado na API
					$_SESSION['usuarioNome'] = $associados_dec1[$key]["nome"]; // Pega o valor da coluna 'nome' do registro encontrado na API
					
					// Verifica a opção se sempre validar o login
					if ($_SG['validaSempre'] == true) {
					// Definimos dois valores na sessão com os dados do login
					$_SESSION['usuarioLogin'] = $usuario;
					$_SESSION['usuarioSenha'] = $senha;
					}
					return true;
					} else {
						//return false;
					}	
				} else {
					//return false;
				}
			}
		}
	
	// Monta uma consulta SQL (query) para procurar um usuário
	//$sql = "SELECT `id`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
	//$query = mysql_query($sql);
	//$resultado = mysql_fetch_assoc($query);
	
	// Verifica se encontrou algum registro
	//if ($resultado = 0) {
	// Nenhum registro foi encontrado => o usuário é inválido
	//return false;
	
	//} else {
	
	
	/**
	* Função que protege uma página
	*/
	function protegePagina() {
	global $_SG;
	
	if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
	// Não há usuário logado, manda pra página de login
	expulsaVisitante();
	} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
	// Há usuário logado, verifica se precisa validar o login novamente
	if ($_SG['validaSempre'] == true) {
	// Verifica se os dados salvos na sessão batem com os dados do banco de dados
	if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
	// Os dados não batem, manda pra tela de login
	expulsaVisitante();
	}
	}
	}
	}
	
	/**
	* Função para expulsar um visitante
	*/
	function expulsaVisitante() {
	global $_SG;
	
	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
	
	// Manda pra tela de login
	header("Location: ".$_SG['paginaLogin']);
	}
	
	/**
	 * Função para somente permitir o administrador na página
	 * @author Flavo H. Barth
	 * == 24/06/2014 ==
	 *    ----------------!! O usuário administrador precisa ser criado na API !!----------------
	 */
	/*function adminOnly() {
	global $_SG;
		
		// Captura id do usuário conectado
		$idAdmin = $_SESSION['usuarioID'];
		
		// Faz o query select no SQL, capturando o tipo de conta do usuário
		$querytipoconta = mysql_query("SELECT tipoconta FROM usuarios WHERE id = ". $idAdmin ." LIMIT 1");
		$tipoconta = mysql_result($querytipoconta,0);
		
		// Testa se a conta do usuário é Administrador ou Comum. Caso seja Comum, o usuário volta para a tela de login
		if ($tipoconta != 1) {
			expulsaVisitante();
		} else {
			return true;
		}
	}*/
?>	