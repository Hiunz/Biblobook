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
  <style>
    .header {
        background: #fff;
        padding: 15px 0;
        box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
    }
  </style>


  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">


  <!-- Datatable integration -->
  <?php
  require_once "../controller/LivreController.php";
  require_once "../controller/AuteurController.php";
  require_once "../bdd/Bdd.php";
  require_once "../classes/Livre.php";
  require_once "../classes/Auteur.php";
  $LivreController = new LivreController();
  ?>

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

  <main id="main" style="margin-top: 100px;">
    

    <!-- ======= Datatable ======= -->
    <section style="display: flex;align-items: center;flex-direction: column;padding: 40px;" id="searsh" class="contact">
        <header class="section-header">
              <h2>Gestion de livre</h2>
              <p>Gérez des livres</p>
            </header>
        <div class="col-md-10 info-box navbar" style="display: block;">
        <div class="hero-callout">
            <div id="example_wrapper" class="dataTables_wrapper">
                <table id="example" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;border: solid;margin-bottom: 10px;border-color: #b9b9b9;" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" style="width: 102px; text-align: center;" aria-sort="ascending" aria-label="Titre du livre">Titre</th>
                            <th class="sorting" style="width: 168px; text-align: center;" aria-label="Auteur du livre">Auteur</th>
                            <th class="sorting" style="width: 70px; text-align: center;" aria-label="Année de publication du livre">Année</th>
                            <th class="sorting" style="width: 75px; text-align: center;" aria-label="Edition du livre">Edition</th>
                            <th class="sorting" style="width: 27px; text-align: center;" aria-label="Catégorie du livre">Catégorie</th>
                            <?= (!empty($_SESSION['user']))?'<td style="width: 27px; text-align: center;" aria-label="Bouton daction">Action</td>':'' ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $increment = 0;
                            foreach ($LivreController->getLivres() as $livre) {
                                $increment++;
                        ?>
                        <tr class="<?= ($increment%2 == 1)?"odd":"even" ?> parent">
                            <td class="sorting_1  dtr-control"><?= $livre->getTitre() ?></td>
                            <td><?= $livre->getAuteur()->getNom() ?></td>
                            <td><?= $livre->getAnnee() ?></td>
                            <td><?= $livre->getEdition() ?></td>
                            <td><?= $livre->getCategorie() ?></td>
                            <?php
                            if (!empty($_SESSION['user'])) {?>
                              <td class="selectRow">
                                  <form action="../traitement/GestionLivre.php" method="Post">
                                      <input type="hidden" name="livreSelect" value="<?= $livre->getId() ?>">
                                      <button type="submit" name="modif" value="true">modifier </button>
                                      <button type="submit" name="supp" value="true">supprimer </button>
                                  </form>
                              </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
            <a class="getstarted scrollto" href="ajouterLivre.php" style="width: 100px; text-align: center; position: absolute; left: 200px; left: 200px; top: 25px;">
                Ajouter
            </a>
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
              <img src="assets/img/template/logo.png" alt="">
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
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>