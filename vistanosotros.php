<?php
session_start();



// Use parse_str() function to parse the
// string passed via URL

// Display result

$conexion = new mysqli('localhost', 'root', '', 'atrixdb');
if (isset($_GET["idproducto"])) {
    $idprd = htmlspecialchars($_GET["idproducto"]);
    $consulta_productos = $conexion->query("SELECT * FROM V_PRODUCTOS_TODOS where ID = $idprd limit 1");
} else {
    $idprd = "0";
    $consulta_productos = [];
}
header('Content-Type: text/html; charset=UTF-8');
include "menu.php"
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/css/all.css"></script>
    <title>Atrix Store</title>
</head>

<body>

    <div class="container-fluid fill-prd-seleccionado">
        <div class="row r-atrix-nosotros">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>QUIENES SOMOS</span>
                    </div>
                </div>
                

            </div>
            <div class="col-9">
                <P>Atrix Store es un emprendimiento joven e innovador dedicado a la importación de diversos productos y cuyo objetivo es ser reconocidos por la calidad, excelencia y profesionalismo, el cual nos permite realizar importaciones exitosas, brindando soluciones integrales a cada cliente y adaptarnos a los cambios en el mercado global.</P>
            </div>
        </div>
        <div class="row r-atrix-nosotros">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>MISIÓN</span>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <P>Brindar soluciones integrales que se adaptan a los cambios en el mercado.</P>
            </div>
        </div>
        <div class="row r-atrix-nosotros">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>VISIÓN</span>
                    </div>
                </div>
                

            </div>
            <div class="col-9">
                <P>Ser reconocidos por la excelencia y profesionalismo en el rubro de la importacion y la primera opcion de los clientes.</P>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        <span class="marca-agua-atrix">Atrix Store</span>
        <img src="assets/images/Grupo 3.png" alt="" srcset="">
    </footer>
    <script>
        $(document).ready(function() {
            $("#inputDpto").change(function() {
                $("#inputProv option[value]").remove();
                $("#inputDist option[value]").remove();
                idUbigeoDepartamento = $(':selected', this).attr('value');
                console.log(idUbigeoDepartamento);
                $.getJSON('assets/ubigeo/provincias.json', function(data) {
                    $.each(data, function(index, element) {
                        if (index == idUbigeoDepartamento) {
                            $.each(element, function(i, e) {
                                optionText = e['nombre_ubigeo'];
                                optionValue = e['id_ubigeo'];
                                $('#inputProv').append(`<option value="${optionValue}">
                                ${optionText}
                            </option>`);
                            });
                        }

                    });
                });
            });

            $("#inputProv").change(function() {
                $("#inputDist option[value]").remove();
                idUbigeoDepartamento = $(':selected', this).attr('value');
                console.log(idUbigeoDepartamento);
                $.getJSON('assets/ubigeo/distritos.json', function(data) {
                    $.each(data, function(index, element) {
                        if (index == idUbigeoDepartamento) {
                            $.each(element, function(i, e) {
                                optionText = e['nombre_ubigeo'];
                                optionValue = e['id_ubigeo'];
                                $('#inputDist').append(`<option value="${optionValue}">
                                ${optionText}
                            </option>`);
                            });
                        }

                    });
                });
            });


            $("#btn-submitcontacto").click(function(event) {

                var formData = {
                    codPrd: $("#codPrd").val(),
                    nombre: $("#inputNombre").val(),
                    apellido: $("#inputApellido").val(),
                    email: $("#inputEmail").val(),
                    telefono: $("#inputTel").val(),
                    direccion: $("#inputAddress").val(),
                    departamento: $("#inputDpto").find(":selected").text(),
                    provincia: $("#inputProv").find(":selected").text(),
                    distrito: $("#inputDist").find(":selected").text(),
                    comentario: $("#textAreaComentario").val(),
                };

                console.log(formData);

                $.ajax({
                    type: "POST",
                    url: "operaContacto.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    console.log(data);
                });


                event.preventDefault();
            });

        });
    </script>
</body>

</html>