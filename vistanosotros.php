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
        <div class="row">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>QUIENES SOMOS</span>
                    </div>
                </div>
                

            </div>
            <div class="col-9">
                <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis facilisis eros in sollicitudin. Vestibulum efficitur nibh sit amet venenatis pretium. Nunc condimentum luctus mauris, eget laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et blandit tellus. In eget tincidunt tellus. Curabitur elementum malesuada enim eu accumsan.

                    Morbi urna urna, finibus sed tortor in, condimentum accumsan nunc. Mauris eu mauris ac nisi cursus ornare a ut dui. Quisque sit amet mi erat. Vivamus bibendum metus non tellus aliquam varius. Aliquam volutpat leo ante, at fermentum felis rutrum a. Donec nec eros venenatis, iaculis risus ac, euismod ex. Morbi sed feugiat est. Etiam gravida pulvinar dolor, sed vulputate nisl congue consequat. Vestibulum ultricies libero sit amet ante pharetra auctor et non sapien. Quisque egestas elit elit, eget dapibus ligula viverra in. Integer ut condimentum nisl. Quisque eget consectetur dolor. Cras a ante id felis iaculis ullamcorper.</P>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>MISIÓN</span>
                    </div>
                </div>
                

            </div>
            <div class="col-9">
                <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis facilisis eros in sollicitudin. Vestibulum efficitur nibh sit amet venenatis pretium. Nunc condimentum luctus mauris, eget laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et blandit tellus. In eget tincidunt tellus. Curabitur elementum malesuada enim eu accumsan.</P>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="Heading_cf_N">
                    <div class="ofertas_populares_N">
                        <span>VISIÓN</span>
                    </div>
                </div>
                

            </div>
            <div class="col-9">
                <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis facilisis eros in sollicitudin. Vestibulum efficitur nibh sit amet venenatis pretium. Nunc condimentum luctus mauris, eget laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et blandit tellus. In eget tincidunt tellus. Curabitur elementum malesuada enim eu accumsan.</P>
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