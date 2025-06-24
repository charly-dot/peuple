<?php
require('bdn.php');
require('function.php');

if (isset($_GET['detail'])) {
  $verification = $_GET['detail'];
}

$total = 0;

// Si recherche
if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
  $tout = commune_recherche($_POST['rechercher']);
  $tout2 = commune_total_habitant();
}
// Si clique sur une région
elseif (isset($verification)) {
  $req = $connexion->prepare("SELECT * FROM commune WHERE nom_reg = :x");
  $req->execute(["x" => $verification]);
  $tout = $req->fetchAll();
  $tout2 = commune_total_habitant();
}
// Sinon, tout afficher
else {
  $req = $connexion->prepare("SELECT * FROM commune");
  $req->execute();
  $tout = $req->fetchAll();
  $tout2 = commune_total_habitant();
}

// Créer une map [nom_cum => total_habitants]
$mapHabitants = [];
foreach ($tout2 as $item) {
  $mapHabitants[$item['nom_cum']] = $item['total_habitants'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Commune</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <span class="text-lg font-bold">Gestion de nombre</span>
    <ul class="hidden md:flex space-x-6 text-sm font-semibold">
      <li><a href="Acceuil.php" class="hover:underline">Province</a></li>
      <li><a href="Region.php" class="hover:underline">Région</a></li>
      <li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
    </ul>
    <a href="index.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">Déconnexion</a>
  </div>
</nav>

<!-- Messages -->
<?php if (isset($_GET['modification'])) : ?>
  <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-center shadow-md">✅ La modification a été effectuée avec succès.</div>
<?php endif; ?>
<?php if (isset($_GET['ajoute'])) : ?>
  <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 px-4 py-3 rounded mb-4 text-center shadow-md">✅ L'enregistrement a été effectué avec succès.</div>
<?php endif; ?>
<?php if (isset($_GET['delete'])) : ?>
  <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-4 text-center shadow-md">✅ La suppression a été effectuée avec succès.</div>
<?php endif; ?>

<!-- Contenu principal -->
<main class="max-w-7xl mx-auto p-8">
  <form method="POST" class="space-y-6">
    <h2 class="text-xl font-bold text-blue-900 text-center m-6">Liste des Communes</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
      <table class="min-w-full text-sm text-gray-800 text-center">
        <thead class="bg-blue-900 text-white">
          <tr>
            <th class="px-6 py-3 border">Commune</th>
            <th class="px-6 py-3 border">Nom</th>
            <th class="px-6 py-3 border">Prénom</th>
            <th class="px-6 py-3 border">Téléphone</th>
            <th class="px-6 py-3 border">Total Habitants</th>
            <th class="px-5 py-3 border">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (count($tout) > 0): ?>
            <?php foreach($tout as $liste): ?>
              <?php $total++; ?>
              <tr class="hover:bg-violet-100 transition">
                <td class="px-4 py-2"><?= htmlspecialchars($liste['nom_cum']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($liste['nom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($liste['prenom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($liste['telephone']) ?></td>
                <td class="px-4 py-2 text-indigo-800 font-semibold"><?= $mapHabitants[$liste['nom_cum']] ?? 0 ?></td>
                <td class="px-4 py-2 flex flex-wrap justify-center items-center gap-2 text-sm">
                  <a href="Ajouter2.php?update3=<?= $liste['id'] ?>" class="inline-flex items-center gap-1 bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                    <i class="fa fa-pencil"></i> Modifier
                  </a>
                  <a href="Fokotany.php?detail=<?= $liste['nom_cum'] ?>" class="inline-flex items-center gap-1 bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                    <i class="fa fa-eye"></i> Voir
                  </a>
                  <a href="function2.php?delete3=<?= $liste['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');" class="inline-flex items-center gap-1 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                    <i class="fa fa-trash"></i> Supprimer
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="px-4 py-4 text-red-600 font-semibold text-center">Aucun résultat trouvé.</td>
            </tr>
          <?php endif; ?>
          <tr class="bg-indigo-50 font-semibold text-indigo-700">
            <td colspan="6" class="px-4 py-2 text-right">Total : <?= $total ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>

  <!-- Recherche -->
  <form action="commune.php" method="post">
    <div class="flex flex-wrap gap-3 items-center mt-4">
      <input type="text" name="rechercher" class="border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Recherche" />
      <button type="submit" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">🔍 Recherche</button>
      <a href="Ajouter2.php" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">➕ Ajouter</a>
      <a href="Region.php" class="bg-yellow-500 text-white px-5 py-2 rounded-full hover:bg-yellow-600 transition">🔙 Retour</a>
      <a href="index2.php" class="text-blue-800 text-xl ml-auto"><i class="fa fa-home"></i></a>
    </div>
  </form>
</main>

</body>
</html>
