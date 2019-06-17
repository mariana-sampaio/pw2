<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Exibir Professores</title>

<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>

<body>
	<table class="table table-hover">
    <thead>
    <tr>
        <th colspan="7">RELATÓRIO DE PROFESSORES</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<th>Matrícula</th>
        <th>Nome do Professor:</th>
        <th>Email do Professor:</th>
        <th>Telefone do Professor:</th>
        <th>Celular do Professor:</th>
        <th>Data da contribuição:</th>
        <th>Valor da contribuição:</th>
    </tr>
   </tbody>
    <?php
	 try{
	 $conexao = new PDO('mysql:host=localhost:3307;
	       dbname=banco_apm','root','usbw');
 $consulta = $conexao->query("SELECT * FROM 
 				tabela_professor");
while($campo = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo "<tr>";
	echo "<td>{$campo['matricula']}</td>";
	echo "<td>{$campo['nome']}</td>";
	echo "<td>{$campo['email']}</td>";
	echo "<td>{$campo['telefone']}</td>";
	echo "<td>{$campo['celular']}</td>";
	echo "<td>{$campo['data']}</td>";
	echo "<td>{$campo['valor']}</td>";


	echo "</tr>";
	
}
}catch(PDOException $e){
		echo "Erro:" . $e->getMessage(); 
	 }	
	?>
    </table>
</body>
</html>
