<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cherchez vos livres</title>



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





    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"!--></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
    <style>
        .dataTables_filter{
            margin-bottom: 20px;
        }
    </style>
</head>

<body style="display: flex;align-items: center;flex-direction: column;padding: 40px;">

<?php
    include "include/navbar.php";
?>


<div class="col-md-10" style="
    padding: 20px;
    border: solid;
    border-radius: 40px;
    background-color: #f7fffa;">
    <div class="hero-callout">
        <div id="example_wrapper" class="dataTables_wrapper">

            <table id="table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;border: solid;margin-bottom: 10px;border-color: #b9b9b9;" aria-describedby="example_info">

                <thead>
                <tr>
                    <th class="sorting sorting_asc" style="width: 102px;" aria-sort="ascending" aria-label="Titre: activate to sort column descending">Titre</th>
                    <th class="sorting" style="width: 168px;" aria-label="Annee: activate to sort column ascending">Annee</th>
                    <th class="sorting" style="width: 75px;" aria-label="Resume: activate to sort column ascending">Edition</th>
                    <th class="sorting" style="width: 75px;" aria-label="Resume: activate to sort column ascending">Auteur</th>
                    <th class="sorting" style="width: 102px;" aria-sort="ascending" aria-label="Titre: activate to sort column descending">Categorie</th>
                </tr>
                </thead>

                <tbody>
                <?php
                require_once "../controller/LivreController.php";
                require_once "../controller/AuteurController.php";
                require_once "../bdd/Bdd.php";
                require_once "../classes/Livre.php";
                require_once "../classes/Auteur.php";
                $LivreController = new LivreController();
                $increment = 0;
                foreach ($LivreController->getLivres() as $livre) {
                $increment++;
                ?>

                <tr class="<?= ($increment%2 == 1)?"odd":"even" ?>">
                    <td class="sorting_1  dtr-control"><?= $livre->getTitre() ?></td>
                    <td><?= $livre->getAnnee() ?></td>
                    <td><?= $livre->getEdition() ?></td>
                    <td><?= $livre->getAuteur()->getNom() ?></td>
                    <td><?= $livre->getCategorie() ?></td>
                </tr>

                    <?php
                }
                ?>
                </tbody>

            </table>

        </div>
    </div>
</div>
</body>
</html>
