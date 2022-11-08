<?php
require_once './src/php/helpers/auth.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Accueil - Authentification avec PHP</title>

        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="./" class="active">Accueil</a>

                <?php if (!getAuthenticatedUserId()): ?>
                    <a href="./connexion.php">Connexion</a>
                <?php else: ?>
                    <a href="src/php/forms/deconnexion.php" onclick="return window.confirm('Êtes-vous sûr(e) ?')">Déconnexion</a>
                <?php endif; ?>

            </nav>
        </header>

        <main>
            <section>
                <?php if (getAuthenticatedUserPseudo()): ?>
                    <h1>Bonjour, <?php echo getAuthenticatedUserPseudo(); ?></h1>
                    <p>Tu as le rôle <?php echo getAuthenticatedUserRole(); ?></p>
                <?php else: ?>
                    <h1>Accueil</h1>
                <?php endif ?>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consectetur cupiditate debitis dolore eaque eos illum ipsa iste labore, natus nisi odio omnis perspiciatis quas repellat repudiandae tenetur unde voluptatum.</p>
            </section>
        </main>

        <footer>
            <p class="copyrights">©2022 ALIPTIC - Design: Nicolas Vauché</p>
        </footer>
    </body>
</html>
