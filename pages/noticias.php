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
                    <h2 class="display-5 text-dark">NOTICIAS</h2>
                    <div class="row cardv3 my-3">
                        <div class="light">
                            <main class="container py-2">
                                <article class="postcard light blue">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="https://picsum.photos/1000/1000"
                                            alt="Image Title" />
                                    </a>
                                    <div class="postcard__text t-dark">
                                        <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                                        <div class="postcard__subtitle small">
                                            <time datetime="2020-05-25 12:00:00">
                                                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                            </time>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus
                                            odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium
                                            maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet
                                            ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores
                                            nobis enim quidem excepturi, illum quos!</div>
                                    </div>
                                </article>
                                <article class="postcard light red">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="https://picsum.photos/501/500"
                                            alt="Image Title" />
                                    </a>
                                    <div class="postcard__text t-dark">
                                        <h1 class="postcard__title red"><a href="#">Podcast Title</a></h1>
                                        <div class="postcard__subtitle small">
                                            <time datetime="2020-05-25 12:00:00">
                                                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                            </time>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus
                                            odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium
                                            maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet
                                            ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores
                                            nobis enim quidem excepturi, illum quos!</div>
                                    </div>
                                </article>
                                <article class="postcard light green">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="https://picsum.photos/500/501"
                                            alt="Image Title" />
                                    </a>
                                    <div class="postcard__text t-dark">
                                        <h1 class="postcard__title green"><a href="#">Podcast Title</a></h1>
                                        <div class="postcard__subtitle small">
                                            <time datetime="2020-05-25 12:00:00">
                                                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                            </time>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus
                                            odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium
                                            maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet
                                            ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores
                                            nobis enim quidem excepturi, illum quos!</div>
                                    </div>
                                </article>
                                <article class="postcard light yellow">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="https://picsum.photos/501/501"
                                            alt="Image Title" />
                                    </a>
                                    <div class="postcard__text t-dark">
                                        <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
                                        <div class="postcard__subtitle small">
                                            <time datetime="2020-05-25 12:00:00">
                                                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                            </time>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus
                                            odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium
                                            maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet
                                            ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores
                                            nobis enim quidem excepturi, illum quos!</div>
                                    </div>
                                </article>
                            </main>
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