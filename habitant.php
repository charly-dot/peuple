<?php
require('bdn.php');
require('function.php');

if (isset($_GET['colone'])) {
  $verification = $_GET['colone'];
}

$total = 0;
$graphe = [];

if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
    $graphe = habitant_recherche($_POST['rechercher']);
} elseif (isset($verification)) {
    $stmt = $connexion->prepare("SELECT * FROM habitant WHERE nom_maison = :x");
    $stmt->execute(["x" => $verification]);
    $graphe = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Habitants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <span class="text-lg font-bold">Liste des Habitants</span>
        <ul class="hidden md:flex space-x-6 text-sm font-semibold">
            <li><a href="Acceuil.php" class="hover:underline">Province</a></li>
            <li><a href="Region.php" class="hover:underline">Région</a></li>
            <li><a href="commune.php" class="hover:underline">Commune</a></li>
            <li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
        </ul>
        <a href="index2.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">
            Déconnexion
        </a>
    </div>
</nav>

<!-- Contenu -->
<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-xl font-bold text-blue-900 text-center mb-6">👨‍👩‍👧‍👦 Liste des Habitants</h1>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full text-sm text-gray-800 text-center">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-4 py-3 border">Nom</th>
                    <th class="px-4 py-3 border">Prénom</th>
                    <th class="px-4 py-3 border">Date de Naissance</th>
                    <th class="px-4 py-3 border">Lieu de Naissance</th>
                    <th class="px-4 py-3 border">CIN</th>
                    <th class="px-4 py-3 border">Genre</th>
                    <th class="px-4 py-3 border">Adresse</th>
                    <th class="px-4 py-3 border">Téléphone</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (count($graphe) > 0): ?>
                    <?php foreach($graphe as $list): ?>
                    <?php $total++; ?>
                    <tr class="hover:bg-violet-100 transition">
                        <td class="px-3 py-2"><?= htmlspecialchars($list['nom']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['prenom']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['date_de_naissance']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['lieu_de_naissance']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['cin']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['genre']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['adress']) ?></td>
                        <td class="px-3 py-2"><?= htmlspecialchars($list['telephone']) ?></td>
                        <td class="px-3 py-2 flex flex-wrap justify-center items-center gap-2 text-sm">
                            <a href="Ajouter5.php?num3=<?= $list['id'] ?>" class="inline-flex items-center gap-1 bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                                <i class="fa fa-pencil"></i> Modifier
                            </a>
                            <a href="habitant.php?colone=<?= $list['id'] ?>" class="inline-flex items-center gap-1 bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                <i class="fa fa-eye"></i> Détail
                            </a>
                            <a href="delete.php?suppressionHabitant=<?= $list['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ?')" class="inline-flex items-center gap-1 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                <i class="fa fa-trash"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="bg-indigo-50 font-semibold text-indigo-700">
                        <td colspan="9" class="px-4 py-3 text-right">Total : <?= $total ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="px-4 py-4 text-center text-red-600 font-semibold">
                            Aucun résultat trouvé.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Recherche et actions -->
    <form action="habitant.php<?= isset($_GET['colone']) ? '?colone=' . htmlspecialchars($_GET['colone']) : '' ?>" method="post">
        <div class="flex flex-wrap gap-3 items-center mt-6">
            <input name="rechercher" type="text" placeholder="Recherche..." class="border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <button type="submit" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">🔍 Rechercher</button>
            <?php if (!isset($_POST['rechercher']) && isset($_GET['colone'])) : ?>
                <a href="Ajouter5.php?ins_habitant=<?= htmlspecialchars($_GET['colone']) ?>" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">➕ Ajouter</a>
            <?php endif; ?>
            <a href="fokotany.php" class="bg-yellow-500 text-white px-5 py-2 rounded-full hover:bg-yellow-600 transition">⬅ Retour</a>
            <a href="habitant.php" class="text-blue-800 text-xl ml-auto"><i class="fa fa-home"></i></a>
        </div>
    </form>
</main>

</body>
</html>
