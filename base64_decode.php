<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fonction base64_decode()</title>
  <link rel="stylesheet" href="css/style.css" />
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;line-height:1.55;margin:24px;color:#222}
    h1 code, h2 code{font-size: .9em}
    pre{background:#222;color:#eee;padding:14px;border-radius:8px;overflow:auto}
    .result{background:#f6f8fa;border:1px solid #e1e4e8;padding:10px;border-radius:6px}
    .card{border:1px solid #e5e7eb;border-radius:10px;padding:16px;margin:18px 0}
    .muted{color:#666}
    .schema{display:block;margin:18px auto;border:1px solid #e5e7eb;border-radius:8px}
    .grid{display:grid;gap:16px}
    @media(min-width:900px){.grid{grid-template-columns:1fr 1fr}}
    .badge{display:inline-block;background:#0ea5e9;color:#fff;padding:.18rem .5rem;border-radius:999px;font-size:.85rem}
    .ok{color:#059669;font-weight:600}
    .ko{color:#b91c1c;font-weight:600}
    .imgbox{display:inline-flex;gap:10px;align-items:center;background:#fff;border:1px dashed #bbb;padding:10px;border-radius:8px}
    .caption{font-size:.9rem;color:#555}
  </style>
</head>
<body>

  <h1>Fonction <code>base64_decode()</code></h1>

  <h2>Description</h2>
  <p>
    <code>base64_decode()</code> sert à <strong>revenir au texte/données d’origine</strong> à partir d’une chaîne encodée en Base64.
    C’est l’inverse de <code>base64_encode()</code>. On l’utilise pour des textes, des images, ou des fichiers qui ont été
    transformés en Base64 pour être transmis facilement (e-mail, JSON, URL, etc.).
  </p>

  <!-- Schéma explicatif (SVG) -->
  <h2>Schéma</h2>
  <svg class="schema" width="880" height="150" viewBox="0 0 880 150" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <style>
        .b{fill:#0ea5e9}.g{fill:#10b981}.box{fill:#ffffff;stroke:#cbd5e1;stroke-width:2}
        .t{font:14px/1.2 system-ui,Segoe UI,Arial}.mut{fill:#64748b}
        .arr{stroke:#334155;stroke-width:2;marker-end:url(#arrow)}
      </style>
      <marker id="arrow" markerWidth="10" markerHeight="10" refX="8" refY="3" orient="auto">
        <polygon points="0 0, 10 3, 0 6" fill="#334155"/>
      </marker>
    </defs>
    <!-- Texte normal -->
    <rect x="20" y="30" width="180" height="70" rx="10" class="box"/>
    <text x="110" y="65" text-anchor="middle" class="t"><tspan class="g">Texte normal</tspan></text>
    <text x="110" y="85" text-anchor="middle" class="t mut">"Bonjour"</text>

    <line x1="200" y1="65" x2="300" y2="65" class="arr"/>
    <text x="250" y="45" text-anchor="middle" class="t">base64_encode()</text>

    <!-- Base64 -->
    <rect x="300" y="30" width="260" height="70" rx="10" class="box"/>
    <text x="430" y="65" text-anchor="middle" class="t"><tspan class="b">Chaîne Base64</tspan></text>
    <text x="430" y="85" text-anchor="middle" class="t mut">"Qm9uam91cg=="</text>

    <line x1="560" y1="65" x2="660" y2="65" class="arr"/>
    <text x="610" y="45" text-anchor="middle" class="t">base64_decode()</text>

    <!-- Retour texte -->
    <rect x="660" y="30" width="200" height="70" rx="10" class="box"/>
    <text x="760" y="65" text-anchor="middle" class="t"><tspan class="g">Texte normal</tspan></text>
    <text x="760" y="85" text-anchor="middle" class="t mut">"Bonjour"</text>
  </svg>

  <div class="grid">

    <!-- Exemple 1 : chaîne classique -->
    <section class="card">
      <h2>Exemple 1 — Chaîne classique</h2>
      <p class="muted">On décode une chaîne Base64 anglaise fournie par la doc.</p>
      <h3>Code</h3>
      <pre>&lt;?php
$str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
echo base64_decode($str); // affiche : This is an encoded string
?&gt;</pre>
      <h3>Résultat</h3>
      <p class="result">This is an encoded string</p>
    </section>

    <!-- Exemple 2 : texte français (UTF-8) -->
    <section class="card">
      <h2>Exemple 2 — Texte en français (UTF-8)</h2>
      <p class="muted">On affiche une phrase en français en décodant sa version Base64.</p>
      <h3>Code</h3>
      <pre>&lt;?php
// "Ceci est une chaîne encodée"
$fr = 'Q2VjaSBlc3QgdW5lIGNoYWluZSBlbmNvZGVl';
echo base64_decode($fr);
?&gt;</pre>
      <h3>Résultat</h3>
      <p class="result">Ceci est une chaîne encodée</p>
    </section>

    <!-- Exemple 3 : strict=true -->
    <section class="card">
      <h2>Exemple 3 — <span class="badge">strict = true</span></h2>
      <p class="muted">Si la chaîne contient des caractères interdits, on obtient <code>false</code>.</p>
      <h3>Code</h3>
      <pre>&lt;?php
$invalide = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw$'; // '$' interdit
var_dump( base64_decode($invalide, true) ); // bool(false)
?&gt;</pre>
      <h3>Résultat</h3>
      <p class="result"><span class="ko">bool(false)</span></p>
    </section>

    <!-- Exemple 4 : image Base64 affichée -->
    <section class="card">
      <h2>Exemple 4 — Afficher une image encodée en Base64</h2>
      <p class="muted">On insère une petite image (PNG) en Base64 directement dans <code>src</code>.</p>
      <h3>Code</h3>
      <pre>&lt;img
  alt="carré"
  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAH0lEQVQoU2NkYGD4z0ABYBw1gGE0GJgGJgYQyGAAAO4lB5q0mI9QAAAABJRU5ErkJggg=="
/&gt;</pre>
      <h3>Résultat</h3>
      <div class="imgbox">
        <img alt="carré" width="20" height="20"
             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAH0lEQVQoU2NkYGD4z0ABYBw1gGE0GJgGJgYQyGAAAO4lB5q0mI9QAAAABJRU5ErkJggg==" />
        <span class="caption">petit PNG (10×10) intégré en Base64</span>
      </div>
    </section>

  </div>

  <!-- Exemple 5 : décoder et sauvegarder une image (code serveur) -->
  <section class="card">
    <h2>Exemple 5 — (Serveur) Décoder & sauvegarder une image</h2>
    <p class="muted">
      On reçoit souvent des images sous forme <em>data URL</em> (ex. d’un &lt;canvas&gt; JavaScript).
      Il faut retirer le préfixe puis décoder et écrire dans un fichier.
    </p>
    <h3>Code</h3>
    <pre>&lt;?php
$dataUrl = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAH0lEQVQoU2NkYGD4z0ABYBw1gGE0GJgGJgYQyGAAAO4lB5q0mI9QAAAABJRU5ErkJggg==';

// 1) retirer le préfixe "data:image/...;base64,"
$base64 = preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl);

// 2) décoder (strict)
$bin = base64_decode($base64, true);
if ($bin === false) {
  die('Chaîne base64 invalide');
}

// 3) écrire le fichier
file_put_contents('output.png', $bin);
echo 'OK → fichier output.png créé';
?&gt;</pre>
    <p class="muted">
      💡 En prod, vérifie le type MIME avec <code>finfo_file()</code> et un nom de fichier sûr.
    </p>
  </section>

  <footer class="muted">
    Voir aussi : <code>base64_encode()</code> (l’inverse). — Astuce : <code>base64_decode($s, true)</code> pour exiger une chaîne 100% valide.
  </footer>

</body>
</html>
