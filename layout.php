<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="icon" href="/prospect/img/icone.ico">
	<title><?php echo $titulo; ?></title>

	<script type="text/javascript" src="/prospect/js/jquery.js"></script>

	<script type="text/javascript" src="/prospect/js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="/prospect/js/jquery.maskedinput.js"></script>

	<link rel="stylesheet" type="text/css" href="/prospect/style.css">

	<!-- Bootstrap Core CSS -->
	<link href="/prospect/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Theme CSS -->
	<link href="/prospect/css/freelancer.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="/prospect/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav  class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #F1CA34;" id="mainNav">
		<div class="container">

				<a href="/prospect/index.php"><img src="/prospect/img/icone.jpg" width="50" height="50"/></a>

				<a class="navbar-brand js-scroll-trigger" href="/prospect/index.php"><strong><font color="#041040">&nbsp Prospects</font></strong></a>
				
				<?php if(isset($_SESSION["IdVendedor"])){ ?>

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/prospect/clientes/index.php"><font color="#041040">Prospecção</font></a>
						</li> 

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/prospect/relatorios/index.php"><font color="#041040">Relatórios</font></a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/prospect/controller/LoginController.php?acao=logout"><font color="#041040">Sair</font></a>
						</li>

					</ul>
				</div> 

				<?php } ?>
		
		</div>
	</nav>

	<header>
		<div class="container">

			<?php echo $conteudo; ?>

		</div>
	</header>

	<img class="marca" src="/prospect/img/marca.jpg" height="80"/>
	<script src="/prospect/vendor/jquery/jquery.min.js"></script>
	<script src="/prospect/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="/prospect/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="/prospect/js/jqBootstrapValidation.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/prospect/js/freelancer.min.js"></script>


</body>
</html>