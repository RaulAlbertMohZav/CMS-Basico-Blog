<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('meta-title', config('app.name') . " | Blog")</title>
    <meta name="description" content="@yield('meta-description', 'Este es el blog de Zendero')">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/framework.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="preload"></div>
  <header class="space-inter">
    <div class="container container-flex space-between">
      <div class="logo">
<!--        <img src="/img/logo.png" alt="">-->
        <p style="font-size: 25px; font-style: italic;">AlexBlog</p>
      </div>
      @include('partials.nav')
    </div>
  </header>

  <!-- Contenido -->
  @yield('content')

  <section class="footer">
    <footer>
    <div class="container">
      <div class="logo">
        <p style="font-size: 30px; font-weight: bold; font-style: italic;">AlexBlog</p>
      </div>
      <nav>
        <ul class="container-flex space-center list-unstyled">
          <li><a href="{{ route('pages.home') }}" class="c-gris-2 text-uppercase ">Inicio</a></li>
          <li><a href="{{ route('pages.about') }}" class="c-gris-2 text-uppercase ">Nosotros</a></li>
          <li><a href="{{ route('pages.archive') }}" class="c-gris-2 text-uppercase ">Archivo</a></li>
          <li><a href="{{ route('pages.contact') }}" class="c-gris-2 text-uppercase ">Contacto</a></li>
          <li><a href="{{ route('dashboard') }}" class="c-gris-2 text-uppercase ">Admin</a></li>
        </ul>
      </nav>
      <div class="divider-2"></div>
      <p>Estamos encantados de poder proporcionar buena información a la comunidad a través de publicaciones, categorías, autores, y más....</p>
      <div class="divider-2" style="width:80%;"></div>
      <p>© 2022 - AlexBlog. Toodos los derechos reservados. Desarrollado por <span class="c-white">Alex Martínez</span></p>
    </div>
</footer>
  </section>



  <script>
      (function (window, document) {
      var menu = document.getElementById('menu'),
          WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

      function toggleHorizontal() {
          [].forEach.call(
              document.getElementById('menu').querySelectorAll('.custom-can-transform'),
              function(el){
                  el.classList.toggle('pure-menu-horizontal');
              }
          );
      };

      function toggleMenu() {
          // set timeout so that the panel has a chance to roll up
          // before the menu switches states
          if (menu.classList.contains('open')) {
              setTimeout(toggleHorizontal, 500);
          }
          else {
              toggleHorizontal();
          }
          menu.classList.toggle('open');
          document.getElementById('toggle').classList.toggle('x');
      };

      function closeMenu() {
          if (menu.classList.contains('open')) {
              toggleMenu();
          }
      }

      document.getElementById('toggle').addEventListener('click', function (e) {
          toggleMenu();
          e.preventDefault();
      });

      window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
      })(this, this.document);

</script>

@stack('scripts')

</body>
</html>


