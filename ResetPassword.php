<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/ResetPassword.css">
    <title>RessetPassword</title>
</head>

<body>
    <?php include 'header.php' ?>


    <section class="Principale" style="display: flex; flex-direction:row;">

        <div class="PrincipaleDiv">

            <form method="post" class="ProfileForm">

                <div class="ProfileTitle">
                    <h2>Modifiez les informations de votre Profile <?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h2>
                </div>

                <div>
                    <input type="text" placeholder="*" class="form-control" name="nom" value="<?= isset($data['NOM']) ? $data['NOM'] : '' ?>">
                    <label for="nom"></label>
                </div>

                <div>
                    <input type="text" placeholder="Prenom*" class="form-control" name="prenom" value="<?= isset($data['PRENOM']) ? $data['PRENOM'] : '' ?>">
                    <label for="prenom"></label>
                </div>

                <button type="submit" name="validation">Valider</button>
            </form>
        </div>
    </section>


    <?php include 'footer.php' ?>
</body>

</html>