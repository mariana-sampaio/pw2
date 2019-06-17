<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Busca de professores</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>

<body>
	<fieldset>
    <legend>Formulário de Pesquisa</legend>
	<form action="#" method="get">
    <p><label>Digite o nome do professor que deseja buscar:</label></p>
 	<p><input type="text" name="valor_de_busca" size="50" required> </p>
 	<p><input type="submit" name="buscar" value="Pesquisar"></p>
    </form>
    <?php
		if(isset($_GET['buscar'])){
			$valor = $_GET['valor_de_busca'];
			try{
				$con = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');			
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$comando_sql = "SELECT * FROM tabela_professor WHERE nome LIKE '%$valor%'";
				$consulta = $con->query($comando_sql);
				print "<p>Resultado:</p>";
				echo "<div class='table-responsive-md'>";
				echo "<table class=' table table-striped table-hover'>
							  <thead>
							   <tr>
							   		<th>Foto:</th>
									<th>Matrícula:</th>
									<th>Nome do Professor(a):</th>
							   </tr>
							  </thead>
							  <tbody>";
				while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
					{
				print "<tr>
					<td><img src='fotos/{$registro['foto']}' width='74' height='75'  style='border-radius:10px;'></td>
					<td>{$registro['matricula']}</td>
					<td>{$registro['nome']}</td>
					<td><a href='form_busca.php?excluir&matricula={$registro['matricula']}'>
								<img src='icones/excluir.png' title='Excluir registro'></a></td>
								
					<td><a href='form_editar.php?editar&matricula={$registro['matricula']}'>
								<img src='icones/editar.png' title='Excluir registro'></a></td>
					</tr>";
					}
						
					  print "</tbody>
						</table>";	
					echo "</div>";						
				}catch(PDOException $e){
					print "Erro ocorrido:" . $e->getMessage();					
					}	
		}
		else if(isset($_GET['excluir']))
		{	
			$matricula = $_GET['matricula'];
			$con = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');		
			$comando_sql = "DELETE FROM tabela_professor WHERE matricula = :valor";
			$stmt = $con->prepare($comando_sql);
			$stmt->bindParam(':valor',$matricula);
			$stmt->execute();
			$rs = $stmt->rowCount();
			if($rs)
			{
				echo "<script>alert('Registro apagado com sucesso!');</script>";	
			}else{
				echo "<script>alert('Não foi possível excluir!');</script>";		
			}
			
		}	
	?>
    
    
    </fieldset>
</body>
</html>
