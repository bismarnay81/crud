<?php 

    require_once('../../../../wp-load.php');
    global $woocommerce, $product, $post;
    $json = array();
  
        $args = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'status' => 'publish',
            'post_type'   => 'pos_trabajadores',
            //'s' => $_GET["get_denuncia"],
            'meta_key' => 'lw_tipo_trabajador', 
            'meta_value' => 'Trabajador',
            'meta_compare'	=> '='
        );
        //--------------------------------------type tags-----------
        $loop = get_posts($args);
       

        for($i=0; $i < count($loop); $i++){
              		
                array_push($json, array(
                    "id" => $loop[$i]->ID,
                    "nombres" => get_post_meta( $loop[$i]->ID, 'lw_nombres', true ),
                    "apellidos" => get_post_meta( $loop[$i]->ID, 'lw_apellidos', true ), //description
                    "documento" => get_post_meta( $loop[$i]->ID, 'lw_tipo_documento', true),
                   // "carnet" => get_post_meta( $loop[$i]->ID, 'lw_estado', true ),
                    
                   
                ));
          
        }
       echo json_encode($json);
  
    

?>