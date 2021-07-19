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
                <div class="container" id="cont">
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