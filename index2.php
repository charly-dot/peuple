<?php
require('bdn.php');
require_once('function.php');
$liste1 = province();
$total_liste1 = 0;
$liste2 = region3();
$total_liste2 = 0;
$select = $connexion->prepare('SELECT * FROM commune');
$select->execute();
$liste3 = $tous = $select->fetchAll();
$total_liste3 = 0;
$select = $connexion->prepare('SELECT * FROM fokotany');
$select->execute();
$liste4 = $tous = $select->fetchAll();
$total_liste4 = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Barre de navigation -->
  <nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <span class="text-lg font-bold">Gestion de nombre</span>
      <ul class="hidden md:flex space-x-6 text-sm">
        <li><a href="index.php" class="hover:underline">Accueil</a></li>
        <li><a href="Acceuil.php" class="hover:underline">Dashboard</a></li>
        <li><a href="chois.html" class="hover:underline">Ajouter</a></li>
      </ul>
      <a href="index.php"
         class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">
        Déconnexion
      </a>
    </div>
  </nav>

  <!-- Contenu principal -->
  <?php if (isset($_GET['modification'])) : ?>
      <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-center text-base font-medium">
        Modification été bien fait
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['ajoute'])) : ?>
      <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-center text-base font-medium">
        Enregistrement été bien fait
      </div>
    <?php endif; ?>
    
  <div class="max-w-7xl mx-auto mt-8 px-4">
    <div class="bg-white rounded-lg shadow p-6">
      <h2 class="text-xl font-bold text-blue-900 text-center mb-6">Liste des entités</h2>

      <!-- Table -->
     <div class="overflow-x-auto rounded-lg shadow-lg">
  <table class="min-w-full text-sm text-gray-800">
  <thead class="bg-blue-900 text-white">
            <tr>
              <th class="px-6 py-3 border text-center">Régions</th>
              <th class="px-6 py-3 border text-center">Districts</th>
              <th class="px-6 py-3 border text-center">Communes</th>
              <th class="px-6 py-3 border text-center">Cartier</th>
            </tr>
          </thead>
    <tbody class="text-center divide-y divide-gray-200">
      <tr class="bg-gray-50 hover:bg-violet-100 transition">
        <td class="px-4 py-3">
          <?php foreach($liste1 as $l): ?>
            <?= htmlspecialchars($l['nom_pro']) ?><br>
            <?php $total_liste1++; ?>
          <?php endforeach; ?>
        </td>
        <td class="px-4 py-3">
          <?php foreach($liste2 as $l): ?>
            <?= htmlspecialchars($l['nom_reg']) ?><br>
            <?php $total_liste2++; ?>
          <?php endforeach; ?>
        </td>
        <td class="px-4 py-3">
          <?php foreach($liste3 as $l): ?>
            <?= htmlspecialchars($l['nom_cum']) ?><br>
            <?php $total_liste3++; ?>
          <?php endforeach; ?>
        </td>
        <td class="px-4 py-3">
          <?php foreach($liste4 as $l): ?>
            <?= htmlspecialchars($l['nom_fkt']) ?><br>
            <?php $total_liste4++; ?>
          <?php endforeach; ?>
        </td>
      </tr>
    </tbody>
    <tfoot lass="bg-indigo-50 text-indigo-700 font-semibold">
      <tr>
        <td class="px-4 py-2 text-center">Total : <?= $total_liste1 ?></td>
        <td class="px-4 py-2 text-center">Total : <?= $total_liste2 ?></td>
        <td class="px-4 py-2 text-center">Total : <?= $total_liste3 ?></td>
        <td class="px-4 py-2 text-center">Total : <?= $total_liste4 ?></td>
      </tr>
    </tfoot>
  </table>
</div>


      <!-- Formulaire de recherche -->
      <form action="liste_province" method="POST" class="mt-6 flex flex-wrap gap-3 items-center ">
        <input type="text" name="search" placeholder="Recherche"
               class="flex-grow min-w-[180px] border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />

        <button type="submit" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
          🔍 Recherche
        </button>

        <a href="chois.html" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">
          ➕ Ajouter
        </a>
        
      </form>

    </div>
  </div>
</body>
</html>
