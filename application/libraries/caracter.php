<?php 
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class CI_Caracter{
   protected $CI;
   
   public function __construct(){
      $this->CI = &get_instance();
   }

   public function algo(){
	  //qualquer coisa...
	  
	  echo "teste";
   }

   public function verificar(){
      $CI->load->library(array('session'));
      $idusuario = $this->CI->session->userdata('IDUSUARIO');
      $senha     = $this->CI->session->userdata('SENHA');
      echo $idusuario.$senha;


      // if(empty($idusuario) && empty($senha)):
      //     $this->session->unset_userdata('IDUSUARIO');
      //     $this->session->unset_userdata('SENHA');
          
      //     redirect('login/index#erro');
      // endif;
  }
} 