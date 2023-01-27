<!doctype html>
<html lang="es">

<head>
  <title><? echo $_SESSION['pagina']; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
        .invalid-feedback{
            display: flex;
        }
    </style>
</head>

<body>


  <form action="./index.php" method="post">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 bg-dark">
      <a href="./index.php" class="d-flex align-items-center col-md-3 ms-lg-4 ms-md-4 mb-md-0 text-dark text-decoration-none">
        <img src="img/logo.png" alt="logo">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <input type="submit" name="home" class="nav-link px-2 link-danger btn" value="Inicio">
        <input type="submit" name="tienda" class="nav-link px-2 link-danger btn" value="Tienda">
        <input type="submit" name="codigo" class="nav-link px-2 link-danger btn" value="Ver código">
      </ul>
      <?
      if (estaValidado()) { ?>
        <div class="dropdown col-md-3 text-center me-lg-4 me-md-4">
          <p class="text-light">Hola <? echo $_SESSION['user'] ?></p>
          <a href="#" class="link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>
          </a>
          <ul class="dropdown-menu text-small">
            <li><input type="submit" class="dropdown-item" name="miperfil" value="Perfil"></li>
            <? if (esAdmin() || esModerador()) { ?>
              <li><input type="submit" class="dropdown-item" name="almacen" value="Almacen"></li>
              <li><input type="submit" class="dropdown-item" name="ventas" value="Ventas"></li>
            <? } ?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <input type="submit" value="Cerrar sesión" class="dropdown-item danger" name="logout">
            </li>
          </ul>
        </div>
      <? } else { ?>
        <div class="col-md-3 text-end me-lg-4 me-md-4">
          <input type="submit" value="Iniciar sesión" class="btn btn-outline-danger me-2" name="login">
          <input type="submit" value="Registrarse" class="btn btn-outline-danger me-2" name="registro">
        </div>
  </form>
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