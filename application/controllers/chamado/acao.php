<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acao extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //libreris e helprs
        $this->load->helper(array('form', 'url', 'html', 'directory'));
        $this->load->library(array('session','form_validation', 'autenticacao'));
        
        //models
        $this->load->model('m_dataaction', 'dataaction', true);
        $this->load->model('m_datamodule', 'datamodule', true);
    }

    //edit chamado 
    function edit_chamado(){
        $idchamado      = $this->input->get_post('p_idchamado');
        $titulo         = $this->input->get_post('p_titulo');
        $idlocalizacao  = $this->input->get_post('p_idlocalizacao');
        $urgencia       = $this->input->get_post('p_urgencia');
        $observacao     = $this->input->get_post('p_observacao');

        //$this->session->userdata('TIPO');
        

        $param = array(
            'p_titulo'          => $titulo,
            'p_idlocalizacao'   => $idlocalizacao,
            'p_urgencia'        => $urgencia,
            'p_observacao'      => $observacao,
            'p_idchamado'       => $idchamado
        );

        $update = $this->dataaction->update_chamado($param);
        if(!$update):
            echo "edit_chamado"; //Chamado Atualizado com Sucesso!
        endif;
    }


    function add_chamado(){
        $titulo         = $this->input->get_post('p_titulo');
        $idlocalizacao  = $this->input->get_post('p_idlocalizacao');
        $urgencia       = $this->input->get_post('p_urgencia');
        $observacao     = $this->input->get_post('p_observacao');
        $idusuario      = $this->session->userdata('IDUSUARIO');

        $param = array(
            'p_idusuario'       => $idusuario,
            'p_idstatus'        => 0,
            'p_titulo'          => $titulo,
            'p_idlocalizacao'   => $idlocalizacao,
            'p_urgencia'        => $urgencia,
            'p_observacao'      => $observacao
        );


        $insert = $this->dataaction->insert_chamado($param);
        if(!$insert):
            echo "add_chamado"; //Chamado Adicionado com Sucesso!
        endif;
    }


    function add_chamado_acao(){
        $idusuario_analista     = $this->input->get_post('p_idusuario_analista');//$this->session->userdata('IDUSUARIO');
        $idusuario              = $this->input->get_post('p_idusuario');
        $idchamado              = $this->input->get_post('p_idchamado');
        
        $idproduto        = $this->input->get_post('p_produto');
        $idcategoria      = $this->input->get_post('p_categoria');
        $idprocedimento   = $this->input->get_post('p_procedimento');
        $idstatus_chamado = $this->input->get_post('p_status_chamado');       
        $observacao       = $this->input->get_post('p_observacao');
        $previsaotermino  = $this->input->get_post('p_previsaotermino');
        $progresso        = $this->input->get_post('p_progresso');

        $param_select   = array(
            'p_operacao'    => 'LC',
            'p_idusuario'   => $this->session->userdata('IDUSUARIO'),
            'p_opcao'       => 2,  
            'p_pagina'      => null,                             //listagem individual
            'p_busca1'      => $idchamado,
            'p_busca2'      => null
        );
        $lista_chamado          = $this->datamodule->sp_hd_chamado($param_select);

        //if($this->session->userdata('TIPO') == 'A'):
        $param_update    = array(
            'p_idproduto'           => $idproduto,
            'p_idcategoria'         => $idcategoria,
            'p_idprocedimento'      => $idprocedimento,
            'p_idstatus'            => $idstatus_chamado,  
            'p_idchamado'           => $idchamado,
            'p_idusuario_analista'  => $idusuario_analista,
            'p_idusuario'           => $idusuario,
            'p_previsaotermino'     => $previsaotermino,
            'p_progresso'           => $progresso
        );

        $idusuario_sessao = ($this->session->userdata('TIPO') == 'A') ? $idusuario_analista : $idusuario; 

        $param_insert    = array(
            'p_idchamado'           => $idchamado,
            'p_idusuario'           => $idusuario_sessao,
            'p_observacao'          => $observacao
        );      


        /*if($this->session->userdata('TIPO') == 'F'):
            $param_update    = array(
                'p_idproduto'           => $idproduto,
                'p_idcategoria'         => $idcategoria,
                'p_idprocedimento'      => $idprocedimento,
                'p_idstatus'            => $idstatus_chamado,  
                'p_idchamado'           => $idchamado,
                'p_idusuario_analista'  => ''
            );

            $param_insert    = array(
                'p_idchamado'           => $idchamado,
                'p_idusuario'           => $lista_chamado[0]['IDUSUARIO'],
                'p_idusuario_analista'  => '',
                'p_observacao'          => $observacao
            );
            
            
            var_dump($param_update);
            echo "------";
            var_dump($param_insert);
        endif;*/
      



        $update     = $this->dataaction->update_chamado_acao($param_update);
        $insert     = $this->dataaction->insert_chamado_acao($param_insert);

        if(!$insert): 
            echo "add_chamado_acao";
        endif;



    }


}
?>