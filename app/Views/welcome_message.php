<!doctype html>
<html lang="en">

<head>
    <title>Participantes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <h1>hola mundo</h1>
    <div class="container">
        <form action="javascript:void(0);">
            <label> Buscar empleado: </label>
            <input type="text" name="legajo" id="legajo" />
            <input type="submit" id="boton_buscar_legajo" />
            <div id="respuesta"></div>
        </form>

        <table class="table mt-4 table-bordered table-hover">
            <thead class=" ">
                <tr>
                    <th>N°</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>correo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1;
                foreach ($participantes as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?php echo $number++; ?></th>
                        <td><?php echo $value->id_participante; ?></td>
                        <td><?php echo $value->nombre; ?></td>
                        <td><?php echo $value->apellido; ?></td>
                        <td><?php echo $value->correo; ?></td>
                        <td>
                            <!-- <a href="<?php echo base_url(); ?>participantes/vista-update/<?php echo $value->id_participante; ?>" class="btn btn-primary">
                            <ion-icon name="pencil"></ion-icon>
                        </a>
                        <a href="<?php echo base_url(); ?>participantes/delete/<?php echo $value->id_participante; ?>" class="btn btn-danger">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a> -->


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Importación de la librería de jquery. -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">
    //Función que envía la petición ajax.
    function buscar_legajo() {
        $.ajax({
            url: 'buscar',
            type: 'POST',
            timeout: 10000,
            data: {
                legajo: $("#legajo").val()
            },
            beforeSend: function() {
                $("#respuesta").html('Buscando legajo...');
            },
            error: function() {
                $("#respuesta").html('');
                alert('Ha surgido un error.')
            },
            success: function(respuesta) {
                var datos = '';
                respuesta.map((e) => {
                    datos = datos + `<option value="">${e.nombre}</option>`
                });
                datos = `<select name="" id="">${datos}</select>`
                $("#respuesta").html(datos);
            }
        })
    }
    $(document).ready(function() {
        $("#boton_buscar_legajo").click(function() {
            buscar_legajo();
        });
    });
</script>

</html>