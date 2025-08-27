<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>list()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>fonction <code>list()</code></h1>
    <h2>description</h2>
    <p>
       La fonction <code>list()</code> Assigne des variables comme si elles étaient un tableau. Tout comme <code>array()</code> , list() n'est pas une véritable fonction, mais un élément de langage, qui permet de rassembler les variables varname, ... sous forme de tableau, pour les assigner en une seule ligne. Les chaînes de caractères ne peuvent pas être déstructurées et les expressions list() ne peuvent pas être entièrement vide.
    </p>

    <h2>Exemple</h2>

    <h3>code</h3>
    <pre>
        &lt;?php

$infos = ["Jean", "Dupont", 25];

list($prenom, $nom, $age) = $infos;

echo $prenom; // Affiche : Jean
echo $nom;    // Affiche : Dupont
echo $age;    // Affiche : 25

?>
&gt;
    </pre>
    <h3>Résultat</h3>
    
    <p>
        &lt;
<br>
$prenom = "Jean"
<br>
<br>
$nom = "Dupont"
<br>
<br>
$age = 25
<br>
    </p>
</body>
</html>