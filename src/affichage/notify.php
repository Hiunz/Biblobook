<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/template/favicon.png" rel="icon">
  <link href="../../assets/img/template/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <style>
  .header{
    background-color: #fff;
    padding: 15px 0;
    box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
}
  </style>

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">


  <!-- Datatable integration -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });
  </script>


  <!-- Datatable integration -->
  <?php session_start(); ?>

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
    include "include/navbar.php";
  ?>
  <main id="main">
    


    <!-- ======= Datatable ======= -->
    <section style="display: flex;align-items: center;flex-direction: column;padding: 40px; margin-top: 100px;" id="searsh" class="contact">
        <header class="section-header">
              <h2>Recherche</h2>
              <p>Cherchez vos livres</p>
            </header>
        <div class="col-md-10 info-box navbar" style="display: block;">
        <div class="hero-callout">
            <div id="example_wrapper" class="dataTables_wrapper">
                <table id="example" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;border: solid;margin-bottom: 10px;border-color: #b9b9b9;" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" style="width: 102px; text-align: center;" aria-sort="ascending" aria-label="Titre du livre emprunté">Titre</th>
                            <th class="sorting" style="width: 168px; text-align: center;" aria-label="Auteur du livre emprunté">Auteur</th>
                            <th class="sorting" style="width: 75px; text-align: center;" aria-label="Edition du livre emprunté">Edition</th>
                            <th class="sorting" style="width: 70px; text-align: center;" aria-label="nom & prénom Utilisateur">Empruntant</th>
                            <th class="sorting" style="width: 27px; text-align: center;" aria-label="date début & fin">Détail emprunt</th>
                            <th style="width: 27px; text-align: center;" aria-label="Notifier l'utilisateur">Notifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../controller/LivreController.php";
                            require_once "../controller/EmpruntController.php";
                            require_once "../bdd/Bdd.php";
                            require_once "../classes/Livre.php";
                            require_once "../classes/Auteur.php";
                            $empruntController = new EmpruntController();
                            $increment = 0;
                            foreach ($empruntController->getEmprunts() as $emprunt) {
                                $increment++;
                        ?>
                        <tr class="<?= ($increment%2 == 1)?"odd":"even" ?> parent">
                            <td class="sorting_1  dtr-control"><?= $livre->getTitre() ?></td>
                            <td><?= $emprunt->getLivre()->getTitre() ?></td>
                            <td><?= $emprunt->getLivre()->getAuteur()->getPrenom." - ".$emprunt->getLivre()->getAuteur()->getNom ?></td>
                            <td><?= $emprunt->getLivre()->getEdition() ?></td>
                            <td>
                              <form action="src/affichage/detailUtil">
                                <input type="submit" value="Emprunt" class="getstarted" style="margin-left: 0px; border-style: solid; border-color: #404040;">
                                <input type="hidden" name="livreSelect" value="<?= $livre->getId() ?>">
                              </form>
                            </td>
                            <td class="selectRow">
                                <form action="src/affichage/emprunt.php">
                                  <input type="submit" value="Emprunt" class="getstarted" style="margin-left: 0px; border-style: solid; border-color: #404040;">
                                  <input type="hidden" name="livreSelect" value="<?= $livre->getId() ?>">
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>

   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="../../assets/img/template/logo.png" alt="">
              <span>Biblobook</span>
            </a>
            <p>Connectez vous à la merveilleuse bibliothèque de Lyon</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>