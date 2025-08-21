<!DOCTYPE html> <!-- Déclare le document en HTML5 -->
<html lang="fr"> <!-- Langue principale : français -->

<head>
    
    <meta charset="UTF-8"> <!-- Encodage UTF-8 (accents et caractères spéciaux) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Compat IE ancien -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive mobile -->
    <title>Fonction explode()</title> <!-- Titre de l’onglet.
        ⚠️ Remarque: les balises HTML (ex. <code>) ne sont pas interprétées dans <title>.
        Ce n’est pas bloquant, mais mets simplement: "Fonction explode()" si tu veux être strict. -->
    <link rel="stylesheet" href="css/style.css"> <!-- Feuille de styles externe (optionnelle) -->
</head>

<body> <!-- Début du contenu visible -->
    <h1>Fonction <code>explode()</code></h1> <!-- Titre principal avec mise en forme de code pour "explode()" -->

    <h2>Description</h2> <!-- Sous-titre : description de la fonction -->
    <p>
        <!-- Paragraphe d’explication pour l’utilisateur -->
        La fonction <code>explode()</code> découpe une chaîne de caractères en un <strong>tableau</strong> en utilisant
        un <strong>séparateur</strong> (par exemple une virgule ou un espace).<br>
        Syntaxe simple : <code>explode(string $separateur, string $chaine, int $limite = PHP_INT_MAX): array</code><br>
        <em>Astuce :</em> si le séparateur n’est pas trouvé, on obtient un tableau contenant la chaîne entière.
        <!-- ⚠️ Le séparateur ne doit pas être vide ("") sinon PHP 8+ lève une erreur. -->
    </p>

    <h2>Exemple</h2> <!-- Sous-titre : section d’exemple -->

    <h3>Code</h3> <!-- Le code affiché (non exécuté) pour montrer l’exemple -->
    <pre>
&lt;?php
// (1) Déclare une chaîne avec des mots séparés par des virgules
$liste = "pomme,banane,orange";

// (2) Découpe $liste à chaque virgule et récupère un tableau ["pomme","banane","orange"]
$fruits = explode(",", $liste);

// (3) Parcourt chaque élément du tableau et l’affiche avec un saut de ligne HTML
foreach ($fruits as $fruit) {
    echo $fruit . "&lt;br&gt;"; // &lt;br&gt; car on est dans du HTML échappé
}
?&gt;
    </pre>

    <h3>Résultat</h3> <!-- Sous-titre : résultat réel produit par PHP ci-dessous -->
    <p>
        <?php
        // (1) Chaîne d’entrée : trois mots séparés par des virgules
        $liste = "pomme,banane,orange";

        // (2) explode(",", $liste) découpe la chaîne en un tableau aux virgules
        //     - séparateur : ","
        //     - texte      : $liste
        //     - limite     : (non fourni) → pas de limite (tout est découpé)
        $fruits = explode(",", $liste);

        // (3) Boucle sur le tableau et affiche chaque fruit suivi d’un <br> (retour à la ligne HTML)
        foreach ($fruits as $fruit) {
            echo $fruit . "<br>";
        }

        // (4) Notes utiles :
        //     - Si $liste = "pomme,,orange" → explode donnera ["pomme", "", "orange"] (élément vide entre deux virgules).
        //       Pour enlever les éléments vides : array_values(array_filter($fruits, fn($x) => $x !== ""));
        //     - Avec une limite, ex. explode(",", "a,b,c", 2) → ["a", "b,c"] (1 seule coupe).
        ?>
    </p>
</body> <!-- Fin du contenu visible -->

</html> <!-- Fin du document -->
