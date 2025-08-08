<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Étape 2: Infos Personnelles<?= $this->endSection() ?>

<?= $this->section('styles') ?>
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
        
        .nav-buttons { 
            display: flex; 
            flex-direction: column-reverse; /* Boutons en colonne sur mobile */
            gap: 1rem; 
            margin-top: 1.5rem; 
        }
        @media (min-width: 640px) {
            .nav-buttons {
                flex-direction: row;
                justify-content: space-between;
            }
        }

        .submit-btn, .prev-btn {
            width: 100%; /* Pleine largeur sur mobile */
            text-align: center;
        }
        @media (min-width: 640px) {
            .submit-btn, .prev-btn {
                width: auto; /* Largeur auto sur desktop */
            }
        }

        .submit-btn { background-color: #3b82f6; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s; }
        .submit-btn:hover { background-color: #1d4ed8; }
        .prev-btn { background-color: #6b7280; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s; text-decoration: none; display: inline-block; }
        .prev-btn:hover { background-color: #4b5563; }
        .validation-summary { background-color: #fee2e2; border-left: 6px solid #ef4444; margin-bottom: 15px; padding: 0.5rem 1rem; color: #b91c1c; }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-container">
    <div class="progress">Étape 2/7</div>
    <h2>Informations Personnelles</h2>
    
    <?php if (isset($validation)): ?>
        <div class="validation-summary">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <?= form_open('/cv/etape2') ?>
        <div class="form-group">
            <label for="nom_utilisateur">Nom complet</label>
            <input type="text" name="nom_utilisateur" id="nom_utilisateur" value="<?= set_value('nom_utilisateur') ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= set_value('email') ?>">
        </div>
        <div class="form-group">
            <label for="contact_whatsapp">Contact (WhatsApp)</label>
            <input type="text" name="contact_whatsapp" id="contact_whatsapp" value="<?= set_value('contact_whatsapp') ?>">
        </div>
        
        <div class="nav-buttons">
            <a href="/cv/etape1" class="prev-btn">&larr; Précédent</a>
            <button type="submit" class="submit-btn">Étape suivante &rarr;</button>
        </div>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>