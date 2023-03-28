<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
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
            <table id="example" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;border: solid;margin-bottom: 10px;border-color: #b9b9b9;" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 168px;" aria-label="Position: activate to sort column ascending">Position</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75px;" aria-label="Office: activate to sort column ascending">Office</th>
                        <th class="dt-body-right sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 27px;" aria-label="Age: activate to sort column ascending">Age</th>
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
                        <td><?= $livre->getEdition() ?></td>
                        <td class="dt-body-right"><?= $livre->getCategorie() ?></td>
                    </tr>
                    <?php
                        }
                    ?>

<!-- 
                    <tr class="even">
                        <td class="sorting_1 dtr-control">Angelica Ramos
                        </td>
                        <td>Chief Executive Officer (CEO)
                        </td>
                        <td>London
                        </td>
                        <td class="dt-body-right">47
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">09/10/2009
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$1,200,000
                        </td>
                    </tr>
                    
                    <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0">Ashton Cox
                        </td>
                        <td>Junior Technical Author
                        </td>
                        <td>San Francisco
                        </td>
                        <td class="dt-body-right">66
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">12/01/2009
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$86,000
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="sorting_1 dtr-control">Bradley Greer
                        </td>
                        <td>Software Engineer
                        </td>
                        <td>London
                        </td>
                        <td class="dt-body-right">41
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">13/10/2012
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$132,000
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="sorting_1 dtr-control">Brenden Wagner
                        </td>
                        <td>Software Engineer
                        </td>
                        <td>San Francisco
                        </td>
                        <td class="dt-body-right">28
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">07/06/2011
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$206,850
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson
                        </td>
                        <td>Integration Specialist
                        </td>
                        <td>New York
                        </td>
                        <td class="dt-body-right">61
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">02/12/2012
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$372,000
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="sorting_1 dtr-control">Bruno Nash
                        </td>
                        <td>Software Engineer
                        </td>
                        <td>London
                        </td>
                        <td class="dt-body-right">38
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">03/05/2011
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$163,500
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="sorting_1 dtr-control">Caesar Vance
                        </td>
                        <td>Pre-Sales Support
                        </td>
                        <td>New York
                        </td>
                        <td class="dt-body-right">21
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">12/12/2011
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$106,450
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="sorting_1 dtr-control">Cara Stevens
                        </td>
                        <td>Sales Assistant
                        </td>
                        <td>New York
                        </td>
                        <td class="dt-body-right">46
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">06/12/2011
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$145,600
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly
                        </td>
                        <td>Senior Javascript Developer
                        </td>
                        <td>Edinburgh
                        </td>
                        <td class="dt-body-right">22
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">29/03/2012
                        </td>
                        <td class="dt-body-right dtr-hidden" style="display: none;">$433,060
                        </td>
                    </tr>
                 -->
                </tbody>
              
            </table>
            
        </div>
    </div>
    </div>



</body>

</html>