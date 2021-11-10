/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$( document ).ready(function() {
    
          function miJson2(){
            alert('entra al metodo');
                $.ajax({
                    url: 'siscomu3/?accion=docexterno.php',                  
                    type: 'POST',   
                    dataType: 'json',               
                    beforeSend: function () {
                      //mostrar el loading
                      alert('enviando...');
                    },
                    complete: function () {
                        //ocultar el loading
                        alert('accion completa');
                    },
                    success: function (datos){ 

                      $.each(datos, function(i,dato){
                        alert(dato.dexnen);
                        //$('#docExt').append('');
                      });  
                    }, error: function (er){
                      console.log('HORROR: ->' + er);
                    }
                }); 
        }
        $('#click').on('click', function (){
            miJson2();
        });
    
});