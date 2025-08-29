<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La fonction <code>json_decode ()</code></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>La fonction <code>json_decode ()</code></h1>
  <h2>Description</h2>
  <p>
But : convertir une chaîne JSON ➝ en variable PHP (objet ou tableau).

Paramètres principaux :

La chaîne JSON (obligatoire).

$assoc (optionnel, false par défaut) :

false → retourne un objet (par défaut).

true → retourne un tableau associatif.

Retour :

un objet PHP ou un tableau PHP si succès.

null si erreur (exemple : JSON mal formé).
  </p>
  <h2>Exemple</h2>

  <h3>Code</h3>
  <pre>
    &lt;?php
$json = '{"nom":"Alice","age":25}';

$resultat = json_decode($json, true);
&gt;
  </pre>

  <h3>Résultat</h3>
  <p>
    <?php
$json = '{"nom":"Alice","age":25}';
$resultat = json_decode($json, true);
echo $resultat["nom"] . "<br>"; 
echo $resultat["age"] . "<br>"; 
?>
  </p>
</body>
</html>