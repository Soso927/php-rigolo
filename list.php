<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP — Fonction list() — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Fonction <code>list()</code></h1>

  <h2>Description</h2>
  <p>
    <code>list()</code> permet d’<strong>affecter plusieurs variables en une fois</strong> à partir d’un <strong>tableau indexé</strong> (avec des clés numériques 0, 1, 2, …).
    Les valeurs sont lues dans <em>l’ordre</em> du tableau. Idéal quand une fonction renvoie un tableau (ex. <code>explode()</code>).
  </p>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Décomposition simple d’un tableau</h2>
    <h3>Code</h3>
    <pre>&lt;?php
/ Petite fonction d'échappement pour l'affichage HTML
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// 1) Un tableau indexé (positions 0, 1, 2)
$personne = ['Luna', 28, 'Lyon']; // 0 => 'Luna', 1 => 28, 2 => 'Lyon'

// 2) On "dépaquette" (déstructure) en 3 variables
list($prenom, $age, $ville) = $personne;

// 3) Affichage
echo 'Prénom=' . e((string)$prenom) . ', Âge=' . e((string)$age) . ', Ville=' . e((string)$ville);
?&gt;</pre>
    <h3>Affichage</h3>

  <p>Prénom=Luna, Âge=28, Ville=Lyon</p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Avec <code>explode()</code> (prénom, nom)</h2>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// 1) Une chaîne "Prenom Nom"
$identite = "Sam Dupont";

// 2) On découpe par l'espace → tableau ["Sam", "Dupont"]
$parts = explode(' ', $identite);

// 3) On récupère proprement les 2 premiers éléments
list($prenom, $nom) = $parts;

// 4) Affichage
echo 'Bonjour ' . e($prenom) . ' ' . e($nom);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Bonjour Sam Dupont</p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Ignorer certains éléments</h2>
    <p><em>Astuce :</em> on peut laisser un “trou” en mettant une virgule sans variable.</p>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// 1) Tableau : [id, code, libellé, prix]
$article = [42, 'A12', 'Clavier', 29.90];

// 2) On ne veut que libellé et prix → on ignore id et code
list(, , $libelle, $prix) = $article;

echo 'Produit: ' . e($libelle) . ' — Prix: ' . e((string)$prix) . ' €';
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Produit: Clavier — Prix: 29.9 €</p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — Avec <code>foreach</code> (lignes de “table”)</h2>
    <p>Pratique si chaque “ligne” est un tableau indexé (ex. résultat de CSV, requête simple, etc.).</p>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

$rows = [
  [1, 'Alice',  'alice@example.com'],
  [2, 'Bruno',  'bruno@example.com'],
  [3, 'Chloé',  'chloe@example.com'],
];

// 1) On décompose chaque ligne en (id, nom, email)
foreach ($rows as $row) {
    list($id, $nom, $email) = $row;
    echo 'ID=' . e((string)$id) . ' — ' . e($nom) . ' — ' . e($email) . "&lt;br&gt;";
}
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      ID=1 — Alice — alice@example.com<br>
      ID=2 — Bruno — bruno@example.com<br>
      ID=3 — Chloé — chloe@example.com
    </p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — list() et clés numériques (attention à l’ordre)</h2>
    <p><strong>Important :</strong> <code>list()</code> utilise l’ordre des éléments, pas les noms de clés. Avec un tableau associatif non ordonné ou réordonné, le résultat peut surprendre.</p>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// 1) Tableau associatif mais avec un certain ordre d'insertion
$assoc = ['b' =&gt; 'deux', 'a' =&gt; 'un', 'c' =&gt; 'trois'];

// 2) list() va prendre les valeurs dans l'ordre interne du tableau
list($v1, $v2) = $assoc;

echo 'v1=' . e($v1) . ', v2=' . e($v2);
// Selon l'ordre interne, cela peut afficher "deux, un" (pas "a, b" !)
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">v1=deux, v2=un</p>
    <p><em>Conseil :</em> avec des tableaux associatifs, préfère la “déstructuration” par clés (voir Notes utiles).</p>
  </section>

  <!-- ===================== Exemple 6 ===================== -->
  <section>
    <h2>Exemple 6 — list() avec <code>pathinfo()</code></h2>
    <p><code>pathinfo()</code> peut donner facilement plusieurs infos sur un fichier.</p>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

$info = pathinfo('/var/www/images/photo.png');
// $info est un tableau associatif : ['dirname' =&gt; ..., 'basename' =&gt; ..., 'extension' =&gt; ..., 'filename' =&gt; ...]

// 1) On reconstitue un tableau indexé dans l'ordre qu'on veut
$parts = [$info['dirname'] ?? '', $info['basename'] ?? '', $info['extension'] ?? '', $info['filename'] ?? ''];

// 2) On décompose avec list()
list($dir, $base, $ext, $name) = $parts;

echo 'Dossier: ' . e($dir) . '&lt;br&gt;';
echo 'Nom complet: ' . e($base) . '&lt;br&gt;';
echo 'Extension: ' . e($ext) . '&lt;br&gt;';
echo 'Nom sans extension: ' . e($name);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      Dossier: /var/www/images<br>
      Nom complet: photo.png<br>
      Extension: png<br>
      Nom sans extension: photo
    </p>
  </section>

  <!-- ===================== Exemple 7 ===================== -->
  <section>
    <h2>Exemple 7 — list() imbriqué (niveau débutant)</h2>
    <p>On peut imbriquer <code>list()</code> pour des tableaux à l’intérieur d’autres tableaux (reste rare dans les débuts, mais utile à voir).</p>
    <h3>Code</h3>
    <pre>&lt;?php
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

$data = [100, ['px', 200]];

// 1) On récupère 100 dans $a, puis dans le 2e élément on récupère 'px' et 200
list($a, list($unit, $value)) = $data;

echo 'a=' . e((string)$a) . ', unit=' . e($unit) . ', value=' . e((string)$value);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">a=100, unit=px, value=200</p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li><strong>Ordre</strong> : <code>list()</code> affecte selon l’ordre des éléments du tableau, pas selon les noms de clés.</li>
      <li><strong>Tableaux associatifs</strong> : évite <code>list()</code> si tu comptes sur des clés nommées. Préfère la <em>déstructuration par clés</em> (PHP&nbsp;7.1+) :</li>
    </ul>

    <h3>Astuce — Déstructuration par clés (alternative moderne)</h3>
    <pre>&lt;?php
// Pour les tableaux associatifs, on peut cibler les clés directement (PHP 7.1+)
$user = ['id' =&gt; 7, 'nom' =&gt; 'Sam', 'email' =&gt; 'sam@example.com'];

// On déstructure par NOMS de clés :
['id' =&gt; $id, 'nom' =&gt; $nom, 'email' =&gt; $email] = $user;

echo $id . ' - ' . $nom . ' - ' . $email; // 7 - Sam - sam@example.com
?&gt;</pre>

    <ul>
      <li><strong>Ignorer</strong> des éléments : possible avec des virgules vides, ex. <code>list(, $b, , $d) = $arr;</code></li>
      <li><strong>Compatibilité</strong> : <code>list()</code> fonctionne dès les anciennes versions de PHP. La déstructuration par clés (<code>['clé' =&gt; $var]</code>) nécessite PHP 7.1+.</li>
      <li><strong>Sécurité affichage</strong> : échappe toujours avec <code>htmlspecialchars()</code> (idéalement <code>ENT_QUOTES | ENT_SUBSTITUTE</code> et encodage <code>UTF-8</code>).</li>
    </ul>

    <h3>Petite fonction utilitaire</h3>
    <pre>&lt;?php
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?&gt;</pre>
  </section>

</body>
</html>