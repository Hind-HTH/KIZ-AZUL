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
    <div class="Description"><br>
        <h1>welcome to the our Web Site <br><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h1><br>
        <H2 style="font-family: 'Courier New', Courier, monospace; font-size:19px"><br>Description<br><br></H2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni ut iusto provident, perspiciatis porro laborum laboriosam nisi delectus, illum maxime nulla ipsam quidem ea? Corporis beatae molestiae vitae aut suscipit.<br><br><br><br>
        </p>
    </div>

    <section class="Accueil">
        <div class="Photo">
            <img src="./Assets/images/3.jpg" alt="">
        </div>
        <div class="TextAccueil">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde necessitatibus dicta nihil id labore odio pariatur libero. Quod quasi eos saepe asperiores sed? Ipsam cumque repudiandae praesentium, optio hic ab!<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea inventore architecto magni aliquid quia velit sequi voluptatum deserunt facere reiciendis nam cum, harum excepturi distinctio libero eligendi, ipsum laudantium culpa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, cupiditate. Vitae ratione eius numquam fugit minima ab nisi modi obcaecati omnis rem! Officiis magni doloremque numquam porro dolorem veniam nobis.<br> <br> <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores alias doloremque mollitia! Maiores alias, exercitationem eius aliquam eveniet perspiciatis vitae vel, blanditiis libero architecto dolor. Blanditiis maiores dolore cupiditate libero.
            </p>
        </div>
    </section>

    <?php include 'footer.php' ?>
</body>

</html>