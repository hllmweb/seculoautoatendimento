<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-login.css?v=').time(); ?>">

    <title><?= $title_page; ?></title>
</head>
<body>
    <div class="app-login">
        <!--inicio login-->
        <div class="app-logo">
            <a href="#"><img src="<?= base_url('assets/images/logo-seculo-positivo.png'); ?>"></a>
        </div>

        <div class="app-login-title">
            Acesse com sua <strong>Matricula</strong> e <strong>Senha</strong> ou com leitor do <strong>QRCODE</strong>
        </div>

        <div class="grid grid-template-2">
        
            <div class="grid-item">
                <form  method="POST" action="<?= base_url('painel/pagina'); ?>" id="form-login" class="form-login">
                    <div id="erro"></div>
                    <div id="restrito"></div>
                    <label for="senha">
        				<input type="text" name="idusuario" id="idusuario" class="app-input-text app-border-radius" placeholder="MATRICULA">
                    </label>
                    <label for="senha">
        				<input type="password" name="senha" id="senha" class="app-input-text app-border-radius" placeholder="SENHA">
        			</label>
        			<button class="app-btn app-enter app-border-radius">Entrar</button>
                </form>      
            </div>

            <div class="grid-item">
                QR Code
            </div>

        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
    <script>
        //mascara data nascimento
        // $("#senha").mask('99/99/9999',{placeholder:"DATA DE NASCIMENTO"});
        

        /*const pathname = window.location.href;
        const arr      = pathname.split("#");
        if(arr[1] == "erro"){ 
            $("#"+arr[1]).html("Senha Incorreta!");
        }else if(arr[1] == "restrito"){
            $("#"+arr[1]).html("Você não tem acesso!");
        }*/
    </script>
</body>
</html>