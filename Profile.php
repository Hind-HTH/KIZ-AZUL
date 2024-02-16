<?php
require_once './class/User.php';
require_once './Session.php';

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['codePostale'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codePostale = $_POST['codePostale'];
        $photo_path = $_FILES['fileToUpload']['name'];
        $_SESSION['image'] = $photo_path;
        $user->updateProfile($_SESSION['id_user'], $nom, $prenom, $tel, $adresse, $ville, $codePostale, $photo_path);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/profile.css">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php' ?>
    <header>

    </header>

    <section class="Principale" style="display: flex; flex-direction:row">

        <div class="PrincipaleDiv">

            <form method="post" class="ProfileForm" enctype="multipart/form-data">

                <div>
                    <img src="<?= isset($_SESSION['image']) ? "./uploads/" . $_SESSION['image'] : "./Assets/images/3.jpg" ?>" alt="Photo de profil" class="profile-photo" id="profile-photo">
                    <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;">
                </div>


                <div class="ProfileTitle">
                    <h2>Modifiez les informations de votre Profile <?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h2>
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
                    <input type="text" placeholder="Adresse*" class="form-control" name="adresse" value="<?= isset($data['ADRESSE']) ? $data['ADRESSE'] : '' ?>">
                    <label for="adresse"></label>
                </div>

                <div>
                    <input type="text" placeholder="Ville*" class="form-control" name="ville" value="<?= isset($data['VILLE']) ? $data['VILLE'] : '' ?>">
                    <label for="ville"></label>
                </div>

                <div>
                    <input type="text" placeholder="Code Postale*" class="form-control" name="codePostale" a value="<?= isset($data['CODE_POSTALE']) ? $data['CODE_POSTALE'] : '' ?>">
                    <label for="mot_de_passe"></label>
                </div>
                <button type="submit" name="validation">Enregistrer</button>
            </form>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        var profilePhoto = document.getElementById("profile-photo");
        var fileInput = document.getElementById("fileToUpload");

        profilePhoto.addEventListener("click", function() {
            fileInput.click();
        });

        fileInput.addEventListener("change", function() {
            var formData = new FormData();
            formData.append("fileToUpload", fileInput.files[0]);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "upload.php", true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Si l'upload est réussi, changez la source de l'image
                    profilePhoto.src = "./uploads/" + fileInput.files[0].name;
                } else {
                    alert("Une erreur est survenue lors de l'upload.");
                }
            };

            xhr.send(formData);
        });
    });
</script>