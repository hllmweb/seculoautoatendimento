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
			<li><a href="<?= base_url('chamado/pagina/sair'); ?>"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
		</ul>
	</div>

	<!--Apenas Admin
	<div class="modal-tab app-row-flex">
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link modal-tab-active" data-toggle-target=".modal-tab-content-1">Chamado</a>
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link" data-toggle-target=".modal-tab-content-2">Ações</a>
	</div>-->

	<div class="modal-form">
		<!--formulário adicionar-->
		<div class="modal-tab-content modal-tab-content-1 enabled">
		<form id="form-chamado-adicionar">
			<div class="label-float">
				<input type="text" id="p_titulo" name="p_titulo" placeholder=" "/>
				<label>Titulo</label>
			</div>

			<div class="label-float">
				<select name="p_idlocalizacao" id="p_idlocalizacao" placeholder=" ">
					<option selected="selected"></option>
					<?php foreach($lista_localizacao as $row): ?>
					<option value="<?= $row['IDLOCALIZACAO']; ?>"><?= $row['DCLOCALIZACAO']; ?></option>
					<?php endforeach; ?>
				</select>
				<label>Localização</label>
			</div>

			<div class="label-float">
				<select name="p_urgencia" id="p_urgencia" placeholder=" ">
					<option value="A">Alta</option>
					<option value="M">Média</option>
					<option value="B">Baixa</option>
				</select>
				<label>Urgência</label>
			</div>

			<div class="label-float">
				<textarea name="p_observacao" id="p_observacao" placeholder=" "></textarea>
				<label>Observação</label>
			</div>
			
			<div class="label-btn">
				<button class="btn-width-auto btn-status-solution"  onclick="addForm('<?= base_url('chamado/acao/add_chamado'); ?>','#form-chamado-adicionar'); return false;"><i class="fas fa-plus"></i> Salvar</button>
			</div>
		</form>
		</div>



		<!--formulario acao-->
		<!--<div class="modal-tab-content modal-tab-content-2">
		<form id="form-chamado-acao">
			<div class="label-float">
				<select name="input-" id="input-">
					<option value="">item #01</option>
					<option value="">item #02</option>
					<option value="">item #03</option>
				</select>
				<label>Classificação</label>
			</div>

			<div class="label-float"> 
				<select name="input-status" id="input-status">
					<option value="">procedimento #01</option>
					<option value="">procedimento #02</option>
					<option value="">procedimento #03</option>
					<option value="">procedimento #04</option>
					<option value="">procedimento #05</option>
					<option value="">procedimento #06</option>
					<option value="">procedimento #07</option>
				</select>
				<label>Procedimentos</label>
			</div>

			<div class="label-float"> 
				<select name="input-status" id="input-status">
					<option value="">Solucionado</option>
					<option value="" selected>Em Atendimento</option>
				</select>
				<label>Status do Chamado</label>
			</div>

			<div class="label-float">
				<textarea name="input-descricao" id="input-descricao" placeholder=" "></textarea>
				<label>Descrição</label>
			</div>

			<div class="label-float">
				<button class="btn-width-auto btn-status-solution"><i class="fas fa-plus"></i> Adicionar</button>
			</div>	
		</form>

		<div class="row-flex">
			<div class="width-auto margin">
				<h3 class="row-box-title">{Titulo do Chamado #01}</h3>
				<div class="section-box border-left-client">
					<div class="section-box-title">{status do chamado} - {aberto por: NOME DO USUÁRIO}</div>
					<div class="section-box-content">{Problema no DataShow, não liga.}</div>
				</div>

				<div class="section-box border-left-clerk">
					<div class="section-box-title">{status do chamado} - {aberto por: NOME DO USUÁRIO}</div>
					<div class="section-box-content">{Problema no DataShow, não liga.}</div>
				</div>
			</div>
		</div>
		</div>-->


	</div>
	
	
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>

