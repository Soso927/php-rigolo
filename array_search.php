<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>array_search()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>array_search()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>array_search()</code> permet de rechercher une valeur dans un tableau et retourne
        <strong>l’index</strong> (ou la clé) de la première occurrence trouvée.
        <br>
        Si la valeur n’existe pas, la fonction retourne <code>false</code>.
    </p>

    <h2>Exemple 1 : tableau indexé</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fruits = ["pomme", "banane", "orange", "kiwi"];

$index = array_search("orange", $fruits);

if ($index !== false) {
    echo "L'élément 'orange' se trouve à l'index : " . $index;
} else {
    echo "L'élément n'a pas été trouvé.";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $fruits = ["pomme", "banane", "orange", "kiwi"];
        $index = array_search("orange", $fruits);

        if ($index !== false) {
            echo "L'élément 'orange' se trouve à l'index : " . $index;
        } else {
            echo "L'élément n'a pas été trouvé.";
        }
        ?>
    </p>

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

$cle = array_search("kiwi", $couleurs);

if ($cle !== false) {
    echo "Le fruit 'kiwi' correspond à la clé : " . $cle;
} else {
    echo "Le fruit n'a pas été trouvé.";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $couleurs = [
            "rouge" => "pomme",
            "jaune" => "banane",
            "orange" => "orange",
            "vert" => "kiwi"
        ];

        $cle = array_search("kiwi", $couleurs);

        if ($cle !== false) {
            echo "Le fruit 'kiwi' correspond à la clé : " . $cle;
        } else {
            echo "Le fruit n'a pas été trouvé.";
        }
        ?>
    </p>
</body>

</html>