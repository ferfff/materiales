<?php

/* @var $this View */

/* @var $content string */

use app\models\Categorias;
use yii\helpers\Html;
use yii\web\View;
use app\assets\AppAsset;

AppAsset::register($this);
$categorias = Categorias::find()->all();

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" type="image/png" href="/img/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- Logo Menu -->
    <div class="container-fluid bg-red logo-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-6 logo">
                    <a href="/"><img src="/img/facil_construir_logo.jpg" width="190px" alt="facil construir"></a>
                </div>
                <div class="col-md-9 col-lg-6">
                    <nav class="nav_contact">
                        <span class="nav-link text-light p_12"><i class="fas fa-phone"></i> (477) 514-9653 al 56</span>
                        <a class="nav-link text-light p_12" href="mailto:contacto@fcfacil.com" target="_blank"><i
                                    class="fas fa-envelope"></i> <span class="info">contacto@fcfacil.com</span></a>
                        <a class="nav-link text-light p_12" href="https://es-la.facebook.com/facildeconstruir"
                           target="_blank"><i class="fab fa-facebook-f"></i> <span class="info">facildeconstruir</span></a>
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
                        <button type="button" class="btn dropdown-toggle text-light megamenu font-weight-bold red_back"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</button>
                        <div class="dropdown-menu dropdown-menu-md-center">
                            <?= Html::a('TODOS', ['index', 'id' => 0], ['class' => 'dropdown-item']) ?>
                            <?php foreach ($categorias as $categoria) {
                                echo '<li class="list-group-item">';
                                echo Html::a($categoria->categoria, ['index', 'id' => $categoria->id], ['class' => 'dropdown-item']);
                                echo '</li>';
                            } ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-9 col-lg-5 py-2">
                    <ul class="nav menu">
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="/site/sucursales">Sucursales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="/site/ayuda">Ayuda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="/site/contact">Contacto</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <ul class="nav_login">
                        <?php
                        echo (Yii::$app->user->isGuest)
                            ? <<<HTML
<li><a class="nav-link text-light" href="/site/login"><i class="fas fa-user"></i> Iniciar Sesión</a></li>
HTML
                            : <<<HTML
<li><a class="nav-link text-light" href="/site/logout"><i class="fas fa-user"></i> Finalizar Sesión</a></li>
HTML;
                        ?>
                        <li> |</li>
                        <li><a class="nav-link text-light" href="/site/carrito"><i class="fas fa-shopping-cart"></i> $0.00</a>
                            <div class="numberCircle"><?= \Yii::$app->cart->getCount() ?></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?= $content ?>
</div>

<!-- Footer -->

<!-- Carrousel -->
<div id="carrousel" class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <section class="center responsive autoplay px-5">
                <div>
                    <img src="/img/carrousel/fc-facil-aluminatti.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-armstrong.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-cem.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-corev.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-durock.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-glasliner-panel-rey.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-impac.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-riho.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-stabilit-panel-rey.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-tablaroca.png" alt="">
                </div>
                <div>
                    <img src="/img/carrousel/fc-facil-truper.png" alt="">
                </div>
            </section>
        </div>
    </div>
</div>

<div class="container-fluid back_red py-5">
    <div class="container">
        <div class="row text-light">
            <div class="col-md-6 col-lg-3">
                <a href="index.php"><img src="/img/facil_construir_logo.jpg" width="190px"></a>
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
                            <a class="text-light p_12" href="mailto:contacto@fcfacil.com" target="_blank"> <span
                                        class="info">contacto@fcfacil.com</span></a>
                        </div>
                    </li>
                    <li class="media">
                        <i class="fab fa-facebook-f mr-3 mt-1"></i>
                        <div class="media-body">
                            <a class="text-light p_12" href="https://es-la.facebook.com/facildeconstruir"
                               target="_blank"> <span class="info">facildeconstruir</span></a>
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
            <div class="col-md-12 col-lg-8 my-2">Fácil de Construir © 2020 I Todos los derechos reservados I Diseñado
                por Ikono.media
            </div>
            <div class="col-md-12 col-lg-2 my-2 ml-auto">
                <img src="/img/tarjetas.png">
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/slick/slick.js"></script>

<script type="text/javascript">
    $(".responsive").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: false,
        infinite: true,
        speed: 500,
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
