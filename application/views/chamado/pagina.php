<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <meta name="color-scheme" content="light dark">
        <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css?v=').time(); ?>">
        <title>Século - HelpDesk</title>
    </head>
    <body>
        <div class="app-main">
            <div class="app-header">
                <div class="app-header-title app-row-flex">
                    
                    <div class="width-auto text-left">
                        <span class="app-menu-toggle">
                           <i class="fas fa-bars"></i>
                        </span>
                       <span><?= $titulo_page; ?></span>
                    </div>
                    <div class="width-auto text-right">
                        <span class="text-name"><?= trim(substr($nome_user, 0, 7))."..."; ?></span>                        
                    </div>

                </div>
            </div>

            
            <div id="app-menu">
                <ul class="app-menu-list">
                    <li><span class="text-name"><?= trim(substr($nome_user, 0, 7))."..."; ?></span></li>

                    <li><a href="<?= base_url('chamado/pagina/index'); ?>"><i class="fas fa-home"></i> Início</a></li>
                    <li><a href="<?= base_url('chamado/pagina/adicionar') ?>"><i class="fas fa-plus"></i> Adicionar Chamado</a></li>
                    <li><a href="<?= base_url('chamado/pagina/sair'); ?>"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>



            <div class="app-content">
                <!--search
                <div class="app-search">
                    <input type="text" placeholder="Pesquisar..." class="input-search">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                </div>-->

                <div class="app-search">
                    <div class="app-row-flex">
                        <div class="width-auto">
                            <strong>Página</strong>
                            <select name="p_filtro_page" id="p_filtro_page" class="select-search" onchange="filtroPage('<?= base_url('chamado/pagina/filtro_page'); ?>',this); return false;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    
                        <div class="width-auto">
                            <strong>Status</strong> 
                            <select name="p_status_chamado" id="p_status_chamado" class="select-search" onchange="filtroStatus('<?= base_url('chamado/pagina/filtro_status'); ?>', this); return false;">
                                <option value="todos" selected="selected">Todos</option> 
                                <option value="0">Novo</option>
                                <option value="1">Atribuido ao Técnico</option>
                                <option value="2">Resolvido</option>
                                <option value="3">Aguard. Retorno do Requerente</option>
                                <option value="4">Cancelado</option>
                                <option value="5">Encerrado</option>
                            </select>
                        </div>

                        <div class="width-auto">
                            <strong>Pesquisa por: ID, Titulo, Requerente, Analista ou Produto</strong>
                            <input type="text" id="p_search" name="p_search" class="input-search" placeholder=" " onchange="filtroSearch('<?= base_url('chamado/pagina/filtro_search'); ?>', this); return false;"> 
                            <button class="btn-search"><i class="fas fa-search"></i></button>
                        </div>
               
                    </div>
                </div>

                <!--menu list-->
                <div class="app-menu" id="app-menu-page-1">
                    
                    <div class="app-row-flex app-row-bg-grey">
                        <div class="width-auto text-center font-10">
                            <strong>#ID</strong>
                        </div>
                        <div class="width-auto text-center font-10">
                            <strong>Titulo</strong>
                        </div>
                        
                        <div class="width-auto text-center font-10">
                            <strong>Requerente</strong>
                        </div>
                        
                        <div class="width-auto text-center font-10">
                            <strong>Titulo</strong>         
                        </div>

                        <div class="width-auto text-left font-10">
                            <strong>Data de Abertura</strong>
                        </div>

                        <div class="width-auto text-left font-10">
                            <strong>Última Atualização</strong>  
                        </div> 
                    </div> 
                

                    <?php foreach($lista_chamado as $row): ?>
                    <a href="<?= base_url('chamado/pagina/ver')."/".$row['IDCHAMADO'] ?>" class="app-menu-link">
                        <div class="app-row-flex app-none">
                            <div class="width-auto text-left font-10">
								<strong>#ID</strong>
								<span>#<?= $row['IDCHAMADO']; ?></span>
                            </div>
                            <div class="width-auto text-left font-10">
								<strong>Titulo</strong>
								<span><?= $row['TITULO']; ?></span>
                            </div>
                            
                            <div class="width-auto text-left font-10">
                                <strong>Requerente</strong>
                                <span class="width-text-80"><?= $row['NOME'] ?></span>
                            </div>
                            
                            <div class="width-auto text-center font-10">
                                <!-- <strong>Titulo</strong> -->
                                <?php 
                                    switch($row['IDSTATUS']):
                                        case 0:
                                            $status = 'btn-status-edit';
                                            break;
                                        case 1:
                                            $status = 'btn-status-spec';
                                            break;
                                        case 2:
                                            $status = 'btn-status-solution';
                                            break;
                                        case 3:
                                            $status = 'btn-status-rec';
                                            break;    
                                        case 4:
                                            $status = 'btn-status-cancel';
                                            break;     
                                        case 5:
                                            $status = 'btn-status-loading';
                                            break; 
                                        case 6:
                                            $status = 'btn-status-send';
                                            break; 
                                        case 7:
                                            $status = 'btn-status-order';
                                            break;        
                                    endswitch;
                                ?>
								<span><button class="btn-modal <?= $status; ?>"><?= $row['DCSTATUS']; ?></button></span>
                            </div>

                            <div class="width-auto text-left font-10">
								<strong>Data de Abertura</strong>
                                <span>
                                    <?php  
                                        echo $row['DTCADASTRO'];
                                        /*$dtcadastro = new DateTime($row['DTCADASTRO']); 
                                        echo $dtcadastro->format('d/m/Y H:i');*/
                                    ?>
                                </span>
                            </div>

                            <div class="width-auto text-left font-10">
								<strong>Última Atualização</strong>
								<span>
                                    <?php 
                                        if(empty($row['DTSTATUS'])):
                                            echo "-";
                                        else:
                                            echo $row['DTSTATUS'];
                                            /*$dtstatus = new DateTime($row['DTSTATUS']);
                                            echo $dtstatus->format('d/m/Y H:i');*/
                                        endif;
                                    ?>
                                </span>
                            </div>
                            


                            
                        </div>    
                    </a>
                    <?php endforeach; ?>
                  

                </div>


                <div class="app-search">
                    <div class="app-row-flex">
                        <div class="width-auto">
                            <strong>Página</strong>
                            <select name="p_filtro_page" id="p_filtro_page" class="select-search" onchange="filtroPage('<?= base_url('chamado/pagina/filtro_page'); ?>',this); return false;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    
                        <div class="width-auto">
                            <strong>Status</strong> 
                            <select name="p_status_chamado" id="p_status_chamado" class="select-search" onchange="filtroStatus('<?= base_url('chamado/pagina/filtro_status'); ?>', this); return false;">
                                <option value="todos" selected="selected">Todos</option> 
                                <option value="0">Novo</option>
                                <option value="1">Atribuido ao Técnico</option>
                                <option value="2">Resolvido</option>
                                <option value="3">Aguard. Retorno do Requerente</option>
                                <option value="4">Cancelado</option>
                                <option value="5">Encerrado</option>
                            </select>
                        </div>

                        <div class="width-auto">
                            <strong>Pesquisa por: ID, Titulo, Requerente ou Analista</strong>
                            <input type="text" id="p_search" name="p_search" class="input-search" placeholder=" " onchange="filtroSearch('<?= base_url('chamado/pagina/filtro_search'); ?>', this); return false;"> 
                            <button class="btn-search"><i class="fas fa-search"></i></button>
                        </div>
               
                    </div>
                </div>


            </div>

            <div class="button-float-right"><a href="<?= base_url('chamado/pagina/adicionar') ?>" class="btn btn-add-chamado"><i class="fas fa-plus"></i></a></div>
        </div>


        <!--modal ou popup-->
        <div id="modal" class="modal-geral">
            <div id="modal-tamanho">
                <div id="modal-conteudo"></div>
            </div>
        </div>

        <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/main.js') ?>"></script>

    </body>
</html>