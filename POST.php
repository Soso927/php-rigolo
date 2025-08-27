<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La superGlobale Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>la superGlobale POST</h1>
    <h2>Description</h2>
    <p>
 <code>$_POST</code> est une variable spéciale (superglobale) qui contient les données envoyées par un formulaire HTML avec la méthode POST.

Important :

On l’utilise surtout pour récupérer des données envoyées par l’utilisateur (texte, choix, cases à cocher, etc.).

<code>$_POST</code> est un tableau associatif :

Les clés = les noms des champs du formulaire

Les valeurs = ce que l’utilisateur a tapé ou choisi
    </p>

    <h2>Exemple</h2>

    <h3>code</h3>
    <pre>
    &lt;?php
$nom = $_POST['nom'];  // Récupère la valeur du champ "nom"
$age = $_POST['age'];  // Récupère la valeur du champ "age"

?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <pre>
     &lt;?php
echo "Bonjour $nom, tu as $age ans.";
?&gt;
</pre>
    </p>
</body>
</html>