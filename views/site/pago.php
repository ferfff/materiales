<div class="container my-3">
<div class="row">
    <div class="col-sm my-2 direction-l">
    <a href="index" class="text-dark">Inicio</a> <a href="index" class="text-dark">Carrito</a> <span class="text_red">/ Pago</span>
    </div>
    <div class="col-sm direction-r my-2">
    </div>
</div>
</div>

<div class="container-fluid bg-white py-5">
<div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2">
    <div class="col mb-3">

        <div class="mb-5 border-bottom pb-5">
        <h4 class="font-weight-bold text_red">Opciones de pago</h4>
        <p>Tarjetas de crédito o débito</p>

        <div class="row my-3">
            <div class="col"><p class="text_red p_12 text-center">Mis Tarjetas</p></div>
            <div class="col"><p class="text_red p_12 text-center">Nombre en la tarjeta</p></div>
            <div class="col"><p class="text_red p_12 text-center">Vencimiento</p></div>
        </div>

        <div class="row text-left my-2 text-center">
            <div class="col">
            <div class="form-check p_12">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                <img src="../img/tarjetas.png" width="50px">
                <p class="p_12">**** 1234</p>
            </label>
            </div>
            </div>
            <div class="col">
            <p class="p_12">Oscar Bracamontes López</p>
            </div>
            <div class="col">
            <p class="p_12">00/0000</p></div>
        </div>
        <div class="row text-left my-2 text-center">
            <div class="col">
            <div class="form-check p_12">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                <img src="../img/tarjetas.png" width="50px">
                <p class="p_12">**** 1234</p>
            </label>
            </div>
            </div>
            <div class="col">
            <p class="p_12">Oscar Bracamontes López</p>
            </div>
            <div class="col">
            <p class="p_12">00/0000</p></div>
        </div>
        <div class="row text-left my-2 text-center">
            <div class="col">
            <div class="form-check p_12">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                <img src="../img/tarjetas.png" width="50px">
                <p class="p_12">**** 1234</p>
            </label>
            </div>
            </div>
            <div class="col">
            <p class="p_12">Oscar Bracamontes López</p>
            </div>
            <div class="col">
            <p class="p_12">00/0000</p></div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-pill my-3" data-toggle="modal" data-target="#exampleModal">
            Agregar una tarjeta de crédito o débito
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="font-weight-bold text_red text-left">Agregar una tarjeta de crédito o débito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="text-left">
                <div class="form-group row">
                    <label for="inputTarjeta" class="col-sm-4 col-form-label p_12">Número de la Tarjeta</label>
                    <div class="col-sm-8">
                    <input type="tarjeta" class="form-control my-2 rounded-pill" id="inputTarjeta">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNombre" class="col-sm-4 col-form-label p_12">Nombre en la tarjeta</label>
                    <div class="col-sm-8">
                    <input type="nombre" class="form-control my-2 rounded-pill" id="inputNombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNombre" class="col-sm-4 col-form-label p_12">Fecha de vencimiento</label>
                    <div class="col-sm-4 my-2">
                        <select id="inputState" class="form-control rounded-pill">
                        <option selected>01</option>
                        <option>...</option>
                        </select>
                    </div>
                    <div class="col-sm-4 my-2">
                        <select id="inputState" class="form-control rounded-pill">
                        <option selected>2020</option>
                        <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label p_12" for="gridCheck1">
                            Usar como mi pago predeterminado
                        </label>
                    </div>
                    </div>
                </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark rounded-pill" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary rounded-pill">Agregar</button>
                </div>
            </div>
            </div>
        </div>

        <p class="my-3">Pagar con PayPal</p>
        <img src="../img/paypal.png" width="200px">
        </div>

        <h4 class="font-weight-bold text_red">Información de Envío</h4>
        <p>Oscar Bracamontes</p>
        <p>oscar@correo.com.mx</p>
        <p>Calle Congregación 123 C.P. 3700</p>
        <p>Las Torres 477 1234567</P>
        <p>León Guanajuato</p>

        <div class="my-5">
        <a href="carrito"><p class="text_red"><i class="fas fa-angle-left"></i> Regresar un paso atrás</p></a>
        </div>
    </div>

    <div class="col my-2 pt-4">
        
        <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="../img/producto.jpg" class="card-img" alt="producto">
            </div>
            <div class="col-md-8">
            <div class="card-body direction-l">
                <h5 class="card-title font-weight-bold">Nombre del producto</h5>
                <p class="card-text">$0.00</p>
                <p class="card-text">Cantidad: <span class="font-weight-bold">5</span></p>
                <button type="button" class="btn btn-danger btn-sm mt-3 rounded-pill"><i class="fas fa-times-circle"></i> Eliminar</button>
            </div>
            </div>
        </div>
        </div>
        <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="../img/producto.jpg" class="card-img" alt="producto">
            </div>
            <div class="col-md-8">
            <div class="card-body direction-l">
                <h5 class="card-title font-weight-bold">Nombre del producto</h5>
                <p class="card-text">$0.00</p>
                <p class="card-text">Cantidad: <span class="font-weight-bold">5</span></p>
                <button type="button" class="btn btn-danger btn-sm mt-3 rounded-pill"><i class="fas fa-times-circle"></i> Eliminar</button>
            </div>
            </div>
        </div>
        </div>
        <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="../img/producto.jpg" class="card-img" alt="producto">
            </div>
            <div class="col-md-8">
            <div class="card-body direction-l">
                <h5 class="card-title font-weight-bold">Nombre del producto</h5>
                <p class="card-text">$0.00</p>
                <p class="card-text">Cantidad: <span class="font-weight-bold">5</span></p>
                <button type="button" class="btn btn-danger btn-sm mt-3 rounded-pill"><i class="fas fa-times-circle"></i> Eliminar</button>
            </div>
            </div>
        </div>
        </div>
        
        <div class="card bg-light">
        <div class="row row-cols-2 px-3 my-3 font-weight-bold">
            <div class="col"><p>Subtotal</p></div>
            <div class="col direction-r">$0.00</div>
            <div class="col">Costo de Envío</div>
            <div class="col direction-r">$0.00</div>
            <div class="border-top mt-2 pt-2"></div>
            <div class="border-top mt-2 pt-2"></div>
            <div class="col mt-2 pt-2">Total</div>
            <div class="col direction-r cost mt-2">$0.00</div>
        </div>
        </div>

        <div class="direction-l">
        <a href="compra"><button type="submit" class="btn btn-primary btn-block rounded-pill mt-5">Comprar productos</button>
        </div>

    </div>
    </div>
</div>
</div>

<?php include('carousel.php'); ?>