<!doctype html>
<html lang="es">

<head>
  <title><? echo $_REQUEST['pagina']?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./web/css/theme.min.css">

</head>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll" data-aos-easing="ease" data-aos-duration="800" data-aos-delay="0">
  <form action="./index.php" method="post">
    <div class="container">
  <nav id="navScroll" class="navbar navbar-dark bg-black px-vw-5" tabindex="0">
    <div class="container">
      <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="./index.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-filetype-php" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.295.185.522Zm4.48 2.666V11.85h-.79v1.626H4.153V11.85h-.79v3.999h.79v-1.714h1.682v1.714h.79Zm.703-3.999h1.6c.288 0 .533.06.732.179.2.117.354.276.46.477.105.201.158.427.158.677 0 .25-.054.476-.161.677-.106.199-.26.357-.463.474a1.452 1.452 0 0 1-.733.173H8.12v1.342h-.791V11.85Zm2.06 1.714a.795.795 0 0 0 .084-.381c0-.227-.061-.4-.184-.521-.123-.122-.294-.182-.513-.182h-.66v1.406h.66a.794.794 0 0 0 .375-.082.574.574 0 0 0 .237-.24Z"/>
        </svg>
        <span class="ms-md-1 mt-1 fw-bolder me-md-5">Examen 2ª Evaluación</span>
      </a>

      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal g-3">
        <li class="nav-item">
          <input type="submit" class=" nav-link fs-5 btn" href="index.html" aria-label="Homepage" name="home" value="Inicio">
        </li>
      </ul>

      <?
      /*if (estaValidado()) { ?>
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
     <? } else { */?>
      <input type="submit" class="btn btn-light me-2" name="login" value="Inciar sesión">
      <input type="submit" class="btn btn-outline-light" name="registro" value="Registrarse">
      <?//}?>
    </div>
    </form>
  </nav>
  </div>
  
  <main>
    <? require_once($_SESSION['vista']) ?>
  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>