<?php require_once("site_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();
$codigo_texto = protege(1);

//consulta textos do produto
$sql_consulta_texto = "SELECT codigo_texto, titulo, subtitulo, banner, arquivo, texto, status FROM texto WHERE codigo_texto = '".$codigo_texto."'";
$result = $pdo->query( $sql_consulta_texto );
$texto = $result->fetch( PDO::FETCH_ASSOC );

//consulta fabricantes
$sql_consulta_fabricantes = "SELECT fabricante.codigo_fabricante, fabricante.nome_fabricante, fabricante.area_atuacao, fabricante.arquivo, fabricante.status FROM fabricante WHERE fabricante.status = 'L'";
$result = $pdo->query( $sql_consulta_fabricantes );
$fabricantes = $result->fetchAll( PDO::FETCH_ASSOC );

//consulta categorias
$sql_consulta_categorias = "SELECT codigo_categoria, nome_categoria, status FROM categoria WHERE status = 'L' ORDER BY nome_categoria ASC";
$result = $pdo->query( $sql_consulta_categorias );
$categorias = $result->fetchAll( PDO::FETCH_ASSOC );

//consulta produtos
$sql_consulta_produto = "SELECT produto.codigo_produto, produto.nome_produto, produto.valor_produto, produto.estoque_produto, produto.situacao_produto, produto.referencia_produto, foto_produto.arquivo_foto
							FROM foto_produto
							LEFT JOIN produto ON foto_produto.codigo_produto = produto.codigo_produto
							LEFT JOIN produto_categoria ON produto.codigo_produto = produto_categoria.codigo_produto
							LEFT JOIN produto_subcategoria ON produto.codigo_produto = produto_subcategoria.codigo_produto
							WHERE produto.situacao_produto = 'L' GROUP BY foto_produto.codigo_foto ORDER BY produto.nome_produto ASC";
							$result = $pdo->query($sql_consulta_produto);
							$produtos = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Ameripel Representações é uma empresa de representação comercial que atua há mais de 20 anos na região de Mato Grosso, tendo como foco de atendimento o setor de papelaria e informática.">
	<!-- Meta Keyword -->
	<meta name="keywords" content="representação comercial">

	<meta name="twitter:image" content="https://www.ameripel.com.br/img/logo-ameripel.jpg">

	<meta property="og:url" content="https://www.ameripel.com.br" />
	<meta property="og:title" content="Ameripel Representações - À mais de 20 anos representando qualidade" />
	<meta property="og:description" content="A Ameripel Representações é uma empresa de representação comercial que atua há mais de 20 anos na região de Mato Grosso, tendo como foco de atendimento o setor de papelaria e informática." />
	<meta property="og:image" content="https://www.ameripel.com.br/img/logo-ameripel.jpg" />

	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="1067">
	<meta property="og:image:height" content="600">


	<meta property="og:type" content="website">

    <title>Ameripel Representações - À mais de 20 anos representando qualidade</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Off Canvas-->
	<link href="css/bootstrap.offcanvas.min.css" rel="stylesheet">
    <!-- Animate CSS -->
	<link href="css/animate.css" rel="stylesheet">
	<!--Fancybox-->
	<link href="css/jquery.fancybox.css" rel="stylesheet">
	<!--YTPlayer-->
	<link href="css/YTPlayer.css" rel="stylesheet">
	<!-- font-awesome-->
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<!--Chosen-->
	<link href="css/chosen.css" rel="stylesheet">
	<!--Time picker-->
	<link href="css/bootstrap-timepicker.min.css" rel="stylesheet">
	<!--Date picker-->
	<link href="css/datepicker.css" rel="stylesheet">
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,700" rel="stylesheet">
	<!-- Main CSS -->
	<link href="style.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top">
	<!--Preload-->
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	
    <!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#navbar">
							<span class="sr-only">Toggle navigation</span>
							<span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</span>
						</button>
						<div class="logo">
							<a class="navbar-brand page-scroll" href="index.php"><img src="img/logo.png" alt="Logo"></a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="navbar-offcanvas navbar-offcanvas-touch" id="navbar">
						<ul class="nav navbar-nav navbar-right">
							<li class="active">
								<a class="page-scroll" href="#page-top">Página inicial</a>
							</li>
							<li>
								<a class="page-scroll" href="#about-us">Quem somos</a>
							</li>
							<li>
								<a class="page-scroll" href="#doctors">Representadas</a>
							</li>
							<li>
								<a class="page-scroll" href="#portfolio">Lançamentos</a>
							</li>
							<li>
								<a class="page-scroll" href="#contact-us">Fale conosco</a>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
			</div>
			
		</div>
		<!-- /.container -->
	</nav>
	
	<!-- Banner -->
	<div id="banner" class="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active" style="background-image:url(img/banner/1.jpg);">
				<div class="caption-info">
					<div class="container">
						<div class="row">
							<div class="col-sm-7 col-md-5 col-lg-4">
								<div class="caption-info-inner">
									<h1 class="animated fadeInUp"><?php echo $texto["titulo"];?></h1>
									<p class="animated fadeInUp"><?php echo $texto["subtitulo"];?></p>
									<a href="#about-us" class="animated fadeInUp btn btn-primary page-scroll">Saiba mais</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end carousel-inner-->
	</div>
	<!--End Banner -->
	
	<!-- About Us -->
	<section id="about-us" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1><?php echo $texto["titulo"];?></h1>
						<p><?php echo $texto["subtitulo"];?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-5">
					<div class="single-img wow fadeIn">
						<img src="conteudos/texto/<?php echo $texto["arquivo"];?>" alt="">
					</div>
				</div>
				<div class="col-xs-12 col-md-7">
					<div class="text-block wow fadeIn">
						<p><?php echo $texto["texto"];?></p>
					</div>					
				</div>
			</div>
			
		</div>
	</section>
	<!-- End About Us -->
	
	<!-- Services 
	<section id="services" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Services</h1>
						<p>Lorem Ipsum is simply dummy text of the printing and</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/1.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/1.jpg" alt="">
							</div>
							<h3>Cleanings</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/2.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/2.jpg" alt="">
							</div>
							<h3>Crowns &amp; bridges</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/3.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/3.jpg" alt="">
							</div>
							<h3>Root canals</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/4.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/4.jpg" alt="">
							</div>
							<h3>Cosmetic dentistry</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/5.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/5.jpg" alt="">
							</div>
							<h3>Dental implants</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-4">
					<div class="service-list wow fadeIn">
						<div class="thumb">
							<img src="img/services/6.jpg" alt="">
						</div>
						<div class="service-info">
							<div class="doctor-thumb">
								<img src="img/doctors/6.jpg" alt="">
							</div>
							<h3>Whitening</h3>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	 End Services -->
	
	<!-- Doctors -->
	<section id="doctors" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Representadas</h1>
						<p>Confira abaixo todas as empresas com as quais trabalhamos</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<?php foreach($fabricantes AS $fabricante):?>
				<div class="col-xs-6 col-sm-3">
					<div class="doctor-list wow fadeIn">
						<div class="thumb">
							<img src="conteudos/fabricante/<?php echo $fabricante["arquivo"];?>" alt="">
							<div class="overlay">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
						<span class="name"><?php echo $fabricante["nome_fabricante"];?></span>
						<span class="designation"><?php echo $fabricante["area_atuacao"];?></span>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
			
		</div>
	</section>
	<!-- End Doctors -->
	
	<!-- Fun Facts -->
	<section id="fun-facts" class="section-padding parallax-bg" style="background-image: url(img/bg/1.jpg);">
		<div class="container">
			
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="fun-facts-info wow fadeInUp">
						<i class="fa fa-calendar"></i>
						Mais de <span class="counter">20</span><h4> anos no mercado de representação comercial</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Fun Facts -->
	
	<!-- Portfolio -->
	<section id="portfolio" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Lançamentos</h1>
						<p>Confira os melhores lançamentos de nossas empresas representadas</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<ul id="filter-list">
						<li class="filter" data-filter="all">Todas as Categorias</li>
						<?php foreach($categorias as $categoria):?>
						<li class="filter" data-filter="<?php echo url_amigavel($categoria["nome_categoria"]);?>"><?php echo $categoria["nome_categoria"];?></li>
						<?php endforeach;?>
					</ul><!-- @end #filter-list -->
				</div>
				
				<div class="col-xs-12">
					<ul class="portfolio_items">
						<?php 
							foreach($produtos as $produto):
							//consulta categorias
							$sql_consulta_categorias = "SELECT categoria.nome_categoria FROM categoria 
														JOIN produto_categoria ON produto_categoria.codigo_categoria = categoria.codigo_categoria
														WHERE produto_categoria.codigo_produto = '".$produto["codigo_produto"]."'";
							$result = $pdo->query( $sql_consulta_categorias );
							$categorias = $result->fetchAll( PDO::FETCH_ASSOC );
						?>
						<li class="<?php foreach($categorias as $categoria): echo url_amigavel($categoria["nome_categoria"])." ";endforeach;?>">
							<div class="post_thumb">
								<img src="conteudos/produto/<?php echo $produto["codigo_produto"];?>/<?php echo $produto["arquivo_foto"];?>" alt="" />
								<div class="portfolio-overlay">
									<div class="overlay-inner">
										<a href="conteudos/produto/<?php echo $produto["codigo_produto"];?>/<?php echo $produto["arquivo_foto"];?>" class="fancybox"><i class="fa fa-camera"></i></a>
									</div>
								</div>
							</div><!--end post thumb-->
						</li>
						<?php $result->closeCursor(); endforeach;?>
						
					</ul>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Portfolio -->
	
	<!--

	<section id="blog" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Publicações</h1>
						<p>Notícias e eventos importantes para o seguimento</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/1.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Morbi accumsan ipsum velit</a></h3>
							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/2.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Auctor accumsan ipsum velit</a></h3>

							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Auctor accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/3.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Velit accumsan ipsum velit</a></h3>
							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Velit accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/4.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Tellus accumsan ipsum velit</a></h3>
							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Tellus accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/5.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Ornare accumsan ipsum velit</a></h3>
							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Ornare accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-4">
					<div class="blog-post wow fadeIn">
						<div class="post-thumb">
							<a href="#">
								<img src="img/blog/6.jpg" alt="">
							</a>
							<span class="post-date">Aug 5, 2016</span>
						</div>
						<div class="post-info">
							<h3><a href="#">Sed accumsan ipsum velit</a></h3>
							<ul class="entry-meta">
								<li class="meta-author"><i class="fa fa-user"></i> <a href="#">admin</a></li>
								<li class="meta-categories"><i class="fa fa-folder-o"></i><a href="#" rel="category tag">Uncategorized</a></li>
							</ul>
							<p>Sed accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit.</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Blog -->
	
	<!-- Testimonials 
	<section id="testimonials" class="section-padding parallax-bg" style="background-image: url(img/bg/2.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
					<div id="testimonial-carousel" class="carousel slide" data-ride="carousel" data-pause="false">
						<!-- Wrapper for slides 
						<div class="carousel-inner" role="listbox">
							<div class="item active text-center">
								<div class="testi-author">
									<img src="img/testimonials/1.jpg" alt="">
								</div>
								<div class="testi-comments">
									<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
								</div>
								<span class="name">Jhon Smith</span>
								<span class="designation">Social Worker</span>
							</div>
							
							<div class="item text-center">
								<div class="testi-author">
									<img src="img/testimonials/2.jpg" alt="">
								</div>
								<div class="testi-comments">
									<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
								</div>
								<span class="name">Jhon Smith</span>
								<span class="designation">Social Worker</span>
							</div>
							
							<div class="item text-center">
								<div class="testi-author">
									<img src="img/testimonials/1.jpg" alt="">
								</div>
								<div class="testi-comments">
									<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris itae erat conuat</p>
								</div>
								<span class="name">Jhon Smith</span>
								<span class="designation">Social Worker</span>
							</div>
							
						</div>
						
						<ol class="carousel-indicators">
							<li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#testimonial-carousel" data-slide-to="1"></li>
							<li data-target="#testimonial-carousel" data-slide-to="2"></li>
						</ol>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonials -->
	
	<!-- Contact Us -->
	<section id="contact-us" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h1>Entre em contato</h1>
						<p>Para entrar em contato conosco, preencha o formulário abaixo ou pelas nossas redes sociais</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<form id="contactForm" class="contact-form" data-toggle="validator" method="post">
						<div class="row">
							<div class="col-sm-12 col-sm-6">
								<div class="form-group">
									<input placeholder="Nome" id="nome" class="form-control" name="nome" type="text" required data-error="Por favor, insira seu nome">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-sm-12 col-sm-6">
								<div class="form-group">
									<input placeholder="Telefone" id="telefone" class="form-control" name="telefone" type="text">
								</div>
							</div>
						</div>
						<div class="form-group">
							<input placeholder="Email" id="email" class="form-control" name="email" type="email" required data-error="O campo e-mail não pode ser vazio"> 
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<textarea placeholder="Sua mensagem" id="mensagem" cols="20" rows="6" class="form-control" required data-error="Digite aqui sua mensagem"></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<input value="Enviar Formulário" name="submit" class="btn btn-default" type="submit">
						<div id="msgSubmit" class="h3 text-center hidden"></div>
					</form>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="map" id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15374.307096208988!2d-56.0348186!3d-15.5608029!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd42d93f95b4e0231!2sAmeripel!5e0!3m2!1spt-BR!2sbr!4v1554146214492!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
				</div>
			</div>
			
			<div class="row">

				<div class="col-xs-12">
					<ul class="contact-block">
						<li>
							<div class="contact-list">
								<i class="fa fa-whatsapp"></i>
								<div class="contact-info">
									<p>Whatsapp:65 99943-6100</p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-list">
								<i class="fa fa-phone"></i>
								<div class="contact-info">
									<p>Telefone:65 3646-6100</p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-list">
								<i class="fa fa-envelope"></i>
								<div class="contact-info">
									<p><a href="mailto:ameripel@ameripel.com.br">ameripel@ameripel.com.br</a><br> <a href="mailto:ameripel@gmail.com">ameripel@gmail.com</a></p>
								</div>
							</div>
						</li>
						<li>
							<div class="contact-list">
								<i class="fa fa-clock-o"></i>
								<div class="contact-info">
									<p>Segunda-Sexta: 8am - 18pm</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Contact Us -->
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="copyright">
						<p>Ameripel Representações &copy; Copyright <?php echo date('Y');?>. Todos os direitos reservados.</p>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-6">
					<ul class="social-media">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</footer>
	
	<!-- Bact to top -->
	<div class="back-top">
		<a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<!-- Modal -->
    <div class="modal fade modal-vcenter" id="consultation" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2>Request a consultation</h2>
                </div>
                <div class="modal-body">
					<form id="consultation-form" method="post">
						<div class="form-group">
							<label>Service</label>
							<select id="select-service" class="select-option" name="service">
								<option value="0" >Please Select Your Service</option>
								<option value="1">Cleanings</option>
								<option value="2">Crowns & bridges</option>
								<option value="3">Root canals</option>
								<option value="4">Cosmetic dentistry</option>
								<option value="5">Dental implants</option>
								<option value="6">Whitening</option>
							</select>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Consultation Date</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control date-pic" name="date" placeholder="mm/dd/yyyy">
									</div><!-- /.input group -->
									
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label>Time picker:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" class="form-control timepicker"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" name="fname">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" name="lname">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" name="address">
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group">
									<label>Zip Code</label>
									<input type="text" class="form-control" name="zipcode">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-8">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" name="city">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Phone</label>
									<input type="tel" class="form-control" name="phone">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email">
								</div>
							</div>
						</div>
						
						<div class="submit-block text-right">
							<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
							<input value="Submit" name="submit" class="btn btn-primary" type="submit">
						</div>
						
					</form>
                </div>
                
            </div>
        </div>
    </div>  
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/gmap3.min.js"></script>
	<script src="js/bootstrap.offcanvas.js"></script>
	<script src="js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="mail/js/form-validator.min.js" type="text/javascript"></script>
	<script src="mail/js/contact-form-script.js" type="text/javascript"></script>
	<script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
	<script src="js/newsticker.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
	<script type="text/javascript">
	/*
		// Google Map
		function initialize() {
		  var mapOptions = {
			zoom: 3,
			scrollwheel: false,
			center: new google.maps.LatLng(-15.5608029, -56.0370073,17)
		  };
		  var map = new google.maps.Map(document.getElementById('map'),
			  mapOptions);
		  var marker = new google.maps.Marker({
			position: map.getCenter(),
			animation:google.maps.Animation.BOUNCE,
			icon: 'img/map-marker.png',
			map: map
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);*/
	</script>

</body>
</html>
