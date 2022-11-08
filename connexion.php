<?php
require_once './src/php/helpers/auth.php';

if (getAuthenticatedUserId()) {
    Header('Location: ./');
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Connexion - Authentification avec PHP</title>

        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="./">Accueil</a>
                <a href="./connexion.php" class="active">Connexion</a>
            </nav>
        </header>

        <main>
            <section>
                <h1>Connexion</h1>
                <form action="src/php/forms/loginform.php" method="post">
                    <div>
                        <label for="userEmail" class="required">Adresse e-mail</label>
                        <input type="email" name="email" id="userEmail" required />
                        <p class="error">Adresse e-mail invalide</p>
                    </div>
                    <div>
                        <label for="userPassword" class="required">Mot de passe</label>
                        <input type="password" name="password" id="userPassword" required />
                        <p class="error">Mot de passe invalide</p>
                    </div>
                    <div>
                        <button type="submit">Je me connecte &raquo;</button>
                    </div>
                </form>
            </section>
        </main>

        <footer>
            <p class="copyrights">©2022 ALIPTIC - Design: Nicolas Vauché</p>
        </footer>
    </body>
</html>
