<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fonction <code>filesize()</code> (PHP)</title>
</head>

<body>
    <h1>La Fonction <code>filesize()</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La fonction <code>filesize()</code> retourne la taille d’un fichier en octets.
        <br>
        Elle est souvent utilisée avant un <code>fread()</code> pour lire un fichier complet.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>filesize($fichier)</code> : retourne la taille en octets du fichier.</li>
        <li>Retourne <code>false</code> en cas d’erreur (par ex. si le fichier n’existe pas).</li>
        <li>Fonctionne uniquement sur des fichiers normaux (pas sur des répertoires).</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Taille d’un fichier texte</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
file_put_contents("demo_size.txt", "Bonjour\nDeuxième ligne");
echo filesize("demo_size.txt");
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $file1 = __DIR__ . "/demo_size.txt";
    file_put_contents($file1, "Bonjour\nDeuxième ligne");
    echo "<pre>" . filesize($file1) . " octets</pre>";
    ?>

    <hr>

    <h2>Exemple 2 : Utilisation avec fread()</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo_size.txt", "r");
$contenu = fread($fichier, filesize("demo_size.txt"));
fclose($fichier);

echo $contenu;
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fichier = fopen($file1, "r");
    $contenu = fread($fichier, filesize($file1));
    fclose($fichier);
    echo "<pre>" . htmlspecialchars($contenu) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Vérifier avant traitement</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = "demo_inexistant.txt";
if (file_exists($fichier)) {
    echo "Taille : " . filesize($fichier) . " octets";
} else {
    echo "Le fichier n'existe pas.";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fichier = __DIR__ . "/demo_inexistant.txt";
    if (file_exists($fichier)) {
        echo "<pre>Taille : " . filesize($fichier) . " octets</pre>";
    } else {
        echo "<pre>Le fichier n'existe pas.</pre>";
    }
    ?>

</body>
</html>
