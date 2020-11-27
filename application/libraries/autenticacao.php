<?php 
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class CI_Autenticacao{
   protected $CI;
   
   public function __construct(){
      $this->CI =& get_instance();
      $this->CI->load->library(array('session'));
   }

   //verificador se o usuário tá logado
   public function verificador(){
      $idusuario = $this->CI->session->userdata('IDUSUARIO');
      $tipo      = $this->CI->session->userdata('TIPO');
            
      if($idusuario != true):      
          //$this->session->unset_userdata('IDUSUARIO');
          redirect(base_url('login/index#restrito'));
      endif;
  }

} 