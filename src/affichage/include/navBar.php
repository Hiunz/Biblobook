
  <!-- ======= Header ======= -->
  <?php 
  $fileName = explode("/", $_SERVER["SCRIPT_NAME"]); 
  $fileName = array_pop($fileName);
  require_once ((($fileName=="index.php")?"src/":"../").'controller/UtilisateurController.php');
  require_once ((($fileName=="index.php")?"src/":"../").'classes/Utilisateur.php');
  require_once ((($fileName=="index.php")?"src/":"../").'bdd/Bdd.php');
  //session_start();
  if (isset($_POST['deco'])) {
    $_SESSION = null;
    session_destroy();
  }
  $user;
  if (isset($_SESSION['user'])) {
    $user = UtilisateurController::getUtilisateur($_SESSION['user'])->getAdmin();
  } else { $user = null; }
  ?>
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=($fileName=="index.php")?"":"../../"?>index.php" class="logo d-flex align-items-center">
        <img src="<?=($fileName=="index.php")?"":"../../"?>assets/img/template/logo.png" alt="">
        <span>Biblobook</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- 
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          -->
          <?php
            if ($user) {
          ?>
          <li class="dropdown"><a href="#"><span>Gestion Admin</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?=($fileName=="index.php")?"src":".."?>/affichage/GestionLivre.php">Gestion Livres</a></li>
              <li><a href="<?=($fileName=="index.php")?"src":".."?>/affichage/GestionAuteurs.php">Gestion Auteurs</a></li>
              <li><a href="<?=($fileName=="index.php")?"src":".."?>/affichage/GestionEmprunts.php">Gestion emprunts</a></li>
              <li><a href="<?=($fileName=="index.php")?"src":".."?>/affichage/GestionUtilisateurs.php">Gestion Utilisateurs</a></li>
            </ul>
          </li>
          <?php
            }
            if ($user != null) {
          ?>
          <li>
            <a href="<?=($fileName=="index.php")?"src/":"../"?>affichage/MesEmprunts.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Vos emprunts</span>
            </a>
          </li>
          <?php
            }
          ?>
          <li>
            <a href="<?=($fileName=="index.php")?"":"../../index.php"?>#searsh" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Cherchez vos livres</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </li>
          <?php
            if ($user == null) {
          ?>
          <li><a class="getstarted scrollto" href="<?=($fileName=="index.php")?"src/affichage/":""?>connexion.php">Se connecter</a></li>
          <?php
            } else {
          ?>
          <form action="" method="post">
            <li><input type="submit" class="getstarted scrollto" name="deco" value="Se déconnecter" style="border-width: 0;"></li>
          </form>
          <?php
            }
            if ($user != null) {
          ?>
          <li>
            <a href="<?=($fileName=="index.php")?"src/affichage/":""?>Monprofil.php" style="padding: 0; ">
              <img src="<?=($fileName=="index.php")?"":"../../"?>assets/img/editprofil.png" style="height: 40px; margin: 15px;" alt="">
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
