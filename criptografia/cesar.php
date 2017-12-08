<?php
	$tamanhoAlfabeto=256;
	//deslocamento
	$n=2;
	//ficaram fora
	$fora = 32;


	$aCriptografia = "frase de teste";
	$Criptografia = '';
	$desCriptografada = '';

	//varre todos os carcteres do test
	for ($i=0; $i < strlen($aCriptografia); $i++) { 
	//obtem o codigo do caractere atual
		$key= ord($aCriptografia[$i]);
	
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
//-------------------------------------------------------------
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

?>