<?php
$errores='';
$enviado='';

    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];
/**___________________________Validacion Nombre________________________________________ */
        if (!empty($nombre)) {
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            
        } else {
            $errores .= 'Porfavor ingresa un nombre <br>';
        }
/**___________________________Validacion email________________________________________ */
        if (!empty($correo)) {
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

           if(!filter_var ($correo, FILTER_VALIDATE_EMAIL)){
                    $errores .= 'Por favor ingresa un correo valido <br>';
           }
        }else {
            $errores .= 'Porfavor ingresa un correo <br>';
        }
        
    
/**___________________________Validacion email________________________________________ */

        if(!empty($mensaje)){
            $mensaje = htmlspecialchars($mensaje);
            $mensaje = trim($mensaje);
            $mensaje = stripcslashes ($mensaje);
        }else{
            $errores .= 'Porfavor ingresa un mensaje <br>';
        }
   
/**___________________________Validacion de errores_______________________________________ */
        if(!$errores){
            $enviar_a ='correomio@gmail.copm';
            $asunto = 'Correo enviado desde mi casaxd';
            $mensaje_preparado = "De : $nombre <br>";
            $mensaje_preparado .= "Correo $correo <br>";
            $mensaje_preparado .= "Mensaje $mensaje";

           // mail($enviar_a, $asunto, $mensaje_preparado);
           $enviado ='true';
        }
 }

    require 'index.html'

?>
