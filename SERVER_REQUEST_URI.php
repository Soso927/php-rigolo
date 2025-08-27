<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Superglobale $_SERVER['REQUEST_URI'] — Exemples clairs</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1>Superglobale <code>$_SERVER['REQUEST_URI']</code></h1>

    <h2>Description</h2>
    <p>
        <code>$_SERVER['REQUEST_URI']</code> contient l’<strong>URI demandée</strong> par le navigateur&nbsp;:
        c’est le <em>chemin</em> et la <em>query string</em> (ce qui suit le <code>?</code>) envoyés au serveur.
        Exemples&nbsp;: <code>/index.php</code>, <code>/produits?id=5</code>,
        <code>/blog/article/42?tri=date&amp;page=2</code>.
        C’est très utile pour <strong>connaître la page appelée</strong>, faire un <strong>router</strong>, ou lire
        facilement
        la partie «&nbsp;URL demandée&nbsp;».
    </p>

    <!-- ===================== Exemple 1 ===================== -->
    <section>
        <h2>Exemple 1 — Afficher l’URI brute</h2>
        <p><strong>URL à tester :</strong> <code>http://exemple.com/SERVER_REQUEST_URI.php?cat=php&amp;id=10</code></p>
        <h3>Code</h3>
        <pre>&lt;?php
// On affiche directement la valeur brute (toujours l'échapper avant d'afficher)
$uri = $_SERVER['REQUEST_URI'] ?? '';
echo htmlspecialchars($uri, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
        <h3>Affichage</h3>
        <p class="result">/SERVER_REQUEST_URI.php?cat=php&amp;id=10</p>
    </section>

    <!-- ===================== Exemple 2 ===================== -->
    <section>
        <h2>Exemple 2 — Séparer le chemin et la query string</h2>
        <p><strong>URL à tester :</strong> <code>http://exemple.com/produits/liste.php?tri=prix&amp;page=2</code></p>
        <h3>Code</h3>
        <pre>&lt;?php
$uri = $_SERVER['REQUEST_URI'] ?? '';
$parts = parse_url($uri);           // Renvoie un tableau: [path] et éventuellement [query]

$path  = $parts['path']  ?? '';
$query = $parts['query'] ?? '';

echo 'Chemin: ' . htmlspecialchars($path,  ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "&lt;br&gt;";
echo 'Query : ' . htmlspecialchars($query, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
        <h3>Affichage</h3>
        <p class="result">Chemin: /produits/liste.php<br>Query : tri=prix&amp;page=2</p>
    </section>

    <!-- ===================== Exemple 3 ===================== -->
    <section>
        <h2>Exemple 3 — Mini-router (PATH_INFO like)</h2>
        <p><strong>URL à tester :</strong> <code>http://exemple.com/app.php/articles/42?preview=1</code></p>
        <p>Idée : on enlève le nom du script pour récupérer la «&nbsp;route&nbsp;» après.</p>
        <h3>Code</h3>
        <pre>&lt;?php
// Exemple simple pour récupérer la "route" après le script
$uri  = $_SERVER['REQUEST_URI'] ?? '';
$self = $_SERVER['PHP_SELF']     ?? ''; // ex: /app.php

$parts    = parse_url($uri);
$path     = $parts['path'] ?? '';
$route    = '';

if ($self !== '' &amp;&amp; str_starts_with($path, $self)) {
    $route = substr($path, strlen($self)); // ex: /articles/42
} else {
    // Plan B: si le script n'est pas en front controller, on peut juste utiliser $path
    $route = $path;
}

$route = ltrim($route, '/'); // Nettoyage début
echo 'Route: ' . htmlspecialchars($route, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
        <h3>Affichage</h3>
        <p class="result">Route: articles/42</p>
    </section>

    <!-- ===================== Exemple 4 ===================== -->
    <section>
        <h2>Exemple 4 — Lire la query string proprement</h2>
        <p><strong>URL à tester :</strong> <code>http://exemple.com/page.php?search=PHP%20&amp;tri=date</code></p>
        <h3>Code</h3>
        <pre>&lt;?php
$uri   = $_SERVER['REQUEST_URI'] ?? '';
$parts = parse_url($uri);

$params = [];
if (isset($parts['query'])) {
    parse_str($parts['query'], $params);  // Remplit $params avec un tableau associatif
}

function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

echo 'search = ' . e($params['search'] ?? '') . "&lt;br&gt;";
echo 'tri    = ' . e($params['tri']    ?? '');
?&gt;</pre>
        <h3>Affichage</h3>
        <p class="result">search = PHP <br>tri = date</p>
    </section>

    <!-- ===================== Exemple 5 ===================== -->
    <section>
        <h2>Exemple 5 — Construire l’URL «&nbsp;courante&nbsp;» complète</h2>
        <p><strong>URL à tester :</strong> <code>https://exemple.com/sous/dossier/page.php?x=1</code></p>
        <h3>Code</h3>
        <pre>&lt;?php
$scheme = (!empty($_SERVER['HTTPS']) &amp;&amp; $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = $_SERVER['HTTP_HOST']   ?? ($_SERVER['SERVER_NAME'] ?? 'localhost');
$uri    = $_SERVER['REQUEST_URI'] ?? '/';

$currentUrl = $scheme . '://' . $host . $uri;

echo htmlspecialchars($currentUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?&gt;</pre>
        <h3>Affichage</h3>
        <p class="result">https://exemple.com/sous/dossier/page.php?x=1</p>
    </section>

    <!-- ===================== Notes utiles ===================== -->
    <section>
        <h2>Notes utiles</h2>
        <ul>
            <li><strong>Toujours échapper</strong> ce que vous affichez depuis l’URI : <code>htmlspecialchars()</code>.
            </li>
            <li><code>REQUEST_URI</code> inclut le <strong>chemin</strong> et la <strong>query string</strong>, pas le
                domaine.</li>
            <li>Pour extraire proprement, utilisez <code>parse_url()</code> puis <code>parse_str()</code> pour la query.
            </li>
            <li>Le fragment après <code>#</code> (<em>hash</em>) n’est <strong>jamais</strong> envoyé au serveur.</li>
            <li>Selon la config serveur, certaines valeurs (ex. <code>HTTP_HOST</code>) peuvent être absentes ou
                différentes.</li>
        </ul>
    </section>

</body>

</html>