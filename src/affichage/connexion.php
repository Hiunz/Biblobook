<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
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

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- Map integration -->
  <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

</head>

<body>
  <?php
    include "include/navbar.php";
  ?>
  <!-- ======= Hero Section ======= -->
  <section class="hero d-flex align-items-center" id="hero" style="padding-top:90px;">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center" style="display: flex;align-items: center; padding: 30px;">
          <h1 data-aos="fade-up" class="aos-init aos-animate">Connexion</h1>
          <h2 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">ou</h2>
          <div data-aos="fade-up" data-aos-delay="600" class="aos-init aos-animate">
            <div class="text-center text-lg-start">
              <a href="inscription.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>S'inscrire</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        
          

          <div class="col-lg-6 contact">
             <form action="../traitement/connexion.php" method="post" class="php-email-form" style="height: auto;">
              <div class="row gy-4 counts" style="padding:10px;">

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['email']))?$_SESSION['cache']['email']:""?>" type="email" class="form-control" name="email" placeholder="E-mail" required="">
                </div>
                
                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['mdp']))?$_SESSION['cache']['mdp']:""?>" type="password" class="form-control" name="mdp" placeholder="Mot de passe" required="">
                </div>

                
                

                

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message" style="<?=(isset($_SESSION['error']))?"display: block;":""?>"><?=(isset($_SESSION['error']))?$_SESSION["error"]:""?></div>
                  <div class="sent-message" style="<?=(isset($_SESSION['message']))?"display: block;":""?>"><?=(isset($_SESSION['message']))?$_SESSION["message"]:""?></div>

                  <button type="submit">Se connecter</button>
                </div>

              </div>
            </form>
          </div>
          
        </div>
      </div>
      
    </section>
    
    <?php $_SESSION['cache'] = null; $_SESSION['error'] = null; $_SESSION['message'] = null; ?>
    
  

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