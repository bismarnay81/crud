<?php
function denuncias_list() {
    ?>
    
     <!--<link type="text/css" rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/materialize.min.css"  media="screen,projection"/>--> 
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/vendor/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/select2.full.js"></script>
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/css/select2.min.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/i18n/es.js"></script> 
    
    <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12 ocultar">
     <div class="row">
      <div class="col s12 m12 l12">
       <div class="card-panel">  
          <div class="col s12 m12 112">
              <div class="row">
                  <ul class="tabs">
                      <li class="tab col s9"><a class="white-text red darken-1 waves-effect waves-light"><h6>DENUNCIAS</h6></a>
                      </li>
                   </ul>
              </div>
          </div> 
        <div class="tablenav top">
            <div class="alignleft actions">
                <button type='button' class="btn-floating btn waves-effect waves-light red" onclick="location.href='<?php echo admin_url('admin.php?page=denuncias-nuevo'); ?>';"><i class="material-icons">add</i></button>
                
            </div>
           
        </div>
        <hr>
        <div class="row">
               <!-- <div class="input-field col s6">  
                 
                  <i class="material-icons">search</i>
                  <input id="buscar_denuncia2" name="buscar_denuncia2" value="<?php echo $buscar_denuncia2; ?>" type="text"  placeholder="Escribe para buscar...">
                </div>--> 
                <div class="input-field col s8"> 
                   <h6>Buscar</h6>
                      <select id="buscar" name="buscar" class="error browser-default js-example-basic-single" data-error=".errorTxt15">
                         <option value="" disabled selected>Seleccione una nota de pedido</option>
                      </select>
                </div>      
        </div>        
        <?php
            $args = array(
                'post_type'        => 'pos_denuncias',
                
            );
            $rows = get_posts( $args );
        ?>
        <table id="dtdenuncias" name="dtdenuncias" class='wp-list-table widefat fixed striped posts'>
          <thead> 
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Denunciado</th>
                <th class="manage-column ss-list-width">Denunciante</th>
                <th class="manage-column ss-list-width">Detalle</th>
                <th class="manage-column ss-list-width">Fecha</th>
                <th class="manage-column ss-list-width">Estado</th>
            </tr>
          </thead>  
          <tbody>
            <?php for($i=0; $i < count($rows); $i++){  ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->ID; ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciado', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciante', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_detalle', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_detalle', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_estado', true ); ?></td>
                </tr>
            <?php } ?> 
          </tbody>   
        </table>
       </div> 
      </div>       
     </div>   
    </div>
    <div id="cuadro2" class="wrap">
        <h2>cuadro2</h2>
        <button type='button' class="btn-floating btn-large waves-effect waves-light blue" onclick="volver()"><i class="material-icons">reply</i></button>
    </div>    
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/icon.css" rel="stylesheet">
        <!--<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script>		
           
            jQuery(document).ready(function($){
                // now you can use jQuery code here with $ shortcut formatting
                // this will execute after the document is fully loaded
                // anything that interacts with your html should go here
                $(".js-example-basic-single").select2();
                $("#cuadro2").slideUp("slow");
                $("#cuadro1").slideDown("slow");
                $('#buscar').change(function(){
                    var sele = $("#buscar option:selected").text();
                    //alert(sele);
                    var indice = sele.split('-');
                    var extraida = indice[0];
                    buscar_selecionado(extraida);
                   // alert(extraida);
                });        
                // searchs products --------------------------------------------------------------
                        $("#buscar_denuncia2").on('keyup', function (e) {
                            e.preventDefault();
                            
                            if (e.key === 'Enter' || e.keyCode === 13) {
                               
                                $.ajax({
                                    url: "<?php echo WP_PLUGIN_URL; ?>/crud/controller/search.php",
                                    dataType: "json",
                                    data: { "get_denuncia": $("#buscar_denuncia2").val() },
                                    success: function (response) {
                                        console.log(response);
                                        $('#dtdenuncias tbody').remove();
                                        if (response.length == 0) {
                                           
                                             alert("sin resultados");
                                        } else {
                                               // for(var i=0; i< response.length; i++){
                                               // }	

                                               var $dtdenuncias = $('#dtdenuncias');
                                              
                                                $.each(response,function(index,respuesta){      
                                                    $dtdenuncias.append('<tr><td>'+ respuesta.denunciado +'</td><td>'+ respuesta.denunciado +'</td><td>'+ respuesta.denunciado +'</td><td>'+ respuesta.denunciado +'</td><tr>');
                                                });     
                                           
                                        }		
                                    }
                                });
                                    

                                    
                                
                            }
                        });
                listar_denunciados();          
            }); 
    
  
           function vercuadro(){  
                
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
            var listar_denunciados = function(){
                
                    $.ajax({
                              url: "<?php echo WP_PLUGIN_URL; ?>/crud/controller/buscar_denunciados.php",
                              type:'post',
                              dataType:'json'
                              //data: { "get_buscar": $("#buscar").val() },
                        }).done( function( denunciados ){
                            var $select = $('#buscar');
                            $select.empty();
                            $select.html('<option selected disabled>Seleccione una opcion</option>');
                            $.each(denunciados,function(index,denunciado){                             
                                $select.append('<option value="'+ denunciado.id +'">'+ denunciado.nombres+' '+ denunciado.apellidos + '-'+ denunciado.documento +'</option>');
                            });
                            $select.material_select();
                       });

            }
            var buscar_selecionado = function(recibido){
                        $.ajax({
                                    url: "<?php echo WP_PLUGIN_URL; ?>/crud/controller/search.php",
                                    dataType: "json",
                                    data: { "get_denuncia": recibido },
                                    success: function (response) {
                                        console.log(response);
                                        $('#dtdenuncias tbody').remove();
                                        if (response.length == 0) {
                                           
                                             alert("sin resultados");
                                        } else {
                                               // for(var i=0; i< response.length; i++){
                                               // }	

                                               var $dtdenuncias = $('#dtdenuncias');
                                              
                                                $.each(response,function(index,respuesta){      
                                                    $dtdenuncias.append('<tr><td>'+ respuesta.id +'</td><td>'+ respuesta.denunciado +'</td><td>'+ respuesta.denunciante +'</td><td>'+ respuesta.detalle +'</td><td>'+ respuesta.fecha +'</td><td>'+ respuesta.estado +'</td><tr>');
                                                });     
                                           
                                        }		
                                    }
                        });

            }    
        </script>    
    <?php
}