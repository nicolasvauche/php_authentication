<?php
require_once './src/php/helpers/auth.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Modifier le contenu - Authentification avec PHP</title>

        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="./">Accueil</a>

                <?php if (!getAuthenticatedUserId()): ?>
                    <a href="./connexion.php">Connexion</a>
                <?php else: ?>
                    <a href="src/php/forms/deconnexion.php" onclick="return window.confirm('Êtes-vous sûr(e) ?')">Déconnexion</a>
                <?php endif; ?>

            </nav>
        </header>

        <main>
            <section>
                <h1>Modifier le contenu</h1>
            </section>

            <section>
                <form action="" method="post">
                    <div>
                        <label for="contentTitle" class="required">Titre du contenu</label>
                        <input type="text" name="title" id="contentTitle" value="Le contenu" required />
                        <p class="error">Titre invalide</p>
                    </div>
                    <div>
                        <label for="contentText" class="required">Texte du contenu</label>
                        <textarea name="text" id="contentText" rows="4" required>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consectetur cupiditate debitis dolore eaque eos illum ipsa iste labore, natus nisi odio omnis perspiciatis quas repellat repudiandae tenetur unde voluptatum.
                        </textarea>
                        <p class="error">Texte invalide</p>
                    </div>
                    <div>
                        <button type="submit">J'enregistre &raquo;</button>
                    </div>
                </form>
            </section>
        </main>

        <footer>
            <p class="copyrights">©2022 ALIPTIC - Designed with ❤️ by Nicolas Vauché</p>
        </footer>
    </body>
</html>
