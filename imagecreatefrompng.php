<!DOCTYPE html> <!-- Déclare un document HTML5 -->
<html lang="fr"> <!-- Balise racine, langue du document = français -->

<head> <!-- En-tête du document : métadonnées, titre, CSS -->
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mise à l'échelle sur mobile -->
    <link rel="stylesheet" href="css/style.css"> 
    <title>Fonction imagecreatefrompng() (PHP)</title> 
</head>

<body> <!-- Début du contenu visible -->
    <h1>La Fonction <code>imagecreatefrompng()</code> (PHP)</h1> <!-- Titre principal -->

    <h2>Description</h2> <!-- Sous-titre description -->
    <p> <!-- Paragraphe d'explication -->
        <code>imagecreatefrompng()</code> ouvre un fichier PNG et retourne une ressource image GD <!-- Résumé du rôle -->
        que l’on peut manipuler (dessiner, redimensionner, copier…). <!-- Précision sur l'utilisation -->
        Assure-toi que l’extension <code>GD</code> est activée. <!-- Pré-requis technique -->
    </p>

    <h2>MÉMO</h2> <!-- Sous-titre mémo -->
    <ul> <!-- Liste des points clés -->
        <li><code>$img = imagecreatefrompng($fichier)</code> : charge un fichier PNG en mémoire.</li> <!-- API principale -->
        <li>Retourne une ressource image ou <code>false</code> en cas d’erreur.</li> <!-- Valeur de retour -->
        <li>Nécessite l’extension <code>GD</code> activée dans PHP.</li> <!-- Pré-requis -->
        <li>Libérer la ressource avec <code>imagedestroy($img)</code> après usage.</li> <!-- Bonne pratique mémoire -->
    </ul> <!-- Fin liste -->

    <hr> <!-- Séparateur visuel -->

    <h2>Exemple 1 : Charger un PNG et l’afficher (explications seulement)</h2> <!-- Titre exemple 1 -->
    <h3>Code</h3> <!-- Sous-titre code -->
    <pre> <!-- Bloc où on AFFICHE le code (non exécuté ici) -->
&lt;?php
$img = imagecreatefrompng("logo.png");  // Ouvrir un PNG existant (chemin relatif ou absolu)
header("Content-Type: image/png");      // Dire au navigateur qu'on envoie une image PNG
imagepng($img);                         // Envoyer l'image au navigateur (affichage)
imagedestroy($img);                     // Libérer la ressource mémoire
?&gt;
    </pre> <!-- Fin du bloc affichage code -->
    <p><!-- Note pédagogique -->
        Cet exemple enverrait directement l’image au navigateur (page = image). <!-- Explication -->
        Ici on ne l’exécute pas pour ne pas casser l’HTML de cette page. <!-- Pourquoi non exécuté -->
    </p>

    <hr> <!-- Séparateur -->

    <h2>Exemple 2 : Créer un PNG, puis le recharger avec <code>imagecreatefrompng()</code></h2> <!-- Titre exemple 2 -->
    <h3>Code</h3> <!-- Sous-titre code -->
    <pre> <!-- Bloc affichage code (non exécuté) -->
&lt;?php
// 1) Créer un petit PNG rouge 100x100
$img1 = imagecreatetruecolor(100, 100);        // Crée une image "true color"
$rouge = imagecolorallocate($img1, 255, 0, 0); // Alloue la couleur rouge
imagefill($img1, 0, 0, $rouge);                // Remplit toute l'image de rouge
imagepng($img1, "rouge.png");                  // Sauvegarde sur disque
imagedestroy($img1);                           // Libère la ressource

// 2) Recharger le PNG depuis le disque
$img2 = imagecreatefrompng("rouge.png");       // Charge l'image en mémoire

// 3) Sauvegarder une copie
imagepng($img2, "rouge_copy.png");             // Écrit une copie sur disque
imagedestroy($img2);                           // Libère la ressource
?&gt;
    </pre> <!-- Fin bloc affichage code -->

    <h3>Résultat</h3> <!-- Sous-titre résultat -->
    <?php
    // ----- Partie exécutée réellement pour la démo -----

    // 1) Définir les chemins de fichiers dans le dossier de cette page
    $pngFile = __DIR__ . "/rouge.png";       // Fichier PNG original à créer
    $copyFile = __DIR__ . "/rouge_copy.png"; // Fichier PNG copie

    // 2) Créer une image "true color" 100x100 en mémoire
    $img1 = imagecreatetruecolor(100, 100); // Ressource image GD (true color)

    // 3) Allouer une couleur rouge (RGB 255,0,0)
    $rouge = imagecolorallocate($img1, 255, 0, 0); // Couleur utilisée pour remplir

    // 4) Remplir l'image entière en rouge
    imagefill($img1, 0, 0, $rouge); // (x=0,y=0) comme point de départ

    // 5) Sauvegarder l'image rouge sur disque
    imagepng($img1, $pngFile); // Écrit un fichier PNG "rouge.png"

    // 6) Libérer la ressource de l'image créée
    imagedestroy($img1); // Bonne pratique pour éviter les fuites mémoire

    // 7) Recharger le PNG fraîchement créé
    $img2 = imagecreatefrompng($pngFile); // Retourne une ressource image ou false

    // 8) Sauvegarder une copie du PNG chargé
    imagepng($img2, $copyFile); // Écrit "rouge_copy.png" sur disque

    // 9) Libérer la ressource rechargée
    imagedestroy($img2); // Fin de l'utilisation

    // 10) Feedback utilisateur (affichage HTML)
    echo "<p>Deux fichiers créés : <code>rouge.png</code> et <code>rouge_copy.png</code>.</p>"; // Message de confirmation

    // 11) Si les fichiers existent, on affiche des tags <img> pour visualiser
    if (is_file($pngFile)) { // Vérifie l'existence du fichier original
        echo '<p>Original : <img src="rouge.png" alt="PNG rouge" width="100" height="100"></p>'; // Affiche l'image
    }
    if (is_file($copyFile)) { // Vérifie l'existence de la copie
        echo '<p>Copie : <img src="rouge_copy.png" alt="Copie PNG rouge" width="100" height="100"></p>'; // Affiche la copie
    }
    // ----- Fin de la démo exécutée -----
    ?>

    <hr> <!-- Séparateur -->

    <h2>Bonnes pratiques / erreurs fréquentes</h2> <!-- Sous-titre bonnes pratiques -->
    <ul> <!-- Liste conseils -->
        <li>Vérifier que le chemin du fichier PNG est correct (relatif/absolu).</li> <!-- Chemins -->
        <li>Tester le retour de <code>imagecreatefrompng()</code> (peut être <code>false</code>).</li> <!-- Gestion d'erreur -->
        <li>Appeler <code>imagedestroy()</code> après usage pour libérer la mémoire.</li> <!-- Mémoire -->
        <li>S’assurer que l’extension <code>GD</code> est installée/activée (<code>php -m</code> ou <code>phpinfo()</code>).</li> <!-- GD -->
        <li>Ne pas envoyer d’HTML si vous faites un <code>header("Content-Type: image/png")</code> (page = image brute).</li> <!-- Headers -->
    </ul> <!-- Fin liste -->

</body> <!-- Fin contenu visible -->
</html> <!-- Fin du document -->
