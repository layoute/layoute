<!-- jQuery -->
<script src="../lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="../lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    if ($('#cont').val() == "") {
        $("#cont").load('../pages/hogar.php');
    }
</script>
<script type="text/javascript">

function buscar_socio(buscar) {
    var parametros = {"buscar": buscar}
    $.ajax({
        data: parametros,
        type: "POST",
        "url": "../php/socios/searchSocios.php",
        success: function(data) {
            $('#bodyTable').html(data)
        }

    })
}

</script>

<script>
    function verUsuario(fila) {
        var esperar = 1000;
        parametros = {
            "idS": fila
        };

        $.ajax({
            data: parametros,
            type: "POST",
            url: "../php/usuarioSocios.php",
            beforeSend: function () {
                $('#contenido-base').html(
                    "<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>"
                    );
            },
            success: function (response) {
                setTimeout(function () {
                    $('#contenido-base').html(response);
                }, esperar);
            }
        });
    }

    function crearSolicitud(tipo, id) {
        var esperar = 1000;
        parametros = {
            "tipo": tipo,
            "id": id
        };

        $.ajax({
            data: parametros,
            type: "POST",
            url: "../php/solicitud/createSolicitud.php",
            beforeSend: function () {
                $('#contenido-base').html(
                    "<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>"
                    );
            },
            success: function (response) {
                setTimeout(function () {
                    $('#contenido-base').html(response);
                }, esperar);
            }
        });
    }
</script>

<script>
    $('#c1').on('click', function () {
        $("#cont").load('../index.php');
        return false;
    });
    $('#c2').on('click', function () {
        $("#cont").load('../pages/contactos.php');
        return false;
    });
    $('#c3').on('click', function () {
        $("#cont").load('../pages/qs.php');
        return false;
    });
    $('#c4').on('click', function () {
        $("#cont").load('../pages/noticias.php');
        return false;
    });
    $('#c5').on('click', function () {
        $("#cont").load('../pages/socios.php');
        return false;
    });
    $('#c8').on('click', function () {
        $("#cont").load('../pages/usuario.php');
        return false;
    });
</script>

<script>
    /* function ajax(id) {
        var esperar = 2000;
        var parametros = {
            "idS": id
        };

        $.ajax({
            data: parametros,
            url: "../php/socios/usuarioSocios.php",
            type: "POST",
            beforeSend: function () {
                $('#baseH').html("<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>");
            },
            success: function (data) {
                setTimeout(function () {
                    $('#baseH').html(data);
                }, esperar
                );
            }

        })
    }

    function ajax1(tipo) {
        var esperar = 2000;
        var parametros = {
            "tipo": tipo
        };

        $.ajax({
            data: parametros,
            url: "../php/solicitud/solicitud.php",
            type: "POST",
            beforeSend: function () {
                $('#baseH2').html("<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>");
            },
            success: function (data) {
                setTimeout(function () {
                    $('#baseH2').html(data);
                }, esperar
                );
            }

        })
    }

    function ajaxError() {
        var esperar = 2000;

        $.ajax({
            url: "../php/solicitud/error.php",
            beforeSend: function () {
                $('#baseH2').html("<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>");
            },
            success: function (data) {
                setTimeout(function () {
                    $('#baseH2').html(data);
                }, esperar
                );
            }

        })
    }

    function ajaxSuccess() {
        var esperar = 2000;

        $.ajax({
            url: "../php/solicitud/success.php",
            beforeSend: function () {
                $('#baseH2').html("<div class='text-center'> <div class='spinner-border' role='status'> <span class='sr-only'>Loading...</span> </div> </div>");
            },
            success: function (data) {
                setTimeout(function () {
                    $('#baseH2').html(data);
                }, esperar
                );
            }

        })
    } */
</script>