<?
     require('./Seguro/conexion.php');
     try {
         
         $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS);
         
         $script= file_get_contents('banco.sql');

         mysqli_multi_query($conexion,$script);
         mysqli_close($conexion);
     } catch (Exception $ex) {
         if ($ex->getCode()==1045){
             echo "Credenciales incorrectas";
         }
         if ($ex->getCode()==2002){
             echo "Acabado tiempo de conexión";
         }       
         if ($ex->getCode()==1049){
             echo "No existe la base de datos no existe";
         }       
     }
?>