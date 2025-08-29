<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction <code></code></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Fonction <code></code></h1>

    <h2>Description</h2>
    <p>
        <strong>unlink()</strong> supprime un fichier (comme « Supprimer / Delete ») et renvoie <code>true</code> ou
        <code>false</code> ; en cas d’échec, PHP émet un <code>E_WARNING</code>.<br> Signature :
        <code>unlink(string $filename, ?resource $context = null): bool</code>.<br>
        souviens-toi que l’action est <strong>définitive</strong> — fais une
        copie avant si besoin.<br><br> Étapes simples :
        <code>$f='chemin/fichier.txt'; if(file_exists($f) && is_writable($f)){ $ok=unlink($f); }</code> (vérifie d’abord
        l’existence et les droits).<br> Particularités : un lien symbolique est supprimé lui-même ; sur Windows, pour un
        lien symbolique vers un dossier, utilise <code>rmdir()</code>.
    </p>

    <h2>Exemple</h2>

    <h3>Code</h3>
    <pre>
&lt;?php
$fh = fopen('test.html', 'a');
fwrite($fh, '<h1>Hello world!</h1>');
fclose($fh);

unlink('test.html');
?&gt;
    </pre>

    <h3>Résultat</h3>
    <p>
        <?php
        // (débogage utile)
        ini_set('display_errors', 1); // ini_set = modifie une directive de configuration display_errors = nom de la directive INI ciblée (afficher les erreurs).
        error_reporting(E_ALL); //fonction PHP qui définit le niveau d’erreurs à signaler (quelles erreurs PHP doit remonter).
        //constante qui signifie « toutes les erreurs » (notices, avertissements, dépréciations, erreurs fatales, etc.).
        
        // Construit le chemin complet : répertoire du script (__DIR__) + '/test.html'
        $f = __DIR__ . '/test.html';

        // 1) Créer le fichier
        file_put_contents($f, '<h1>Hello world!</h1>');
        echo "<strong>Fichier créé :</strong> $f<br>";

        // 2) Afficher son contenu dans la page
        echo "<strong>Contenu :</strong> ";
        echo file_get_contents($f); // rendra le <h1>Hello world!</h1>
        
        // 3) Supprimer le fichier
        if (unlink($f)) {
            echo "<br><strong>Fichier supprimé avec unlink().</strong>";
        } else {
            echo "<br><strong>Échec de la suppression.</strong>";
        }
        ?>
    </p>
</body>

</html>