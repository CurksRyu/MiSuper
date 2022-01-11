<?php
    session_start();
    if(isset($_SESSION['nombreUsuario']) || isset($_SESSION['correo'])){
        $nombreUsuario = $_SESSION['nombreUsuario'];
        $correo = $_SESSION['correo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/alertify.min.css">
    <link rel="stylesheet" href="css/themes/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/css/bulma-carousel.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/JavaScript"></script>
    <script src="js/alertify.min.js" type="text/JavaScript"></script>
    <script src="js/scripts.js" type="text/JavaScript"></script>
    <title>Inicio - Mi Super</title>
</head>
<body>

    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <div class="navbar-item py-0" href="#">
            <a href="index.php"><img src="./img/generico_blanco.png" class="image is-480x600" style="max-height: 50px" title="Mi Super"></a>
            </div>
            
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="map.php">
                    Mapa
                </a>
                <a class="navbar-item" href="./productList.php">
                    Productos
                </a>
                <div class="navbar-item" >
                    <div class="field has-addons ">
                        <div class="control ">
                            <input class="input has-text-black pr-6" type="text"  placeholder="Buscar Producto...">
                        </div>
                        <div class="control">
                            <a href="#" class="button is-dark px-5">
                                <span class="icon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>    
            
            <div class="navbar-end">
            <div id="carrito" class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" id="mostrarUsuario">
                        <span class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span> Mi Cesta</span>
                    </a>
                    <div class="navbar-dropdown is-right" id="displayUser">
                        <!--JS-->
                        <table class="table is-narrow is-size-7-mobile">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio Unitario</th>
                                    <th>Imagen</th>
                                    <th>Cantidad</th>
                                    <th>Supermercado</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="lista-carrito"></tbody>
                        </table>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" id="mostrarUsuario">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span> Mi Cuenta</span>
                    </a>
                    <div class="navbar-dropdown is-right" id="displayUser">
                        <?php 
                        if (isset($correo)){
                            ?> 
                        <div class="navbar-item">
                            <p class="is-size-6">Sesión iniciada como: <br> <strong> <?php echo $nombreUsuario ?> </strong></p>
                        </div>
                        <hr class="navbar-divider">
                        <a href="./logout.php" class="navbar-item">
                            <p class="is-size-6"><strong>Cerrar sesión</strong></p>
                        </a>
                        <?php }else{
                            ?>
                        <a href="./login.php" class="navbar-item">
                            <p class="is-size-6"><strong>Iniciar Sesión</strong></p>
                        </a>
                        <hr class="navbar-divider">
                        <a href="./user.php" class="navbar-item">
                            <p class="is-size-6"><strong>Registrarse</strong></p>
                        </a>
                        <?php } ?>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </nav>

    <!--carousel-->

    <section class="hero is-medium has-carousel mt-4 mb-4">
        <div>
            <!-- Start Carousel -->
            <div id="carousel-demo" class="hero-carousel">
                <div class="item-1">
                    <img src="https://baconmockup.com/640/350" alt="">
                </div>
                <div class="item-2">
                    <!-- Slide Content -->
                    <img src="https://baconmockup.com/640/370" alt="">
                </div>
                <div class="item-3">
                    <!-- Slide Content -->
                    <img src="https://baconmockup.com/640/361" alt="">
                </div>
                <div class="item-4">
                    <!-- Slide Content -->
                    <img src="https://baconmockup.com/640/351" alt="">
                </div>
                <div class="item-5">
                    <!-- Slide Content -->
                    <img src="https://baconmockup.com/640/352" alt="">
                </div>
                <div class="item-6">
                    <!-- Slide Content -->
                    <img src="https://baconmockup.com/640/353" alt="">
                </div>
            </div>
            <!-- End Carousel -->

        </div>
        <div class="hero-head"></div>
		<div class="hero-body"></div>
		<div class="hero-foot"></div>
        
    </section>
    <!--seccion de imagenes de supermercado-->
    <section class="mt-4">
        <h1 class="title is-3 has-text-centered has-text-grey ">Supermercados</h1>
        <div class="container">
            <div class="columns">
                <div class="column">
                    <a href="https://www.jumbo.cl"><img src="img/Logo_Jumbo_Cencosud.png" alt="Logo_Jumbo_Cencosud"></a>
                </div>
                <div class="column">
                    <a href="https://www.santaisabel.cl"><img src="img/Logo_Santa_Isabel_Cencosud.png" alt="Logo_Santa_Isabel_Cencosud"></a>
                </div>
            </div>
        </div>
    </section>

    <!--Aqui comienza el footer-->

    <footer class="footer has-background-black-ter">
        <div class="columns is-centered is-mobile">
            <figure class="imagen is-16x16">
                <img src="img/otroEstilo_blanco.png" alt="Logo Misuper" title="Mi Super" width="200px">
            </figure>
        </div>
        <div class="columns is-centered">
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class=" has-text-white" id="acerca">
                    Acerca de
                </a>
            </div>
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class="has-text-white" id="tiendas">
                    Tiendas Asociadas
                </a>
            </div>
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class="has-text-white" id="about-us">
                    Quienes Somos
                </a>
            </div>
        </div>
        <div class="content has-text-centered has-text-white has-">
            <strong class="has-text-white">&copy</strong> Mi Super 2021
        </div>
    </footer>
    <!--Script carousel-->
    <script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/js/bulma-carousel.min.js"></script>
    <script>
		bulmaCarousel.attach('#carousel-demo', {
			slidesToScroll: 1,
			slidesToShow: 3,
            autoplay: true, //cualquier cosa borralo
            loop: true,
		});
	</script>
    <script src="js/cesta.js"></script>
</body>
</html>