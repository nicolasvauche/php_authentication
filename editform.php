<?php
require_once './src/php/classes/Content.php';

$formData = $_POST;

// Validation & nettoyage des données POST


// Modification du contenu en BDD
$contentModel = new Content();
$updatedContent = $contentModel->updateContent($formData);

if ($updatedContent) {
    Header('Location: ./');
} else {
    Header('Location: ./contenu.php?errors=true');
}
