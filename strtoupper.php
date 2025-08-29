<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La fonction <code>strtoupper()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>La fonction <code>strtoupper()</code></h1>
    <h2>Description</h2>
    <p>
transforme une chaîne de caractères en majuscules.

Paramètres :

1 paramètre obligatoire : la chaîne (string).

Retour :

La même chaîne, mais tout en majuscules.
    </p>
    <h2>Exemple</h2>
    <h3>Code</h3>
    <pre>
 &lt;?php
$texte = "bonjour";
echo strtoupper($texte); // Affiche "BONJOUR"
?&gt;
    </pre>
    <h3>Résultat</h3>
    <p>
        BONJOUR
    </p>
</body>
</html>