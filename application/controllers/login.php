<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));

        //models
        $this->load->model('m_datamodule', 'datamodule', true);
    }
    
    function index() {       
        $data = array(
            'title_page' => 'SeculoHelpDesk - Login'
        );

        $this->load->view('login/index', $data);
    }

    function acessar(){
        $idusuario  = $this->input->get_post('idusuario');
        $senha      = str_replace('/',"",$this->input->get_post('senha'));

        $param = array(
            'p_operacao'    => 'AA',
            'p_idusuario'   => $idusuario,
            'p_opcao'       => null,
            'p_busca1'      => $senha,
            'p_busca2'      => null
        );

        $autenticar = $this->datamodule->sp_hd_chamado($param);
        
        if($autenticar == true):
            $this->session->set_userdata('IDUSUARIO',   $autenticar[0]['IDUSUARIO']);
            $this->session->set_userdata('TIPO',        $autenticar[0]['TIPO']);
            $this->session->set_userdata('NOME',        $autenticar[0]['NOME']);
            redirect('chamado/pagina/index');
        else:
            $this->session->unset_userdata('IDUSUARIO');
            $this->session->unset_userdata('TIPO');
            $this->session->unset_userdata('NOME');
            redirect('login/index#erro');
        endif;
    }


}