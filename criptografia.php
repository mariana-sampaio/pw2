<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Criptografia com MD5</title>
</head>

<body>
	<?php
	$senha = 123;
	$senha_criptografada = md5($senha);
	echo $senha_criptografada;
	?>
</body>
</html>