const base_url = window.location.protocol+"//"+window.location.host+"/SeculoAutoAtendimento";

//abrir modal
abrirModal = (element, page) =>{
	$("#modal").addClass("modal-ativo");
	$("#modal-tamanho").addClass(element);

	$("#modal-conteudo").load(page);
}

//tap form
modalTap = (element) => {
	$(element).toggleClass("enabled");
	let sel = element.getAttribute('data-toggle-target');		

	$(".modal-tab-content").removeClass("enabled").filter(sel).addClass("enabled");
	$(".modal-tab a").each(function(){
		if($(this).hasClass("enabled")){
			$(this).addClass("modal-tab-active");
			$(this).removeClass("enabled");			
		}else{
			$(this).removeClass("modal-tab-active");
			$(this).removeClass("enabled");
		}
	});

	return false;
}

editForm = (page, form) => {
	let dados = $(form).serialize();
	$.ajax({
		url: page,
		type: "POST",
		data: dados,
		success: (data) => {
			if(data == "edit_chamado"){
				alert("Chamado Atualizado com Sucesso!");
			}
			//console.log(data);
		},
		error: (error) => {
			console.log(error);
		}
	})


	return false;
}


addForm = (page, form) =>{
	let dados = $(form).serialize();
	$.ajax({
		url: page,
		type: 'POST',
		data: dados,
		success: (data) => {
			console.log(data);
			if(data == "add_chamado"){
				alert("Chamado Adicionado com Sucesso!");
				window.location.href = base_url+"/chamado/pagina/index";
			}else if(data == "add_chamado_acao"){
				alert("Ação Adicionada ao Chamado");
				window.location.reload();
			}
			
			
		},
		error: (error) => {
			console.log(error);
		}
	})

	return false;
}

//filtro de paginação
filtroPage = (page, element) => {
	let num_page = $(element).val();
	console.log(page+""+num_page);
	$.ajax({
		url: page,
		type: 'POST',
		data: {
			num_page: num_page
		},
		success: (data) => {
			$("#app-menu-page-1").html(data);
		}

	})
}

//filtro de status
filtroStatus = (page, element) => {
	let id_status_chamado = $(element).val();
	$.ajax({
		url: page,
		type: 'POST',
		data: {
			id_status_chamado: id_status_chamado
		},
		success: (data) => {
			$("#app-menu-page-1").html(data);
		}

	})
}

//fitro de busca por: id chamado, titulo, requerente ou analista
filtroSearch = (page, element) => {
	let p_search = $(element).val();
	
	$.ajax({
		url: page,
		type: 'POST',
		data: {
			p_search: p_search
		},
		success: (data) => {
			$("#app-menu-page-1").html(data);
		}
	});
}

$(document).on("click",".app-menu-toggle",function(){
	$("#app-menu").toggleClass("app-menu-active");
    $(".app-main").toggleClass("mascara");
});

//adicionar form
adicionarForm = (page, form) =>{
	let dados = $(form).serialize();
	$.ajax({
		url: page,
		type: 'POST',
		data: dados,
		success: (data) => {
			console.log(data);
			alert("Cadastro efetuado com sucesso!");
			$(form)[0].reset();
			$("#input-img label .url-img").attr("src","http://server01/SeculoPass/assets/images/img_error.png");
			$("#p_foto_componente").val("");
			$("#p_img_principal").val("");
		},
		error: (error) => {
			console.log(error);
		}
	})

	return false;
}

//fechar modal
fecharModal = () =>{
	$("#modal").removeClass("modal-ativo");
	$("#modal").find('#modal-tamanho').removeClass('modal-corpo-grande');
	$("#modal").find("#modal-tamanho").removeClass("modal-corpo-medio");
	$("#modal").find("#modal-tamanho").removeClass("modal-corpo-pequeno");
	$("#modal").find("#modal-conteudo").html("");	
}

//abre o toggle
abrirToggle = (props) =>{
	let id 		= $(props).attr("id");
	let id_sub 	= $(props).data("item");	
	$(props).each(() => {
		if($(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).hasClass("app-toggle-ativo")){
    		$(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).removeClass("app-toggle-ativo");
    		$(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).addClass("app-toggle");
    	}
    	$(props).nextAll("#"+id).toggleClass("app-toggle-ativo"); 
	})
}

//abre o sub toggle
abrirSubToggle = (props) =>{
	let id = $(props).data("item");

	$(props).each(() => {
		$(props).nextAll("#componente_"+id).toggleClass("app-toggle-ativo"); 
		$(props).nextAll("#componente_"+id).toggleClass("app-toggle");
	});

}

//upload de imagem
uploadImagem = (props, page) =>{
	let id 			= $(props).attr("id");
	let file 		= $("#"+id)[0].files[0];
	let file_path 	= $("#"+id).val(); 
	let file_name 	= $("#"+id)[0].files[0].name;

	$("#input-img label .url-img").attr("src", "http://server01/SeculoPass/arquivos/"+file_name);
	$("#"+id).attr("value", file_name);
	$("#p_img_principal").attr("value", file_name);

	let dados 		= new FormData();
	dados.append("file", file);

	$.ajax({
		url: page, 
		type: "POST",
		enctype: "multipart/form-data",
		data: dados,
		processData:false,
		contentType:false,
		cache:false,
		async:false,
		success: function(data){
			console.log(data);
			// alert("Upload Efetuado com Sucesso");
		}
	});


}