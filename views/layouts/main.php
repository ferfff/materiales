<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="../img/favicon.ico">

<link rel="stylesheet" type="text/css" href="slick/slick.css">
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<title>Fácil de Construir</title>
</head>
<body>

<!-- Logo Menu -->
<div class="container-fluid bg-red logo-fluid">
<div class="container">
    <div class="row">
    <div class="col-md-3 col-lg-6 logo">
        <a href="index"><img src="../img/facil_construir_logo.jpg" width="190px"></a>
    </div>
    <div class="col-md-9 col-lg-6">
        <nav class="nav_contact">
        <span class="nav-link text-light p_12"><i class="fas fa-phone"></i> (477) 514-9653 al 56</span>
        <a class="nav-link text-light p_12" href="mailto:contacto@fcfacil.com" target="_blank"><i class="fas fa-envelope"></i> <span class="info">contacto@fcfacil.com</span></a>
        <a class="nav-link text-light p_12" href="https://es-la.facebook.com/facildeconstruir" target="_blank"><i class="fab fa-facebook-f"></i> <span class="info">facildeconstruir</span></a>
        </nav>
    </div>
    </div>
</div>
</div>

<!-- Menu -->
<div class="container-fluid nav-productos text-light">
<div class="container">
    <div class="row align_items">

    <div class="col-md-3 col-lg-3">

        <div class="btn-group py-2 megamenu">
        <button type="button" class="btn dropdown-toggle text-light megamenu font-weight-bold red_back" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Productos
        </button>
        <div class="dropdown-menu dropdown-menu-md-center">
            <a class="dropdown-item" href="producto.php">Poliuretanos</a>
            <a class="dropdown-item" href="producto.php">Tableros de yeso</a>
            <a class="dropdown-item" href="producto.php">Tableros de cementos</a>
            <a class="dropdown-item" href="producto.php">Plafones</a>
            <a class="dropdown-item" href="#">Impermeabilizantes</a>
            <a class="dropdown-item" href="#">Metales y perfiles</a>
            <a class="dropdown-item" href="#">Suspensión</a>
            <a class="dropdown-item" href="#">Pasta</a>
            <a class="dropdown-item" href="#">Complementos</a>
            <a class="dropdown-item" href="#">Energía alternativa</a>
            <a class="dropdown-item" href="#">Glasnier</a>
            <a class="dropdown-item" href="#">Pintura</a>
            <a class="dropdown-item" href="#">Herramienta</a>
            <a class="dropdown-item" href="#">Panel de Aluminio</a>
            <a class="dropdown-item" href="#">Puertas</a>
            <a class="dropdown-item" href="#">Compuestos</a>
            <a class="dropdown-item" href="#">Escaleras</a>
            <a class="dropdown-item" href="#">Perfiles de Aluminio</a>
        </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-9 col-lg-5 py-2">
        <ul class="nav menu">
        <li class="nav-item">
            <a class="nav-link active text-light" href="index">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-light" href="sucursales">Sucursales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-light" href="ayuda">Ayuda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-light" href="contact">Contacto</a>
        </li>
        </ul>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-4">
        <ul class="nav_login">
        <li><a class="nav-link text-light" href="login"><i class="fas fa-user"></i> Iniciar Sesión</a></li>
        <li> | </li>
        <li><a class="nav-link text-light" href="carrito"><i class="fas fa-shopping-cart"></i> $0.00</a></li>
        </ul>
    </div>

    </div>
</div>
</div>

    <?= $content ?>
</div>

<!-- Footer -->
<div class="container-fluid back_red py-5">
    <div class="container">
        <div class="row text-light">
        <div class="col-md-6 col-lg-3">
            <a href="index.php"><img src="../img/facil_construir_logo.jpg" width="190px"></a>
            <h5 class="font-weight-bold my-3">¡Gran variedad de marcas y productos!</h5>
        </div>
        <div class="col-md-6 col-lg-3">
            <h5 class="font-weight-bold my-3">Contacto</h5>
            <ul class="list-unstyled">
            <li class="media">
                <i class="fas fa-phone mr-3 mt-1"></i>
                <div class="media-body">
                <p class="p_12">(477) 514-9653 al 56</p>
                </div>
            </li>
            <li class="media my-4">
                <i class="fas fa-envelope mr-3 mt-1"></i>
                <div class="media-body">
                <a class="text-light p_12" href="mailto:contacto@fcfacil.com" target="_blank"> <span class="info">contacto@fcfacil.com</span></a>
                </div>
            </li>
            <li class="media">
                <i class="fab fa-facebook-f mr-3 mt-1"></i>
                <div class="media-body">
                <a class="text-light p_12" href="https://es-la.facebook.com/facildeconstruir" target="_blank"> <span class="info">facildeconstruir</span></a>
                </div>
            </li>
            </ul>
            <p class="my-3 p_12">Blvd. Torres Landa No. 2209 Ote. Col. Azteca, León, Gto.</p>
        </div>
        <div class="col-md-12 col-lg-6">
            <h5 class="font-weight-bold my-3">Categorías</h5>
            <div class="row">
            <div class="col-md-4 col-lg-4 p_12">
                <ul>
                <li>Poliuretanos</li>
                <li>Tableros de yeso</li>
                <li>Tableros de cementos</li>
                <li>Plafones</li>
                <li>Impermeabilizantes</li>
                <li>Metales y perfiles</li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 p_12">
                <ul>
                <li>Suspensión</li>
                <li>Pasta</li>
                <li>Complementos</li>
                <li>Energía alternativa</li>
                <li>Glasnier</li>
                <li>Pintura</li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 p_12">
                <ul>
                <li>Herramienta</li>
                <li>Panel de Aluminio</li>
                <li>Puertas</li>
                <li>Compuestos</li>
                <li>Escaleras</li>
                <li>Perfiles de Aluminio</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="container-fluid back_black py-3">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-8 my-2">Fácil de Construir © 2020  I  Todos los derechos reservados  I  Diseñado por Ikono.media</div>
        <div class="col-md-12 col-lg-2 my-2 ml-auto">
            <img src="../img/tarjetas.png">
        </div>
        </div>
    </div>
</div>  

<?php $this->endBody() ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

  <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $('.responsive').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              dots: false,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              dots: false,
              slidesToScroll: 1
            }
          }
        ]
      });
  </script>

</body>
</html>
<?php $this->endPage() ?>
