<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
	   <?php
	      if (function_exists('is_tag') && is_tag()) {
	         single_tag_title("Posts Tagged for &quot;"); echo '&quot; | '; }
	      elseif (is_archive()) {
	         wp_title(''); echo ' Posts | '; }
	      elseif (is_search()) {
	         echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; }
	      elseif (!(is_404()) && (is_single()) || (is_page())) {
	         wp_title(''); echo ' | '; }
	      elseif (is_404()) {
	         echo 'Not Found | '; }
	      if (is_home()) {
	         bloginfo('description'); echo ' | '; bloginfo('name'); }
	      else {
	          bloginfo('name'); }
	      if ($paged>1) {
	         echo ' | Page '. $paged; }
	   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
	    <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
	<![endif]-->

</head>

<!--[if IE 9]>      <body class="ie ie9 lte10 lte9">     <![endif]-->
<!--[if IE 10]>     <body class="ie ie10 lte10">         <![endif]-->
<!--[if gt IE 10]>  <body class="ie">                    <![endif]-->
<!--[if !IE]><!-->  <body <?php body_class(); ?>>        <!--<![endif]-->
	
<div class="page-wrap">

	<header>

		<div class="container">
			
			<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
			
			<?php wp_nav_menu(array('menu' => 'Header Navigation')); ?>

		</div>

	</header>