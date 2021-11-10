<?php

function denuncias_create() {
    if (isset($_POST['insert'])) {
        $my_box = array(
            'post_title'    => 'Nueva denuncia',
            'post_status'   => 'publish',
            'post_type'   => 'pos_denuncias',
            'meta_input' => array(
                'lw_denunciado' => $_POST['denunciado'] ,
                'lw_denunciante' => $_POST['denunciante'] ,
                'lw_detalle' => $_POST['detalle_denuncia'] , 
                'lw_estado' =>'Recepcionado',
            )

        );
        
        // Insert the post into the database
        $box_id = wp_insert_post( $my_box );
        header('Location: ' . admin_url('admin.php?page=central-riesgo'), true);
        die();
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/iby-master/css/style-admin.css" rel="stylesheet" />
   
    <div class="wrap">
        <h2>Nueva Denuncia</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <!-- <p>Three capital letters for the ID</p> -->
            <table class='wp-list-table widefat fixed'>
              
            <div class="row">
                <div class="input-field col s12">
                   <button type='submit' name="insert" class="btn-floating btn waves-effect waves-light green"><i class="material-icons">save</i></button>
                   <button type='button' class="btn-floating btn waves-effect waves-light red" onclick="location.href='<?php echo admin_url('admin.php?page=denuncias-nuevo'); ?>';"><i class="material-icons">add</i></button>
                   <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="location.href='<?php echo admin_url('admin.php?page=central-riesgo'); ?>';"><i class="material-icons">reply</i></button>
                   
                 </div>
            </div>  
            <hr>
            <div class="row">
               <div class="input-field col s4">
                 <h6>Denunciado</h6>
                    <select name="denunciado" id="" class="browser-default">
                       <option value="" disabled selected>Seleccione una opcion</option> 
                       <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Trabajador') ); ?>
                          <?php for ($i=0; $i < count($rows); $i++) { ?>
                             <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                       <?php } ?>
                    </select>
               </div>
               <div class="input-field col s4">
                 <h6>Denunciante</h6>
                    <select name="denunciante" id="" class="browser-default">
                       <option value="" disabled selected>Seleccione una opcion</option> 
                       <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Afiliado') ); ?>
                          <?php for ($i=0; $i < count($rows); $i++) { ?>
                             <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                       <?php } ?>
                    </select>
               </div>
            </div>   
             <div class="row">
                <div class="input-field col s6">  
                  <h6>Detalle de la denuncia</h6>
                  <Textarea name="detalle_denuncia" class=""><?php echo $detalle_denuncia; ?></Textarea>
                </div> 
               
             
             </div>      
                

            </table>
            <br>
           
           
        </form>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  
    <?php
}