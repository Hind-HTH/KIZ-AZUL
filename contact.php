

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/contact.css">
    <title>Contact</title>
</head>

<body>
    <?php include 'header.php' ?>

    <header>

    </header>
    <div class="TitreContact">
        <h1>Pour tous informations, explications ou prendre un rendez-vous: </h1>
    </div>
    <section class="ContactPage">
        <div class="PrincipaleDiv">
            <form method="post" class="ProfileForm">
                <div class="ProfileTitle">
                    <h2>Envoyez un mail <?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h2>
                </div>

                <div>
                    <input type="text" placeholder="Nom*" class="form-control" name="nom" value="<?= isset($data['NOM']) ? $data['NOM'] : '' ?>">
                    <label for="nom"></label>
                </div>

                <div>
                    <input type="text" placeholder="Prenom*" class="form-control" name="prenom" value="<?= isset($data['PRENOM']) ? $data['PRENOM'] : '' ?>">
                    <label for="prenom"></label>
                </div>


                <div>
                    <input type="text" placeholder="Numero Téléphone*" class="form-control" name="tel" value="<?= isset($data['TEL']) ? $data['TEL'] : '' ?>">
                    <label for="tel"></label>
                </div>

                <div>
                    <input type="text" placeholder="Adresse Email*" class="form-control" name="email" value="<?= isset($data['Email']) ? $data['EMAIL'] : '' ?>">
                    <label for="email"></label>
                </div>
            </form>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>