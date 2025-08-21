<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>array_keys()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>array_keys()</code></h1>
    <h2>Description</h2>
    <p>
        La fonction <code>array_keys()</code> renvoie un <strong>tableau contenant toutes les clés</strong> d’un tableau
        (index numérique ou clés associatives).<br>
        Syntaxe : <code>array_keys(array $tableau, mixed $valeurRecherchée = null, bool $strict = false): array</code><br>
        <em>Astuce :</em> on peut aussi <strong>filtrer</strong> les clés qui correspondent à une certaine valeur (2ᵉ et 3ᵉ paramètres).
    </p>

    <h2>Exemple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
// Tableau associatif
$personne = array(
    "nom"   => "Alice",
    "age"   => 30,
    "ville" => "Paris"
);

// Récupérer toutes les clés : ["nom", "age", "ville"]
$cles = array_keys($personne);

foreach ($cles as $cle) {
    echo $cle . "&lt;br&gt;";
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        // Tableau associatif
        $personne = array(
            "nom"   => "Alice",
            "age"   => 30,
            "ville" => "Paris"
        );

        // Récupérer toutes les clés : ["nom", "age", "ville"]
        $cles = array_keys($personne);

        foreach ($cles as $cle) {
            echo $cle . "<br>";
        }
        ?>
    </p>

    <h2>Bonus (facultatif)</h2>
    <p>
        Filtrer les clés dont la valeur vaut <code>"Paris"</code> :
    </p>

    <h3>Code</h3>
    <pre>
&lt;?php
// Ne renvoie que les clés dont la valeur est "Paris"
$cles_filtrees = array_keys($personne, "Paris", true); // strict = true

foreach ($cles_filtrees as $cle) {
    echo $cle . "&lt;br&gt;"; // ici : "ville"
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        // Filtrer par valeur exacte "Paris"
        $cles_filtrees = array_keys($personne, "Paris", true);

        foreach ($cles_filtrees as $cle) {
            echo $cle . "<br>"; // ici : "ville"
        }
        ?>
    </p>
</body>

</html>
