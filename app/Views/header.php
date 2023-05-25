<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?= $title ?></title>


  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Include CSS file -->
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- Include Font Awesome CSS file -->
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital@1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


  <?php $session = session(); ?>

</head>

<body class="position-static bg-color">
  <div class="position-static">
    <header class="position-sticky fixed-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-color-nav p-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <i class="navbar-brandLogo">
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                <path d="M20.1 14.56a2.07 2.07 0 0 0-.47-.18V9.62a1.64 1.64 0 0 0 .48-.18 1.78 1.78 0 0 0-1.78-3.09 1.62 1.62 0 0 0-.41.32l-4.11-2.38a1.7 1.7 0 0 0 .07-.51 1.78 1.78 0 0 0-3.56 0 1.7 1.7 0 0 0 .07.51L6.28 6.66a1.58 1.58 0 0 0-.41-.31 1.78 1.78 0 0 0-1.78 3.09 1.64 1.64 0 0 0 .48.18v4.76a2.07 2.07 0 0 0-.47.18 1.78 1.78 0 1 0 1.78 3.09 1.72 1.72 0 0 0 .4-.31l4.11 2.37a1.7 1.7 0 0 0-.07.51 1.78 1.78 0 0 0 3.56 0 1.69 1.69 0 0 0-.09-.56l4.09-2.36a1.7 1.7 0 0 0 .44.35 1.78 1.78 0 1 0 1.78-3.09zM6.72 15.69a1.72 1.72 0 0 0-.19-.47 1.53 1.53 0 0 0-.31-.4l5.38-9.33a1.82 1.82 0 0 0 1 0l5.4 9.33a1.53 1.53 0 0 0-.31.4 1.72 1.72 0 0 0-.19.47zM17.5 7.4a1.81 1.81 0 0 0 .17 1.38 1.75 1.75 0 0 0 1.12.84v4.76h-.07l-5.39-9.31.05-.07zM10.82 5a.12.12 0 0 0 0 .05L5.48 14.4h-.07V9.62a1.75 1.75 0 0 0 1.12-.84A1.81 1.81 0 0 0 6.7 7.4zm2.6 14a1.78 1.78 0 0 0-1.32-.58 1.75 1.75 0 0 0-1.28.54L6.7 16.6v-.06h10.78v.11z"></path>
              </svg> -->
              <svg fill="#000000" width="33" height="33" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 428 428" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 428 428">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="m413.226,180.383l-194.151-178.405c-2.869-2.637-7.28-2.637-10.149-8.65974e-15l-194.152,178.405c-2.276,2.092-3.036,5.365-1.914,8.246 1.123,2.88 3.897,4.777 6.988,4.777h45.006v227.094c0,4.142 3.358,7.5 7.5,7.5h283.291c4.142,0 7.5-3.358 7.5-7.5v-227.095h45.006c3.091,0 5.866-1.896 6.988-4.777 1.123-2.88 0.363-6.154-1.913-8.245zm-200.726-70.883c0-2.757 2.243-5 5-5s5,2.243 5,5-2.243,5-5,5-5-2.243-5-5zm143.145,68.905c-4.142,0-7.5,3.358-7.5,7.5v227.095h-58.745v-72.393l20.402-20.402c2.2,0.834 4.573,1.312 7.062,1.312 11.028,0 20-8.972 20-20s-8.972-20-20-20-20,8.972-20,20c0,3.039 0.701,5.911 1.92,8.494l-22.187,22.187c-1.407,1.406-2.197,3.314-2.197,5.303v75.499h-16.9v-158.393l13.857-13.857c2.491,1.116 5.242,1.751 8.143,1.751 11.028,0 20-8.972 20-20s-8.972-20-20-20-20,8.972-20,20c0,2.631 0.524,5.139 1.451,7.442l-16.255,16.255c-1.407,1.406-2.197,3.314-2.197,5.303v161.499h-17.499v-284.972c7.32-2.974 12.5-10.152 12.5-18.528 0-11.028-8.972-20-20-20s-20,8.972-20,20c0,8.375 5.18,15.553 12.5,18.528v284.972h-17.5v-201.713c0-1.989-0.79-3.897-2.197-5.303l-15.162-15.162c1.361-2.7 2.146-5.738 2.146-8.962 0-11.028-8.972-20-20-20s-20,8.972-20,20 8.972,20 20,20c2.298,0 4.497-0.409 6.554-1.125l13.659,13.66v198.605h-17.5v-115.5c0-1.989-0.79-3.897-2.197-5.303l-22.187-22.187c1.218-2.582 1.92-5.454 1.92-8.493 0-11.028-8.972-20-20-20s-20,8.972-20,20 8.972,20 20,20c2.489,0 4.862-0.478 7.062-1.312l20.402,20.402v112.393h-65.145v-227.095c0-4.142-3.358-7.5-7.5-7.5h-33.26l174.905-160.719 174.905,160.72h-33.26zm-43.781,123.11c0-2.757 2.243-5 5-5s5,2.243 5,5-2.243,5-5,5-5-2.243-5-5zm-37.364-79.016c0-2.757 2.243-5 5-5s5,2.243 5,5-2.243,5-5,5-5-2.243-5-5zm-117.213-35.64c-2.757,0-5-2.243-5-5s2.243-5 5-5 5,2.243 5,5-2.243,5-5,5zm-39.751,79.656c-2.757,0-5-2.243-5-5s2.243-5 5-5 5,2.243 5,5-2.243,5-5,5z"></path>
                </g>
              </svg>
            </i>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

              <li class="nav-item  p-2">
                <a class="nav-link" href="/products">Catalogo</a>
              </li>

              <?php if ($session->user_id == 1) : ?>
                <li class="nav-item  p-2">
                  <a class="nav-link" href="/add">Agregar Producto</a>
                </li>

                <li class="nav-item  p-2">
                  <a class="nav-link" href="/user-list">Usuarios</a>
                </li>
              <?php endif; ?>


              <li class="nav-item  p-2">
                <a class="nav-link" href="/nosotros">Quienes Somos</a>
              </li>

              <li class="nav-item  p-2">
                <a class="nav-link" href="/comercializacion">Comercialización</a>
              </li>

              <li class="nav-item  p-2">
                <a class="nav-link" href="/contacto">Información de Contacto</a>
              </li>
              <li class="nav-item  p-2">
                <a class="nav-link" href="/terminos">Términos y Usos</a>
              </li>
              
              <li class="nav-item  p-2">
                <a class="nav-link" href="/cart">Carrito</a>
              </li>
              <li class="nav-item dropdown m-0 p-2">
                <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i>
                </a>
                <ul class="dropdown-menu text-center" aria-labelledby="loginDropdown">
                  <?php if ($session->has('user_id')) : ?>
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                    <li><a class="dropdown-item" href="/logout">Deslogearse</a></li>
                  <?php else : ?>
                    <li><a class="dropdown-item" href="/login">Logear</a></li>
                    <li><a class="dropdown-item" href="/register">Registrar</a></li>
                  <?php endif; ?>
                </ul>
              </li>

            </ul>


          </div>
        </div>
      </nav>

    </header>