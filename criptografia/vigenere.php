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
	$tamanhoAlfabeto=256;
	//deslocamento
	$n=5;
	
	//ficaram fora
	$fora = 32;
	
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

	$Criptografia = '';

	//varre todos os carcteres do test
	for ($i=0; $i < strlen($text); $i++) { 
	//obtem o codigo do caractere atual
		$key= ord($text[$i]);
	
	//avança o numero para a casa estipulada
		$novoCodigo=$key + $n;
	
	//calcula o codigo
		$novoCodigo= $novoCodigo % $tamanhoAlfabeto;
	
	//se o codigo na faixa de exclusão,
	// manda para fora da faixa
		if ($novoCodigo>= 0 && $novoCodigo<$fora) {
			$novoCodigo += $fora;
		}
	
		//	obter caracter do novo codio e concatena-o
		$Criptografia .= chr($novoCodigo);
	}
	$text=$Criptografia;
	// retorna a criptografia
	return $text;
}
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------

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

	$tamanhoAlfabeto=256;
	//deslocamento
	$n=5;
	//ficaram fora
	$fora = 32;

	$criptografada= $text;	
	$desCriptografada = '';
	//varre todos os caracteres da frase criptografada
	//varre todos os caracteres da frase criptografada
	for ($i=0; $i < strlen($criptografada) ; $i++) { 
		//obtem o codigo do caractere atual
		$key= ord($criptografada[$i]);

		//retrocede o numero de casas estipulado
		$novoCodigo = $key -$n;

		//se o codigo na faixa de exclusão,
	// manda para fora da faixa
		if ($novoCodigo>= 0 && $novoCodigo<$fora) {
			$novoCodigo -= $fora;
		}

		//computa a diferença caso valor seja negativo
		if ($novoCodigo<0) {
			//ficar atento
			$novoCodigo= $tamanhoAlfabeto + $novoCodigo;
		}

		//obtem o carctere do novo codigo e concatena
		$desCriptografada.=chr($novoCodigo);
	}

		$text=$desCriptografada;

	// retorna o texto descriptografado
	
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
	

	return $text;
}
?>