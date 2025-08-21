<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>array()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>array()</code></h1>
    <h2>Description</h2>
    <p>
        La fonction <code>array()</code> permet de créer un tableau en PHP. Elle peut contenir des éléments indexés
        numériquement ou associatifs, et stocker différents types de valeurs (chaînes, nombres, tableaux, etc.).
        Il est aussi possible d'utiliser la notation raccourci avec des crochets (<code>[]</code>).
    </p>

    <h2>Exemple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fruits = array("pomme", "banane", "orange");
//$fruits = ["pomme", "banane", "orange"]; // Syntaxe raccourcie

foreach ($fruits as $fruit) {
    echo $fruit . "&lt;br&gt;";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $fruits = array("pomme", "banane", "orange");
        //$fruits = ["pomme", "banane", "orange"]; // Syntaxe raccourcie
        
        foreach ($fruits as $fruit) {
            echo $fruit . "<br>";
        }
        ?>
    </p>
</body>

</html>