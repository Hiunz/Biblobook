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

    <style>td, th{padding: 0;}</style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <?php
        include "include/navbar.php";
        session_start();
        if (isset($_POST['livreSelect'])) {
            $_SESSION['livre'] = $_POST['livreSelect']; 
        } else if (!isset($_SESSION['livre'])) { header("Location: ../../index.php"); }
    ?>

</head>

<body>
<form action="../traitement/emprunt.php" method="post">
    <section id="team" class="team">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <br> <br>

            <header class="section-header">
                <h2>Emprunt de Livre</h2>
                <p>Voici le livre que vous avez choisi d'emprunter</p>
            </header>

            <br>

            <div class="row gy-6">
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" style="justify-content: center;" data-aos="fade-up" data-aos-delay="100">
                    <div class="member col-lg-10">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                            </div>
                        </div>
                        <?php
                            require_once "../controller/LivreController.php";
                            require_once "../controller/AuteurController.php";
                            require_once "../bdd/Bdd.php";
                            require_once "../classes/Livre.php";
                            require_once "../classes/Auteur.php";
                            $LivreController = new LivreController();
                            $livre = $LivreController->getLivre($_SESSION['livre']);
                        ?>
                        <div class="member-info">
                            <h4><?= $livre->getTitre() ?></h4>
                            <span><?= $livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom() ?></span>
                            <span><?= $livre->getAnnee() ?></span>
                            <span><?= $livre->getCategorie() ?></span>
                            <span><?= $livre->getEdition() ?></span>
                            <p><?= $livre->getResume() ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="start">Dates</label>
                    <input type="text" name="dates" value="01/01/2023 - 01/02/2023" class="form-control" required="">
                    <input type="hidden" name="date_start" id="date_start" class="form-control" required="">
                    <input type="hidden" name="date_end" id="date_end" class="form-control" required="">
                    <script>
                        $(function() {
                            $('input[name="dates"]').daterangepicker({
                            showDropdowns: true,
                            minDate: parseInt(moment().format('YYYY-MM-DD')),
                            maxDate: parseInt(moment(moment().format('YYYY-MM-DD')).add(3, 'months').format('YYYY-MM-DD'))
                            }, function(start, end, label) {
                                document.getElementById("date_start").value = start.format('YYYY-MM-DD');
                                document.getElementById("date_end").value = end.format('YYYY-MM-DD');
                            });
                        });
                    </script>
                    <br>
                    <button type="submit" class="form-control">Valider l'emprunt</button>
                </div>
            </div>
        </div>
    </section>
</form>
</body>
</html>