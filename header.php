<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Menu.css">
    <title>NavBar</title>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">Logo</a>
        <div class="nav-links">
            <ul>
                <li ><a href="index.php">Home</a></li>
                <li><a href="prestations.php">Prestations</a>
                    <!-- <div class="drop-down">
                        <ul>
                        <li><a href="A.php">A</a></li>
                        <li><a href="B.php">B</a></li>
                        <li><a href="C.php">C</a></li>
                        </ul>
                    </div>  -->
                </li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="infos.php">Infos Supp</a></li>
            </ul>
        </div>
        <img class="menu-hamburger" src="./Assets/images/hamburger-menu-icon.jpg" alt="menu hamburger">
    </nav>
    <header>
        
    </header>
</body>

<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".nav-links")
 
    menuHamburger.addEventListener('click',()=>{
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