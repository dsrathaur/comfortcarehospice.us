<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><![]--> <html class="no-js"> <!--<![endif]-->
	<head>

		<meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Comfort Care Hospice</title>

		<!--link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon" href="apple-touch-icon-iphone-precomposed.png">
		<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-iphone-precomposed.png"/>-->
		
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">	 
		
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/rslides.css"> 
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/media.css">
	
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">	

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600italic,600,700,700italic,800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet"> 

		<!--[if IE]>
		 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		 <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		<!-- for images issues -->	
		<!--[if IE 8]>
		     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"type="text/javascript"></script>
		     <script src="js/ie8_fix_maxwidth.js" type="text/javascript"></script>
		<![endif]-->
		
		<!-- for lte IE8 issues -->
    <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('article');
        document.createElement('section');
        document.createElement('aside');
        document.createElement('footer');
    </script><!-- end of IE issues -->

		<style>
		<?php if(!is_front_page()) { ?>
			#mid{ display: none; }
		<?php } if(is_page('42')) { ?>
			.side-inner{ display: none; }
		<?php } if(is_page('39')) { ?>
			.contact ul li:first-child a{ display: none; }
		<?php } if(is_page('40')) { ?>
			.service-areas a{ display: none; }
		<?php } ?>
		<?php } if(is_page('hospice-care-meet-our-hospice-team')) { ?>
			.sidetabs-2 ul li a{ background: url(images/sidetabho.jpg) repeat-x !important; height:52px;}
		<?php } ?>
		</style>
		<?php wp_head(); ?>
		
	</head>
	
	<body>

	 <div class="protect-me">	 

	