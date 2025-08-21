<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La fonction array_map()</title>
    <link rel="stylesheet" href="css/style.css" />
   
</head>
<body>
    <h1>Fonction <code>array_map</code></h1>

    <h2>Description</h2>
    <p>
        <strong>Objectif :</strong> nettoyer un tableau de chaînes (espaces superflus, valeurs vides) en combinant
        <code>trim</code>, <code>array_map</code>, <code>array_filter</code> et <code>array_values</code>.
    </p>

    <h3>MÉMO</h3>
    <ul>
        <li><code>trim($s)</code> : enlève les espaces en début/fin d’une chaîne.</li>
        <li><code>array_map('trim', $liste)</code> : applique <code>trim</code> à chaque élément (retourne un <em>nouveau</em> tableau).</li>
        <li><code>array_filter($liste, fn($x) => $x !== "")</code> : enlève seulement les vides <code>""</code> (et garde <code>"0"</code>).</li>
        <li><code>array_values($liste)</code> : réindexe proprement le tableau (0, 1, 2, …).</li>
    </ul>

<?php
// 1) Données brutes : espaces, vides et un "0"
$brut = ["  bonjour ", " ", "0", "  salut", "", "  test  "];

// 2) Nettoyage des espaces pour chaque élément
$net = array_map('trim', $brut);

// 3) Suppression des vides (on garde "0")
$propres = array_values(array_filter($net, fn($x) => $x !== ""));

// Helpers
function dump_html($title, $value) {
    echo "<h3>{$title}</h3>";
    echo "<pre>" . htmlspecialchars(print_r($value, true)) . "</pre>";
}

function list_for_paragraph(array $arr): string {
    // Chaque élément est échappé pour éviter les soucis HTML
    $safe = array_map(fn($v) => htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'), $arr);
    return '[' . implode(', ', $safe) . ']';
}

// Affichages + paragraphes lisibles
dump_html('Tableau brut', $brut);
echo "<p class='result result--brut'>Tableau brut (lisible) : " . list_for_paragraph($brut) . "</p>";

dump_html('Après array_map(\'trim\')', $net);
echo "<p class='result result--net'>Après <code>array_map(\'trim\')</code> : " . list_for_paragraph($net) . "</p>";

dump_html('Résultat (filter + values)', $propres);
echo "<h3>Résultat final</h3>";
echo "<p class='result result--final resultat-final'>Le tableau final contient : " . list_for_paragraph($propres) . "</p>";
?>

</body>
</html>
