<?php
// funçao incriptografar
function encrypt($pswd, $text)
{
	// passa a chave para minuscula para n dar treta 
	$pswd = strtolower($pswd);
	
	// inicia as variaveis
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	for ($i = 0; $i < $length; $i++)
	{
		// if para encriptografar
		if (ctype_alpha($text[$i]))
		{
			// if se for maiuscula
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// else caso seja minuscula
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// atualiza a chave
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// retorna a criptografia
	return $text;
}
// funçao para descriptografar
function decrypt($pswd, $text)
{
	// transforma a chave em minuscula
	$pswd = strtolower($pswd);
	
	// inicia a variavel 
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	for ($i = 0; $i < $length; $i++)
	{
		// if para descriptografar
		if (ctype_alpha($text[$i]))
		{
			// if se for maiuscula
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// if se for minuscula
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// atualiza a chave denovo
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// retorna o texto descriptografado
	return $text;
}
?>