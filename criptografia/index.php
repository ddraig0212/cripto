<?php
// inicializar variáveis
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";
// if paraverificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// funçoes para criptografar e descriptografar
	require_once('vigenere.php');
	
	// define as variaveis
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// if para verificar se a senha foi enviada
	if (empty($_POST['pswd']))
	{
		$error = "ponha a senha, desgraça(／#`Д´)／!";
		$valid = false;
	}
	
	// elseif para verificar se o texto foi enviado
	else if (empty($_POST['code']))
	{
		$error = "ponha o texto, desgraça(／#`Д´)／!";
		$valid = false;
	}
	
	// elseif para verificar se a pessoa é retardada para usar numero
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "seu retardado vc usou numero, desgraça(／#`Д´)／!";
			$valid = false;
		}
	}
	
	// if para verificar se os inputs sao validos
	if ($valid)
	{
		// if para confirmar se o botao de criptografar for clickado
		if (isset($_POST['encrypt']))
		{	
			$code = encrypt($pswd, $code);
			$error = "criptografado com sucesso!\(^o^)/";
			$color = "#526F35";
		}
			
		// if para verificar se o botao de descriptografar foi clickado
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "descriptografado com suscesso!\(^o^)/";
			$color = "#526F35";
		}
	}
}
?>

<html>
	<head>
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
		<form action="index.php" method="post">
			<table cellpadding="50" align="center" cellpadding="1" border="2">
				<tr>
					<td align="center">chave: <input type="text" name="pswd" id="pass" maxlength="8" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
				</tr>
				<tr>
					<td align="center"><textarea id="box" name="code"  cols="50" rows="10" maxlength="50"><?php echo htmlspecialchars($code); ?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="encrypt" class="button" value="criptografar" onclick="validate(1)" /><input type="submit" name="decrypt" class="button" value="descriptografar" onclick="validate(2)" /></td>
				<tr>
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>