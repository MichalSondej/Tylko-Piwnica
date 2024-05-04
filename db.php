<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'tylko_piwnica';

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {


?>
    <script>
        alert("No connection");
    </script>
<?php
}
