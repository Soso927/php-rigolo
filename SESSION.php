<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La superglobale Session en php</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  
    <h1>La superglobale Session</h1>
    <h2>Description</h2>
    <p>
        <code>$_SESSION</code> permet de stocker des informations (variables) qui restent disponibles d’une page à l’autre tant que la session de l’utilisateur est active.

 Important :

On doit toujours démarrer une session avec session_start(); avant d’utiliser $_SESSION.

Les données stockées restent accessibles tant que l’utilisateur ne ferme pas le navigateur (ou jusqu’à ce qu’on les détruise).

$_SESSION est un tableau associatif (comme $_POST).
    </p>

    <h2>Exemple</h2>

    <h3>Code</h3>
    <pre>
        &lt;?php
session_start(); // Obligatoire au début

// On enregistre des informations
$_SESSION['prenom'] = "Alice";
$_SESSION['age'] = 30;

// On les affiche
echo "Bonjour " . $_SESSION['prenom'] . ", tu as " . $_SESSION['age'] . " ans.";
        ?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        Bonjour Alice, tu as 30 ans. 
    </p>
</body>
</html>