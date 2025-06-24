<?php
require('bdn.php');
require('function.php');

if (isset($_GET['id_column'])) {
  $verification = $_GET['id_column'];
}

$total = 0;

// Si recherche
if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
  $tout = region_recherche($_POST['rechercher']);
  $tout2 = region_total_habitant();
} elseif (isset($verification)) {
  $affichage_reg1 = $connexion->prepare("SELECT * FROM region WHERE nom_pro = :x");
  $affichage_reg1->execute(["x" => $verification]);
  $tout = $affichage_reg1->fetchAll();
  $tout2 = region_total_habitant();
} else {
  $affichage_reg = $connexion->prepare('SELECT * FROM region');
  $affichage_reg->execute();
  $tout = $affichage_reg->fetchAll();
  $tout2 = region_total_habitant();
}

// Créer une map rapide région => total
$mapHabitants = [];
foreach ($tout2 as $item) {
  $mapHabitants[$item['nom_reg']] = $item['total_habitants'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Districts</title>
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <span class="text-lg font-bold">Gestion de nombre</span>
    <ul class="hidden md:flex space-x-6 text-sm font-semibold">
      <li><a href="Acceuil.php" class="hover:underline">Regions</a></li>
      <li><a href="commune.php" class="hover:underline">Commune</a></li>
      <li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
    </ul>
    <a href="index.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">
      Déconnexion
    </a>
  </div>
</nav>

<!-- Messages -->
<?php if (isset($_GET['modification'])) : ?>
  <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-center shadow-md">
    ✅ La modification a été effectuée avec succès.
  </div>
<?php endif; ?>

<!-- Contenu principal -->
<main class="max-w-7xl mx-auto p-8">
  <div class="space-y-6">
    <h2 class="text-xl font-bold text-blue-900 text-center m-6">Liste des Districts</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
      <table class="min-w-full text-sm text-gray-800 text-center">
        <thead class="bg-blue-900 text-white">
          <tr>
            <th class="px-4 py-3 border">Districts</th>
            <th class="px-4 py-3 border">Nom</th>
            <th class="px-4 py-3 border">Prénom</th>
            <th class="px-4 py-3 border">Téléphone</th>
            <th class="px-4 py-3 border">Total Habitants</th>
            <th class="px-4 py-3 border">Commune</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (count($tout) > 0): ?>
            <?php foreach($tout as $item): ?>
              <?php $total++; ?>
              <tr class="hover:bg-violet-100 transition">
                <td class="px-4 py-2"><?= htmlspecialchars($item['nom_reg']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['nom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['prenom']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($item['telephone']) ?></td>
                <td class="px-4 py-2 text-indigo-800 font-semibold">
                  <?= $mapHabitants[$item['nom_reg']] ?? 0 ?>
                </td>
                <td class="px-4 py-2 flex flex-wrap justify-center items-center gap-2 text-sm">
                  <a href="Ajouter_Copie.php?id2=<?= $item['id'] ?>" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                    <i class="fa fa-edit"></i> Modifier
                  </a>
                  <a href="commune.php?detail=<?= $item['nom_reg'] ?>" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                    <i class="fa fa-eye"></i> Détail
                  </a>
                  <a href="delete.php?dlt2=<?= $item['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                    <i class="fa fa-trash"></i> Supprimer
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center text-red-600 font-semibold py-6">
                ❌ Aucun résultat trouvé.
              </td>
            </tr>
          <?php endif; ?>
          <tr class="bg-indigo-50 font-semibold text-indigo-700">
          <td></td>
            <td colspan="5" class="px-4 py-2 text-right">Total : <?= $total ?></td>
            
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Recherche -->
    <form action="Region.php" method="POST" class="flex flex-wrap gap-3 items-center mt-4">
      <input type="text" name="rechercher" class="border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Recherche" />
      <button type="submit" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
        🔍 Recherche
      </button>
      <a href="Ajouter_Copie.php" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">➕ Ajouter</a>
      <a href="Acceuil.php" class="bg-yellow-500 text-white px-5 py-2 rounded-full hover:bg-yellow-600 transition">🔙 Retour</a>
      <a href="index2.php" class="text-blue-800 text-xl ml-auto"><i class="fa fa-home"></i></a>
    </form>
  </div>
</main>

</body>
</html>
