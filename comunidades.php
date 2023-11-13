<?php include("template/cabecera.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comparto HTML CSS Template</title>
</head>
<body>
   <p>
    
   </p>
   <p></p>
   <p></p>
    <!-- Back to top button -->
    <a id="button"><i class="fas fa-angle-up fa-2x"></i></a>
    <div class="container-fluid">
        <div class="tm-site-header tm-mb-1">
            <div class="tm-site-name-container tm-bg-color-1">
                <h1 class="tm-text-white">PC GAMING</h1>
            </div>
            <div class="tm-nav-container tm-bg-color-8">
                <nav class="tm-nav" id="tm-nav">
                    <ul>
                        <li class="tm-nav-item current">
                            <a href="#about" class="tm-nav-link">
                                <span class="tm-mb-1">.01</span>
                                <span>GENERAL</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#services" class="tm-nav-link">
                            <span class="tm-mb-1">.02</span>
                                <span>POST</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#gallery" class="tm-nav-link">
                                <span class="tm-mb-1">.03</span>
                                <span>TOP POST</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#create" class="tm-nav-link">
                                <span class="tm-nav-text tm-mb-1">.04</span>
                                <span class="tm-nav-text">CREAR</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <section class="tm-mb-1" id="about">
            <div class="tm-row tm-about-row">
                <div class="tm-section-1-l">
                    <img src="img/logo_comunidad_pc.jpg" alt="About image" class="tm-img-responsive">
                </div>
                <article class="tm-section-1-r tm-bg-color-8">
                    <h2 class="tm-mb-2 tm-title-color">.01 Un poco sobre la comunidad</h2>
                    <p><strong>PC GAMING</strong></p> 

                    <p>
                    En PC gaming creamos un espacio en línea dedicado a jugadores de 
                    computadora que comparten un interés común en los videojuegos. 
                    Estas comunidad ofrece un lugar donde los jugadores pueden conectarse, interactuar y 
                    compartir contenido relacionado con los juegos de PC 
            
                    </p>
                </article>
            </div>
        </section>

        <div class="tm-bg-color-1 tm-mb-1 tm-row tm-social-row">
            <div class="tm-icon">
                <div class="tm-icon-inner">
                    <a href="#services">
                        <i class="fas fa-synagogue fa-4x tm-mb-1"></i>
                        <p>INFORMACION Y NOTICIAS SOBRE EL MUNDO DEL GAMING Y LAS PC</p>
                    </a>
                </div>
            </div>
            <div class="tm-icon">
                <div class="tm-icon-inner">
                    <a href="#gallery">
                        <i class="fas fa-chart-bar fa-4x tm-mb-1"></i>
                        <p>VE LAS PUBLICACIONES QUE ESTAN EN TENDENCIA </p>
                    </a>
                </div>
            </div>
            <div class="tm-icon">
                <div class="tm-icon-inner">
                    <a href="#services">
                        <i class="fas fa-images fa-4x tm-mb-1"></i>
                        <p>SUBE CLIPS, IMAGENES U OPINIONES INTERANTES SOBRE EL GAMING</p>
                    </a>
                </div>
            </div>
        </div>

        <section class="tm-mb-1 tm-row tm-services-row" id="services">
            <div> 
            <head>
    <title>Publicación al estilo de Facebook</title>
</head>
<body>
    <h1>Publicación al estilo de Facebook</h1>
    <div>
        <input type="text" id="username" placeholder="Nombre de usuario">
        <textarea id="post-content" placeholder="¿Qué estás pensando?"></textarea>
        <button onclick="publicar()">Publicar</button>
    </div>
    <div id="publicaciones">
        <!-- Aquí se mostrarán las publicaciones -->
    </div>

    <script>
        function publicar() {
            var username = document.getElementById("username").value;
            var contenido = document.getElementById("post-content").value;

            if (username.trim() === "" || contenido.trim() === "") {
                alert("Debes ingresar un nombre de usuario y contenido antes de publicar.");
                return;
            }

            var publicacion = {
                username: username,
                contenido: contenido,
                likes: 0,
                comentarios: []
            };

            var publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
            publicaciones.push(publicacion);
            localStorage.setItem("publicaciones", JSON.stringify(publicaciones));

            mostrarPublicaciones();
            document.getElementById("post-content").value = "";
        }

        function mostrarPublicaciones() {
            var publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
            var publicacionesContainer = document.getElementById("publicaciones");
            publicacionesContainer.innerHTML = "";

            publicaciones.forEach(function (publicacion, index) {
                var publicacionDiv = document.createElement("div");
                publicacionDiv.className = "publicacion";
                publicacionDiv.innerHTML = `
                    <p><strong>${publicacion.username}</strong> - ${publicacion.contenido}</p>
                    <button onclick="darLike(${index})">Like (${publicacion.likes})</button>
                    <button onclick="mostrarComentarios(${index})">Comentarios</button>
                    <div class="comentarios" id="comentarios-${index}"></div>
                    <input type="text" id="comentario-input-${index}" placeholder="Añadir un comentario">
                    <button onclick="agregarComentario(${index})">Publicar Comentario</button>
                `;

                publicacionesContainer.appendChild(publicacionDiv);
            });
        }

        function darLike(index) {
            var publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
            publicaciones[index].likes++;
            localStorage.setItem("publicaciones", JSON.stringify(publicaciones));
            mostrarPublicaciones();
        }

        function mostrarComentarios(index) {
            var comentariosContainer = document.getElementById(`comentarios-${index}`);
            comentariosContainer.innerHTML = "";

            var publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
            publicaciones[index].comentarios.forEach(function (comentario) {
                var comentarioDiv = document.createElement("div");
                comentarioDiv.className = "comentario";
                comentarioDiv.textContent = comentario;
                comentariosContainer.appendChild(comentarioDiv);
            });
        }

        function agregarComentario(index) {
            var comentarioInput = document.getElementById(`comentario-input-${index}`);
            var comentario = comentarioInput.value;

            if (comentario.trim() === "") {
                alert("Debes ingresar un comentario antes de publicar.");
                return;
            }

            var publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
            publicaciones[index].comentarios.push(comentario);
            localStorage.setItem("publicaciones", JSON.stringify(publicaciones));
            mostrarComentarios(index);
            comentarioInput.value = "";
        }

        mostrarPublicaciones();
    </script>

    <style>
        .publicacion {
            border: 1px solid #ccc;
            padding: 70px;
            margin: 10px 0;
            background-color: #fff;
        }

        .comentario {
            margin-top: 5px;
            padding: 80px;
            background-color: #f0f0f0;
        }
    </style>
</body>

            </div>

        </section>
        <section class="tm-bg-color-4 tm-mb-3 tm-gallery-section" id="gallery">
        <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">PUBLICACIONES EN TENDENCIA</h4>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="detail-page.html">
                                        <img src="img/jarrados.png" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="detail-page.html">
                                            Nuevo Descubrimiento 
                                        </a>
                                    </h5>

                                    <div class="profile-block d-flex">
                                        <img src="images/profile/woman-posing-black-dress-medium-shot.jpg" class="profile-block-image img-fluid" alt="">

                                        <p>AcamoDev1
                                            <strong>Chief</strong></p>
                                    </div>

                                    <p class="mb-0">Chicos les recomiendo que le den una visita al canal de Jarod's Tech si les interesa 
                                        saber mas sobre el mundo de las laptop gaming 
                                    </p>

                                    <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                        <a href="#" class="bi-heart me-1">
                                            <span>3.5k</span>
                                        </a>

                                        <a href="#" class="bi-chat me-1">
                                            <span>1k</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="social-share d-flex flex-column ms-auto">
                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-heart"></i>
                                    </a>

                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-bookmark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="detail-page.html">
                                        <img src="img/explo.jpeg" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="detail-page.html">
                                            No te lo podras creer
                                        </a>
                                    </h5>

                                    <div class="profile-block d-flex">
                                        <img src="images/profile/cute-smiling-woman-outdoor-portrait.jpg" class="profile-block-image img-fluid" alt="">

                                        <p>
                                            Zombie Man 
                                            <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                            <strong>Recruit</strong>
                                        </p>
                                    </div>

                                    <p class="mb-0">Lo que le paso a este chico es una anectoda que jamas dejara de contar
                                        durante toda su vida. Simplemente epico
                                    </p>

                                    <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                        <a href="#" class="bi-heart me-1">
                                            <span>12.5k</span>
                                        </a>

                                        <a href="#" class="bi-chat me-1">
                                            <span>3.2k</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="social-share d-flex flex-column ms-auto">
                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-heart"></i>
                                    </a>

                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-bookmark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="detail-page.html">
                                        <img src="img/setup.webp" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="detail-page.html">
                                            SetUp De La Semana
                                        </a>
                                    </h5>

                                    <div class="profile-block d-flex">
                                        <img src="images/profile/handsome-asian-man-listening-music-through-headphones.jpg" class="profile-block-image img-fluid" alt="">

                                        <p>
                                            Robot Cop
                                            <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                            <strong>General</strong></p>
                                    </div>

                                    <p class="mb-0">Les presento mi nuevo SetUp chicos, no podran creer lo que me costo esta locura</p>

                                    <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                        <a href="#" class="bi-heart me-1">
                                            <span>9000</span>
                                        </a>

                                        <a href="#" class="bi-chat me-1">
                                            <span>4500</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="social-share d-flex flex-column ms-auto">
                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-heart"></i>
                                    </a>

                                    <a href="#" class="badge ms-auto">
                                        <i class="bi-bookmark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>    
        </section>
        <section class="contact-section section-padding pt-0" id= create>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">CREA TU PROPIA COMUNIDAD</h4>
                            </div>

                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Nombre de la Comunidad</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Correo del dueño de la comunidad</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="company" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Tipo de comunidad</label>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>
                                            
                                            <label for="floatingTextarea">Describe un poco de que se va tratar</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control">Crear</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        <div class="tm-mb-4 text-center tm-social-s">
            <a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
            <a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
            <a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
            <a href="https://youtube.com" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
        </div>
        <footer class="text-center tm-mb-1">
            <p>Copyright &copy; 2020 Comparto Studio 
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </footer>
    </div> <!-- .container -->
    <script src="js/jquery.min.js"></script> <!-- https://jquery.com/download/ -->
    <script src="js/imagesloaded.pkgd.min.js"></script> <!-- https://imagesloaded.desandro.com/ -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- https://isotope.metafizzy.co/ -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
    <script>

        // Scroll to Top button
        var btn = $('#button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });

        // DOM is ready
        $(function () {
            // Single Page Nav
            $('#tm-nav').singlePageNav({ speed: 600 });

            // Smooth Scroll (https://css-tricks.com/snippets/jquery/smooth-scrolling/)
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function (event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                        &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: target.offset().top
                            }, 600, function () {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) { // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                };
                            });
                        }
                    }
                });

            /* Isotope Gallery */

            // init isotope
            var $gallery = $(".tm-gallery").isotope({
                itemSelector: ".tm-gallery-item",
                layoutMode: "fitRows"
            });
            // layout Isotope after each image loads
            $gallery.imagesLoaded().progress(function () {
                $gallery.isotope("layout");
            });

            $(".filters-button-group").on("click", "a", function () {
                var filterValue = $(this).attr("data-filter");
                $gallery.isotope({ filter: filterValue });
            });

            $(".tabgroup > div").hide();
            $(".tabgroup > div:first-of-type").show();
            $(".tabs a").click(function (e) {
                e.preventDefault();
                var $this = $(this),
                    tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
                    others = $this
                        .closest("li")
                        .siblings()
                        .children("a"),
                    target = $this.attr("href");
                others.removeClass("active");
                $this.addClass("active");
            });
        });
    </script>
    </body> 
</html>
