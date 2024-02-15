<?php
require_once './class/User.php';
require_once './Session.php';


$user = new User();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];


    if ($user->verifierConnexion($email, $mot_de_passe)) {
        $message = "Connexion réussie!";
        $userInfo = $user->displayname($email);
        $_SESSION['nom'] = $userInfo['NOM'];
        $_SESSION['prenom'] = $userInfo['PRENOM'];
        $_SESSION['email'] = $userInfo['EMAIL'];
        $_SESSION['id_user'] = $userInfo['ID'];
        header("Location: index.php");
        exit();
    } else {

        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/inscription.css">

    <title>Connexion</title>
</head>

<body>
    <?php include 'header.php' ?>

    <header>


    </header>
    <section class="Principale">
        <div class="PrincipaleDiv">
            <!-- <div class="PageTitle">
                <h1>une petite paragraphe pour citer les gens à leur contacter</h1>
                ajouter du texte si besoin
            </div>------>

            <div class="message-box">
                <?php
                if (isset($message)) {
                    echo '<div class="success-message">' . $message . '</div>';
                }
                if (isset($error)) {
                    echo '<div class="error-message">' . $error . '</div>';
                }
                ?>
            </div>

            <form method="post" class="InscriptionForm">

                <div class="InscriptionTitle">
                    <h2>Connectez-vous!</h2>
                </div>

                <div class="Form-element">
                    <input type="email" placeholder="Email*" class="form-control" name="email" aria-describedby="emailHelp" value="<?= isset($data['EMAIL']) ? $data['EMAIL'] : '' ?>">
                    <label for="email"></label>
                </div>

                <div>
                    <input type="password" placeholder="Password*" class="form-control" name="mot_de_passe" aria-describedby="passwordHelp" value="<?= isset($data['MDP']) ? $data['MDP'] : '' ?>">
                    <label for="mot_de_passe"></label>
                </div>

                <button type="submit" name="validation">Connexion</button>
            </form>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>