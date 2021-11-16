<?php
function denuncias_list() {
    ?>
      <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/jquery-1.11.2.min.js"></script>   
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
   
    <!--<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/css/font-awesome.min.css">--> 
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/magnific-popup/magnific-popup.css" type="text/css" rel="stylesheet" media="screen,projection">  

    
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/select2.full.js"></script>
    <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/css/select2.min.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/dist/js/i18n/es.js"></script> 
    
    <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12 ocultar">
     <div class="row">
      <div class="col s12 m12 l12">
       <div class="card-panel">  
          <div class="col s12 m12 112">
              <h6>DENUNCIAS</h6>
               
          </div> 
        <div class="tablenav top">
            <div class="alignleft actions">
                <button type='button' class="btn-floating btn waves-effect waves-light red" onclick="location.href='<?php echo admin_url('admin.php?page=denuncias-nuevo'); ?>';"><i class="material-icons">add</i></button>
                
            </div>
           
        </div>
        <hr>
        <div class="row">
            
                 
                   <h6>Buscar</h6>
                      <select id="buscar" name="buscar" class="error browser-default js-example-basic-single" data-error=".errorTxt15"  style="width:400px;border:1px solid #04467E">
                         <option value="" disabled selected>Seleccione una nota de pedido</option>
                      </select>
                    
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
                
                <th class="manage-column ss-list-width">Fecha</th>
                <th class="manage-column ss-list-width">Estado</th>
                <th class="manage-column ss-list-width">Ver</th>
                <th class="manage-column ss-list-width">Eliminar</th>
                <th class="manage-column ss-list-width">Imprimir</th>
            </tr>
          </thead>  
          <tbody>
            <?php for($i=0; $i < count($rows); $i++){  ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->ID; ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciado', true ); ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_denunciante', true ); ?></td>
                   
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->post_date; ?></td>
                    <td class="manage-column ss-list-width"><?php echo get_post_meta( $rows[$i]->ID, 'lw_estado', true ); ?></td>
                    <td class="manage-column ss-list-width"><button id="" type="button" class="btn-floating btn waves-effect waves-light brown btn-clip-preview" onclick="verdenunciaBoton();"><i class="mdi-action-find-in-page"></i></button></td>
                    <td class="manage-column ss-list-width"><button id="" type="button" class="btn-floating btn waves-effect waves-light black btn-clip-preview" onclick="eliminardenunciaBoton();"><i class="mdi-content-clear"></i></button></td>
                    <td class="manage-column ss-list-width"><button id="" type="button" class="btn-floating btn waves-effect waves-light teal btn-clip-preview" onclick="imprimirdenunciaBoton();"><i class="mdi-action-print"></i></button></td>
                </tr>
            <?php } ?> 
          </tbody>   
        </table>
       </div> 
      </div>       
     </div>   
    </div>
    <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">  
               
                <div class="row">
                  <button type='button' class="btn-floating btn waves-effect waves-light blue" onclick="volver()"><i class="material-icons">reply</i></button>
                  <hr>
                  <h6>Denuncia:</h6>
                  <h6>Fecha:</h6>
                  <h6>Hora:</h6>
                  <h6>Usuario de recepcion:</h6>
                  <br>
                  <hr>
                </div>
                
                    
                            <div class="row">
                                            <div class="col s4">
                                                <div class="center promo promo-example">
                                                    <i class="mdi-action-perm-contact-cal"></i>
                                                    <p class="flow-text">Denunciado</p>
                                                    <p class="light center">Nombre:</p>
                                                    <p class="light center">Nombre:</p>
                                                    <p class="light center">Nombre:</p>
                                                </div>
                                            </div>
                                            <div class="col s4">
                                                <div class="center promo promo-example">
                                                    <i class="mdi-social-group"></i>
                                                    <p class="flow-text">Denunciante</p>
                                                    <p class="light center">Nombre:</p>
                                                </div>
                                            </div>
                                            <div class="col s4">
                                                <div class="center promo promo-example">
                                                    <i class="mdi-action-description"></i>
                                                    <p class="flow-text">Detalle de la denuncia</p>
                                                    <p class="light center">We have provided detailed  as well as specific code examples to help new users get started.</p>
                                                </div>
                                            </div>
                            </div>
                            <hr>
                            <h5>Galeria multimedia de la denuncia</h5>
                        <div class="row">    
                          <div class="section">  
                            <div class="masonry-gallery-wrapper">                
                                <div class="popup-gallery">
                                        <div class="gallary-sizer"></div>
                                        <div class="gallary-item"><a href="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/photo_2021-11-11_15-53-11.jpg" title="The Cleaner"><img src="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/photo_2021-11-11_15-53-11.jpg"></a></div>
                                        <div class="gallary-item"><a href="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/caritas.png" title="Winter Dance"><img src="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/caritas.png"></a></div>
                                        <div class="gallary-item"><a href="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/pompeya.png" title="Winter Dance"><img src="http://localhost:8085/paginaprueba/wp-content/uploads/2021/11/pompeya.png"></a></div>
                                        
                                </div>
                            </div>
                          </div>
                        </div>  
          </div> 
        </div>
      </div>        
       
        
    </div>    
       <!-- jQuery Library -->
       
        <link href="<?php echo WP_PLUGIN_URL; ?>/crud/resources/icon.css" rel="stylesheet">
        <!--<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>-->
        
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/materialize.min.js"></script>
         <!--prism -->
         <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/prism/prism.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!-- chartist -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/chartist-js/chartist.min.js"></script>   
        <!--sweetalert -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/sweetalert/sweetalert.min.js"></script>   
        <!-- masonry -->
        <script src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/masonry.pkgd.min.js"></script>
        <!-- imagesloaded -->
        <script src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/imagesloaded.pkgd.min.js"></script>    
        <!-- magnific-popup -->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>  
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/plugins.min.js"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/crud/resources/js/custom-script.js"></script>
        <script type="text/javascript">
                /*
                * Masonry container for Gallery page
                */
                var $containerGallery = $(".masonry-gallery-wrapper");
                $containerGallery.imagesLoaded(function() {
                    $containerGallery.masonry({
                        itemSelector: '.gallary-item img',
                    columnWidth: '.gallary-sizer',
                    isFitWidth: true
                    });
                });

                //popup-gallery
                $('.popup-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    closeOnContentClick: true,    
                    fixedContentPos: true,
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile mfp-no-margins mfp-with-zoom',
                    gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                    verticalFit: true,
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                    },
                    zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                    }
                    }
                });
        </script>
        <script>		
           
            jQuery(document).ready(function($){
           
                $(".js-example-basic-single").select2();
                $("#cuadro2").slideUp("slow");
                $("#cuadro1").slideDown("slow");
                $('#buscar').change(function(){
                    var sele = $("#buscar option:selected").text();
                
                    var indice = sele.split('-');
                    var extraida = indice[0];
                    buscar_selecionado(extraida);
                  
                });        
                listar_denunciados();          
            }); 
            function volver(){  
                jQuery("#cuadro2").removeClass('slided').slideUp('fast');
                jQuery("#cuadro1").removeClass('slided').slideDown('fast'); 
            }
            function imprimir_denunciaboton(){  
                window.open('<?php echo WP_PLUGIN_URL; ?>'+'/crud/views/imprimir_denuncia.php', '_blank', 'location=yes,height=600,width=400,scrollbars=yes,status=yes');
               
            }
            function verdenunciaBoton(){  
                
                jQuery("#cuadro1").removeClass('slided').slideUp('fast');
                jQuery("#cuadro2").removeClass('slided').slideDown('fast'); 
              
            }
            function eliminardenunciaBoton(){  
                
                swal({
                        title: "Esta seguro de eliminar esta denuncia?",

                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'SI',
                        cancelButtonText: "NO",
                        closeOnConfirm: false,
                        closeOnCancel: true
                      },
                            function(isConfirm)

                           {

                              if (isConfirm)
                              {  
                                  
            
                                   swal({
                                   title: "Eliminado",
                                   text: "La denuncia fue eliminada correctamente",
                                   type: "success",
                                   timer: 2000,
                                   showConfirmButton: false
                                   });
                                   //$(".lean-overlay").remove();
                                    var idempleado = $("#idempleado").val();
                                    //var opcion = $("#opcion").val();
                                    var opcion = "eliminar";
                                    $.ajax({
                                            method:"POST",
                                            url: "model/empleadoModel.php",
                                            data: {"idempleado": idempleado, "opcion": opcion}
                                    }).done( function( info ){
                                            //var json_info = JSON.parse( info );
                                            //mostrar_mensaje( json_info );
                                            Mensajes(info);
                                    });

                              } 
                            });
              
            }
            var listar_denunciados = function(){
                
                    $.ajax({
                              url: "<?php echo WP_PLUGIN_URL; ?>/crud/controller/buscar_denunciados.php",
                              type:'post',
                              dataType:'json'
                        }).done( function( denunciados ){
                            var $select = $('#buscar');
                            $select.empty();
                            $select.html('<option selected disabled>Seleccione una opcion</option>');
                            $.each(denunciados,function(index,denunciado){                             
                                $select.append('<option value="'+ denunciado.numero_documento +'">'+ denunciado.nombres+' '+ denunciado.apellidos + '-'+ denunciado.documento + ':'+ denunciado.numero_documento +'</option>');
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
                                           
                                             //alert("sin resultados");
                                             swal("El trabajador seleccionado no tiene denuncias");
                                        } else {
                                               var $dtdenuncias = $('#dtdenuncias');
                                              
                                                $.each(response,function(index,respuesta){      
                                                    $dtdenuncias.append('<tr><td>'+ respuesta.id +'</td><td>'+ respuesta.denunciado +'</td><td>'+ respuesta.denunciante +'</td><td>'+ respuesta.fecha +'</td><td>'+ respuesta.estado +'</td><td><button id="ver_denuncia" type="button" class="btn-floating btn waves-effect waves-light brown btn-clip-preview" onclick="verdenunciaBoton();"><i class="mdi-action-find-in-page"></i></button></td><td><button id="eliminar_denuncia" type="button" class="btn-floating btn waves-effect waves-light black btn-clip-preview" onclick="eliminardenunciaBoton();"><i class="mdi-content-clear"></i></button></td><td><button id="imprimir_denuncia" type="button" class="btn-floating btn waves-effect waves-light green btn-clip-preview" onclick="imprimirdenunciaBoton();"><i class="mdi-action-print"></i></button></td><tr>');
                                                });     
                                           
                                        }		
                                    }
                        });

            }    
        </script>    
    <?php
}