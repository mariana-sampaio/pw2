<?php
	if(isset($_GET['cadastrar'])){
		try{
			$conexao= new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
			$matricula=$_GET['matricula'];
			$nome=$_GET['nome'];
			$email=$_GET['email'];
			$telefone=$_GET['telefone'];
			$data=$_GET['data'];
			$valor=$_GET['valor'];
			$sql = "INSERT INTO tabela_aluno(matricula,nome,email,telefone,data,valor) 								    VALUES(:parametro1,:parametro2,:parametro3,:parametro4,:parametro5,:parametro6)";
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':parametro1',$matricula);
			$stmt->bindParam(':parametro2',$nome);
			$stmt->bindParam(':parametro3',$email);
			$stmt->bindParam(':parametro4',$telefone);
			$stmt->bindParam(':parametro5',$data);
			$stmt->bindParam(':parametro6',$valor);
			$resultado=$stmt->execute();
			if($resultado)
			{
				echo "<script>alert('Dados gravados com sucesso!');</script>";
			}else{
				echo var_dump($stmt->errorInfo());
					
			}
;		}catch(PDOException $e){
			echo 'Erro:' . $e ->getMessage();
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulário de Cadastro de alunos</title>
<style>
fieldset{
	font:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
	color:#FFFFFF;
}
form{
	align-content:center;
}
img {
  opacity: 0.5;
  filter: alpha(opacity=50); /* For IE8 and earlier */
}
</style>
</head>

<body background="../funcao/volta-para-o-padrao-sem-emenda-de-escola_87749-120.jpg">
<div>
</div>
<fieldset style="background-color:#9E9E9E">
<legend align="center"><font color="#F9F9F9"><h2>Matrícula de aluno</h2></font></legend>
	<form action="#" method="get">
    <p><label>Número de matrícula:</label></p>
    <p><input type="number" size="5" name="matricula" required></p>
    <p><label>Nome completo do aluno:</label></p>
    <p><input type="text" size="50" name="nome" required></p>
    <p><label>Email do aluno:</label></p>
    <p><input type="text" size="50" name="email"></p>
    <p><label>Telefone do aluno:</label></p>
    <p><input type="tel" size="15" name="telefone" required></p>
    <p><label>Data da contribuição</label></p>
    <p><input type="date" size="8" name="data" required></p>
    <p><label>Valor da contribuição:</label></p>
    <p><input type="text" size="6" name="valor" required></p>
    <p><input type="submit" value="Cadastrar" name="cadastrar"></p>
	</form>
</fieldset>
</body>
</html>