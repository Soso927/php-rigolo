<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP — Fonction json_decode() — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Fonction <code>json_decode()</code></h1>

  <h2>Description</h2>
  <p>
    <code>json_decode()</code> convertit une chaîne JSON (<em>JavaScript Object Notation</em>) en une structure PHP.  
  </p>
  <ul>
    <li>Par défaut, le résultat est un <strong>objet</strong> (<code>stdClass</code>).</li>
    <li>Avec le paramètre <code>true</code>, le résultat est un <strong>tableau associatif</strong>.</li>
  </ul>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — JSON → Objet PHP</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$json = '{"nom":"Alice","age":25}';

// 1) Conversion en objet PHP
$obj = json_decode($json);

// 2) Accès aux propriétés
echo $obj-&gt;nom . " a " . $obj-&gt;age . " ans.";
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Alice a 25 ans.</p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — JSON → Tableau associatif</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$json = '{"nom":"Bruno","ville":"Paris"}';

// 1) Conversion en tableau associatif
$data = json_decode($json, true);

// 2) Accès par clés
echo $data["nom"] . " habite à " . $data["ville"];
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Bruno habite à Paris</p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — JSON avec tableau</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$json = '["PHP","JavaScript","SQL"]';

// 1) Conversion
$liste = json_decode($json, true);

// 2) Parcours
foreach ($liste as $lang) {
    echo $lang . "&lt;br&gt;";
}
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      PHP<br>
      JavaScript<br>
      SQL
    </p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — JSON imbriqué</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$json = '{
  "id": 1,
  "nom": "Chloé",
  "emails": ["chloe@mail.com","contact@chloe.fr"]
}';

$data = json_decode($json, true);

// Accès direct
echo "Nom : " . $data["nom"] . "&lt;br&gt;";
echo "Email principal : " . $data["emails"][0];
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      Nom : Chloé<br>
      Email principal : chloe@mail.com
    </p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — Gestion d’erreurs (JSON invalide)</h2>
    <h3>Code</h3>
    <pre>&lt;?php
// Chaîne JSON mal formée (guillemet manquant)
$json = '{"nom":"David","age":30';

$result = json_decode($json);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Erreur JSON : " . json_last_error_msg();
} else {
    echo "Décodage réussi";
}
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Erreur JSON : Syntax error</p>
  </section>

  <!-- ===================== Exemple 6 ===================== -->
  <section>
    <h2>Exemple 6 — Conversion avancée avec options</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$json = '{"pi":3.141592653589793}';

// Décodage avec l’option JSON_BIGINT_AS_STRING (existe aussi pour les très grands nombres)
$data = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

echo "Valeur de pi : " . $data["pi"];
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Valeur de pi : 3.141592653589793</p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li><code>json_decode()</code> ← transforme une chaîne JSON → objet ou tableau PHP.</li>
      <li><code>json_encode()</code> fait l’inverse (tableau PHP → chaîne JSON).</li>
      <li><code>json_last_error()</code> et <code>json_last_error_msg()</code> permettent de vérifier les erreurs de décodage.</li>
      <li>Utiliser <code>true</code> comme 2e argument pour obtenir un tableau associatif au lieu d’un objet.</li>
    </ul>
  </section>

</body>
</html>
