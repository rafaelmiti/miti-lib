<?php
class MitiTratamento{
	public function htmlSpecialChars(&$valores,$charset='iso-8859-1'){
		if(!$valores){
			return;
		}
	
		if(is_array($valores)){
			$this->htmlspecialcharsArray($valores,$charset);
		}else{
			$this->htmlspecialcharsScalar($valores,$charset);
		}
	}
	
	private function htmlspecialcharsArray(&$valores,$charset){
		foreach($valores as $i=>$v){
			$valores[$i]=htmlspecialchars($v,ENT_QUOTES,$charset);
		}
	}
	
	private function htmlspecialcharsScalar(&$valores,$charset){
		$valores=htmlspecialchars($valores,ENT_QUOTES,$charset);
	}
	
	public function encurtar(&$valores,$tamanho=5){
		if(!$valores){
			return;
		}
	
		if(is_array($valores)){
			$this->encurtarArray($valores,$tamanho);
		}else{
			$this->encurtarScalar($valores,$tamanho);
		}
	}
	
	private function encurtarArray(&$valores,$tamanho){
		foreach($valores as $i=>$v){
			if(strlen($v)>$tamanho+2){
				$valores[$i]=substr($v,0,$tamanho).'...';
			}
		}
	}
	
	private function encurtarScalar(&$valores,$tamanho){
		if(strlen($valores)>$tamanho+2){
			$valores=substr($valores,0,$tamanho).'...';
		}
	}
	
	public function removerAcentos(&$valores){
		if(!$valores){
			return;
		}
	
		$acentos=array('�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�');
		$normais=array('a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','c','A','A','A','A','A','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','C');
		
		if(is_array($valores)){
			$this->removerAcentosArray($valores,$acentos,$normais);
		}else{
			$this->removerAcentosScalar($valores,$acentos,$normais);
		}
	}
	
	private function removerAcentosArray(&$valores,$acentos,$normais){
		foreach($valores as $i=>$v){
			$valores[$i]=str_replace($acentos,$normais,$v);
		}
	}
	
	private function removerAcentosScalar(&$valores,$acentos,$normais){
		$valores=str_replace($acentos,$normais,$valores);
	}
}