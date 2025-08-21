<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>count()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>count()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>count()</code> permet de compter le nombre d’éléments dans un tableau (ou les propriétés d’un objet qui implémente <code>Countable</code>).
        <br>
         Par défaut, elle ne compte pas les sous-tableaux en détail (il existe une option <code>COUNT_RECURSIVE</code> pour ça).
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>count($tableau)</code> → retourne le nombre d’éléments du tableau.</li>
        <li><code>count($tableau, COUNT_RECURSIVE)</code> → compte aussi les éléments dans les sous-tableaux.</li>
    </ul>

    <h2>Exemple 1 : tableau simple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fruits = ["pomme", "banane", "orange"];
echo count($fruits);
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $fruits = ["pomme", "banane", "orange"];
        echo "Le tableau contient " . count($fruits) . " éléments.";
        ?>
    </p>

    <hr>

    <h2>Exemple 2 : tableau multidimensionnel</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$panier = [
    "fruits" => ["pomme", "banane"],
    "legumes" => ["carotte", "tomate"]
];

echo count($panier); // compte seulement les 2 clés (fruits, legumes)
echo "&lt;br&gt;";
echo count($panier, COUNT_RECURSIVE); // compte tout en profondeur
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $panier = [
            "fruits" => ["pomme", "banane"],
            "legumes" => ["carotte", "tomate"]
        ];

        echo "Sans COUNT_RECURSIVE : " . count($panier);
        echo "<br>";
        echo "Avec COUNT_RECURSIVE : " . count($panier, COUNT_RECURSIVE);
        ?>
    </p>

</body>

</html>
