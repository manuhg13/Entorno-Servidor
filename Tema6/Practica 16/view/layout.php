<!doctype html>
<html lang="es">

<head>
  <title><? echo $_SESSION['pagina']; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
    <a href="./index.php" class="d-flex align-items-center col-md-3 ms-lg-4 ms-md-4 mb-md-0 text-dark text-decoration-none">
      <img src="img/logo.png" alt="logo">
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="./index.php" class="nav-link px-2 link-danger">Inicio</a></li>
      <li><a href="./Paginas/tienda.php" class="nav-link px-2 link-light">Tienda</a></li>
      <li><a href="./verCodigo.php?fichero=index.php" class="nav-link px-2 link-light">Ver código</a></li>

    </ul>
    <?
    if (estaValidado()) { ?>
      <div class="dropdown col-md-3 text-center me-lg-4 me-md-4">
        <p>Hola <? $_SESSION['user'] ?></p>
        <a href="#" class="d-block link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
          <svg class="bi d-block mx-auto mb-1" width="24" height="24" style="color: white;">
            <use xlink:href="#people-circle" />
          </svg>
        </a>
        <form action=""></form>
        <ul class="dropdown-menu text-small">
          <li><input type="submit" class="dropdown-item" name="miperfil" value="Perfil"></li>
          <? if (esAdmin() || esModerador()) { ?>
            <li><a class="dropdown-item" href="./Paginas/almacen.php">Almacen</a></li>
            <li><a class="dropdown-item" href="./Paginas/ventas.php">Ventas</a></li>';
          <? } ?>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="./logout.php">Cerrar sesión</a></li>
        </ul>
      </div>
    <? } else { ?>
      <div class="col-md-3 text-end me-lg-4 me-md-4">
        <a href="./login.php"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
        <a href="./registro.php"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Resgistrarse</button></a>
      </div>
    <? } ?>

  </header>
  <main>
    <? require_once($_SESSION['vista']) ?>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>