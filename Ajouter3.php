<?php
require('bdn.php');
require_once('function.php');
$detail = province();
$detail1 = region3();
$affichage = commune();
if (isset($_GET['id3'])) {
    $liste = $_GET['id3'];
    $region = $connexion->prepare('SELECT * FROM Fokotany WHERE id = :id3');
    $region->execute([
        "id3" => $liste,
    ]);
    $detail2 = $region->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire Fokotany</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <span class="text-lg font-bold">Gestion de Fokotany</span>
    <ul class="hidden md:flex space-x-6 text-sm font-semibold">
      <li><a href="Acceuil.php" class="hover:underline">Province</a></li>
      <li><a href="Region.php" class="hover:underline">Région</a></li>
      <li><a href="commune.php" class="hover:underline">Commune</a></li>
      <li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
    </ul>
    <a href="index.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">
      Déconnexion
    </a>
  </div>
</nav>

<!-- Formulaire -->
<main class="max-w-3xl mx-auto p-8 bg-white mt-10 rounded-lg shadow-md">
  <form action="update.php" method="post" class="space-y-6">
    <?php if (isset($liste)) : ?>
      <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">✏️ Modification de Fokotany</h2>
      <input type="hidden" name="id" value="<?= $detail2['id'] ?>">

      <div class="space-y-4">
        <label class="block">Nom Fokotany
          <input type="text" name="nom_fkt" value="<?= $detail2['nom_fkt'] ?>" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Nom
          <input type="text" name="nom" value="<?= $detail2['nom'] ?>" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Prénom
          <input type="text" name="prenom" value="<?= $detail2['prenom'] ?>" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Téléphone
          <input type="text" name="telephone" value="<?= $detail2['telephone'] ?>" class="w-full border rounded px-4 py-2">
        </label>
      </div>

      <div class="flex justify-between mt-6">
        <button type="submit" name="upd5" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">💾 Enregistrer</button>
        <a href="Fokotany.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">🚪 Sortie</a>
      </div>

    <?php else : ?>
      <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">➕ Ajouter un Fokotany</h2>

      <div class="grid md:grid-cols-2 gap-4">
        <label class="block">Province
          <select name="nom_pro" class="w-full border rounded px-4 py-2">
            <?php foreach ($detail as $pro) : ?>
              <option value="<?= $pro['nom_pro'] ?>"><?= $pro['nom_pro'] ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="block">Région
          <select name="nom_reg" class="w-full border rounded px-4 py-2">
            <?php foreach ($detail1 as $reg) : ?>
              <option value="<?= $reg['nom_reg'] ?>"><?= $reg['nom_reg'] ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="block col-span-2">Commune
          <select name="nom_cum" class="w-full border rounded px-4 py-2">
            <?php foreach ($affichage as $com) : ?>
              <option value="<?= $com['nom_cum'] ?>"><?= $com['nom_cum'] ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </div>

      <div class="space-y-4 mt-6">
        <label class="block">Nom Fokotany
          <input type="text" name="nom_fkt" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Nom
          <input type="text" name="nom" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Prénom
          <input type="text" name="prenom" class="w-full border rounded px-4 py-2">
        </label>
        <label class="block">Téléphone
          <input type="text" name="telephone" class="w-full border rounded px-4 py-2">
        </label>
      </div>

      <div class="flex justify-between mt-6">
        <button type="submit" name="ist3" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">💾 Enregistrer</button>
        <a href="Fokotany.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">🚪 Sortie</a>
      </div>

    <?php endif; ?>
  </form>
</main>

</body>
</html>
