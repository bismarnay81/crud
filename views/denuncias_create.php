<?php

function denuncias_create() {
    if (isset($_POST['insert'])) {
        $my_box = array(
            'post_title'    => $_POST['post_title'],
            'post_content'  => $_POST['post_content'],
            'post_status'   => 'pending',
            'post_type'   => 'pos_register',
            'meta_input' => array(
                'lw_nota_apertura' => null,
                'lw_nota_cierre' => null,
                'lw_monto_inicial' => null,
                'lw_monto_final' => null,
                'outlet' => $_POST['outlet'] , //pos_outlet
                'receipt' => $_POST['receipt'] , //pos_receipt
                'customer' => $get_user->id, //user
                'lw_or' => $_POST["option_restaurant"]  ? 'true' : 'false', // options restaurnt
            )

        );
        
        // Insert the post into the database
        $box_id = wp_insert_post( $my_box );
        header('Location: ' . admin_url('admin.php?page=cajas'), true);
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
               
               
                <tr>
                    <th class="ss-th-width">Nombre del denunciado</th>
                    <td><input type="text" name="nombre_denunciado" value="<?php echo $nombre_denunciado; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Carnet</th>
                    <td><input type="text" name="carnet_denunciado" value="<?php echo $carnet_denunciado; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Descripcion</th>
                    <td><Textarea name="post_content" class="ss-field-width"><?php echo $post_content; ?></Textarea></td>
                </tr>
                

            </table>
            <br>
            <input type='submit' name="insert" value='Guardar' class='button'>
            <a href="<?php echo admin_url('admin.php?page=central-riesgo'); ?>" class='button'> Volver</a>
        </form>
    </div>
    <?php
}