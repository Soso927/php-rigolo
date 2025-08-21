<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code>date_format()</code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code>date_format()</code></h1>

    <h2>Description</h2>
    <p>
        La fonction <code>date_format()</code> permet de formater un objet <code>DateTime</code> 
        selon un modèle donné (ex. "Y-m-d H:i:s").  
        <br>
        Elle est équivalente à la méthode <code>$date->format()</code>.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>date_format($date, "Y-m-d")</code> → affiche l’année-mois-jour.</li>
        <li><code>date_format($date, "d/m/Y H:i")</code> → affiche la date et l’heure.</li>
    </ul>

    <h2>Exemple 1 : formater la date actuelle</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$date = new DateTime(); // date actuelle
echo date_format($date, "Y-m-d H:i:s");
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $date = new DateTime();
        echo "Date actuelle formatée : " . date_format($date, "Y-m-d H:i:s");
        ?>
    </p>

    <hr>

    <h2>Exemple 2 : date spécifique</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$date = new DateTime("2000-01-01");
echo date_format($date, "d/m/Y");
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $date = new DateTime("2000-01-01");
        echo "Date spécifique : " . date_format($date, "d/m/Y");
        ?>
    </p>

    <hr>

    <h2>Exemple 3 : comparaison avec la méthode format()</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$date = new DateTime();
echo $date->format("l d F Y"); // format en toutes lettres
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        $date = new DateTime();
        echo "Avec ->format() : " . $date->format("l d F Y");
        ?>
    </p>

</body>

</html>
