<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Superglobale $_GET — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Superglobale <code>$_GET</code></h1>

  <h2>Description</h2>
  <p>
    <code>$_GET</code> est un <strong>tableau associatif</strong> contenant les paramètres passés dans l’URL
    (la «&nbsp;query string&nbsp;» après le <code>?</code>). C’est une <em>superglobale</em> : disponible partout
    sans <code>global</code>.
  </p>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Bonjour &lt;nom&gt;</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?name=Yannick</code></p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) On récupère "name" depuis l'URL (ou null s'il n'existe pas)
$nom = $_GET['name'] ?? null;

// 2) On protège l'affichage contre le HTML (sécurité)
$nom_safe = $nom !== null ? htmlspecialchars($nom, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') : '';

// 3) On affiche un message simple (ou "inconnu" si vide)
echo 'Bonjour ' . ($nom_safe !== '' ? $nom_safe : 'inconnu') . ' !';
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Bonjour Yannick&nbsp;!</p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Valeur par défaut quand le paramètre manque</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php</code> (sans paramètre)</p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) On lit "ville" dans l'URL, sinon on met "Paris" par défaut
$ville = $_GET['ville'] ?? 'Paris';

// 2) Sécurisation affichage
echo 'Ville: ' . htmlspecialchars($ville, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Ville: Paris</p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Plusieurs paramètres</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?prenom=Sam&amp;nom=Dupont</code></p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) On récupère deux paramètres
$prenom = $_GET['prenom'] ?? '';
$nom    = $_GET['nom']    ?? '';

// 2) On sécurise
$prenom = htmlspecialchars($prenom, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$nom    = htmlspecialchars($nom,    ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// 3) On formate l'affichage
echo 'Bonjour ' . ($prenom !== '' ? $prenom . ' ' : '') . ($nom !== '' ? $nom : 'inconnu');
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Bonjour Sam Dupont</p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — Nombre (cast + contrôle)</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?age=30</code></p>
    <h3>Code</h3>
<pre>&lt;?php
// 1) On récupère le paramètre "age" (string) ou null s'il est absent — évite l'erreur "Undefined index"
$age_str = $_GET['age'] ?? null;

// 2) On vérifie que c'est bien un entier (pas "12abc", pas vide...).
//    FILTER_VALIDATE_INT renvoie l'entier (y compris 0) si OK, sinon false.
if ($age_str !== null &amp;&amp; filter_var($age_str, FILTER_VALIDATE_INT) !== false) {
    // 3) Conversion explicite en entier.
    $age = (int) $age_str;

    // 4) Affichage de l'âge et de l'âge dans 1 an.
    echo 'Âge: ' . $age . ', dans 1 an: ' . ($age + 1);
} else {
    // 5) Message clair si manquant ou invalide.
    echo 'Âge invalide ou manquant';
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Âge: 30, dans 1 an: 31</p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — Listes / tableaux dans l’URL</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?interets[]=PHP&amp;interets[]=JS&amp;interets[]=SQL</code></p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) "interets[]" donne un tableau dans $_GET
$interets = $_GET['interets'] ?? [];

// 2) On force un tableau (si un seul élément, PHP peut donner une string)
if (!is_array($interets)) {
    $interets = [$interets];
}

// 3) On sécurise chaque élément
$interets_safe = array_map(static fn($v) =&gt; htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'), $interets);

// 4) On affiche la liste
echo 'Intérêts: ' . implode(', ', $interets_safe);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Intérêts: PHP, JS, SQL</p>
  </section>

  <!-- ===================== Exemple 6 ===================== -->
  <section>
    <h2>Exemple 6 — Valeurs limitées (whitelist)</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?theme=dark</code></p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) Liste autorisée
$themes_autorises = ['light', 'dark'];

// 2) On récupère "theme"
$theme = $_GET['theme'] ?? 'light';

// 3) Si pas dans la liste, on remet par défaut
if (!in_array($theme, $themes_autorises, true)) {
    $theme = 'light';
}

// 4) On affiche le thème retenu
echo 'Thème: ' . htmlspecialchars($theme, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Thème: dark</p>
  </section>

  <!-- ===================== Exemple 7 ===================== -->
  <section>
    <h2>Exemple 7 — Option booléenne (présence du paramètre)</h2>
    <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?debug=1</code> (ou sans <code>debug</code>)</p>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) On considère "debug" actif s'il est présent et vaut "1"
$debug = isset($_GET['debug']) &amp;&amp; $_GET['debug'] === '1';

// 2) Affichage en fonction du flag
echo $debug ? 'Mode debug: ON' : 'Mode debug: OFF';
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Mode debug: ON</p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li>Toujours <strong>échapper</strong> ce que vous affichez : <code>htmlspecialchars()</code> (idéalement avec <code>ENT_QUOTES | ENT_SUBSTITUTE</code> et encodage <code>UTF-8</code>).</li>
      <li>Les valeurs de <code>$_GET</code> arrivent en <strong>chaînes</strong> (strings).</li>
      <li>Les espaces/accents sont encodés en URL (ex. <code>%20</code>, <code>%C3%A9</code>).</li>
      <li>La partie après <code>#</code> (fragment) n’est <strong>jamais</strong> envoyée au serveur.</li>
    </ul>

    <h3>Astuce bonus — petite fonction utilitaire</h3>
    <pre>&lt;?php
// Petite aide pour échapper rapidement
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
// usage : echo 'Thème: ' . e($theme);
?&gt;</pre>
  </section>

</body>
</html>
