<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagina extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //libreris e helprs
        $this->load->helper(array('form', 'url', 'html', 'directory', 'funcoes_helper'));
        $this->load->library(array('session','form_validation', 'pagination','autenticacao'));
        
        //models
        // $this->load->model('m_datamodule', 'datamodule', true);
        // $this->load->model('m_lockupfield', 'lockupfield', true);
    }

   //painel
   function index() { 
       
        $data = array(
            'titulo_page'   => 'Século Chamado'
        );

        $this->load->view('painel/pagina', $data);
    }


 

}
