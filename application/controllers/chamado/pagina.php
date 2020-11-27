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
        $this->load->model('m_datamodule', 'datamodule', true);
        $this->load->model('m_lockupfield', 'lockupfield', true);
    }

   //lista principal dos chamado 
   function index() { 
        //autenticação & protetor de acesso
        $this->autenticacao->verificador();

       
        /*$config['base_url'] = base_url('chamado/pagina');
        $config['total_rows'] = $this->datamodule->get_pagenacao()->num_rows();
        $config['per_page'] = 10;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);*/

        $param = array(
            'p_operacao' => 'LC',
            'p_idusuario'=> $this->session->userdata('IDUSUARIO'),
            'p_opcao'    => 1,                                      //listagem de todos
            'p_pagina'   => 1,
            'p_busca1'   => null,
            'p_busca2'   => null
        );

        
        $lista_chamado = $this->datamodule->sp_hd_chamado($param);

        //$pagina = $this->datamodule->get_pagenacao($qtde, $inicio)->result();

        $data = array(
            'titulo_page'   => 'Século Chamado',
            'lista_chamado' => $lista_chamado, 
            //'paginacao'     => $this->pagination->create_links(),
            'nome_user'     => $this->session->userdata('NOME')
        );

        $this->load->view('chamado/pagina', $data);
    }


    //paginacao
    function filtro_page(){
              //autenticação & protetor de acesso
              $this->autenticacao->verificador();

       
              /*$config['base_url'] = base_url('chamado/pagina');
              $config['total_rows'] = $this->datamodule->get_pagenacao()->num_rows();
              $config['per_page'] = 10;
      
              $qtde = $config['per_page'];
              ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
              $this->pagination->initialize($config);*/
      
              $num_page = $this->input->get_post('num_page');
      
              $param = array(
                  'p_operacao' => 'LC',
                  'p_idusuario'=> $this->session->userdata('IDUSUARIO'),
                  'p_opcao'    => 1,                                      //listagem de todos
                  'p_pagina'   => $num_page,
                  'p_busca1'   => null,
                  'p_busca2'   => null
              );
      
              
              $lista_chamado = $this->datamodule->sp_hd_chamado($param);
      
              //$pagina = $this->datamodule->get_pagenacao($qtde, $inicio)->result();
      
              $data = array(
                  'lista_chamado' => $lista_chamado
              );
      
              $this->load->view('chamado/filtro_page', $data);
    }

    function filtro_status(){
        //autenticação & protetor de acesso
        $this->autenticacao->verificador();

        $id_status_chamado = $this->input->get_post('id_status_chamado');

        if($id_status_chamado == "todos"){
            $p_opcao = 1;
        }else{
            $p_opcao = 4;
        }

        $param = array(
            'p_operacao' => 'LC',
            'p_idusuario'=> $this->session->userdata('IDUSUARIO'),
            'p_opcao'    => $p_opcao,                                      //listagem de todos
            'p_pagina'   => 1,
            'p_busca1'   => null,
            'p_busca2'   => $id_status_chamado
        );
        
        $lista_chamado = $this->datamodule->sp_hd_chamado($param);

        $data = array(
            'lista_chamado' => $lista_chamado
        );

        $this->load->view('chamado/filtro_page', $data);
    }

    function filtro_search(){
          //autenticação & protetor de acesso
          $this->autenticacao->verificador();

          
          $p_search = $this->input->get_post('p_search');
          $param = array(
            'p_operacao' => 'LC',
            'p_idusuario'=> $this->session->userdata('IDUSUARIO'),
            'p_opcao'    => 3,                                      //listagem de todos
            'p_pagina'   => 1,
            'p_busca1'   => null,
            'p_busca2'   => strtoupper($p_search)
        );
        

        $lista_chamado = $this->datamodule->sp_hd_chamado($param);

        $data = array(
            'lista_chamado' => $lista_chamado
        );

        $this->load->view('chamado/filtro_page', $data);

    }

    //ver chamado
    function ver($idchamado){

        //autenticação & protetor de acesso
        $this->autenticacao->verificador();
      
        $param_1 = array(
            'p_operacao'    => 'LC',
            'p_idusuario'   => $this->session->userdata('IDUSUARIO'),
            'p_opcao'       => 2,  
            'p_pagina'      => 1,                                   //listagem individual
            'p_busca1'      => $idchamado,
            'p_busca2'      => null
        );

        //se for F = lista apenas obs e insere o idusuario
        //se for A = lista todos insere id analista
        
        $param_2 = array(
            'p_operacao'    => 'LA',
            'p_idusuario'   => $this->session->userdata('IDUSUARIO'),
            'p_opcao'       => null,
            'p_pagina'      => null,
            'p_busca1'      => $idchamado,
            'p_busca2'      => null
        );     
    
        $lista_chamado          = $this->datamodule->sp_hd_chamado($param_1);
        $lista_chamado_acao     = $this->datamodule->sp_hd_chamado($param_2);
        $lista_produto          = $this->lockupfield->get_produto();
        $lista_categoria        = $this->lockupfield->get_categoria(); 
        $lista_procedimento     = $this->lockupfield->get_procedimento();
        $lista_status_chamado   = $this->lockupfield->get_status_chamado();


        $lista_usuario          = $this->lockupfield->get_usuarios(array('p_tipo_sessao' => 'F'));
        $lista_analista         = $this->lockupfield->get_usuarios(array('p_tipo_sessao' => 'A')); 

        $param_3 = array(
            'p_tipo_sessao'     => $lista_chamado[0]['TIPO']
        );
        $lista_localizacao      = $this->lockupfield->get_localizacao($param_3);
        
        // echo $this->session->userdata('TIPO');
        // echo "<br><br>";
        // var_dump($param_1);

        //echo "<br>------<br>";
        //var_dump($lista_chamado);

        $data = array(
            'titulo_page'           => 'Século HelpDesk - Visualizando Chamado',
            'tipo_sessao'           => $this->session->userdata('TIPO'), //$lista_chamado[0]['TIPO'],
            'nome_user'             => $this->session->userdata('NOME'),
            'lista_chamado'         => $lista_chamado,
            'lista_chamado_acao'    => $lista_chamado_acao,
            'lista_produto'         => $lista_produto,
            'lista_categoria'       => $lista_categoria,
            'lista_procedimento'    => $lista_procedimento,
            'lista_status_chamado'  => $lista_status_chamado,
            'lista_localizacao'     => $lista_localizacao,
            'lista_usuario'         => $lista_usuario,
            'lista_analista'        => $lista_analista
        );

        $this->load->view('chamado/ver', $data);
    }

    //adicionar chamado
    function adicionar(){

        //autenticação & protetor de acesso
        $this->autenticacao->verificador();

        $param_1 = array(
            'p_tipo_sessao'     => $this->session->userdata('TIPO')
        );
        $lista_localizacao      = $this->lockupfield->get_localizacao($param_1);

        $data = array(
            'titulo_page'       => 'Século Chamado - Adicionar Chamado',
            'lista_localizacao' => $lista_localizacao,
            'nome_user'         => $this->session->userdata('NOME'),
        );

        $this->load->view('chamado/adicionar', $data);
    }

    //sair chamado
    function sair(){
        $this->session->unset_userdata('IDUSUARIO');
        $this->session->unset_userdata('TIPO');
        $this->session->unset_userdata('NOME');

        $this->session->sess_destroy();
        redirect(base_url('login/index'));    
    }


}