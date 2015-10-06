<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<meta content="Media-Enzo.nl / Niels van Renselaar" name="author" />
			
	<title><?php wp_title("", true, "right") ?></title>
	<link media="all" rel="stylesheet" type="text/css" href="<?=get_bloginfo("template_url")?>/css/all.css" />
	<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="<?=get_bloginfo("template_url")?>/css/ie.css" media="screen"/><![endif]-->
	
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?=get_bloginfo("template_url")?>/js/cycle.js"></script>
	<script type="text/javascript" src="<?=get_bloginfo("template_url")?>/js/default.js"></script>
	
	<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-31549751-1']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
	</script>
	
	<?php
		wp_head();
	?>
	
</head>
<body>
	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<div id="header">
			<!-- logotype -->
			<strong class="logo"><a href="/">DrVinyl saves time and money</a></strong>
			<!-- menu-top -->
			<?php
					wp_nav_menu(array(
						  'theme_location'  => "Quicklinks",
						  'menu'            => "Quicklinks", 
						  'container'       => false, 
						  'container_class' => false, 
						  'container_id'    => false, 
						  'menu_class'      => 'menu-top', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => false,
						  'before'          => false,
						  'after'           => false,
						  'link_before'     => false,
						  'link_after'      => false,
						  'depth'           => 0,
						  'walker'          => false
						));
				?>
			<!-- slogan -->
			<strong class="slogan">Großartig in kleiner Schadenreparatur</strong>
		</div>
		<!-- panel -->
		<div class="panel">
			<!-- navigation -->
			<div id="nav">
				<ul>
					<li><a class="link1" href="/Fahrzeuge-Innenausstattungs-und-Aussenseitenreparaturen/" rel="slide-automotive">Automotive</a></li>
					<li><a class="link3" href="/offentliche-verkehrsmittel/" rel="slide-ov">Öffentliche Verkehrsmittel</a></li>
					<li><a class="link5" href="/Schifffahrt/" rel="slide-herstellen">Schifffahrt</a></li>
					<li><a class="link7" href="/Reparatur/" rel="slide-herstellen">Reparatur?</a></li>
				</ul>
				<ul>
					<li><a class="link2" href="/Bauindustrie/" rel="slide-bouwsector">Bauindustrie</a></li>
					<li><a class="link4" href="/Holzreparatur/" rel="slide-luchtvaart">Holzreparatur</a></li>
					<li><a class="link6" href="/flocken/" rel="slide-offerte">Flocken</a></li>
					<li><a class="link8" href="/angebot/" rel="slide-herstellen">Angebot</a></li>
				</ul>
			</div>
			
			
			
			<div class="slides">
			
			
				
				<!-- slideshow -->
				<?php
					get_template_part("slideshow", "fader");
				?>
				
				
			</div>
		</div>
		<!-- main -->
		<div id="main">
			<!-- twocolumns -->
			<div id="twocolumns">