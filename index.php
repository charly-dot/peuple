<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Authentification</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #F3F4F6;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen m-0">

  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

    <h3 class="text-center text-blue-900 font-extrabold text-2xl mb-6">Connexion</h3>

    <!-- Messages d'erreur -->
    <?php if (isset($_GET['error'])) : ?>
      <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-center text-base font-medium">
        Votre information est incomplète.
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['faux'])) : ?>
      <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-4 text-center text-base font-medium">
        Votre information est incorrecte.
      </div>
    <?php endif; ?>

    <!-- Formulaire -->
    <form action="confirmation.php" method="POST" class="space-y-5">

      <div>
        <label for="compte" class="block mb-2 text-gray-700 font-semibold">Compte</label>
        <input type="text" id="compte" name="compte" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-gray-50" />
      </div>

      <div>
        <label for="pss" class="block mb-2 text-gray-700 font-semibold">Mot de passe</label>
        <input type="password" id="pss" name="pss" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-gray-50" />
      </div>

      <button type="submit" name="formulair"
        class="w-full bg-blue-900 text-white font-semibold py-3 rounded-md hover:bg-blue-800 transition">
        Envoyer
      </button>

      <div class="text-center">
        <a href="#" class="text-blue-900 font-medium hover:underline">Créer un compte</a>
      </div>

    </form>
  </div>

</body>
</html>
