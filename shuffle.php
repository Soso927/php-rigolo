<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>shuffle()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>shuffle()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>shuffle()</code> mélange aléatoirement les éléments d’un tableau (comme mélanger un paquet de cartes ).
        <br>
         Elle <strong>modifie directement le tableau</strong> (pas de copie) et
        <strong>réindexe toujours les clés</strong> en 0, 1, 2, … même pour les tableaux associatifs.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>shuffle($tableau)</code> : mélange les éléments dans un ordre aléatoire.</li>
        <li>Retourne <code>true</code> si ça a marché, <code>false</code> sinon.</li>
        <li>Les clés du tableau sont toujours réinitialisées (0,1,2,...).</li>
    </ul>

    <h2>Exemple 1 : tableau indexé</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fruits = ["pomme", "banane", "orange", "kiwi"];

shuffle($fruits);

print_r($fruits);
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $fruits = ["pomme", "banane", "orange", "kiwi"];
    shuffle($fruits);

    echo "<pre>" . htmlspecialchars(print_r($fruits, true)) . "</pre>";
    echo "<p>Tableau mélangé (exemple lisible) : [" . implode(", ", $fruits) . "]</p>";
    ?>

    <hr>

    <h2>Exemple 2 : tableau associatif</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$couleurs = [
    "rouge" => "pomme",
    "jaune" => "banane",
    "orange" => "orange",
    "vert"  => "kiwi"
];

shuffle($couleurs);

print_r($couleurs);
?&gt;


    </pre>

    <h3>Résultat</h3>
    <?php
    $couleurs = [
        "rouge" => "pomme",
        "jaune" => "banane",
        "orange" => "orange",
        "vert"  => "kiwi"
    ];
    shuffle($couleurs);

    echo "<pre>" . htmlspecialchars(print_r($couleurs, true)) . "</pre>";
    echo "<p> Les clés associatives sont perdues → [" . implode(", ", $couleurs) . "]</p>";
    
 
    ?>

</body>

</html>
