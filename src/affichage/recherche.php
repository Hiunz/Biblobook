<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cherchez vos livres</title>
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
?>
<br><br><br>
<?=
require_once "../../src/controller/LivreController.php";
require_once "../../src/classes/Livre.php";
require_once "../../src/bdd/Bdd.php";
$livreController = new LivreController();
?>

<link rel="stylesheet" type="text/css" href="datatables.min.css">
<script type="text/javascript" src="datatables.min.js"></script>

<table id="test">
    <thead>
    <th>Id livre</th>
    <th>Titre</th>
    <th>Annee</th>
    <th>Resume</th>
    <th>Édition</th>
    <th>Catégorie</th>
    </thead>

    <tbody>
    <?php for ($i = 0; $i < $livreController->getNbLivres(); $i++){ ?>
        <tr>
            <td>
            <?= $res = $livreController->getLivres()->getTitre();
            var_dump($res);
            ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script type="text/javascript">
    $("test").dataTable({
    });
</script>


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