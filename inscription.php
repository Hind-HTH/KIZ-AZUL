<?php
require_once './class/User.php';

$user = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $sex = $_POST['sex'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

    if ($mot_de_passe !== $confirm_mot_de_passe) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        if ($user->estDejaInscrit($email)) {
            $error = "Cet email est déjà utilisé. Veuillez choisir un autre email.";
        } else {
            $user->inscrireUtilisateur($sex, $nom, $prenom, $email, $mot_de_passe);
            $message = "Inscription réussie!";
          
            header("Location: inscription.php");
            exit();
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/inscription.css">
    
    <title>Inscription</title>
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
                    <h2>Inscrivez-vous!</h2>
                </div>

                <div class="radioDiv">
                    <div class="Form-element radio-label">
                        <h3>Pouvez-vous choisir votre sex:</h3>
                    </div>
                    <div class="Form-element">
                        <input type="radio" placeholder="Sex*" class="form-control" name="sex" value="mme" <?php if ($data['SEX'] == "mme") echo 'checked'; ?> >
                        <label for="mme">Mme</label>
                    </div>

                    <div class="Form-element">
                        <input type="radio" placeholder="Sex*" class="form-control" name="sex" value="mr" <?php if ($data['SEX'] == "mr") echo 'checked'; ?>>
                        <label for="mr">Mr</label>
                    </div>
                </div>


                <div class="Form-element">
                    <input type="text" placeholder="Nom*" class="form-control"  name="nom" aria-describedby="emailHelp" value="<?= isset($data['NOM']) ? $data['NOM'] : '' ?>" >
                    <label for="nom"></label>
                </div>

                <div class="Form-element">
                    <input type="text" placeholder="Prénom*" class="form-control"  name="prenom" aria-describedby="emailHelp" value="<?= isset($data['PRENOM']) ? $data['PRENOM'] : '' ?>" >
                    <label for="prenom"></label>
                </div>
                <div class="Form-element">
                    <input type="email" placeholder="Email*" class="form-control"  name="email" aria-describedby="emailHelp" value="<?= isset($data['EMAIL']) ? $data['EMAIL'] :'' ?>" >
                    <label for="email"></label>
                </div>

                <div>
                    <input type="password" placeholder="Password*" class="form-control"  name="mot_de_passe" aria-describedby="passwordHelp" value="<?= isset($data['MDP']) ? $data['MDP'] : '' ?>" >
                    <label for="mot_de_passe"></label>
                </div>

                <div>
                    <input type="password" placeholder="Repass*" class="form-control"  name="confirm_mot_de_passe" aria-describedby="passwordHelp" value="<?= isset($data['MDPC']) ? $data['MDPC'] : '' ?>" >
                    <label for="confirm_mot_de_passe"></label>
                </div>

                <button type="submit" name="validation">M'inscrire</button>
            </form>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>
</html>