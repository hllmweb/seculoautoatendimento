<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_lockupfield extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //get produto
    function get_produto(){
        $this->db->select();
        $this->db->from('BD_APLICACAO.HD_PRODUTO');
        $this->db->where('ATIVO', 1); // 1= ATIVO; 0=DESATIVADO
        $this->db->order_by('DCPRODUTO', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //get categoria
    function get_categoria(){
        $this->db->select();
        $this->db->from('BD_APLICACAO.HD_CATEGORIA');
        $this->db->order_by('ORDEM','DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //get procedimento
    function get_procedimento(){
        $this->db->select();
        $this->db->from('BD_APLICACAO.HD_PROCEDIMENTO');
        $this->db->order_by('DCPROCEDIMENTO','ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //get status chamado
    function get_status_chamado(){
        $this->db->select();
        $this->db->from('BD_APLICACAO.HD_CHAMADO_STATUS');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //get localizacao
    function get_localizacao($p){
        $this->db->select();
        $this->db->from('BD_APLICACAO.HD_LOCALIZACAO');
        $this->db->where('ATIVO', 1);

        if($p['p_tipo_sessao'] == 'F'):        
        $this->db->where('PERMISSAO', 'F');
        endif;

        $this->db->order_by('ORDEM', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function get_usuarios($p){
        $this->db->select();
        $this->db->from('BD_APLICACAO.ACESSO_USUARIO');
        $this->db->where('TIPO', $p['p_tipo_sessao']);
        $this->db->order_by('NOME', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
?>