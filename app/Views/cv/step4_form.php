<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Étape 4: Formations<?= $this->endSection() ?>

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
        .dynamic-block { border: 1px solid #e0e0e0; padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; position: relative; }
        .add-btn { background: #22c55e; color: white; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer; border: none; display: inline-block; margin-bottom: 1.5rem;}
        .remove-btn { position: absolute; top: 10px; right: 10px; background: #ef4444; color: white; border: none; width: 25px; height: 25px; border-radius: 50%; cursor: pointer; font-weight: bold; }
        .validation-summary { background-color: #fee2e2; border-left: 6px solid #ef4444; margin-bottom: 15px; padding: 0.5rem 1rem; color: #b91c1c; }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-container">
    <div class="progress">Étape 4/7</div>
    <h2>Vos Formations et Diplômes</h2>

    <?php if (isset($validation)): ?>
        <div class="validation-summary">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <?= form_open('/cv/etape4') ?>
        <div id="formations_wrapper">
            <div class="dynamic-block">
                <div class="form-group">
                    <label>Diplôme / Titre obtenu</label>
                    <input type="text" name="formations[0][diplome]" value="<?= set_value('formations[0][diplome]') ?>">
                </div>
                <div class="form-group">
                    <label>Établissement</label>
                    <input type="text" name="formations[0][etablissement]" value="<?= set_value('formations[0][etablissement]') ?>">
                </div>
                <div class="form-group">
                    <label>Année d'obtention</label>
                    <input type="text" name="formations[0][annee_obtention]" placeholder="Ex: 2023" value="<?= set_value('formations[0][annee_obtention]') ?>">
                </div>
            </div>
        </div>
        <button type="button" id="add_formation_btn" class="add-btn">+ Ajouter une formation</button>

        <div class="nav-buttons">
            <a href="/cv/etape3" class="prev-btn">&larr; Précédent</a>
            <button type="submit" class="submit-btn">Étape suivante &rarr;</button>
        </div>
    <?= form_close() ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('formations_wrapper');
        const addButton = document.getElementById('add_formation_btn');
        let formationIndex = 1;

        addButton.addEventListener('click', function () {
            const newBlock = wrapper.children[0].cloneNode(true);
            
            newBlock.querySelector('input[name="formations[0][diplome]"]').name = `formations[${formationIndex}][diplome]`;
            newBlock.querySelector('input[name="formations[0][etablissement]"]').name = `formations[${formationIndex}][etablissement]`;
            newBlock.querySelector('input[name="formations[0][annee_obtention]"]').name = `formations[${formationIndex}][annee_obtention]`;

            newBlock.querySelectorAll('input').forEach(input => input.value = '');
            
            if (!newBlock.querySelector('.remove-btn')) {
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'remove-btn';
                removeButton.innerText = 'X';
                newBlock.appendChild(removeButton);

                removeButton.addEventListener('click', function() {
                    this.parentElement.remove();
                });
            }

            wrapper.appendChild(newBlock);
            formationIndex++;
        });
    });
</script>
<?= $this->endSection() ?>