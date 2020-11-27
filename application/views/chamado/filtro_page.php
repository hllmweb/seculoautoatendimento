<?php foreach($lista_chamado as $row): ?>
    <a href="<?= base_url('chamado/pagina/ver')."/".$row['IDCHAMADO'] ?>" class="app-menu-link">
        <div class="app-row-flex">
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