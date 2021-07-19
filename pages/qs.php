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
                    <div class="row text-dark">
                        <div class="col">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-copy"></i>
                                        Misión y Visión
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="callout callout-success">
                                        <h5>I am a success callout!</h5>

                                        <p>This is a green callout.</p>
                                    </div>
                                    <div class="callout callout-success">
                                        <h5>I am a success callout!</h5>

                                        <p>This is a green callout.</p>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <h2 class="display-5 text-dark">METAS CUMPLIDAS</h2>

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