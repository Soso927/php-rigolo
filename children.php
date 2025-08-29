<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La méthode <code>SimpleXMLElement::children</code></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>La méthode <code>SimpleXMLElement::children</code></h1>
  <h2>Description</h2>
  <p>
But : trouver les enfants (fils) d’un élément XML.

Retour :

Un objet SimpleXMLElement (même si l’élément n’a pas de fils).

 Si on est sur un attribut et pas un élément → ça retourne null.

Paramètres (optionnels) :

namespaceOrPrefix → indique un espace de noms XML.

isPrefix (true/false) → dit si le paramètre précédent est un préfixe ou une URL.

Note : les résultats de children() ne se voient pas avec var_dump() → il faut les parcourir avec une boucle (foreach).
  </p>
  <h2>Exemple</h2>
  <h3>Code</h3>
  <pre>
    &lt;?php
  <nom>Alice</nom>
  <age>25</age>
?&gt;
&lt;?php
$xml = simplexml_load_string('
  <nom>Alice</nom>
  <age>25</age>
');

// On récupère les enfants de personne
$enfants = $xml->children();

foreach ($enfants as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
}
?&gt;
  </pre>
  <h3>Résultat</h3>
  <p>
nom : Alice
age : 25
  </p>
</body>
</html>