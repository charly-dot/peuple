<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter une Province</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

  <!-- Barre de navigation -->
  <nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <span class="text-lg font-bold">Gestion de province</span>
      <ul class="hidden md:flex space-x-6 text-sm font-semibold">
        <li><a href="Acceuil.php" class="hover:underline">Accueil</a></li>
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
  <main class="max-w-xl mx-auto p-8 mt-10 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">➕ Ajouter une Régions</h2>
    <form action="insertion.php" method="POST" class="space-y-5">

      <div>
        <label for="nom_pro" class="block font-semibold mb-1">Nom de la Régions</label>
        <input type="text" id="nom_pro" name="nom_pro" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div>
        <label for="nom" class="block font-semibold mb-1">Nom de la mère</label>
        <input type="text" id="nom" name="nom" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div>
        <label for="prenom" class="block font-semibold mb-1">Prénom</label>
        <input type="text" id="prenom" name="prenom" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div>
        <label for="telephone" class="block font-semibold mb-1">Téléphone</label>
        <input type="text" id="telephone" name="telephone" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div class="flex justify-between mt-6">
        <button type="submit" name="Enregistre" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">💾 Enregistrer</button>
        <a href="Acceuil.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">🚪 Sortie</a>
      </div>

    </form>
  </main>

</body>
</html>
