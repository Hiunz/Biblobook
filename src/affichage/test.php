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
    <style>
        .child {
            transform: translateY(-100%);
            filter: opacity(0);
            transition: 0.5s transform 0s, 0.3s filter 0s;
            display: none;
        }
        .slide {
            transform: translateY(0%);
            filter: opacity(1);
        }

    </style>
        <div id="example_wrapper" class="dataTables_wrapper">
            <table id="example" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;border: solid;margin-bottom: 10px;border-color: #b9b9b9;" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 168px;" aria-label="Position: activate to sort column ascending">Position</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75px;" aria-label="Office: activate to sort column ascending">Office</th>
                        <th class="dt-body-right sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 27px;" aria-label="Age: activate to sort column ascending">Age</th>
                        <th class="dt-body-right sorting dtr-hidden" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Start date: activate to sort column ascending">Start date</th>
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
                    <tr class="<?= ($increment%2 == 1)?"odd":"even" ?> parent">
                        <td class="sorting_1  dtr-control"><?= $livre->getTitre() ?></td>
                        <td><?= $livre->getAnnee() ?></td>
                        <td><?= $livre->getEdition() ?></td>
                        <td class="dt-body-right"><?= $livre->getCategorie() ?></td>
                        <td class="hiddenchild">
                        ggg
                        </td>
                    </tr>
                    
                    <?php
                        }
                    ?>
<script>
  $(document).ready(function() {

    
    
    
    
    // Afficher/masquer la ligne enfant lors du clic sur la ligne parent
    $('.parent').click(function () {
        var child = $(this).next('.child');


            if(child[0].classList[1]=="slide"){
                child.toggleClass('slide');
                setTimeout(function() { child.toggle(); }, 500);
            }else{
                other = document.getElementsByClassName("slide");
                if (other.length>0) {
                    other = other[0];
                    other.classList.toggle('slide');
                    setTimeout(function() { other.style.display = "none"; }, 300);
                }
                
                child.toggle();
                setTimeout(function() { child.toggleClass('slide'); }, 1);
            }
    });
  });

  
</script>

                </tbody>
              
            </table>
            
        </div>
    </div>
    </div>



</body>

</html>