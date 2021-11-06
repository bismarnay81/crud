<?php

function trabajadores_create() {
    if (isset($_POST['insert'])) {
        $my_box = array(
            'tipo_trabajador'    => $_POST['tipo_trabajador'],
            'nombres_trabajador'  => $_POST['nombres_trabajador'],
            'carnet_trabajador'  => $_POST['carnet_trabajador'],
           
           

        );
        
        // Insert the post into the database
        $box_id = wp_insert_post( $my_box );
        header('Location: ' . admin_url('admin.php?page=registro-trabajadores'), true);
        die();
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/iby-master/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Nuevo Trabajador</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <!-- <p>Three capital letters for the ID</p> -->
            <table class='wp-list-table widefat fixed'>
               
                 <h4>Tipo</h4>
                 <select id="tipo_trabajador" name="tipo_trabajador">
                    <option value="" disabled selected>Seleccione una tipo</option>
                    <option value="1">Trabajador</option>
                    <option value="2">Afiliado</option>
                 </select>
              
                 <h4>Nombres y apellidos</h4>
                 <input type="text" name="nombres_trabajador" value="<?php echo $nombres_trabajador; ?>" class="ss-field-width" />
                 
                 <h4>Carnet</h4>
                 <input type="text" name="carnet_trabajador" value="<?php echo $carnet_trabajador; ?>" class="ss-field-width" />
               
                

            </table>
            <br>
            <input type='submit' name="insert" value='Guardar' class='button'>
            <a href="<?php echo admin_url('admin.php?page=central-riesgo'); ?>" class='button'> Volver</a>
        </form>
    </div>
    <?php
}