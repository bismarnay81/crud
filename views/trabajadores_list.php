<?php
function trabajadores_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/iby-master/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Trabajadores</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a class="button"  href="<?php echo admin_url('admin.php?page=trabajadores-nuevo'); ?>">Agregar Nuevo Trabajador</a>
               
            </div>
            <br class="clear">
        </div>
        <?php
            $args = array(
                'post_type'        => 'pos_register',
                'post_status'        => array ('pending', 'publish', 'private'),
                'author' => '-1',
            );
            $rows = get_posts( $args );
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Tipo</th>
                <th class="manage-column ss-list-width">Nombres</th>
                <th class="manage-column ss-list-width">Carnet</th>
               
            </tr>
            <?php for($i=0; $i < count($rows); $i++){ $user = get_user_by( 'id', $rows[$i]->tipo_trabajador ); ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->tipo_trabajador; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->nombres_trabajador; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->carnet_trabajador; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}