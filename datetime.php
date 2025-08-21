<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe <code>DateTime</code> (PHP)</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>La Classe <code>DateTime</code> (PHP)</h1>

    <h2>Description</h2>
    <p>
        La classe <code>DateTime</code> est l’API orientée objet de PHP pour manipuler les dates et heures.
        Elle permet de créer, formater, modifier, comparer des dates et gérer les fuseaux horaires via <code>DateTimeZone</code>.
        Elle remplace avantageusement de nombreux usages de <code>date()</code> et <code>strtotime()</code>.
    </p>

    <h2>MÉMO</h2>
    <ul>
        <li><code>new DateTime($time = 'now', ?DateTimeZone $tz = null)</code> : créer une date/heure.</li>
        <li><code>$d->format('Y-m-d H:i:s')</code> : formater l’affichage.</li>
        <li><code>$d->modify('+2 days')</code> / <code>$d->add(new DateInterval('P2D'))</code> / <code>$d->sub(...)</code> : modifier.</li>
        <li><code>$d1->diff($d2)</code> : obtenir un <code>DateInterval</code> (différence).</li>
        <li><code>$d->setTimezone(new DateTimeZone('Europe/Paris'))</code> : changer le fuseau (sans changer l’instant).</li>
        <li><code>DateTime::createFromFormat('d-m-Y', '21-08-2025')</code> : parser une date à format précis.</li>
        <li><strong>Mutable</strong> : <code>DateTime</code> modifie l’objet en place. Utiliser <code>DateTimeImmutable</code> pour l’immuabilité.</li>
    </ul>

    <hr>

    <h2>Exemple 1 : Création et formatage</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$now = new DateTime();
$custom = new DateTime('2000-01-01 12:00:00');

echo $now-&gt;format('Y-m-d H:i:s');
echo "\n";
echo $custom-&gt;format('d/m/Y H:i');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $now = new DateTime();
    $custom = new DateTime('2000-01-01 12:00:00');

    echo '<pre>' . htmlspecialchars($now->format('Y-m-d H:i:s')) . "\n" . htmlspecialchars($custom->format('d/m/Y H:i')) . '</pre>';
    ?>

    <hr>

    <h2>Exemple 2 : Modifier une date (modify / add / sub)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$d = new DateTime('2025-01-01');
$d-&gt;modify('+10 days'); // modifie en place

$d2 = new DateTime('2025-01-01');
$d2-&gt;add(new DateInterval('P2M')); // +2 mois
$d2-&gt;sub(new DateInterval('P1D')); // -1 jour

echo $d-&gt;format('Y-m-d');
echo "\n";
echo $d2-&gt;format('Y-m-d');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $d = new DateTime('2025-01-01');
    $d->modify('+10 days');

    $d2 = new DateTime('2025-01-01');
    $d2->add(new DateInterval('P2M'));
    $d2->sub(new DateInterval('P1D'));

    echo '<pre>' . htmlspecialchars($d->format('Y-m-d')) . "\n" . htmlspecialchars($d2->format('Y-m-d')) . '</pre>';
    ?>

    <hr>

    <h2>Exemple 3 : Différence entre deux dates (diff)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$a = new DateTime('2025-01-01');
$b = new DateTime('2025-08-21');
$interval = $a-&gt;diff($b);

echo $interval-&gt;format('%y années, %m mois, %d jours');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $a = new DateTime('2025-01-01');
    $b = new DateTime('2025-08-21');
    $interval = $a->diff($b);
    echo '<pre>' . htmlspecialchars($interval->format('%y années, %m mois, %d jours')) . '</pre>';
    ?>

    <hr>

    <h2>Exemple 4 : Fuseaux horaires</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$utc = new DateTime('now', new DateTimeZone('UTC'));
$paris = clone $utc;
$paris-&gt;setTimezone(new DateTimeZone('Europe/Paris'));

echo 'UTC   : ' . $utc-&gt;format('Y-m-d H:i:s P');
echo "\n";
echo 'Paris : ' . $paris-&gt;format('Y-m-d H:i:s P');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $utc = new DateTime('now', new DateTimeZone('UTC'));
    $paris = clone $utc;
    $paris->setTimezone(new DateTimeZone('Europe/Paris'));

    echo '<pre>UTC   : ' . htmlspecialchars($utc->format('Y-m-d H:i:s P')) . "\n" . 'Paris : ' . htmlspecialchars($paris->format('Y-m-d H:i:s P')) . '</pre>';
    ?>

    <hr>

    <h2>Exemple 5 : Parser un format précis (createFromFormat)</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$raw = '21-08-2025 14:30';
$parsed = DateTime::createFromFormat('d-m-Y H:i', $raw);

if ($parsed === false) {
    echo 'Échec du parsing';
} else {
    echo $parsed-&gt;format('Y-m-d H:i:s');
}
?&gt;
    </pre>

    <h3>Résultat</h3>
    <?php
    $raw = '21-08-2025 14:30';
    $parsed = DateTime::createFromFormat('d-m-Y H:i', $raw);
    if ($parsed === false) {
        echo '<pre>Échec du parsing</pre>';
    } else {
        echo '<pre>' . htmlspecialchars($parsed->format('Y-m-d H:i:s')) . '</pre>';
    }
    ?>

    <hr>

    <h2>Exemple 6 : DateTime vs DateTimeImmutable</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$mut = new DateTime('2025-01-01');
$imm = new DateTimeImmutable('2025-01-01');

$mut-&gt;modify('+1 day');              // modifie l'objet
$newImm = $imm-&gt;modify('+1 day');     // renvoie un NOUVEL objet

echo $mut-&gt;format('Y-m-d');
echo "\n";
echo $imm-&gt;format('Y-m-d');
echo "\n";
echo $newImm-&gt;format('Y-m-d');
?&gt;
    </pre>

    <h3>Résul