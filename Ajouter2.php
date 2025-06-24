<?php
require('bdn.php');
require('function.php');
$province = province();
$region = region3();
$upd3 = $_GET['update3'] ?? null;

$detail3 = commune_where($upd3);
// var_dump($detail3);
// Ici, il faudrait récupérer $detail3, $province et $region selon ta logique,
// mais comme elle n'est pas fournie, je laisse cette partie à adapter.

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ajouter / Modifier Commune</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
</head>
<body class="bg-gray-100 font-sans">

  <nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <span class="text-lg font-bold">Gestion des Communes</span>
      <ul class="hidden md:flex space-x-6 text-sm font-semibold">
        <li><a href="Acceuil.php" class="hover:underline">Province</a></li>
        <li><a href="Region.php" class="hover:underline">Région</a></li>
        <li><a href="commune.php" class="hover:underline">Commune</a></li>
        <li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
      </ul>
      <a href="commune.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">Retour à l'accueil</a>
			
    </div>
  </nav>

  <main class="max-w-xl mx-auto p-8 mt-10 bg-white rounded-lg shadow-md">
	
    <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">
      <?=  'Modifier une Commune'  ?>
    </h2>

    <form action="update.php" method="POST" class="space-y-5">

      <?php if ($upd3 && isset($detail3)): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($detail3['id']) ?>" />
      <?php endif; ?>

      <div>
        <label for="nom_pro" class="block font-semibold mb-1">Votre province</label>
        <select name="nom_pro" id="province" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <?php foreach($province as $detail55): ?>
            <option value="<?= htmlspecialchars($detail55['nom_pro']) ?>" <?= ($upd3 && isset($detail3) && $detail3['nom_pro'] == $detail55['id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($detail55['nom_pro']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label for="nom_reg" class="block font-semibold mb-1">Votre région</label>
        <select name="nom_reg" id="nom_reg" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <?php foreach($region as $detail): ?>
            <option value="<?= htmlspecialchars($detail['nom_reg']) ?>" <?= ($upd3 && isset($detail3) && $detail3['nom_reg'] == $detail['nom_reg']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($detail['nom_reg']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div>
        <label for="nom_comm" class="block font-semibold mb-1">Nom de votre commune</label>
        <input type="text" id="nom_comm" name="nom_comm" value="<?= $upd3 && isset($detail3) ? htmlspecialchars($detail3['nom_cum']) : '' ?>" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>

      <div>
        <label for="nom" class="block font-semibold mb-1">Nom</label>
        <input type="text" id="nom" name="nom" value="<?= $upd3 && isset($detail3) ? htmlspecialchars($detail3['nom']) : '' ?>" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>

      <div>
        <label for="prenom" class="block font-semibold mb-1">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="<?= $upd3 && isset($detail3) ? htmlspecialchars($detail3['prenom']) : '' ?>" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>

      <div>
        <label for="telephone" class="block font-semibold mb-1">Téléphone</label>
        <input type="number" id="telephone" name="telephone" value="<?= $upd3 && isset($detail3) ? htmlspecialchars($detail3['telephone']) : '' ?>" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>

      <div class="flex justify-between mt-6">
        <button type="submit" name="<?= $upd3 ? 'upd4' : 'ins2' ?>" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
          💾 Enregistrer
        </button>
        <a href="commune.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
          🚪 Sortie
        </a>
      </div>

    </form>
  </main>

</body>
</html>
