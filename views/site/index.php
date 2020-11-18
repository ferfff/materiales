<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Fácil de Construir';
?>
<div class="site-index">

    <?php echo "TOTAL: ". \Yii::$app->cart->getCount(); ?>
    <div class="body-content">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item">
                <?= Html::a('TODOS', ['index', 'id' => 0], ['class' => 'profile-link']) ?>
            </li>
            <?php foreach ($categorias as $categoria) {
                echo '<li class="list-group-item">';
                echo Html::a($categoria->categoria, ['index', 'id' => $categoria->id], ['class' => 'profile-link']);
                echo '</li>';
            } ?>
        </ul>
            <br><br>
        <div class="row row-cols-1 row-cols-md-4">
        <?php 
            foreach ($productos as $producto) { ?>
                <div class="col mb-4">
                    <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
                        <div class="card">
                            <?= Html::img('/images/'.$producto->foto, ['class' => 'card-img-top', 'alt' => "Imagen"]); ?>
                            <div class="card-body">
                                <?= Html::tag('h5', Html::encode($producto->nombre), ['class' => 'card-title']) ?>
                                <?= Html::tag('p', Html::encode($producto->categorias->categoria), ['class' => 'card-text']) ?>
                                <?= Html::tag('p', Html::encode($producto->descripcion), ['class' => 'card-text']) ?>
                                <?= Html::a('Ver detalle', ['productos/view', 'id' => $producto->id], ['class'=>"btn btn-primary"]) ?>
                                <?= Html::hiddenInput('id', $producto->id, []) ?>
                                <?= Html::submitButton('Añadir al carrito', ['class'=>"btn btn-warning"]) ?>
                            </div>
                        </div>
                    <?= Html::endForm() ?>
                </div>
            <?php }
        ?>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="container-fluid banner_home">
    <div class="container">
      <div class="row align_items">
        <div class="col-lg-6 mb-3">
          <h1 class="light-header">Todo lo que necesitas <span class="red_bold">en un solo lugar</span></h1>
          <p class="p_banner">Contamos con una gran variedad de marcas, productos, excelente servicio personalizado y asesorías. </p>
        </div>
        <div class="col-lg-6">
          <img src="../img/banner_home.png" width="100%">
        </div>
      </div>
    </div>
  </div>

  <h2 class="header_30">Te pueden interesar</h2>
  
  <!-- Productos -->
  <div class="container border-bottom pb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
      <div class="col">
          <div class="card mb-3">
            <div class="row no-gutters direction-l">
              <div class="col-md-4">
                <img src="../img/producto.jpg" class="card-img-top" alt="producto">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="header_product">Studio Design</h5>
                  <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                  <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                  <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>                 
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card mb-3">
            <div class="row no-gutters direction-l">
              <div class="col-md-4">
                <img src="../img/producto.jpg" class="card-img-top" alt="producto">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="header_product">Studio Design</h5>
                  <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                  <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                  <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>                 
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col">
          <div class="card mb-3">
            <div class="row no-gutters direction-l">
              <div class="col-md-4">
                <img src="../img/producto.jpg" class="card-img-top" alt="producto">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="header_product">Studio Design</h5>
                  <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                  <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                  <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>                 
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col">
          <div class="card mb-3">
            <div class="row no-gutters direction-l">
              <div class="col-md-4">
                <img src="../img/producto.jpg" class="card-img-top" alt="producto">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="header_product">Studio Design</h5>
                  <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                  <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                  <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</i></button>                
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- Products -->
  <div class="container border-top pt-5">
    <h2 class="header_30 text_red">Productos más buscados</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h2 class="header_30">Categorías Populares</h2>

  <!-- List -->
  <div class="container">
    <div class="row mb-5">
    
      <div class="col-md-12 col-lg-4">
        <div class="card mb-3">
          <div class="row no-gutters list_items">
            <div class="col-md-4">
              <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="header_18">Tableros de cementos</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Item 1</li>
                  <li class="list-group-item">Item 2</li>
                  <li class="list-group-item">Item 3</li>
                  <li class="list-group-item">Item 4</li>
                  <li class="list-group-item">Item 5</li>
                </ul>
                <div class="direction-r">
                    <button type="button" class="btn btn-primary rounded-pill">Ver detalle <i class="fas fa-angle-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <div class="card mb-3">
          <div class="row no-gutters list_items">
            <div class="col-md-4">
              <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="header_18">Tableros de cementos</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Item 1</li>
                  <li class="list-group-item">Item 2</li>
                  <li class="list-group-item">Item 3</li>
                  <li class="list-group-item">Item 4</li>
                  <li class="list-group-item">Item 5</li>
                </ul>
                <div class="direction-r">
                    <button type="button" class="btn btn-primary rounded-pill">Ver detalle <i class="fas fa-angle-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <div class="card mb-3">
          <div class="row no-gutters list_items">
            <div class="col-md-4">
              <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="header_18">Tableros de cementos</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Item 1</li>
                  <li class="list-group-item">Item 2</li>
                  <li class="list-group-item">Item 3</li>
                  <li class="list-group-item">Item 4</li>
                  <li class="list-group-item">Item 5</li>
                </ul>
                <div class="direction-r">
                    <button type="button" class="btn btn-primary rounded-pill">Ver detalle <i class="fas fa-angle-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- icon -->
  <div class="container atencion rounded mb-5">
    <div class="row">

      <div class="col-md-6 col-lg-3 my-4">
        <img class="icon mb-3" src="../img/envio.svg"><p>Envío gratis en tu compra</p>
      </div>
      <div class="col-md-6 col-lg-3 my-4">
        <img class="icon mb-3" src="../img/atencion.svg"><p> Atención telefónica</p>
      </div>
      <div class="col-md-6 col-lg-3 my-4">
        <img class="icon mb-3" src="../img/devolucion.svg"><p> Tienes 30 días para devolver tu producto</p>
      </div>
      <div class="col-md-6 col-lg-3 my-4">
        <img class="icon mb-3" src="../img/pago.svg"><p> Pagos 100% seguros</p>
      </div>
      
    </div>
  </div>

  <!-- Products -->
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
      <div class="col my-3">
        <div class="card h-100 text-center">
          <div class="card-body">
            <img src="../img/producto.jpg" class="card-img-top" alt="producto">
            <h5 class="header_product">Studio Design</h5>
            <p class="p_descripcion">New Balance Fresh Foam LAZR v1 Sport</p>
            <button type="button" class="btn btn-primary rounded-pill my-2">Ver detalle <i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn btn-warning rounded-pill">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('carousel.php'); ?>