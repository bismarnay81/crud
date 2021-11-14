<?php 

    require_once('../../../../wp-load.php');
    global $woocommerce, $product, $post;
    $json = array();
    if ($_GET["cod_denunciante"]) {
        $args = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'status' => 'publish',
            'post_type'   => 'pos_trabajadores',
            'meta_key' => 'lw_numero_documento', 
            'meta_value' => $_GET["cod_denunciante"],
            'meta_compare'	=> '='
          //  'meta_query' => array( 
          //      'relation' => 'AND', 
          //      array( 
          //         'key' => 'lw_nombres', 
          //         'value' => 'BISMAR', 
          //         'compare' => '=', 
          //         ), 
          //      array( 
          //         'key' => 'lw_apellidos', 
          //         'value' => 'ROCA ROCA', 
          //         'compare' => '=', 
           //        ), 
           //    ),
           
        );
        //--------------------------------------type tags-----------
        $loop = get_posts($args);
       

        for($i=0; $i < count($loop); $i++){
              		
                array_push($json, array(
                    "id" => $loop[$i]->ID,
                    "nombres" => get_post_meta( $loop[$i]->ID, 'lw_nombres', true ),
                    "apellidos" => get_post_meta( $loop[$i]->ID, 'lw_apellidos', true ),
                    "tipo_documento" => get_post_meta( $loop[$i]->ID, 'lw_tipo_documento', true ),
                    "numero_documento" => get_post_meta( $loop[$i]->ID, 'lw_numero_documento', true ),
                    "telefono" => get_post_meta( $loop[$i]->ID, 'lw_telefono', true ),
                    "negocio" => get_post_meta( $loop[$i]->ID, 'lw_nombre_negocio', true ),
                   
                ));
          
        }
       echo json_encode($json);
    }
    

?>