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
                'lw_image1' =>$_POST['lw_image1'],
                'lw_image2' =>$_POST['lw_image2'],
                'lw_image3' =>$_POST['lw_image3'],
                'lw_image4' =>$_POST['lw_image4'],
                'lw_image5' =>$_POST['lw_image5'],
            )

        );
        
        // Insert the post into the database
        $box_id = wp_insert_post( $my_box );
        header('Location: ' . admin_url('admin.php?page=central-riesgo'), true);
        die();
    }
    if (isset($_POST['insert_trabajador'])) {
       
      $my_box = array(
          'post_title'    => 'Nuevo Trabajador',
          'post_status'   => 'publish',
          'post_type'   => 'pos_trabajadores',
          'meta_input' => array(
              'lw_image' =>$_POST['lw_image'] ,
              'lw_tipo_trabajador' => $_POST['tipo_trabajador'] ,
              'lw_nombres' => $_POST['nombres_trabajador'] ,
              'lw_apellidos' => $_POST['apellidos_trabajador'] , 
              'lw_telefono' => $_POST['telefono_trabajador'] ,
              'lw_nombre_negocio' => $_POST['nombre_negocio'] ,
              'lw_tipo_documento' => $_POST['tipo_documento'] ,
              
          )
      );
     // wp_insert_post( $setting );
      
      // Insert the post into the database
      $box_id = wp_insert_post( $my_box );
      header('Location: ' . admin_url('admin.php?page=registro-trabajadores'), true);
      die();
  }
    ?>
       
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/site.css">
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/jquery.richtext.js"></script> 

        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->    
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/estilos.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/font-awesome.min.css">
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">


       
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
                   <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="location.href='<?php echo admin_url('admin.php?page=central-riesgo'); ?>';"><i class="material-icons">reply</i></button>
                   
                 </div>
            </div>  
            <hr>
         
            
       <div class="row"> 
         <div class="section">
                 

            <section class="plans-container" id="plans">
                <article class="col s12 m6 l6">
                  <div class="card hoverable">
                    <div class="card-image purple waves-effect">
                       <div class="card-title">Denunciado</div>
                        <div class="price-desc">
                              
                          <select name="denunciado" id="denunciado" class="error browser-default js-example-basic-single">
                            <option value="" disabled selected>Seleccione una opcion</option> 
                            <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Trabajador') ); ?>
                                <?php for ($i=0; $i < count($rows); $i++) { ?>
                                  <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                            <?php } ?>
                          </select>
                        </div> 
                        <br>          
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li>Nombres:</li>
                        <li>Apellidos:</li>
                        <li>Tipo documento:</li>
                        <li>Numero:</li>
                        <li>Telefono:</li>
                      </ul>
                    </div>
                   
                  </div>
                </article>
                <article class="col s12 m6 l6">
                  <div class="card z-depth-1 hoverable">
                    <div class="card-image cyan waves-effect">
                        <div class="card-title">Denunciante</div>
                           <div class="price-desc">
                              <select name="denunciante" id="denunciante" class="error browser-default js-example-basic-single">
                                <option value="" disabled selected>Seleccione una opcion</option> 
                                <?php $rows = get_posts( array('post_type' => 'pos_trabajadores','meta_key' => 'lw_tipo_trabajador','meta_value' => 'Afiliado') ); ?>
                                    <?php for ($i=0; $i < count($rows); $i++) { ?>
                                      <option value="<?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?>"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?> <?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></option>
                                <?php } ?>
                              </select> 
                             
                           </div> 
                           <br>          
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li>Nombres:</li>
                        <li>Apellidos:</li>
                        <li>Tipo documento:</li>
                        <li>Numero:</li>
                        <li>Telefono:</li>
                        <li>Negocio:</li>
                      </ul>
                    </div>
                   
                  </div>
                </article>
               
              </section>
            
           
           </div>  
         </div>
             <div class="row">
                <div class="input-field col s6">  
                  <h6>Detalle de la denuncia</h6>
                  <Textarea name="detalle_denuncia" class="content"><?php echo $detalle_denuncia; ?></Textarea>
                </div> 
                          
             </div>      
             <div class="row">
                
                 
                     
                    <div class="file-field input-field col s12">
                        <h6>Imagen o video relacionado a la denuncia (1)</h6>
                          <input class="form-control" type="text" name="lw_image1" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image1', true); ?>" />
                          <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                        
                        </h6>
                    </div>
                    <div class="file-field input-field col s12">
                        <h6>Imagen o video relacionado a la denuncia (2)</h6>
                          <input class="form-control" type="text" name="lw_image2" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image2', true); ?>" />
                          <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                        
                        </h6>
                    </div>
                    <div class="file-field input-field col s12">
                        <h6>Imagen o video relacionado a la denuncia (3)</h6>
                          <input class="form-control" type="text" name="lw_image3" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image3', true); ?>" />
                          <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                        
                        </h6>
                    </div>
                    <div class="file-field input-field col s12">
                        <h6>Imagen o video relacionado a la denuncia (4)</h6>
                          <input class="form-control" type="text" name="lw_image4" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image4', true); ?>" />
                          <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                        
                        </h6>
                    </div>
                    <div class="file-field input-field col s12">
                        <h6>Imagen o video relacionado a la denuncia (5)</h6>
                          <input class="form-control" type="text" name="lw_image5" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image5', true); ?>" />
                          <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                        
                        </h6>
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
  <div class="row">
    <div class="card-panel"> 
        <div class="wrap">
        <h2>Nuevo Afiliado o Trabajador</h2>
        <div class="row">
                <div class="input-field col s12">
                   <button type='submit' name="insert_trabajador" class="btn-floating btn waves-effect waves-light green"><i class="material-icons">save</i></button>
                   <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="volver()"><i class="material-icons">reply</i></button>                 
                 </div>
        </div>
        <hr>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <!-- <p>Three capital letters for the ID</p> -->
            <table class='wp-list-table widefat fixed'>
            
             <div class="row">
               <div class="input-field col s4">
                 <h6>Tipo</h6>
                 <select id="tipo_trabajador" name="tipo_trabajador" class="browser-default" required>
                    <option value="" disabled selected>Seleccione una tipo</option>
                    <option value="Trabajador">Trabajador</option>
                    <option value="Afiliado">Afiliado</option>
                 </select>
               </div>
              
               <div class="input-field col s4">
                 <h6>Nombres</h6>
                 <input type="text" name="nombres_trabajador" value="<?php echo $nombres_trabajador; ?>" class="ss-field-width" onkeyup="mayusculas(this);" required/>
               </div>  
               <div class="input-field col s4">
                 <h6>Apellidos</h6>
                 <input type="text" name="apellidos_trabajador" value="<?php echo $apellidos_trabajador; ?>" class="ss-field-width" onkeyup="mayusculas(this);" required/>
               </div>    
             </div>   
             <div class="row">
               <div class="input-field col s6">  
                 <h6>Telefono</h6>
                 <input type="number" name="telefono_trabajador" value="<?php echo $telefono_trabajador; ?>" class="ss-field-width" required/>
               </div>
               <div class="input-field col s6">  
                 <h6>Nombre del negocio</h6>
                 <input type="text" name="nombre_negocio" value="<?php echo $nombre_negocio; ?>" class="ss-field-width" required/>
               </div>  
             
             </div> 
             <div class="row">
               
               <div class="input-field col s6"> 
                 <h6>Tipo de Documento de Identidad</h6>
                 <select id="tipo_documento" name="tipo_documento" class="browser-default" required>
                    <option value="" disabled selected>Seleccione un tipo</option>
                    <option value="Carnet">Carnet</option>
                    <option value="Libreta de servicio militar">Libreta de servicio militar</option>
                    <option value="Certificado de nacimiento">Certificado de nacimiento</option>
                 </select>
               </div>  
               <div class="input-field col s6">  
                 <h6>Numero de Documento de Identidad</h6>
                 <input type="text" name="numero_documento" value="<?php echo $numero_documento; ?>" class="ss-field-width" required/>
               </div> 
             </div>   
              <div class="row">
               <div class="file-field input-field col s4">
                  <h6>Image o Logo</h6>
                    <input class="form-control" type="text" name="lw_image" value="<?php echo get_post_meta($setting[0]->ID, 'lw_image', true); ?>" required/>
                    <a href="#" onclick="open_modal_galery()" class='button'> Galeria</a>
                   
                  </h6>
               </div>
             </div>  
            </table>
           
            
        </form>
    </div>
   </div>
  </div>  
 </div>   

        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/icon.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>

        <!--angularjs-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/angular.min.js"></script>
        
        
        <!--prism -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/prism/prism.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!-- chartist -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/chartist-js/chartist.min.js"></script>   
        <!-- dropify -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/dropify/js/dropify.min.js"></script>
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins.min.js"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/custom-script.js"></script>
        <script>  
            function open_modal_galery() {
            window.open('upload.php', '_blank', 'location=yes,height=600,width=400,scrollbars=yes,status=yes');
            }   
        </script>  
        <script>
           function mayusculas(e) {
                e.value = e.value.toUpperCase();
           }
        </script>
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
                
                jQuery("#cuadro2").removeClass('slided').slideUp('fast');
                jQuery("#cuadro1").removeClass('slided').slideDown('fast'); 
              // alert('<?php echo $_SERVER['REQUEST_URI']; ?>');
            }

        </script>              
    <?php
}