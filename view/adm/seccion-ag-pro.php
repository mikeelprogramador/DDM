<link rel="stylesheet" href="../../css/stylo5.css">
<br>
<div class="row">
    <div class="col-md-4 col-lg-3 col-12 mb-3">
        <h3 class="text-center">Vista previa del producto</h3>
        <div class="card" style="width: 100%;">
            <img src="../../img/img-paciente0.avif" id="card-img" class="card-img-top" alt="Erro al cargar la imagen">
            <div class="card-body">
                <h5 class="card-title" id="card-title">Card title</h5>
                <p class="card-text" id="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
    </div>


    <div class="col-md-8 col-lg-9 col-12">
        <div class="container mt-4">
            <form action="../controller/controller_admin.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name-pro" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="name-pro" name="name-pro" placeholder="Nombre del producto" oninput="cardstring(event,'title')">
                </div>

                <div class="mb-3">
                    <label for="descrip-pro" class="form-label">Descripción Corta del producto</label>
                    <textarea class="form-control" id="descrip-pro" name="descrip-pro" placeholder="Descripción del producto" oninput="cardstring(event,'text')"></textarea>
                </div>

                <div class="mb-3">
                    <label for="card-img" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="card-img" name="card-img" placeholder="Imagen" onchange="preview(event,'#card-img')">
                </div>

                <button type="button" class="btn btn-primary mb-3" id="boton_proagre" onclick="continuar()">Continuar</button>

                <div class="mb-3" id="parte2">
                    <h3>Contenido interno</h3>

                    <div class="mb-3">
                        <label for="color-pro" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="id-pro" name="id-pro" placeholder="Codigo del producto">
                    </div>

                    <div class="mb-3">
                        <label for="caracter-pro" class="form-label">Características</label>
                        <textarea class="form-control" id="caracter-pro" name="caracter-pro" placeholder="Características del producto"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="color-pro" class="form-label">Colores</label>
                        <input type="text" class="form-control" id="color-pro" name="color-pro" placeholder="Ingresa un color">
                    </div>

                    <div class="mb-3">
                        <label for="cantidad-pro" class="form-label">Cantidad disponible</label>
                        <input type="number" class="form-control" id="cantidad-pro" name="cantidad-pro" placeholder="Cantidad de unidades" min=1 value=1 >
                    </div>
               
                    <div class="mb-3">
                        <label class="form-label">Categorías</label><br>
                        <button type="button" class="btn btn-primary mb-2" id="select_cate" onclick="aparecerCategorias()">Seleccionar Categoria</button>
                        <button type="button" class="btn btn-primary mb-2" id="create_cate" onclick="createCategoria()">Crear una Categoria</button>
                    </div>
                    <div id="catego">
                        <br>
                    </div>
                    <div id="create-catego">
                        <label for="">Crear categoria</label>
                        <input  type="text" id="text-catego" multiple list="lista-catego" size="64" >
                        <datalist id="lista-catego" >
                            <?php
                                echo Vista::mostrarCategorias(3,1);
                            ?>
                        </datalist><br><br>
                        <button type="button" class="btn btn-primary mb-2" id="catego-create" onclick="guardarCategoria()">Crear</button>
                        <div id="mensaje"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="oferta-pro" class="form-label">Ofertas</label>
                        <select class="form-select" name="oferta">
                            <option disabled selected>Ofertas</option>
                            <?php echo Ofertas::verOfertas(2); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad-pro" class="form-label">Iva</label>
                        <select class="form-select" name="iva-pro" id="iva-pro">
                            <option value="" selected disabled>Selecciona el IVA</option>
                            <option value="0">0%</option>
                            <option value="5">5%</option>
                            <option value="15">15%</option>
                            <option value="19">19%</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="precio-pro" class="form-label">Valor del producto</label>
                        <input type="number" class="form-control" id="precio-pro" name="precio-pro" placeholder="Valor del producto">
                    </div>

                   
                    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                    <br><br>
                </div>
            </form>
        </div>
    </div>
</div>
<br>

