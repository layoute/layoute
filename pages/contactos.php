<?php
    include ("../layout/links.php")
?>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">

    <?php
        /* $pagina = isset($_GET["p"]) ? strtolower($_GET["p"]): "hogar"; */
    ?>

    <div class="wrapper">
        <?php
            include ("../layout/navbar.php");
        ?>
        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container">
                    <h2 class="text-dark display-5">Contactos</h2>
                    <div class="row my-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body row text-dark">
                                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <h2>A<strong>SPAAH</strong></h2>
                                            <p class="lead mb-5">Nuestro número de contacto:<br>
                                                Celular: 0912383
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="inputName">Ingrese su nombre</label>
                                            <input type="text" id="inputName" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Ingrese su email</label>
                                            <input type="email" id="inputEmail" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Ingrese un asunto</label>
                                            <input type="text" id="inputSubject" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Ingrese el mensaje</label>
                                            <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Enviar mensaje">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include ("../layout/footerv2.php")
                ?>
            </div>
            <?php
            include ("../layout/footer.php")
        ?>
        </div>
        <?php
        include ("../layout/scripts.php");
    ?>
</body>

</html>