<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Navbar con Bootstrap</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <i class="navbar-brandLogo">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M20.1 14.56a2.07 2.07 0 0 0-.47-.18V9.62a1.64 1.64 0 0 0 .48-.18 1.78 1.78 0 0 0-1.78-3.09 1.62 1.62 0 0 0-.41.32l-4.11-2.38a1.7 1.7 0 0 0 .07-.51 1.78 1.78 0 0 0-3.56 0 1.7 1.7 0 0 0 .07.51L6.28 6.66a1.58 1.58 0 0 0-.41-.31 1.78 1.78 0 0 0-1.78 3.09 1.64 1.64 0 0 0 .48.18v4.76a2.07 2.07 0 0 0-.47.18 1.78 1.78 0 1 0 1.78 3.09 1.72 1.72 0 0 0 .4-.31l4.11 2.37a1.7 1.7 0 0 0-.07.51 1.78 1.78 0 0 0 3.56 0 1.69 1.69 0 0 0-.09-.56l4.09-2.36a1.7 1.7 0 0 0 .44.35 1.78 1.78 0 1 0 1.78-3.09zM6.72 15.69a1.72 1.72 0 0 0-.19-.47 1.53 1.53 0 0 0-.31-.4l5.38-9.33a1.82 1.82 0 0 0 1 0l5.4 9.33a1.53 1.53 0 0 0-.31.4 1.72 1.72 0 0 0-.19.47zM17.5 7.4a1.81 1.81 0 0 0 .17 1.38 1.75 1.75 0 0 0 1.12.84v4.76h-.07l-5.39-9.31.05-.07zM10.82 5a.12.12 0 0 0 0 .05L5.48 14.4h-.07V9.62a1.75 1.75 0 0 0 1.12-.84A1.81 1.81 0 0 0 6.7 7.4zm2.6 14a1.78 1.78 0 0 0-1.32-.58 1.75 1.75 0 0 0-1.28.54L6.7 16.6v-.06h10.78v.11z"></path></svg>
          </i>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Productos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Teléfonos</a></li>
                <li><a class="dropdown-item" href="#">Tablets</a></li>
                <li><a class="dropdown-item" href="#">Accesorios</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Servicio al Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Quienes Somos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/img1.jpg" class="d-block w-100 img-fluid" alt="..">
    </div>
    <div class="carousel-item">
      <img src="assets/img/imgx" class="d-block w-100 img-fluid" alt="..">
    </div>
    <div class="carousel-item">
      <img src="assets/img/imgx" class="d-block w-100 img-fluid" alt="..">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- Bootstrap JS-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
