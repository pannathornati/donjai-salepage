<?php
/**
 * donjai functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package donjai
 */



/* LAYOUT */
if (!isset($GLOBALS['s_logo_width']))           {$GLOBALS['s_logo_width']           = '200';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_logo_height']))          {$GLOBALS['s_logo_height']          = '100';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_thumb_width']))          {$GLOBALS['s_thumb_width']          = '350';}           // any number
if (!isset($GLOBALS['s_thumb_height']))         {$GLOBALS['s_thumb_height']         = '184';}           // any number
if (!isset($GLOBALS['s_thumb_crop']))           {$GLOBALS['s_thumb_crop']           = true;}            // true, false
if (!isset($GLOBALS['s_title_style']))          {$GLOBALS['s_title_style']          = 'banner';}        // minimal, banner, hidden
if (!isset($GLOBALS['s_footer_columns']))       {$GLOBALS['s_footer_columns']       = '4';}             // 1,2,3,4,5,6

/* ADD-ON */
if (!isset($GLOBALS['s_admin_bar']))            {$GLOBALS['s_admin_bar']            = 'show';}          // hide, show
if (!isset($GLOBALS['s_member_url']))           {$GLOBALS['s_member_url']           = 'none';}          // none, url path such as: /my-account/
if (!isset($GLOBALS['s_style_css']))            {$GLOBALS['s_style_css']            = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_fontawesome']))          {$GLOBALS['s_fontawesome']          = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_keen_slider']))          {$GLOBALS['s_keen_slider']          = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_jquery']))               {$GLOBALS['s_jquery']               = 'disable';}       // disable, enable

/* WOOCOMMERCE */
if (!isset($GLOBALS['s_shop_layout']))          {$GLOBALS['s_shop_layout']          = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_shop_pagebuilder']))     {$GLOBALS['s_shop_pagebuilder']     = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_woo_css']))              {$GLOBALS['s_woo_css']              = 'override';}      // override, none
if (!isset($GLOBALS['s_woo_th']))               {$GLOBALS['s_woo_th']               = 'enable';}        // disable, enable

/* Admin Bar */
if ($GLOBALS['s_admin_bar'] == 'hide') {
    add_filter('show_admin_bar', '__return_false');
} else {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/**
 * Setup Theme
 */
if (!function_exists('donjai_setup')) {
    function donjai_setup() {
        load_theme_textdomain('donjai', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'width'       => $GLOBALS['s_logo_width'],
            'height'      => $GLOBALS['s_logo_height'],
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size($GLOBALS['s_thumb_width'], $GLOBALS['s_thumb_height'], $GLOBALS['s_thumb_crop']);
        register_nav_menus(array(
            'primary' => esc_html__('Desktop Menu', 'donjai'),
            'mobile'  => esc_html__('Mobile Menu', 'donjai'),
        ));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
    }
}
add_action('after_setup_theme', 'donjai_setup');

function donjai_content_width() {
    $GLOBALS['content_width'] = apply_filters('donjai_content_width', 750);
}
add_action('after_setup_theme', 'donjai_content_width', 0);

/**
 * Register widget area.
 */
function donjai_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Right Sidebar', 'donjai'),
        'id'            => 'rightbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Left Sidebar', 'donjai'),
        'id'            => 'leftbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'donjai'),
        'id'            => 'shopbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Home Banner', 'donjai'),
        'id'            => 'home_banner',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Header Search', 'donjai'),
        'id'            => 'search',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Header Action', 'donjai'),
        'id'            => 'action',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Mobile Nav', 'donjai'),
        'id'            => 'mobile_nav',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Blocks', 'donjai'),
        'id'            => 'footer_blocks',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="footer_blocks %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    if(get_theme_mod( 'is_footer_column', true )) {
        donjai_register_footer($GLOBALS['s_footer_columns']);
    }
}
function donjai_register_footer($columns = 4) {
    $i = 0;
    while( $i < $columns ) {
        $i++;
        register_sidebar(array(
            'name'          => esc_html__('Footer Column ' , 'donjai') . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'donjai_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function donjai_scripts() {

    $s_theme = wp_get_theme();
    $s_theme_version = $s_theme->get( 'Version' );

    wp_enqueue_style('s-mobile', get_theme_file_uri('/css/mobile.css'), array(), $s_theme_version);
    wp_enqueue_style('s-desktop', get_theme_file_uri('/css/desktop.css'), array(), $s_theme_version , '(min-width: 992px)');

    if ($GLOBALS['s_style_css'] == 'enable') {
        wp_enqueue_style('s-style', get_stylesheet_uri());
    }

    if ($GLOBALS['s_fontawesome'] == 'enable') {
        wp_enqueue_style('s-fa', get_theme_file_uri('/fonts/fontawesome/css/all.min.css'), array(),'5.13.0');
    }

    // SALE PAGE
    if (is_page_template( 'page-templates/salepage.php' )) {
        wp_enqueue_style('s-salepage', get_theme_file_uri('/css/page-salepage.css'), array(), $s_theme_version);
        wp_enqueue_script('s-salepage', get_theme_file_uri('/js/page-salepage.js'), array(), $s_theme_version, true);
    }

    

}
add_action('wp_enqueue_scripts', 'donjai_scripts');

/**
 * Admin CSS & JS
 */
function donjai_admin($hook) {
    wp_enqueue_style('s-admin', get_template_directory_uri() . '/css/wp-admin.css');
    if ('post.php' == $hook) {
        wp_enqueue_script('s-admin-sp', get_theme_file_uri('/js/page-salepage-admin.js'), array(), false, true);
    }
}
add_action('admin_enqueue_scripts', 'donjai_admin');

function donjai_admin_js() {
    $be_code_js = get_theme_mod( 'be_code_js','');
    if ($be_code_js) {
        echo '<script type="text/javascript">' .  $be_code_js . '</script>';
    }
}
add_action('admin_footer', 'donjai_admin_js');



/**
 * Theme Demo.
 */
if (class_exists( 'OCDI_Plugin' )) {
    require get_template_directory() . '/inc/demo.php';
}


/**
 * Forminator Upload Path
 */
if (class_exists( 'Forminator' )) {
    require get_template_directory() . '/inc/forminator.php';
}

/**
 * Line notify
 */
require get_template_directory() . '/inc/line-notify.php';


/**
 * TGMPA
 */
require_once get_template_directory() . '/vendor/TGMPA/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'donjai_register_required_plugins' );

function donjai_register_required_plugins() {
	$plugins = array(
        array(
			'name'               => 'One Click Demo Import',
			'slug'               => 'one-click-demo-import',
			'source'             => get_template_directory() . '/vendor/ocdi/one-click-demo-import.3.1.1.zip',
			'required'           => false,
			'version'            => '3.1.1',
			'force_activation'   => false,
			'force_deactivation' => false,
        ),
        array(
			'name'               => 'Advanced Custom Fields PRO',
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => get_template_directory() . '/vendor/acf-pro/advanced-custom-fields-pro.zip',
			'required'           => true,
			'version'            => '5.12.2',
			'force_activation'   => false,
			'force_deactivation' => false,
        ),
        array(
			'name'               => 'Forminator',
			'slug'               => 'forminator',
			'source'             => get_template_directory() . '/vendor/forminator/forminator.1.17.1.zip',
			'required'           => true,
			'version'            => '1.17.1',
			'force_activation'   => false,
			'force_deactivation' => false,
        ),
        

	);
	$config = array(
		'id'           => 'donjai',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'parent_slug'  => 'themes.php',            
		'capability'   => 'edit_theme_options',   
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => true,                   
		'message'      => '',                      
	);
	tgmpa( $plugins, $config );
}

// add options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'ตั้งค่า',
		'menu_title'	=> 'ตั้งค่า',
		'menu_slug' 	=> 'salepage-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'การชำระเงิน',
		'menu_title'	=> 'การชำระเงิน',
        'menu_slug' 	=> 'payment-settings',
		'parent_slug'	=> 'salepage-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'สีและการออกแบบ',
		'menu_title'	=> 'สีและการออกแบบ',
        'menu_slug' 	=> 'color-settings',
		'parent_slug'	=> 'salepage-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'PDPA & ระบบเก็บข้อมูล',
		'menu_title'	=> 'PDPA & ระบบเก็บข้อมูล',
        'menu_slug' 	=> 'pdpa-settings',
		'parent_slug'	=> 'salepage-settings',
	));
	
}



//Update theme
add_filter( 'site_transient_update_themes', 'donjai_update_themes' );

function donjai_update_themes( $transient ) {

	// let's get the theme directory name
	// it will be "misha-theme"
	$stylesheet = get_template();

	// now let's get the theme version
	// but maybe it is better to hardcode it in a constant
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );


	// connect to a remote server where the update information is stored
	$remote = wp_remote_get(
		'https://raw.githubusercontent.com/pannathornati/donjai-salepage/main/info.json',
		array(
			'timeout' => 10,
			'headers' => array(
				'Accept' => 'application/json'
			)
		)
	);

	// do nothing if errors
	if(
		is_wp_error( $remote )
		|| 200 !== wp_remote_retrieve_response_code( $remote )
		|| empty( wp_remote_retrieve_body( $remote ) )
	) {
		return $transient;
	}

	// encode the response body
	$remote = json_decode( wp_remote_retrieve_body( $remote ) );
	
	if( ! $remote ) {
		return $transient; // who knows, maybe JSON is not valid
	}
	
	$data = array(
		'theme' => $stylesheet,
		'url' => $remote->details_url,
		'requires' => $remote->requires,
		'requires_php' => $remote->requires_php,
		'new_version' => $remote->version,
		'package' => $remote->download_url,
	);

	// check all the versions now
	if(
		$remote
		&& version_compare( $version, $remote->version, '<' )
		&& version_compare( $remote->requires, get_bloginfo( 'version' ), '<' )
		&& version_compare( $remote->requires_php, PHP_VERSION, '<' )
	) {

		$transient->response[ $stylesheet ] = $data;

	} else {

		$transient->no_update[ $stylesheet ] = $data;

	}

	return $transient;

}

//update