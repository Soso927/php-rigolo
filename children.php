<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP — SimpleXMLElement::children() — Exemples clairs</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Méthode <code>SimpleXMLElement::children()</code></h1>

  <h2>Description</h2>
  <p>
    <code>children()</code> retourne les <strong>éléments enfants</strong> d’un nœud XML comme un objet <code>SimpleXMLElement</code>.
    Tu peux ensuite parcourir ces enfants avec <code>foreach</code>, accéder à leur nom (<code>getName()</code>) et à leur contenu.
  </p>
  <ul>
    <li><code>children()</code> sans argument → enfants dans l’<strong>espace de noms par défaut</strong>.</li>
    <li><code>children($namespace, $isPrefix)</code> → enfants dans un <strong>espace de noms précis</strong> (voir Exemples 4-5).</li>
  </ul>

  <!-- ===================== Exemple 1 ===================== -->
  <section>
    <h2>Exemple 1 — Enfants directs simples</h2>
    <h3>XML</h3>
    <pre>&lt;catalogue&gt;
  &lt;produit&gt;Clavier&lt;/produit&gt;
  &lt;produit&gt;Souris&lt;/produit&gt;
&lt;/catalogue&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;catalogue&gt;&lt;produit&gt;Clavier&lt;/produit&gt;&lt;produit&gt;Souris&lt;/produit&gt;&lt;/catalogue&gt;';
$xml = simplexml_load_string($xmlString);

// 1) On récupère les enfants du nœud racine &lt;catalogue&gt;
$enfants = $xml-&gt;children();

// 2) On parcourt
foreach ($enfants as $child) {
    echo $child-&gt;getName() . ' : ' . (string)$child . "&lt;br&gt;";
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      produit : Clavier<br>
      produit : Souris
    </p>
  </section>

  <!-- ===================== Exemple 2 ===================== -->
  <section>
    <h2>Exemple 2 — Enfants d’un enfant (niveau 2)</h2>
    <h3>XML</h3>
    <pre>&lt;catalogue&gt;
  &lt;produit&gt;
    &lt;nom&gt;Clavier&lt;/nom&gt;
    &lt;prix&gt;29.90&lt;/prix&gt;
  &lt;/produit&gt;
&lt;/catalogue&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;catalogue&gt;&lt;produit&gt;&lt;nom&gt;Clavier&lt;/nom&gt;&lt;prix&gt;29.90&lt;/prix&gt;&lt;/produit&gt;&lt;/catalogue&gt;';
$xml = simplexml_load_string($xmlString);

// 1) On prend le premier &lt;produit&gt;
$produit = $xml-&gt;produit;

// 2) On récupère ses enfants : &lt;nom&gt; et &lt;prix&gt;
foreach ($produit-&gt;children() as $child) {
    echo $child-&gt;getName() . ' : ' . (string)$child . "&lt;br&gt;";
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      nom : Clavier<br>
      prix : 29.90
    </p>
  </section>

  <!-- ===================== Exemple 3 ===================== -->
  <section>
    <h2>Exemple 3 — Tester l’existence d’enfants</h2>
    <h3>XML</h3>
    <pre>&lt;racine&gt;
  &lt;vide/&gt;
  &lt;plein&gt;&lt;enfant&gt;X&lt;/enfant&gt;&lt;/plein&gt;
&lt;/racine&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;racine&gt;&lt;vide/&gt;&lt;plein&gt;&lt;enfant&gt;X&lt;/enfant&gt;&lt;/plein&gt;&lt;/racine&gt;';
$xml = simplexml_load_string($xmlString);

function aDesEnfants(SimpleXMLElement $node): bool {
    // children() retourne un objet que l'on peut compter
    return count($node-&gt;children()) &gt; 0;
}

echo 'vide a des enfants ? ' . (aDesEnfants($xml-&gt;vide) ? 'oui' : 'non') . "&lt;br&gt;";
echo 'plein a des enfants ? ' . (aDesEnfants($xml-&gt;plein) ? 'oui' : 'non');
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      vide a des enfants ? non<br>
      plein a des enfants ? oui
    </p>
  </section>

  <!-- ===================== Exemple 4 ===================== -->
  <section>
    <h2>Exemple 4 — Espaces de noms (namespace) par URI</h2>
    <p>Quand le XML utilise des <em>namespaces</em>, <code>children()</code> peut cibler un espace précis.</p>

    <h3>XML</h3>
    <pre>&lt;root xmlns:shop="http://exemple.com/shop"&gt;
  &lt;shop:produit&gt;
    &lt;shop:nom&gt;Clavier&lt;/shop:nom&gt;
    &lt;shop:prix&gt;29.90&lt;/shop:prix&gt;
  &lt;/shop:produit&gt;
&lt;/root&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;root xmlns:shop="http://exemple.com/shop"&gt;&lt;shop:produit&gt;&lt;shop:nom&gt;Clavier&lt;/shop:nom&gt;&lt;shop:prix&gt;29.90&lt;/shop:prix&gt;&lt;/shop:produit&gt;&lt;/root&gt;';
$xml = simplexml_load_string($xmlString);

// 1) Récupérer le nœud &lt;shop:produit&gt; (enfants de root dans le namespace "shop")
$nsUri = 'http://exemple.com/shop';
$childrenNs = $xml-&gt;children($nsUri); // cible par URI

// 2) Parcourir &lt;shop:produit&gt; puis ses propres enfants dans le même namespace
foreach ($childrenNs as $prod) {
    foreach ($prod-&gt;children($nsUri) as $child) {
        echo $child-&gt;getName() . ' : ' . (string)$child . "&lt;br&gt;";
    }
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      nom : Clavier<br>
      prix : 29.90
    </p>
  </section>

  <!-- ===================== Exemple 5 ===================== -->
  <section>
    <h2>Exemple 5 — Espaces de noms via préfixe</h2>
    <p>
      On peut aussi passer le <strong>préfixe</strong> (ex. <code>shop</code>) si on met <code>$isPrefix = true</code>.
    </p>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;root xmlns:shop="http://exemple.com/shop"&gt;&lt;shop:produit&gt;&lt;shop:nom&gt;Clavier&lt;/shop:nom&gt;&lt;shop:prix&gt;29.90&lt;/shop:prix&gt;&lt;/shop:produit&gt;&lt;/root&gt;';
$xml = simplexml_load_string($xmlString);

// 1) Cibler via le préfixe "shop"
$childrenShop = $xml-&gt;children('shop', true); // true = "ceci est un préfixe"

// 2) Parcours
foreach ($childrenShop as $prod) {
    foreach ($prod-&gt;children('shop', true) as $child) {
        echo $child-&gt;getName() . ' : ' . (string)$child . "&lt;br&gt;";
    }
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      nom : Clavier<br>
      prix : 29.90
    </p>
  </section>

  <!-- ===================== Exemple 6 ===================== -->
  <section>
    <h2>Exemple 6 — Mélange texte + enfants (contenu)</h2>
    <p>
      Parfois, un nœud a du <em>texte</em> et aussi des <em>enfants</em>. Le texte s’obtient avec <code>(string)$node</code>.
    </p>

    <h3>XML</h3>
    <pre>&lt;para&gt;
  Introduction
  &lt;em&gt;important&lt;/em&gt;
  finale
&lt;/para&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;para&gt;Introduction&lt;em&gt;important&lt;/em&gt;finale&lt;/para&gt;';
$xml = simplexml_load_string($xmlString);

echo 'Texte brut : ' . (string)$xml . "&lt;br&gt;";

echo 'Enfants :&lt;br&gt;';
foreach ($xml-&gt;children() as $child) {
    echo '- ' . $child-&gt;getName() . ' = ' . (string)$child . "&lt;br&gt;";
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      Texte brut : Introductionfinale<br>
      Enfants :<br>
      – em = important
    </p>
  </section>

  <!-- ===================== Exemple 7 ===================== -->
  <section>
    <h2>Exemple 7 — Combiner children(), getName(), attributes()</h2>
    <h3>XML</h3>
    <pre>&lt;liste&gt;
  &lt;item id="1"&gt;Alpha&lt;/item&gt;
  &lt;item id="2"&gt;Beta&lt;/item&gt;
&lt;/liste&gt;</pre>

    <h3>Code</h3>
    <pre>&lt;?php
$xmlString = '&lt;liste&gt;&lt;item id="1"&gt;Alpha&lt;/item&gt;&lt;item id="2"&gt;Beta&lt;/item&gt;&lt;/liste&gt;';
$xml = simplexml_load_string($xmlString);

foreach ($xml-&gt;children() as $child) {
    $name = $child-&gt;getName();           // "item"
    $id   = (string)($child['id'] ?? ''); // attribut
    $val  = (string)$child;               // texte de l'élément
    echo $name . ' #' . $id . ' : ' . $val . "&lt;br&gt;";
}
?&gt;</pre>

    <h3>Affichage</h3>
    <p class="result">
      item #1 : Alpha<br>
      item #2 : Beta
    </p>
  </section>

  <!-- ===================== Notes utiles ===================== -->
  <section>
    <h2>Notes utiles</h2>
    <ul>
      <li>Charger le XML avec <code>simplexml_load_string()</code> ou <code>simplexml_load_file()</code>.</li>
      <li><code>children()</code> renvoie les enfants immédiats (pas les petits-enfants).</li>
      <li>Pour aller plus profond, enchaîne : <code>$node-&gt;children()-&gt;children()</code> ou utilise <code>xpath()</code>.</li>
      <li>Namespaces :
        <ul>
          <li><code>children($uri)</code> pour cibler par URI.</li>
          <li><code>children($prefix, true)</code> pour cibler par <em>préfixe</em>.</li>
        </ul>
      </li>
      <li>Accès au nom : <code>getName()</code>. Accès aux attributs : <code>$node['attribut']</code> ou <code>attributes()</code>.</li>
      <li>Compter les enfants : <code>count($node-&gt;children())</code>.</li>
    </ul>
  </section>

</body>
</html>
