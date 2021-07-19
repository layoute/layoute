<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white navbar-fixed">
    <div class="container">
        <a href="../lte/index3.html" class="navbar-brand">
            <img src="../src/img/vaca.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Aspaah</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav d-flex">
            <!-- echo $pagina == "inicio" ? "active" : ""; -->
                <li class="nav-item ">
                    <a class="nav-link active" href="../pages/principal.php">Hogar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/contactos.php" >Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/qs.php">¿Quienes somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/noticias.php">Noticias</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Servicios</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="../pages/socios.php">Socios</a></li>
                        <li><a href="#" class="dropdown-item">Productos</a></li>
                        <li><a href="#" class="dropdown-item">Maquinarias</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="../pages/usuario.php">
                        Tú
                        <i class="fas fa-user-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Right navbar links -->
    </div>
</nav>
<!-- /.navbar -->