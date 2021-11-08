<?php
function denuncias_list() {
    ?>
    
    <link type="text/css" rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud-main/resources/css/materialize.min.css"  media="screen,projection"/>
    <div class="wrap">
        <h2>Central de riesgo</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <button type='button' class="btn-floating btn waves-effect waves-light red" onclick="location.href='<?php echo admin_url('admin.php?page=denuncias-nuevo'); ?>';"><i class="material-icons">add</i></button>
            </div>
           
        </div>
        <hr>
        <div class="row">
                <div class="input-field col s6">  
                 
                  <i class="material-icons">search</i>
                  <input name="buscar_denuncia" value="<?php echo $buscar_denuncia; ?>" type="text"  placeholder="Escribe para buscar...">
                </div> 
        </div>        
        <?php
            $args = array(
                'post_type'        => 'pos_denuncias',
                
            );
            $rows = get_posts( $args );
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Denunciado</th>
                <th class="manage-column ss-list-width">Denunciante</th>
                <th class="manage-column ss-list-width">Detalle</th>
                <th class="manage-column ss-list-width">Estado</th>
            </tr>
            <?php for($i=0; $i < count($rows); $i++){  ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->ID; ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciado', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciante', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_detalle', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_estado', true ); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud-main/resources/icon.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud-main/resources/js/materialize.min.js"></script>
    <?php
}