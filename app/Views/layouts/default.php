<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - CV Gen AI</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; display: flex; flex-direction: column; min-height: 100vh; }
        main { flex-grow: 1; } /* Fait en sorte que le footer reste en bas */
    </style>

    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-gray-100">

    <!-- Inclusion du header commun -->
    <?= $this->include('layouts/partials/header') ?>

    <main>
        <!-- Le contenu de chaque page sera injecté ici -->
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Inclusion du footer commun -->
    <?= $this->include('layouts/partials/footer') ?>

</body>
</html>