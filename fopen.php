<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>fopen()</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>La Fonction <code>fopen()</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La fonction <code>fopen()</code> ouvre un fichier ou une URL et retourne une ressource de type <code>file handle</code>.
        <br>
        Elle est souvent utilisée avec <code>fread()</code>, <code>fgets()</code>, <code>fwrite()</code>, et <code>fclose()</code>.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>fopen($fichier, $mode)</code> : ouvre un fichier.</li>
        <li>Modes fréquents :
            <ul>
                <li><code>r</code> : lecture seule</li>
                <li><code>w</code> : écriture seule (vide le fichier ou le crée)</li>
                <li><code>a</code> : ajout (append)</li>
                <li><code>r+</code> : lecture/écriture</li>
                <li><code>b</code> : mode binaire (ex : <code>rb</code>, <code>wb</code>)</li>
            </ul>
        </li>
        <li>Retourne <code>false</code> en cas d’échec.</li>
        <li>Pensez à fermer avec <code>fclose()</code>.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Lecture d’un fichier ligne par ligne</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo.txt", "r");
if ($fichier) {
    while (($ligne = fgets($fichier)) !== false) {
        echo $ligne;
    }
    fclose($fichier);
} else {
    echo "Impossible d’ouvrir le fichier.";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    // Création d’un petit fichier de démo
    $demoFile = __DIR__ . "/demo.txt";
    file_put_contents($demoFile, "Ligne 1\nLigne 2\nLigne 3\n");

    $fichier = fopen($demoFile, "r");
    echo "<pre>";
    if ($fichier) {
        while (($ligne = fgets($fichier)) !== false) {
            echo htmlspecialchars($ligne);
        }
        fclose($fichier);
    } else {
        echo "Impossible d’ouvrir le fichier.";
    }
    echo "</pre>";
    ?>

    <hr>

    <h2>Exemple 2 : Écriture dans un fichier</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo_write.txt", "w");
if ($fichier) {
    fwrite($fichier, "Bonjour\n");
    fwrite($fichier, "Deuxième ligne\n");
    fclose($fichier);
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $writeFile = __DIR__ . "/demo_write.txt";
    $fichier = fopen($writeFile, "w");
    if ($fichier) {
        fwrite($fichier, "Bonjour\n");
        fwrite($fichier, "Deuxième ligne\n");
        fclose($fichier);
    }
    echo "<pre>" . htmlspecialchars(file_get_contents($writeFile)) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Ajout (append)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = fopen("demo_write.txt", "a");
if ($fichier) {
    fwrite($fichier, "Nouvelle ligne ajoutée\n");
    fclose($fichier);
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fichier = fopen($writeFile, "a");
    if ($fichier) {
        fwrite($fichier, "Nouvelle ligne ajoutée\n");
        fclose($fichier);
    }
    echo "<pre>" . htmlspecialchars(file_get_contents($writeFile)) . "</pre>";
    ?>

</body>

</html>
