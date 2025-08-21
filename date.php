<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>date()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>date()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>date()</code> permet d’afficher la date et l’heure courante selon un format donné.
        <br>
        Elle prend deux paramètres :
        <ul>
            <li>le format (obligatoire), par exemple <code>"Y-m-d"</code> pour année-mois-jour</li>
            <li>un timestamp (optionnel). Si absent, elle utilise la date/heure actuelle.</li>
        </ul>
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>date("Y-m-d")</code> → affiche la date au format AAAA-MM-JJ.</li>
        <li><code>date("d/m/Y")</code> → affiche la date au format JJ/MM/AAAA.</li>
        <li><code>date("H:i:s")</code> → affiche l’heure (heures:minutes:secondes).</li>
    </ul>

    <h2>Exemple 1 : date actuelle (format simple)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
echo date("Y-m-d");
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        echo "Aujourd'hui nous sommes le : " . date("Y-m-d");
        ?>
    </p>

    <hr>

    <h2>Exemple 2 : date et heure actuelles</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
echo date("d/m/Y H:i:s");
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        echo "Date et heure actuelles : " . date("d/m/Y H:i:s");
        ?>
    </p>

    <hr>

    <h2>Exemple 3 : utilisation avec un timestamp</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$timestamp = strtotime("2000-01-01");
echo date("d/m/Y", $timestamp);
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $timestamp = strtotime("2000-01-01");
        echo "Le 1er janvier 2000 correspond à : " . date("d/m/Y", $timestamp);
        ?>
    </p>

</body>

</html>
