<?php 

    require_once('../../../../wp-load.php');
    global $woocommerce, $product, $post;
    $json = array();
  
        $args = array(
            
           // 'post_type'   => 'pos_denuncias',
            //'ID' => $_GET["codigo_id"],
           
            'post_type'   => 'attachment',
            'post_mime_type'   => 'image/jpeg',
            'post__in'       => [$_GET["codigo_id"]],
           // 'meta_key' => 'lw_tipo_trabajador', 
           // 'meta_value' => 'Trabajador',
           // 'meta_compare'	=> '='
        );
        //--------------------------------------type tags-----------
        $loop = get_posts($args);
       

        for($i=0; $i < count($loop); $i++){
              		
                array_push($json, array(
                    "id" => $loop[$i]->ID,
                    "nombre" => $loop[$i]->guid,
                   // "apellidos" => get_post_meta( $loop[$i]->ID, 'lw_apellidos', true ), //description
                   // "documento" => get_post_meta( $loop[$i]->ID, 'lw_tipo_documento', true),
                   // "numero_documento" => get_post_meta( $loop[$i]->ID, 'lw_numero_documento', true),
                   // "carnet" => get_post_meta( $loop[$i]->ID, 'lw_estado', true ),
                    
                   
                ));
          
        }
       echo json_encode($json);
  
    

?>