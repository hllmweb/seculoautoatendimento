<?php
if (!defined('BASEPATH'))
    exit('Não é possível acessar a página!');

class Cielo{
	private $CI;
	private $ArquivoXML 	= "/application/logs/xml.log";
	private $PathArquivo 	= null;

	public function __construct(){
		$this->CI = &get_instance();
	}

	//abrindo o arquivo xml
	public function logAbrindoXML(){
		$this->CI = &get_instance();

		$this->PathArquivo = fopen(getcwd().$this->ArquivoXML, 'a');
	}

	//escrevendo conteúdo no arquivo xml
	public function logEscrevendoXML($Mensagem, $Transacao){
		$this->CI = &get_instance();

		if(!$this->$PathArquivo)
			$this->logAbrindoXML();

		$PathURI 	= $_SERVER["REQUEST_URI"];
        $Data 		= date("Y-m-d H:i:s:u (T)");

		$Log = "***********************************************" . "\n";
        $Log .= $Data . "\n";
        $Log .= "CD USUARIO: R.A" . "\n";
        $Log .= "DO ARQUIVO: " . $PathURI . "\n\t";
        $Log .= "OPERAÇÃO: " . $Transacao . "\n\t";
        $Log .= $Mensagem . "\n\n";
	

        fwrite($this->PathArquivo, $Log);
	}

	//enviando conteúdo para o arquivo xml
	public function logEnviarXML($Post, $Transacao){
		$this->logEscrevendoXML("Envio: ".$Post, $Transacao);
		$this->logEscrevendoXML("Resposta: ".$Resposta, $Transacao);
		return simplexml_load_string($Resposta);
	}

}

?>