<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title; ?></title>
	<!-- Latest compiled and minified CSS -->
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"/>
	<link rel="stylesheet" href="<?php echo site_url();?>/../assets/css/style.css" type="text/css"/>
</head>
<body>

<header>
	<img src="<?php echo site_url();?>/../assets/img/header.jpg" height="200px" width="100%">
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo site_url('Taxikari/index'); ?>">Hlavná stránka</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('Taxikari/taxikari'); ?>">Zamestnanci</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('auta/auta'); ?>">Autá</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('objednavky/objednavky'); ?>">Objednávky</a>
			</li>
		</ul>
	</div>
</nav>
<br/>
