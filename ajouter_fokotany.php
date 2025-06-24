<?php
require_once('bdn.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Modifier une Régions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
</head>
<body class="bg-gray-100 font-sans">

      <nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
			<div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
			<span class="text-lg font-bold">Gestion de province</span>
			<ul class="hidden md:flex space-x-6 text-sm font-semibold">
				<li><a href="Acceuil.php" class="hover:underline">Accueil</a></li>
				<li><a href="Region.php" class="hover:underline">Districts</a></li>
				<li><a href="commune.php" class="hover:underline">Commune</a></li>
				<li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
			</ul>
			
				
				<a href="index2.php"class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">Retour à l'accueil</a>
			
			</div>
		</nav>

    <main class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
        <form action="update.php" method="POST" class="space-y-6">
			
		<h2 class="text-2xl font-bold text-center text-blue-900 mb-6">Modification de Régions</h2>
            <input type="hidden" name="id" value="<?= htmlspecialchars($affichage['id'] ?? '') ?>" />
            
            <div>
                <label for="nom_pro" class="block mb-1 font-semibold">Nom de province :</label>
                <input type="text" id="nom_pro" name="nom_pro" 
                    value="<?= htmlspecialchars($affichage['nom_pro'] ?? '') ?>" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
            </div>

            <div>
                <label for="nom" class="block mb-1 font-semibold">Nom de mère :</label>
                <input type="text" id="nom" name="nom" 
                    value="<?= htmlspecialchars($affichage['nom'] ?? '') ?>" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
            </div>

            <div>
                <label for="prenom" class="block mb-1 font-semibold">Prénom :</label>
                <input type="text" id="prenom" name="prenom" 
                    value="<?= htmlspecialchars($affichage['prenom'] ?? '') ?>" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
            </div>

            <div>
                <label for="telephone" class="block mb-1 font-semibold">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" 
                    value="<?= htmlspecialchars($affichage['telephone'] ?? '') ?>" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" name="Enregistre" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                    💾 Enregistrer
                </button>
                <a href="Acceuil.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">🚪 Sortie</a>
            </div>
        </form>
    </main>

</body>
</html>
