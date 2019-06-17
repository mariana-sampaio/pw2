<?php
if(isset($_GET['matricula'])){
	$matricula=$_GET['matricula'];
	$conexao= new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
	$sql= "SELECT * FROM tabela_professor WHERE $matricula=?";
	$busca = $conexao->prepare($sql);
	$busca->bindParam(1,$matricula);
	$busca->execute();
	$registro=$busca->fetch(PDO::FETCH_ASSOC);
}
?>
<?php
	if(isset($_POST['atualizar'])){
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
	 	$nome_final = md5(time()) . ".". $extensao[1];
	 	$pasta = "fotos/";
		$cmd_atualiza="UPDATE tabela_professor SET nome=?, email=?, telefone=?, celular=?, data=?, valor=?, foto=? WHERE matricula=?";
		$stmt = $conexao->prepare($cmd_atualiza);
		$stmt->bindParam(1,$nome);
		$stmt->bindParam(2,$email);
		$stmt->bindParam(3,$telefone);
		$stmt->bindParam(4,$celular);
		$stmt->bindParam(5,$data);
		$stmt->bindParam(6,$valor);
		$stmt->bindParam(7,$nome_final);
		$stmt->bindParam(8,$matricula);
		$resultado=$stmt->execute();
		if($resultado and move_uploaded_file($arquivo['tmp_name'],$pasta.$nome_final))
			{
				echo "<script>alert('Atualizado com sucesso!')</script>";
			}
			else
			{
				echo var_dump($stmt->errorInfor());
			}
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar professor</title>
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
        <p><input type="number" size="5" name="matricula" value="<?php echo $registro['matricula'] ?>" required></p>
        <p><label>Nome completo:</label></p>
        <p><input type="text" size="50" name="nome" value="<?php echo $registro['nome'] ?>" required></p>
        <p><label>Selecione uma imagem</label></p>
        <p><img src="fotos/<?php echo $registro['foto'] ?>"  width="10%" height="10%" style="border-radius: 100px;" id="visualizar_imagem"></p>
        <p><input type="file" name="arquivo" id="arquivo" ></p>
        
        <script>
			function carregaImagem(){
				if(this.files && this.files[0]){
					var file = new FileReader();
					file.onload = function(e)
					{
						document.getElementById('visualizar_imagem').src = e.target.result;
					};
					file.readAsDataURL(this.files[0]);
				}
			}
			document.getElementById("arquivo").addEventListener("change", carregaImagem, false);
		</script>
        
        <p><label>Email:</label></p>
        <p><input type="text" size="50" name="email" value="<?php echo $registro['email'] ?>"></p>
        <p><label>Telefone:</label></p>
        <p><input type="tel" size="15" name="telefone" value="<?php echo $registro['telefone'] ?>" required></p>
        <p><label>Celular:</label></p>
        <p><input type="tel" size="15" name="celular" value="<?php echo $registro['celular'] ?>" required></p>
        <p><label>Data da contribuição:</label></p>
        <p><input type="date" name="data" value="<?php echo $registro['data'] ?>" required></p>
        <p><label>Valor da contribuição:</label></p>
        <p><input type="text" size="6" name="valor" value="<?php echo $registro['valor'] ?>" required></p>
        
        <p><input type="submit" value="Atualizar" name="atualizar"></p>
        </form>
    </section>
    </main>
</body>
</html>