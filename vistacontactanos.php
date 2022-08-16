<?php
session_start();



// Use parse_str() function to parse the
// string passed via URL

// Display result
$idprd = htmlspecialchars($_GET["idproducto"]);
$conexion = new mysqli('localhost', 'root', '', 'atrixdb');
$consulta_productos = $conexion->query("SELECT * FROM V_PRODUCTOS_TODOS where ID = $idprd limit 1");
header('Content-Type: text/html; charset=UTF-8');
include "menu.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/css/all.css"></script>
    <title>Atrix Store</title>
</head>

<body>

    <div class="container-fluid fill-prd-seleccionado">
        <div class="row">
            <div class="col-2">
                <div class="Heading_cf">
                    <div class="ofertas_populares">
                        <span>PRODUCTO</span>
                        <br>
                        <span class="sp-popular">SELECCIONADO</span>
                    </div>
                </div>
                <svg class="ofertas_populares_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="248" height="513" viewBox="0 0 248 513">
                    <g id="Heading" transform="translate(-1432.5 646) rotate(-90)">
                        <rect id="Bg" width="270" height="16" transform="translate(206 1485.5)" fill="#051026" />
                        <image id="shapes-small" width="248" height="513" transform="translate(646 1432.5) rotate(90)" xlink:href="data:image/png;base64,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" />
                    </g>
                </svg>

            </div>
            <div class="col-10">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($consulta_productos as $producto) { ?>
                            <div class="col-6">
                                <div class="container-fluid tarjeta-popular">
                                    <div class="card card-prd">
                                        <div class="card-header card-precio">
                                            <div class="float-left titulo-card-precio">
                                                <span class="sp-titulo-precio-marca"><?php echo $producto['MARCA']; ?></span>
                                                <br>
                                                <span><?php echo $producto['NOMBRE']; ?></span>

                                            </div>
                                            <div class="card card-precio-2 float-right" style="width: 112px;">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-precio list-group-item-precio-edit">S/ <?php echo $producto['COSTO']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <img class="card-img-top mx-auto d-block w-card-prd" src="assets/images/<?php echo $producto['FOTO']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['GENERO']; ?> , Hecho en <?php echo $producto['PAIS']; ?></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-6">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputNombre">Nombre</label>
                                        <input type="text" class="form-control" id="inputNombre" placeholder="Nombre">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputApellido">Nombre</label>
                                        <input type="text" class="form-control" id="inputApellido" placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputTel">Teléfono</label>
                                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" class="form-control" id="inputTel" placeholder="Teléfono">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Departamento</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Seleccionar</option>
                                            <?php
                                            $string = file_get_contents("assets/ubigeo/departamentos.json");
                                            $json_a = json_decode($string, true);
                                            foreach ($json_a as $person_name => $person_a) {
                                                echo "<option id=\"".$person_a['id_ubigeo']."\">".$person_a['nombre_ubigeo']."</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Provincia</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Seleccionar</option>
                                            <?php
                                            $string = file_get_contents("assets/ubigeo/departamentos.json");
                                            $json_a = json_decode($string, true);
                                            foreach ($json_a as $person_name => $person_a) {
                                                echo "<option id=\"".$person_a['id_ubigeo']."\">".$person_a['nombre_ubigeo']."</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Distrito</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Seleccionar</option>
                                            <?php
                                            $string = file_get_contents("assets/ubigeo/departamentos.json");
                                            $json_a = json_decode($string, true);
                                            foreach ($json_a as $person_name => $person_a) {
                                                echo "<option id=\"".$person_a['id_ubigeo']."\">".$person_a['nombre_ubigeo']."</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        <span class="marca-agua-atrix">Atrix Store</span>
        <img src="assets/images/Grupo 3.png" alt="" srcset="">
    </footer>
    <script>
        function Mensaje() {
            alert("Saludos");
        }
    </script>
</body>

</html>