<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Succès<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <style>
        .form-container { 
            background: white; 
            padding: 1.5rem;
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 600px; 
            margin: 1rem auto;
            text-align: center; /* Centrer le contenu */
        }
        @media (min-width: 640px) {
            .form-container {
                padding: 3rem;
                margin: 2rem auto;
            }
        }
        .success-title {
            color: #22c55e; /* Vert */
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .success-message {
            font-size: 1.25rem;
            color: #1f2937; /* Gris foncé */
            margin-bottom: 0.5rem;
        }
        .success-subtext {
            color: #4b5563; /* Gris moyen */
            margin-bottom: 2rem;
        }
        .new-cv-link {
            background-color: #3b82f6; /* Bleu */
            color: white; 
            padding: 0.75rem 1.5rem; 
            border-radius: 8px; 
            font-size: 1rem; 
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .new-cv-link:hover {
            background-color: #1d4ed8;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-container">
    <h1 class="success-title">✓ Succès !</h1>
    <h2 class="success-message">Merci, vos informations ont bien été reçues.</h2>
    <p class="success-subtext">Nous allons maintenant créer votre CV personnalisé et nous vous contacterons très prochainement.</p>
    <a href="/cv/etape1" class="new-cv-link">Créer un autre CV</a>
</div>
<?= $this->endSection() ?>
