<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-default.css?v=').time(); ?>">


    <title><?= $title_page; ?></title>
</head>
<body>
    <div class="app-default">
        <!--header-->
        <div class="app-header">
            <div class="app-header-title app-flex">
                
                <div class="app-width-auto text-left">
                    <span class="text-name">{Nome do Usuário}</span>                        
                </div>

                <div class="app-width-auto text-right">
                    <span class="app-menu-toggle">
                       <i class="fas fa-bars"></i>
                    </span>
                   <span>Carrinho</span>
                </div>

            </div>
        </div>   


        <!--category-->
        <div class="app-category">
        	<ul class="app-category-list app-flex">
        		<li class="app-category-item">
	        		<a href="">
	        			<img src="<?= base_url('assets/images/cat-1.png'); ?>" class="app-category-item-img app-border">
	        			<span>Bebidas</span>
	        		</a>
        		</li>
				<li class="app-category-item">
					<a href="">
	        			<img src="<?= base_url('assets/images/cat-2.png'); ?>" class="app-category-item-img app-border">
	        			<span>Lanches</span>
	        		</a>
        		</li>
        	</ul>
        </div>


        <!--product-->
        <div class="app-product">
        	
        </div>




    </div>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
</body>
</html>