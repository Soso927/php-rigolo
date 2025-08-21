<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruction <code>echo</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>L'Instruction <code>echo</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        <code>echo</code> est une instruction du langage PHP qui permet d’afficher du texte, des nombres, ou des variables.  
        <br>
        C’est l’une des manières les plus utilisées pour envoyer du contenu dans la page HTML.  
        <br>
        Elle peut prendre plusieurs arguments séparés par des virgules, mais l’usage le plus courant est d’afficher une chaîne unique.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>echo "texte";</code> : affiche une chaîne de caractères.</li>
        <li><code>echo $variable;</code> : affiche la valeur d’une variable.</li>
        <li><code>echo "Texte $variable";</code> : interprète la variable dans une chaîne double-quotée.</li>
        <li><code>echo 'Texte $variable';</code> : n’interprète pas la variable (affiche littéralement <code>$variable</code>).</li>
        <li>Ne retourne rien (contrairement à <code>print</code>).</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Texte simple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
echo "Bonjour tout le monde !";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    echo "<pre>";
    echo "Bonjour tout le monde !";
    echo "</pre>";
    ?>

    <hr>

    <h2>Exemple 2 : Variables</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$nom = "Alice";
$age = 25;

echo "Je m'appelle $nom et j'ai $age ans.";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $nom = "Alice";
    $age = 25;
    echo "<pre>";
    echo "Je m'appelle $nom et j'ai $age ans.";
    echo "</pre>";
    ?>

    <hr>

    <h2>Exemple 3 : Différence simple vs double quotes</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$animal = "chat";

echo "J'ai un $animal."; // interprète la variable
echo '&lt;br&gt;';
echo 'J\'ai un $animal.'; // affiche $animal littéralement
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $animal = "chat";
    echo "<pre>";
    echo "J'ai un $animal.\n";
    echo 'J\'ai un $animal.';
    echo "</pre>";
    ?>

    <hr>

    <h2>Exemple 4 : Plusieurs arguments</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
echo "PHP ", "est ", "cool !";
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    echo "<pre>";
    echo "PHP ", "est ", "cool !";
    echo "</pre>";
    ?>

</body>

</html>
