<!DOCTYPE html> <!-- Indique que le document est en HTML5 -->
<html lang="fr"> <!-- Début du document HTML, langue principale : français -->

<head> <!-- En-tête du document (métadonnées, titre, CSS) -->
    <meta charset="UTF-8"> <!-- Encodage en UTF-8 pour gérer les accents/caractères spéciaux -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Compatibilité avec les moteurs IE récents -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive pour mobiles/tablettes -->
    <link rel="stylesheet" href="css/style.css"> <!-- Lien vers ta feuille de styles globale -->
    <title>Fonction file_put_contents() (PHP)</title> <!-- Titre de l’onglet du navigateur -->
</head>

<body> <!-- Contenu visible de la page -->
    <h1>La Fonction <code>file_put_contents()</code> (PHP)</h1> <!-- Titre principal de la page -->

    <h2>Description</h2> <!-- Sous-titre : description -->
    <p> <!-- Paragraphe d’explication -->
        La fonction <code>file_put_contents()</code> permet d’écrire directement dans un fichier, en une seule ligne. <!-- Rôle général -->
        <br> <!-- Retour à la ligne -->
        Elle remplace l’usage combiné de <code>fopen()</code>, <code>fwrite()</code> et <code>fclose()</code>. <!-- Avantage principal -->
    </p>

    <h2>MÉMO</h2> <!-- Sous-titre : mémo rapide -->
    <ul> <!-- Liste à puces du mémo -->
        <li><code>file_put_contents($fichier, $data)</code> : écrit les données (écrase par défaut).</li> <!-- Comportement par défaut -->
        <li>Retourne le nombre d’octets écrits, ou <code>false</code> en cas d’erreur.</li> <!-- Valeur de retour -->
        <li>Avec <code>FILE_APPEND</code>, ajoute à la fin au lieu d’écraser.</li> <!-- Option d’append -->
        <li>Crée le fichier s’il n’existe pas.</li> <!-- Création implicite -->
    </ul>

    <hr> <!-- Trait de séparation visuelle -->

    <h2>Exemple 1 : Écriture simple</h2> <!-- Titre de l’exemple 1 -->

    <h3>Code</h3> <!-- Sous-titre : affichage du code -->
    <pre> <!-- Bloc préformaté pour AFFICHER le code (non exécuté) -->
&lt;?php
file_put_contents("demo_put1.txt", "Bonjour avec file_put_contents !");
echo "Fichier écrit.";
?&gt;
    </pre> <!-- Fin de l’affichage du code -->

    <h3>Résultat</h3> <!-- Sous-titre : résultat exécuté -->
    <?php
    // 1) Définir le chemin complet vers le fichier dans le même dossier que cette page
    $file1 = __DIR__ . "/demo_put1.txt"; // __DIR__ = dossier courant du script

    // 2) Écrire une chaîne dans le fichier (créé s’il n’existe pas, écrasé sinon)
    file_put_contents($file1, "Bonjour avec file_put_contents !"); // Écriture simple

    // 3) Lire le contenu du fichier et l’afficher dans un <pre>, en échappant le HTML potentiel
    echo "<pre>" . htmlspecialchars(file_get_contents($file1)) . "</pre>"; // Affichage sécurisé
    ?> <!-- Fin du bloc PHP de l’exemple 1 -->

    <hr> <!-- Séparateur -->

    <h2>Exemple 2 : Ajout (append)</h2> <!-- Titre de l’exemple 2 -->

    <h3>Code</h3> <!-- Sous-titre : affichage du code -->
    <pre> <!-- Bloc préformaté pour AFFICHER le code (non exécuté) -->
&lt;?php
file_put_contents("demo_put2.txt", "Première ligne\n");               // Écrit et écrase si existant
file_put_contents("demo_put2.txt", "Deuxième ligne\n", FILE_APPEND); // Ajoute à la fin
echo file_get_contents("demo_put2.txt");                              // Lit et affiche
?&gt;
    </pre> <!-- Fin de l’affichage du code -->

    <h3>Résultat</h3> <!-- Sous-titre : résultat exécuté -->
    <?php
    // 1) Chemin du fichier de démo n°2
    $file2 = __DIR__ . "/demo_put2.txt"; // Fichier de test

    // 2) Écriture d’une première ligne (réinitialise le fichier si existant)
    file_put_contents($file2, "Première ligne\n"); // Mode par défaut : écrase

    // 3) Ajout d’une seconde ligne à la fin grâce à l’option FILE_APPEND
    file_put_contents($file2, "Deuxième ligne\n", FILE_APPEND); // Append

    // 4) Lecture puis affichage du contenu (échappé pour éviter d’injecter du HTML)
    echo "<pre>" . htmlspecialchars(file_get_contents($file2)) . "</pre>"; // Visualisation
    ?> <!-- Fin du bloc PHP de l’exemple 2 -->

    <hr> <!-- Séparateur -->

    <h2>Exemple 3 : Sauvegarde JSON</h2> <!-- Titre de l’exemple 3 -->

    <h3>Code</h3> <!-- Sous-titre : affichage du code -->
    <pre> <!-- Bloc préformaté pour AFFICHER le code (non exécuté) -->
&lt;?php
$data = ["nom" =&gt; "Alice", "age" =&gt; 25];                 // Tableau associatif PHP
$json = json_encode($data, JSON_PRETTY_PRINT);            // Conversion en JSON lisible
file_put_contents("user.json", $json);                    // Écriture du JSON dans un fichier
echo file_get_contents("user.json");                      // Lecture/affichage du fichier JSON
?&gt;
    </pre> <!-- Fin de l’affichage du code -->

    <h3>Résultat</h3> <!-- Sous-titre : résultat exécuté -->
    <?php
    // 1) Préparer des données sous forme de tableau associatif
    $data = ["nom" => "Alice", "age" => 25]; // Données de test

    // 2) Convertir le tableau PHP en chaîne JSON au format lisible (indenté)
    $json = json_encode($data, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT = retours à la ligne/indentations

    // 3) Déterminer le chemin complet du fichier JSON à créer/écraser
    $file3 = __DIR__ . "/user.json"; // Fichier JSON cible

    // 4) Écrire la chaîne JSON dans le fichier (créé s’il n’existe pas)
    file_put_contents($file3, $json); // Sauvegarde JSON

    // 5) Lire le contenu du fichier JSON et l’afficher dans un <pre>, échappé
    echo "<pre>" . htmlspecialchars(file_get_contents($file3)) . "</pre>"; // Affichage du JSON
    ?> <!-- Fin du bloc PHP de l’exemple 3 -->

</body> <!-- Fin du contenu visible -->
</html> <!-- Fin du document HTML -->
