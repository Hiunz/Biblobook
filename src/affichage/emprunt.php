<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page des emprunts</title>

    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/img/template/team">
</head>

<body>
<?php
include "include/navbar.php";
?>
<form action="../traitement/traitementEmprunt.php" method="post">
    <?php session_start(); ?>
    4
    <section id="team" class="team">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <br> <br>

            <header class="section-header">
                <h2>Emprunt de Livre</h2>
                <p>Voici le livre que vous avez choisi d'emprunter</p>
            </header>

            <br>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Titre</h4>
                            <span>Auteur</span>
                            <span>Année</span>
                            <span>Categorie</span>
                            <span>Édition</span>
                            <p>Résumé du livre écrit comme ça ici la de manière à être sur que c'est bien le bon livre quoi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="start">Début de l'emprunt</label>
                    <input id="start" type="date" name="date_start" class="form-control" required="">
                <br><br>
                    <label for="fin">Fin de l'emprunt</label>
                    <input id="fin" type="date" name="date_end" class="form-control" required="">
                <br><br><br>
                    <button type="submit">Valider l'emprunt</button>
                </div>
            </div>
        </div>
    </section>
</form>
</body>
</html>