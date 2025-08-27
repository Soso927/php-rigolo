<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP — Fonction rand() — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Fonction <code>rand()</code></h1>

  <h2>Description</h2>
  <p>
    La fonction <code>rand()</code> génère un <strong>nombre aléatoire</strong>.  
    On peut l’utiliser de deux façons :
  </p>
  <ul>
    <li><code>rand()</code> → renvoie un nombre entier aléatoire très grand (entre 0 et une valeur max interne).</li>
    <li><code>rand(min, max)</code> → renvoie un nombre entier compris entre <code>min</code> et <code>max</code> inclus.</li>
  </ul>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Nombre aléatoire sans limite</h2>
    <h3>Code</h3>
    <pre>&lt;?php
// 1) Appel simple
echo rand();
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">156476233 (exemple, change à chaque exécution)</p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Nombre aléatoire entre deux bornes</h2>
    <h3>Code</h3>
    <pre>&lt;?php
// Un nombre entre 1 et 10 inclus
echo rand(1, 10);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">7 (exemple, peut être 1, 2… jusqu’à 10)</p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Simulation d’un dé </h2>
    <h3>Code</h3>
    <pre>&lt;?php
// Dé à 6 faces
$de = rand(1, 6);
echo "Tu as lancé le dé et obtenu : " . $de;
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Tu as lancé le dé et obtenu : 4</p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — Générer un mot de passe numérique simple</h2>
    <h3>Code</h3>
    <pre>&lt;?php
// Mot de passe à 4 chiffres
$motdepasse = rand(1000, 9999);
echo "Mot de passe généré : " . $motdepasse;
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Mot de passe généré : 5823</p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — Tirage au sort d’un élément dans une liste</h2>
    <h3>Code</h3>
    <pre>&lt;?php
$participants = ["Alice", "Bruno", "Chloé", "David"];

// 1) Nombre aléatoire entre 0 et (taille-1)
$index = rand(0, count($participants)-1);

// 2) On prend l'élément correspondant
$gagnant = $participants[$index];

echo "Le gagnant est : " . $gagnant;
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Le gagnant est : Chloé</p>
  </section>

  <!-- ===================== Exemple 6 ===================== -->
  <section>
    <h2>Exemple 6 — Jeu « Devine le nombre »</h2>
    <p>Petit jeu où le programme choisit un nombre aléatoire et l’utilisateur doit le deviner.</p>
    <h3>Code</h3>
    <pre>&lt;?php
$nombre_secret = rand(1, 10);
$essai = 7; // Imaginons que l'utilisateur propose 7

if ($essai === $nombre_secret) {
    echo "Bravo ! Tu as trouvé le nombre secret : $nombre_secret";
} else {
    echo "Raté, le nombre secret était : $nombre_secret";
}
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">Raté, le nombre secret était : 3</p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li><code>rand()</code> produit des nombres pseudo-aléatoires (ils dépendent d’un algorithme, pas du vrai hasard).</li>
      <li><code>mt_rand()</code> est une version plus rapide et plus fiable (souvent utilisée à la place de <code>rand()</code>).</li>
      <li>Utilisations fréquentes : jeux , mots de passe temporaires , tirages au sort , échantillons aléatoires .</li>
      <li> Pour la sécurité (ex. vrais mots de passe, tokens), préférer <code>random_int()</code> (cryptographiquement sûr).</li>
    </ul>
  </section>

</body>
</html>
