<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Use your own external URL logo link 
	function wpc_url_login(){
		return "http://www.sykot.com";
	}
	add_filter('login_headerurl', 'wpc_url_login');
	
	// Custom WordPress Login Logo
	function login_css() {
		wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/login.css' );
	}
	add_action('login_head', 'login_css');
	
	// Custom WordPress Footer
	function remove_footer_admin () {
		echo 'Developed by <a href="http://www.obantor.com/bd/projects/tritol">TritolWorks</a>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	// Registering custom navigation menu
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'header_nav' => 'Header Navigation',
				//'footer_nav' => 'Footer Navigation'
			)
		);
	}
	
	//Add Thumbnail Supports
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 180, 135, true ); // Normal post thumbnails
		add_image_size( 'single-post-thumbnail', 180, 135 ); // Permalink thumbnail size
	}
	
	// Make the "read more" link to the post
	function new_excerpt_more($more) {
    	global $post;
		return ' <a href="'. get_permalink($post->ID) . '">Read more</a> &raquo;';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	//Control Excerpt Length using Filters
	function new_excerpt_length($length) {
		return 20;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	
	// Breadcrumbs Starts
	function MyBreadcrumb() {
		if (!is_home()) {
			echo '<li><a href="';
			echo get_option('home');
			echo '/">';
			echo 'Home';
			echo '</a><span class="divider">/</span></li>';
			if (is_category() || is_single()) {
				echo '<li>';
				the_category(', ','&title_li=');
				echo '<span class="divider">/</span></li>';
				echo '</li>';
				if (is_single()) {
					echo '<li class="active">';
					// the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				echo '<li class="active">';
				the_title();
				echo '</li>';
			}
		}
	}
	
	// remove version number from head & feeds
	function _remove_script_version( $src ){
		$parts = explode( '?', $src );
		return $parts[0];
	}
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
	
	function remove_version_info() {
    	return '';
	}
	add_filter('the_generator', 'remove_version_info');
	
	// remove admin bar links
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('my-blogs');
		$wp_admin_bar->remove_menu('appearance');
		//$wp_admin_bar->remove_menu('site-name');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	
	// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
	function example_remove_dashboard_widgets() {
		// Globalize the metaboxes array, this holds all the widgets for wp-admin
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	} 
	add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );


?>