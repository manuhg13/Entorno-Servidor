<?
if (isset($_REQUEST['guardar'])){
    if ( $_SESSION['accion']=='editar'){
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $producto->precio=(float)$_REQUEST['precio'];
        $producto->descripcion=$_REQUEST['descripcion'];
        if(ProductoDAO::update($producto)){
            $_SESSION['controlador']=$controladores['producto'];
            $_SESSION['vista']=$vistas['almacen'];
            $lista= ProductoDAO::findAll();
            $albaran=AlbaranDAO::findAll();
        }
    }elseif ($_SESSION['accion']=='nuevo') {
        if (isset($_SESSION['prodError'])){
            unset($_SESSION['prodError']);
        }
        if (validarProducto()) {
            $nuevo= new Producto(null,$_REQUEST['nombre'],(float)$_REQUEST['precio'],$_REQUEST['descripcion'],$_REQUEST['stock'],'./web/img/'.$_FILES['url']['name']);
            
            if (ProductoDAO::insert($nuevo)){
                $_SESSION['controlador']=$controladores['producto'];
                $_SESSION['vista']=$vistas['almacen'];
                $lista= ProductoDAO::findAll();
                $albaran=AlbaranDAO::findAll();
            }
        }
    }
}else{
    $_SESSION['producto']=$_REQUEST['idProducto'];
    $producto=ProductoDAO::findById($_SESSION['producto']);
}


?>