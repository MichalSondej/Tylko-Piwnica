<?php

$sqlQueryBrandTobacco = "SELECT DISTINCT brand FROM tylko_piwnica.tobaccos;";

?>

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
                <li class="nav-item">
                    <a class="btn btn-dark" href="index.php">Piwnica</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Tytonie
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php foreach ($con->query($sqlQueryBrandTobacco) as $row) {
                            echo '<li class="dropdown-item" value="' . $row['brand'] . '">' . $row['brand'] . ' </li>';
                        } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="addNewTobacco.php">Dodaj nowy tytoń</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
                <button class="searchBtn btn btn-outline-success" type="submit">Szukaj</button>
            </form>
        </div>

    </nav>
</header>