<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP — Fonction session_unset() — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Fonction <code>session_unset()</code></h1>

  <h2>Description</h2>
  <p>
    <code>session_unset()</code> supprime toutes les variables enregistrées dans 
    <code>$_SESSION</code>.  
     La session elle-même (l’ID de session) n’est pas détruite, elle continue d’exister tant qu’on n’appelle pas 
    <code>session_destroy()</code>.
  </p>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Vider toutes les variables de session</h2>
    <h3>Code</h3>
    <pre>&lt;?php
session_start();

// 1) On ajoute deux variables en session
$_SESSION["nom"] = "Alice";
$_SESSION["age"] = 25;

// 2) Affichage avant session_unset()
echo "Avant session_unset : &lt;br&gt;";
print_r($_SESSION);

// 3) On vide les variables de session
session_unset();

// 4) Affichage après session_unset()
echo "&lt;br&gt;&lt;br&gt;Après session_unset : &lt;br&gt;";
print_r($_SESSION);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      Avant session_unset : Array ( [nom] => Alice [age] => 25 )<br>
      Après session_unset : Array ( )
    </p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Différence entre session_unset() et session_destroy()</h2>
    <h3>Code</h3>
    <pre>&lt;?php
session_start();

// 1) On met deux variables
$_SESSION["pseudo"] = "Esther";
$_SESSION["role"]   = "Admin";

echo "Contenu initial : &lt;br&gt;";
print_r($_SESSION);

// 2) On vide les variables (mais la session existe encore)
session_unset();
echo "&lt;br&gt;&lt;br&gt;Après session_unset : &lt;br&gt;";
print_r($_SESSION);

// 3) On détruit complètement la session
session_destroy();
echo "&lt;br&gt;&lt;br&gt;Après session_destroy : &lt;br&gt;";
print_r($_SESSION);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      Contenu initial : Array ( [pseudo] => Esther [role] => Admin )<br><br>
      Après session_unset : Array ( )<br><br>
      Après session_destroy : Array ( )
    </p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Déconnexion utilisateur</h2>
    <p>Cas pratique : quand un utilisateur clique sur «&nbsp;Déconnexion&nbsp;», on veut vider ses données et détruire la session.</p>
    <h3>Code</h3>
    <pre>&lt;?php
session_start();

// Supposons que l'utilisateur est connecté
$_SESSION["id"]   = 123;
$_SESSION["mail"] = "alice@example.com";

echo "Avant déconnexion : &lt;br&gt;";
print_r($_SESSION);

// Déconnexion : on efface puis on détruit
session_unset();
session_destroy();

echo "&lt;br&gt;&lt;br&gt;Après déconnexion : &lt;br&gt;";
print_r($_SESSION);
?&gt;</pre>
    <h3>Affichage</h3>
    <p class="result">
      Avant déconnexion : Array ( [id] => 123 [mail] => alice@example.com )<br><br>
      Après déconnexion : Array ( )
    </p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li><code>session_unset()</code> = vide toutes les variables de session.</li>
      <li><code>session_destroy()</code> = détruit complètement la session (l’ID et les données).</li>
      <li>Souvent, on utilise les deux ensemble pour une déconnexion propre.</li>
      <li>Toujours commencer par <code>session_start()</code> avant d’utiliser <code>$_SESSION</code>.</li>
    </ul>

    <h3>Astuce bonus — fonction de déconnexion réutilisable</h3>
    <pre>&lt;?php
function deconnecter() {
    session_unset();   // vide les variables
    session_destroy(); // détruit la session
}
?&gt;</pre>
  </section>

</body>
</html>
