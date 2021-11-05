<?php
/**
* Plugin Name: CRUD
* Plugin URI: https://loginweb.dev/crud/
* Description: Plugins para wordpress
* Version: 2.0
* Author: Ing. yo
* Author URI: https://loginweb.dev/profile
**/
add_action('admin_menu','lw_add_menu');
function lw_add_menu() {
	
	//MENU TPV
	add_menu_page('Central de riesgo', //page title
        'Central de riesgo', //menu title
        'manage_options', //capabilities
        'central-riesgo', //menu slug
        'denuncias_list', //function
        'dashicons-align-full-width'
	);
    add_submenu_page('null', //parent slug
			'Nueva denuncia', //page title
			'Nueva denuncia', //menu title
			'manage_options', //capability
			'denuncias-nuevo', //menu slug
			'denuncias_create' //function
		);
} 
// Cargando files php -----------------------------------------------------
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'views/denuncias_list.php');
require_once(ROOTDIR . 'views/denuncias_create.php');


