<?php
include 'db.php';
session_start();
if (!$_SESSION['username']) {
    header('Location: login.php');
}
$sqlQueryBrandTobacco = "SELECT DISTINCT brand FROM tylko_piwnica.tobaccos;";



?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tylko Piwnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <?php
    foreach ($con->query($sqlQueryBrandTobacco) as $row) {
        
        $brand = $row['brand'];
        $sqlQueryNameTobacco = "SELECT  * FROM tylko_piwnica.tobaccos WHERE brand = '$brand';";

        echo '<h2 class="text-center">' . $row['brand'] . '</h2>';
        echo '<div class="container">
                <div class="cards container-sm row row-cols-1 row-cols-md-3 g-4">';
                    foreach ($con->query($sqlQueryNameTobacco) as $row) {
                        echo '<div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row['name'] . '</h5>
                                        <p class="card-text">Marka: ' . $row['brand'] . '</p>
                                        <p class="card-text">Rodzaj: ' . $row['type'] . '</p>
                                        <p class="card-text">Moc: ' . $row['strong'] . '</p>
                                        <p class="card-text">Opis: ' . $row['description'] . '</p>
                                    </div>
                                </div>
                            </div>';
                    }
        echo '</div>
            </div>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="scripts/index.js"></script>

</body>

</html>