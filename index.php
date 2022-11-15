<?php
require_once './src/php/helpers/auth.php';
require_once './src/php/classes/Content.php';
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
                    <h1>Bonjour, <?php echo ucwords(getAuthenticatedUserPseudo()); ?></h1>
                    <p>
                        Tu es connecté(e) avec le compte
                        <strong><?php echo getAuthenticatedUserEmail(); ?></strong>
                        et tu as le rôle
                        <strong><?php echo getAuthenticatedUserRole(); ?></strong>
                    </p>
                <?php else: ?>
                    <h1>Accueil</h1>
                    <p>Vous n'êtes pas connecté(e), vous n'avez pas accès au contenu du site.</p>
                    <p>
                        <a href="./connexion.php">
                            <strong>Je me connecte</strong>
                        </a>
                    </p>
                <?php endif ?>
            </section>

            <?php if (getAuthenticatedUserId()): ?>
                <?php $contentModel = new Content('./src/php/classes/Bdd.php'); ?>
                <?php $content = $contentModel->getContent(); ?>
                <?php if ($content): ?>
                    <section>
                        <h2><?php echo $content['title']; ?></h2>
                        <p><?php echo $content['text']; ?></p>
                        <p>
                            <?php if (isAdmin()): ?>
                                <a href="contenu.php">
                                    <strong>Tu peux modifier le contenu</strong>
                                </a>
                                <br />
                                <a href="contenu.php?id=<?php echo $content['id']; ?>" onclick="return window.confirm('Es-tu sûr ?')">
                                    <strong>Tu peux supprimer le contenu</strong>
                                </a>
                            <?php else: ?>
                                <small>(Tu ne peux pas modifier le contenu)</small>
                            <?php endif; ?>
                        </p>
                    </section>
                <?php else: ?>
                    <section>
                        <h2>Aucun contenu</h2>
                        <p>
                            <?php if (isAdmin()): ?>
                                <a href="contenu.php">
                                    <strong>Tu peux ajouter du contenu</strong>
                                </a>
                            <?php else: ?>
                                <small>(Tu ne peux pas gérer le contenu)</small>
                            <?php endif; ?>
                        </p>
                    </section>
                <?php endif; ?>
            <?php endif ?>
        </main>

        <footer>
            <p class="copyrights">©2022 ALIPTIC - Designed with ❤️ by Nicolas Vauché</p>
        </footer>
    </body>
</html>
