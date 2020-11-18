<div class="container my-3">
<div class="row">
    <div class="col-sm my-2 direction-l">
    <a href="index" class="text-dark">Inicio</a> <span class="text_red">/ Carrito</span>
    </div>
    <div class="col-sm direction-r my-2">
    </div>
</div>
</div>

<div class="container-fluid bg-white py-5">
<div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2">
    <div class="col mb-3">

        <div class="direction-l">
        <h2 class="font-weight-bold text_red">¿Tienes una cuenta?</h2>
        <a href="login"><button class="btn btn-primary my-1 rounded-pill mb-5">Iniciar Sesión <i class="fas fa-angle-right"></i></button></a>
        </div>

        <h2 class="font-weight-bold text_red direction-l">Información de Envío</h2>
        <form class="border-top my-3 p-3">
        <div class="form-row">
            <div class="form-group col-md-6 p_12">
            <label for="inputName">Nombre(s)</label>
            <input type="nombre(s)" class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu(s) nombre(s)">
            </div>
            <div class="form-group col-md-6 p_12">
            <label for="inputApellidos">Apellidos</label>
            <input type="apellidos" class="form-control rounded-pill p_14" id="inputApellidos" placeholder="Escribe tu apellido">
            </div>
        </div>
        <div class="form-group p_12">
            <label for="inputEmail">Correo</label>
            <input type="email" class="form-control rounded-pill p_14" id="inputEmail" placeholder="Escribe tu correo">
        </div>
        <div class="form-row p_12">
            <div class="form-group col-md-9">
            <label for="inputDirección">Dirección</label>
            <input type="text" class="form-control rounded-pill p_14" id="inputDirección" placeholder="Escribe tu dirección y número">
            </div>
            <div class="form-group col-md-3 p_12">
            <label for="inputCP">C.P.</label>
            <input type="text" class="form-control rounded-pill p_14" id="inputCP" placeholder="Ejem. 37000">
            </div>
        </div>
        <div class="form-row p_12">
            <div class="form-group col-md-7">
            <label for="inputColonia">Colonia</label>
            <input type="text" class="form-control rounded-pill p_14" id="inputColonia" placeholder="Escribe tu colonia">
            </div>
            <div class="form-group col-md-5 p_12">
            <label for="inputTelefono">Teléfono</label>
            <input type="number" class="form-control rounded-pill p_14" id="inputTelefono" placeholder="123-456-890">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 p_12">
            <label for="inputCiudad">Ciudad</label>
            <select id="inputCiudad" class="form-control rounded-pill p_14">
                <option selected>León</option>
                <option>...</option>
            </select>
            </div>
            <div class="form-group col-md-6 p_12">
            <label for="inputEstado">Estado</label>
            <select id="inputEstado" class="form-control rounded-pill p_14">
                <option selected>Guanajuato</option>
                <option>...</option>
            </select>
            </div>
        </div>
        </form>

    </div>

    <div class="col my-2">
        
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
                <button type="button" class="btn btn-danger btn-sm mt-3"><i class="fas fa-times-circle"></i> Eliminar</button>
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
                <button type="button" class="btn btn-danger btn-sm mt-3"><i class="fas fa-times-circle"></i> Eliminar</button>
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
                <button type="button" class="btn btn-danger btn-sm mt-3"><i class="fas fa-times-circle"></i> Eliminar</button>
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
        
        <div class="direction-r">
            <a href="pago"><button type="submit" class="btn btn-primary rounded-pill mt-5">Proceder al pago <i class="fas fa-angle-right"></i></button></a>
        </div>

    </div>
    </div>
</div>
</div>

<?php include('carousel.php'); ?>