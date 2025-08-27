<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La fonction <code>Session_unset</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>la fonction <code>Session_unset</code></h1>
    <h2>description</h2>
    <p>
        <code>Session_unset</code> détruit toutes les variables de la session courante 
    </p>

    <h2>Exemple</h2>

    <h3>Code</h3>
    <pre>
        &lt;?php
session_start(); // On démarre la session

// On ajoute des infos dans la session
$_SESSION["nom"] = "Alice";
$_SESSION["age"] = 25;

// On affiche le contenu
echo "Avant session_unset :<br>";
print_r($_SESSION);

// On vide toutes les variables de session
session_unset();

echo "<br><br>Après session_unset :<br>";
print_r($_SESSION);
?&gt; 
    </pre>
    <h3>Résultat</h3>
    <p>
   Avant session_unset :
Array ( [nom] => Alice [age] => 25 )
<br>
Après session_unset :
Array ( )     
    </p>
</body>
</html>