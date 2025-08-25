<!DOCTYPE html> <!-- Indique que le document est en HTML5 -->
<html lang="fr"> <!-- Début du document HTML, langue principale : français -->

<head> <!-- En-tête du document (métadonnées, titre, CSS) -->
    <meta charset="UTF-8"> <!-- Encodage en UTF-8 pour gérer les accents/caractères spéciaux -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Compatibilité avec les moteurs IE récents -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive pour mobiles/tablettes -->
    <link rel="stylesheet" href="css/style.css"> <!-- Lien vers ta feuille de styles globale -->
    <title>Fonction imagejpeg() (PHP)</title> <!-- Titre de l’onglet du navigateur -->
</head>

<body> <!-- Contenu visible de la page -->
    <h1>La Fonction <code>imagejpeg()</code> (PHP)</h1> <!-- Titre principal de la page -->

    <h2>Description</h2>
    <p>
        La fonction <code>imagejpeg()</code> permet d’enregistrer une image au format JPEG 
        (ou de l’envoyer directement au navigateur).  
        <br>
        Elle est très utilisée pour générer des miniatures, des captures ou optimiser le poids des images.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>imagejpeg($image)</code> : envoie l’image JPEG directement au navigateur.</li>
        <li><code>imagejpeg($image, $fichier)</code> : sauvegarde l’image dans un fichier.</li>
        <li><code>imagejpeg($image, $fichier, $qualité)</code> : qualité entre 0 (pire) et 100 (meilleure, par défaut 75).</li>
        <li>Retourne <code>true</code> en cas de succès, <code>false</code> sinon.</li>
        <li>À combiner avec <code>imagedestroy()</code> pour libérer la mémoire après usage.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Envoi direct au navigateur</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
// Crée une image simple
$image = imagecreatetruecolor(200, 100);
$bleu = imagecolorallocate($image, 0, 0, 255);
imagefill($image, 0, 0, $bleu);

// Envoi au navigateur sous forme JPEG
header("Content-Type: image/jpeg");
imagejpeg($image);

// Libération mémoire
imagedestroy($image);
?&gt;
    </pre>

    <h3>Explication</h3>
    <p>
        Ici, l’image est directement envoyée au navigateur (aucun fichier n’est créé).  
        <strong>⚠️ Attention :</strong> Il ne faut rien afficher avant <code>header()</code>, sinon erreur.
    </p>

    <hr>

    <h2>Exemple 2 : Sauvegarde dans un fichier avec qualité</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$image = imagecreatetruecolor(200, 100);

// Ajout d’une couleur aléatoire
$couleur = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
imagefill($image, 0, 0, $couleur);

// Sauvegarde avec qualité réduite (50)
imagejpeg($image, "exemple_quality.jpg", 50);

// Libère la mémoire
imagedestroy($image);

echo "Image enregistrée avec qualité 50%.";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $jpegPath = __DIR__ . "/exemple_quality.jpg";

    $image = imagecreatetruecolor(200, 100);
    $couleur = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
    imagefill($image, 0, 0, $couleur);

    imagejpeg($image, $jpegPath, 50);
    imagedestroy($image);

    if (file_exists($jpegPath)) {
        echo "<p><strong>Image générée avec qualité 50% :</strong></p>";
        echo "<img src='exemple_quality.jpg' alt='Exemple JPEG' style='border:1px solid #000'>";
    } else {
        echo "<p style='color:red'>Erreur : image non générée.</p>";
    }
    ?>

    <hr>

    <h2>Exemple 3 : Génération de plusieurs JPEG</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
for ($i = 1; $i &lt;= 3; $i++) {
    $img = imagecreatetruecolor(100, 60);
    $couleur = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
    imagefill($img, 0, 0, $couleur);

    imagejpeg($img, "mini_$i.jpg", 80); // Sauvegarde qualité 80

    imagedestroy($img);
}
echo "3 images JPEG générées.";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    for ($i = 1; $i <= 3; $i++) {
        $miniFile = __DIR__ . "/mini_$i.jpg";
        $img = imagecreatetruecolor(100, 60);
        $c = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
        imagefill($img, 0, 0, $c);
        imagejpeg($img, $miniFile, 80);
        imagedestroy($img);

        echo "<img src='mini_$i.jpg' alt='Mini $i' style='margin:5px;border:1px solid #000'>";
    }
    ?>

</body>
</html>
