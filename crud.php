<?php
/**
* Plugin Name: CRUD
* Plugin URI: https://loginweb.dev/crud/
* Description: Plugins para wordpress
* Version: 2.0
* Author: Ing. Bismar Santos Nay Zabala
* Author URI: https://loginweb.dev/profile
**/
add_action('admin_menu','lw_add_menu');
function lw_add_menu() {
	
	//MENU DENUNCIA
	add_menu_page('Central de riesgo', //page title
        'Central de riesgo', //menu title
        'manage_options', //capabilities
        'central-riesgo', //menu slug
        'denuncias_list', //function
        'dashicons-id-alt'
	);
    add_submenu_page('null', //parent slug
			'Nueva denuncia', //page title
			'Nueva denuncia', //menu title
			'manage_options', //capability
			'denuncias-nuevo', //menu slug
			'denuncias_create' //function
		);

    //MENU TRABAJADORES
	add_submenu_page('central-riesgo', //parent slug
            'Nuevo Trabajador/afiliado', //page title
            'Trabajadores/Afiliados', //menu title
            'manage_options', //capabilities
            'registro-trabajadores', //menu slug
            'trabajadores_list', //function
            
    );
    add_submenu_page('null', //parent slug
        'Nuevo Trabajador', //page title
        'Nuevo Trabajador', //menu title
        'manage_options', //capability
        'trabajadores-nuevo', //menu slug
        'trabajadores_create' //function
    );
   
} 
// Cargando files php -----------------------------------------------------
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'views/denuncias_list.php');
require_once(ROOTDIR . 'views/denuncias_create.php');
require_once(ROOTDIR . 'views/trabajadores_list.php');
require_once(ROOTDIR . 'views/trabajadores_create.php');
require_once(ROOTDIR . 'views/afiliados_list.php');


