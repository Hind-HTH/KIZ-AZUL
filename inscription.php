
<?php
include("./Class/User.php");


$data = array(
    'SEX' => '',
    'NOM' => '',
    'PRENOM' => '',
    'EMAIL' => '',
    'MDP' => ''
);

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$usr = new User();


// if (isset($_GET['form']) && $_GET['form'] == "Ok") {
//     $color = "#093";
//     array_push($errors, "Merci " . $data['PRENOM'] . " " . $data['NOM'] . ", vos informations ont bien été validées.");
// }


$validation = 0; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';

    $estInscrit = $usr->estDejaInscrit($email);

    if ($estInscrit) {
        
        $error = "Cet utilisateur est déjà inscrit.";
    } else {
        $usr->inscrireUtilisateur($sex, $nom, $prenom, $email, $mot_de_passe);
        $message= "Inscription réussie !";
    }

    if ($validation == "1") {
        if (empty($sex) || empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe)) {
            $iserror = 1;

            if (empty($sex)) {
                echo '<style>input[name="sex"] + label:before  {border-color: #FF0000 !important;}</style>';
            }

            if (empty($nom)) {
                echo '<style>input[name="nom"] {border-color: #FF0000 !important;}</style>';
            }

            if (empty($prenom)) {
                echo '<style>input[name="prenom"] {border-color: #FF0000 !important;}</style>';
            }

            if (empty($email)) {
                echo '<style>input[name="email"] {border-color: #FF0000 !important;}</style>';
            }

            if (empty($mot_de_passe)) {
                echo '<style>input[name="mot_de_passe"] {border-color: #FF0000 !important;}</style>';
            }
        }

        $usr->inscrireUtilisateur($sex, $nom, $prenom, $email, $mot_de_passe);
    }


    $data['SEX'] = $sex;
    $data['NOM'] = $nom;
    $data['PRENOM'] = $prenom;
    $data['EMAIL'] = $email;
    $data['MDP'] = $mot_de_passe;

    header('Location:login.php');
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
                        <input type="radio" placeholder="Sex*" class="form-control" name="sex" value="mme" <?php if ($data['SEX'] == "mme") echo 'checked'; ?> required>
                        <label for="mme">Mme</label>
                    </div>

                    <div class="Form-element">
                        <input type="radio" placeholder="Sex*" class="form-control" name="sex" value="mr" <?php if ($data['SEX'] == "mr") echo 'checked'; ?>required>
                        <label for="mr">Mr</label>
                    </div>
                </div>


                <div class="Form-element">
                    <input type="text" placeholder="Nom*" class="form-control"  name="nom" aria-describedby="emailHelp" value="<?= isset($data['NOM']) ? $data['NOM'] : '' ?>" required>
                    <label for="nom"></label>
                </div>

                <div class="Form-element">
                    <input type="text" placeholder="Prénom*" class="form-control"  name="prenom" aria-describedby="emailHelp" value="<?= isset($data['PRENOM']) ? $data['PRENOM'] : '' ?>" required>
                    <label for="prenom"></label>
                </div>
                <div class="Form-element">
                    <input type="email" placeholder="Email*" class="form-control"  name="email" aria-describedby="emailHelp" value="<?= isset($data['EMAIL']) ? $data['EMAIL'] :'' ?>" required>
                    <label for="email"></label>
                </div>

                <div>
                    <input type="password" placeholder="Password*" class="form-control"  name="mot-de-passe" aria-describedby="passwordHelp" value="<?= isset($data['MDP']) ? $data['MDP'] : '' ?>" required>
                    <label for="mot-de-passe"></label>
                </div>

                <button type="submit">M'inscrire</button>
            </form>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>
</html>