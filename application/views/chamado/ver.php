<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<meta name="color-scheme" content="light dark">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
	<title><?= $titulo_page; ?></title>
</head>
<body>
	<!-- <div class="modal-titulo">
		<?php #$titulo_page; ?>
	</div> -->
	
	<div class="app-header">
		<div class="app-header-title app-row-flex">
			
			<div class="width-auto text-left">
				<span class="app-menu-toggle">
					<i class="fas fa-bars"></i>
				</span>
				<span>
					<a href="<?= base_url('chamado/pagina/index'); ?>" class="link-header font-12"><i class="fas fa-home"></i></a>
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
			<li><a href="<?= base_url('chamado/pagina/sair'); ?>"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
		</ul>
	</div>


	<!--Apenas Admin-->
	<div class="modal-tab app-row-flex">
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link modal-tab-active" data-toggle-target=".modal-tab-content-1">Chamado - <strong>#<?= $lista_chamado[0]['IDCHAMADO'] ?></strong> </a>
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link" data-toggle-target=".modal-tab-content-2">Analista</a>
	</div>

	<div class="modal-form">
		<!--formulário adicionar-->
		<div class="modal-tab-content modal-tab-content-1 enabled">
	
		<form id="form-chamado-edit">
			<div class="label-float">
				<input type="text" id="p_titulo" name="p_titulo" placeholder=" " value="<?= $lista_chamado[0]['TITULO']; ?>"/>
				<label>Titulo</label>
			</div>


			<div class="label-float">
				<select name="p_idlocalizacao" id="p_idlocalizacao" placeholder=" ">
					<option value="<?= $lista_chamado[0]['IDLOCALIZACAO']?>" selected="selected"><?= $lista_chamado[0]['DCLOCALIZACAO'] ?></option>
					<?php foreach($lista_localizacao as $row): ?>
					<option value="<?= $row['IDLOCALIZACAO']; ?>"><?= $row['DCLOCALIZACAO']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Localização</label>
			</div>


			<div class="label-float">
				<select name="p_urgencia" id="p_urgencia" placeholder=" ">
					<?php if($lista_chamado[0]['URGENCIA'] == "A"): ?>
						<option value="A" selected="selected">Alta</option>
						<option value="M">Média</option>
						<option value="B">Baixa</option>
					<?php endif; ?>

					<?php if($lista_chamado[0]['URGENCIA'] == "M"): ?> 
						<option value="A">Alta</option>
						<option value="M" selected="selected">Média</option>
						<option value="B">Baixa</option>
					<?php endif; ?>

					<?php if($lista_chamado[0]['URGENCIA'] == "B"): ?> 
						<option value="A">Alta</option>
						<option value="M">Média</option>
						<option value="B" selected="selected">Baixa</option>
					<?php endif; ?>

					<?php if(empty($lista_chamado[0]['URGENCIA'])): ?> 
						<option selected="selected"></option>
						<option value="A">Alta</option>
						<option value="M">Média</option>
						<option value="B" selected="selected">Baixa</option>
					<?php endif; ?>
				</select>
				<label>Urgência</label>
			</div>

			<div class="label-float">
				<textarea name="p_observacao" id="p_observacao" placeholder=" "><?= $lista_chamado[0]['OBSERVACAO']; ?></textarea>
				<label>Observação</label>
			</div>
			
			<div class="label-btn">
				<input type="hidden" id="p_idchamado" name="p_idchamado" value="<?= $lista_chamado[0]['IDCHAMADO']; ?>">
				<button class="btn-width-auto btn-status-solution" onclick="editForm('<?= base_url('chamado/acao/edit_chamado'); ?>','#form-chamado-edit'); return false;"><i class="fas fa-plus"></i> Salvar</button>
			</div>
		</form>
		</div>



		<!--formulario acao-->
		<div class="modal-tab-content modal-tab-content-2">
		<form id="form-chamado-acao">

			<?php if($tipo_sessao == "A"): ?>
			
			<div class="app-row-destaque">
			<h4>Parecer do Analista</h4>	
			
			<div class="label-float">
				<select name="p_produto" id="p_produto">
					<option value="<?= $lista_chamado[0]['IDPRODUTO']; ?>" selected="selected"><?= $lista_chamado[0]['DCPRODUTO']; ?></option>
					<?php foreach($lista_produto as $row): ?>
					<option value="<?= $row['IDPRODUTO']; ?>"><?= $row['DCPRODUTO']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Produto</label>
			</div>
			
			<div class="label-float">
				<select name="p_categoria" id="p_categoria">
					<option value="<?= $lista_chamado[0]['IDCATEGORIA']; ?>" selected="selected"><?= $lista_chamado[0]['DCCATEGORIA']?></option>
					<?php foreach($lista_categoria as $row): ?>
					<option value="<?= $row['IDCATEGORIA']; ?>"><?= $row['DCCATEGORIA']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Classificação</label>
			</div>

			<div class="label-float"> 
				<select name="p_procedimento" id="p_procedimento">
					<option value="<?= $lista_chamado[0]['IDPROCEDIMENTO']; ?>" selected="selected"><?= $lista_chamado[0]['DCPROCEDIMENTO'] ?></option>
					<?php foreach($lista_procedimento as $row): ?>
					<option value="<?= $row['IDPROCEDIMENTO']; ?>"><?= $row['DCPROCEDIMENTO']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Procedimentos</label>
			</div>

			<div class="label-float"> 
				<select name="p_status_chamado" id="p_status_chamado">
					<option value="<?= $lista_chamado[0]['IDSTATUS']; ?>" selected="selected"><?= $lista_chamado[0]['DCSTATUS']; ?></option>
					<?php foreach($lista_status_chamado as $row): ?>
					<option value="<?= $row['IDSTATUS']; ?>"><?= $row['DCSTATUS']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Status do Chamado</label>
			</div>

			
			<div class="label-float"> 
				<select name="p_idusuario" id="p_idusuario">
					
					<option value="<?= $lista_chamado[0]['IDUSUARIO']; ?>" selected="selected"><?= $lista_chamado[0]['NOME']; ?></option>

					<?php if($tipo_sessao == 'A'): ?>
					<?php foreach($lista_usuario as $row): ?> 
					<option value="<?= $row['IDUSUARIO']; ?>"><?= $row['NOME']; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>

				</select>
				<label>Requerente</label>
			</div>

			<div class="label-float"> 
				<select name="p_idusuario_analista" id="p_idusuario_analista">
					<option value="<?= $lista_chamado[0]['IDUSUARIO_ANALISTA']; ?>" selected="selected"><?= $lista_chamado[0]['NOME_ANALISTA']; ?></option>

					<?php if($tipo_sessao == 'A'): ?>
					<?php foreach($lista_analista as $row): ?> 
					<option value="<?= $row['IDUSUARIO']; ?>"><?= $row['NOME']; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>

				</select>
				<label>ANALISTA</label>
			</div>

			<div class="label-float"> 
				<input type="text" id="p_previsaotermino" name="p_previsaotermino" placeholder=" " value="<?= $lista_chamado[0]['PREVISAOTERMINO']; ?>">
				<label>Previsão do Termino (DD/MM/YYYY HH:MM)</label>
			</div>			
			
			<div class="label-float">
				<input type="text" id="p_progresso" name="p_progresso" placeholder=" " value="<?= $lista_chamado[0]['PROGRESSO']; ?>">
				<label>Progresso</label>
			</div>
			
			</div>
			<?php endif; ?>

		
			<div class="app-row-destaque">
				<h4>Histórico de Ações</h4>
				<div class="label-float">
					<textarea name="p_observacao" id="p_observacao" placeholder=" "></textarea>
					<label>Informe uma Ação:</label>
				</div>
			</div>	

			<div class="label-float">
				<?php if($tipo_sessao == "F"): ?>
					<input type="hidden" id="p_idusuario_analista" name="p_idusuario_analista" value="<?= (empty($lista_chamado[0]['IDUSUARIO_ANALISTA'])) ? '': $lista_chamado[0]['IDUSUARIO_ANALISTA']; ?>">
					<input type="hidden" id="p_idusuario" name="p_idusuario" value="<?= $lista_chamado[0]['IDUSUARIO']; ?>">
				<?php endif; ?>
				<input type="hidden" id="p_idchamado" name="p_idchamado" value="<?= $lista_chamado[0]['IDCHAMADO']; ?>">
				<button class="btn-width-auto btn-status-solution" onclick="addForm('<?= base_url('chamado/acao/add_chamado_acao'); ?>', '#form-chamado-acao'); return false;"><i class="fas fa-plus"></i> Salvar</button>
			</div>	
		</form>

		<div class="row-flex">
			<div class="width-auto margin">
				<?php 
					switch($lista_chamado[0]['IDSTATUS']):
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
							$status = 'btn-status-cancel';
							break;    
					endswitch;
				?>
				<h3 class="row-box-title">
					<?= $lista_chamado[0]['TITULO']; ?>  <button class="btn-modal <?= $status; ?>"><?= $lista_chamado[0]['DCSTATUS']; ?></button> 
				</h3>
				<?php foreach($lista_chamado_acao as $row): ?>
				<div class="section-box border-left-client">
					<div class="section-box-title">Responsável: <?= $row['NOME']; ?></div>
					<div class="section-box-content"><?= $row['DCACAO']; ?></div>
				</div>
				<?php endforeach; ?>

				<!--<div class="section-box border-left-clerk">
					<div class="section-box-title">{responsável: NOME DO USUÁRIO}</div>
					<div class="section-box-content">{Problema no DataShow, não liga.}</div>
				</div>-->



			</div>
		</div>




		</div>


	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js?v=').time(); ?>"></script>
</body>
</html>

