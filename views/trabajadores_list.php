<?php
function trabajadores_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/iby-master/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Trabajadores</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <button type='button' class="btn-floating btn waves-effect waves-light red" onclick="location.href='<?php echo admin_url('admin.php?page=trabajadores-nuevo'); ?>';"><i class="material-icons">add</i></button>
            </div>
            <br class="clear">
        </div>
        <?php
            $args = array(
                'post_type'        => 'pos_trabajadores',
                
            );
            $rows = get_posts( $args );
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Id</th>
                <th class="manage-column ss-list-width">Tipo</th>
                <th class="manage-column ss-list-width">Nombres</th>
                <th class="manage-column ss-list-width">Apellidos</th>
                <th class="manage-column ss-list-width">Carnet</th>
                <th class="manage-column ss-list-width">Foto</th>
            </tr>
            <?php for($i=0; $i < count($rows); $i++)
               { 
            ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->ID; ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_tipo_trabajador', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_nombres', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_apellidos', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_numero_documento', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_image', true ); ?></td>
                </tr>
            <?php 
               }
            ?>
        </table>
    </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <?php
}