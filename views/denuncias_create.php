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
       
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/site.css">
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/jquery.richtext.js"></script>

        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
       <!--  <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/vendor/jquery-2.1.0.js"></script>-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/select2.full.js"></script>
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/css/select2.min.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/i18n/es.js"></script>     
   
 <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12 ocultar">
   <div class="row">
    <div class="col s12 m12 l12">
      <div class="card-panel">  
        <div class="col s12 m12 112"> 
          <h5>Nueva Denuncia</h5>
        </div>  
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <!-- <p>Three capital letters for the ID</p> -->
            <table class='wp-list-table widefat fixed'>
              
            <div class="row">
                <div class="input-field col s12">
                   <button type='submit' name="insert" class="btn-floating btn waves-effect waves-light green"><i class="material-icons">save</i></button>
                   <button type='button' class="btn-floating btn waves-effect waves-light brown" onclick="nuevo_trabajador()"><i class="material-icons">accessibility</i></button>
                   <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="volver()"><i class="material-icons">reply</i></button>
                   
                 </div>
            </div>  
            <hr>
            <div class="row">
               <div class="input-field col s6">
                 <h6>Denunciado</h6>
                    <select name="denunciado" id="denunciado" class="error browser-default js-example-basic-single">
                       <option value="" disabled selected>Seleccione una opcion</option> 
                       <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Trabajador') ); ?>
                          <?php for ($i=0; $i < count($rows); $i++) { ?>
                             <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                       <?php } ?>
                    </select>
               </div>
               <div class="input-field col s6">
                 <h6>Denunciante</h6>
                    <select name="denunciante" id="denunciante" class="error browser-default js-example-basic-single">
                       <option value="" disabled selected>Seleccione una opcion</option> 
                       <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Afiliado') ); ?>
                          <?php for ($i=0; $i < count($rows); $i++) { ?>
                             <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                       <?php } ?>
                    </select>
               </div>
            </div>   
             <div class="row">
                <div class="input-field col s12">  
                  <h6>Detalle de la denuncia</h6>
                  <Textarea name="detalle_denuncia" class="content"><?php echo $detalle_denuncia; ?></Textarea>
                </div> 
               
             
             </div>      
                

            </table>
            <br>
           
           
        </form>
     </div> 
    </div>       
   </div> 
 
 </div>
 <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar">
        <h2>cuadro2</h2>
        <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="volver()"><i class="material-icons">reply</i></button>

 </div>   

        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/icon.css" rel="stylesheet">
        <!--<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script>		
           
           jQuery(document).ready(function($){
               $("#cuadro2").slideUp("slow");
               $("#cuadro1").slideDown("slow");
               $(".js-example-basic-single").select2();
               $(".content").richText();
            }); 
            
            function nuevo_trabajador(){  
                
                //$("#cuadro1").slideUp("slow");
                //$("#cuadro2").slideUp("slow");
                jQuery("#cuadro1").removeClass('slided').slideUp('fast');
                jQuery("#cuadro2").removeClass('slided').slideDown('fast'); 
            }
            function volver(){  
                
                //$("#cuadro1").slideUp("slow");
                //$("#cuadro2").slideUp("slow");
                jQuery("#cuadro2").removeClass('slided').slideUp('fast');
                jQuery("#cuadro1").removeClass('slided').slideDown('fast'); 
            }

        </script>              
    <?php
}