<?php
	if(isset($_POST['cadastrar'])){
		try{
			$conexao= new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$matricula = $_POST['matricula'];
			$nome=$_POST['nome'];
			$email=$_POST['email'];
			$telefone=$_POST['telefone'];
			$celular=$_POST['celular'];
			$data=$_POST['data'];
			$valor=$_POST['valor'];
			
			$arquivo = $_FILES['arquivo'];
	 		$foto = $_FILES['arquivo']['name'];
	 		$extensao = explode(".",$foto);
	 		$nome_final = md5(time()) . "." . $extensao[1];
	 		$pasta = "fotos/";
			
			$comando_sql="INSERT INTO tabela_professor (matricula,nome,email,telefone,celular,data,valor,foto) VALUES(:valor1,:valor2,:valor3,:valor4,:valor5,:valor6,:valor7,:valor8)";
			$stmt = $conexao->prepare($comando_sql);
			$stmt->bindParam(':valor1',$matricula);
			$stmt->bindParam(':valor2',$nome);
			$stmt->bindParam(':valor3',$email);
			$stmt->bindParam(':valor4',$telefone);
			$stmt->bindParam(':valor5',$celular);
			$stmt->bindParam(':valor6',$data);
			$stmt->bindParam(':valor7',$valor);
			$stmt->bindParam(':valor8',$nome_final);
			$rs = $stmt->execute();
			if($rs and move_uploaded_file($arquivo['tmp_name'],$pasta.$nome_final)){
				echo "<script>alert('Cadastrado com sucesso!!');</script>";
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
<title>Cadastro de professor</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
    	<h1><img src="imagens/logo_etec_2019.png"></h1>
    </header>
    <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="form_cadastra_prof.php">Cadastrar Professor</a></li>
      <li><a href="cadastrar_usuarios.php">Cadastrar usuário</a></li>
      <li><a href="form_busca.php">Buscar</a></li>  
      <li><a href="form_exibir_professores.php">Exibir</a></li>  
	</ul>
    </nav>
    <main>
    <section>    
        <form action="#" method="post" enctype="multipart/form-data">
        <p><label>Matrícula:</label></p>
        <p><input type="number" size="5" name="matricula" required></p>
        <p><label>Nome completo:</label></p>
        <p><input type="text" size="50" name="nome" required></p>
        <p><label>Email:</label></p>
        <p><input type="text" size="50" name="email"></p>
        <p><label>Telefone:</label></p>
        <p><input type="tel" size="15" name="telefone" required></p>
        <p><label>Celular:</label></p>
        <p><input type="tel" size="15" name="celular" required></p>
        <p><label>Data da contribuição:</label></p>
        <p><input type="date" name="data" required></p>
        <p><label>Valor da contribuição:</label></p>
        <p><input type="text" size="6" name="valor" required></p>
        <p><label>Selecione uma imagem</label></p>
        <p><input type="file" name="arquivo"></p>
        <p><input type="submit" value="Cadastrar Professor" name="cadastrar"></p>
        </form>
    </section>
    </main>
</body>
</html>