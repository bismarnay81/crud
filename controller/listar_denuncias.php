<?php 

    require_once('../../../../wp-load.php');
    global $woocommerce, $product, $post;
    $json = array();
    if ($_GET["get_cantidades"]) {
        $args = array(
            'numberposts'	=> $_GET["get_cantidades"],
            'post_type'        => 'pos_denuncias',
           
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