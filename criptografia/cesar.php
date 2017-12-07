<?php
function converter($texto) { // Converte caracteres com acento ou com capslock para formato minúsculo e sem acentos.
	// Caso o texto possua um destes caracteres da primeira lista, substitui pelo da segunda.
	$texto1 = strtr(utf8_decode($texto),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ+'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy-');
	return strtolower($texto1); // Transforma o texto em formato minúsculo (lowercase) e retorna o resultado
}
function criptografia($t, $d) { // Função para criptografia
	// Define lista de caracteres do alfabeto
	$a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
	$converted = converter($t); // Converte o texto recebido
	$b = str_split($converted); // Cria uma lista com os caracteres separados
	$num = strlen($converted); // Conta o número de caracteres do texto
	$max = count($a) - 1; // Define o valor máximo como o total de letras possíveis menos 1 (por causa do caractere espaço)
	for($i=0; $i<$num; ++$i){ // Enquanto valor for menos que o número de caracteres do texto, executa (loop)
		if($b[$i] == in_array($b[$i], $a)){ // Se o caractere procesado estiver na lista de caracteres aceitos, prossegue
			foreach($a as $chave => $valor){ // Converte letras para números de acordo com a ordenação da letra na lista do alfabeto
				if($b[$i] == $valor){
				$c[$valor] = $chave;
				}
			}
		}
	}
	for($i=0; $i < $num ; $i++) {
   		$number = $c[$b[$i]]; // Usa o resultado da conversão de letra em número
   		if ($number == '26') { // Se o caractere for o número 26 (No caso é o espaço)
   			$last = ' '; // Define que a letra é um espaço
   		} else {
	   		if ($d < 0) { // Se o número for negativo
	   		$final = $number + $d; // Soma o número com o valor de deslocamento (4 + (-1))
	   		} else { // Se for positivo
	   		$final = $number + $d; // Soma o número com o valor de deslocamento
	   		}
	   		if ($final < 0) { // Se o valor final for menor que zero
				$last = $a[$final + $max]; // Procura a letra com o valor somando o valor final com o número máximo (no caso 26)
	   		} elseif ($final > $max - 1) { // Caso o valor final seja maior que o valor máximo menos 1 (O 1 refere-se graças a lista apresentar 27 itens, mas ela começa a contar do 0, não do 1)
	   			$last = $a[$final - $max]; // Define a letra cujo valor final menos o valor máximo corresponde
	   		} else { // Ou então
	   			$last = $a[$final]; // Caso ele seja um número maior que 0 e menor que o máximo (26) prossegue
	   		}
   		}
   		echo $last; // Exibe o resultado final (letra por letra)
	}
}
function descriptografia($t, $d) { // Função para descriptografia
	// Define lista de caracteres do alfabeto
	$a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
	$converted = converter($t); // Converte o texto recebido
	$b = str_split($converted); // Cria uma lista com os caracteres separados
	$num = strlen($converted); // Conta o número de caracteres do texto
	$max = count($a) - 1; // Define o valor máximo como o total de letras possíveis menos 1 (por causa do caractere espaço)
	for($i=0; $i<$num; ++$i){ // Enquanto valor for menos que o número de caracteres do texto, executa (loop)
		if($b[$i] == in_array($b[$i], $a)){ // Se o caractere procesado estiver na lista de caracteres aceitos, prossegue
			foreach($a as $chave => $valor){ // Converte letras para números de acordo com a ordenação da letra na lista do alfabeto
				if($b[$i] == $valor){
				$c[$valor] = $chave;
				}
			}
		}
	}
	for($i=0; $i < $num ; $i++) {
   		$number = $c[$b[$i]]; // Usa o resultado da conversão de letra em número
   		if ($number == '26') { // Se o caractere for o número 26 (No caso é o espaço)
   			$last = ' '; // Define que a letra é um espaço
   		} else {
	   		if ($d < 0) { // Se o número for negativo
	   		$final = $number - $d; // Soma o número com o valor de deslocamento (4 + (-1))
	   		} else { // Se for positivo
	   		$final = $number - $d; // Soma o número com o valor de deslocamento
	   		}
	   		if ($final < 0) { // Se o valor final for menor que zero
				$last = $a[$final + $max]; // Procura a letra com o valor somando o valor final com o número máximo (no caso 26)
	   		} elseif ($final > $max - 1) { // Caso o valor final seja maior que o valor máximo menos 1 (O 1 refere-se graças a lista apresentar 27 itens, mas ela começa a contar do 0, não do 1)
	   			$last = $a[$final - $max]; // Define a letra cujo valor final menos o valor máximo corresponde
	   		} else { // Ou então
	   			$last = $a[$final]; // Caso ele seja um número maior que 0 e menor que o máximo (26) prossegue
	   		}
   		}
   		echo $last; // Exibe o resultado final (letra por letra)
	}
}
?>