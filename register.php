<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tylko Piwnica - Zarejestruj się</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>


    <form class="container-sm container" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nazwa użytkownika</label>
            <input type="text" class="form-control" name="username">
        </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="mb-3">
            <label for="password2" class="form-label">Powtórz hasło</label>
            <input type="password" class="form-control" name="password2">
        </div>
        <div class="a-register">
            <a href="login.php">Masz już konto? Zaloguj się</a>
        </div>
        <button type="submit" class="btn btn-primary">Zarejestruj się</button>

    </form>

    <div class="alert-div container-sm">
        <?php
        if ($username == '' || $password == '') {
        ?><div class="alert alert-warning" role="alert">
                Uzupełnij puste pola! </div>
            <?php
        } else {
            if ($password != $password2) {
            ?><div class="alert alert-danger" role="alert">
                    Hasła nie są takie same! </div>
            <?php
            } else {
                $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
                $result = mysqli_query($con, $sql);
            ?><div class="alert alert-success" role="alert">
                    Konto założone pomyślnie! </div>
        <?php
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>