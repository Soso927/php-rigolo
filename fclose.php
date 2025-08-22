<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fonction <code>fclose()</code> (PHP)</title>
</head>

<body>
    <h1>La Fonction <code>fclose()</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La fonction <code>fclose()</code> ferme un pointeur de fichier ouvert avec <code>fopen()</code>.
        <br>
        Elle libère la ressource associée et assure que toutes les données en mémoire tampon sont bien écrites dans le fichier.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>fclose($handle)</code> : ferme la ressource fichier ouverte.</li>
        <li>Retourne <code>true</code> en cas de succès, <code>false</code> en cas d’échec.</li>
        <li>Important : toujours fermer un fichier après utilisation pour libérer la ressource.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Fermeture d’un fichier après écriture</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$f = fopen("demo_close.txt", "w");
fwrite($f, "Texte ajouté");
$result = fclose($f);

var_dump($result); // true si succès
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $file1 = __DIR__ . "/demo_close.txt";
    $f = fopen($file1, "w");
    fwrite($f, "Texte ajouté");
    $result = fclose($f);

    echo "<pre>Résultat de fclose() : ";
    var_dump($result);
    echo "</pre>";
    ?>

    <hr>

    <h2>Exemple 2 : Vérifier la fermeture d’un fichier en lecture</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$f = fopen("demo_close.txt", "r");
$contenu = fread($f, filesize("demo_close.txt"));
fclose($f);

echo $contenu;
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $f = fopen($file1, "r");
    $contenu = fread($f, filesize($file1));
    fclose($f);

    echo "<pre>" . htmlspecialchars($contenu) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Bonne pratique avec if()</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$f = fopen("demo_close2.txt", "w");
if ($f) {
    fwrite($f, "Toujours fermer un fichier après usage !");
    if (fclose($f)) {
        echo "Fermeture réussie.";
    } else {
        echo "Erreur lors de la fermeture.";
    }
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $file2 = __DIR__ . "/demo_close2.txt";
    $f = fopen($file2, "w");
    if ($f) {
        fwrite($f, "Toujours fermer un fichier après usage !");
        if (fclose($f)) {
            echo "<pre>Fermeture réussie.</pre>";
        } else {
            echo "<pre>Erreur lors de la fermeture.</pre>";
        }
    }
    ?>

</body>
</html>
