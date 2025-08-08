<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Accueil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <style>
        /* Styles pour la page d'accueil */
        .hero-section {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?q=80&w=2070&auto=format&fit=crop');
            background-color: #4a5568;
            background-size: cover;
            background-position: center;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.85), rgba(29, 78, 216, 0.85));
            z-index: 1;
        }
        .hero-content { 
            position: relative; 
            z-index: 2; 
        }
        .gradient-bg {
            background: linear-gradient(135deg, #3B82F6, #1D4ED8);
        }
        .cta-button {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Section Héros -->
    <header class="hero-section text-white">
        <div class="hero-content container mx-auto px-4 md:px-6 py-20 md:py-32 text-center">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-4">Démarquez-vous. Décrochez le job.</h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">Notre assistant intelligent vous guide pas à pas pour créer un CV professionnel et percutant qui impressionnera les recruteurs.</p>
            <a href="/cv/etape1" class="cta-button bg-white text-blue-600 font-bold py-3 px-8 rounded-full text-lg inline-block">
                Créer mon CV maintenant
            </a>
        </div>
    </header>

    <!-- Section "Comment ça marche ?" -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 md:px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Simple comme bonjour</h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">Suivez notre processus guidé et obtenez un CV parfait en 3 étapes faciles.</p>
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Étape 1 -->
                <div class="flex flex-col items-center">
                    <div class="gradient-bg rounded-full w-20 h-20 flex items-center justify-center text-white text-2xl font-bold mb-4">1</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Remplissez</h3>
                    <p class="text-gray-600">Laissez-vous guider par nos formulaires intelligents pour ne rien oublier : profil, expériences, compétences...</p>
                </div>
                <!-- Étape 2 -->
                <div class="flex flex-col items-center">
                    <div class="gradient-bg rounded-full w-20 h-20 flex items-center justify-center text-white text-2xl font-bold mb-4">2</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Personnalisez</h3>
                    <p class="text-gray-600">Nous organisons vos informations dans un design moderne et professionnel, optimisé pour la lecture.</p>
                </div>
                <!-- Étape 3 -->
                <div class="flex flex-col items-center">
                    <div class="gradient-bg rounded-full w-20 h-20 flex items-center justify-center text-white text-2xl font-bold mb-4">3</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Recevez</h3>
                    <p class="text-gray-600">Obtenez votre CV final, prêt à être envoyé. Vous n'avez plus qu'à postuler !</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section des fonctionnalités -->
    <section class="py-16 md:py-24 bg-gray-50">
         <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Un CV qui fait la différence</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nous avons intégré les meilleures pratiques pour maximiser vos chances.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Carte 1 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Design Professionnel</h3>
                    <p class="text-gray-600">Des modèles clairs et modernes qui passent le test des 6 secondes du recruteur.</p>
                </div>
                <!-- Carte 2 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Contenu Optimisé</h3>
                    <p class="text-gray-600">Notre structure garantit que vos points forts et vos compétences clés sont mis en avant.</p>
                </div>
                <!-- Carte 3 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Processus Sans Stress</h3>
                    <p class="text-gray-600">Fini le syndrome de la page blanche. Nous vous posons les bonnes questions, vous répondez.</p>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>