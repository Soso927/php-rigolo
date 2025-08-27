<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction unset()</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Fonction <code>unset()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>unset()</code> détruit une ou plusieurs variables.<br>
        Attention : son comportement peut changer selon le contexte (variable simple, globale, référence, statique...).
    </p>

    <!-- Exemple 1 -->
    <h2>Exemple 1 - Variable simple dans une fonction</h2>
    <h3>Code</h3>
<pre>
&lt;?php
function detruireFruit() 
{
    global $fruit; // crée un lien local vers la variable globale $fruit
    unset($fruit); // détruit seulement la copie locale (le lien)
}

$fruit = 'pomme';
detruireFruit();
echo $fruit;
?&gt;
</pre>

    <h3>Résultat</h3>
    <p>
       Affichage : pomme
    </p>

    <!-- Exemple 2 -->
    <h2>Exemple 2 - Supprimer une variable globale avec $GLOBALS</h2>
    <h3>Code</h3>
    <pre>
&lt;?php
function detruireFruit() 
{
    unset($GLOBALS['fruit']); // supprime vraiment la variable globale
}

$fruit = "banane";
detruireFruit();
echo $fruit; // Erreur : la variable n'existe plus
?&gt;
</pre>

    <h3>Résultat</h3>
   <p>
    Affichage : Notice: Undefined variable: fruit

   </p>

    <!-- Exemple 3 -->
    <h2>Exemple 3 - Avec une variable passée par référence</h2>
    <h3>Code</h3>
   <pre>
&lt;?php
function changerCouleur(&$couleur) 
{
    unset($couleur);     // détruit la copie locale
    $couleur = "rouge";  // recrée une nouvelle valeur
}

$couleur = 'bleu';
echo $couleur . "\n"; // bleu

changerCouleur($couleur);
echo $couleur; // rouge
?&gt;
</pre>

    <h3>Résultat</h3>
    <p>
        affichage :bleu<br>
        rouge
    </p>

    <!-- Exemple 4 -->
    <h2>Exemple 4 - Avec une variable statique</h2>
    <h3>Code</h3>
    <pre>
&lt;?php
function compteur()
{
    static $animal;
    $animal++; // la valeur est gardée entre les appels
    echo "Avant unset : $animal, ";
    unset($animal); // détruit seulement la copie locale
    $animal = 23;   // recrée une variable locale
    echo "Après unset : $animal\n";
}

compteur(); // Avant unset : 1, Après unset : 23
compteur(); // Avant unset : 2, Après unset : 23
compteur(); // Avant unset : 3, Après unset : 23
?&gt;
</pre>

    <h3>Résultat</h3>
    <p>
        Avant unset : 1, Après unset : 23<br>
        Avant unset : 2, Après unset : 23<br>
        Avant unset : 3, Après unset : 23
    </p>

    <!-- Exemple 5 -->
    <h2>Exemple 5 - Destruction de plusieurs variables ou tableau</h2>
    <h3>Code</h3>
   <pre>
&lt;?php
$fruit = "kiwi";
$couleur = "vert";
$animaux = ["chat", "chien", "lapin"];

unset($fruit);        // supprime une variable simple
unset($animaux[1]);   // supprime "chien" du tableau
unset($couleur);      // supprime $couleur

print_r($animaux); // affiche le tableau restant
?&gt;
</pre>

    <h3>Résultat</h3>
  <p>Affichage : Array ( &nbsp;&nbsp;&nbsp;&nbsp;[0] =&gt; chat &nbsp;&nbsp;&nbsp;&nbsp;[2] =&gt; lapin )</p>

</body>
</html>
