<?php
require('bdn.php');
require('function.php');
if(isset($_GET['num3'])){
    $affichage_fkt = $connexion->prepare("SELECT * FROM maison WHERE id = :x");
    $affichage_fkt->execute([
        "x" => $_GET['num3'],
    ]);
    $tous = $affichage_fkt->fetchAll();
    // var_dump($tous);
}

if(isset($_GET['ajouter'])){
    $affichage_fkt = $connexion->prepare("SELECT * FROM fokotany WHERE nom_fkt = :x");
    $affichage_fkt->execute([
        "x" => $_GET['ajouter'],
    ]);
    $tous = $affichage_fkt->fetchAll();
    // var_dump($tous);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter ou modifier une adresse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <span class="text-lg font-bold">Adresse</span>
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

<!-- Conteneur -->
<main class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8 mt-10">

    <form action="update.php" method="POST" class="space-y-4">

        <?php if (isset($_GET['num3'])): ?>
            <h2 class="text-xl font-bold text-blue-900 mb-6">Modifier une adresse</h2>
            <?php foreach ($tous as $detail3): ?>
                <input type="hidden" name="id" value="<?= $detail3['id'] ?>">

                <div>
                    <label for="adress" class="block text-sm font-semibold text-gray-700">Adresse :</label>
                    <input type="text" id="adress" name="adress" value="<?= $detail3['adress'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                </div>

                <div>
                    <label for="nom" class="block text-sm font-semibold text-gray-700">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?= $detail3['nom'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                </div>

                <div>
                    <label for="prenom" class="block text-sm font-semibold text-gray-700">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?= $detail3['prenom'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                </div>

                <div>
                    <label for="telephone" class="block text-sm font-semibold text-gray-700">Téléphone :</label>
                    <input type="tel" id="telephone" name="telephone" value="<?= $detail3['telephone'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="flex justify-between pt-4">
                    <button type="submit" name="updmaison" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
                        💾 Enregistrer
                    </button>
                    <a href="Fokotany.php" class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">
                        ❌ Annuler
                    </a>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <h2 class="text-xl font-bold text-blue-900 mb-6">➕ Ajouter une adresse</h2>

            <!-- Select Province -->
            <?php foreach($tous as $detail): ?>
                <input type="hidden" id="prenom" name="nom_pro" value="<?= $detail['nom_pro'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                <input type="hidden" id="prenom" name="nom_reg" value="<?= $detail['nom_reg'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                <input type="text" id="prenom" name="nom_comm" value="<?= $detail['nom_comm'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
                <input type="hidden" id="prenom" name="nom_fkt" value="<?= $detail['nom_fkt'] ?>" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
            <?php endforeach; ?>

           

            <!-- Adresse -->
            <div>
                <label for="adress" class="block text-sm font-semibold text-gray-700">Adresse :</label>
                <input type="text" id="adress" name="adress" placeholder="Adresse complète" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-semibold text-gray-700">Nom :</label>
                <input type="text" id="nom" name="nom" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-semibold text-gray-700">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Téléphone -->
            <div>
                <label for="telephone" class="block text-sm font-semibold text-gray-700">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" placeholder="034xxxxxxx"  required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-blue-600">
            </div>

            <div class="flex justify-between pt-4">
                <button type="submit" name="ist4" class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
                    💾 Enregistrer
                </button>
                <a href="Fokotany.php" class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">
                    ❌ Annuler
                </a>
            </div>

        <?php endif; ?>

    </form>
</main>

</body>
</html>
