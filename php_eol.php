<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constante <code>PHP_EOL</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>La Constante <code>PHP_EOL</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La constante <code>PHP_EOL</code> représente le caractère de fin de ligne (End Of Line) selon le système d’exploitation.  
        <br>
        Cela permet d’écrire du code portable qui fonctionne correctement sur Windows, Linux ou macOS.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li>Sur Linux / macOS : <code>PHP_EOL</code> = "\n"</li>
        <li>Sur Windows : <code>PHP_EOL</code> = "\r\n"</li>
        <li>Utile pour générer du texte dans des fichiers, logs, ou sorties console.</li>
        <li>En HTML, <code>PHP_EOL</code> ne provoque pas de saut de ligne visible (utiliser &lt;br&gt; ou &lt;pre&gt;).</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Affichage en console</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
echo "Ligne 1" . PHP_EOL;
echo "Ligne 2" . PHP_EOL;
?&gt;
    </pre>

    <h3>Résultat</h3>
    <pre>
<?php
echo "Ligne 1" . PHP_EOL;
echo "Ligne 2" . PHP_EOL;
?>
    </pre>
    <p><em>(Ici, dans le navigateur, les sauts de ligne ne s’affichent pas forcément. En console, chaque ligne serait distincte.)</em></p>

    <hr>

    <h2>Exemple 2 : Écriture dans un fichier texte</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fichier = "sortie.txt";
$texte = "Ligne A" . PHP_EOL . "Ligne B" . PHP_EOL;
file_put_contents($fichier, $texte);

echo "Fichier généré : $fichier";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fichier = __DIR__ . "/sortie_demo.txt";
    $texte = "Ligne A" . PHP_EOL . "Ligne B" . PHP_EOL;
    file_put_contents($fichier, $texte);
    echo "<p>Fichier généré : <code>$fichier</code></p>";
    echo "<pre>" . htmlspecialchars(file_get_contents($fichier)) . "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Comparaison avec "\\n"</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
if (PHP_EOL === "\n") {
    echo "Nous sommes probablement sur Linux/macOS";
} elseif (PHP_EOL === "\r\n") {
    echo "Nous sommes probablement sur Windows";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    if (PHP_EOL === "\n") {
        echo "<p>Nous sommes probablement sur Linux/macOS</p>";
    } elseif (PHP_EOL === "\r\n") {
        echo "<p>Nous sommes probablement sur Windows</p>";
    } else {
        echo "<p>Autre environnement détecté</p>";
    }
    ?>

</body>

</html>
