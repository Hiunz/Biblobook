<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cherchez vos livres</title>

    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;" aria-sort="ascending" aria-label="Titre: activate to sort column descending">Titre</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 168px;" aria-label="Annee: activate to sort column ascending">Annee</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75px;" aria-label="Resume: activate to sort column ascending">Resume</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75px;" aria-label="Resume: activate to sort column ascending">Edition</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;" aria-sort="ascending" aria-label="Titre: activate to sort column descending">Categorie</th>
                </tr>
                </thead>

                <tbody>
                <?php
                require_once "../controller/LivreController.php";
                $LivreController = new LivreController();
                $increment = 0;
                foreach ($LivreController->getLivres() as $livre) {
                $increment++;
                ?>

                <tr class="<?= ($increment%2 == 1)?"odd":"even" ?>">
                    <td class="sorting_1  dtr-control"><?= $livre->getTitre() ?></td>
                    <td><?= $livre->getAnnee() ?></td>
                    <td><?= $livre->getResume() ?></td>
                    <td><?= $livre->getEdition() ?></td>
                    <td class="dt-body-right"><?= $livre->getCategorie() ?></td>
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
