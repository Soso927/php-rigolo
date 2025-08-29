<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La fonction <code>Session_unset</code></title>
  <link rel="stylesheet" href="css/ style.css">
</head>
<body>
  <h1>Fonction <code>Session_unset</code></h1>
  <h2>Description</h2>
  <p>
    Résumé de  <code>session_unset()</code>

But : efface toutes les variables de la session en cours.

Utilité : vider la session sans la détruire complètement (contrairement à session_destroy() qui supprime la session elle-même).

Paramètres : aucun (on n’a rien à mettre entre les parenthèses).

Retour :

true → si tout s’est bien passé.

false → si erreur.
  </p>
  <h2>Exemple</h2>
  <h3>Code</h3>
  <pre>
    &lt;?php
session_start(); // On démarre la session

// On stocke des infos dans la session
$_SESSION["nom"] = "Alice";
$_SESSION["age"] = 25;

echo "Avant : ";
print_r($_SESSION); // Affiche toutes les variables de session

// On vide toutes les variables
session_unset();

echo "Après : ";
print_r($_SESSION); // Plus rien, tableau vide
    &gt;
  </pre>
  <h3>Résultat</h3>
  <p>
  Ici :

Avant : Array ( [nom] => Alice [age] => 25 )

Après : Array ( ) (tout a disparu)
  </p>
</body>
</html>