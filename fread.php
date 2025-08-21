<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>fread()</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>La Fonction <code>fread()</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La fonction <code>fread()</code> lit un certain nombre d’octets depuis un fichier ouvert avec <code>fopen()</code>.
        <br>
        Elle est utile pour lire des fichiers binaires ou des morceaux précis de fichier.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>fread($handle, $length)</code> : lit au maximum <code>$length</code> octets depuis la ressource fichier.</li>
        <li>Retourne la chaîne lue ou <code>false</code> en cas d’erreur.</li>
        <li>Le pointeur du fichier avance après lecture.</li>
        <li>À combiner avec <code>filesize()</code> pour lire tout un fichier.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Lire tout un fichier</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo.txt", "r");
$contenu = fread($fichier, filesize("demo.txt"));
fclose($fichier);

echo $contenu;
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    // Création d’un fichier de test
    $demoFile = __DIR__ . "/demo_fread.txt";
    file_put_contents($demoFile, "Ligne 1\nLigne 2\nLigne 3\n");

    $fichier = fopen($demoFile, "r");
    $contenu = fread($fichier, filesize($demoFile));
    fclose($fichier);

    echo "<pre>" . htmlspecialchars($contenu) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 2 : Lire en morceaux</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo.txt", "r");
$part1 = fread($fichier, 6); // lit 6 octets
$part2 = fread($fichier, 6); // lit les 6 octets suivants
fclose($fichier);

echo $part1;
echo " | ";
echo $part2;
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fichier = fopen($demoFile, "r");
    $part1 = fread($fichier, 6);
    $part2 = fread($fichier, 6);
    fclose($fichier);

    echo "<pre>" . htmlspecialchars($part1) . " | " . htmlspecialchars($part2) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Lecture binaire</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo.bin", "wb");
fwrite($fichier, "ABCDEF");
fclose($fichier);

$fichier = fopen("demo.bin", "rb");
$data = fread($fichier, 3); // lit 3 octets binaires
fclose($fichier);

echo bin2hex($data); // affichage hexadécimal
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $binFile = __DIR__ . "/demo.bin";
    $fichier = fopen($binFile, "wb");
    fwrite($fichier, "ABCDEF");
    fclose($fichier);

    $fichier = fopen($binFile, "rb");
    $data = fread($fichier, 3);
    fclose($fichier);

    echo "<pre>" . htmlspecialchars(bin2hex($data)) . "</pre>";
    ?>

</body>

</html>
