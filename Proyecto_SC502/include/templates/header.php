<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">

    <!-- El preload nos va a permitir solicitar recursos html rapidamente -->
    <link rel="preload" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Proyecto SC-502</title>
</head>

<body>
    <header class="header">
        <a href="index.html">
            <img class="header__logo" src="img/logo.webp" alt="Logotipo">
            <!-- texto alternativo ayuda en el posicionamiento -->
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="contenido.html">Contenidos</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Contactenos</a>
    </nav>