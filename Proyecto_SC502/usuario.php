<?php

require_once "DAL/cliente.php";

$email = "test@test";
$password = "hola";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

DefinirContrasena($email, $passwordHash);

?>