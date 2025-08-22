<!DOCTYPE html> <!-- Indique que le document est en HTML5 -->
<html lang="fr"> <!-- Début du document HTML, langue principale : français -->

<head> <!-- En-tête du document (métadonnées, titre, CSS) -->
    <meta charset="UTF-8"> <!-- Encodage en UTF-8 pour gérer les accents/caractères spéciaux -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Compatibilité avec les moteurs IE récents -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive pour mobiles/tablettes -->
    <link rel="stylesheet" href="css/style.css"> <!-- Lien vers ta feuille de styles globale -->
    <title>Fonction imagedestroy() (PHP)</title> <!-- Titre de l’onglet du navigateur -->
</head>

<body> <!-- Contenu visible de la page -->
    <h1>La Fonction <code>imagedestroy()</code> (PHP)</h1> <!-- Titre principal de la page -->

    <h2>Description</h2> <!-- Sous-titre : description -->
    <p>
        La fonction <code>imagedestroy()</code> permet de libérer la mémoire associée à une image créée avec GD 
        (par exemple avec <code>imagecreate()</code> ou <code>imagecreatetruecolor()</code>). 
        <br>
        Elle est indispensable pour éviter une surcharge mémoire lorsque l’on manipule plusieurs images dans un script.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>imagedestroy($image)</code> : détruit une ressource image et libère la mémoire associée.</li>
        <li>Retourne <code>true</code> en cas de succès, <code>false</code> en cas d’échec.</li>
        <li>À utiliser après avoir sauvegardé ou affiché l’image (ex. avec <code>imagepng()</code>, <code>imagejpeg()</code>...).</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Création puis destruction d’une image</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
// Crée une image vide 100x50 pixels
$image = imagecreatetruecolor(100, 50);

// Définit une couleur (rouge)
$rouge = imagecolorallocate($image, 255, 0, 0);

// Remplit l’image en rouge
imagefill($image, 0, 0, $rouge);

// Sauvegarde l’image dans un fichier PNG
imagepng($image, "exemple.png");

// Libère la mémoire associée à l’image
imagedestroy($image);

echo "Image créée et mémoire libérée.";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    // Exemple PHP exécuté réellement
    $imgPath = __DIR__ . "/exemple.png"; // Fichier cible

    // Créer une image et l’enregistrer
    $image = imagecreatetruecolor(100, 50);
    $rouge = imagecolorallocate($image, 255, 0, 0);
    imagefill($image, 0, 0, $rouge);
    imagepng($image, $imgPath);

    // Libérer la mémoire
    imagedestroy($image);

    // Vérifier si le fichier a bien été créé
    if (file_exists($imgPath)) {
        echo "<p><strong>Image générée :</strong></p>";
        echo "<img src='exemple.png' alt='Exemple généré' style='border:1px solid #000'>";
    } else {
        echo "<p style='color:red'>Erreur : l’image n’a pas pu être générée.</p>";
    }
    ?>

    <hr>

    <h2>Exemple 2 : Plusieurs images dans une boucle</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
for ($i = 1; $i &lt;= 3; $i++) {
    $img = imagecreatetruecolor(60, 30);
    $couleur = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
    imagefill($img, 0, 0, $couleur);

    imagepng($img, "img_$i.png"); // Sauvegarde l’image

    imagedestroy($img); // Libère la mémoire à chaque itération
}
echo "3 images créées et mémoire nettoyée.";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    for ($i = 1; $i <= 3; $i++) {
        $imgFile = __DIR__ . "/img_$i.png";
        $img = imagecreatetruecolor(60, 30);
        $couleur = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
        imagefill($img, 0, 0, $couleur);
        imagepng($img, $imgFile);
        imagedestroy($img);

        echo "<img src='img_$i.png' alt='Image $i' style='margin:5px;border:1px solid #000'>";
    }
    ?>

</body>
</html>
