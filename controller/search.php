<?php 

    require_once('../../../../wp-load.php');
    global $woocommerce, $product, $post;
    $json = array();
    if ($_GET["get_denuncia"]) {
        $args = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'status' => 'publish',
            'post_type'   => 'pos_denuncias',
            //'s' => $_GET["get_denuncia"],
            'meta_key' => 'lw_denunciado', 
            'meta_value' => $_GET["get_denuncia"],
            'meta_compare'	=> '='
        );
        //--------------------------------------type tags-----------
        $loop = get_posts($args);
       

        for($i=0; $i < count($loop); $i++){
              		
                array_push($json, array(
                    "id" => $loop[$i]->ID,
                    "denunciado" => get_post_meta( $loop[$i]->ID, 'lw_denunciado', true ),
                    "denunciante" => get_post_meta( $loop[$i]->ID, 'lw_denunciante', true ), //description
                    "detalle" => get_post_meta( $loop[$i]->ID, 'lw_detalle', true),
                    "estado" => get_post_meta( $loop[$i]->ID, 'lw_estado', true ),
                    "fecha" =>$loop[$i]->post_date, 
                   
                ));
          
        }
       echo json_encode($json);
    }
    

?>