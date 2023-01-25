<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/cerdis.jpg" alt="Los Angeles" class="d-block w-100">
      <div class="container">
        <div class="carousel-caption text-start">
          <h1>Criados con cariño</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/dehesa.jpg" alt="Los Angeles" class="d-block w-100">

      <div class="container">
        <div class="carousel-caption">
          <h1>100% raza Iberica</h1>
          <p>Alimentados en las mejores dehesas</p>
          <p><a class="btn btn-lg btn-primary" href="#">Leer más</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/curando.jpg" alt="curando Jamones" class="d-block w-100">
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>Proceso de curacion natural</h1>
          <p>Al más puro estilo tradicional</p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="col-12 text-center">
  <p class="diplay-2">Los más deseados</p>
</div>

<div class="album py-5">
  <div class="container">
    <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
      <?php
      $arrayJamones=ProductoDAO::findAll();

      foreach ($arrayJamones as $jamon) {
        if ($jamon->precio >= 100) {?>
          <div class='col'>
          <div class='card shadow-sm'>
          <img src='<? echo $jamon->url ?>' width='100%' height='450'>
          <div class='card-body bg-dark'>
          <h3 class='h3 text-light'><? echo $jamon->nombre ?></h3>
          <p class='card-text text-light'><? echo $jamon->descripcion ?></p>
          <div class='d-flex justify-content-between align-items-center'>";
            <small class='text-light'><? echo $jamon->precio ?>€</small>";
          <div class='btn-group'>";
            <form action="./index.php" method="post">
              <input type="hidden" name="idProducto" value="<? echo $jamon->idProducto ?>">
              <input type="submit" value="Ver" name="ver" class="btn btn-danger">
            </form>
          </div>
          </div>
          </div>
          </div>
          </div>
        <?}
      }
      ?>
    </div>
  </div>
</div>