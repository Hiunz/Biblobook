<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/template/favicon.png" rel="icon">
  <link href="assets/img/template/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


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
    include "src/affichage/include/navbar.php";
  ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Bienvenue<br>sur Biblobook</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Trouvez vos livre préférés chez nous !</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#searsh" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Cherchez vos livres</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/mainBanner.svg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->



    <!-- ======= Datatable ======= -->
    <section style="display: flex;align-items: center;flex-direction: column;padding: 40px;" id="searsh" class="contact">
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
                            <th class="sorting sorting_asc" style="width: 102px; text-align: center;" aria-sort="ascending" aria-label="Titre du livre">Titre</th>
                            <th class="sorting" style="width: 168px; text-align: center;" aria-label="Auteur du livre">Auteur</th>
                            <th class="sorting" style="width: 70px; text-align: center;" aria-label="Année de publication du livre">Année</th>
                            <th class="sorting" style="width: 75px; text-align: center;" aria-label="Edition du livre">Edition</th>
                            <th class="sorting" style="width: 27px; text-align: center;" aria-label="Catégorie du livre">Catégorie</th>
                            <?= (!empty($_SESSION['user']))?'<th style="width: 27px; text-align: center;" aria-label="Bouton d\'emprunt">Emprunter</th>':'' ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "src/controller/LivreController.php";
                            require_once "src/controller/AuteurController.php";
                            require_once "src/bdd/Bdd.php";
                            require_once "src/classes/Livre.php";
                            require_once "src/classes/Auteur.php";
                            $LivreController = new LivreController();
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
                                  <form action="src/affichage/emprunt.php">
                                      <input type="submit" value="Emprunt" class="getstarted" style="margin-left: 0px; border-style: solid; border-color: #404040;">
                                      <input type="hidden" name="livreSelect" value="<?= $livre->getId() ?>">
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
        </div>
    </section>



    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>L'équipe</h2>
          <p>Mieux nous connaitre</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  C'est pas simple de faire un projet de groupe, mais bon on finit toujours par trouver une solution.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Laurine Megane Gbahe Taho</h3>
                  <h4>Developpeuse 1ere annee</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Super projet!
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Shradha Kallee Digumber</h3>
                  <h4>Developpeuse 1ere annee</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  J'aime mettre des controllers
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Elias Ait-Boukha</h3>
                  <h4>Developpeur 1ere annee</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Yé sui le bonhomme des bois qui court avec des fruits dans les poches pour faire des tartes au fruits.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Hugo Zins</h3>
                  <h4>Developpeur 1ere annee</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  J'aime mon métier!
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Tristan Mattei</h3>
                  <h4>Professeur en developpement informatique</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  KTM ready to wait!
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/template/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                  <h3>Sébastien Lemoine</h3>
                  <h4>Professeur en developpement informatique</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->

   

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contactez nous</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Adresse</h3>
                  <p>120 rue de la lecture <br>Lyon, 69123</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Appelez nous</h3>
                  <p>+33 9 43 42 67 78<br>+33 9 43 42 67 78</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Envoyez nous un mail</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Heures d'ouverture</h3>
                  <p>Lundi - Vendredi<br>9h - 17h</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->



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