<?php

function trabajadores_create() {
    if (isset($_POST['insert'])) {
       
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
   
    <div class="wrap">
        <h2>Nuevo Afiliado o Trabajador</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
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
           
            <div class="row">
                <div class="input-field col s12">
                   <button type='submit' name="insert" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></button>
                   <button type='button' class="btn-floating btn-large waves-effect waves-light blue" onclick="location.href='<?php echo admin_url('admin.php?page=registro-trabajadores'); ?>';"><i class="material-icons">reply</i></button>
                   
                 </div>
            </div>
        </form>
    </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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

    <?php
}