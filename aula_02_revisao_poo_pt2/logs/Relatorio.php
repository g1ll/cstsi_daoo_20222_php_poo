<?php
namespace logs;

use classes\iFuncionario;
use classes\Pessoa;

class Relatorio {

	private $pessoas = [];

	public function add(Pessoa $pessoa)
	{
		$this->pessoas[]=$pessoa;
	}
	
	public function log(Pessoa $pessoa)
	{
		echo "\nlog: ".$pessoa."\n";
		if($pessoa instanceof iFuncionario)
		echo $pessoa->mostrarSalario()."\n"
			 .$pessoa->mostrarTempoContrato();
	}

	public function imprime(){
		echo "\n### RELATORIO ###\n";
		foreach ($this->pessoas as $pessoa)
			 $this->log($pessoa);
		echo "\n#############\n";
	}
}