<?php
	if(isset($_GET['cadastrar'])){
		try{
			$conexao= new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$id=0;
			$login = $_GET['login'];
			$senha=md5($_GET['senha']);
			$nome=$_GET['nome'];
			$tipo=$_GET['tipo'];
			$comando_sql="INSERT INTO tabela_usuarios (id,login,senha,nome,tipo) VALUES(?,?,?,?,?)";
			$stmt = $conexao->prepare($comando_sql);
			$stmt->bindParam(1,$id);
			$stmt->bindParam(2,$login);
			$stmt->bindParam(3,$senha);
			$stmt->bindParam(4,$nome);
			$stmt->bindParam(5,$tipo);
			$rs = $stmt->execute();
			if($rs){
				echo "<script>alert('OK');</script>";
			}else{
				echo var_dump($stmt->errorInfo());
			}
		}
			catch(PDOException $e){
				echo "Erro:" . $e->getMessage();	
			} 
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de usuários</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
    	<h1><img src="imagens/logo_etec_2019.png"></h1>
    </header>
    
    
<main>
<nav>
	 <ul>
      <li><a href="#">Home</a></li>
      <li><a href="form_cadastra_prof.php">Cadastrar Professor</a></li>
      <li><a href="cadastrar_usuarios.php">Cadastrar usuário</a></li>
      <li><a href="form_busca.php">Buscar</a></li>  
      <li><a href="form_exibir_professores.php">Exibir</a></li>  
	</ul>
</nav>


	<form action="#" method="get">
    <p><label>Login:</label></p>
    <p><input type="text" size="20" name="login" required></p>
    <p><label>Senha:</label></p>
    <p><input type="password" size="60" name="senha" required></p>
    <p><label>Nome:</label></p>
    <p><input type="text" size="50" name="nome" required></p>
    <p><label>Tipo:</label></p>
    <p>
       <select name="tipo">
      	<option></option>
        <option value="c">Comum</option>
        <option value="s">Super</option>
        <option value="m">Master</option>
       </select>
   </p>
    
    <p><input type="submit" value="Cadastrar Usuário" name="cadastrar"></p>
	</form>
</main>

</body>
</html>