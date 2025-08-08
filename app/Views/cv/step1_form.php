<?= $this->extend('layouts/default') ?>
<?= $this.section('title') ?>Étape 1: Profil<?= $this->endSection() ?>

<?= $this.section('styles') ?>
    <style>
        /* --- STYLES RESPONSIVES --- */
        .form-container { 
            background: white; 
            padding: 1.5rem; /* Moins de padding sur mobile */
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 600px; 
            margin: 1rem auto; /* Moins de marge sur mobile */
        }
        /* Media query pour les écrans plus grands (sm: 640px) */
        @media (min-width: 640px) {
            .form-container {
                padding: 2rem 3rem;
                margin: 2rem auto;
            }
        }

        .progress { text-align: right; margin-bottom: 1rem; color: #666; font-style: italic; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        input[type="text"], input[type="email"], textarea, select { width: 100%; padding: 0.75rem; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; }
        
        .submit-btn { 
            background-color: #3b82f6; 
            color: white; 
            padding: 0.75rem 1.5rem; 
            border: none; 
            border-radius: 8px; 
            font-size: 1rem; 
            cursor: pointer; 
            transition: background-color 0.3s;
            width: 100%; /* Pleine largeur sur mobile */
            text-align: center;
        }
        .submit-btn:hover { background-color: #1d4ed8; }

        /* Media query pour les écrans plus grands */
        @media (min-width: 640px) {
            .submit-btn {
                width: auto; /* Largeur auto sur desktop */
            }
        }
        
        .nav-buttons-single {
            display: flex;
            justify-content: flex-end; /* Aligne le bouton à droite sur desktop */
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-container">
    <div class="progress">Étape 1/7</div>
    <h2>Description du profil</h2>
    <p class="text-gray-600 mb-4">Décrivez en 2-3 phrases qui vous êtes et votre objectif professionnel.</p>
    
    <?= form_open('/cv/etape1') ?>
        <div class="form-group">
            <textarea name="profile_description" rows="5" class="w-full" placeholder="Ex: Développeur web passionné avec 3 ans d'expérience..."><?= set_value('profile_description') ?></textarea>
        </div>
        <div class="nav-buttons-single">
            <button type="submit" class="submit-btn">Étape suivante &rarr;</button>
        </div>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>