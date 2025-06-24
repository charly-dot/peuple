<?php
require('bdn.php');
require_once('function.php');

if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
    $liste1 = province_recherche($_POST['rechercher']);
    $liste2 = province_total_habitant();
} else {
    $liste1 = province();
    $liste2 = province_total_habitant();
}

// Associer les habitants à chaque province
$habitantsParProvince = [];
foreach ($liste2 as $item) {
    $habitantsParProvince[$item['nom_pro']] = $item['total_habitants'];
}
$total = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Province</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <span class="text-lg font-bold">Gestion de nombre</span>
    <ul class="hidden md:flex space-x-6 text-sm font-semibold">
      <li><a href="Region.php" class="flex items-center hover:underline">Districts</a></li>
      <li><a href="commune.php" class="flex items-center hover:underline">Commune</a></li>
      <li><a href="Fokotany.php" class="flex items-center hover:underline">Fokotany</a></li>
    </ul>
    <a href="index.php"
       class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">
      Déconnexion
    </a>
  </div>
</nav>

<!-- Messages flash -->
<?php foreach (['modification' => '✅ La modification a été effectuée avec succès.',
                'ajoute' => "✅ L'enregistrement a été effectué avec succès.",
                'delete' => '✅ La suppression a été effectuée avec succès.'] as $key => $message): ?>
  <?php if (isset($_GET[$key])) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-center shadow-md">
      <?= $message ?>
    </div>
  <?php endif; ?>
<?php endforeach; ?>

<main class="max-w-7xl mx-auto p-8">
  <form action="envoyer.php" method="POST" class="space-y-6">
    <h2 class="text-xl font-bold text-blue-900 text-center m-6">Liste des Provinces</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
      <table class="min-w-full text-sm text-gray-800 text-center">
        <thead class="bg-blue-900 text-white">
          <tr>
            <th class="px-6 py-3 border">Province</th>
            <th class="px-6 py-3 border">Nom</th>
            <th class="px-6 py-3 border">Prénom</th>
            <th class="px-6 py-3 border">Téléphone</th>
            <th class="px-6 py-3 border">Total Habitants</th>
            <th class="px-5 py-3 border">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (!empty($liste1)) : ?>
            <?php foreach($liste1 as $item): ?>
              <?php $total++; ?>
              <tr class="hover:bg-violet-100 transition">
                <td class="px-4 py-2"><?= htmlspecialchars($item['nom_pro']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['nom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['prenom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['telephone']) ?></td>
                <td class="px-4 py-2 text-indigo-800 font-semibold">
                  <?= $habitantsParProvince[$item['nom_pro']] ?? 0 ?>
                </td>
                <td class="px-4 py-2 flex flex-wrap justify-center items-center gap-2 text-sm">
                  <a href="envoyer.php?colone=<?= $item['id'] ?>" class="inline-flex items-center gap-1 bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                    <i class="fa fa-pencil"></i> Modifier
                  </a>
                  <a href="Region.php?id_column=<?= $item['id'] ?>" class="inline-flex items-center gap-1 bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                    <i class="fa fa-eye"></i> Voir
                  </a>
                  <a href="delete.php?nom=<?= $item['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');" class="inline-flex items-center gap-1 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                    <i class="fa fa-trash"></i> Supprimer
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr class="bg-indigo-50 font-semibold text-indigo-700">
              <td colspan="6" class="px-4 py-2 text-right">Total : <?= $total ?></td>
            </tr>
          <?php else : ?>
            <tr>
              <td colspan="6" class="text-center text-red-600 font-semibold py-6">
                ❌ Aucun résultat trouvé.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </form>

  <form action="Acceuil.php" method="post">
    <div class="flex flex-wrap gap-3 items-center mt-4">
      <input type="text" name="rechercher" class="border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Recherche" />
      <button type="submit" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">🔍 Recherche</button>
      <a href="Ajouter.php" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">➕ Ajouter</a>
      <a href="index2.php" class="text-blue-800 text-xl ml-auto"><i class="fa fa-home"></i></a>
    </div>
  </form>
</main>
</body>
</html>
