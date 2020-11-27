<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_datamodule extends CI_Model {
    public $schema;
    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->schema   = "BD_APLICACAO";
        $this->stored   = "SP_HD_CHAMADO";
    }

    #pl/sql
    function sp_hd_chamado($p){
        $cursor = '';
        $dados = array(
            array('name'    =>  ':P_OPERACAO',         'value' => $p['p_operacao']),
            array('name'    =>  ':P_IDUSUARIO',        'value' => $p['p_idusuario']),
            array('name'    =>  ':P_OPCAO',            'value' => $p['p_opcao']),
            array('name'    =>  ':P_PAGINA',           'value' => $p['p_pagina']),
            array('name'    =>  ':P_BUSCA1',           'value' => $p['p_busca1']),
            array('name'    =>  ':P_BUSCA2',           'value' => $p['p_busca2']),
            array('name'    =>  ':P_CURSOR',           'value' => $cursor, 'type' => OCI_B_CURSOR)
        );
        
        $query = $this->db->procedure($this->schema,$this->stored, $dados);
        return $query;
    }


    function get_pagenacao($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        return $this->db->get('BD_APLICACAO.HD_CHAMADO');
    }

}