<?php
require_once './Session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>NavBar</title>
</head>

<body>
    <nav class="navbar">
        <a href="#" class="logo">Logo</a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php">Home </a></li>
                <li class="pres"><a>Prestations <i class="fa fa-angle-double-down"></i></a>

                    <div>
                        <ul class="drop-down">
                            <li><a href="A.php">Garde-enfants</a></li>
                            <li><a href="B.php">Ménage</a></li>
                            <li><a href="C.php">Repassage</a></li>
                        </ul>
                    </div>
                </li>
                <!--debut contact--->
                <?php if (!isset($_SESSION["nom"], $_SESSION["prenom"])) : ?>
                <?php else : ?>
                    <li><a href="contact.php">Contact</a></li>
                <?php endif; ?>
                <!--Fin contact--->
                <li><a href="infos.php">Infos Supp</a></li>

                <div>
                    <!-- <button class="inscription-login"><a href="inscription.php">M'inscrire</a></button>
                    <button class="inscription-login"><a href="login.php">Connexion</a></button> -->

                    <?php if (!isset($_SESSION["nom"], $_SESSION["prenom"])) : ?>
                        <button class="inscription-login"><a href="inscription.php">M'inscrire</a></button>
                        <button class="inscription-login"><a href="login.php">Connexion</a></button>
                    <?php else : ?>
                        <button class="inscription-login">
                            <a href="Profile.php">
                                <i class="fa-solid fa-user"></i>
                                <span class="user-name"><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></span>
                            </a>
                        </button>

                        <button class="inscription-login"><a href="logout.php">Déconnexion</a></button>
                    <?php endif; ?>
                </div>
            </ul>
        </div>
        <img class="menu-hamburger" src="./Assets/images/hamburger-menu-icon.jpg" alt="menu hamburger">
    </nav>
    <!-- <header>
        
    </header> -->
</body>

<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".nav-links")

    menuHamburger.addEventListener('click', () => {
        navLinks.classList.toggle('mobile-menu')
    })
</script>

<script>
    // Obtenez l'URL de la page actuelle
    var currentPage = window.location.href;

    // Sélectionnez tous les liens dans le menu
    var menuLinks = document.querySelectorAll('.nav-links ul li a');

    // Parcourez les liens et ajoutez la classe "active" à celui correspondant à la page actuelle
    for (var i = 0; i < menuLinks.length; i++) {
        if (menuLinks[i].href === currentPage) {
            menuLinks[i].parentNode.classList.add('active');
            break; // Arrêtez la boucle une fois que vous avez trouvé le lien correspondant
        }
    }
</script>

</html>