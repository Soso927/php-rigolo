<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Méthode <code>DateTime::diff()</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>La Méthode <code>DateTime::diff()</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La méthode <code>DateTime::diff()</code> permet de calculer la différence entre deux dates et retourne un objet
        <code>DateInterval</code>.
        <br>On peut ensuite utiliser <code>$interval->format()</code> pour afficher cette différence.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>$d1->diff($d2)</code> retourne un objet <code>DateInterval</code>.</li>
        <li>Les propriétés principales de <code>DateInterval</code> sont : <code>y</code> (années), <code>m</code> (mois),
            <code>d</code> (jours), <code>h</code> (heures), <code>i</code> (minutes), <code>s</code> (secondes).
        </li>
        <li>On peut formater le résultat avec <code>%y</code>, <code>%m</code>, <code>%d</code>, <code>%h</code>, <code>%i</code>, <code>%s</code>.</li>
        <li><code>invert</code> vaut 1 si la date de départ est postérieure à la date comparée.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Différence simple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$d1 = new DateTime('2025-01-01');
$d2 = new DateTime('2025-08-21');
$interval = $d1-&gt;diff($d2);

echo $interval-&gt;format('%y années, %m mois, %d jours');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $d1 = new DateTime('2025-01-01');
    $d2 = new DateTime('2025-08-21');
    $interval = $d1->diff($d2);
    echo '<pre>' . htmlspecialchars($interval->format('%y années, %m mois, %d jours')) . '</pre>';
    ?>

    <hr>

    <h2>Exemple 2 : Intervalle en jours</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$d1 = new DateTime('2025-01-01');
$d2 = new DateTime('2025-08-21');
$interval = $d1-&gt;diff($d2);

echo $interval-&gt;days . ' jours au total';
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $d1 = new DateTime('2025-01-01');
    $d2 = new DateTime('2025-08-21');
    $interval = $d1->diff($d2);
    echo '<pre>' . htmlspecialchars($interval->days . ' jours au total') . '</pre>';
    ?>

    <hr>

    <h2>Exemple 3 : Cas d'une date passée (propriété invert)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$today = new DateTime('now');
$deadline = new DateTime('2024-12-31');
$interval = $today-&gt;diff($deadline);

if ($interval-&gt;invert) {
    echo 'La date est passée depuis ' . $interval-&gt;days . ' jours.';
} else {
    echo 'Il reste ' . $interval-&gt;days . ' jours.';
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $today = new DateTime('now');
    $deadline = new DateTime('2024-12-31');
    $interval = $today->diff($deadline);

    if ($interval->invert) {
        echo '<pre>La date est passée depuis ' . $interval->days . ' jours.</pre>';
    } else {
        echo '<pre>Il reste ' . $interval->days . ' jours.</pre>';
    }
    ?>

    <hr>

    <h2>Pense-bête <code>DateInterval::format()</code></h2>
    <ul>
        <li><code>%y</code> : années</li>
        <li><code>%m</code> : mois (0-11 après les années)</li>
        <li><code>%d</code> : jours (0-30 après les mois)</li>
        <li><code>%a</code> : nombre total de jours</li>
        <li><code>%h</code> : heures</li>
        <li><code>%i</code> : minutes</li>
        <li><code>%s</code> : secondes</li>
    </ul>

</body>

</html>
