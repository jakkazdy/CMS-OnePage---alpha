<!DOCTYPE html>
<html>
<head>
<!-- Kurs z Youtube: https://www.youtube.com/watch?v=f3vh25CxL_A -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>PracowniaMZ.pl</title>
	<link rel="stylesheet" type="text/css" href="css/style-pmz.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic&amp;subset=latin-ext">
</head>
<body>
	<header>
		<div class="container">
		<img src="img/logo.png"/>
			<h1>PracowniaMZ</h1>
			<p>Pracownia Technicznej Renowacji Zabytków</p>
		</div>
	</header>
	<nav class="nav">
		<ul>
		{foreach from=$downListPage key=k item=v}
		<li><a href="#{$v.name}">{$v.name_menu}</a></li>
		{/foreach}
		</ul>
	</nav>