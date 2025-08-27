<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Superglobale $_POST — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Superglobale <code>$_POST</code></h1>

  <h2>Description</h2>
  <p>
    <code>$_POST</code> est un <strong>tableau associatif</strong> contenant les données envoyées via un
    formulaire HTML utilisant la méthode <code>POST</code>.  
    C’est une <em>superglobale</em> : disponible partout sans <code>global</code>.
  </p>
  <p>
     Les données <code>POST</code> ne s’affichent pas dans l’URL (contrairement à <code>$_GET</code>).
  </p>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Récupérer un champ simple</h2>
    <h3>Formulaire HTML</h3>
    <pre>&lt;form method="post" action="page.php"&gt;
  &lt;input type="text" name="prenom" /&gt;
  &lt;button type="submit"&gt;Envoyer&lt;/button&gt;
&lt;/form&gt;</pre>

    <h3>Code PHP (page.php)</h3>
    <pre>&lt;?php
// 1) On récupère "prenom" ou chaîne vide s'il n'existe pas
$prenom = $_POST['prenom'] ?? '';

// 2) On sécurise l’affichage
$prenom = htmlspecialchars($prenom, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// 3) On affiche
echo "Bonjour " . ($prenom !== '' ? $prenom : 'inconnu');
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Bonjour Yannick</p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Valeur par défaut si le champ est vide</h2>
    <h3>Formulaire HTML</h3>
    <pre>&lt;form method="post" action="page.php"&gt;
  &lt;input type="text" name="ville" /&gt;
  &lt;button type="submit"&gt;Envoyer&lt;/button&gt;
&lt;/form&gt;</pre>

    <h3>Code PHP (page.php)</h3>
    <pre>&lt;?php
// Si "ville" est vide, on met "Paris" par défaut
$ville = $_POST['ville'] ?? 'Paris';

echo "Ville : " . htmlspecialchars($ville, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Ville : Paris</p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Plusieurs champs</h2>
    <h3>Formulaire HTML</h3>
    <pre>&lt;form method="post" action="page.php"&gt;
  &lt;input type="text" name="prenom" placeholder="Prénom" /&gt;
  &lt;input type="text" name="nom" placeholder="Nom" /&gt;
  &lt;button type="submit"&gt;Envoyer&lt;/button&gt;
&lt;/form&gt;</pre>

    <h3>Code PHP (page.php)</h3>
    <pre>&lt;?php
$prenom = $_POST['prenom'] ?? '';
$nom    = $_POST['nom'] ?? '';

$prenom = htmlspecialchars($prenom, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$nom    = htmlspecialchars($nom,    ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

echo "Bonjour " . ($prenom !== '' ? $prenom . ' ' : '') . ($nom !== '' ? $nom : 'inconnu');
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Bonjour Sam Dupont</p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — Checkbox et listes</h2>
    <h3>Formulaire HTML</h3>
    <pre>&lt;form method="post" action="page.php"&gt;
  &lt;label&gt;&lt;input type="checkbox" name="interets[]" value="PHP"&gt; PHP&lt;/label&gt;
  &lt;label&gt;&lt;input type="checkbox" name="interets[]" value="JS"&gt; JS&lt;/label&gt;
  &lt;label&gt;&lt;input type="checkbox" name="interets[]" value="SQL"&gt; SQL&lt;/label&gt;
  &lt;button type="submit"&gt;Envoyer&lt;/button&gt;
&lt;/form&gt;</pre>

    <h3>Code PHP (page.php)</h3>
    <pre>&lt;?php
$interets = $_POST['interets'] ?? [];

if (!is_array($interets)) {
    $interets = [$interets];
}

$interets_safe = array_map(
    static fn($v) =&gt; htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
    $interets
);

echo "Intérêts : " . implode(", ", $interets_safe);
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Intérêts : PHP, JS, SQL</p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — Champs numériques avec contrôle</h2>
    <h3>Formulaire HTML</h3>
    <pre>&lt;form method="post" action="page.php"&gt;
  &lt;input type="number" name="age" /&gt;
  &lt;button type="submit"&gt;Envoyer&lt;/button&gt;
&lt;/form&gt;</pre>

    <h3>Code PHP (page.php)</h3>
    <pre>&lt;?php
$age_str = $_POST['age'] ?? null;

if ($age_str !== null &amp;&amp; filter_var($age_str, FILTER_VALIDATE_INT) !== false) {
    $age = (int) $age_str;
    echo "Âge : " . $age . ", dans 1 an : " . ($age + 1);
} else {
    echo "Âge invalide ou manquant";
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">Âge : 30, dans 1 an : 31</p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li>Toujours sécuriser l’affichage avec <code>htmlspecialchars()</code>.</li>
      <li><code>$_POST</code> contient uniquement les données envoyées par un formulaire <code>POST</code>.</li>
      <li>Les champs non remplis n’apparaissent pas dans <code>$_POST</code> (penser à tester avec <code>??</code> ou <code>isset()</code>).</li>
      <li>Prévoir une validation (entier, email, etc.) avec <code>filter_var()</code> pour éviter les erreurs.</li>
    </ul>
  </section>

</body>
</html>
