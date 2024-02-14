<?php
require_once './Session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/index.css">
    <title>Accueil!</title>
</head>
<body>
    <?php include 'header.php' ?>

    <header>
        
    </header>
    <h1>welcome to the start point! <br> Bonjour <?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h1>

    <?php include 'footer.php'?>
</body>
</html>