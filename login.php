<?php
include 'db.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
}

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);

foreach ($result as $row) {
    if ($row['username'] == $username && $row['password'] == $password) {
        header('Location: index.php');
    } 
}

var_dump($result);

?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tylko Piwnica - Zaloguj się</title>
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


        <div class="a-register">
            <a href="register.php">Nie masz jeszcze konta? Zarejestruj się</a>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>