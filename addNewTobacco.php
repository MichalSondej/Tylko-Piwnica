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
    <link rel="stylesheet" href="styles/addNewTobacco.css">
</head>

<body>
    <header>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <ul class="nav">
                    <li class="nav-item">
                        <div class="btn-group">
                            <button id="nameBtn" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Edytuj profil</a></li>
                                <li><a class="dropdown-item" href="#">Moje tytonie</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Wyloguj się</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Tytonie
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark" href="addNewTobacco.php">Dodaj nowy tytoń</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark" href="#">Piwnica</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="contaier-lg">
        <form class="container" method="POST" >
            <div class="mb-3">
                <label for="nameTobacco" class="form-label">Nazwa tytoniu</label>
                <input type="text" class="form-control" name="nameTobacco">
            </div>
            <div class="mb-3">
                <label for="brandTobacco" class="form-label
                ">Marka tytoniu</label>
                    <select name="brandSelect" onchange="checkOption(this)" class="form-select" aria-label="Default select example">
                        <option selected>Wybierz z listy</option>
                        <option value="newBrand" >Dodaj nową firmę</option>
                    <?php foreach ($con->query($sqlQueryBrandTobacco) as $row) {
                        echo '<option value="' . $row['brand'] . '">' . $row['brand'] . ' </option>';
                    } ?>
                </select>
                <label id="labelBrand" for="brandTobacco" class="form-label" style="display: none;">Nowa marka tytoniu</label>
                <input id="brandTobacco" type="text" class="form-control" name="brandTobacco" style="display: none;">
            </div>
            <div class="mb-3">
                <label for="typeTobacco" class="form-label
                ">Rodzaj tytoniu</label>
                <input type="text" class="form-control" name="typeTobacco">
            </div>
            <div class="mb-3">
                <label for="flavorTobacco" class="form-label
                ">Smak tytoniu</label>
                <input type="text" class="form-control" name="flavorTobacco">
            </div>
            <div class="mb-3">
                <label for="priceTobacco" class="form-label
                ">Cena tytoniu</label>
                <input type="text" class="form-control" name="priceTobacco">
            </div>
            <div class="mb-3">
                <label for="descriptionTobacco" class="form-label
                ">Opis tytoniu</label>
                <textarea class="form-control" name="descriptionTobacco" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj tytoń</button>
    </div>
    </form>
    </div>

    <script src="scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="scripts/addNewTobacco.js"></script>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nameTobacco']) && isset($_POST['typeTobacco']) && !empty($_POST['flavorTobacco']) && isset($_POST['priceTobacco']) && isset($_POST['descriptionTobacco'])) {
        addNewTobacco();
    } else {
        echo 'Wypełnij wszystkie pola';
    }
}
function addNewTobacco()
{
    include 'db.php';

    $nameTobacco = $_POST['nameTobacco'];

    if ($_POST['brandTobacco'] == null) {
        $brandTobacco = $_POST['brandSelect'];
    } else {
    $brandTobacco = $_POST['brandTobacco'];
    }
    $typeTobacco = $_POST['typeTobacco'];
    $flavorTobacco = $_POST['flavorTobacco'];
    $priceTobacco = $_POST['priceTobacco'];
    $descriptionTobacco = $_POST['descriptionTobacco'];

    $sql = "INSERT INTO tobaccos (name, brand, type, flavor, price, description) VALUES ('$nameTobacco', '$brandTobacco', '$typeTobacco', '$flavorTobacco', '$priceTobacco', '$descriptionTobacco')";

    mysqli_query($con, $sql);
}
?>