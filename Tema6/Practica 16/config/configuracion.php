<?
    //BBDD
    require_once('./config/conexionBD.php');

    //DAO
    require_once('./dao/FactoryBD.php');
    require_once('./dao/DAO.php');
    require_once('./dao/UsuarioDAO.php');
    require_once('./dao/ProductoDAO.php');
    require_once('./dao/VentasDAO.php');
    require_once('./dao/AlbaranDAO.php');

    //Modelo
    require_once('./modelo/Usuario.php');
    require_once('./modelo/Producto.php');
    require_once('./modelo/Ventas.php');
    require_once('./modelo/Albaran.php');

    //Core
    require_once('./core/funciones.php');



?>