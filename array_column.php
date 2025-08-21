<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array column</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>fonction <code>array_column</code></h1>
    <h2> Description</h2>

   <p> <!-- Paragraphe d’explication pour l’utilisateur -->
  <strong>Définition :</strong>
  <code>array_column()</code> extrait les valeurs d’une <strong>colonne</strong> d’un tableau de lignes (un tableau de tableaux).<br>
  <strong>Syntaxe :</strong> <code>array_column($table, $column_key, $index_key = null)</code><br>
  <strong>À quoi ça sert ?</strong> Obtenir, par exemple, la liste des prénoms depuis une liste d’utilisateurs.<br><br>

  <strong>Cas simples à retenir :</strong><br>
  – <code>array_column($users, 'prenom')</code> → renvoie <em>["Alice","Bob",...]</em><br>
  – <code>array_column($users, 'prenom', 'id')</code> → renvoie <em>[1=>"Alice", 2=>"Bob", ...]</em><br>
  – <code>array_column($users, null, 'id')</code> → renvoie les <strong>lignes complètes</strong> indexées par id.<br><br>

  <strong>Note :</strong> les clés que tu utilises (<code>prenom</code>, <code>id</code>) doivent exister dans chaque ligne.
</p>
<h2>Exemple</h2>

<h3>Code</h3>
<pre>
    &lt;?php
   <?php
// Données d'exemple (un "tableau de lignes")
$users = [
  ['id' => 1, 'prenom' => 'Alice', 'age' => 30],
  ['id' => 2, 'prenom' => 'Bob',   'age' => 25],
  ['id' => 3, 'prenom' => 'Chloé', 'age' => 28],
];
// Je veux seulement la colonne "prenom".
$prenoms = array_column($users, 'prenom');

// Affichage pour vérifier
echo "<pre>Exemple 1 — prenoms :\n";
print_r($prenoms);
echo "</pre>";

/*
Résultat attendu :
Array
(
    [0] => Alice
    [1] => Bob
    [2] => Chloé
)
*/

    // (3) 
// Je veux la colonne "prenom", mais les clés du tableau résultat doivent être les "id".
$prenomsParId = array_column($users, 'prenom', 'id');

// Affichage pour vérifier
echo "<pre>Exemple 2 — prenoms par id :\n";
print_r($prenomsParId);
echo "</pre>";

/*
Résultat attendu :
Array
(
    [1] => Alice
    [2] => Bob
    [3] => Chloé
)
*/

// Je veux tout (toutes les colonnes), mais indexé par "id".
$lignesParId = array_column($users, null, 'id');

// Affichage pour vérifier
echo "<pre>Exemple 3 — lignes complètes par id :\n";
print_r($lignesParId);
echo "</pre>";

/*
Résultat attendu :
Array
(
    [1] => Array ( [id] => 1 [prenom] => Alice [age] => 30 )
    [2] => Array ( [id] => 2 [prenom] => Bob   [age] => 25 )
    [3] => Array ( [id] => 3 [prenom] => Chloé [age] => 28 )
)
*/

// Exemple d'accès direct : récupérer l'âge de l'utilisateur id=3
$ageChloe = $lignesParId[3]['age']; // 28

$users_ok = array_values(array_filter($users, fn($u) => array_key_exists('prenom', $u)));
$prenoms_surs = array_column($users_ok, 'prenom');

    ?>

</pre>
</body>
</html>