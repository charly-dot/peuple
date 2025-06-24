<?php
require('bdn.php');
if(isset($_GET['ins_habitant'])){
    $path = $_GET['ins_habitant'];
    $affichage_fkt = $connexion->prepare("SELECT * FROM maison WHERE id = :x");
    $affichage_fkt->execute([
        "x" => $_GET['ins_habitant'],
    ]);
    $detail3 = $affichage_fkt->fetch();
    // var_dump($detail3);
}

if(isset($_GET['num3'])){
    $path = $_GET['num3'];

    $affichage_fkt = $connexion->prepare("SELECT * FROM habitant WHERE id = :x");
    $affichage_fkt->execute([
        "x" => $_GET['num3'],
    ]);
    $detail3 = $affichage_fkt->fetch();
    // var_dump($detail3);
}

$select_adress = $connexion->prepare('SELECT adress, nom_reg, nom_fkt, nom_pro, nom_cum, id FROM maison WHERE id = :x');
$select_adress->execute(["x" => $path]);
$detail = $select_adress->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un habitant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-blue-900 text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <span class="text-lg font-bold">Ajout d'habitant</span>
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
<main class="max-w-xl mx-auto bg-white shadow-lg rounded-lg mt-10 p-6">
    
    <?php if (isset($_GET['num3'])): ?>
        <h1 class="text-xl font-bold text-blue-900 text-center mb-6">👤 Modifier un habitant</h1>
        <form action="update.php" method="POST" class="space-y-4">

             <div>
                <input type="hidden" id="nom" name="id" value="<?= $detail3['id'] ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?= $detail3['nom'] ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" id="nom" name="prenom" value="<?= $detail3['prenom'] ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            
                </div>

            <!-- Date de naissance -->
            <div>
                <label for="date_de_naissaince" class="block text-sm font-medium text-gray-700">Date de naissance :</label>
                <input type="date" id="date_de_naissaince" name="date_de_naissance" value="<?= $detail3['date_de_naissance'] ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Lieu de naissance -->
            <div>
                <label for="lieu_de_naissance" class="block text-sm font-medium text-gray-700">Lieu de naissance :</label>
                    <input name="lieu_de_naissance" type="text" id="lieu_de_naissance" value="<?= $detail3['lieu_de_naissance'] ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            
                </div>

            <!-- CIN -->
            <div>
                <label for="CIN" class="block text-sm font-medium text-gray-700">Numéro CIN :</label>
                <input type="number" id="CIN" name="CIN" value="<?= $detail3['cin'] ?>" min="100000" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Téléphone -->
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" value="<?= $detail3['telephone'] ?>"  required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Genre -->
            <div>
                <span class="block text-sm font-medium text-gray-700">Genre :</span>
                <div class="flex items-center gap-6 mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" name="genre" value="homme" required class="text-blue-600">
                        <span class="ml-2">Homme</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="genre" value="femme" class="text-pink-600">
                        <span class="ml-2">Femme</span>
                    </label>
                </div>
            </div>

            <!-- Boutons -->
            <div class="flex justify-between pt-4">
                <button type="submit" name="modofierHabitant"
                    class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
                    💾 Enregistrer
                </button>
                <a href="index2.php" class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">
                    ❌ Sortie
                </a>
            </div>

        </form>
    <?php else: ?>
        <h1 class="text-xl font-bold text-blue-900 text-center mb-6">👤 Ajouter un habitant</h1>
        <form action="confirmation.php" method="POST" class="space-y-4">

            <!-- Champs cachés -->
            <input type="hidden" name="id_maison" value="<?= $detail['id'] ?>">
            <input type="hidden" name="nom_fkt" value="<?= $detail['nom_fkt'] ?>">
            <input type="hidden" name="adress" value="<?= $detail['adress'] ?>">
            <input type="hidden" name="nom_reg" value="<?= $detail['nom_reg'] ?>">
            <input type="hidden" name="nom_cum" value="<?= $detail['nom_cum'] ?>">
            <input type="hidden" name="nom_pro" value="<?= $detail['nom_pro'] ?>">

            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez le prénom" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Date de naissance -->
            <div>
                <label for="date_de_naissaince" class="block text-sm font-medium text-gray-700">Date de naissance :</label>
                <input type="date" id="date_de_naissaince" name="date_de_naissaince" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Lieu de naissance -->
            <div>
                <label for="lieu_de_naissance" class="block text-sm font-medium text-gray-700">Lieu de naissance :</label>
                <input type="text" id="lieu_de_naissance" name="lieu_de_naissance" placeholder="Ville, commune, etc." required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- CIN -->
            <div>
                <label for="CIN" class="block text-sm font-medium text-gray-700">Numéro CIN :</label>
                <input type="number" id="CIN" name="CIN" placeholder="Numéro de CIN" min="100000" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Téléphone -->
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" placeholder="034xxxxxxxx"  required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Genre -->
            <div>
                <span class="block text-sm font-medium text-gray-700">Genre :</span>
                <div class="flex items-center gap-6 mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" name="genre" value="homme" required class="text-blue-600">
                        <span class="ml-2">Homme</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="genre" value="femme" class="text-pink-600">
                        <span class="ml-2">Femme</span>
                    </label>
                </div>
            </div>

            <!-- Boutons -->
            <div class="flex justify-between pt-4">
                <button type="submit" name="Enregistre2"
                    class="bg-blue-900 text-white px-5 py-2 rounded-full hover:bg-blue-800 transition">
                    💾 Enregistrer
                </button>
                <a href="Ajouter5.php?colone=<?= htmlspecialchars($_GET['ins_habitant']) OR htmlspecialchars($_GET['num3']) ?>" class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">
                    ❌ Sortie
                </a>
            </div>

        </form>
    <?php endif; ?>
    
</main>

</body>
</html>
