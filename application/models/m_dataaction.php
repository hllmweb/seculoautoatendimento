<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dataaction extends CI_Model {
   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //edit chamado
    function update_chamado($p){
        $data = array(
            'TITULO'        =>  $p['p_titulo'],
            'IDLOCALIZACAO' =>  $p['p_idlocalizacao'],
            'URGENCIA'      =>  $p['p_urgencia'],
            'OBSERVACAO'    =>  $p['p_observacao']
        );

        $this->db->where('IDCHAMADO', $p['p_idchamado']);
        $this->db->update('BD_APLICACAO.HD_CHAMADO', $data);
        $this->db->close();
    }


    //insert chamado
    function insert_chamado($p){
        $data = array(
            'IDUSUARIO'             => $p['p_idusuario'],
            'IDSTATUS'              => $p['p_idstatus'],
            'TITULO'                => $p['p_titulo'],
            'IDLOCALIZACAO'         => $p['p_idlocalizacao'],
            'URGENCIA'              => $p['p_urgencia'],
            'OBSERVACAO'            => $p['p_observacao'] 
        );

        $this->db->insert('BD_APLICACAO.HD_CHAMADO', $data);
        $this->db->close();
    }

    //update ação do chamado
    function update_chamado_acao($p){        
        $data = array(
            'IDPRODUTO'             =>  $p['p_idproduto'],
            'IDCATEGORIA'           =>  $p['p_idcategoria'],
            'IDPROCEDIMENTO'        =>  $p['p_idprocedimento'],
            'IDSTATUS'              =>  $p['p_idstatus'],
            'IDUSUARIO_ANALISTA'    =>  $p['p_idusuario_analista'],
            'IDUSUARIO'             =>  $p['p_idusuario'],
            'PREVISAOTERMINO'       =>  $p['p_previsaotermino'],
            'PROGRESSO'             =>  $p['p_progresso']
        );
        
        $this->db->where('IDCHAMADO', $p['p_idchamado']);
        $this->db->update('BD_APLICACAO.HD_CHAMADO', $data);
        $this->db->close();
    }
    
    //insert ação do chamado
    function insert_chamado_acao($p){
        $data = array(
            'IDCHAMADO'             => $p['p_idchamado'],
            'IDUSUARIO'             => $p['p_idusuario'],
            'DCACAO'                => $p['p_observacao']
        );

        $this->db->insert('BD_APLICACAO.HD_CHAMADO_ACAO', $data);
        $this->db->close();
    }

    // #INSERE ESPAÇO
    // function set($p){  
    // 	$data = array(
    //         'IDEMPRESA'         => $p['p_id_empresa'],
    //         'DESCRICAO'         => $p['p_descricao']
    //     );
        
    //     $this->db->insert($this->table, $data);
    //     $this->db->close();
    // }

    // #DELETA ESPAÇO
    // function del($p){
    //     $this->db->where("IDESPACO", $p['p_idespaco']);
    //     $this->db->delete($this->table);
    // }

}