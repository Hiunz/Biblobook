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
  <?php session_start();?>

</head>

<body>
  <?php
    include "include/navbar.php";
    $user = UtilisateurController::getUtilisateur($_SESSION['user']);
    $_SESSION['cache'] = [
        'nom'=>$user->getNom(),
        'prenom'=>$user->getPrenom(),
        'email'=>$user->getEmail(),
        'telfixe'=>[
            0=>$user->getTel_fixe(),
            1=>$user->getTel_portable()
        ],
        'mdp'=>[
            0=>$user->getMdp()
        ],
        'adress'=>$user->getRue()." ".$user->getCp()." ".$user->getVille(),
        'rue'=>$user->getRue(),
        'cp'=>$user->getCp(),
        'ville'=>$user->getVille()
    ];
  ?>
  <!-- ======= Hero Section ======= -->
  <section class="hero d-flex align-items-center" id="hero" style="padding-top:90px;">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center" style="display: flex;align-items: center; padding: 30px;">
          <h1 data-aos="fade-up" class="aos-init aos-animate">Modifie ton profil !!</h1>
          
        </div>
        
          

          <div class="col-lg-6 contact">
            <form action="../traitement/Monprofil.php" method="post" class="php-email-form">
              <div class="row gy-4 counts" style="padding:10px;">

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['nom']))?$_SESSION['cache']['nom']:""?>" type="text" name="nom" class="form-control" placeholder="Nom" required="">
                </div>

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['prenom']))?$_SESSION['cache']['prenom']:""?>" type="text" class="form-control" name="prenom" placeholder="Prénom" required="">
                </div>

                <div class="col-md-12">
                  <input value="<?= (isset($_SESSION['cache']['email']))?$_SESSION['cache']['email']:""?>" type="email" class="form-control" name="email" placeholder="E-mail" required="">
                </div>
                
                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['mdp'][0]))?$_SESSION['cache']['mdp'][0]:""?>" type="password" class="form-control" name="mdp[]" placeholder="Mot de passe" required="">
                </div>

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['mdp'][1]))?$_SESSION['cache']['mdp'][1]:""?>" type="password" class="form-control" name="mdp[]" placeholder="Confirmation" required="">
                </div>                

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['telfixe'][0]))?$_SESSION['cache']['telfixe'][0]:""?>" type="tel" name="telfixe[]" class="form-control" placeholder="N°Tel portable" pattern="[0-9]{10}" required="">
                </div>

                <div class="col-md-6">
                  <input value="<?= (isset($_SESSION['cache']['telfixe'][1]))?$_SESSION['cache']['telfixe'][1]:""?>" type="tel" name="telfixe[]" class="form-control" placeholder="N°Tel fixe" pattern="[0-9]{10}" required="">
                </div>
                
                <div class="col-md-12">
                  <input value="<?= (isset($_SESSION['cache']['adress']))?$_SESSION['cache']['adress']:""?>" id="adress" type="text" class="form-control" name="adress" placeholder="Adresse" required="">
                </div>
                <div class="count-box" style="margin-left: 20px; padding: 10px; width: auto; font-size: 0.5em;">
                  <span id="adresstext" style="font-size: 2.2em;">Adresse</span>
                </div>
                <input value="<?= (isset($_SESSION['cache']['rue']))?$_SESSION['cache']['rue']:""?>" id="rue" type="hidden" class="form-control" name="rue" placeholder="Adresse" required="">
                <input value="<?= (isset($_SESSION['cache']['cp']))?$_SESSION['cache']['cp']:""?>" id="cp" type="hidden" class="form-control" name="cp" placeholder="Adresse" required="">
                <input value="<?= (isset($_SESSION['cache']['ville']))?$_SESSION['cache']['ville']:""?>" id="ville" type="hidden" class="form-control" name="ville" placeholder="Adresse" required="">
                
                <script>
                  document.addEventListener('DOMContentLoaded', adresse);
                  document.getElementById('adress').addEventListener('input', adresse);
                  function adresse(){
                    const requester = new XMLHttpRequest();
                    requester.open("GET", "https://api-adresse.data.gouv.fr/search/?q="+document.getElementById('adress').value+"&autocomplete=1");
                    requester.send();
                    requester.responseType = "json";
                    requester.onload = () => {
                      if (requester.readyState == 4 && requester.status == 200) {
                        var data = requester.response;
                        console.log(data);
                        if (data.features.length!=0) {
                          document.getElementById('rue').value = data.features[0].properties.housenumber+" "+data.features[0].properties.street;
                          document.getElementById('cp').value = data.features[0].properties.postcode;
                          document.getElementById('ville').value = data.features[0].properties.city;
                          document.getElementById('adresstext').innerHTML = data.features[0].properties.label;
                          console.log(document.getElementById('rue').value)
                          console.log(document.getElementById('cp').value)
                          console.log(document.getElementById('ville').value)
                        }
                      } else {
                        console.log(`Error: ${xhr.status}`);
                        document.getElementById('rue').value = null;
                        document.getElementById('cp').value = null;
                        document.getElementById('ville').value = null;
                        document.getElementById('adresstext').innerHTML = "Aucune adresse semblable trouvée !!!";
                      }
                    };
                  }
                </script>
              
                

                

                <div class="col-md-12 text-center">
                  <div class="error-message" style="<?=(isset($_SESSION['error']))?"display: block;":""?>"><?=(isset($_SESSION['error']))?$_SESSION["error"]:""?></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit" id="sub_btn">S'inscrire</button>
                </div>

              </div>
            </form>
          </div>
          
        </div>
      </div>
      
    </section>
    
    <?php $_SESSION['cache'] = null; $_SESSION['error'] = null; ?>
    
  

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>


  
</body>

</html>