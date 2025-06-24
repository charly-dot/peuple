<?php
require('bdn.php');
require_once('function.php');

if (isset($_GET['id2'])){
    $id2 = $_GET['id2'];    
    $xc = select($id2);
}
$province = province();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Districts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Navbar simple similaire à tes autres pages -->
    
	<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
			<div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
			<span class="text-lg font-bold">Ajouter une Districts</span>
			<ul class="hidden md:flex space-x-6 text-sm font-semibold">
				<li><a href="Acceuil.php" class="hover:underline">Accueil</a></li>
				<li><a href="Region.php" class="hover:underline">Districts</a></li>
				<li><a href="commune.php" class="hover:underline">Commune</a></li>
				<li><a href="Fokotany.php" class="hover:underline">Fokotany</a></li>
			</ul>
			
				
				<a href="region.php" class="border border-white text-white px-4 py-2 rounded hover:bg-white hover:text-blue-900 transition text-sm font-semibold">Retour à l'accueil</a>
			
			</div>
		</nav>

    <main class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <form action="update.php" method="POST" class="space-y-6">

            <?php if(isset($id2)){ ?>
				<h2 class="text-2xl font-bold text-blue-900 text-center mb-6">Modifier une Districts</h2>
                <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($xc['id']) ?>" />
                
                <div>
                    <label for="nom_reg" class="block mb-1 font-semibold">Nom de Districts :</label>
                    <input type="text" id="nom_reg" name="nom_reg" 
                        value="<?= htmlspecialchars($xc['nom_reg']) ?>" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="nom" class="block mb-1 font-semibold">Nom :</label>
                    <input type="text" id="nom" name="nom" 
                        value="<?= htmlspecialchars($xc['nom']) ?>" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="prenom" class="block mb-1 font-semibold">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" 
                        value="<?= htmlspecialchars($xc['prenom']) ?>" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="telephone" class="block mb-1 font-semibold">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" 
                        value="<?= htmlspecialchars($xc['telephone']) ?>" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit" name="upd2" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Enregistrer
                    </button>
                    <a href="region.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition flex items-center justify-center">
                        Sortie
                    </a>
                </div>

            <?php } else { ?>
				<h2 class="text-2xl font-bold text-blue-900 text-center mb-6">➕ Ajouter une Districts</h2>
                <div>
                    <label for="province" class="block mb-1 font-semibold">Votre Region :</label>
                    <select name="nom_pro" id="province" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        <option value="" disabled selected>-- Choisir une province --</option>
                        <?php foreach($province as $detail55): ?>
                            <option value="<?= htmlspecialchars($detail55['id']) ?>"><?= htmlspecialchars($detail55['nom_pro']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="nom_reg" class="block mb-1 font-semibold">Nom de région :</label>
                    <input type="text" id="nom_reg" name="nom_reg" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="nom" class="block mb-1 font-semibold">Nom :</label>
                    <input type="text" id="nom" name="nom" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="prenom" class="block mb-1 font-semibold">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div>
                    <label for="telephone" class="block mb-1 font-semibold">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" 
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit" name="ins1" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                        Enregistrer
                    </button>
                    <a href="region.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition flex items-center justify-center">
                        Sortie
                    </a>
                </div>

            <?php } ?>

        </form>
    </main>

</body>
</html>
